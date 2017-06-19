var shop;

$(document).ready(function() {

	if(typeof(Storage) !== "undefined") {
		sessionStorage.shop;
	}else {
	 console.log("Sorry, jouw browser ondersteunt geen web storage...");
	}
	
	if (sessionStorage.shop == "undefined" || sessionStorage.shop == undefined) {
		
	}
	else {
		$('#shop_code').val(sessionStorage.shop);
		searchShop();
		$('.scan_shop_box').hide();
	}
	$('.shop_img').hide();
	
});

function searchShop() {
	getShopByCode($('#shop_code').val()).done(function(data) {
		shop = data;
		$('.shop_img').attr("src", "../img/shop_img/s" + shop[0].id + ".jpg")
		$('.shop_img').show()
		$('.scan_shop_box').fadeOut(500);
		sessionStorage.shop = shop[0].code;
		console.log(sessionStorage.shop);
	});
};