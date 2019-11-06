$(document).ready(function () {
	// console.log(JSON.parse(localStorage.getItem('productDetail')));
	$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-A.png');
	$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
	$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
	$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
	$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
	$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
	$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
	$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-one/seat-selet-square.png');
	$('.waterfall-radio').prop('checked', true);
	if ($('.waterfall').hide()) {
		$('.waterfall').show();
	}

	$('.othershape').show();
	$('.trapezoid').hide();

	var data = {
		'product-1':
		{
			'shape': { 'index': 1, 'imageName': 'product-1-A', 'type': 'Square Corners' },
			'structure': { 'index': 1, 'imageName': 'product-1-A-waterfall', 'type': 'Waterfall Edge' },
			'dimension': { 'thickness': 2, 'depth': 8, 'width': 8, 'diameter': 0, 'backwidth': 0, 'frontwidth':0 },
			'cover': { 'trimming': 'yes' },
			'fill': { 'type': 'Polyster Fiber' },
			'ties': {'type': 'None'}
		}
	}
	localStorage.setItem('productDetail', JSON.stringify(data));

	setValueToDepthInDimension();
	setValueToWidthInDimension();
	setValueToDiameterInDimension();
	setValueToBackWidthInDimension();
	setValueToFrontWidthInDimension();

	$('#backwidth').hide();
	$('#frontwidth').hide();
	$('#diameter').hide();

	setDataToReview();

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
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		if (parseInt(c) === 4 || parseInt(c) === 5) {
			$('.remove').hide();
			var checked = parseInt($('input[name=ties_radio]:checked').val());
			if (checked === 3 || checked == 5 || checked == 6) {
				$('.square-corner-radio').prop('checked', true);
				// var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
				fetchedData['product-1'].ties.type = 'None';
				// localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			}
		} else {
			$('.remove').show();
		}

		if (parseInt(c) === 5) {
			$('#depth').hide();
			$('#width').hide();
			$('#backwidth').hide();
			$('#frontwidth').hide();
			$('#diameter').show();
			$('#thickness').show();
			fetchedData['product-1'].dimension.depth = 0;
			fetchedData['product-1'].dimension.width = 0;
			fetchedData['product-1'].dimension.backwidth = 0;
			fetchedData['product-1'].dimension.frontwidth = 0;
			fetchedData['product-1'].dimension.diameter = 8;
			fetchedData['product-1'].dimension.thickness = 2;
			$('#diameter').prop('selectedIndex', 0);
			$('#thickness').prop('selectedIndex', 0);
		} else if (parseInt(c) === 6) {
			$('#depth').show();
			$('#width').hide();
			$('#backwidth').show();
			$('#frontwidth').show();
			$('#diameter').hide();
			$('#thickness').show();
			fetchedData['product-1'].dimension.width = 0;
			fetchedData['product-1'].dimension.diameter = 0;
			fetchedData['product-1'].dimension.depth = 8;
			fetchedData['product-1'].dimension.backwidth = 8;
			fetchedData['product-1'].dimension.frontwidth = 8;
			fetchedData['product-1'].dimension.thickness = 2;
			$('#depth').prop('selectedIndex', 0);
			$('#backwidth').prop('selectedIndex', 0);
			$('#frontwidth').prop('selectedIndex', 0);
			$('#thickness').prop('selectedIndex', 0);
		} else {
			$('#depth').show();
			$('#width').show();
			$('#backwidth').hide();
			$('#frontwidth').hide();
			$('#diameter').hide();
			$('#thickness').show();
			fetchedData['product-1'].dimension.diameter = 0;
			fetchedData['product-1'].dimension.backwidth = 0;
			fetchedData['product-1'].dimension.frontwidth = 0;
			fetchedData['product-1'].dimension.width = 8;
			fetchedData['product-1'].dimension.depth = 8;
			fetchedData['product-1'].dimension.thickness = 2;
			$('#depth').prop('selectedIndex', 0);
			$('#width').prop('selectedIndex', 0);
			$('#thickness').prop('selectedIndex', 0);
		}

		localStorage.setItem('productDetail', JSON.stringify(fetchedData));

		setShapeReviewImage(parseInt(c));
	});

	$('input[name=style_radio]').click(function () {
		var c = $('input[name=style_radio]:checked').val();
		setStyleReviewImage(parseInt(c));
	});

	$('input[name=fill_radio]').click(function () {
		var c = $('input[name=fill_radio]:checked').val();
		setFill(parseInt(c));
	});

	$('input[name=ties_radio]').click(function () {
		var c = $('input[name=ties_radio]:checked').val();
		setTies(parseInt(c));
	});

	$('#thickness').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var thick = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-1'].dimension.thickness = thick;
		var ptag = document.getElementById('thickness-label');
		ptag.innerHTML = thick + '"' + ' THICK';
		ptag = document.getElementById('trapezoid-thickness-label');
		ptag.innerHTML = thick + '"' + ' THICK';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#depth').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var depth = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-1'].dimension.depth = depth;
		var ptag = document.getElementById('height-label');
		ptag.innerHTML = depth + '"';
		ptag = document.getElementById('trapezoid-height-label');
		ptag.innerHTML = depth + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#width').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var width = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-1'].dimension.width = width;
		var ptag = document.getElementById('width-label');
		ptag.innerHTML = width + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#diameter').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var diameter = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-1'].dimension.diameter = diameter;
		var ptag = document.getElementById('height-label');
		ptag.innerHTML = diameter + '"';
		ptag = document.getElementById('width-label');
		ptag.innerHTML = diameter + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#backwidth').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var backwidth = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-1'].dimension.backwidth = backwidth;
		ptag = document.getElementById('trapezoid-back-width-label');
		ptag.innerHTML = backwidth + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#frontwidth').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var frontwidth = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-1'].dimension.frontwidth = frontwidth;
		var ptag = document.getElementById('trapezoid-width-label');
		ptag.innerHTML = frontwidth + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});


	$('#trimming').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		if ($(this).val() === 'NO TRIMMING') {
			$('.trimming-select-button').attr('disabled', true);
			fetchedData['product-1'].cover.trimming = 'no'
		} else {
			$('.trimming-select-button').attr('disabled', false);
			fetchedData['product-1'].cover.trimming = 'yes'
		}
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
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
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-A-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-one/seat-selet-square.png');

			var ptag = document.getElementById('thickness-label');
			ptag.innerHTML = 2 + '"' + ' THICK';
			ptag = document.getElementById('height-label');
			ptag.innerHTML = 8 + '"';
			ptag = document.getElementById('width-label');
			ptag.innerHTML = 8 + '"';

			$('.othershape').show();
			$('.trapezoid').hide();

			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-1'].shape.index = 1;
			fetchedData['product-1'].shape.imageName = 'product-1-A';
			fetchedData['product-1'].shape.type = 'Square Corners';
			fetchedData['product-1'].structure.index = 1;
			fetchedData['product-1'].structure.imageName = 'product-1-A-waterfall';
			fetchedData['product-1'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 2:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-B.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-B-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-one/top-rounded-corners.png');

			var ptag = document.getElementById('thickness-label');
			ptag.innerHTML = 2 + '"' + ' THICK';
			ptag = document.getElementById('height-label');
			ptag.innerHTML = 8 + '"';
			ptag = document.getElementById('width-label');
			ptag.innerHTML = 8 + '"';

			$('.othershape').show();
			$('.trapezoid').hide();

			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-1'].shape.index = 2;
			fetchedData['product-1'].shape.imageName = 'product-1-B';
			fetchedData['product-1'].shape.type = 'Rounded Back Corners';
			fetchedData['product-1'].structure.index = 1;
			fetchedData['product-1'].structure.imageName = 'product-1-B-waterfall';
			fetchedData['product-1'].structure.imageName = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 3:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-C.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-C-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-one/all-rounded-corners.png');

			var ptag = document.getElementById('thickness-label');
			ptag.innerHTML = 2 + '"' + ' THICK';
			ptag = document.getElementById('height-label');
			ptag.innerHTML = 8 + '"';
			ptag = document.getElementById('width-label');
			ptag.innerHTML = 8 + '"';

			$('.othershape').show();
			$('.trapezoid').hide();

			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-1'].shape.index = 3;
			fetchedData['product-1'].shape.imageName = 'product-1-C';
			fetchedData['product-1'].shape.type = 'All Corners Rounded';
			fetchedData['product-1'].structure.index = 1;
			fetchedData['product-1'].structure.imageName = 'product-1-C-waterfall';
			fetchedData['product-1'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 4:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-D.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-D-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-one/rounded-back.png');

			var ptag = document.getElementById('thickness-label');
			ptag.innerHTML = 2 + '"' + ' THICK';
			ptag = document.getElementById('height-label');
			ptag.innerHTML = 8 + '"';
			ptag = document.getElementById('width-label');
			ptag.innerHTML = 8 + '"';

			$('.othershape').show();
			$('.trapezoid').hide();

			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-1'].shape.index = 4;
			fetchedData['product-1'].shape.imageName = 'product-1-D';
			fetchedData['product-1'].shape.type = 'Rounded Back';
			fetchedData['product-1'].structure.index = 1;
			fetchedData['product-1'].structure.imageName = 'product-1-D-waterfall';
			fetchedData['product-1'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 5:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-E.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-E-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-one/rounded.png');

			var ptag = document.getElementById('thickness-label');
			ptag.innerHTML = 2 + '"' + ' THICK';
			ptag = document.getElementById('height-label');
			ptag.innerHTML = 8 + '"';
			ptag = document.getElementById('width-label');
			ptag.innerHTML = 8 + '"';

			$('.waterfall-radio').prop('checked', true);
			if ($('.waterfall').hide()) {
				$('.waterfall').show();
			}

			$('.othershape').show();
			$('.trapezoid').hide();

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-1'].shape.index = 5;
			fetchedData['product-1'].shape.imageName = 'product-1-E';
			fetchedData['product-1'].shape.type = 'Round';
			fetchedData['product-1'].structure.index = 1;
			fetchedData['product-1'].structure.imageName = 'product-1-E-waterfall';
			fetchedData['product-1'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 6:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shapes/product-1-F.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-boxed.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-boxed.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-boxed.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-boxed.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-boxed.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/product-1-F-boxed.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-one/trapezoidal.png');

			var ptag = document.getElementById('trapezoid-thickness-label');
			ptag.innerHTML = 2 + '"' + ' THICK';
			ptag = document.getElementById('trapezoid-back-width-label');
			ptag.innerHTML = 8 + '"';
			ptag = document.getElementById('trapezoid-height-label');
			ptag.innerHTML = 8 + '"';
			ptag = document.getElementById('trapezoid-width-label');
			ptag.innerHTML = 8 + '"';

			$('.othershape').hide();
			$('.trapezoid').show();

			$('.waterfall').hide();
			$('.boxed-radio').prop('checked', true);

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-1'].shape.index = 6;
			fetchedData['product-1'].shape.imageName = 'product-1-F';
			fetchedData['product-1'].shape.type = 'Trapezoid';
			fetchedData['product-1'].structure.index = 2;
			fetchedData['product-1'].structure.imageName = 'product-1-F-boxed';
			fetchedData['product-1'].structure.type = 'Boxed Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
	}
	setDataToReview();
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
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			fetchedData['product-1'].structure.imageName = fetchedData['product-1'].shape.imageName + '-waterfall';
			fetchedData['product-1'].structure.index = 1;
			fetchedData['product-1'].structure.type = 'Waterfall Edge';
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
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-one/shape-structure/' + imageName);
			fetchedData['product-1'].structure.imageName = fetchedData['product-1'].shape.imageName + '-boxed';
			fetchedData['product-1'].structure.index = 2;
			fetchedData['product-1'].structure.type = 'Boxed Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
	}
	setDataToReview();
};

var setFill = (c) => {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	switch (c) {
		case 1:
			fetchedData['product-1'].fill.type = 'Polyster Fiber';
			break;
		case 2:
			fetchedData['product-1'].fill.type = 'Polyurethane Foam';
			break;
		case 3:
			fetchedData['product-1'].fill.type = 'Reticulated Dry Fast Foam';
			break;
	}
	localStorage.setItem('productDetail', JSON.stringify(fetchedData));
	setDataToReview();
};

var setTies = (c) => {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	switch (c) {
		case 1:
			fetchedData['product-1'].ties.type = 'None';
			break;
		case 2:
			fetchedData['product-1'].ties.type = '2 at back corners';
			break;
		case 3:
			fetchedData['product-1'].ties.type = '2 ties at back';
			break;
		case 4:
			fetchedData['product-1'].ties.type = '4 ties at all corners';
			break;
		case 5:
			fetchedData['product-1'].ties.type = '4 ties at front and back';
			break;
		case 6:
			fetchedData['product-1'].ties.type = '2 ties at sides';
			break;
	}
	localStorage.setItem('productDetail', JSON.stringify(fetchedData));
	setDataToReview();
};

// Run Modal
function openModal() {
	$('#myModal').modal('show');
}

function setValueToDepthInDimension() {
	for (var i = 8; i <= 50; i += 0.5) {
		$('#depth').append(`<option>${i} DEPTH</option>`);
	}
}

function setValueToWidthInDimension() {
	for (var i = 8; i <= 50; i += 0.5) {
		$('#width').append(`<option>${i} WIDTH</option>`);
	}
}

function setValueToDiameterInDimension() {
	for (var i = 8; i <= 50; i += 0.5) {
		$('#diameter').append(`<option>${i} DIAMETER</option>`);
	}
}

function setValueToBackWidthInDimension() {
	for (var i = 8; i <= 50; i += 0.5) {
		$('#backwidth').append(`<option>${i} BACK WIDTH</option>`);
	}
}

function setValueToFrontWidthInDimension() {
	for (var i = 8; i <= 50; i += 0.5) {
		$('#frontwidth').append(`<option>${i} FRONT WIDTH</option>`);
	}
}

function setDataToReview() {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	var product = document.getElementById('productreview');
	var shape = document.getElementById('shapereview');
	var style = document.getElementById('stylereview');
	var dimensions = document.getElementById('dimensionsreview');
	var cover = document.getElementById('coverreview');
	var trimming = document.getElementById('trimmingreview');
	var fill = document.getElementById('fillreview');
	var ties = document.getElementById('tiesreview');
	
	shape.innerHTML = fetchedData['product-1'].shape.type;
	style.innerHTML = fetchedData['product-1'].structure.type;
	fill.innerHTML = fetchedData['product-1'].fill.type;
	ties.innerHTML = fetchedData['product-1'].ties.type;  

	var selectedShape = fetchedData['product-1'].shape.index;
	if (selectedShape === 5) {
		dimensions.innerHTML = fetchedData['product-1'].dimension.diameter + ' Diameter' + ' x ' + fetchedData['product-1'].dimension.thickness + ' Thick';
	} else if (selectedShape === 6) {
		dimensions.innerHTML = fetchedData['product-1'].dimension.frontwidth + ' Front' + ' x ' + fetchedData['product-1'].dimension.backwidth + ' Back' + ' x ' + fetchedData['product-1'].dimension.depth + ' Deep' + ' x ' + fetchedData['product-1'].dimension.thickness + ' Thick';
	} else {
		dimensions.innerHTML = fetchedData['product-1'].dimension.width + 'W' + ' x ' + fetchedData['product-1'].dimension.depth + 'L' + ' x ' + fetchedData['product-1'].dimension.thickness + 'T';
	}
}