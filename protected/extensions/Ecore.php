<?php
# my info
define('AUTHOR', 'N.Elf-mousE');
define('WEBSITE', 'http://fmouz.com');
define('EMAIL', 'ifmouz@gmail.com');
# define
define('ECORE_PATH', dirname(__FILE__));
define('PREVIOUS_PATH', DIRECTORY_SEPARATOR . '..');
define('CSS_PATH', '/css/');
define('IMG_PATH', '/images/');
define('JS_PATH',  '/js/');
define('DS', '/');
define('ECORE_CSS_PATH', ECORE_PATH . DIRECTORY_SEPARATOR . 'css');
define('ECORE_IMG_PATH', ECORE_PATH . DIRECTORY_SEPARATOR . 'images');
define('ECORE_JS_PATH',  ECORE_PATH . DIRECTORY_SEPARATOR . 'js');
define('CSS', '.css');
define('JS',  '.js');
define('DEV', '.dev');
define('VER', '?v=');
define('BR',  '<br>');
define('JQ',  'jquery');
/**
 * Elf-mousE's framework for Yii (only)
 *
 * @author Elf-mousE
 * @copyright http://fmouz.com
 * @since 2012.03.04
 *
 * @uses
 * # config
 * 'import'=>array(
 *   ...
 *   'ext.ecore.Ecore',
 *   ...
 * ),
 *
 * # in 'yourProject/protected/components/Controller.php'
 * ...
 * private $clientScripts = array(
 *   'css' => array('ecore', 'css3', 'test'),
 *   'js'  => array(
 *     'jquery' => array('jquery.min', 'masonry.min'),
 *     'custom' => array('ecore.dev'),
 *     array('xyz')
 *   )
 * );
 * public $_ecore;
 * public $_ehtml;
 * protected $request;
 * protected $isAjax;
 * ...
 * protected function beforeRender($view) {
 *   $this->_ecore = Ecore::__getEcore();
 *   $this->_ehtml = $this->_ecore->initClientScript($this->clientScripts);
 *   ...
 *   return true;
 * }
 * ...
 * protected function beforeAction($action) {
 *   $this->request = Yii::app()->request;
 *   $this->isAjax  = $this->request->isAjaxRequest;
 *   ....
 *   return true;
 * }
 *
 * @example
 * # in views
 * $this->_ecore->function();
 * $this->_ehtml->var;
 * Ecore::function();
 */
class Ecore
{
  private static $__ecore;
  private static $__ehtml;
  private static $formatTypes = array(
      'number'   => 'number',
      'date'     => 'date',
      'time'     => 'time',
      'datetime' => 'datetime'
  );
  private $importFiles = array('Extend');
  private $assets;
  private $cs;
  private $basePath;
  private $baseUrl;
  private $controllerId;
  private $actionId;
  private $getId;
  private $moduleId;

  /**
   * Can not be cloned
   */
  final private function __clone() {
  }

  /**
   * Ecore construct
   */
  private function __construct() {
    if (isset(self::$__ecore)) throw new Exception('囧rz');
  }

  /**
   * get my Ecore
   */
  public static function __getEcore() {
    if (self::$__ecore === NULL) {
      self::$__ecore = new Ecore();
    }
    return self::$__ecore;
  }

  /**
   * compress css to one line
   */
  final private function compressCss($buffer) {
    // remove comments
    $pattern = '!/\*[^*]*\*+([^/][^*]*\*+)*/!';
    $buffer = preg_replace($pattern, '', $buffer);
    // remove new lines, tabs, spaces, etc.
    $before = array("\r\n", "\r", "\n", "\t", ' {', '} ', ';}', ', ');
    $after  = array('', '', '', '', '{', '}', '}', ',');
    $buffer = str_replace($before, $after, $buffer);
    // drop more unecessary spaces
    $buffer = preg_replace(array('!\s+!', '!(\w+:)\s*([\w\s,#]+;?)!'), array(' ', '$1$2'), $buffer);
    return $buffer;
  }

  /**
   * Elf-mousE's css & js for Yii layouts
   */
  public function initClientScript($yiiDebug, $clientScripts = array(), $dev = FALSE, $combine = FALSE, $compress = FALSE) {
    Yii::app()->clientScript->registerCoreScript('jquery');
    if (self::$__ehtml === NULL) {
      self::$__ehtml          = new stdClass();
      self::$__ehtml->mainCss = null;
      self::$__ehtml->mainJs  = null;
      self::$__ehtml->ctrlJs  = false;
      self::$__ehtml->actJs   = false;
      self::$__ehtml->getJs   = false;
	  self::$__ehtml->modJs   = false;
      $this->cs           = Yii::app()->clientScript;
      $this->basePath     = Yii::app()->basePath;
      $this->baseUrl      = Yii::app()->request->baseUrl;
      $this->moduleId     = Yii::app()->controller->module ? Yii::app()->controller->module->id : null;
      $this->controllerId = strtolower(Yii::app()->controller->id);
      $this->actionId     = strtolower(Yii::app()->controller->action->id);
      $this->getId        = null;
      // get $_GET param for first one
      if (isset($_GET)) {
        foreach ($_GET as $get) {
          if(!is_array($_GET)) {
            $this->getId = strtolower($get);
          }
          break;
        }
      }
      // define js filename
      //$ctrlJs = $this->controllerId . DS . $this->controllerId . JS;
	  $modJs  = isset($this->moduleId) ? 'modules'.DS.$this->moduleId . DS . $this->moduleId . JS : null;
	  $ctrlJs = isset($this->moduleId) ? 'modules'.DS.$this->moduleId . DS . $this->controllerId . DS . $this->controllerId . JS : $this->controllerId . DS . $this->controllerId . JS;
      $actJs  = isset($this->moduleId) ? 'modules'.DS.$this->moduleId . DS . $this->controllerId . DS . "{$this->controllerId}-{$this->actionId}" . JS : $this->controllerId . DS . "{$this->controllerId}-{$this->actionId}" . JS;
      $getJs  = isset($this->getId) ? "{$this->controllerId}-{$this->actionId}_{$this->getId}" . JS : null;
      if ($dev) {
        // define css filename
        $mainCss   = array();
		$modCss    = $this->moduleId . CSS;
        $ctrlCss   = $this->controllerId . CSS;
        $actCss    = "{$this->controllerId}-{$this->actionId}" . CSS;
        $getCss    = isset($this->getId) ? "{$this->controllerId}-{$this->actionId}_{$this->getId}" . CSS : null;
        $mainJs    = array();
        // main client scripts
        if (isset($clientScripts['css'])) {
          foreach ($clientScripts['css'] as $key => $value) {
            $mainCss[$key] = $value . CSS;
          }
        }
        if (isset($clientScripts['js'])) {
          foreach ($clientScripts['js'] as $key => $value) {
            if (is_string($key)) {
              foreach ($value as $val) {
                $mainJs[] = $key . DS . $val . JS;
              }
            }
            else {
              foreach ($value as $val) {
                $mainJs[] = $val . JS;
              }
            }
          }
        }
        // for css & javascript
        $cssFilenames = array_merge($mainCss, array( 'mod'=>$modCss, 'ctrl' =>$ctrlCss, 'act' => $actCss, 'get' => $getCss));
        $jsFilenames  = array_merge($mainJs, array( 'mod'=> $modJs ,'ctrl' => $ctrlJs, 'act' => $actJs, 'get' => $getJs));
        $cssVersions  = array();
        $jsVersions   = array();
        // filter invalid filename
        foreach ($cssFilenames as $key => $filename) {
          $file = $this->basePath . PREVIOUS_PATH . CSS_PATH . $filename;
          if (!(isset($filename) && file_exists($file))) {
            unset($cssFilenames[$key]);
          }
          else {
            $cssVersions[] = filemtime($file);
          }
        }
        foreach ($jsFilenames as $key => $filename) {
          $file = $this->basePath . PREVIOUS_PATH . JS_PATH . $filename;
          if (!(isset($filename) && file_exists($file))) {
            unset($jsFilenames[$key]);
          }
          else {
            switch ($key) {
			  case 'mod':
                self::$__ehtml->modJs = $this->moduleId;
                break;
              case 'ctrl':
                self::$__ehtml->ctrlJs = $this->controllerId;
                break;
              case 'act':
                self::$__ehtml->actJs  = $this->controllerId . ucfirst($this->actionId);
                break;
              case 'get':
                self::$__ehtml->getJs  = $this->controllerId . ucfirst($this->actionId) . ucfirst($this->getId);
                break;
              default:
                break;
            }
            $jsVersions[] = filemtime($file);
          }
        }
        // create css & js
        if (!$combine) {
          // for development
          foreach ($cssFilenames as $filename) {
            $filename = CSS_PATH . $filename;
            $file = $this->basePath . PREVIOUS_PATH . $filename;
            $this->cs->registerCssFile($this->baseUrl . $filename . VER . filemtime($file));
          }
          foreach ($jsFilenames as $filename) {
            $filename = JS_PATH . $filename;
            $file = $this->basePath . PREVIOUS_PATH . $filename;
            $this->cs->registerScriptFile($this->baseUrl . $filename . VER . filemtime($file), CClientScript::POS_END);
          }
        }
        else {
          if ($compress) {
            $css = '';
            $js  = '';
            // css for compress
            foreach ($cssFilenames as $filename) {
              $filename = CSS_PATH . $filename;
              $file = $this->basePath . PREVIOUS_PATH . $filename;
              $pathinfo = pathinfo($file);
              if ($pathinfo['extension'] === 'css') {
                $css .= $this->compressCss(file_get_contents($file));
              }
            }
            $this->cs->registerCss(0, $css);
            foreach ($jsFilenames as $filename) {
              $filename = JS_PATH . $filename;
              $file = $this->basePath . PREVIOUS_PATH . $filename;
              $this->cs->registerScriptFile($this->baseUrl . $filename . VER . filemtime($file), CClientScript::POS_END);
            }
          }
          else {
            self::$__ehtml->mainCss = implode(',', $cssFilenames) . VER . implode(',', $cssVersions);
            self::$__ehtml->mainJs  = implode(',', $jsFilenames) . VER . implode(',', $jsVersions);
            $this->cs->registerCssFile($this->baseUrl . CSS_PATH . self::$__ehtml->mainCss);
            $this->cs->registerScriptFile($this->baseUrl . JS_PATH . self::$__ehtml->mainJs, CClientScript::POS_END);
          }
        }
      }
      else {
        // cache main css & js then ...
      }
      if (self::$__ehtml->actJs) {
        $this->cs->registerScript(2, '$.lottery.app.page = new ' . self::$__ehtml->actJs . 'Action();', CClientScript::POS_END);
      }
      // for import
      foreach ($this->importFiles as $file) {
       // Yii::import("ext.ecore.{$file}");
      }
      // for layout
      self::$__ehtml->basePath = $this->basePath;
      self::$__ehtml->baseUrl  = $this->baseUrl;
      self::$__ehtml->ctrlId   = $this->controllerId;
      self::$__ehtml->actId    = $this->actionId;
      self::$__ehtml->cssUrl   = $this->baseUrl . CSS_PATH;
      self::$__ehtml->jsUrl    = $this->baseUrl . JS_PATH;
      self::$__ehtml->yiiDebug = $yiiDebug;
    }
    return self::$__ehtml;
  }

  /**
   * get current url
   * @return string
   */
  public static function getCurrentUrl() {
    return Yii::app()->request->baseUrl . DS . Yii::app()->request->pathInfo;
  }
}