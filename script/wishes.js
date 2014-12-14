document.addEventListener('DOMContentLoaded', function (arg){
	// ADD WISH BUTTONS, FORM, AND FIELDS
	var addWishBtn = document.getElementById('add_wish_button');
	var addWishField = document.getElementById('add_wish_field');
	var addWishForm = document.getElementById('AddWishForm');
	var addWishSubmitBtn = document.getElementById('add_wish_submit_button');
	var addWishCloseBtn = document.getElementById('add_wish_close_button');
	var manageWishBtn = document.getElementById('manage_wish_button');
	
	var addWishTitleField = document.getElementById('add_wish_title');
	var addWishImageUrlField = document.getElementById('add_wish_image_link');
	var addWishPriceField = document.getElementById('add_wish_price');
	var addWishDescField = document.getElementById('add_wish_description');
	
	// WISH TABLE
	var wishTable = document.getElementById('wish_table');
	
	wishTable.parentNode.style.display = 'none';
	addWishBtn.parentNode.style.display = 'none';
	manageWishBtn.parentNode.style.display = 'none';
	
	manageWishBtn.onclick = function (arg){
		wishTable.parentNode.style.display = 'block';
		addWishBtn.parentNode.style.display = 'initial';
	};
	
	addWishField.style.display = 'none';
	addWishField.onclick = function (arg){
		this.style.display = 'none';
	};
	
	addWishForm.onclick = function (arg){
		arg.stopPropagation();
	};
	
	addWishCloseBtn.onclick = function (arg){
		addWishField.style.display = 'none';
	};
	
	addWishBtn.onclick = function (arg){
		addWishField.style.display = 'block';
	};
	
	addWishSubmitBtn.onclick = function (arg){
		var title = addWishTitleField.value;
		var image_url = addWishImageUrlField.value;
		var price = addWishPriceField.value;
		var desc = addWishDescField.value;
		
		if(title && image_url && price && desc){
			addWishTitleField.name = 'wish_title';
			addWishImageUrlField.name = 'wish_image_url';
			addWishPriceField.name = 'wish_price';
			addWishDescField.name = 'wish_desc';
			
			addWishForm.method = 'post';
			addWishForm.target = '_top';
			addWishForm.action = 'php/wish.php';
			addWishForm.submit();
		} else{
			createAlert('Please do not leave any fields blank!');
		}
	};
	
	if(isLogin){
		manageWishBtn.parentNode.style.display = 'initial';
	}
	
	var wishDescriptionField = document.getElementById('wish_description_field');
	var wishDescriptionForm = document.getElementById('WishDescriptionForm');
	var wishDescriptionCloseBtn = document.getElementById('wish_desc_close_button');
	
	wishDescriptionField.style.display = 'none';
	
	wishDescriptionForm.onclick = function (arg){
		arg.stopPropagation();
	};
	
	wishDescriptionCloseBtn.onclick = function (arg){
		wishDescriptionField.style.display = 'none';
	};
	
	wishDescriptionField.onclick = function (arg){
		this.style.display = 'none';
	};
	
	var readMoreBtns = document.getElementsByClassName('link1');
	for(var i = 0, size = readMoreBtns.length; i < size; ++i){
		var button = readMoreBtns[i];
		
		button.onclick = function (arg){
			wishDescriptionField.style.display = 'block';
		}
	}
});