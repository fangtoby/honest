<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $uid
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $userimage
 * @property integer $userpower
 * @property integer $loginfrequency
 * @property string $createtime
 * @property string $updatetime
 */
class Users extends CActiveRecord
{
	public $rpassword;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public function initClear()
	{
		$this->password = '';	
		$this->rpassword = '';	
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password,rpassword,email', 'required'),
			array('email','email'),
			array('updatetime','addUpdateTime','on'=>'update'),
			array('createtime , updatetime','addTime','on'=>'create'),
			array('email','itMusebeOnly','on'=>'create'),
			array('email','itMusebeSelf','on'=>'update'),
			array('password', 'compare', 'compareAttribute'=>'rpassword'),
			array('username, password, email, userimage', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, username, password, email, userimage, userpower, loginfrequency, createtime, updatetime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'User ID',
			'username' => 'User Name',
			'password' => 'Password',
			'rpassword'=>'Repeat Password again',
			'email' => 'Email Address',
			'userimage' => 'image',
			'userpower' => 'User power',
			'loginfrequency' => 'Login /HZ',
			'createtime' => 'Create Time',
			'updatetime' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('uid',$this->uid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('userpower',$this->userpower);
		$criteria->compare('loginfrequency',$this->loginfrequency);
		$criteria->compare('createtime',$this->createtime,true);
		$criteria->compare('updatetime',$this->updatetime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function itMusebeOnly($attribute,$params)
	{
		if(isset($this->email)){
			$user = Users::model()->find('email = :email',array(':email'=>$this->email));
			if(count($user)){
				$this->addError('email','email exist.input a new email.');
			}
		}
	}
	public function itMusebeSelf($attribute,$params)
	{
		if(isset($this->email)){
			$user = Users::model()->find('email = :email',array(':email'=>$this->email));
			if($this->email == $user->email && $this->uid != $user->uid){
				$this->addError('email','email exist.input a new email.');
			}
		}
	}
	public function encryption()
	{
		$this->password = hash('sha256', $this->password);
		$this->rpassword = hash('sha256', $this->rpassword);
	}
	
	public function addUpdateTime($attribute,$params)
	{
		$this->updatetime = Util::getTime(time());
	}
	public function addTime($attribute,$params)
	{
		$now = Util::getTime(time());
		$this->updatetime = $now;
		$this->createtime = $now;
	}
}