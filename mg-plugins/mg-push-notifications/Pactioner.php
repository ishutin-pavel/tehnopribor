<?php

/**
 * Класс Pactioner наследник стандарного Actioner
 * Предназначен для выполнения действий,  AJAX запросов плагина 
 *
 * @author Avdeev Mark <mark-avdeev@mail.ru>
 */
class Pactioner extends Actioner {

  private $pluginName = 'mg-push-notifications';

  /**
   * Добавление сущности в таблицу БД
   * @param type $array - массив полей и значений
   * @return array возвращает входящий массив
   */
  public function addEntity($array) {
    //доступно только модераторам и админам.
    USER::AccessOnly('1,4', 'exit()');
    unset($array['id']);
    $result = array();
    DB::buildQuery('INSERT INTO `'.PREFIX.$this->pluginName.'` SET ', $array);
    return $result;
  }

  /**
   * Обновление сущности в таблице БД
   * @param type $array - массив полей и значений
   * @return array возвращает входящий массив
   */
  public function updateEntity($array) {
    //доступно только модераторам и админам.
    USER::AccessOnly('1,4', 'exit()');
    $id = $array['id'];
    $result = false;
    if (!empty($id)) {
      if (DB::query('
        UPDATE `'.PREFIX.$this->pluginName.'`
        SET '.DB::buildPartQuery($array).'
        WHERE id = %d
      ', $id)) {
        $result = true;
      }
    } else {
      $result = $this->addEntity($array);
    }
    return $result;
  }

  /**
   * Удаление сущности
   * @return boolean
   */
  public function deleteEntity() {
    //доступно только модераторам и админам.
    USER::AccessOnly('1,4', 'exit()');
    $this->messageSucces = $this->lang['ENTITY_DEL'];
    $this->messageError = $this->lang['ENTITY_DEL_NOT'];
    if (DB::query('DELETE FROM `'.PREFIX.$this->pluginName.'` WHERE `id`= '.$_POST['id'])) {
      return true;
    }
    return false;
  }

  /**
   * Удаление получает сущность
   * @return boolean
   */
  public function getEntity() {
    $res = DB::query('
      SELECT * 
      FROM `'.PREFIX.$this->pluginName.'`
      WHERE `id` = '.$_POST['id']);

    if ($row = DB::fetchAssoc($res)) {
      $this->data = $row;
      return true;
    } else {
      return false;
    }

    return false;
  }

  /**
   * Устанавливает количество отображаемых записей в разделе вопросов-ответов
   * @return boolean
   */
  public function setcountPrintRowsNotification() {
    //доступно только модераторам и админам.
    USER::AccessOnly('1,4', 'exit()');
    $count = 20;
    if (is_numeric($_POST['count']) && !empty($_POST['count'])) {
      $count = $_POST['count'];
    }
    MG::setOption(array('option' => 'countPrintRowsNotification', 'value' => $count));
    return true;
  }

  /**
   * Сохраняет и обновляет параметры записи.
   * @return type
   */
  public function saveEntity() {
    //доступно только модераторам и админам.
    USER::AccessOnly('1,4', 'exit()');

    $this->messageSucces = $this->lang['ENTITY_SAVE'];
    $this->messageError = $this->lang['ENTITY_SAVE_NOT'];

    unset($_POST['pluginHandler']);

	  
    if (!empty($_POST['id'])) {  // если передан ID, то обновляем
      if (DB::query('
        UPDATE `'.PREFIX.$this->pluginName.'`
        SET '.DB::buildPartQuery($_POST).'
        WHERE id ='.DB::quote($_POST['id']))) {
        $this->data['row'] = $_POST; 
        } 
      else {
        return false;
      }
    } else {
      // если  не передан ID, то создаем
      if (DB::buildQuery('INSERT INTO `'.PREFIX.$this->pluginName.'` SET ', $_POST)) {
        $_POST['id'] = DB::insertId();
        $this->data['row'] = $_POST;
      } else {
        return false;
      }
    }
    return true;
  }
  
    /**
   * Сохраняет  опции плагина
   * @return boolean
   */
  public function saveBaseOption(){
    USER::AccessOnly('1,4','exit()');
    $this->messageSucces = $this->lang['SAVE_BASE'];
    $this->messageError = $this->lang['NOT_SAVE_BASE'];

    if (!empty($_POST['data'])) {
      MG::setOption(array('option' => 'push-option', 'value' => addslashes(serialize($_POST['data']))));
    }
  
$script="
importScripts('https://www.gstatic.com/firebasejs/3.7.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.7.2/firebase-messaging.js');

firebase.initializeApp({
    'messagingSenderId': '".$_POST['data']['messagingSenderId']."'
});

firebase.messaging();


self.addEventListener('notificationclick', function(event) {
    const target = event.notification.data.click_action || '/';
    event.notification.close();

    // This looks to see if the current is already open and focuses if it is
    event.waitUntil(clients.matchAll({
        type: 'window',
        includeUncontrolled: true
    }).then(function(clientList) {
        // clientList always is empty?!
        for (var i = 0; i < clientList.length; i++) {
            var client = clientList[i];
            if (client.url == target && 'focus' in client) {
                return client.focus();
            }
        }
    
        return clients.openWindow(target);
    }));
});
";

	$realDocumentRoot = str_replace(DIRECTORY_SEPARATOR . 'mg-plugins' . DIRECTORY_SEPARATOR . $this->pluginName, '', dirname(__FILE__));

    if(!file_exists($realDocumentRoot. "/serviceworker/")){
      chdir($realDocumentRoot);
      mkdir($realDocumentRoot . "/serviceworker/", 0755);    
    }    

    $fileName = $realDocumentRoot .'/serviceworker/firebase-messaging-sw.js';   
    $f = fopen($fileName, "w");
    fwrite($f, $script);
    fclose($f);
		
    return true;
  }
  
  
  /**
   * Добавляет новый токен в базу
   * @return type
 */
  public function addToken() {    
    if (!empty($_POST['tokenid'])) { 
	   DB::query("INSERT IGNORE INTO `".PREFIX.$this->pluginName."-tokenid` (`tokenid`) VALUES ( ". DB::quote($_POST['tokenid']).")");
    }
    return true;
  }

  public function getTokens() {
   $array = array();
  
   $part = $_POST['part'];
   $count = $_POST['count'];

	$res = DB::query("
       SELECT * 
	   FROM `".PREFIX.$this->pluginName."-tokenid` 
       LIMIT ".DB::quoteInt($part*$count,1)." , ".DB::quoteInt($part*$count+$count,1)
    );	

	
	while ($row = DB::fetchAssoc($res)) {
       $array[] = $row['tokenid'];
    }
	 
	$this->data['tokens']=$array;
	
    return true;
  }
  
   /**
   * Удаляет токен из базы
   * @return type
*/
  public function delToken() {
    if (!empty($_POST['arrayInvalideTokens'])){	
	
		foreach($_POST['arrayInvalideTokens'] as $item){
		   DB::query('DELETE FROM `'.PREFIX.$this->pluginName.'-tokenid` WHERE `tokenid`= '.DB::quote($item));
		}
	
    }
    return true;
  }
  
    public function clickLink() {
    if (!empty($_REQUEST['link'])){	
	
	  //  MG::loger('76666');
		//MG::loger($_REQUEST['link']);
		
		
	
		DB::query('
			UPDATE `'.PREFIX.$this->pluginName.'`
			SET countClick = countClick+1
			WHERE `id` = '.DB::quoteInt($_REQUEST['id'])
		);
		
		
		header('Location: '.$_REQUEST['link']);
		exit();
		//DB::query('DELETE FROM `'.PREFIX.$this->pluginName.'-tokenid` WHERE `tokenid`= '.DB::quote($item));

	
    }
    return true;
  }
  


}
