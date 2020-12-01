<nav id="j-nav-catalog" class="j-mobile__wrapper">
    <div class="j-menu">
        <div class="j-nav-catalog__title">Каталог товаров</div>  
        <ul class="j-nav-catalog">
            <?php foreach ($data['categories'] as $category): ?> <?php if ($category['invisible'] == "1") { continue;} ?> <?php if (SITE.URL::getClearUri() === $category['link']) { $active = 'active'; } else { $active = ''; } ?> <?php if (isset($category['child'])): ?> <?php $slider = 'slider'; $noUl = 1; foreach($category['child'] as $categoryLevel1){$noUl *= $categoryLevel1['invisible']; } if($noUl){$slider='';}?>
            

            <li class="first-level <?php if(!empty($category['image_url'])): ?>cat-img<?php endif; ?>">
                <?php if(!empty($category['image_url'])): ?><span class="j-nav-catalog__img"><img src="<?php echo SITE.$category['image_url'];?>" alt="<?php echo $category['title']; ?>"></span><?php endif; ?>
                <a href="<?php echo $category['link']; ?>"><?php echo MG::contextEditor('category', $category['title'], $category["id"], "category"); ?>
                    <span class="j-nav-catalog__count"><?php echo $category['insideProduct']?'('.$category['insideProduct'].')':''; ?></span>
                </a>
                <?php  if($noUl){$slider=''; continue;} ?>

                
                <ul>
                    <?php foreach ($category['child'] as $categoryLevel1): ?> <?php if ($categoryLevel1['invisible'] == "1") { continue; } ?> <?php if (SITE.URL::getClearUri() === $categoryLevel1['link']) { $active = 'active'; } else { $active = ''; } ?> <?php if (isset($categoryLevel1['child'])): ?> <?php $slider = 'slider'; $noUl = 1; foreach($categoryLevel1['child'] as $categoryLevel2){$noUl *= $categoryLevel2['invisible']; } if($noUl){$slider='';}?>
                    <li class="second-level">
                        <a href="<?php echo $categoryLevel1['link']; ?>"><?php echo MG::contextEditor('category', $categoryLevel1['title'], $categoryLevel1["id"], "category"); ?>
                            <span class="j-nav-catalog__count"><?php echo $categoryLevel1['insideProduct']?'('.$categoryLevel1['insideProduct'].')':''; ?></span>
                        </a>
                        <?php  if($noUl){$slider=''; continue;} ?>
                        

                        <ul>
                            <?php foreach ($categoryLevel1['child'] as $categoryLevel2): ?> <?php if ($categoryLevel2['invisible'] == "1") { continue; } ?> <?php if (SITE.URL::getClearUri() === $categoryLevel2['link']) { $active = 'active'; } else { $active = ''; } ?> <?php if (isset($categoryLevel2['child'])): ?> <?php $slider = 'slider'; $noUl = 1; foreach($categoryLevel2['child'] as $categoryLevel3){$noUl *= $categoryLevel3['invisible']; } if($noUl){$slider='';}?>
                            <li class="second-level">
                                <a href="<?php echo $categoryLevel2['link']; ?>"><?php echo MG::contextEditor('category', $categoryLevel2['title'], $categoryLevel2["id"], "category"); ?>
                                    <span class="j-nav-catalog__count"><?php echo $categoryLevel2['insideProduct']?'('.$categoryLevel2['insideProduct'].')':''; ?></span>  
                                </a>
                                <?php  if($noUl){$slider=''; continue;} ?>
                            </li>


                            <?php else: ?>


                            <li class="third-level">
                                <a href="<?php echo $categoryLevel2['link']; ?>"><?php echo MG::contextEditor('category', $categoryLevel2['title'], $categoryLevel2["id"], "category"); ?>
                                    <span class="j-nav-catalog__count"><?php echo $categoryLevel2['insideProduct']?'('.$categoryLevel2['insideProduct'].')':''; ?></span>      
                                </a>
                            </li>
                            <?php endif; ?> <?php endforeach; ?>
                        </ul>
                    </li>


                    <?php else: ?>


                    <li class="second-level">
                        <a href="<?php echo $categoryLevel1['link']; ?>"><?php echo MG::contextEditor('category', $categoryLevel1['title'], $categoryLevel1["id"], "category"); ?>
                            <span class="j-nav-catalog__count"><?php echo $categoryLevel1['insideProduct']?'('.$categoryLevel1['insideProduct'].')':''; ?></span>   
                        </a>
                    </li>
                    <?php endif; ?> <?php endforeach; ?>
                </ul>
            </li>


            <?php else: ?>


            <li class="first-level <?php if(!empty($category['image_url'])): ?>cat-img<?php endif; ?>">
                <?php if(!empty($category['image_url'])): ?><span class="j-nav-catalog__img"><img src="<?php echo SITE.$category['image_url'];?>" alt="<?php echo $category['title']; ?>" title="<?php echo $category['title']; ?>"></span><?php endif; ?>
                <a href="<?php echo $category['link']; ?>"><?php echo MG::contextEditor('category', $category['title'], $category["id"], "category"); ?>   
                    <span class="j-nav-catalog__count"><?php echo $category['insideProduct']?'('.$category['insideProduct'].')':''; ?></span>   
                </a>
            </li>
            <?php endif; ?> <?php endforeach; ?>
        </ul>
    </div>
</nav>