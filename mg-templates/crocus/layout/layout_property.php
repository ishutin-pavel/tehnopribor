<?php echo $data['htmlProperty'];?>
<?php echo $data['blockVariants']; ?>
<?php echo $data['addHtml']; ?>
<div class="buy-container <?php echo (MG::get('controller')=='controllers_product') ? 'product': '' ?>"

    <?php if (MG::get('controller')=='controllers_product') { echo ($data['maxCount']=="0"||!$data['activity']?'style="display:none"':''); }?> >

    <!-- JSProperty - start -->
    <?php if(class_exists('JSProperty')): ?>[jsproperty id="<?php echo $data['id']?>"]<?php endif; ?>
    <!-- JSProperty - end -->

    <div class="hidder-element" <?php echo ($data['noneButton']?'style="display:none"':'') ?> >

        <!-- amount - start -->
        <div class="j-amount  cart_form">
            <div class="j-amount__inner   amount_change">
                <a href="#" class="j-amount__arrow j-amount__arrow__minus   down">
                    <svg class="icon icon--arrow-left"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-left"></use></svg>
                </a>
                <input type="text" name="amount_input" class="amount_input" data-max-count="<?php echo $data['maxCount'] ?>" value="1" />
                <a href="#" class="j-amount__arrow j-amount__arrow__plus    up">
                    <svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg>
                </a>
            </div>
        </div>
        <!-- amount - end -->

        <input type="hidden" name="inCartProductId" value="<?php echo $data['id'] ?>">

        <?php
        $count = $data['maxCount'];
        if($count == 0){ $model = new Models_Product(); $variants = $model->getVariants($data['id']); if($variants){ $count = 0;

        foreach($variants as $variant){ $count += $variant['count']; } } } ?>

        <?php if(!$data['noneButton']||($count>0||$count<0)){ ?>

        <?php if($data['ajax']){ if($data['buyButton']){ ?>

        <!-- buttons in catalog.php - start -->
        <?php echo $data['buyButton']; ?>
        <!-- buttons in catalog.php - end -->

        <?php }
        else{ ?>

        <!-- buttons in product.php - start -->
        <a class="<?php echo $data['classForButton'] ?>" href = "<?php echo SITE.'/catalog?inCartProductId='.$data['id'] ?>" data-item-id="<?php echo $data['id'] ?>">
            <?php echo $data['titleBtn']; ?>
        </a>
        <!-- buttons in product.php - end -->

        <input type="submit" name="buyWithProp" onclick="return false;" style="display:none">

        <?php } }
        else{ ?>

        <input type="submit" name="buyWithProp">

        <?php } ?>

        <?php if($data['printCompareButton']=='true'){ ?>

        <!-- compare in catalog.php/product.php  - start -->
        <a href="<?php echo SITE.'/compare?inCompareProductId='.$data['id'] ?>" data-item-id="<?php echo $data['id'] ?>" class="j-button__compare addToCompare" title="Добавить к сравнению">
            <svg class="icon icon--compare"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--compare"></use></svg>
            <?php echo MG::getSetting('buttonCompareName'); ?>
        </a>
        <!-- compare in catalog.php/product.php  - end -->

        <!-- OneClick - start -->
        <?php if(class_exists('OneClick')): ?>[one-click product="<?php echo $data['id']?>"]<?php endif; ?>
        <!-- OneClick - end -->

        <?php } ?>
        <?php } ?>
    </div>
</div>