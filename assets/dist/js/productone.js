$(document).ready(function() {
	$('.previousbtn').click(function(){
		$('.previousbtn').attr('disabled', true);
		$('.nav-pills > .active').prev('li').find('a').trigger('click');
		setTimeout(function() {
			$('.previousbtn').attr('disabled', false);
		}, 500);
	});

	$('.nextbtn').click(function(){
		$('.nextbtn').attr('disabled', true);
		$('.nav-pills > .active').next('li').find('a').trigger('click');
		setTimeout(function() {
			$('.nextbtn').attr('disabled', false);
		}, 500);
	});
});
