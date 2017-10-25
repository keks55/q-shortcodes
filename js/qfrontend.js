jQuery(document).ready(function($) {
	// service li background
	$('.q_service ul').each(function () {
		var count = $(this).find('li').length;
		if (count % 2 === 0) { 
			// even
			$(this).next().css('background', '#FAF1D5');
		}
		else { 
			// odd
			$(this).next().css('background', '#fff');
		}
	})

	$('#tab1,.tab-links li:first-child').addClass('active');
	$('.tab').appendTo('.tab-content');

	// tab switch
	$('.tab-links a').click(function(e){
		e.preventDefault();
		var tabval = $(this).attr('href');
		$('.tab-content ' + tabval).show().siblings().hide();
		$(this).parent().addClass('active').siblings().removeClass('active');
	});
	
	// toggle switch
	$('.toggle_title').click(function(e){
		e.preventDefault();
		if($(this).children().hasClass('ion-plus')){
			$(this).children().removeClass('ion-plus').addClass('ion-minus');
		}
		else{
			$(this).children().removeClass('ion-minus').addClass('ion-plus');
		}
		$(this).next().toggleClass('active');

	});

	$(".q,.q1,.q2,.q3,.q4,.q5,.q6,.q7,.q8,.q9,.q10,.q11,.q12,.qtoggle,.q_divider").next('br').remove();


	
});