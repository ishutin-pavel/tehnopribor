<?php
/**
 *  Файл представления Index - выводит сгенерированную движком информацию на главной странице магазина.
 *  В этом файле доступны следующие данные:
 *   <code>
 *    $data['recommendProducts'] => Массив рекомендуемых товаров
 *    $data['newProducts'] => Массив товаров новинок
 *    $data['saleProducts'] => Массив товаров распродажи
 *    $data['titeCategory'] => Название категории
 *    $data['cat_desc'] => Описание категории
 *    $data['meta_title'] => Значение meta тега для страницы
 *    $data['meta_keywords'] => Значение meta_keywords тега для страницы
 *    $data['meta_desc'] => Значение meta_desc тега для страницы
 *    $data['currency'] => Текущая валюта магазина
 *    $data['actionButton'] => тип кнопки в миникарточке товара
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <php viewData($data['saleProducts']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <php echo $data['saleProducts']; ?>
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложую программную логику логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */


// Установка значений в метатеги title, keywords, description.
mgSEO($data);
//viewData($data['newProducts']);
?>
<?php if (!empty($data['newProducts'])): ?>

    <div class="m-p-products">
        <h2 class="m-p-new-products-title"><a href="<?php echo SITE; ?>/group?type=latest">Новинки</a></h2>

        <div class="m-p-products-slider">
            <div class="<?php echo count($data['newProducts']) > 3 ? "m-p-products-slider-start" : "" ?>">
                <?php foreach ($data['newProducts'] as $item): ?>
                    <div class="product-wrapper">
                        <div class="product-image">
                            <?php
                            echo $item['recommend'] ? '<span class="sticker-recommend">Выбор №1</span>' : '';
                            echo $item['new'] ? '<span class="sticker-new">Новинка</span>' : '';
                            ?>
                            <a href="<?php echo SITE ?>/<?php echo isset($item["category_url"]) ? $item["category_url"] : 'catalog' ?><?php echo htmlspecialchars($item["product_url"]) ?>">
                                <?php echo mgImageProduct($item); ?>
                            </a>
                            <?php echo $item['actionCompare'] ?>
                        </div>
                        <div class="product-name">
                            <a href="<?php echo SITE ?>/<?php echo isset($item["category_url"]) ? $item["category_url"] : 'catalog' ?><?php echo htmlspecialchars($item["product_url"]) ?>"><?php echo $item["title"] ?></a>
                        </div>
                        <?php if (class_exists('Rating')): ?>
                            <div class="product-rating">
                                [rating id = "<?php echo($item ['id']) ?>"]
                            </div>
                        <?php endif; ?>
                        <div class="product-footer clearfix">
                            <div class="prices">
                                <span class="product-price">
                                    <?php echo priceFormat($item["price"]) ?> <span class="currency"><?php echo $data['currency']; ?></span>
                                </span>
                            </div>
                            <?php echo $item[$data['actionButton']] ?>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php endif; ?>

<!-- блок баннеров -->
<div class="mg-info-block">
    <a href="javascript:void(0);">
        <img src="<?php echo PATH_SITE_TEMPLATE ?>/images/pic/b1.jpg" alt="">
    </a>
    <a href="javascript:void(0);">
        <img src="<?php echo PATH_SITE_TEMPLATE ?>/images/pic/b2.jpg" alt="">
    </a>
</div>
<!-- блок баннеров -->

<?php if (!empty($data['recommendProducts'])): ?>
    <div class="m-p-products">
        <h2 class="m-p-recommended-products-title"><a href="<?php echo SITE; ?>/group?type=recommend">Рекомендуемые
                товары</a></h2>

        <div class="m-p-products-slider">
            <div class="<?php echo count($data['recommendProducts']) > 3 ? "m-p-products-slider-start" : "" ?>">
                <?php foreach ($data['recommendProducts'] as $item): ?>

                    <div class="product-wrapper">
                        <div class="product-image">
                            <?php
                            echo $item['recommend'] ? '<span class="sticker-recommend">Выбор №1</span>' : '';
                            echo $item['new'] ? '<span class="sticker-new">Новинка</span>' : '';
                            ?>
                            <a href="<?php echo SITE ?>/<?php echo isset($item["category_url"]) ? $item["category_url"] : 'catalog' ?><?php echo htmlspecialchars($item["product_url"]) ?>">
                                <?php echo mgImageProduct($item); ?>
                            </a>
                            <?php echo $item['actionCompare'] ?>
                        </div>
                        <div class="product-name">
                            <a href="<?php echo SITE ?>/<?php echo isset($item["category_url"]) ? $item["category_url"] : 'catalog' ?><?php echo htmlspecialchars($item["product_url"]) ?>"><?php echo $item["title"] ?></a>
                        </div>
                        <?php if (class_exists('Rating')): ?>
                            <div class="product-rating">
                                [rating id = "<?php echo($item ['id']) ?>"]
                            </div>
                        <?php endif; ?>
                        <div class="product-footer clearfix">
                            <div class="prices">
                                <span class="product-price">
                                    <?php echo priceFormat($item["price"]) ?> <span class="currency"><?php echo $data['currency']; ?></span>
                                </span>
                            </div>
                            <?php echo $item[$data['actionButton']] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php endif; ?>

<?php if (!empty($data['saleProducts'])): ?>
    <div class="m-p-products">
        <h2 class="m-p-sale-products-title"><a href="<?php echo SITE; ?>/group?type=sale">Распродажа</a></h2>

        <div class="m-p-products-slider">
            <div class="<?php echo count($data['saleProducts']) > 3 ? "m-p-products-slider-start" : "" ?>">
                <?php foreach ($data['saleProducts'] as $item): ?>
                    <div class="product-wrapper">
                        <div class="product-image">
                            <?php
                            echo $item['recommend'] ? '<span class="sticker-recommend">Выбор №1</span>' : '';
                            echo $item['new'] ? '<span class="sticker-new">Новинка</span>' : '';
                            ?>
                            <a href="<?php echo SITE ?>/<?php echo isset($item["category_url"]) ? $item["category_url"] : 'catalog' ?><?php echo $item["product_url"] ?>">
                                <?php echo mgImageProduct($item); ?>
                            </a>
                            <?php echo $item['actionCompare'] ?>
                        </div>
                        <div class="product-name">
                            <a href="<?php echo SITE ?>/<?php echo isset($item["category_url"]) ? $item["category_url"] : 'catalog' ?><?php echo $item["product_url"] ?>"><?php echo $item["title"] ?></a>
                        </div>
                        <?php if (class_exists('Rating')): ?>
                            <div class="product-rating">
                                [rating id = "<?php echo($item ['id']) ?>"]
                            </div>
                        <?php endif; ?>

                        <div class="product-footer clearfix">
                            <div class="prices">
                                <span class="old-price" <?php echo (!$item['old_price']) ? 'style="display:none"' : 'style="display:block"' ?>>
                                     <?php echo priceFormat($item['old_price'], '1 234,56') . " " . $data['currency']; ?>
                                </span>
                                <span class="product-price">
                                    <?php echo priceFormat($item["price"]) ?> <span class="currency"><?php echo $data['currency']; ?></span>
                                </span>
                            </div>
                            <?php echo $item[$data['actionButton']] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php endif; ?>

<!-- подключение плагина новостей -->
<?php if (class_exists('PluginNews')): ?>
    <div class="mg-main-news">
        [news-anons count="4"]
    </div>
<?php endif; ?>
<!-- подключение плагина новостей -->

<div class="cat-desc">
    <?php echo $data['cat_desc'] ?>
</div>

