<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Users::model()->find('email = :email',array(':email'=>$this->username));
		if(!count($user)){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}elseif($user->password !== hash('sha256', $this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->setState('uid', $user->uid);
			$this->setState('name', $user->username);
			$this->setState('email', $user->email);
			$this->setState('last_login_time', $user->updatetime);
			$user->saveAttributes(array('updatetime'=>date('Y-m-d H:i:s'),'loginfrequency' => $user->loginfrequency + 1));
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode;
	}
}