<?php if(!empty($data['blockVariants'])){?>
<div class="j-variant block-variants">
    <table class="variants-table">
        <?php foreach ($data['blockVariants'] as $variant) :?>
        <tr class="<?php if($variant['activity'] === "0" || $variant['count'] == 0){echo 'j-variant__none';} ?>">
            <td class="j-variant__img">
                <?php
                $src = mgImageProductPath($variant['image'], $variant['product_id'], 'small');
                echo !empty($variant['image'])?'<img src="'.$src.'">':'' ?>
            </td>
            <td class="j-variant__name">
                <label>
                    <input type="radio"  id="variant-<?php echo $variant['id']; ?>" data-count="<?php echo $variant['count']; ?>" name="variant" value = "<?php echo $variant['id']; ?>" <?php echo !$i++ ? 'checked=checked' : ''?>>
                    <span><?php echo $variant['title_variant'] ?></span>
                </label>
            </td>
            <td class="j-variant__price">
                <?php echo $variant['price'] ?> <?php echo MG::getSetting('currency')?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php }?>