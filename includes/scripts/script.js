$(document).ready(function() {
});
function getUserById(i) {
	return $.ajax({
		url: "/api/user",
		type: 'GET',
		contentType: 'application/json',
		dataType: 'json',
		data: { id : i },
		success: function(data){
		   console.log(data);

		}
	});
}

function getShopByCode(i) {
	return $.ajax({
		url: "/api/shop/code",
		type: 'GET',
		contentType: 'application/json',
		dataType: 'json',
		data: { code : i }
	});
}

function getCartByUser(i) {
	return $.ajax({
		url: "/api/cart/user",
		type: 'GET',
		contentType: 'application/json',
		dataType: 'json',
		data: { id : i }
	});
}

function getCartProducts(i) {
	return $.ajax({
		url: "/api/cartProducts",
		type: 'GET',
		contentType: 'application/json',
		dataType: 'json',
		data: { id : i }
	});
}

function getProductById(i) {
	return $.ajax({
		url: "/api/productById",
		type: 'GET',
		contentType: 'application/json',
		dataType: 'json',
		data: { id : i },
	});
}

function getProductByCode(i, m) {
	return $.ajax({
		url: "/api/productByCode",
		type: 'GET',
		contentType: 'application/json',
		dataType: 'json',
		data: { code : i, winkel : m },
	});
}

function setNewMandproduct(i,z,a) {
	
	return $.ajax({
		url: "/api/addProductCart",
		type: 'POST',
		contentType: 'application/x-www-form-urlencoded',
		dataType: 'json',
		data: { mandid : i,
				productid: z,
				aantal: a},
	});
}

function logout() {
	sessionStorage.shop = "undefined";
}
