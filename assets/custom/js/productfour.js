$(document).ready(function () {
	// console.log(JSON.parse(localStorage.getItem('productDetail')));
	$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shapes/product-4-A.png');
	$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
	$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
	$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
	$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
	$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
	$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
	$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-four/modern-clean.png');
	$('.waterfall-radio').prop('checked', true);
	if ($('.waterfall').hide()) {
		$('.waterfall').show();
	}

	var data = {
		'product-4':
		{
			'shape': { 'index': 1, 'imageName': 'product-4-A', 'type': 'Modern Clean' },
			'structure': { 'index': 1, 'imageName': 'product-4-A-waterfall', 'type': 'Waterfall Edge' },
			'dimension': { 'thickness': 2, 'width': 8, 'back': 8, 'seat': 8 },
			'cover': { 'trimming': 'No', 'fabric': 'Test Name 1' },
			'fill': { 'type': 'Polyster Fiber' },
			'ties': { 'type': 'None' },
			'productName': 'Custom Chair Cushion'
		}
	}
	localStorage.setItem('productDetail', JSON.stringify(data));

	setValueToWidthInDimension();
	setValueTobackInDimension();
	setValueToseatInDimension();

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
		fetchedData['product-4'].cover.fabric = $('.modal-fabric').text();
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
		$('#fabricDetailsModal').modal('hide');
		$('#fabricModal').modal('hide');
	});

	$('.trimming-detail-button').click(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		fetchedData['product-4'].cover.trimming = $('.modal-trimming-title').text();
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
		$('#trimmingDetailsModal').modal('hide');
		$('#trimmingModal').modal('hide');
	});

	$('#thickness').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var thick = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-4'].dimension.thickness = thick;
		var ptag = document.getElementById('thickness-label');
		ptag.innerHTML = thick + '"' + ' THICK';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#width').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var width = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-4'].dimension.width = width;
		var ptag = document.getElementById('width-label');
		ptag.innerHTML = width + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#back').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var back = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-4'].dimension.back = back;
		var ptag = document.getElementById('back-label');
		ptag.innerHTML = back + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#seat').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var seat = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-4'].dimension.seat = seat;
		ptag = document.getElementById('seat-label');
		ptag.innerHTML = seat + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#trimmingoption').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		if ($(this).val() === 'NO TRIMMING') {
			$('.trimming-select-button').attr('disabled', true);
			fetchedData['product-4'].cover.trimming = 'No';
			$('#trimming-fabric-img').hide();
			$('#trimming-fabric-alt').show();

		} else {
			$('.trimming-select-button').attr('disabled', false);
			fetchedData['product-4'].cover.trimming = 'Test Name 1';
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
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shapes/product-4-A.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-A-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-four/modern-clean.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-clean/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-clean/tie-2.png');
			$('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-clean/tie-3.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-clean/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-clean/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-clean/tie-6.png');

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-4'].shape.index = 1;
			fetchedData['product-4'].shape.imageName = 'product-4-A';
			fetchedData['product-4'].shape.type = 'Modern Clean';
			fetchedData['product-4'].structure.index = 1;
			fetchedData['product-4'].structure.imageName = 'product-4-A-waterfall';
			fetchedData['product-4'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 2:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shapes/product-4-B.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-B-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-B-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-B-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-B-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-B-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-B-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-four/modern-tufted.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-tufted/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-tufted/tie-2.png');
			$('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-tufted/tie-3.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-tufted/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-tufted/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-tufted/tie-6.png');

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-4'].shape.index = 2;
			fetchedData['product-4'].shape.imageName = 'product-4-B';
			fetchedData['product-4'].shape.type = 'Modern Tufted';
			fetchedData['product-4'].structure.index = 1;
			fetchedData['product-4'].structure.imageName = 'product-4-B-waterfall';
			fetchedData['product-4'].structure.imageName = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 3:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shapes/product-4-C.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-C-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-C-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-C-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-C-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-C-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-C-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-four/modern-sectioned.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-sectioned/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-sectioned/tie-2.png');
			$('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-sectioned/tie-3.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-sectioned/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-sectioned/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/modern-sectioned/tie-6.png');

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-4'].shape.index = 3;
			fetchedData['product-4'].shape.imageName = 'product-4-C';
			fetchedData['product-4'].shape.type = 'Modern Sectioned';
			fetchedData['product-4'].structure.index = 1;
			fetchedData['product-4'].structure.imageName = 'product-4-C-waterfall';
			fetchedData['product-4'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 4:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shapes/product-4-D.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-D-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-D-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-D-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-D-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-D-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-D-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-four/traditional-clean.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-clean/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-clean/tie-2.png');
            $('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-clean/tie-3.png');
            $('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-clean/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-clean/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-clean/tie-6.png');

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-4'].shape.index = 4;
			fetchedData['product-4'].shape.imageName = 'product-4-D';
			fetchedData['product-4'].shape.type = 'Traditional Clean';
			fetchedData['product-4'].structure.index = 1;
			fetchedData['product-4'].structure.imageName = 'product-4-D-waterfall';
			fetchedData['product-4'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 5:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shapes/product-4-E.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-E-waterfall.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-E-waterfall.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-E-waterfall.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-E-waterfall.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-E-waterfall.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-E-waterfall.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-four/traditional-tufted.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-tufted/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-tufted/tie-2.png');
            $('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-tufted/tie-3.png');
            $('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-tufted/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-tufted/tie-5.png');
            $('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-tufted/tie-6.png');

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-4'].shape.index = 5;
			fetchedData['product-4'].shape.imageName = 'product-4-E';
			fetchedData['product-4'].shape.type = 'Traditional Tufted';
			fetchedData['product-4'].structure.index = 1;
			fetchedData['product-4'].structure.imageName = 'product-4-E-waterfall';
			fetchedData['product-4'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 6:
			$('#imageShapeReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shapes/product-4-F.png');
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-F-boxed.png');
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-F-boxed.png');
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-F-boxed.png');
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-F-boxed.png');
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-F-boxed.png');
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/product-4-F-boxed.png');
			$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-four/traditional-sectioned.png');

			// set shape to tie similar to selected shape
			$('.ties1').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-sectioned/tie-1.png');
			$('.ties2').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-sectioned/tie-2.png');
			$('.ties3').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-sectioned/tie-3.png');
			$('.ties4').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-sectioned/tie-4.png');
			$('.ties5').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-sectioned/tie-5.png');
			$('.ties6').attr("src", WEB_URL + '/assets/images/stepper/product-four/tie/traditional-sectioned/tie-6.png');

			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			fetchedData['product-4'].shape.index = 6;
			fetchedData['product-4'].shape.imageName = 'product-4-F';
			fetchedData['product-4'].shape.type = 'Traditional Sectioned';
			fetchedData['product-4'].structure.index = 2;
			fetchedData['product-4'].structure.imageName = 'product-4-F-boxed';
			fetchedData['product-4'].structure.type = 'Boxed Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
	}
	setDataToReview();
};

var setStyleReviewImage = (c) => {
	switch (c) {
		case 1:
			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			var imageName = fetchedData['product-4'].shape.imageName + '-waterfall.png';
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			fetchedData['product-4'].structure.imageName = fetchedData['product-4'].shape.imageName + '-waterfall';
			fetchedData['product-4'].structure.index = 1;
			fetchedData['product-4'].structure.type = 'Waterfall Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
		case 2:
			var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
			var imageName = fetchedData['product-4'].shape.imageName + '-boxed.png';
			$('#imageStyleReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-four/shape-structure/' + imageName);
			fetchedData['product-4'].structure.imageName = fetchedData['product-4'].shape.imageName + '-boxed';
			fetchedData['product-4'].structure.index = 2;
			fetchedData['product-4'].structure.type = 'Boxed Edge';
			localStorage.setItem('productDetail', JSON.stringify(fetchedData));
			break;
	}
	setDataToReview();
};

var setFill = (c) => {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	switch (c) {
		case 1:
			fetchedData['product-4'].fill.type = 'Polyster Fiber';
			break;
		case 2:
			fetchedData['product-4'].fill.type = 'Polyurethane Foam';
			break;
		case 3:
			fetchedData['product-4'].fill.type = 'Reticulated Dry Fast Foam';
			break;
	}
	localStorage.setItem('productDetail', JSON.stringify(fetchedData));
	setDataToReview();
};

var setTies = (c) => {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	switch (c) {
		case 1:
			fetchedData['product-4'].ties.type = 'None';
			break;
		case 2:
			fetchedData['product-4'].ties.type = '2 at back corners';
			break;
		case 3:
			fetchedData['product-4'].ties.type = '2 ties at back';
			break;
		case 4:
			fetchedData['product-4'].ties.type = '4 ties at all corners';
			break;
		case 5:
			fetchedData['product-4'].ties.type = '4 ties at front and back';
			break;
		case 6:
			fetchedData['product-4'].ties.type = '2 ties at sides';
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

function setValueToWidthInDimension() {
	for (var i = 8; i <= 50; i += 0.5) {
		$('#width').append(`<option>${i} WIDTH</option>`);
	}
}

function setValueTobackInDimension() {
	for (var i = 8; i <= 50; i += 0.5) {
		$('#back').append(`<option>${i} BACK</option>`);
	}
}

function setValueToseatInDimension() {
	for (var i = 8; i <= 50; i += 0.5) {
		$('#seat').append(`<option>${i} SEAT</option>`);
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

	shape.innerHTML = fetchedData['product-4'].shape.type;
	style.innerHTML = fetchedData['product-4'].structure.type;
	fill.innerHTML = fetchedData['product-4'].fill.type;
	ties.innerHTML = fetchedData['product-4'].ties.type;
	cover.innerHTML = fetchedData['product-4'].cover.fabric;
    trimming.innerHTML = fetchedData['product-4'].cover.trimming;
    dimensions.innerHTML = fetchedData['product-4'].dimension.width + 'W' + ' x ' + fetchedData['product-4'].dimension.seat + 'S' + ' x ' + fetchedData['product-4'].dimension.back + 'B' + ' x ' + fetchedData['product-4'].dimension.thickness + 'T';

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