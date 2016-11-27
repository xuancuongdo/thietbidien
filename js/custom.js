jQuery(document).ready(function() {

        jQuery('nav.primary-menu ul.sf-menu').superfish();

		jQuery('.marquee').marquee({
			// gap: 50,
			duration: 15000,
			direction: 'up',
			pauseOnHover: true,
			duplicated: true,
			delayBeforeStart: 0,
		});

		jQuery(window).scroll(function() {
		if(jQuery(this).scrollTop() != 0) {
			jQuery('#toTop').fadeIn();	
		} else {
			jQuery('#toTop').fadeOut();
		}
	});
 
	jQuery('#toTop').click(function() {
		jQuery('body,html').animate({scrollTop:0},800);
	});	
});