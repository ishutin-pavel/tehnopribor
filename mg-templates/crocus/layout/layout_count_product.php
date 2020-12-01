<?php $remInfo =  false; $style = 'style="display:none;"';
if (MG::getSetting('printRemInfo') == "true") {
$message = 'Здравствуйте, меня интересует товар "'.str_replace("'", "&quot;", $data['title']).'" с артикулом "'.$data['code'].'", но его нет в наличии.
Сообщите, пожалуйста, о поступлении этого товара на склад. ';
if($data['count'] == '0'){
  $style = 'style="display:block;"';
}
$remInfo = $data['remInfo'] !='false' ? true : false;
}?>

<span class="count">
    <?php if ($data['count'] == 'много' || $data['count'] == -1) : ?>
        <span class="j-product__stock j-product__stock--in count" itemprop="availability">Есть в наличии</span>
    <?php elseif ($data['count']!=0): ?>
        <span class="j-product__stock j-product__stock--in">
            В наличии: <span itemprop="availability" class="label-black count"><?php echo $data['count'] ?></span> шт.
        </span>
    <?php else : ?>
        <span class="j-product__stock j-product__stock--out">Нет в наличии</span>
    <?php endif;?>
</span>

<?php
if ($remInfo && MG::get('controller')=="controllers_product"): ?>
 <noindex>
    <div class="j-product__message" <?php echo $style ?>>
        <a rel='nofollow' href='<?php echo SITE."/feedback?message=".$message?>'>Сообщить когда будет</a>
    </div>
 </noindex>
<?php endif;