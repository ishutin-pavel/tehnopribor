<div class="mg-recent-products">
    <h2><?php echo $data['title'] ?> <span class="custom-arrow"></span></h2>
    <div class="recent-products">
        <?php foreach ($data['products'] as $item):?>
           
            <div class="product-wrapper" >
                <div class="product-image">
                    <?php
                    echo $item['recommend']?'<span class="sticker-recommend">Выбор №1</span>':'';
                    echo $item['new']?'<span class="sticker-new">Новинка</span>':'';
                    ?>
                    <a href="<?php echo $item['url']; ?>">
                        <?php 
                        $item["image_url"] = $item['img'];
                        echo mgImageProduct($item) ?>                        
                    </a>
                </div>
                <div class="product-name">
                    <a href="<?php echo $item['url'] ?>"><?php echo $item["title"] ?></a>
                </div>
                <span class="product-price"><?php echo $item["price"].' '.$data['currency'] ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>