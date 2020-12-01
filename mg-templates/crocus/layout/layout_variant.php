<?php if(!empty($data['blockVariants'])){?>
<div class="j-variant   block-variants">

    <div class="j-variant__selected">
        <svg class="icon icon--arrow-down"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-down"></use></svg>
        <div class="j-variant__selected__text">
            Есть варианты
        </div>
    </div>

    <table class="j-variant__dropdown   variants-table">
        <?php foreach ($data['blockVariants'] as $variant) :?>

        <tr class="j-variant__row <?php if($variant['activity'] === "0" || $variant['count'] == 0){echo 'j-variant__none';} ?>">

            <td class="j-variant__column j-variant__img <?php if($variant['image'] || 0){echo 'j-variant__img--show';} ?>">
                <?php $src = mgImageProductPath($variant['image'], $variant['product_id'], 'small'); echo !empty($variant['image'])?'<img src="'.$src.'">':'' ?>
            </td>

            <td class="j-variant__column j-variant__text">
                <input type="radio" id="variant-<?php echo $variant['id']; ?>" data-count="<?php echo $variant['count']; ?>" name="variant" value = "<?php echo $variant['id']; ?>" <?php echo !$i++ ? 'checked=checked' : ''?>>

                <label for="variant-<?php echo $variant['id']; ?>" <?php echo !$j++ ? 'class="active"' : ''?>>
                    <?php echo $variant['title_variant'] ?>
                </label>
            </td>

            <td class="j-variant__column j-variant__price">
                <?php echo $variant['price'] ?>
                <span class="j-variant__price__currency">
                    <?php echo MG::getSetting('currency')?>
                </span>
            </td>

        </tr>

        <?php endforeach; ?>
    </table>

</div>
<?php }?>