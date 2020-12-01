<div class="j-contacts" itemscope itemtype="http://schema.org/Organization">
    <a class="j-phone" href="tel:<?php echo MG::getSetting('shopPhone') ?>" itemprop="telephone">
        <svg class="icon icon--phone"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--phone"></use></svg>
        <?php echo MG::getSetting('shopPhone') ?>
    </a>
    <?php if(class_exists('callme')): ?>[call-me]<?php endif; ?>
</div>