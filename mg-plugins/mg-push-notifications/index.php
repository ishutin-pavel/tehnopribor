<?php

/*
  Plugin Name: Push-уведомления
  Description: При включенном плагине, посетителям на сайте будет предложено включить уведомления браузера. Из панели уплавления плагином можно отправлять уведомления подписавшимся пользователям. Сообщения отправляются мгновенно. 
  Author: Avdeev Mark
  Version: 1.0.0
 */

new PushNotifications ;

class PushNotifications  {

  private static $lang = array(); // массив с переводом плагина 
  private static $pluginName = ''; // название плагина (соответствует названию папки)
  private static $path = ''; //путь до файлов плагина 

  public function __construct() {

    mgActivateThisPlugin(__FILE__, array(__CLASS__, 'activate')); //Инициализация  метода выполняющегося при активации  
    mgAddAction(__FILE__, array(__CLASS__, 'pageSettingsPlugin')); //Инициализация  метода выполняющегося при нажатии на кнопку настроект плагина  
    
    self::$pluginName = PM::getFolderPlugin(__FILE__);
    self::$lang = PM::plugLocales(self::$pluginName);
    self::$path = PLUGIN_DIR.self::$pluginName;


    if (!URL::isSection('mg-admin')) { // подключаем CSS плагина для всех страниц, кроме админки
      mgAddMeta('<link rel="stylesheet" href="'.SITE.'/'.self::$path.'/css/style.css" type="text/css" />');
    }
	
	mgAddMeta('<script type="text/javascript" src="'.SITE.'/'.self::$path.'/js/firebase.js"></script>');	
    $option = MG::getSetting('push-option');
    $option = stripslashes($option);
    $options = unserialize($option);
	mgAddMeta('<script type="text/javascript">firebase.initializeApp({messagingSenderId: "'.$options['messagingSenderId'].'"}); </script>');
	mgAddMeta('<script type="text/javascript" src="'.SITE.'/'.self::$path.'/js/notifications.js"></script>');
  }

  /**
   * Метод выполняющийся при активации палагина 
   */
  static function activate() {
     MG::setOption(array('option' => 'countPrintRowsNotification', 'value' => 10));
    // Файл для вывода результата копируется в mg-pages

    self::createDateBase();
  }

  /**
   * Метод выполняющийся перед генераццией страницы настроек плагина
   */
  static function preparePageSettings() {
    echo '   
      <link rel="stylesheet" href="'.SITE.'/'.self::$path.'/css/style.css" type="text/css" />     
      <script type="text/javascript">
        includeJS("'.SITE.'/'.self::$path.'/js/firebase.js"); 		
		includeJS("'.SITE.'/'.self::$path.'/js/script.js");  
      </script> 
    ';
  }

  /**
   * Создает таблицу плагина в БД
   */
  static function createDateBase() {
    DB::query("
     CREATE TABLE IF NOT EXISTS `".PREFIX.self::$pluginName."` (     
      `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Порядковый номер сообщения',   
      `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      `title` text NOT NULL COMMENT 'Заголовок',
      `body` text NOT NULL COMMENT 'Тело',      
      `icon` text NOT NULL COMMENT 'Иконка',    
	  `click_action` text NOT NULL COMMENT 'Ссылка', 
	  `countClick` INT NOT NULL,
       PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

	DB::query("
     CREATE TABLE IF NOT EXISTS `".PREFIX.self::$pluginName."-tokenid` (     
      `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Порядковый номер',     
      `tokenid` varchar(255) NOT NULL COMMENT 'Заголовок',
       PRIMARY KEY (`id`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
	
	DB::query("ALTER TABLE `".PREFIX.self::$pluginName."-tokenid` ADD UNIQUE (`tokenid`)");
	
	
	
	$listView = PLUGIN_DIR.self::$pluginName.'/serviceworker/firebase-messaging-sw.js';
    if (!file_exists(PAGE_DIR.self::$pluginName.'/articleList.php')){
      copy($listView, PAGE_DIR.self::$pluginName.'/articleList.php');
    }
	
	
	
	$realDocumentRoot = str_replace(DIRECTORY_SEPARATOR . 'mg-plugins' . DIRECTORY_SEPARATOR . self::$pluginName, '', dirname(__FILE__));
/*
    if(!file_exists($realDocumentRoot. "/serviceworker/")){
      chdir($realDocumentRoot);
      mkdir($realDocumentRoot . "/serviceworker/", 0755);    
    }    
*/

	/*
    if (!file_exists($realDocumentRoot."/serviceworker/firebase-messaging-sw.js")){
      copy(PLUGIN_DIR.self::$pluginName.'/serviceworker/firebase-messaging-sw.js', $realDocumentRoot."/serviceworker/firebase-messaging-sw.js");
    }*/
	
	if (!file_exists($realDocumentRoot."/messaging-sw.js")){
      copy(PLUGIN_DIR.self::$pluginName.'/serviceworker/messaging-sw.js', $realDocumentRoot."/messaging-sw.js");
    }		
	
  }

  /**
   * Выводит страницу настроек плагина в админке
   */
  static function pageSettingsPlugin() {
    $lang = self::$lang;
    $pluginName = self::$pluginName;
    $countPrintRowsNotification = MG::getSetting('countPrintRowsNotification');
    $res = self::getEntity($countPrintRowsNotification);
    $entity = $res['entity'];
    $pagination = $res['pagination'];
	$countToken =	self::getCountToken();
 
	
	$option = MG::getSetting('push-option');
    $option = stripslashes($option);
    $options = unserialize($option);
	 
	echo '
      <script type="text/javascript">
	  var FireBaseSenderId = "'.$options['messagingSenderId'].'"
	  var KeyFireBase = "'.$options['KEY'].'"
	 </script> 
    ';
	self::preparePageSettings();
	
    include('pageplugin.php');
  }

  /**
   * Получает из БД записи
   */
  static function getEntity($count = 1) {
    $result = array();
    $sql = "SELECT * FROM `".PREFIX.self::$pluginName."` ORDER BY add_date DESC";
    if ($_POST["page"]) {
      $page = $_POST["page"]; //если был произведен запрос другой страницы, то присваиваем переменной новый индекс
    }
    $navigator = new Navigator($sql, $page, $count); //определяем класс
    $entity = $navigator->getRowsSql();
    $pagination = $navigator->getPager('forAjax');
    $result = array(
      'entity' => $entity,
      'pagination' => $pagination
    );
    return $result;
  }

  /**
   * Получает из БД все записи
   */
  static function getAllEntity() {
    $array = array();
    $sql = "SELECT * FROM `".PREFIX.self::$pluginName."` ORDER BY add_date DESC";
    $result = DB::query($sql);
    while ($row = DB::fetchAssoc($result)) {
      $array[] = $row;
    }
    return $array;
  }

  /**
   * Функция вывода на экран
   */
  static function handleShortCode() {
    $html = " ";
    return $html;
  }


   /**
   * Получает из БД записи
   */
  static function getTokens($count = 100, $part=0) {
    $array = array();
   
   $res = DB::query("SELECT * FROM `".PREFIX.self::$pluginName."-tokenid` LIMIT ".DB::quoteInt($part*$count)." , ".DB::quoteInt($part*$count+$count));	
    
	while ($row = DB::fetchAssoc($res)) {
       $array[] = $row['tokenid'];
    }
   
    return $array;
  }
  
  /**
   * Получает из БД записи
   */
  static function getCountToken() {  
    $result = DB::query("SELECT count(`tokenid`) as counttoken FROM `".PREFIX.self::$pluginName."-tokenid`");
    if ($row = DB::fetchAssoc($result)) {
      return  $row['counttoken'];
    }
	return 0;  
  }
    
}
