<?php mgSEO($data); ?>

<?php if(class_exists('BreadCrumbs')): ?>[brcr]<?php endif; ?>

<div class="j-product__page product-details-block" itemscope itemtype="http://schema.org/Product">
    
    <div class="j-product__gallery">
        <?php mgGalleryProduct($data); ?>
    </div>
    
    <div class="j-product__status product-status">

        <h1 class="j-product__title" itemprop="name">
            <?php echo $data['title'] ?>
        </h1>

		<?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $data['id']?>"]<?php endif; ?>

        <div class="j-product__code">
            Артикул: <span itemprop="productID"><?php echo $data['code'] ?></span>
        </div>

        <ul class="product-status-list">
			<li class="count-product-info">
				<?php layout('count_product', $data); ?>
			</li>
			<li <?php echo (!$data['weight'])?'style="display:none"':'style="display:block; margin-top: 10px;"' ?>>Вес: <span class="label-black weight"><?php echo $data['weight'] ?></span> кг. </li>
        </ul>

        <div class="buy-block">
            <div class="buy-block-inner j-product__buy-block">
              
				<div class="product-price j-product__price">
					<ul class="product-status-list">
			
						<?php if($data["old_price"]!=""): ?>
						<li <?php echo (!$data['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
							<span class="old-price j-product__price__old"><?php echo MG::numberFormat($data['old_price'])." ".$data['currency']; ?></span>
						</li>
						<li>
							<span class="price j-product__price__current j-red" itemprop="price"><?php echo $data['price'] ?> <?php echo $data['currency']; ?></span>
						</li>
						<?php endif; ?>
						
						<?php if($data["old_price"]==""): ?>
						<li <?php echo (!$data['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
							<span class="old-price j-product__price__old"><?php echo MG::numberFormat($data['old_price'])." ".$data['currency']; ?></span>
						</li>
						<li>
							<span class="price j-product__price__current" itemprop="price"><?php echo $data['price'] ?> <?php echo $data['currency']; ?></span>
						</li>
						<?php endif; ?>
						
					</ul>
				</div>
				
				
				
				
            </div>
            <?php echo $data['propertyForm'] ?>
        </div>
    </div>
    
    <div class="j-tabs">
        
        <ul class="j-tabs__nav">
            <li class="current">
                <a href="#tab1">Описание</a>
            </li>
            <li>
                <a href="#tab2">Отзывы <span class="j-comments__count"></span></a>
            </li>
            
			<?php foreach ($data['thisUserFields'] as $key => $value) {
			if ($value['type']=='textarea'&&$value['value']) {?>
				<li>
					<a href="#tab<?php echo $key?>"><?php echo $value['name']?></a>
				</li>
			<?php } }?>
            
        </ul>
        
        <div class="j-tabs__content" id="tab1" itemprop="description">
            <?php echo $data['description'] ?>
        </div>

        <div class="j-tabs__content" id="tab2" itemscope itemtype="http://schema.org/Review">
            <?php if(class_exists('JSComments')): ?>[jscomments]<?php endif; ?>
        </div>

        <?php foreach ($data['thisUserFields'] as $key => $value) { if ($value['type']=='textarea') {?>
            <div class="j-tabs__content" id="tab<?php echo $key?>" itemscope><?php echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $value['value'])?></div>
        <?php } }?>

    </div>

    <?php echo $data['related'] ?>

</div>