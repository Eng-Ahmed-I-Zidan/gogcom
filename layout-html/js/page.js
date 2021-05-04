$(function(){
	// Start With Lang select box
		$('.glx-langs').on({
			mouseenter: function(){ $(this).find('ul').addClass("is-active"); },
			mouseleave: function(){ $(this).find('ul').removeClass("is-active"); }
		});
	// End With Lang select box
	// Start Move Text
		function slideShowText(){
			if($('.glx-section--quotes .glx-text-rotator__item:last-of-type').hasClass('is-active')){
				$('.glx-section--quotes').find('.glx-text-rotator__item:first-of-type').addClass('is-active');
				$('.glx-section--quotes').find('.glx-text-rotator__item:last-of-type').removeClass('is-active');
			} else{
				$('.glx-section--quotes').find('.is-active').removeClass('is-active').next('.glx-text-rotator__item').addClass('is-active');
			}
		}
		setInterval(slideShowText,4000);
	// End Move Text
	// Start With glx-section-faq
		$('.bg-download-faq .glx-section--faq .glx-faq-list .glx-list .glx-faq-list__item h3').click(function(){
			$(this).parent('.glx-faq-list__item').toggleClass('is-collapsed').toggleClass('is-expanded')
																					 .siblings('.glx-faq-list__item').addClass('is-collapsed').removeClass('is-expanded');
      $(this).parent('.glx-faq-list__item').parent('.glx-list').siblings('.glx-list').find('.glx-faq-list__item').addClass('is-collapsed').removeClass('is-expanded');
		});
	// End With glx-section-faq
	// Start With glx-overlay is-hidden
		$('.glx-section .glx-section__play .glx-button-play').click(function(){
			$('.glx-overlay').removeClass('is-hidden').addClass('is-visible');
			$('.glx-overlay iframe').attr('src', '//www.youtube.com/embed/r2Lq3I8JECY?rel=0&enablejsapi=1&autoplay=1');
		});
		$('.glx-overlay .glx-overlay__glass').click(function(){
			$(this).parent('.glx-overlay').removeClass('is-visible').addClass('is-hidden');
			$('.glx-overlay iframe').attr('src', '//www.youtube.com/embed/r2Lq3I8JECY?rel=0&enablejsapi=1');
			$('.glx-overlay iframe').each(function(index) {
         $(this).attr('src', $(this).attr('src'));
         return false;
       });
		});
	// End With glx-overlay is-hidden
	// start with cookies
	$('.c-cookies .c-cookies__frame .c-cookies__close').click(function(){
		$(this).parents('.c-cookies').addClass('ng-hide');
	});
});
