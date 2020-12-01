<span class="count"> 
	<?php if ($data['count'] == 'много' || $data['count'] == -1) : ?>
		<span class="j-product__in-stock count" itemprop="availability">Есть в наличии</span>
	<?php elseif ($data['count']!=0): ?>
		<span class="j-product__in-stock">  В наличии: <span itemprop="availability" class="label-black count"><?php echo $data['count'] ?></span> шт. </span>
	<?php else : ?>
		<span class="j-product__out-stock">Нет в наличии</span>
	<?php endif;?>
</span>