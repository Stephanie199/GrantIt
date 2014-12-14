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
		wishTable.parentNode.style.display = 'initial';
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
	
	/*
	var deleteBtns = document.getElementsByClassName('table_icon_delete');
	
	for(var i = 0, size = deleteBtns.length; i < size; ++i){
		var button = deleteBtns[i];
		
		button.onclick = function (arg){
			var row = this.parentNode.parentNode;
			var wid = row.cells[0].textContent;
			
			var form = document.createElement('form');
			form.method = 'post';
			form.target = '_self';
			form.action = 'php/del_wish.php';
			
			var input = document.createElement('input');
			input.type = 'hidden';
			input.value = wid;
			input.name = 'wid';
			
			form.appendChild(input);
			form.submit();
		};
	}
	*/
});