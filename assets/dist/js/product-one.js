$(document).ready(function() {
	$('.previousbtn').click(function(){
		$('.nav-pills > .active').prev('li').find('a').trigger('click');
	});

	$('.nextbtn').click(function(){
		$('.nav-pills > .active').next('li').find('a').trigger('click');
	});
});
