<!--
Доступны переменные:
  $pluginName - название плагина
  $lang - массив фраз для выбранной локали движка
  $options - набор данного плагина хранимый в записи таблиц mg_setting - количесвто записей
  $entity - набор записей сущностей плагина из его таблицы
  $pagination - блок навигациицам 
-->

<div id="sectionName" data-name="section-<?php echo $pluginName ?>" data-pluginname="section-<?php echo $pluginName ?>" class="section-<?php echo $pluginName ?> plugin-padding"><!-- $pluginName - задает название секции для разграничения JS скрипта -->
    <!-- Тут начинается Верстка модального окна -->
    <div class="reveal-overlay" style="display:none;">
      <div class="reveal xssmall  add-faq-question" id="<?php echo $pluginName ?>-modal" style="display:block;"><!-- блок для контента модального окна -->
        <button class="close-button closeModal" type="button"><i class="fa fa-times-circle-o" aria-hidden="true"></i></button>  
        <div class="reveal-header"><!-- Заголовок модального окна -->
          <h4 class="pages-table-icon" id="modalTitle">
             Отправить сообщение на все устройства пользователей
          </h4><!-- Иконка + Заголовок модального окна -->
        </div>
        <div class="reveal-body"><!-- Содержимое окна, управляющие элементы -->     
          <ul class="text-list">
            <li>
              <span class="custom-text">Заголовок</span> <a class='tool-tip-top fa fa-question-circle' title='Заголовок сообщения, отправленного пользователям'></a>
              <input type="text" data-name="title" class="question-input" value=""/>
              <div class="errorField" data-error = "question">Заполните не больше 20 символов</div>
            </li>
			<li>
              <span class="custom-text">Сообщение</span> <a class='tool-tip-top fa fa-question-circle' title='Тело сообщения, отправленного пользователям'></a>
              <textarea data-name="body" class="question-input" value="" rows="5"/>
              <div class="errorField" data-error = "question">Заполните не больше 20 символов</div>
            </li>
			<li>
                    <span class="custom-text">Иконка</span> <a class='tool-tip-top fa fa-question-circle' title='Ссылка на картинку для сообщения, отправленного пользователям'></a>
                    <input type="text" data-name="icon" class="question-input" value=""/>
                    <div class="errorField" data-error = "question">Заполните</div>
                  </li>
			<li>
              <span class="custom-text">Ссылка</span> <a class='tool-tip-top fa fa-question-circle' title='Ссылка, по которой, перейдет пользователь при нажатии на сообщение'></a>
              <input type="text" data-name="click_action" class="question-input" value=""/>
              <div class="errorField" data-error = "question">Заполните</div>
            </li>			
          </ul>
        </div>
        <div class="reveal-footer clearfix">
          <button class="save-button tool-tip-bottom button success fl-right" data-id="" title="Отправить на все устройства"><!-- Кнопка действия -->
              <i class="fa fa-floppy-o"></i> <span>Отправить на все устройства</span>
          </button>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <!-- Тут заканчивается Верстка модального окна -->
    <!--Кнопка добавления новой записи -->
    <div class="widget-table-action">
	    <p>Всего зарегистрировано устройств: <?php echo $countToken ?> шт.</p>
	
	    <div class="settings-button show-property tool-tip-top button info"  style="margin-right:50px; float:left;" title="Настройки">
            <span><i class="fa fa fa-cogs"></i>Настройки</span>
        </div> 
		
        <div class="add-new-button tool-tip-bottom button success fl-left"  style="margin-right:50px;" title="Отправить сообщение на все устройства пользователей">
            <span><i class="fa fa-plus-circle"></i> Отправить сообщение на все устройства пользователей</span>
        </div>

        <div class="filter fl-right">
            <span class="last-items">Сообщений на странице </span>
            <select class="last-items-dropdown countPrintRowsNotification small">
                <?php
                foreach (array(10, 20, 30, 50, 100) as $value) {
                  $selected = '';
                  if ($value == $countPrintRowsNotification) {
                    $selected = 'selected="selected"';
                  }
                  echo '<option value="'.$value.'" '.$selected.' >'.$value.'</option>';
                }
                ?>
            </select>
        </div>
		
		
		

        <div class="clear"></div>
		
	  <div class="property-order-container" style="display:none;">    
      <h2>Настройки подключения к сервису отправки уведомлений firebase.google.com:</h2>

        <form  class="base-setting" name="base-setting" method="POST">       
		<p>
		1. Зарегистрируйте ваш проект на сайте <a href="https://console.firebase.google.com">https://console.firebase.google.com</a>
		</p>
		<p>
		2. Введите учетные данные для вашего проекта с сайта <a href="https://console.firebase.google.com">https://console.firebase.google.com</a> Найти необходимые данные вы можете в разделе "Настройки проекта"->"CLOUD MESSAGING"
		</p>
          <ul class="list-option">
            <li><label>
			<span><strong>Идентификатор отправителя:</strong></span><a class="fa fa-question-circle" href="javascript:void(0);" title="В настройках проекта скопируйте числовой индентификатор проекта, на подобии этого: 977992713673"></a>
			<input style="width:300px;" type="text" name="messagingSenderId" value="<?php echo $options['messagingSenderId']?>">	
			</label></li>
            <li><label><span><strong>Ключ сервера:</strong></span><a class="fa fa-question-circle" href="javascript:void(0);" title="В настройках проекта скопируйте токен ключа, на подобии этого: AAAA9F0DWuE:APA91bFznMJY7p2N9usPGqCHRAjcAloowMpkBNCj4cEG9cN7S4I3dL4XiUVrMjzFN9W2Lcdztt4kY9AOcxqGjT93Yo159I9iskMHJ9GWuk8axZTLzhxOZCy-nnx3_RluvUcbFOPihL9X"></a>
			<input style="width:300px;" type="text" name="KEY" value="<?php echo $options['KEY']?>"></label></li>            
          </ul>
          <div class="clear"></div>
        </form>
        <div class="clear"></div>
      <a href="javascript:void(0);" class="base-setting-save custom-btn button success"><span><i class="fa fa-floppy-o" aria-hidden="true"></i> Сохранить</span></a>
      <div class="clear"></div>
    </div>
	
    </div>
    <!-- Тут начинается верстка видимой части станицы настроек плагина-->
    <div class="wrapper-entity-setting">
    
        <!-- Тут начинается верстка таблицы сущностей  -->
        <div class="entity-table-wrap">
            <div class="entity-settings-table-wrapper">
                <table class="main-table">
                    <thead>
                        <tr>
                            <th style="width:100px;">Отправлено</th>
							  <!-- <th style="width:100px;">Иконка</th> -->
							  <th style="width:250px;">Заголовок</th>
							  <th style="width:400px;">Сообщение</th>	
							  <th style="width:100px;">Ссылка</th>
							  <th style="width:40px;">Клики</th>
                            <th class="actions" style="width:50px;">Действия</th>
                        </tr>
                    </thead>
                    <tbody class="entity-table-tbody">          
                          <?php foreach ($entity as $row): ?>
                            <tr data-id="<?php echo $row['id']; ?>">
							    <td>
                                    <?php echo date('d.m.Y H:i', strtotime($row['add_date'])); ?>
                                </td>
							    <!-- <td>
                                                     <img src="<?php //echo $row['icon'] ?>"/> 
                                                  </td> -->
                                <td>
                                    <?php echo $row['title'] ?>
                                </td>
								
								<td>
                                    <?php echo $row['body'] ?>
                                </td>
								<td>                   
									<?php echo $row['click_action'] ?>
                                </td>				
								<td>
                                    <?php echo $row['countClick'] ?>
                                </td>
								
                                <td class="actions">
                                    <ul class="action-list"><!-- Действия над записями плагина -->                                       
                                        <li class="delete-row"
                                            data-id="<?php echo $row['id'] ?>">
                                            <a class="tool-tip-bottom" href="javascript:void(0);"
                                               title="Удалить"><i class="fa fa-trash"></i></a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                          <?php endforeach; ?>
                    
                    </tbody>
                </table>
				  <div class="clear"></div>
				 <?php echo $pagination ?>  <!-- Вывод навигации -->
				<div class="clear"></div>
            </div>
        </div>
       
    </div>
</div>