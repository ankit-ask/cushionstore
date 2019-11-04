$(document).ready(function () {
	$('.previousbtn').click(function () {
		$('.previousbtn').attr('disabled', true);
		$('.nav-pills > .active').prev('li').find('a').trigger('click');
		setTimeout(function () {
			$('.previousbtn').attr('disabled', false);
		}, 500);
	});

	$('.nextbtn').click(function () {
		$('.nextbtn').attr('disabled', true);
		$('.nav-pills > .active').next('li').find('a').trigger('click');
		setTimeout(function () {
			$('.nextbtn').attr('disabled', false);
		}, 500);
	});

	$('.btnadd').click(function () {
		var curVal = $('.product-qty > input:text').val();
		$('.product-qty > input:text').val(parseInt(curVal) + 1);
		// var price = $('.product-price > p').text();
		// console.log(price);
	});

	$('.btnsub').click(function () {
		var curVal = $('.product-qty > input:text').val();
		if (parseInt(curVal) !== 0) {
			$('.product-qty > input:text').val(parseInt(curVal) - 1);
		}
	});

	$('input[name=shape_radio]').click(function () {
		var c = $('input[name=shape_radio]:checked').val();
		setShapeReviewImage(parseInt(c));
	});
});

var setShapeReviewImage = (c) => {
	switch (c) {
		case 1:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-A.png');
			// console.log(WEB_URL);
			break;
		case 2:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-B.png');
			break;
		case 3:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-C.png');
			break;
		case 4:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-D.png');
			break;
		case 5:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-E.png');
			break;
		case 6:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-F.png');
			break;
	}
};
