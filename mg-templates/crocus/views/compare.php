<?php mgSEO($data); $prodIds = array(); $propTable = array(); ?>

<div class="j-title">Сравнение товаров</div>

<div class="j-alert j-alert__default">Нет товаров для сравнения</div>

<!-- compare - start -->
<div class="j-compare   mg-compare-products">

    <!-- top - start -->
    <div class="j-compare__top   mg-compare-left-side">
        <?php if(!empty($_SESSION['compareList'])){ ?>

        <div class="j-compare__top__select   mg-category-list-compare">
            <?php if(MG::getSetting('compareCategory')!='true'){ ?><span class="j-compare__top__title">Категории:</span><?php } ?>
            <?php if(MG::getSetting('compareCategory')!='true'){ ?>
            <form >
                <select name="viewCategory" onChange="this.form.submit()">
                    <?php foreach($data['arrCategoryTitle'] as $id => $value): ?>
                    <option value ='<?php echo $id ?>' <?php
                        if($_GET['viewCategory']==$id){
                        echo "selected=selected";
                        }
                    ?> ><?php echo $value ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <?php } ?>
        </div>

        <div class="j-compare__top__buttons">
            <a class="j-button j-compare__clear   mg-clear-compared-products" href="<?php echo SITE ?>/compare?delCompare=1" >
                <svg class="icon icon--trash"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--trash"></use></svg>
                Очистить и закрыть
            </a>
            <a class="j-button" href="<?php echo SITE ?>">
                <svg class="icon icon--arrow-left"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-left"></use></svg>
                Назад
            </a>
        </div>

        <?php } ?>
    </div>
    <!-- top - end -->


    <!-- right block - start -->
    <div class="j-compare__right">

        <!-- items - start -->
        <div class="j-compare__wrapper mg-compare-product-wrapper">

            <?php if(!empty($data['catalogItems'])){ foreach($data['catalogItems'] as $item){ ?>
                <div class="j-compare__item j-goods__item   mg-compare-product">

                    <a class="j-compare__remove   mp-remove-compared-product" href="<?php echo SITE ?>/compare?delCompareProductId=<?php echo $item['id'] ?>">
                        <svg class="icon icon--cancel"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--cancel"></use></svg>
                    </a>

                    <a class="j-goods__image" href="<?php echo $item['link'] ?>">
                        <?php echo mgImageProduct($item); ?>
                    </a>

                    <a class="j-goods__name" href="<?php echo $item['link'] ?>">
                        <?php echo $item['title'] ?>
                    </a>

                    <ul class="j-compare__list j-goods__price   mg-compare-product-list product-status-list">
                        <?php if($item["old_price"]!=""): ?>
                        <li <?php echo (!$item['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
                            <span class="j-goods__price__old   old-price">
                                <?php echo $item['old_price']." ".$item['currency']; ?>
                            </span>
                        </li>
                        <?php endif; ?>
                        <li class="j-goods__price__current   price">
                            <?php echo $item['price'] ?> <?php echo $item['currency']; ?>
                        </li>
                    </ul>

                    <?php echo $item['propertyForm'] ?>
                    <?php foreach($item['stringsProperties'] as $key => $val){ $propTable[$key][$item['id']] = $val; } ?>
                </div>

            <?php $prodIds[] = $item['id']; } } ?>
        </div>
        <!-- items - end -->

        <?php foreach($propTable as $key => $prop){ foreach($prodIds as $id){ if(empty($prop[$id])){ $propTable[$key][$id] = '-'; ksort($propTable[$key]); } } } ?>

        <!-- right table - start -->
        <div class="j-compare__table j-compare__table__right  mg-compare-fake-table-right">
            <?php foreach($propTable as $key => $prop){ ?>
            <div class="j-compare__row   mg-compare-fake-table-row">
                <?php foreach($prop as $prodId => $val){ ?>
                <div class="j-compare__column   mg-compare-fake-table-cell">
                    <?php echo $val ?>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <!-- right table - start -->
    </div>
    <!-- right block - end -->


    <!-- left block - start -->
    <div class="j-compare__left">
        <!-- left table - start -->
        <div class="j-compare__table j-compare__table__left  mg-compare-fake-table">
            <div class="j-compare__row   mg-compare-fake-table-left <?php echo $data['moreThanThree'] ?>">
                <?php foreach($propTable as $key => $prop){ ?>
                <div class="j-compare__column   mg-compare-fake-table-cell <?php if(trim($data['property'][$key])!=='') : ?>with-tooltip<?php endif; ?>">
                    <?php if(trim($data['property'][$key])!=='') : ?>
                        <div class="mg-tooltip">?<div class="mg-tooltip-content" style="display:none;"><?php echo $data['property'][$key] ?></div></div>
                    <?php endif; ?>
                    <div class="compare-text" title="<?php echo $key ?>">
                        <?php echo $key ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- left table - end -->
    </div>
    <!-- left block - end -->
</div>
<!-- compare - end -->