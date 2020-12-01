<nav id="j-offcanvas__leftmenu" class="j-leftmenu j-offcanvas">
    <a href="<?php echo SITE ?>/catalog"  class="j-leftmenu__title">
        <div class="j-leftmenu__title__icon">
            <div></div>
            <div></div>
            <div></div>
        </div>
        Каталог
        <svg class="icon icon--arrow-down"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-down"></use></svg>
    </a>

    <ul class="j-leftmenu__content j-offcanvas__content">
        <?php foreach ($data['categories'] as $category): ?>
        <?php if ($category['invisible'] == "1") { continue;} ?>
        <?php if (SITE.URL::getClearUri() === $category['link']) { $active = 'active'; } else { $active = ''; } ?>
        <?php if (isset($category['child'])): ?>
        <?php $slider = 'slider'; $noUl = 1; foreach($category['child'] as $categoryLevel1){$noUl *= $categoryLevel1['invisible']; } if($noUl){$slider='';}?>

        <li class="j-leftmenu__li j-leftmenu__li__1 j-offcanvas__li j-offcanvas__li__1">

            <?php if(!empty($category['image_url'])): ?>
                <div class="j-leftmenu__img j-offcanvas__img">
                    <img src="<?php echo SITE.$category['image_url'];?>" alt="<?php echo $category['title']; ?>">
                </div>
            <?php endif; ?>

            <a class="j-leftmenu__a j-offcanvas__a j-offcanvas__a__1" href="<?php echo $category['link']; ?>">
                <span class="j-leftmenu__a__inner j-offcanvas__a__inner">
                    <?php echo MG::contextEditor('category', $category['title'], $category["id"], "category"); ?>
                    <?php if (MG::getSetting('showCountInCat')=='true'):?>
                    <span class="j-leftmenu__count j-offcanvas__count"><?php echo $category['insideProduct']?'('.$category['insideProduct'].')':''; ?></span>
                    <?php endif;?>
                </span>
                <svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg>
            </a>
            <?php if($noUl){$slider=''; continue;} ?>


            <ul class="j-leftmenu__ul j-leftmenu__ul__1 j-offcanvas__ul j-offcanvas__ul__1">
                <?php foreach ($category['child'] as $categoryLevel1): ?> <?php if ($categoryLevel1['invisible'] == "1") { continue; } ?>
                <?php if (SITE.URL::getClearUri() === $categoryLevel1['link']) { $active = 'active'; } else { $active = ''; } ?>
                <?php if (isset($categoryLevel1['child'])): ?>
                <?php $slider = 'slider'; $noUl = 1; foreach($categoryLevel1['child'] as $categoryLevel2){$noUl *= $categoryLevel2['invisible']; } if($noUl){$slider='';}?>

                <li class="j-leftmenu__li j-leftmenu__li__2 j-offcanvas__li j-offcanvas__li__2">
                    <a class="j-leftmenu__a j-offcanvas__a j-offcanvas__a__2" href="<?php echo $categoryLevel1['link']; ?>">
                        <span class="j-leftmenu__a__inner j-offcanvas__a__inner">
                            <?php echo MG::contextEditor('category', $categoryLevel1['title'], $categoryLevel1["id"], "category"); ?>
                            <?php if (MG::getSetting('showCountInCat')=='true'):?>
                            <span class="j-leftmenu__count j-offcanvas__count"><?php echo $categoryLevel1['insideProduct']?'('.$categoryLevel1['insideProduct'].')':''; ?></span>
                            <?php endif;?>
                        </span>
                        <svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg>
                    </a>
                    <?php  if($noUl){$slider=''; continue;} ?>

                    <ul class="j-leftmenu__ul j-leftmenu__ul__2 j-offcanvas__ul j-offcanvas__ul__2">
                        <?php foreach ($categoryLevel1['child'] as $categoryLevel2): ?>
                        <?php if ($categoryLevel2['invisible'] == "1") { continue; } ?>
                        <?php if (SITE.URL::getClearUri() === $categoryLevel2['link']) { $active = 'active'; } else { $active = ''; } ?>
                        <?php if (isset($categoryLevel2['child'])): ?>
                        <?php $slider = 'slider'; $noUl = 1; foreach($categoryLevel2['child'] as $categoryLevel3){$noUl *= $categoryLevel3['invisible']; } if($noUl){$slider='';}?>

                        <li class="j-leftmenu__li j-leftmenu__li__3 j-offcanvas__li j-offcanvas__li__3">
                            <a class="j-leftmenu__a j-offcanvas__a j-offcanvas__a__3" href="<?php echo $categoryLevel2['link']; ?>">
                                <span class="j-leftmenu__a__inner j-offcanvas__a__inner">
                                    <?php echo MG::contextEditor('category', $categoryLevel2['title'], $categoryLevel2["id"], "category"); ?>
                                    <?php if (MG::getSetting('showCountInCat')=='true'):?>
                                    <span class="j-leftmenu__count"><?php echo $categoryLevel2['insideProduct']?'('.$categoryLevel2['insideProduct'].')':''; ?></span>
                                    <?php endif;?>
                                </span>
                            </a>
                            <?php  if($noUl){$slider=''; continue;} ?>
                        </li>

                        <?php else: ?>

                        <li class="j-leftmenu__li j-leftmenu__li__3 j-offcanvas__li j-offcanvas__li__3">
                            <a class="j-leftmenu__a j-offcanvas__a j-offcanvas__a__3" href="<?php echo $categoryLevel2['link']; ?>">
                                <span class="j-leftmenu__a__inner j-offcanvas__a__inner">
                                    <?php echo MG::contextEditor('category', $categoryLevel2['title'], $categoryLevel2["id"], "category"); ?>
                                    <?php if (MG::getSetting('showCountInCat')=='true'):?>
                                    <span class="j-leftmenu__count j-offcanvas__count"><?php echo $categoryLevel2['insideProduct']?'('.$categoryLevel2['insideProduct'].')':''; ?></span>
                                    <?php endif;?>
                                </span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <?php else: ?>

                <li class="j-leftmenu__li j-leftmenu__li__2 j-offcanvas__li j-offcanvas__li__2">
                    <a class="j-leftmenu__a j-offcanvas__a j-offcanvas__a__2" href="<?php echo $categoryLevel1['link']; ?>">
                        <span class="j-leftmenu__a__inner j-offcanvas__a__inner">
                            <?php echo MG::contextEditor('category', $categoryLevel1['title'], $categoryLevel1["id"], "category"); ?>
                            <?php if (MG::getSetting('showCountInCat')=='true'):?>
                            <span class="j-leftmenu__count j-offcanvas__count"><?php echo $categoryLevel1['insideProduct']?'('.$categoryLevel1['insideProduct'].')':''; ?></span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </li>

        <?php else: ?>

        <li class="j-leftmenu__li j-leftmenu__li__1 j-offcanvas__li j-offcanvas__li__1">
            <?php if(!empty($category['image_url'])): ?>
                <div class="j-leftmenu__img j-offcanvas__img">
                    <img src="<?php echo SITE.$category['image_url'];?>" alt="<?php echo $category['title']; ?>" title="<?php echo $category['title']; ?>">
                </div>
            <?php endif; ?>

            <a class="j-leftmenu__a j-offcanvas__a j-offcanvas__a__1" href="<?php echo $category['link']; ?>">
                <span class="j-leftmenu__a__inner j-offcanvas__a__inner">
                    <?php echo MG::contextEditor('category', $category['title'], $category["id"], "category"); ?>
                    <?php if (MG::getSetting('showCountInCat')=='true'):?>
                    <span class="j-leftmenu__count j-offcanvas__count"><?php echo $category['insideProduct']?'('.$category['insideProduct'].')':''; ?></span>
                    <?php endif; ?>
                </span>
            </a>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>