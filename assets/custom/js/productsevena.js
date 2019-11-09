$(document).ready(function () {
	
	$('#imageDimensionReview').attr("src", WEB_URL + '/assets/images/stepper/product-seven-a/shapes/product-7-A.png');
	$('#imageCoverReview').attr("src", WEB_URL + '/assets/images/stepper/product-seven-a/shapes/product-7-A.png');
	$('#imageFillReview').attr("src", WEB_URL + '/assets/images/stepper/product-seven-a/shapes/product-7-A.png');
	$('#imageTieReview').attr("src", WEB_URL + '/assets/images/stepper/product-seven-a/shapes/product-7-A.png');
	$('#imageConfirmReview').attr("src", WEB_URL + '/assets/images/stepper/product-seven-a/shapes/product-7-A.png');
	$('#imageShowingDimension').attr("src", WEB_URL + '/assets/images/stepper/product-seven-a/rectangle.png');

	var data = {
		'product-7':
		{
			'dimension': { 'thickness': 2, 'length': 8, 'width': 10 },
			'cover': { 'trimming': 'No', 'fabric': 'Test Name 1' },
			'fill': { 'type': 'Polyurethane Foam' },
			'ties': { 'type': 'None' },
			'productName': 'Custom Daybed Cushion'
		}
	}
	localStorage.setItem('productDetail', JSON.stringify(data));

	setValueTolengthInDimension();
	setValueToWidthInDimension();

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
		fetchedData['product-7'].cover.fabric = $('.modal-fabric').text();
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
		$('#fabricDetailsModal').modal('hide');
		$('#fabricModal').modal('hide');
	});

	$('.trimming-detail-button').click(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		fetchedData['product-7'].cover.trimming = $('.modal-trimming-title').text();
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
		$('#trimmingDetailsModal').modal('hide');
		$('#trimmingModal').modal('hide');
	});

	$('#thickness').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var thick = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-7'].dimension.thickness = thick;
		var ptag = document.getElementById('thickness-label');
		ptag.innerHTML = thick + '"' + ' THICK';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#length').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var length = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-7'].dimension.length = length;
		var ptag = document.getElementById('height-label');
		ptag.innerHTML = length + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#width').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		var width = parseFloat(($(this).val()).split(" ")[0]);
		fetchedData['product-7'].dimension.width = width;
		var ptag = document.getElementById('width-label');
		ptag.innerHTML = width + '"';
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});

	$('#trimmingoption').change(function () {
		var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
		if ($(this).val() === 'NO TRIMMING') {
			$('.trimming-select-button').attr('disabled', true);
			fetchedData['product-7'].cover.trimming = 'No';
			$('#trimming-fabric-img').hide();
			$('#trimming-fabric-alt').show();

		} else {
			$('.trimming-select-button').attr('disabled', false);
			fetchedData['product-7'].cover.trimming = 'Test Name 1';
			$('#trimming-fabric-img').show();
			$('#trimming-fabric-alt').hide();
		}
		localStorage.setItem('productDetail', JSON.stringify(fetchedData));
		setDataToReview();
	});
});

var setFill = (c) => {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	switch (c) {
		case 2:
			fetchedData['product-7'].fill.type = 'Polyurethane Foam';
			break;
		case 3:
			fetchedData['product-7'].fill.type = 'Reticulated Dry Fast Foam';
			break;
	}
	localStorage.setItem('productDetail', JSON.stringify(fetchedData));
	setDataToReview();
};

var setTies = (c) => {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	switch (c) {
		case 1:
			fetchedData['product-7'].ties.type = 'None';
			break;
		case 2:
			fetchedData['product-7'].ties.type = '2 ties at sides';
			break;
		case 3:
			fetchedData['product-7'].ties.type = '4 ties at sides';
			break;
		case 4:
			fetchedData['product-7'].ties.type = '4 ties at front and back';
			break;
		case 5:
			fetchedData['product-7'].ties.type = '4 ties at all corners';
			break;
		case 6:
			fetchedData['product-7'].ties.type = '6 ties at sides and corners';
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


function setValueTolengthInDimension() {
	for (var i = 8; i <= 120; i += 1) {
		$('#length').append(`<option>${i} LENGTH</option>`);
	}
}

function setValueToWidthInDimension() {
	for (var i = 10; i <= 54; i += 1) {
		$('#width').append(`<option>${i} WIDTH</option>`);
	}
}

function setDataToReview() {
	var fetchedData = JSON.parse(localStorage.getItem('productDetail'));
	var product = document.getElementById('productreview');
	var dimensions = document.getElementById('dimensionsreview');
	var cover = document.getElementById('coverreview');
	var trimming = document.getElementById('trimmingreview');
	var fill = document.getElementById('fillreview');
	var ties = document.getElementById('tiesreview');

	fill.innerHTML = fetchedData['product-7'].fill.type;
	ties.innerHTML = fetchedData['product-7'].ties.type;
	cover.innerHTML = fetchedData['product-7'].cover.fabric;
	trimming.innerHTML = fetchedData['product-7'].cover.trimming;
	dimensions.innerHTML = fetchedData['product-7'].dimension.width + 'W' + ' x ' + fetchedData['product-7'].dimension.length + 'L' + ' x ' + fetchedData['product-7'].dimension.thickness + 'T';
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