$(document).ready(function () {
	// console.log(JSON.parse(localStorage.getItem('productDetail')));
	$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shapes/product-3-A.png');
	$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
	$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
	$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
	$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
	$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
	$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
	$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/square.png');
	$('.waterfall-radio').prop('checked', true);
	if ($('.waterfall').hide()) {
		$('.waterfall').show();
	}

	$('.othershape').show();
	$('.trapezoid').hide();

	var data = {
		'product-3':
		{
			'shape': { 'index': 1, 'imageName': 'product-3-A', 'type': 'Square Corners' },
			'structure': { 'index': 1, 'imageName': 'product-3-A-waterfall', 'type': 'Waterfall Edge' },
			'dimension': { 'thickness': 2, 'depth': 8, 'width': 8, 'diameter': 0, 'backwidth': 0, 'frontwidth': 0 },
			'cover': { 'trimming': 'No', 'fabric': 'Test Name 1' },
			'fill': { 'type': 'Polyster Fiber' },
			'ties': { 'type': 'None' },
			'productName': 'Custom Chair Back Pads'
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

	$('.trimming-select-button').attr('disabled', true);
	$('#trimming-fabric-img').hide();
	$('#trimming-fabric-alt').show();

	setDataToReview();

	setAllFavouriteFabricsOfUser();

	setAllFavouriteTrimmingOfUser();

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
				fetchedData['product-3'].ties.type = 'None';
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
			fetchedData['product-3'].dimension.depth = 0;
			fetchedData['product-3'].dimension.width = 0;
			fetchedData['product-3'].dimension.backwidth = 0;
			fetchedData['product-3'].dimension.frontwidth = 0;
			fetchedData['product-3'].dimension.diameter = 8;
			fetchedData['product-3'].dimension.thickness = 2;
			$('#diameter').prop('selectedIndex', 0);
			$('#thickness').prop('selectedIndex', 0);
		} else if (parseInt(c) === 6) {
			$('#depth').show();
			$('#width').hide();
			$('#backwidth').show();
			$('#frontwidth').show();
			$('#diameter').hide();
			$('#thickness').show();
			fetchedData['product-3'].dimension.width = 0;
			fetchedData['product-3'].dimension.diameter = 0;
			fetchedData['product-3'].dimension.depth = 8;
			fetchedData['product-3'].dimension.backwidth = 8;
			fetchedData['product-3'].dimension.frontwidth = 8;
			fetchedData['product-3'].dimension.thickness = 2;
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
			fetchedData['product-3'].dimension.diameter = 0;
			fetchedData['product-3'].dimension.backwidth = 0;
			fetchedData['product-3'].dimension.frontwidth = 0;
			fetchedData['product-3'].dimension.width = 8;
			fetchedData['product-3'].dimension.depth = 8;
			fetchedData['product-3'].dimension.thickness = 2;
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

	$('.fabric-detail-button').click(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		fetchedData['product-3'].cover.fabric = $('.modal-fabric').text();
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
		$('#fabricDetailsModal').modal('hide');
		$('#fabricModal').modal('hide');
	});

	$('.trimming-detail-button').click(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		fetchedData['product-3'].cover.trimming = $('.modal-trimming-title').text();
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
		$('#trimmingDetailsModal').modal('hide');
		$('#trimmingModal').modal('hide');
	});

	$('#thickness').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var thick = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-3'].dimension.thickness = thick;
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
		fetchedData['product-3'].dimension.depth = depth;
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
		fetchedData['product-3'].dimension.width = width;
		var ptag = document.getElementById('width-label');
		ptag.innerHTML = width + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#diameter').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var diameter = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-3'].dimension.diameter = diameter;
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
		fetchedData['product-3'].dimension.backwidth = backwidth;
		ptag = document.getElementById('trapezoid-back-width-label');
		ptag.innerHTML = backwidth + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#frontwidth').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var frontwidth = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-3'].dimension.frontwidth = frontwidth;
		var ptag = document.getElementById('trapezoid-width-label');
		ptag.innerHTML = frontwidth + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});


	$('#trimmingoption').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		if ($(this).val() === 'NO TRIMMING') {
			$('.trimming-select-button').attr('disabled', true);
			fetchedData['product-3'].cover.trimming = 'No';
			$('#trimming-fabric-img').hide();
			$('#trimming-fabric-alt').show();

		} else {
			$('.trimming-select-button').attr('disabled', false);
			fetchedData['product-3'].cover.trimming = 'Test Name 1';
			$('#trimming-fabric-img').show();
			$('#trimming-fabric-alt').hide();
		}
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});
});

var setShapeReviewImage = (c) => {
	switch (c) {
		case 1:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shapes/product-3-A.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-A-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/square.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/square/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/square/tie-2.png');
			$('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/square/tie-3.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/square/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/square/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/square/tie-6.png');

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
			fetchedData['product-3'].shape.index = 1;
			fetchedData['product-3'].shape.imageName = 'product-3-A';
			fetchedData['product-3'].shape.type = 'Square Corners';
			fetchedData['product-3'].structure.index = 1;
			fetchedData['product-3'].structure.imageName = 'product-3-A-waterfall';
			fetchedData['product-3'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 2:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shapes/product-3-B.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-B-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-B-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-B-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-B-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-B-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-B-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/top-rounded-corners.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back-corners/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back-corners/tie-2.png');
			$('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back-corners/tie-3.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back-corners/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back-corners/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back-corners/tie-6.png');

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
			fetchedData['product-3'].shape.index = 2;
			fetchedData['product-3'].shape.imageName = 'product-3-B';
			fetchedData['product-3'].shape.type = 'Rounded Back Corners';
			fetchedData['product-3'].structure.index = 1;
			fetchedData['product-3'].structure.imageName = 'product-3-B-waterfall';
			fetchedData['product-3'].structure.imageName = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 3:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shapes/product-3-C.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-C-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-C-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-C-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-C-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-C-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-C-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/all-rounded-corners.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/all-corners-rounded/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/all-corners-rounded/tie-2.png');
			$('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/all-corners-rounded/tie-3.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/all-corners-rounded/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/all-corners-rounded/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/all-corners-rounded/tie-6.png');

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
			fetchedData['product-3'].shape.index = 3;
			fetchedData['product-3'].shape.imageName = 'product-3-C';
			fetchedData['product-3'].shape.type = 'All Corners Rounded';
			fetchedData['product-3'].structure.index = 1;
			fetchedData['product-3'].structure.imageName = 'product-3-C-waterfall';
			fetchedData['product-3'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 4:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shapes/product-3-D.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-D-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-D-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-D-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-D-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-D-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-D-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/rounded-top.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back/tie-2.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/rounded-back/tie-3.png');

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
			fetchedData['product-3'].shape.index = 4;
			fetchedData['product-3'].shape.imageName = 'product-3-D';
			fetchedData['product-3'].shape.type = 'Rounded Back';
			fetchedData['product-3'].structure.index = 1;
			fetchedData['product-3'].structure.imageName = 'product-3-D-waterfall';
			fetchedData['product-3'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 5:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shapes/product-3-E.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-E-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-E-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-E-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-E-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-E-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-E-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/rounded.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/round/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/round/tie-2.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/round/tie-3.png');

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
			fetchedData['product-3'].shape.index = 5;
			fetchedData['product-3'].shape.imageName = 'product-3-E';
			fetchedData['product-3'].shape.type = 'Round';
			fetchedData['product-3'].structure.index = 1;
			fetchedData['product-3'].structure.imageName = 'product-3-E-waterfall';
			fetchedData['product-3'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 6:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shapes/product-3-F.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-F-boxed.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-F-boxed.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-F-boxed.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-F-boxed.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-F-boxed.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/product-3-F-boxed.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/trapezoidal.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/trapezoid/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/trapezoid/tie-2.png');
			$('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/trapezoid/tie-3.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/trapezoid/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/trapezoid/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/tie/trapezoid/tie-6.png');

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
			fetchedData['product-3'].shape.index = 6;
			fetchedData['product-3'].shape.imageName = 'product-3-F';
			fetchedData['product-3'].shape.type = 'Trapezoid';
			fetchedData['product-3'].structure.index = 2;
			fetchedData['product-3'].structure.imageName = 'product-3-F-boxed';
			fetchedData['product-3'].structure.type = 'Boxed Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
	}
	setDataToReview();
};

var setStyleReviewImage = (c) => {
	switch (c) {
		case 1:
			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			var imageName = fetchedData['product-3'].shape.imageName + '-waterfall.png';
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			fetchedData['product-3'].structure.imageName = fetchedData['product-3'].shape.imageName + '-waterfall';
			fetchedData['product-3'].structure.index = 1;
			fetchedData['product-3'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 2:
			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			var imageName = fetchedData['product-3'].shape.imageName + '-boxed.png';
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-three-a/shape-structure/' + imageName);
			fetchedData['product-3'].structure.imageName = fetchedData['product-3'].shape.imageName + '-boxed';
			fetchedData['product-3'].structure.index = 2;
			fetchedData['product-3'].structure.type = 'Boxed Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
	}
	setDataToReview();
};

var setFill = (c) => {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	switch (c) {
		case 1:
			fetchedData['product-3'].fill.type = 'Polyster Fiber';
			break;
		case 2:
			fetchedData['product-3'].fill.type = 'Polyurethane Foam';
			break;
		case 3:
			fetchedData['product-3'].fill.type = 'Reticulated Dry Fast Foam';
			break;
	}
	localStorage.setItem('productDetail', JSON.stringify(fetchedData));
	setDataToReview();
};

var setTies = (c) => {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	switch (c) {
		case 1:
			fetchedData['product-3'].ties.type = 'None';
			break;
		case 2:
			fetchedData['product-3'].ties.type = '2 at back corners';
			break;
		case 3:
			fetchedData['product-3'].ties.type = '2 ties at back';
			break;
		case 4:
			fetchedData['product-3'].ties.type = '4 ties at all corners';
			break;
		case 5:
			fetchedData['product-3'].ties.type = '4 ties at front and back';
			break;
		case 6:
			fetchedData['product-3'].ties.type = '2 ties at sides';
			break;
	}
	localStorage.setItem('productDetail', JSON.stringify(fetchedData));
	setDataToReview();
};

// Opening Modals
function openModal() {
	$('#fabricModal').modal('show');
}

function openTrimmingModal() {
	$('#trimmingModal').modal('show');
}

function openFabricDetailsModal(i) {
	$('#fabricDetailsModal').modal('show');
	var fabricName = $(`.scrollable-div:first .DetailView${i} > .fabric-item-label > p:first-of-type`).text();
	$('.modal-fabric').text(fabricName);
}

function openTrimmingDetailsModal(i) {
	$('#trimmingDetailsModal').modal('show');
	var trimmingName = $(`.trimming-div:first .SelectTrimming${i} > .fabric-item-label > p:first-of-type`).text();
	$('.modal-trimming-title').text(trimmingName);
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

	shape.innerHTML = fetchedData['product-3'].shape.type;
	style.innerHTML = fetchedData['product-3'].structure.type;
	fill.innerHTML = fetchedData['product-3'].fill.type;
	ties.innerHTML = fetchedData['product-3'].ties.type;
	cover.innerHTML = fetchedData['product-3'].cover.fabric;
	trimming.innerHTML = fetchedData['product-3'].cover.trimming;

	var selectedShape = fetchedData['product-3'].shape.index;
	if (selectedShape === 5) {
		dimensions.innerHTML = fetchedData['product-3'].dimension.diameter + ' Diameter' + ' x ' + fetchedData['product-3'].dimension.thickness + ' Thick';
	} else if (selectedShape === 6) {
		dimensions.innerHTML = fetchedData['product-3'].dimension.frontwidth + ' Front' + ' x ' + fetchedData['product-3'].dimension.backwidth + ' Back' + ' x ' + fetchedData['product-3'].dimension.depth + ' Deep' + ' x ' + fetchedData['product-3'].dimension.thickness + ' Thick';
	} else {
		dimensions.innerHTML = fetchedData['product-3'].dimension.width + 'W' + ' x ' + fetchedData['product-3'].dimension.depth + 'L' + ' x ' + fetchedData['product-3'].dimension.thickness + 'T';
	}
}

function moveFabricToFavourite(i) {
	var fetchedFabricData = JSON.parse(localStorage.getItem('fabricData'));
	if (!$(`.TestName${i} > span`).hasClass('favorite-wrapper-selected')) {
		$(`.TestName${i}`).clone().appendTo('.copyToFavourite');
		$(`.TestName${i} > span`).removeClass('favorite-wrapper');
		$(`.TestName${i} > span`).addClass('favorite-wrapper-selected');
		var data;
		if (!fetchedFabricData) {
			data = { 'favouritesFabric': [] };
			data.favouritesFabric.push(`.TestName${i}`);
			localStorage.setItem('fabricData', JSON.stringify(data));
		} else {
			fetchedFabricData.favouritesFabric.push(`.TestName${i}`);
			localStorage.setItem('fabricData', JSON.stringify(fetchedFabricData));
		}
	} else {
		$(`.TestName${i} > span`).removeClass('favorite-wrapper-selected');
		$(`.TestName${i} > span`).addClass('favorite-wrapper');
		$(`.copyToFavourite > .TestName${i}`).remove();
		if (fetchedFabricData) {
			var index = fetchedFabricData['favouritesFabric'].indexOf(`.TestName${i}`);
			fetchedFabricData['favouritesFabric'].splice(index, 1);
			localStorage.setItem('fabricData', JSON.stringify(fetchedFabricData));
		}
	}
}

function setAllFavouriteFabricsOfUser() {
	var fetchedFabricData = JSON.parse(localStorage.getItem('fabricData'));
	if (fetchedFabricData) {
		fetchedFabricData['favouritesFabric'].forEach(function (item) {
			$(item).clone().appendTo('.copyToFavourite');
			$(`${item} > span`).removeClass('favorite-wrapper')
			$(`${item} > span`).addClass('favorite-wrapper-selected')
		});
	}
}

function moveTrimmingToFavourite(i) {
	var fetchedTrimmingData = JSON.parse(localStorage.getItem('trimmingData'));
	if (!$(`.SelectTrimming${i} > span`).hasClass('favorite-wrapper-selected')) {
		$(`.SelectTrimming${i}`).clone().appendTo('.copyTrimmingToFavourite');
		$(`.SelectTrimming${i} > span`).removeClass('favorite-wrapper')
		$(`.SelectTrimming${i} > span`).addClass('favorite-wrapper-selected')
		var fetchedTrimmingData = JSON.parse(localStorage.getItem('trimmingData'));
		var data;
		if (!fetchedTrimmingData) {
			data = { 'favouritesTrimming': [] };
			data.favouritesTrimming.push(`.SelectTrimming${i}`);
			localStorage.setItem('trimmingData', JSON.stringify(data));
		} else {
			fetchedTrimmingData.favouritesTrimming.push(`.SelectTrimming${i}`);
			localStorage.setItem('trimmingData', JSON.stringify(fetchedTrimmingData));
		}
	} else {
		$(`.SelectTrimming${i} > span`).removeClass('favorite-wrapper-selected');
		$(`.SelectTrimming${i} > span`).addClass('favorite-wrapper');
		$(`.copyTrimmingToFavourite > .SelectTrimming${i}`).remove();
		if (fetchedTrimmingData) {
			var index = fetchedTrimmingData['favouritesTrimming'].indexOf(`.SelectTrimming${i}`);
			fetchedTrimmingData['favouritesTrimming'].splice(index, 1);
			localStorage.setItem('trimmingData', JSON.stringify(fetchedTrimmingData));
		}
	}
}

function setAllFavouriteTrimmingOfUser() {
	var fetchedTrimmingData = JSON.parse(localStorage.getItem('trimmingData'));
	if (fetchedTrimmingData) {
		fetchedTrimmingData['favouritesTrimming'].forEach(function (item) {
			$(item).clone().appendTo('.copyTrimmingToFavourite');
			$(`${item} > span`).removeClass('favorite-wrapper')
			$(`${item} > span`).addClass('favorite-wrapper-selected')
		});
	}
}