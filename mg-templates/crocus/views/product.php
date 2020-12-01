<?php mgSEO($data); ?>

<div class="j-product  product-details-block" itemscope itemtype="http://schema.org/Product">

    <h1 class="j-product__title j-title" itemprop="name"><?php echo $data['title'] ?></h1>

    <div class="j-product__gallery">
        <?php mgGalleryProduct($data); ?>
    </div>

    <div class="j-product__status   product-status">

        <div class="buy-block">
            <div class="j-product__block   buy-block-inner">

                <div class="j-product__block__left j-product__price   product-price">
                    <ul class="product-status-list">
                        <?php if($data["old_price"]!=""): ?>
                        <li <?php echo (!$data['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
                            <span class="j-product__price__old   old-price"><?php echo MG::numberFormat($data['old_price'])." ".$data['currency']; ?></span>
                        </li>
                        <?php endif; ?>
                        <li>
                            <span class="j-product__price__current   price" itemprop="price"><?php echo $data['price'] ?> <?php echo $data['currency']; ?></span>
                        </li>
                      
                  </ul><br><b>Характеристики:</b>
           <?php if(!empty($data['stringsProperties'])): ?>
                                <div class="c-tab__content" id="c-tab__property">
								 <?php layout('property',$data);?>							
                                </div>
                            <?php endif; ?>

                            <?php foreach ($data['thisUserFields'] as $key => $value) {
                                if ($value['type']=='textarea') { ?>
                                    <div class="c-tab__content" id="c-tab__tab<?php echo $key?>">
                                        <?php echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $value['value'])?>
                                    </div>
                                <?php  }
                            }?><br>
                  
                    <?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $data['id']?>"]<?php endif; ?>
                </div>

                <div class="j-product__block__right">
                    <div class="j-product__code    product-code">
                        Артикул: <span class="label-article code" itemprop="productID"><?php echo $data['code'] ?></span>
                    </div>
                    <ul class="product-status-list">
                        <li class="count-product-info">
                            <?php layout('count_product', $data); ?>
                        </li>
                        <li <?php echo (!$data['weight'])?'style="display:none"':'style="display:block;"' ?>>Вес: <span class="label-black weight"><?php echo $data['weight'] ?></span> кг. </li>
                    </ul>
                </div>

            </div>
            <?php echo $data['propertyForm'] ?>

            <div class="j-social">
                <div class="j-social__text">Понравился товар? Расскажите о нем своим друзьям:</div>
                <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                <script src="//yastatic.net/share2/share.js"></script>
                <div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
            </div>

        </div>
    </div>

    <div class="j-product__tab">
        <div class="j-tab__nav">
            <a class="j-tab__nav__a active" href="#tab1">Описание</a>
            <a class="j-tab__nav__a" href="#tab2">Отзывы <span class="j-comments__count"></span></a>

            <?php foreach ($data['thisUserFields'] as $key => $value) { if ($value['type']=='textarea'&&$value['value']) {?>
            <a class="j-tab__nav__a" href="#tab<?php echo $key?>"><?php echo $value['name']?></a>
            <?php } }?>
        </div>

        <div class="j-tab__content active" id="tab1" itemprop="description">
            <?php echo $data['description'] ?>
        </div>

        <div class="j-tab__content" id="tab2" itemscope itemtype="http://schema.org/Review">
        <?php if(class_exists('mgTreelikeComments')): ?>
                                <div class="c-tab__content" id="c-tab__tree-comments" itemscope itemtype="http://schema.org/Review">
                                    <span style="display: none;" itemprop="itemReviewed" content="<?php echo $data['product_title'] ?>"></span>
                                   [mg-treelike-comments type="product"]
                                </div>
                            <?php endif; ?>

                            <?php if(class_exists('CommentsToMoguta')): ?>
                                <div class="c-tab__content" id="c-tab__comments-mg" itemscope itemtype="http://schema.org/Review">
                                    <span style="display: none;" itemprop="itemReviewed" content="<?php echo $data['product_title'] ?>"></span>
                                    [comments]
                                </div>
                            <?php endif; ?>
        </div>

        <?php foreach ($data['thisUserFields'] as $key => $value) { if ($value['type']=='textarea') {?>
        <div class="j-tab__content" id="tab<?php echo $key?>" itemscope>
            <?php echo preg_replace('/\<br(\s*)?\/?\>/i', "\n", $value['value'])?>
        </div>
        <?php } }?>
    </div>

    <?php echo $data['related'] ?>

</div>