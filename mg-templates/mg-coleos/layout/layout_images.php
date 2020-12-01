<?php mgAddMeta('<link type="text/css" href="'.SCRIPT.'standard/css/jquery.fancybox.css" rel="stylesheet"/>'); ?>
<?php mgAddMeta('<link type="text/css" href="'.SCRIPT.'standard/css/layout.images.css" rel="stylesheet"/>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'jquery.fancybox.pack.js"></script>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'jquery.bxslider.min.js"></script>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'standard/js/layout.images.js"></script>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'zoomsl-3.0.js"></script>'); ?>

<div class="mg-product-slides">
    <?php
    echo $data['recommend']?'<span class="sticker-recommend">Выбор №1</span>':'';
    echo $data['new']?'<span class="sticker-new">Новинка</span>':'';
    ?>
    <ul class="main-product-slide">
        <?php foreach ($data["images_product"] as $key=>$image){?>
            <li class="product-details-image"><a href="<?php echo $image ? SITE.'/uploads/'.$image: SITE."/uploads/no-img.jpg" ?>" rel="gallery" class="fancy-modal">
            <?php
            $item["image_url"] = $image;
            $item["id"] = $data["id"];
            $item["title"] = $data["title"];
            $item["image_alt"] = $data["image_alt"];
            $item["image_title"] = $data["image_title"];
            echo mgImageProduct($item);
            ?></a>
            <a class="zoom fancy-modal" href="<?php echo $image ? SITE.'/uploads/'.$image: SITE."/uploads/no-img.jpg" ?>"></a>
            </li>
        <?php }?>
    </ul>

    <?php if(count($data["images_product"])>1){?>
        <div class="slides-slider">
            <div class="slides-inner">
                <?php foreach ($data["images_product"] as $key=>$image){
                    $src = mgImageProductPath($image, $data["id"], 'big');
                    ?>
                    <a data-slide-index="<?php echo $key?>" class="slides-item" href="javascript:void(0);">
                        <img class="mg-peview-foto"  src="<?php echo $src ?>" alt="<?php echo $data["images_alt"][$key];?>" title="<?php echo $data["images_title"][$key];?>"/>
                    </a>
                <?php }?>
            </div>
        </div>
    <?php }?>
</div>
