	$(document).ready(function() {
});

function fillCart(i) {
	var cart;
	var products;
	var bar;
	console.log(i);
	// get cart for current user
	getCartByUser(i).done(function(data) {
		cart = data;
		console.log(data);
		//get all products in current cart
		getCartProducts(data[0].id).done(function(datap) {
			console.log(datap);
			// For each product in current cart do...
			$.each(datap, function(index, value) {
				getProductById(value.productid).done(function(datapr) { 
				p = datapr;
				console.log(p);
				bar += "<div class='cart_row'>";
				bar += "<span><img class='img-thumbnail cart_product_img' src='../img/product_img/p"+value.productid+".jpg'> </span>";
				bar += "<span class='cart_product_name'>"+ p[0].naam +"</span>";
				bar += "<span class='cart_colomn'>aantal: <input class='cart_product_amount' type='number' value='"+ value.aantal +"'></span>";
				bar += "<span class='cart_colomn'>&euro;"+ p[0].prijs +"</span>";
				bar += "<i class='fa fa-times-circle' aria-hidden='true'></i>";
				bar += "</div>";
				$('#cart_table').html(bar);
				});
			});
		});
	});
}