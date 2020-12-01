/* 
 * Модуль  PushNotifications, подключается на странице настроек плагина.
 */
firebase.initializeApp({
  messagingSenderId: FireBaseSenderId,
});
 
var sectionName = $('#sectionName').data('name');


var PushNotifications = (function () {  
  return {
    lang: [], // локаль плагина 
	KEY: KeyFireBase,
    init: function () {
	
        // установка локали плагина 
		admin.ajaxRequest({
		  mguniqueurl: "action/seLocalesToPlug",
		  supportCkeditor: null,
		  pluginName: sectionName,
		},
		
		function (response) {
			PushNotifications.lang = response.data;
		});

		 // Показывает панель с настройками.
		  $('.admin-center').on('click', '.section-mg-push-notifications .show-property', function() {
			$('.property-order-container').slideToggle(function() {
			  $('.widget-table-action').toggleClass('no-radius');
			});
		  });
	  
		// Выводит модальное окно для добавления
		$('.admin-center').on('click', '.section-mg-push-notifications .add-new-button', function () {
		  PushNotifications.showModal('add');
		});
		
		// Выводит модальное окно для редактирования
		$('.admin-center').on('click', '.section-mg-push-notifications .edit-row', function () {
		  var id = $(this).data('id');
		  PushNotifications.showModal('edit', id);    
		});
		
		// Сохраняет изменения в модальном окне
		$('.admin-center').on('click', '.section-mg-push-notifications .save-button', function () {
		  var id = $(this).data('id');
		   PushNotifications.saveField(id);
		});
		
		// Устанавливает количиство выводимых записей в этом разделе.
		$('.admin-center').on('change', '.section-mg-push-notifications .countPrintRowsNotification', function () {
		  var count = $(this).val();
		  admin.ajaxRequest({
			mguniqueurl: "action/setcountPrintRowsNotification",
			pluginHandler: 'mg-push-notifications',
			count: count
		  },
		 function (response) {
		 admin.refreshPanel();
		 });
		});

		// Удаляет запись
		$('.admin-center').on('click', '.section-mg-push-notifications .delete-row', function () {
		  var id = $(this).data('id');
		  PushNotifications.deleteEntity(id);
		});
		
		
	   // Сохраняет базовые настроки запись
      $('.admin-center').on('click', '.section-mg-push-notifications .base-setting-save', function() {

        var obj = '{';
        $('.section-mg-push-notifications .list-option input').each(function() {
          obj += '"' + $(this).attr('name') + '":"' + admin.htmlspecialchars($(this).val()) + '",';
        });
        obj += '}';

        //преобразуем полученные данные в JS объект для передачи на сервер
        var data =  eval("(" + obj + ")");       

        admin.ajaxRequest({
            mguniqueurl: "action/saveBaseOption", // действия для выполнения на сервере
            pluginHandler: 'mg-push-notifications', // плагин для обработки запроса
            data:  data, // id записи
          },

          function(response) {
            admin.indication(response.status, response.msg);
			$('.property-order-container').slideToggle(function() {
			  $('.widget-table-action').toggleClass('no-radius');
			});
          }

        );

      });
	  
	
    },
    /* открывает модальное окно 
     * @param {type} type -тип окна, для редактирования или для добавления
     * @param {type} id - номер записи, которая открыта на редактирование
     * @returns {undefined}
    */
    showModal: function (type, id) {
      
      switch (type) {
        case 'add': {
          PushNotifications.clearField();
          break;
        }
        case 'edit': {
          PushNotifications.clearField();         
          $(sectionName+' .html-content-edit-plugin').show();
          PushNotifications.fillField(id);
          break;
        }
        default: {
          break;
        }
      }
	  


      admin.openModal("#mg-push-notifications-modal");
    },
    /**
     * Очистка модального окна
    */
    clearField: function () {
      $("#mg-push-notifications-modal input[data-name=title]").val('');
	  $("#mg-push-notifications-modal textarea[data-name=body]").val('');
	  $("#mg-push-notifications-modal input[data-name=icon]").val('');
	  $("#mg-push-notifications-modal input[data-name=click_action]").val('');
	
      $(sectionName+' #'+sectionName+' .save-button').data('id', '');      
      $(".errorField").hide();
    },
  
    /**
     * Сохранение данных из модального окна
     * @param {type} id
     * @returns {undefined}
    */
    saveField: function (id) {
      
	    var notification = {};		 
		notification['title'] = $("#mg-push-notifications-modal input[data-name=title]").val();
	    notification['body'] = $("#mg-push-notifications-modal textarea[data-name=body]").val();
	    notification['icon'] = $("#mg-push-notifications-modal input[data-name=icon]").val();
		notification['click_action'] = $("#mg-push-notifications-modal input[data-name=click_action]").val();		
		   
		admin.ajaxRequest({
			mguniqueurl: "action/saveEntity", // действия для выполнения на сервере
			pluginHandler: 'mg-push-notifications', // плагин для обработки запроса			
			title: $("#mg-push-notifications-modal input[data-name=title]").val(),
			body: $("#mg-push-notifications-modal textarea[data-name=body]").val(),
			icon: $("#mg-push-notifications-modal input[data-name=icon]").val(),
			click_action: $("#mg-push-notifications-modal input[data-name=click_action]").val(),
        },
        function (response) {
          admin.indication(response.status, response.msg);
		  ////console.log(response.data.row.id);
		  notification['click_action'] =  mgBaseDir + "/ajaxrequest?mguniqueurl=action%2FclickLink&pluginHandler=mg-push-notifications&id="+response.data.row.id+"&link="+notification['click_action'];
	      PushNotifications.sendToTokens(notification);	
         // admin.refreshPanel();
        }  
	  		
				
	
			
	  
        );
       
	       	
			  
    },
    
    /**    
     * Удаляет  строку сущности в главной таблице
     * @param {type} data - данные для вывода в строке таблицы
    */
    deleteEntity: function (id) {
      if (!confirm(lang.DELETE + '?')) {
        return false;
      }
	  
      admin.ajaxRequest({
        mguniqueurl: "action/deleteEntity", // действия для выполнения на сервере
        pluginHandler: 'mg-push-notifications', // плагин для обработки запроса
        id: id
      },
	  
      function (response) {
        admin.indication(response.status, response.msg);
        admin.refreshPanel();
      });
	},
	

	
	sendNotification: function (notification,arrayTokens) {
    var key = PushNotifications.KEY;
	
    	//console.log('Send notification', notification);

		// токены которые уже не актуальны
		var arrayInvalideTokens = [ ];
		
            fetch('https://fcm.googleapis.com/fcm/send', {
                'method': 'POST',
                'headers': {
                    'Authorization': 'key=' + key,
                    'Content-Type': 'application/json'
                },
                'body': JSON.stringify({
                    'notification': notification,
                    //'to': currentToken,
					"registration_ids": arrayTokens
                })
				
				
            }).then(function(response) {
			//console.log('Response', response);
                return response.json();
            }).then(function(json) {
                //console.log('Response', json);
				$.each(json.results, function(index, obj){
					//console.log("INDEX: " + index + " message_id: " + obj.message_id+ " error: " + obj.error);
					if(obj.error){
					  arrayInvalideTokens.push(arrayTokens[index]);			
					}
				});
				
				//console.log('Удалить токен из базы список токенов');
				//console.log(arrayInvalideTokens);
				
			    PushNotifications.deleteTokens(arrayInvalideTokens);
				

            }).catch(function(error) {
		     	//console.log(error);
				admin.indication('erroe', error);
              
            });
		
		},

    sendToTokens: function (notification, count=1000,part=0) {
  
      admin.ajaxRequest(
	  {
        mguniqueurl: "action/getTokens", // действия для выполнения на сервере
        pluginHandler: 'mg-push-notifications', // плагин для обработки запроса
        count: count,
		part: part,
      },	  
      function (response) {	
          //console.log(response.data.tokens.length);
		  
	
	    if(response.data.tokens.length > 0){
		 
		  console.log("Отправлено на "+response.data.tokens.length+ "шт. устройств");
		  //console.log(response.data.tokens);
		   
		  PushNotifications.sendNotification(notification, response.data.tokens );		   
  	      PushNotifications.sendToTokens(notification, count, part+1 );
		   
		 }else{
		   admin.refreshPanel();
		 }
		 
		
      });
	  
	  
	},
	
	
	
	
    deleteTokens: function (arrayInvalideTokens) {
  
  
      admin.ajaxRequest(
	  {
        mguniqueurl: "action/delToken", // действия для выполнения на сервере
        pluginHandler: 'mg-push-notifications', // плагин для обработки запроса
        arrayInvalideTokens: arrayInvalideTokens,

      },	  
      function (response) {	
          //console.log(response.data);		
      });	  
	  
	}

	
	}
	
	
  })();
  
admin.initToolTip();
PushNotifications.init();
