<?php echo $data['htmlProperty']; ?>
<?php echo $data['blockVariants']; ?>
<?php echo $data['addHtml']; ?>
<div class="buy-container <?php echo (MG::get('controller')=='controllers_product') ? 'product': '' ?>"
    <?php if (MG::get('controller')=='controllers_product') {
    echo ($data['maxCount']=="0"||!$data['activity']?'style="display:none"':'');
    }?> >

    <?php if(class_exists('JSProperty')): ?>[jsproperty id="<?php echo $data['id']?>"]<?php endif; ?>

    <div class="hidder-element" <?php echo ($data['noneButton']?'style="display:none"':'') ?> >
        <input type="hidden" name="inCartProductId" value="<?php echo $data['id'] ?>">
        <div class="cart_form">
            <div class="amount_change">
                <a href="#" class="down"></a>
                <input type="text" name="amount_input" class="amount_input" data-max-count="<?php echo $data['maxCount'] ?>" value="1" />
                <a href="#" class="up"></a>
            </div>
        </div>
        <?php
        $count = $data['maxCount'];
        if($count == 0){
        $model = new Models_Product();
        $variants = $model->getVariants($data['id']);
        
        if($variants){
        $count = 0;
        // вычисляем общее число вариантов
        foreach($variants as $variant){
        $count += $variant['count'];
        }
        }
        }
        ?>
        <?php if(!$data['noneButton']||($count>0||$count<0)){ ?>
        <?php if($data['ajax']){
        if($data['buyButton']){
        ?>
        <?php echo $data['buyButton']; ?>
        <?php }
        else{ ?>
        <a class = "<?php echo $data['classForButton'] ?>" href = "<?php echo SITE.'/catalog?inCartProductId='.$data['id'] ?>" data-item-id="<?php echo $data['id'] ?>">
            <?php echo $data['titleBtn']; ?>
        </a>
        <input type="submit" name="buyWithProp" onclick="return false;" style="display:none">
        <?php
        }
        }
        else{
        ?>
        <input type="submit" name="buyWithProp">
        <?php } ?>

        <?php if(class_exists('OneClick')): ?>[one-click product="<?php echo $data['id']?>"]<?php endif; ?>

        <?php if($data['printCompareButton']=='true'){ ?>
        <a href="<?php echo SITE.'/compare?inCompareProductId='.$data['id'] ?>" data-item-id="<?php echo $data['id'] ?>" title="Добавить к сравнению" class="addToCompare" >
            <?php echo MG::getSetting('buttonCompareName'); ?>
        </a>
        <?php } ?>

        <?php } ?>
    </div>
</div>