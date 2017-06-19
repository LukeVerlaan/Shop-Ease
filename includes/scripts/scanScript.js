var shop;
var product;

$(document).ready(function() {

	if(typeof(Storage) !== "undefined") {
		sessionStorage.shop;
	}else {
	 console.log("Sorry, jouw browser ondersteunt geen web storage...");
	}
	
	if (sessionStorage.shop == "undefined" || sessionStorage.shop == undefined) {
		$('.add_product_box').hide();
	}
	else {
		$('#shop_code').val(sessionStorage.shop);
		searchShop();
		$('.scan_shop_box').hide();
	}
	
	$('.product_info_box').hide();
	$('#product_amount').val(1);
	
});

function searchShop() {
	getShopByCode($('#shop_code').val()).done(function(data) {
		shop = data;
		$('#shop_name').text(shop[0].naam);
		$('.scan_shop_img').attr("src", "../img/shop_img/s" + shop[0].id + ".jpg")
		$('.scan_shop_box').fadeOut(500);
		$('.add_product_box').delay(500).fadeIn(500);
		sessionStorage.shop = shop[0].code;
		console.log(sessionStorage.shop);
	});
};

function changeShop() {
	shop = undefined;
	sessionStorage.shop = "undefined";
	$('#shop_code').val("");
	$('.add_product_box').fadeOut(500);
	$('.scan_shop_box').delay(500).fadeIn(500);
}

function searchProduct() {
	getProductByCode($('#product_code').val(), shop[0].id).done(function(product) {
		console.log(product);
		if(product.length !== 0) {
			$('.product_info_img').attr("src", "/img/product_img/p" + product[0].id + ".jpg")
			$('#product_name').text(product[0].naam);
			$('#product_id_info').val(product[0].id);
			$('.product_info_box').slideDown("normal");
		}
	})
};

function changeProduct() {
	product = undefined;
	$('.product_info_box').slideUp("normal");
}

function addProductToCart(m) {
	mandid = m;
	productid = $('#product_id_info').val();
	aantal = $('#product_amount').val();
	setNewMandproduct(mandid,productid,aantal);
}