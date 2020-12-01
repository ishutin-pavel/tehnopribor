
<?php

echo '<div class="section-settings">' . "\r\n\r\n" . '<div class="row">' . "\r\n" . '  <div class="large-12 columns">' . "\r\n" . '    <div class="widget settings">' . "\r\n" . '      <div class="widget-header clearfix"><i class="fa fa-cogs" aria-hidden="true"></i> Настройки сайта</div>' . "\r\n" . '      <div class="widget-body">' . "\r\n" . '        <div class="widget-panel-holder">' . "\r\n" . '          <div class="widget-panel" style="border-bottom:0;padding-bottom:0;">' . "\r\n" . '            <ul class="tabs custom-tabs system-tabs">' . "\r\n" . '              <li class="tabs-title is-active tabs-title-settings" id="tab-shop"><a href="javascript:void(0)" data-target="#tab-shop-settings" title="';
echo $lang['T_TIP_TAB_SHOP'];
echo '">';
echo $lang['STNG_TAB_SHOP'];
echo '</a></li>' . "\r\n\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-system"><a href="javascript:void(0)" data-target="#tab-system-settings" title="';
echo $lang['T_TIP_TAB_SYSTEM'];
echo '">';
echo $lang['STNG_TAB_SYSTEM'];
echo '</a></li>' . "\r\n\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-template"><a href="javascript:void(0)" data-target="#tab-template-settings" title="';
echo $lang['T_TIP_TAB_TEMPLATE'];
echo '">';
echo $lang['STNG_TAB_TEMPLATE'];
echo '</a></li>' . "\r\n\r\n" . '              <li class="tabs-title tabs-title-settings" id="interface"><a href="javascript:void(0)" data-target="#interface-settings" title="';
echo $lang['T_TIP_TAB_INTERFACE'];
echo '">';
echo $lang['STNG_TAB_INTERFACE'];
echo '</a></li>' . "\r\n" . '              ';

if (0 < USER::access('product')) {
	echo '<li class="tabs-title tabs-title-settings" id="tab-userField"><a href="javascript:void(0)" data-target="#tab-userField-settings" title="';
	echo $lang['T_TIP_TAB_USERFIELDS'];
	echo '">';
	echo $lang['STNG_USER_FIELD'];
	echo '</a></li>';
}

echo "\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-currency"><a href="javascript:void(0)" data-target="#tab-currency-settings" title="';
echo $lang['T_TIP_CURRENCY_SHOP'];
echo '">';
echo $lang['STNG_CURRENCY_SHOP'];
echo '</a></li>' . "\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-deliveryMethod"><a href="javascript:void(0)" data-target="#tab-deliveryMethod-settings" title="';
echo $lang['T_TIP_TAB_DELIVERY'];
echo '">';
echo $lang['STNG_TAB_DELIVERY'];
echo '</a></li>' . "\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-paymentMethod"><a href="javascript:void(0)" data-target="#tab-paymentMethod-settings" title="';
echo $lang['T_TIP_TAB_PAYMENT'];
echo '">';
echo $lang['STNG_TAB_PAYMENT'];
echo '</a></li>' . "\r\n\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-SEOMethod"><a href="javascript:void(0)" data-target="#SEOMethod-settings"  title="';
echo $lang['T_TIP_TAB_SEO'];
echo '">';
echo $lang['STNG_TAB_SEO'];
echo '</a></li>' . "\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-1C"><a href="javascript:void(0)" data-target="#1C-settings" title="';
echo $lang['T_TIP_TAB_1C'];
echo '">';
echo $lang['STNG_TAB_1C'];
echo '</a></li>' . "\r\n\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-Integration"><a href="javascript:void(0)" data-target="#integration-settings" title="';
echo $lang['STNG_TAB_INTEGRATION'];
echo '">';
echo $lang['STNG_TAB_INTEGRATION'];
echo '</a></li>' . "\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-language"><a href="javascript:void(0)" data-target="#tab-language-settings" title="';
echo $lang['STNG_TAB_LANGUAGE'];
echo '">';
echo $lang['STNG_TAB_LANGUAGE'];
echo '</a></li>' . "\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-api"><a href="javascript:void(0)" data-target="#tab-api-settings" title="API">API</a></li>' . "\r\n" . '              <li class="tabs-title tabs-title-settings" id="tab-storage"><a href="javascript:void(0)" data-target="#tab-storage-settings" title="';
echo $lang['STORAGES'];
echo '">';
echo $lang['STORAGES'];
echo '</a></li>' . "\r\n" . '              ';

if (0 < USER::access('product')) {
	echo '<li class="tabs-title tabs-title-settings" id="tab-wholesale"><a href="javascript:void(0)" data-target="#tab-wholesale-settings" title="';
	echo $lang['WHOLESALE_SETTINGS_1'];
	echo '">';
	echo $lang['WHOLESALE_SETTINGS_1'];
	echo '</a></li>';
}

echo "\r\n" . '            </ul>' . "\r\n" . '          </div>' . "\r\n" . '        </div>' . "\r\n" . '      </div>' . "\r\n" . '      <div class="tabs-content tabs-content-settings">' . "\r\n" . '        <div class="tabs-panel is-active main-settings-container" id="tab-shop-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-shop-settings.php';
echo '         ' . "\r\n" . '        </div>' . "\r\n" . '        ' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-system-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-system-settings.php';
echo '        </div>' . "\r\n\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-template-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-template-settings.php';
echo '        </div>' . "\r\n\r\n" . '        <div class="tabs-panel main-settings-container" id="interface-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/interface-settings.php';
echo '        </div>' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-userField-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-userfield-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-currency-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-currency-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-deliveryMethod-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-deliverymethod-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-paymentMethod-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-paymentmethod-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n\r\n" . '        <div class="tabs-panel main-settings-container" id="SEOMethod-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/seomethod-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="1C-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/1c-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n\r\n" . '        <div class="tabs-panel main-settings-container" id="integration-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/integration-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-language-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-language-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-api-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-api-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-storage-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-storage-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n" . '        <div class="tabs-panel main-settings-container" id="tab-wholesale-settings">' . "\r\n" . '          ';
include_once ADMIN_DIR . '/section/views/settings-tab/tab-wholesale-settings.php';
echo '    ' . "\r\n" . '        </div>' . "\r\n\r\n" . '      </div>' . "\r\n" . '    </div>' . "\r\n" . '  </div>' . "\r\n" . '</div>' . "\r\n\r\n" . '<!--Раздел настроек пользовательских полей-->' . "\r\n" . '<!--Содержимое, показываемое при удачном загрузке архива с обновлением-->' . "\r\n" . '<div id="hiddenMsg" style="display:none">' . "\r\n" . '    ';
echo $lang['SETTING_LOCALE_10'];
echo ' <b><span id="lVer"></span></b> ';
echo $lang['SETTING_LOCALE_11'];
echo '<br>' . "\r\n" . '    <a href="javascript:void(0);" rel="postDownload" class="button"><span>';
echo $lang['SETTING_LOCALE_12'];
echo '</span></a>' . "\r\n" . '</div>' . "\r\n\r\n" . '</div>' . "\r\n" . '<span id="admin-curr-check" data-db="';
echo MG::get('dbCurrency');
echo '" data-eng="';
echo MG::getSetting('currencyShopIso');
echo '" style="display: none;"></span>' . "\r\n" . '<script>' . "\r\n" . '$(\'.memcache-conection\').hide();' . "\r\n" . '$(\'input[name="cacheHost"]\').parents(\'li\').hide();' . "\r\n" . '$(\'input[name="cachePort"]\').parents(\'li\').hide();' . "\r\n" . '$(\'input[name="cachePrefix"]\').parents(\'li\').hide();' . "\r\n\r\n" . 'if($(\'.section-settings  select[name="cacheMode"]\').val()=="MEMCACHE"){' . "\r\n" . '  $(\'.memcache-conection\').show();' . "\r\n" . '  $(\'input[name="cacheHost"]\').parents(\'li\').show();' . "\r\n" . '  $(\'input[name="cachePort"]\').parents(\'li\').show();' . "\r\n" . '  $(\'input[name="cachePrefix"]\').parents(\'li\').show();' . "\r\n" . '}' . "\r\n" . 'if ($(\'.section-settings  input[name="smtp"]\').val()=="false"){' . "\r\n" . '  $(\'.section-settings  input.smtpSettings\').parents(\'li\').hide();' . "\r\n" . '}' . "\r\n" . 'if ($(\'.section-settings #tab-shop-settings input[name=sessionToDB]\').val() != \'true\') {' . "\r\n" . ' $(\'.section-settings #tab-shop-settings input[name=sessionLifeTime]\').parents(\'li\').hide();' . "\r\n" . '}' . "\r\n\r\n" . '$("body").foundation();' . "\r\n" . '</script>';

?>
