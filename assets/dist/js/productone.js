$(document).ready(function () {
	// console.log(JSON.parse(localStorage.getItem('productDetail')));
	$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-A.png');
	$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
	$('.waterfall-radio').prop('checked', true);
	if ($('.waterfall').hide()) {
		$('.waterfall').show();
	}
	var data = { 'product-1': { 'shape': { 'index': 1, 'imageName': 'product-1-A' }, 'structure': { 'index': 1, 'imageName': 'product-1-A-waterfall' } } }
	localStorage.setItem('productDetail', JSON.stringify(data));

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
		if (parseInt(curVal) > 1) {
			$('.product-qty > input:text').val(parseInt(curVal) - 1);
		}
	});

	$('input[name=shape_radio]').click(function () {
		var c = $('input[name=shape_radio]:checked').val();
		setShapeReviewImage(parseInt(c));
	});

	$('input[name=style_radio]').click(function () {
		var c = $('input[name=style_radio]:checked').val();
		setStyleReviewImage(parseInt(c));
	});
});

var setShapeReviewImage = (c) => {
	switch (c) {
		case 1:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-A.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}
			var data = { 'product-1': { 'shape': { 'index': 1, 'imageName': 'product-1-A' }, 'structure': { 'index': 1, 'imageName': 'product-1-A-waterfall' } } }
			localStorage.setItem('productDetail', JSON.stringify(data));
			break;
		case 2:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-B.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}
			var data = { 'product-1': { 'shape': { 'index': 2, 'imageName': 'product-1-B' }, 'structure': { 'index': 1, 'imageName': 'product-1-B-waterfall' } } }
			localStorage.setItem('productDetail', JSON.stringify(data));
			break;
		case 3:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-C.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}
			var data = { 'product-1': { 'shape': { 'index': 3, 'imageName': 'product-1-C' }, 'structure': { 'index': 1, 'imageName': 'product-1-C-waterfall' } } }
			localStorage.setItem('productDetail', JSON.stringify(data));
			break;
		case 4:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-D.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}
			var data = { 'product-1': { 'shape': { 'index': 4, 'imageName': 'product-1-D' }, 'structure': { 'index': 1, 'imageName': 'product-1-D-waterfall' } } }
			localStorage.setItem('productDetail', JSON.stringify(data));
			break;
		case 5:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-E.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}
			var data = { 'product-1': { 'shape': { 'index': 5, 'imageName': 'product-1-E' }, 'structure': { 'index': 1, 'imageName': 'product-1-E-waterfall' } } }
			localStorage.setItem('productDetail', JSON.stringify(data));
			break;
		case 6:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-F.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-F-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-waterfall.png');
			$('.waterfall').hide();
			$('.waterfall-radio').prop('checked', true);
			var data = { 'product-1': { 'shape': { 'index': 6, 'imageName': 'product-1-F' }, 'structure': { 'index': 1, 'imageName': 'product-1-F-waterfall' } } }
			localStorage.setItem('productDetail', JSON.stringify(data));
			break;
	}
};

var setStyleReviewImage = (c) => {
	switch (c) {
		case 1:
			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			var imageName = fetchedData['product-1'].shape.imageName + '-waterfall.png';
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			fetchedData['product-1'].structure.imageName = imageName;
			fetchedData['product-1'].structure.index = 1;
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 2:
			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			var imageName = fetchedData['product-1'].shape.imageName + '-boxed.png';
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			fetchedData['product-1'].structure.imageName = imageName;
			fetchedData['product-1'].structure.index = 2;
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
	}
};
