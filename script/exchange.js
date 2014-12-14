document.addEventListener('DOMContentLoaded', function (arg){
	// ADD EXCHANGE ITEM FORM, BUTTONS, AND FIELDS
	var addExchangeItemField = document.getElementById('add_exchange_item_field');
	var addExchangeItemForm = document.getElementById('AddExchangeItemForm');
	var addExchangeItemSubmitBtn = document.getElementById('add_exchange_item_submit_button');
	var addExchangeItemCloseBtn = document.getElementById('add_exchange_item_close_button');
	var addExchangeItemBtn = document.getElementById('add_button');
	var manageExchangeItemBtn = document.getElementById('manage_exchange_item');
	var exchangeTable = document.getElementById('exchange_table');
	
	var itemNameField = document.getElementById('add_exchange_item_name');
	var imageUrlField = document.getElementById('add_exchange_item_image_link');
	var minPriceField = document.getElementById('add_exchange_item_price');
	var descField = document.getElementById('add_exchange_item_description');
	
	addExchangeItemBtn.parentNode.style.display = 'none';
	exchangeTable.parentNode.style.display = 'none';
	
	manageExchangeItemBtn.onclick = function (arg){
		addExchangeItemBtn.parentNode.style.display = 'initial';
		exchangeTable.parentNode.style.display = 'block';
	};
	
	addExchangeItemBtn.onclick = function (arg){
		addExchangeItemField.style.display = 'block';
	};
	
	addExchangeItemField.onclick = function (arg){
		this.style.display = 'none';
	};
	
	addExchangeItemForm.onclick = function (arg){
		arg.stopPropagation();
	};
	
	addExchangeItemCloseBtn.onclick = function (arg){
		addExchangeItemField.style.display = 'none';
	};
	
	addExchangeItemSubmitBtn.onclick = function (arg){
		var itemName = itemNameField.value;
		var imageUrl = imageUrlField.value;
		var minPrice = minPriceField.value;
		var desc = descField.value;
		
		if(itemName && imageUrl && minPrice && desc){
			itemNameField.name = 'item_name';
			imageUrlField.name = 'image_url';
			minPriceField.name = 'min_price';
			descField.name = 'item_desc';
			
			addExchangeItemForm.method = 'post';
			addExchangeItemForm.target = '_top';
			addExchangeItemForm.action = 'php/exchange.php';
			
			addExchangeItemForm.submit();
		} else{
			createAlert('Please do not leave any fields blank!');
		}
	};
	
	addExchangeItemField.style.display = 'none';
	manageExchangeItemBtn.parentNode.style.display = 'none';
	
	if(isLogin){
		manageExchangeItemBtn.parentNode.style.display = 'initial';
	}
	
	var exchangeDescField = document.getElementById('exchange_description_field');
	var exchangeDescForm = document.getElementById('ExchangeDescriptionForm');
	var exchangeDescCloseBtn = document.getElementById('exchange_desc_close_button');
	
	exchangeDescField.onclick = function (arg){
		this.style.display = 'none';
	};
	
	exchangeDescForm.onclick = function (arg){
		arg.stopPropagation();
	};
	
	exchangeDescCloseBtn.onclick = function (arg){
		exchangeDescField.style.display = 'none';
	};
	
	var readMoreBtns = document.getElementsByClassName('link1');
	for(var i = 0, size = readMoreBtns.length; i < size; ++i){
		var button = readMoreBtns[i];
		button.onclick = function (arg){
			exchangeDescField.style.display = 'block';
		};
	}
});