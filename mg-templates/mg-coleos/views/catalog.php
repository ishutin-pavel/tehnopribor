<?php
/**
 *  Файл представления Catalog - выводит сгенерированную движком информацию на странице сайта с каталогом товаров.
 *  В этом  файле доступны следующие данные:
 *   <code>
 *    $data['items'] => Массив товаров
 *    $data['titeCategory'] => Название открытой категории
 *    $data['cat_desc'] => Описание открытой категории
 *    $data['pager'] => html верстка  для навигации страниц
 *    $data['searchData'] =>  результат поисковой выдачи
 *    $data['meta_title'] => Значение meta тега для страницы
 *    $data['meta_keywords'] => Значение meta_keywords тега для страницы
 *    $data['meta_desc'] => Значение meta_desc тега для страницы
 *    $data['currency'] => Текущая валюта магазина
 *    $data['actionButton'] => тип кнопки в миникарточке товара
 *   </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <?php viewData($data['items']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <php echo $data['items']; ?>
 *   </code>
 *
 *   <b>Внимание!</b> Файл предназначен только для форматированного вывода данных на страницу магазина. Категорически не рекомендуется выполнять в нем запросы к БД сайта или реализовывать сложую программную логику логику.
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */
// Установка значений в метатеги title, keywords, description.
mgSEO($data);
?>

<!-- Верстка каталога -->
<?php if (empty($data['searchData'])): ?>
    <?php if(class_exists('BreadCrumbs')): ?>
        [brcr]
    <?php endif; ?>

    <?php echo mgSubCategory($data['cat_id']); ?>

    <h1 class="new-products-title"><?php echo $data['titeCategory'] ?></h1>
    <?php if ($cd = str_replace("&nbsp;", "", $data['cat_desc'])): ?>
        <div class="cat-desc">
            <?php if ($data['cat_img']): ?>
                <div class="cat-desc-img">
                    <img src="<?php echo SITE . $data['cat_img'] ?>" alt="<?php echo $data['titeCategory'] ?>"
                         title="<?php echo $data['titeCategory'] ?>">
                </div>
            <?php endif; ?>
            <div class="cat-desc-text"><?php echo $data['cat_desc'] ?></div>
            <div class="clear"></div>
        </div>
    <?php endif; ?>
    <div class="view-switcher clearfix">
        <div class="btn-group" data-toggle="buttons-radio">
            <button class="view-btn grid" title="Плитка" data-type="grid"></button>
            <button class="view-btn list" title="Список" data-type="list"></button>
        </div>
        <?php echo $data['pager'];?>
    </div>
    <div class="products-wrapper catalog">
        <?php foreach ($data['items'] as $item): ?>
            <div class="product-wrapper clearfix">
                <div class="product-image">
                    <?php
                    echo $item['recommend'] ? '<span class="sticker-recommend">Выбор №1</span>' : '';
                    echo $item['new'] ? '<span class="sticker-new">Новинка</span>' : '';
                    ?>
                    <a href="<?php echo $item["link"] ?>">
                        <?php echo mgImageProduct($item); ?>
                    </a>
                </div>
                <div class="product-details">
					<div class="product-name">
						<a href="<?php echo $item["link"] ?>"><?php echo $item["title"] ?></a>
					</div>
					<?php if (class_exists('Rating')): ?>
						<div class="product-rating">
							[rating id = "<?php echo($item ['id']) ?>"]
						</div>
					<?php endif; ?>
					<div class="product-description">
						<?php echo MG::textMore($item["description"], 240) ?>
					</div>
					<div class="product-footer clearfix">
						<div class="prices">
							<span
								class="product-price"><?php echo priceFormat($item["price"]) ?><?php echo $data['currency']; ?></span>
						 <span
							 class="old-price" <?php echo (!$item['old_price']) ? 'style="display:none"' : 'style="display:block"' ?>>
							 <?php echo priceFormat($item['old_price'], '1 234,56') . " " . $data['currency']; ?>
						</span>
						</div>
						<?php echo $item['buyButton']; ?>
					</div>
				</div>
            </div>
        <?php endforeach; ?>
        <div class="clear"></div>
        <?php
        // выводим постраничную навигацию
        echo $data['pager'];
        ?>
        <!-- / Верстка каталога -->
    </div>
    <div class="cat-desc-text"><?php echo $data['cat_desc_seo'] ?></div>
    <!-- Верстка поиска -->
<?php else: ?>

    <h1 class="new-products-title">При поиске по фразе: <strong>"<?php echo $data['searchData']['keyword'] ?>"</strong>
        найдено
        <strong><?php echo mgDeclensionNum($data['searchData']['count'], array('товар', 'товара', 'товаров')); ?></strong>
    </h1>
    <div class="products-wrapper list">
        <?php foreach ($data['items'] as $item): ?>
            <div class="product-wrapper clearfix">
                <div class="product-image">
                    <?php
                    echo $item['recommend'] ? '<span class="sticker-recommend">Выбор №1</span>' : '';
                    echo $item['new'] ? '<span class="sticker-new">Новинка</span>' : '';
                    ?>
                    <a href="<?php echo $item["link"] ?>">
                        <?php echo mgImageProduct($item); ?>
                    </a>
                </div>
                <div class="product-details">
					<div class="product-name">
						<a href="<?php echo $item["link"] ?>"><?php echo $item["title"] ?></a>
					</div>
					<?php if (class_exists('Rating')): ?>
						<div class="product-rating">
							[rating id = "<?php echo($item ['id']) ?>"]
						</div>
					<?php endif; ?>
					<div class="product-description">
						<?php echo MG::textMore($item["description"], 240) ?>
					</div>
					<div class="product-footer clearfix">
						<div class="prices">
							<span
								class="product-price"><?php echo priceFormat($item["price"]) ?><?php echo $data['currency']; ?></span>
						 <span
							 class="old-price" <?php echo (!$item['old_price']) ? 'style="display:none"' : 'style="display:block"' ?>>
							 <?php echo priceFormat($item['old_price'], '1 234,56') . " " . $data['currency']; ?>
						</span>
						</div>
						<?php echo $item['buyButton']; ?>
					</div>
				</div>
            </div>
        <?php endforeach; ?>
        <div class="clear"></div>
        <?php echo $data['pager']; ?>
    </div>
<?php endif;?>
<!-- / Верстка поиска -->