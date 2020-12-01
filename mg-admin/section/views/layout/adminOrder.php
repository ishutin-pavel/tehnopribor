<?php
$lang = MG::get('lang');
echo '<div class="buy-container">' . "\n" . '    <div class="c-buy hidder-element">' . "\n" . '        <input type="hidden" name="inCartProductId" value="';
echo $data['id'];
echo '">' . "\n" . '        <div class="c-buy__buttons ">' . "\n" . '            <input type="number" class="amount_input small" name="amount_input" data-max-count="';
echo $data['maxCount'];
echo '" value="1"/>' . "\n" . '            <span class="orderUnit"></span><br>' . "\n" . '            <a rel="nofollow" class="addToCart product-buy" data-item-id="';
echo $data['id'];
echo '">';
echo $lang['addToOrder'];
echo '</a>' . "\n" . '        </div>' . "\n" . '    </div>' . "\n" . '</div>' . "\n\n" . '<div class="c-form">' . "\n" . '    <ul class="accordion" data-accordion="" data-multi-expand="true" data-allow-all-closed="true">' . "\n" . '        ';

if (!empty($data['blockVariants'])) {
	echo '        <li class="accordion-item" data-accordion-item=""><a class="accordion-title" href="javascript:void(0);">';
	echo $lang['options'];
	echo '</a> ' . "\n" . '            <div class="accordion-content" data-tab-content="">' . "\n" . '                <div class="c-variant block-variants">' . "\n" . '                    <div class="c-variant__scroll">' . "\n" . '                        <table class="variants-table">' . "\n" . '                            ';

	foreach ($data['blockVariants'] as $variant) {
		$count = MG::getProductCountOnStorage($variant['count'], $variant['product_id'], $variant['id'], 'all');
		echo "\n" . '                                <tr class="c-variant__row variant-tr ';
		echo !$j++ ? 'active-var' : '';
		echo '" data-count="';
		echo $count;
		echo '">' . "\n" . '                                    <td class="c-variant__column">' . "\n" . '                                      <input type="radio" id="variant-';
		echo $variant['id'];
		echo '" data-count="';
		echo $count;
		echo '" name="variant" value = "';
		echo $variant['id'];
		echo '" ';
		echo !$i++ ? 'checked=checked' : '';
		echo '>' . "\n" . '                                    </td>' . "\n" . '                                    <td>' . "\n" . '                                      ';
		$src = mgImageProductPath($variant['image'], $variant['product_id'], 'small');
		echo !empty($variant['image']) ? "\n" . '                                          <span class="c-variant__img"><img src="' . $src . '" alt="image"></span>' . "\n" . '                                      ' : '';
		echo '                                    </td>' . "\n" . '                                    <td>' . "\n" . '                                      <span class="c-variant__name">' . "\n" . '                                          ';
		echo $variant['title_variant'];
		echo '                                      </span>' . "\n" . '                                    </td>' . "\n" . '                                    <td>' . "\n" . '                                      <span class="c-variant__price ';
		if (($variant['activity'] === '0') || ($variant['count'] == 0)) {
			echo 'c-variant__price--none';
		}

		echo '">' . "\n" . '                                          <span class="c-variant__price--current">' . "\n" . '                                              ';
		echo $variant['price'];
		echo ' ';
		echo MG::getSetting('currency');
		echo '                                          </span>' . "\n" . '                                      </span>' . "\n" . '                                    </td>' . "\n" . '                                </tr>' . "\n" . '                            ';
	}

	echo '                        </table>' . "\n" . '                    </div>' . "\n" . '                </div>' . "\n" . '            </div>' . "\n" . '        </li>' . "\n" . '        ';
}

echo '        <li class="accordion-item additprop addiProps" data-accordion-item=""><a class="accordion-title" href="javascript:void(0);">';
echo $lang['additionalChars'];
echo '</a>' . "\n" . '            <div class="accordion-content" data-tab-content="">' . "\n" . '                ';

foreach ($data['htmlProperty'] as $prop) {
	switch ($prop['type']) {
	case 'assortment-select':
		echo "\n" . '                                    <p class="select-type"><span class="property-title">';
		echo $prop['name'];
		echo '<span class="property-delimiter">:</span> </span>' . "\n" . '                                    <select name="';
		echo $prop['name'];
		echo '" class="last-items-dropdown mg__prop_select">' . "\n\n" . '                            ';

		foreach ($prop['additional'] as $option) {
			echo '<option value="' . $option['value'] . '" ' . $option['selected'] . '>' . $option['itemName'] . $option['price'] . '</option>';
		}

		echo '                                    </select></p>' . "\n\n" . '                            ';
		break;

	case 'assortment-radio':
		echo '                                ' . "\n" . '                                    <p class="mg__prop_p_radio"><span class="property-title">';
		echo $prop['name'];
		echo '</span><span class="property-delimiter">:</span><br/>' . "\n\n" . '                                ';

		foreach ($prop['additional'] as $option) {
			echo '                                        <label class="mg__prop_label_radio ';
			$option['checked'] ? 'active' : '';
			echo '">' . "\n" . '                                        <input class="mg__prop_radio" type="radio" name="';
			echo $option['name'];
			echo '" ';
			echo $option['checked'];
			echo '>' . "\n" . '                                        <span class="label-black">';
			echo $option['itemName'] . $option['price'];
			echo '</span></label><br>' . "\n" . '                                ';
		}

		echo '                                    </p>' . "\n\n" . '                            ';
		break;

	case 'assortment-checkBox':
		echo '                                ' . "\n" . '                                    <p><span class="property-title">';
		echo $prop['name'];
		echo '</span><span class="property-delimiter">:</span><br/>' . "\n\n" . '                                ';

		foreach ($prop['additional'] as $option) {
			echo '                                    <label><input class="mg__prop_check" type="checkbox" name="';
			echo $option['name'];
			echo '">' . "\n" . '                                    <span class="label-black">';
			echo $option['itemName'] . $option['price'];
			echo '</span></label><br>' . "\n" . '                                ';
		}

		echo '                                    </p>' . "\n\n" . '                            ';
		break;
	}
}

echo ' ' . "\n" . '            </div>' . "\n" . '        </li>' . "\n" . '    </ul>' . "\n" . '    <div class="propsFrom">' . "\n" . '        ';

foreach ($data['stringsProperties']['groupProperty'] as $item) {
	echo '        <li class="name-group">';
	echo $item['name_group'];
	echo '</li>' . "\n" . '        ';

	foreach ($item['property'] as $prop) {
		echo '        <li class="prop-item">' . "\n" . '            <span class="prop-name">';
		echo trim($prop['key_prop']);
		echo '</span><span class="prop-spec">: ';
		echo $prop['name_prop'];
		echo '            <span class="prop-unit">';
		echo $prop['unit'];
		echo '</span></span>' . "\n" . '        </li>' . "\n" . '        ';
	}

	echo '        ';
}

echo '        ';

foreach ($data['stringsProperties']['unGroupProperty'] as $item) {
	echo '        <li class="prop-item nogroup"><span class="prop-name">';
	echo $item['name_prop'];
	echo '</span><span class="prop-spec">: ';
	echo $item['name'];
	echo '<span class="prop-unit">';
	echo $item['unit'];
	echo '</span></span>  ' . "\n" . '        </li>' . "\n" . '        ';
}

echo ' ' . "\n" . '    </div>' . "\n" . '</div>';

?>