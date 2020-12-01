<div class="mg-contacts-block">
<!--  <p>Интернет-магазин "--><?php //echo MG::getSetting('shopName') ?><!--"</p>-->
  <p><i class="icon-location2"></i> <span><?php echo MG::getSetting('shopAddress') ?></span></p>
  <p><i class="icon-mobile"></i> Тел. <span><?php echo MG::getSetting('shopPhone') ?></span></p>
  <!-- плагин "обратный звонок" -->
  <?php if (class_exists('BackRing')): ?>
    [back-ring]
  <?php endif; ?>
  <!-- плагин "обратный звонок" -->
</div>
