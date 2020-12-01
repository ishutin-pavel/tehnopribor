var wholesale = (function () {

  	return {

	  	search: '',
	  	selectedProductId: '',
	  	selectedVariantId: 0,
	  	page: 1,
	  	categoryId: 0,

	  	init: function() {

	  		wholesale.loadList();

	  		$('.admin-center').on('click', '#tab-wholesale-settings .product', function() {
	  			wholesale.selectedProductId = $(this).data('product-id');
	  			wholesale.selectedVariantId = $(this).data('variant-id');
	  			$('#tab-wholesale-settings .product').removeClass('selected');
	  			$(this).addClass('selected');
	  			wholesale.loadRule();
	  			$('#tab-wholesale-settings .edit-field').show();
	  		});

	  		$('.admin-center').on('click', '#tab-wholesale-settings .addField', function() {
	  			wholesale.addField();
	  		});

	  		$('.admin-center').on('click', '#tab-wholesale-settings .save-button', function() {
	  			wholesale.saveRule();
	  		});

	  		$('.admin-center').on('click', '#tab-wholesale-settings .fa-trash', function() {
	  			if(confirm('Удалить?')) {
	  				$(this).parents('.rule').detach();
	  			}
	  		});

	  		$('.admin-center').on('click', '#tab-wholesale-settings .wholesale-onlyNotSetPrice', function() {
	  			wholesale.loadList();
	  		});

	  		$('.admin-center').on('click', '#tab-wholesale-settings .newNavigator', function() {
	  			wholesale.page = admin.getIdByPrefixClass($(this), 'page');
	  			wholesale.loadList();
	  		});

	  		$('.admin-center').on('change', '#tab-wholesale-settings .category-select', function() {
	  			wholesale.categoryId = $(this).val();
	  			wholesale.page = 1;
	  			wholesale.loadList();
	  		});

	  		$('.admin-center').on('change', '#tab-wholesale-settings [name=sale-type]', function() {
	  			$(this).data('type', $(this).val());
	  			$('#tab-wholesale-settings .text-type').text($('#tab-wholesale-settings [name=sale-type] option[value='+$(this).val()+']').text());
	  		});

	  		setInterval(function() {
	  			if(wholesale.search != $('#tab-wholesale-settings .wholesale-search').val()) {
	  				wholesale.search = $('#tab-wholesale-settings .wholesale-search').val();
	  				wholesale.page = 1;
	  				wholesale.loadList();
	  			}
	  		}, 1000);
	  	},

	  	loadList: function() {
	  		admin.ajaxRequest({
	  			mguniqueurl: "action/loadWholesaleList", // действия для выполнения на сервере    
	  			search: wholesale.search,
	  			only: $('#tab-wholesale-settings .wholesale-onlyNotSetPrice').prop('checked'),
	  			page: wholesale.page,
	  			category: wholesale.categoryId 
	  		},      
	  		function(response) {
	  		  	$('#tab-wholesale-settings .product-list').html(response.data.html);
	  		  	$('#tab-wholesale-settings .table-pagination').html(response.data.pager);
	  		  	$('#tab-wholesale-settings .linkPage').addClass('newNavigator').removeClass('linkPage');
	  		});
	  	},

	  	loadRule: function() {
	  		var data = {};
	  		data['productId'] = wholesale.selectedProductId;
	  		data['variantId'] = wholesale.selectedVariantId;
	  		admin.ajaxRequest({
	  			mguniqueurl: "action/loadWholesaleRule", // действия для выполнения на сервере    
	  			data: data      
	  		},      
	  		function(response) {
	  		  	$('#tab-wholesale-settings .rule-list').html(response.data);
	  		  	$('#tab-wholesale-settings [name=sale-type]').val($('#tab-wholesale-settings [name=sale-type]').data('type'));
	  		  	$('#tab-wholesale-settings .text-type').text($('#tab-wholesale-settings [name=sale-type] option[value='+$('#tab-wholesale-settings [name=sale-type]').val()+']').text());
	  		});
	  	},

	  	addField: function() {
	  		$('.toDel').detach();
	  		$('#tab-wholesale-settings .rule-list').append('\
	  			<tr class="rule">\
	  				<td><input type="text" name="count" placeholder="'+lang.EXAMPLE_2+'"></td>\
	  				<td><input type="text" name="price" placeholder="'+lang.EXAMPLE_4+'"></td>\
	  				<td class="text-right"><i class="fa fa-trash"></i></td>\
	  			</tr>');
	  	},

	  	saveRule: function() {
	  		var data = {};
	  		$('#tab-wholesale-settings .rule').each(function(index) {
	  			data[index] = {};
	  			data[index]['count'] = $(this).find('[name=count]').val();
	  			data[index]['price'] = $(this).find('[name=price]').val();
	  		});
	  		admin.ajaxRequest({
	  			mguniqueurl: "action/saveWholesaleRule", // действия для выполнения на сервере    
	  			data: data,
	  			product: wholesale.selectedProductId,
	  			variant: wholesale.selectedVariantId,
	  			type: $('#tab-wholesale-settings [name=sale-type]').val()
	  		},      
	  		function(response) {
	  		  	admin.indication(response.status, response.msg);
	  		});
	  	},

  	}

})();

wholesale.init();