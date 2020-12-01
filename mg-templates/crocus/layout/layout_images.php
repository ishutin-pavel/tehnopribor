<?php mgAddMeta('<link type="text/css" href="'.SCRIPT.'standard/css/jquery.fancybox.css" rel="stylesheet"/>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'jquery.fancybox.pack.js"></script>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'jquery.bxslider.min.js"></script>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="' . PATH_SITE_TEMPLATE . '/js/layout.images.js"></script>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'zoomsl-3.0.js"></script>'); ?>

<div class="j-images   mg-product-slides">
    <ul class="main-product-slide">
        <?php foreach ($data["images_product"] as $key=>$image){?>
        <li class="j-images__big   product-details-image">
            <a class="fancy-modal" href="<?php echo mgImageProductPath($image, $data["id"]) ?>" rel="gallery">
                <?php
                    $item["image_url"] = $image;
                    $item["id"] = $data["id"];
                    $item["title"] = $data["title"];
                    $item["image_alt"] = $data["images_alt"][$key];
                    $item["image_title"] = $data["images_title"][$key];
                    echo mgImageProduct($item);
                ?>
            </a>
        </li>
        <?php }?>
    </ul>

    <?php if(count($data["images_product"])>1){?>

    <div class="slides-slider">
        <div class="j-images__slider j-carousel   slides-inner">
            <?php foreach ($data["images_product"] as $key=>$image){
            $src = mgImageProductPath($image, $data["id"], 'big');
            ?>
            <a class="j-images__slider__item   slides-item" data-slide-index="<?php echo $key?>"  href="javascript:void(0);">
                <img class="j-images__slider__img   mg-peview-foto"  src="<?php echo $src ?>" alt="<?php echo $data["images_alt"][$key];?>" title="<?php echo $data["images_title"][$key];?>"/>
            </a>
            <?php }?>
        </div>
    </div>
    <?php }?>
</div>