$(function(){
	// verified owner rating
	if($('.click-hide-search.content.cf').attr('gamesoon') == "false"){
		verifiedOwnerrating($('.click-hide-search.content.cf').attr('esn7a841'));
	}
	// Start scroll top image on scroll
	function showSection(){
		if($(window).scrollTop() >= (($(".game-spots").offset().top) - 700)){
			// .product-tile_for---all--place--games
			$(this).delay(1500).queue(function(){
				$('.reviews .reviews-content .dots-wrapper, .game-spots .dots-wrapper').addClass('ng-hide');
				$('.reviews .reviews-content .reviews-content-ng-scope, .game-spots .small-spots__container_content').removeClass('ng-hide');
				$(this).dequeue();
			});
		}
	}
	showSection();
	$(window).scroll(function(){
		$('.hide-when-content-is-expanded').css('background-position-y', - $('body, html').scrollTop() / 4);
		showSection();
	});
	// End scroll top image on scroll
	// Start Show [gog-gallery] on click [productcard-player__play-button]
		$('.productcard-player__play-button').click(function(){
			$('.gog-gallery').addClass('gog-gallery--is-open');
			$('.gog-gallery__display-wrapper .carousel-inner .carousel-item:first-of-type').addClass('active').siblings('.carousel-item').removeClass('active');
			$('.gog-gallery__slider-wrapper .carousel-inner .carousel-item:first-of-type').addClass('active').siblings('.carousel-item').removeClass('active');
			$('.gog-gallery__slider-wrapper .carousel-inner .carousel-item .js-items-wrapper .gog-gallery__thumbnails-item').removeClass('gog-gallery__thumbnails-item--is-active');
			$('.gog-gallery__slider-wrapper .carousel-inner .carousel-item:first-of-type .js-items-wrapper .gog-gallery__thumbnails-item:first-of-type').addClass('gog-gallery__thumbnails-item--is-active');
			// for iframe autoplay
			$('.gog-gallery__display-wrapper .carousel-inner .carousel-item:first-of-type iframe').attr('src', $('.gog-gallery__display-wrapper .carousel-inner .carousel-item:first-of-type iframe').attr('src') + '&enablejsapi=1&autoplay=1');
		});
	// End Show [gog-gallery] on click [productcard-player__play-button]
	// Start hidden [gog-gallery] on click [gog-gallery__shadow]
		$('.gog-gallery .gog-gallery__shadow, .gog-gallery .gog-gallery-close').click(function(){
			$('.gog-gallery').removeClass('gog-gallery--is-open');
			$('.gog-gallery__display-wrapper .carousel-item:first-of-type').addClass('active').siblings('.carousel-item').removeClass('active');
			$('.gog-gallery__slider-wrapper .carousel-item:first-of-type').addClass('active').siblings('.carousel-item').removeClass('active');
			$('.gog-gallery__slider-wrapper .carousel-indicators button:first-of-type').addClass('active').siblings('button').removeClass('active');

			// stop video
			var ii = 1;
			for(ii = 1; ii <= $('.gog-gallery__display-wrapper .carousel-inner .carousel-item').length; ii++){
				$('.gog-gallery__display-wrapper .carousel-inner .carousel-item:nth-of-type('+ ii +') iframe').attr('src', $('.gog-gallery__display-wrapper .carousel-inner .carousel-item:nth-of-type('+ ii +') iframe').attr('ng-src'));
			}
		});
	// End hidden [gog-gallery] on click [gog-gallery__shadow]
	// Start With Hidden carousel icon on click move border to next Element [carousel-control-next]
		$('.gog-gallery__display-wrapper .carousel-control-next').click(function(){
			// stop video
			$('.gog-gallery__display-wrapper .carousel-inner .carousel-item.active').prev('.carousel-item').find('iframe').attr('src', $('.gog-gallery__display-wrapper .carousel-inner .carousel-item.active').prev('.carousel-item').find('iframe').attr('ng-src'));

			if($('.gog-gallery__slider-wrapper .carousel-inner .carousel-item .gog-gallery__thumbnails-item.gog-gallery__thumbnails-item--is-active').parents('.carousel-item').hasClass('active')){ }
			else {
				$('.gog-gallery__slider-wrapper .carousel-inner .carousel-item .gog-gallery__thumbnails-item.gog-gallery__thumbnails-item--is-active').parents('.carousel-item').addClass('active').siblings('.carousel-item').removeClass('active');
				$('.gog-gallery__slider-wrapper .carousel-indicators button[data-bs-slide-to='+ $('.gog-gallery__slider-wrapper .carousel-inner .carousel-item.active').attr("data-slide") +']').addClass('active').siblings('button').removeClass('active');
			}

			if($('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item.active .js-items-wrapper .gog-gallery__thumbnails-item:last-of-type').hasClass('gog-gallery__thumbnails-item--is-active')){
				if($('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item.active:last-of-type .js-items-wrapper .gog-gallery__thumbnails-item:last-of-type').hasClass('gog-gallery__thumbnails-item--is-active')){
					$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item:last-of-type .js-items-wrapper .gog-gallery__thumbnails-item:last-of-type').removeClass('gog-gallery__thumbnails-item--is-active').parents('.carousel-item').siblings('.carousel-item:first-of-type').find('.gog-gallery__thumbnails-item:first-of-type').addClass('gog-gallery__thumbnails-item--is-active');
				} else {
					$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item.active .js-items-wrapper .gog-gallery__thumbnails-item:last-of-type').removeClass('gog-gallery__thumbnails-item--is-active').parents('.carousel-item').next('.carousel-item').find('.gog-gallery__thumbnails-item:first-of-type').addClass('gog-gallery__thumbnails-item--is-active');
				}
				$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-control-next').each(function(){ $(this).click(); });
			} else {
				$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item .js-items-wrapper .gog-gallery__thumbnails-item.gog-gallery__thumbnails-item--is-active').removeClass('gog-gallery__thumbnails-item--is-active').next('.gog-gallery__thumbnails-item').addClass('gog-gallery__thumbnails-item--is-active');
			}
		});
	// End With Hidden carousel icon on click move border to next Element [carousel-control-next]
	// Start With Hidden carousel icon on click move border to next Element [carousel-control-prev]
		$('.gog-gallery__display-wrapper .carousel-control-prev').click(function(){
			// stop video
			$('.gog-gallery__display-wrapper .carousel-inner .carousel-item.active').next('.carousel-item').find('iframe').attr('src', $('.gog-gallery__display-wrapper .carousel-inner .carousel-item.active').next('.carousel-item').find('iframe').attr('ng-src'));

			if($('.gog-gallery__slider-wrapper .carousel-inner .carousel-item .gog-gallery__thumbnails-item.gog-gallery__thumbnails-item--is-active').parents('.carousel-item').hasClass('active')){ }
			else {
				$('.gog-gallery__slider-wrapper .carousel-inner .carousel-item .gog-gallery__thumbnails-item.gog-gallery__thumbnails-item--is-active').parents('.carousel-item').addClass('active').siblings('.carousel-item').removeClass('active');
				$('.gog-gallery__slider-wrapper .carousel-indicators button[data-bs-slide-to='+ $('.gog-gallery__slider-wrapper .carousel-inner .carousel-item.active').attr("data-slide") +']').addClass('active').siblings('button').removeClass('active');
			}

			if($('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item.active .js-items-wrapper .gog-gallery__thumbnails-item:first-of-type').hasClass('gog-gallery__thumbnails-item--is-active')){
				if($('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item.active:first-of-type .js-items-wrapper .gog-gallery__thumbnails-item:first-of-type').hasClass('gog-gallery__thumbnails-item--is-active')){
					$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item:first-of-type .js-items-wrapper .gog-gallery__thumbnails-item:first-of-type').removeClass('gog-gallery__thumbnails-item--is-active').parents('.carousel-item').siblings('.carousel-item:last-of-type').find('.gog-gallery__thumbnails-item:last-of-type').addClass('gog-gallery__thumbnails-item--is-active');
				} else {
					$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item.active .js-items-wrapper .gog-gallery__thumbnails-item:first-of-type').removeClass('gog-gallery__thumbnails-item--is-active').parents('.carousel-item').prev('.carousel-item').find('.gog-gallery__thumbnails-item:last-of-type').addClass('gog-gallery__thumbnails-item--is-active');
				}
				$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-control-prev').each(function(){ $(this).click(); });
			} else {
				$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item .js-items-wrapper .gog-gallery__thumbnails-item.gog-gallery__thumbnails-item--is-active').removeClass('gog-gallery__thumbnails-item--is-active').prev('.gog-gallery__thumbnails-item').addClass('gog-gallery__thumbnails-item--is-active');
			}
		});
	// End With Hidden carousel icon on click move border to next Element [carousel-control-prev]
	// Start With Click on small-image in [carousel-hidden][gog-galaxy] to show it large
		$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item .gog-gallery__thumbnails-item').click(function(){
			if($(this).hasClass('gog-gallery__thumbnails-item--is-active')){}
			else{
				$('.gog-gallery__display-wrapper .carousel-inner .carousel-item[gog-gallery='+ $(this).attr('gog-gallery') +']').addClass('active').siblings('.carousel-item').removeClass('active');
				$('.gog-gallery__slider-wrapper .carousel-inner .carousel-item .js-items-wrapper .gog-gallery__thumbnails-item').removeClass('gog-gallery__thumbnails-item--is-active');
				$(this).addClass('gog-gallery__thumbnails-item--is-active');

				// stop video
				var tt = 1;
				for(tt = 1; tt <= $('.gog-gallery__display-wrapper .carousel-inner .carousel-item').length; tt++){
					if(parseInt($('.gog-gallery__display-wrapper .carousel-inner .carousel-item[gog-gallery='+ $(this).attr('gog-gallery') +']').attr('this-index')) == tt){}
					else { $('.gog-gallery__display-wrapper .carousel-inner .carousel-item:nth-of-type('+ tt +') iframe').attr('src', $('.gog-gallery__display-wrapper .carousel-inner .carousel-item:nth-of-type('+ tt +') iframe').attr('ng-src')); }
				}
			}
		});
	// End With Click on small-image in [carousel-hidden][gog-galaxy] to show it large
	// Start With click on large image out [gog-gallery__slider-wrapper-out]
		$('.gog-gallery__slider-wrapper-out .carousel-inner .carousel-item .js-items-wrapper .gog-gallery__thumbnails-item').click(function(){
			$('.gog-gallery').addClass('gog-gallery--is-open');
			$('.gog-gallery .gog-gallery__layer .gog-gallery__display-wrapper .carousel-inner .carousel-item[gog-gallery='+ $(this).attr('gog-gallery') +']').addClass('active').siblings('.carousel-item').removeClass('active');
			$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item .js-items-wrapper .gog-gallery__thumbnails-item').removeClass('gog-gallery__thumbnails-item--is-active');
			$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item .gog-gallery__thumbnails-item[gog-gallery='+ $(this).attr('gog-gallery') +']').addClass('gog-gallery__thumbnails-item--is-active');
			$('.gog-gallery .gog-gallery__layer .gog-gallery__slider-wrapper .carousel-inner .carousel-item .gog-gallery__thumbnails-item[gog-gallery='+ $(this).attr('gog-gallery') +']').parent().parent('.carousel-item').addClass('active').siblings('.carousel-item').removeClass('active');
		});
	// End With click on large image out [gog-gallery__slider-wrapper-out]
	// add to cart
  function addToCartMoreTimes(){
    $('.content.cf .product-state__price-btn:not(.product-state__browse_deal)').on("click", function(e){
      e.preventDefault();
      if($(this).hasClass('tba_owned_prevent_action_add_to_cart') || $(this).hasClass('game_added_to_cart_successfuly') || $(this).attr('gc_g_incart') == "1"){}
      else{
        // add game to cart from [store, search]
        fun_select_game_by_id_add_to_cart($(this).attr('ng-game-movies-id'));

        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +']').addClass('game_added_to_cart_successfuly');

        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +'] .product-state__checkout-now').removeClass('ng-hide');
        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +'] .product-state__is_choose:not(.product-state__checkout-now)').addClass('ng-hide');

        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +']').parents('.button-parent--class--to-find--labels').find('.product-tile__labels .product-tile__label--in-cart').removeClass('ng-hide').siblings('.product-tile__label').addClass('ng-hide');

				// checkout game
				$(this).find('span.CheckOutNow').removeClass('ng-hide').siblings('span.addToCART').addClass('ng-hide');

        if($(this).attr('gc_g_incart') == "1"){
        } else {
          // select number of game in cart
          $(this).delay(100).queue(function(){
            fun_select_number_of_games_in_cart();
            $(this).dequeue();
          });
          $(this).attr('gc_g_incart', "1");
          $('.menu-tray .menu-item .menu-link .menu-item__count--cart').addClass('notify_cart_increased animation_cart_increased');
          $(this).delay(600).queue(function(){
            $('.menu-tray .menu-item .menu-link .menu-item__count--cart').removeClass('animation_cart_increased');
            $(this).dequeue();
          });
        }
      }
    });
  }
  addToCartMoreTimes();
	// end with cart
	// Start Add to wislist
	$('.layout-container .product-actions .wishlist-button .wishlist-heart').click(function(){
		if($('.click-hide-search.content.cf').attr('haveanaccount') == "true"){
			if($(this).hasClass('empty-heart')){
				// add to wishlist
				fun_add_game_to_wishlist($(this).parents('.wishlist-button').siblings('.product-state__price-btn').attr('ng-game-movies-id'));
				// hide this and show full heart
				$(this).addClass('ng-hide').siblings('.full-heart').removeClass('ng-hide');
			} else {
				// remove from wishlist
				fun_add_game_to_wishlist($(this).parents('.wishlist-button').siblings('.product-state__price-btn').attr('ng-game-movies-id'));
				// hide this and show full heart
				$(this).addClass('ng-hide').siblings('.empty-heart').removeClass('ng-hide');
			}

			// remove form cart if in it
			if($(this).parents('.wishlist-button').siblings('.product-state__price-btn').attr('gc_g_incart') == "1"){
				$(this).delay(200).queue(function(){
					fun_select_game_by_id_remove_from_cart($(this).parents('.wishlist-button').siblings('.product-state__price-btn').attr('ng-game-movies-id'));
					$(this).dequeue();
				});
				// select number of game in cart
				$(this).delay(400).queue(function(){
					fun_select_game_by_id_add_to_cart($(this).parents('.wishlist-button').siblings('.product-state__price-btn').attr('ng-game-movies-id'));
					$(this).dequeue();
				});
			}
		} else {
			$('.--gog__com__navbar .menu-anonymous-header .menu-btn.menu-anonymous-header__btn--create-account').each(function(){
				$(this).click();
			});
		}
	});
	// start with system requirement
	$('.layout-main .layout-main-col .content-summary-section .content-summary-offset .title--no-margin .title__additional-options .product-tile__info-operating-system .svg-border-bottom').on('click', function(){
		if($(this).hasClass('before-svg-border-bottom')){}
		else{
			$(this).addClass('before-svg-border-bottom').siblings('span').removeClass('before-svg-border-bottom');
			systemRequirementOperetion($(this).attr('ng-system'), $(this).attr('ng-game-id'));
		}
	});
	// End with system requirement
	// .product-tile_for---all--place--games
	$('.product-tile_for---all--place--games').on({
		mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
		mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
	});
	// .product-tile_for---all--place--games
	// Start With hover on star rating
		$('.reviews .average-body__stars-rating:not(.no_event_here):not(.alreadyCommented) .rating-stars__star').click(function(){
			if($('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--small .review-new__add-button').attr('haveaccount') == "true"){
				$(this).parent('.average-body__stars-rating').attr('lastrating', $(this).attr('rate'));
				if($(this).parents('.average-body__col').hasClass('average-body__col--small')){
					$('.reviews__main .review__col.review__col--body .rating-stars__star[rate='+ $(this).attr('rate') +']').each(function(){
						$(this).click();
					});
				}
				$(this).parent('.average-body__stars-rating').addClass('rating-is-done');
				$(this).addClass('end-of-rating').siblings('.rating-stars__star').removeClass('end-of-rating');
				$(this).find('.svg-star--empty').addClass('ng-hide').siblings('.ic-svg').removeClass('ng-hide');
				$(this).prevUntil('.average-body__stars-rating').find('.svg-star--empty').addClass('ng-hide').siblings('.ic-svg').removeClass('ng-hide');
				$(this).nextUntil('.average-body__stars-rating').find('.svg-star--empty').removeClass('ng-hide').siblings('.ic-svg').addClass('ng-hide');
				$('input.hidden-rating').attr('value', $('.reviews .average-body__stars-rating .rating-stars__star.end-of-rating').attr('rate'));
			} else {
				$('.--gog__com__navbar .menu-anonymous-header .menu-btn.menu-anonymous-header__btn--create-account').each(function() {
				 $(this).click();
			 });
			}
		});
		$('.reviews .average-body__stars-rating:not(.alreadyCommented):not(.no_event_here) .rating-stars__star').on({
			mouseenter: function(){
				$(this).find('.svg-star--empty').addClass('ng-hide').siblings('.ic-svg').removeClass('ng-hide');
				$(this).prevUntil('.average-body__stars-rating').find('.svg-star--empty').addClass('ng-hide').siblings('.ic-svg').removeClass('ng-hide');
				$(this).nextUntil('.average-body__stars-rating').find('.svg-star--empty').removeClass('ng-hide').siblings('.ic-svg').addClass('ng-hide');
			},
			mouseleave: function(){
				$(this).find('.svg-star--empty').removeClass('ng-hide').siblings('.ic-svg').addClass('ng-hide');
				$(this).prevUntil('.average-body__stars-rating').find('.svg-star--empty').removeClass('ng-hide').siblings('.ic-svg').addClass('ng-hide');
				$(this).nextUntil('.average-body__stars-rating').find('.svg-star--empty').removeClass('ng-hide').siblings('.ic-svg').addClass('ng-hide');
		 }
		});
		$('.reviews .average-body__stars-rating:not(".reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item--saved .rating-stars__star")').mouseleave(function(){
			$(this).find('.end-of-rating .svg-star--empty').addClass('ng-hide').siblings('.ic-svg').removeClass('ng-hide');
			$(this).find('.end-of-rating').prevUntil('.average-body__stars-rating').find('.svg-star--empty').addClass('ng-hide').siblings('.ic-svg').removeClass('ng-hide');
			$(this).find('.end-of-rating').nextUntil('.average-body__stars-rating').find('.svg-star--empty').removeClass('ng-hide').siblings('.ic-svg').addClass('ng-hide');
		});
	// End With hover on star rating
	// Start With Number Of text in input
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .type-text').keyup(function(){
				$(this).siblings('.review-new__charsleft').text($(this).attr('maxlength') - $(this).val().length);
		});
	// Start With open dropdown on reviews-filters-sorting
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting .reviews-sorting .dropdown .dropdown__trigger').on({
			click: function(){
								$(this).siblings('.dropdown__layer').toggleClass('dropdown__layer-is-open');
							}
		});
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting .reviews-sorting .dropdown').mouseleave(function(){ $(this).find('.dropdown__layer').removeClass('dropdown__layer-is-open'); });
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting .reviews-sorting .dropdown .dropdown__layer').mouseleave(function(){ $(this).removeClass('dropdown__layer-is-open'); });
	// End With open dropdown on reviews-filters-sorting
	// Start With click on label to choose any One
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting .reviews-sorting .dropdown .dropdown__layer .sort-dropdown__content .sort-dropdown__item').click(function(){
			if($(this).hasClass('sort-dropdown__item_selected')){
			} else {
				$(this).parents('.dropdown__layer').removeClass('dropdown__layer-is-open');
				$(this).addClass('sort-dropdown__item_selected').siblings('.sort-dropdown__item').removeClass('sort-dropdown__item_selected');
				$(this).find('.sort-dropdown__icon-full').removeClass('ng-hide').siblings('.sort-dropdown__icon-empty').addClass('ng-hide');
				$(this).siblings('.sort-dropdown__item').find('.sort-dropdown__icon-full').addClass('ng-hide').siblings('.sort-dropdown__icon-empty').removeClass('ng-hide');
				$(".reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting .reviews-sorting .dropdown .dropdown__trigger .sort-by__selected[ng-show="+ $(this).find('.sort-two-col').attr('ng-show') +"]").removeClass('ng-hide').siblings('.sort-by__selected').addClass('ng-hide');

				// filter all games
				filter_all_games(
					$('.click-hide-search.content.cf').attr('esn7a841'),
					$(this).attr('loadingDone'),
					$('.sortByNumberOfCommentInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
					$('.sortByMostPhyInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.language--filter__item--checkbox').attr('customlanguage'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.featrues--filter__item--checkbox').attr('customfeatrues'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.filter__item--radio').attr('customlastadded')
				);
				// for loading
        $(this).attr('loadingDone', 'Done');
				// refresh
				// .product-tile_for---all--place--games
				$(this).delay(1000).queue(function(){
					readMoreComments();
					helpFulOrNotComment();
					pageIndicatorAndArrowClick();
					// stop animation loading
					$('.catalog-spinner').addClass('ng-hide');
					$(this).dequeue();
				});
			}
		});
	// ENd With click on label to choose any One
	// filter header[on-off]
	function reloadHeightOfGamesContent(){
		$('#for_catalog__paginator_wrapper').css('min-height', $('.container--two-columns__child--curated-collection').height());
	}
	reloadHeightOfGamesContent();
	$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item .filter__header .filter__toggle').click(function(){
		$(this).parents('.curated-collection-section').toggleClass('filters_options_off');
		reloadHeightOfGamesContent();
	});
	// choose from filters
	//radio
	var customValueOfRadioCollection = [];
	var customValueRadioOfFilterOff = [];
	var knowIfFirstRadioChecked = 0;
	var indextosplice = "";
	var indextosplicefilteroff = "";
	$('.content.cf .reviews__aside-col .container--two-columns__child--curated-collection .filter__item.filter__item--radio .filter__item-options .option__item').click(function(){
		if(($(this).hasClass('option__item---active') && !$(this).hasClass('option__item_Start_checkbox')) || $(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){
		} else {
			$(this).parents('.content.cf').addClass('PleaseWait1SecondForLoading');
			if($(this).hasClass('option__item_Start_checkbox')){
				$(this).toggleClass('option__item---active').find('svg.sort-dropdown__icon-full').toggleClass('ng-hide').end().find('svg.sort-dropdown__icon-empty').toggleClass('ng-hide');
			} else {
				$(this).addClass('option__item---active').find('svg.sort-dropdown__icon-full').removeClass('ng-hide').end().find('svg.sort-dropdown__icon-empty').addClass('ng-hide');
				$(this).siblings('.option__item:not(.option__item_Start_checkbox)').removeClass('option__item---active').find('svg.sort-dropdown__icon-full').addClass('ng-hide').end().find('svg.sort-dropdown__icon-empty').removeClass('ng-hide');
			}

			// for empty array when click [remove all filter]
			if($(this).hasClass('option__item---active') && !$(this).siblings('span').hasClass('option__item---active')){
				while(customValueOfRadioCollection.length > 0 || customValueRadioOfFilterOff.length > 0) {
					customValueOfRadioCollection.pop();
					customValueRadioOfFilterOff.pop();
				}
				knowIfFirstRadioChecked = 0;
				indextosplice = "";
				indextosplicefilteroff = "";
			}

			// add to array
			if($(this).hasClass('option__item---active')){
				// customValueOfRadioCollection
				customValueOfRadioCollection.push($(this).attr('lastadded'));
				// customValueRadioOfFilterOff
				customValueRadioOfFilterOff.push($(this).attr('itemTextFilterOff') + " ");
				if(!$(this).hasClass('option__item_Start_checkbox')){
					if(knowIfFirstRadioChecked > 0){
						// customValueOfRadioCollection
						var indexOfItemRadio = customValueOfRadioCollection.indexOf(indextosplice);
						customValueOfRadioCollection.splice(indexOfItemRadio, 1);
						// customValueRadioOfFilterOff
						var indexOfItemFilterRadio = customValueRadioOfFilterOff.indexOf(indextosplicefilteroff);
						customValueRadioOfFilterOff.splice(indexOfItemFilterRadio, 1);
					}
					knowIfFirstRadioChecked += 1;
					indextosplice = $(this).attr('lastadded');
					indextosplicefilteroff = $(this).attr('itemTextFilterOff') + " ";
				}
			} else {
				// customValueOfRadioCollection
				var indexOfItemRadio = customValueOfRadioCollection.indexOf($(this).attr('lastadded'));
				customValueOfRadioCollection.splice(indexOfItemRadio, 1);
				// customValueRadioOfFilterOff
				var indexOfItemFilterRadio = customValueRadioOfFilterOff.indexOf($(this).attr('itemTextFilterOff') + " ");
				customValueRadioOfFilterOff.splice(indexOfItemFilterRadio, 1);
			}

			if(customValueOfRadioCollection.length > 0){
				$(this).parents('.curated-collection-section').find('.filter__clear-wrapper').removeClass('ng-hide');
				$(this).parents('.curated-collection-section').find('.filter__header .filter__toggle').addClass('lessOneOptionItemChecked');
			} else {
				$(this).parents('.curated-collection-section').find('.filter__clear-wrapper').addClass('ng-hide');
				$(this).parents('.curated-collection-section').find('.filter__header .filter__toggle').removeClass('lessOneOptionItemChecked');
			}

			// function
			$(this).parents('.filter__item.filter__item--radio').attr('CustomLastAdded', customValueOfRadioCollection);
			$(this).parent('.filter__item-options').siblings('.ShowWhenFilterOff').text(customValueRadioOfFilterOff);

			// filter all games
			filter_all_games(
				$('.click-hide-search.content.cf').attr('esn7a841'),
				$(this).attr('loadingDone'),
				$('.sortByNumberOfCommentInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
				$('.sortByMostPhyInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
				$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.language--filter__item--checkbox').attr('customlanguage'),
				$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.featrues--filter__item--checkbox').attr('customfeatrues'),
				$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.filter__item--radio').attr('customlastadded')
			);
			// for loading
			$(this).attr('loadingDone', 'Done');
			// refresh
			// .product-tile_for---all--place--games
			$(this).delay(1000).queue(function(){
				readMoreComments();
				helpFulOrNotComment();
				pageIndicatorAndArrowClick();
				reloadHeightOfGamesContent();
				$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .average-item[option='+ $('.returnResalutForratingText').attr('option') +']').removeClass('ng-hide').siblings('.average-item').addClass('ng-hide');
				if($('.returnResalutForratingText').attr('option') == "2"){
					$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .average-item[option='+ $('.returnResalutForratingText').attr('option') +'] .average-item__value').text($('.returnResalutForratingText').text());
				}
				if($('.returnResalutForratingText').attr('option') == "1" || $('.returnResalutForratingText').attr('option') == "4"){
					$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting').addClass('ng-hide');
				} else {
					$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting').removeClass('ng-hide');
				}
				// stop animation loading
				$('.catalog-spinner').addClass('ng-hide');
				$(this).dequeue();
			});
			$(this).delay(400).queue(function(){
				$(this).parents('.content.cf').removeClass('PleaseWait1SecondForLoading');
				$(this).dequeue();
			});
		}
	});
	// checkbox
  $('.content.cf .reviews__aside-col .container--two-columns__child--curated-collection .filter__item.filter__item--checkbox .filter__item-options .option__item').click(function(){
    if($(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){
    } else {
      $(this).toggleClass('option__item---active').find('svg').toggleClass('ng-hide');
      $(this).parents('.curated-collection-section').find('.filter__clear-wrapper').removeClass('ng-hide');
      $(this).parents('.curated-collection-section').find('.filter__header .filter__toggle').addClass('lessOneOptionItemChecked');

      // no [option__item---active] clear [filter__clear-wrapper]
      if(!$(this).hasClass('option__item---active') && !$(this).siblings('.option__item').hasClass('option__item---active')){
        $(this).parents('.curated-collection-section').find('.filter__clear-wrapper').addClass('ng-hide');
        $(this).parents('.curated-collection-section').find('.filter__header .filter__toggle').removeClass('lessOneOptionItemChecked');
      }
    }
  });

  // checkbox request
  function forAllFiltersExceptPrice(classNameOfParent, attrValueItemsSon, attrValueParent, staticFeaturesPN, staticFeaturesVP, staticLanguagePN, staticLanguageVP){
    var customValueOfSystemCollection = [];
    var customValueOfFilterOff = [];
    $('.content.cf .reviews__aside-col .container--two-columns__child--curated-collection .filter__item'+ classNameOfParent +' .filter__item-options .option__item').click(function(){
      if($(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){
      } else {

        // for empty array when click [remove all filter]
        if($(this).hasClass('option__item---active') && !$(this).siblings('span').hasClass('option__item---active')){
          while(customValueOfSystemCollection.length > 0 || customValueOfFilterOff.length > 0) {
            customValueOfSystemCollection.pop();
            customValueOfFilterOff.pop();
          }
        }
        // condition
        if(!$(this).hasClass('option__item---active')){
          // customValueOfSystemCollection
          var indexOfItem = customValueOfSystemCollection.indexOf($(this).attr(attrValueItemsSon));
          customValueOfSystemCollection.splice(indexOfItem, 1);

          // customValueOfFilterOff
          var indexOfItemFilter = customValueOfFilterOff.indexOf($(this).attr('itemTextFilterOff') + " ");
          customValueOfFilterOff.splice(indexOfItemFilter, 1);
        } else {
          // customValueOfSystemCollection
          customValueOfSystemCollection.push($(this).attr(attrValueItemsSon));

          // customValueOfFilterOff
          customValueOfFilterOff.push($(this).attr('itemTextFilterOff') + " ");
        }
        $(this).parent('.filter__item-options').siblings('.ShowWhenFilterOff').text(customValueOfFilterOff);
        $(this).parents(classNameOfParent).attr(attrValueParent, customValueOfSystemCollection);

				// filter all games
				filter_all_games(
					$('.click-hide-search.content.cf').attr('esn7a841'),
					$(this).attr('loadingDone'),
					$('.sortByNumberOfCommentInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
					$('.sortByMostPhyInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.language--filter__item--checkbox').attr('customlanguage'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.featrues--filter__item--checkbox').attr('customfeatrues'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.filter__item--radio').attr('customlastadded')
				);
        // for loading
        $(this).attr('loadingDone', 'Done');
        // refresh
        // .product-tile_for---all--place--games
        $(this).delay(1000).queue(function(){
					readMoreComments();
					helpFulOrNotComment();
					pageIndicatorAndArrowClick();
					reloadHeightOfGamesContent();
					$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .average-item[option='+ $(".returnResalutForratingText").attr("option") +']').removeClass('ng-hide').siblings('.average-item').addClass('ng-hide');
					if($('.returnResalutForratingText').attr('option') == "2"){
						$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .average-item[option='+ $('.returnResalutForratingText').attr('option') +'] .average-item__value').text($('.returnResalutForratingText').text());
					}
					if($('.returnResalutForratingText').attr('option') == "1" || $('.returnResalutForratingText').attr('option') == "4"){
						$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting').addClass('ng-hide');
					} else {
						$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting').removeClass('ng-hide');
					}
					// stop animation loading
					$('.catalog-spinner').addClass('ng-hide');
          pageIndicatorAndArrowClick();
          $(this).dequeue();
        });
        $(this).delay(400).queue(function(){
          $(this).parents('.content.cf').removeClass('PleaseWait1SecondForLoading');
          $(this).dequeue();
        });
      }
      $(this).parents('.content.cf').addClass('PleaseWait1SecondForLoading');
    });
  }
	// [featrues]
  forAllFiltersExceptPrice('.featrues--filter__item--checkbox', 'featruesvalue', 'customfeatrues', '.featrues--filter__item--checkbox', 'customfeatrues', '.language--filter__item--checkbox', 'customlanguage');
  // [Language]
  forAllFiltersExceptPrice('.language--filter__item--checkbox', 'languagevalue', 'customlanguage', '.featrues--filter__item--checkbox', 'customfeatrues', '.language--filter__item--checkbox', 'customlanguage');

	// start with remove all filter
	$('.content.cf .reviews__aside-col .container--two-columns__child--curated-collection .filter__item .filter__header .filter__clear-wrapper').click(function(){
		if($(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){
		} else {
			$(this).parent('.filter__header').siblings('.filter__item-options').find('span').removeClass('option__item---active');
			$(this).parent('.filter__header').siblings('.filter__item-options').find('span .sort-dropdown__icon-full').addClass('ng-hide');
			$(this).parent('.filter__header').siblings('.filter__item-options').find('span .sort-dropdown__icon-empty').removeClass('ng-hide');
			$(this).addClass('ng-hide');
			$(this).siblings('.filter__toggle').removeClass('lessOneOptionItemChecked');
			$(this).parent('.filter__header').siblings('.ShowWhenFilterOff').text("");

			// request for database
			if($(this).parents('.filter__item').hasClass('filter__item--radio')){
				$(this).parents('.filter__item.filter__item--radio').attr('CustomLastAdded', "");
			}
			/* [featrues] */
			else if($(this).parents('.filter__item').hasClass('featrues--filter__item--checkbox')){
				$(this).parents('.filter__item.featrues--filter__item--checkbox').attr('CustomFeatrues', "");
			}
			/* [Language] */
			else if($(this).parents('.filter__item').hasClass('language--filter__item--checkbox')){
				$(this).parents('.filter__item.language--filter__item--checkbox').attr('CustomLanguage', "");
			}

			// filter all games
			filter_all_games(
				$('.click-hide-search.content.cf').attr('esn7a841'),
				"",
				$('.sortByNumberOfCommentInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
				$('.sortByMostPhyInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
				$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.language--filter__item--checkbox').attr('customlanguage'),
				$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.featrues--filter__item--checkbox').attr('customfeatrues'),
				$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.filter__item--radio').attr('customlastadded')
			);
			// refresh
			$(this).delay(1000).queue(function(){
				readMoreComments();
				helpFulOrNotComment();
				pageIndicatorAndArrowClick();
				reloadHeightOfGamesContent();
				$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .average-item[option='+ $(".returnResalutForratingText").attr("option") +']').removeClass('ng-hide').siblings('.average-item').addClass('ng-hide');
				if($('.returnResalutForratingText').attr('option') == "2"){
					$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .average-item[option='+ $('.returnResalutForratingText').attr('option') +'] .average-item__value').text($('.returnResalutForratingText').text());
				}
				if($('.returnResalutForratingText').attr('option') == "1" || $('.returnResalutForratingText').attr('option') == "4"){
					$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting').addClass('ng-hide');
				} else {
					$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting').removeClass('ng-hide');
				}
				// stop animation loading
				$('.catalog-spinner').addClass('ng-hide');
				$(this).dequeue();
			});
			$(this).delay(400).queue(function(){
				$(this).parents('.content.cf').removeClass('PleaseWait1SecondForLoading');
				$(this).dequeue();
			});
		}
		$(this).parents('.content.cf').addClass('PleaseWait1SecondForLoading');
	});
	// End with remove all filter
	// Start With add your review
		$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--small .review-new__add-button').on('click', function(){
			if($(this).attr('haveaccount') == "true"){
				$('.reviews__main .reviews__main-col .review__item').removeClass('ng-hide');
				$('.reviews .reviews-content .reviews-content-ng-scope .average-body').addClass('z-index-item');
			} else {
				$('.--gog__com__navbar .menu-anonymous-header .menu-btn.menu-anonymous-header__btn--create-account').each(function() {
					$(this).click();
				});
			}
		});
	// End With add your review
	// Start With save reviews
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .review-new__buttons-wrapper .save-button').click(function(){
			if($('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .review-new__input-wrapper input').val().length > 10
			&& $('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .review-new__textarea-wrapper textarea').val().length > 7
			&& $('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .review-new__stars .average-body__stars-rating').attr('lastrating') != ""){
				var dateNow = (new Date().toLocaleString("default", { month: "long" })) + " " + (new Date().toISOString().slice(8,10)) + ", " + (new Date().toISOString().slice(0,4));
				reviewMyCommentWithOthre(
					$('.click-hide-search.content.cf').attr('esn7a841'),
					$('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .review-new__input-wrapper input').val(),
					$('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .review-new__textarea-wrapper textarea').val(),
					$('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .review-new__stars .average-body__stars-rating').attr('lastrating'),
					dateNow,
					$('.click-hide-search.content.cf').attr('gameiddb'),
					$('.click-hide-search.content.cf').attr('username'),
					"",
					$('.sortByNumberOfCommentInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
					$('.sortByMostPhyInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.language--filter__item--checkbox').attr('customlanguage'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.featrues--filter__item--checkbox').attr('customfeatrues'),
					$('.reviews__aside-col .container--two-columns__child--curated-collection .filter__item.filter__item--radio').attr('customlastadded')
				);

				$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--small .average-body__stars-rating .rating-stars__star[rate='+ $('.reviews__main .review__col.review__col--body .rating-stars__star.end-of-rating').attr('rate') +']').each(function(){
					$(this).click();
				});
				$('.reviews .average-body__stars-rating').addClass('alreadyCommented');

				// hide it [no more comment from this user again]
				$(this).delay(1000).queue(function(){
					readMoreComments();
					helpFulOrNotComment();
					pageIndicatorAndArrowClick();
					reloadHeightOfGamesContent();
					// stop animation loading
					// for rating
					$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .ng-isolate-scope:first-of-type .average-item__numbers .average-item__value').text($('.returnResalutForratingTextoverall').text());
					$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .ng-isolate-scope:nth-of-type(2) .average-item__numbers .average-item__value').text($('.returnResalutForratingTextVirifedOwner').text());
					$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .average-item[option='+ $(".returnResalutForratingText").attr("option") +']').removeClass('ng-hide').siblings('.average-item').addClass('ng-hide');
					if($('.returnResalutForratingText').attr('option') == "2"){
						$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--big .average-item[option='+ $('.returnResalutForratingText').attr('option') +'] .average-item__value').text($('.returnResalutForratingText').text());
					}
					if($('.returnResalutForratingText').attr('option') == "1" || $('.returnResalutForratingText').attr('option') == "4"){
						$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting').addClass('ng-hide');
					} else {
						$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting').removeClass('ng-hide');
					}
					// for comments
					$('.reviews .reviews-content .reviews-content-ng-scope .reviews__filters-sorting, .reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__aside-col').removeClass('ng-hide');
					$('.catalog-spinner').addClass('ng-hide');
					$('.reviews__main .reviews__main-col > .review__item').addClass('ng-hide');
					$('.reviews__main .reviews__main-col > .review__item input, .reviews__main .reviews__main-col > .review__item textarea').val('');
					$('.reviews__main .reviews__main-col > .review__item').remove();
					$('.reviews .reviews-content .reviews-content-ng-scope .average-body .average-body__col--small .review-new__add-button').remove();
					$('.reviews .reviews-content .reviews-content-ng-scope .average-body').removeClass('z-index-item');
					$(this).dequeue();
				});
			}
		});
	// End With save reviews
	// Start With cancel your review
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item .review__col--body .review-new__row .review-new__buttons-wrapper .cancel-button').click(function(){
			$(this).parentsUntil('.reviews__main').find('.review-new').addClass('ng-hide');
			$('.reviews .reviews-content .reviews-content-ng-scope .average-body').removeClass('z-index-item');
		});
	// End With cancel your review
	// Start With read more in commentText
	function readMoreComments(){
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item--saved .review__item .review__col--body .review-new__row .comment--text pre .read--more--comment').click(function(){
			$(this).parent('.short-text').addClass('ng-hide').siblings('.long-text').removeClass('ng-hide');
		});
	}
	readMoreComments();
	// End With read more in commentText
	// Start With [ yes- no ] in comment
	function helpFulOrNotComment(){
		$('.reviews .reviews-content .reviews-content-ng-scope .reviews__main .reviews__main-col .review__item--saved .review__item .review__col--body .review-new__row .helpful-comment-yes--no .helpedComment').click(function(){
			if($('.click-hide-search.content.cf').attr('haveanaccount') == "true"){
				if($(this).hasClass('HelpFulComment')){
					$(this).parent('.your--vote').siblings('span').html('( <helpful>'+ (parseInt($(this).parent('.your--vote').siblings('span').find('helpful').text()) + 1) +'</helpful> of <unhelpful>'+ (parseInt($(this).parent('.your--vote').siblings('span').find('unhelpful').text()) + 1) +'</unhelpful> users found this helpful )');
					UpdateCommentTableHelpFul(
						$('.click-hide-search.content.cf').attr('esn7a841'),
						$('.click-hide-search.content.cf').attr('username'),
						$(this).parents('.review__item').attr('commentid'),
						"Yes",
						"helpful"
					);
				} else {
					$(this).parent('.your--vote').siblings('span').html('( <helpful>'+ (parseInt($(this).parent('.your--vote').siblings('span').find('helpful').text())) +'</helpful> of <unhelpful>'+ (parseInt($(this).parent('.your--vote').siblings('span').find('unhelpful').text()) + 1) +'</unhelpful> users found this helpful )');
					UpdateCommentTableHelpFul(
						$('.click-hide-search.content.cf').attr('esn7a841'),
						$('.click-hide-search.content.cf').attr('username'),
						$(this).parents('.review__item').attr('commentid'),
						"No",
						"helpful"
					);
				}
				$(this).siblings('span:not(.ThanksForVote)').remove();
				$(this).siblings('.ThanksForVote').removeClass('ng-hide');
				$(this).remove();
			} else {
				$('.--gog__com__navbar .menu-anonymous-header .menu-btn.menu-anonymous-header__btn--create-account').each(function() {
					$(this).click();
				});
			}
		});
	}
	helpFulOrNotComment();
	// End With [ yes- no ] in comment
	function pageIndicatorAndArrowClick(){
		// page indicator [items]
		$('.content.cf .reviews .catalog__paginator-wrapper .catalog__paginator .paginator-container .page-indicator').click(function(){
			//window.scrollTo(0, 0);
			if($(this).hasClass('Dots_bettween_f-l') || $(this).hasClass('page-indicator--active')){
			} else {
				//window.scrollTo(0, 0);
				//$(window).scrollTop(0);
				$("html, body").animate({ scrollTop: ($(".reviews").offset().top) - 50 }, "cubic-bezier(0.42, 0, 0.58, 1)");
				if($(this).hasClass('page-indicator--first')){
					$(this).siblings('.arrow-wrapper--left').addClass('arrow-wrapper--hidden');
					$(this).siblings('.arrow-wrapper--right').removeClass('arrow-wrapper--hidden');
				} else if($(this).hasClass('page-indicator--last')){
					$(this).siblings('.arrow-wrapper--left').removeClass('arrow-wrapper--hidden');
					$(this).siblings('.arrow-wrapper--right').addClass('arrow-wrapper--hidden');
				} else {
					$(this).siblings('.arrow-wrapper').removeClass('arrow-wrapper--hidden');
				}
				$(this).addClass('page-indicator--active').siblings('.page-indicator').removeClass('page-indicator--active');
				// if number of item [page-indicator] great of  6
				if($('.page-indicator').length > 6){
					if($(this).hasClass('page-index-wrapper--next')){
						$(this).removeClass('page-index-wrapper--next page-index-wrapper--prev');
						$(this).prevAll('.page-indicator').addClass('page-index-wrapper--prev').removeClass('page-index-wrapper--next');
						if(parseInt($(this).attr('ng-item-index')) >= 5){
							$(this).prev('.page-indicator').removeClass('ng-hide Dots_bettween_f-l').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							$(this).prev('.page-indicator').prev('.page-indicator').removeClass('ng-hide Dots_bettween_f-l').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							$(this).prev('.page-indicator').prev('.page-indicator').prev('.page-indicator').removeClass('ng-hide').addClass('Dots_bettween_f-l').find('.page-index-wrapper').addClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').removeClass('ng-hide');
							$(this).prev('.page-indicator').prev('.page-indicator').prev('.page-indicator').prevAll('.page-indicator:not(.page-indicator--first)').addClass('ng-hide').removeClass('Dots_bettween_f-l');
						}
						if($(this).next('.page-indicator').hasClass('Dots_bettween_f-l')){
							$(this).next('.page-indicator').removeClass('Dots_bettween_f-l').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							$(this).next('.page-indicator').next('.page-indicator').removeClass('ng-hide').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							if($(this).next('.page-indicator').next('.page-indicator').next('.page-indicator').hasClass('page-indicator--last')){
							} else {
								$(this).next('.page-indicator').next('.page-indicator').next('.page-indicator').removeClass('ng-hide').addClass('Dots_bettween_f-l').find('.page-index-wrapper').addClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').removeClass('ng-hide');
							}
						} else {
							$(this).next('.page-indicator').next('.page-indicator').removeClass('Dots_bettween_f-l').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							if($(this).next('.page-indicator').next('.page-indicator').next('.page-indicator').hasClass('page-indicator--last')){
							} else {
								$(this).next('.page-indicator').next('.page-indicator').next('.page-indicator').removeClass('ng-hide').addClass('Dots_bettween_f-l').find('.page-index-wrapper').addClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').removeClass('ng-hide');
							}
						}
					} else {
						$(this).removeClass('page-index-wrapper--next page-index-wrapper--prev');
						$(this).nextAll('.page-indicator').addClass('page-index-wrapper--next').removeClass('page-index-wrapper--prev');
						if(parseInt($(this).attr('ng-item-index')) <= (($('.page-indicator.page-indicator--last').attr('ng-item-index')) - 4)){
							$(this).next('.page-indicator').removeClass('ng-hide Dots_bettween_f-l').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							$(this).next('.page-indicator').next('.page-indicator').removeClass('ng-hide Dots_bettween_f-l').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							$(this).next('.page-indicator').next('.page-indicator').next('.page-indicator').removeClass('ng-hide').addClass('Dots_bettween_f-l').find('.page-index-wrapper').addClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').removeClass('ng-hide');
							$(this).next('.page-indicator').next('.page-indicator').next('.page-indicator').nextAll('.page-indicator:not(.page-indicator--last)').addClass('ng-hide').removeClass('Dots_bettween_f-l');
						}
						if($(this).prev('.page-indicator').hasClass('Dots_bettween_f-l')){
							$(this).prev('.page-indicator').removeClass('Dots_bettween_f-l').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							$(this).prev('.page-indicator').prev('.page-indicator').removeClass('ng-hide').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							if($(this).prev('.page-indicator').prev('.page-indicator').prev('.page-indicator').hasClass('page-indicator--first')){
							} else {
								$(this).prev('.page-indicator').prev('.page-indicator').prev('.page-indicator').removeClass('ng-hide').addClass('Dots_bettween_f-l').find('.page-index-wrapper').addClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').removeClass('ng-hide');
							}
						} else {
							$(this).prev('.page-indicator').prev('.page-indicator').removeClass('Dots_bettween_f-l').find('.page-index-wrapper').removeClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').addClass('ng-hide');
							if($(this).prev('.page-indicator').prev('.page-indicator').prev('.page-indicator').hasClass('page-indicator--first')){
							} else {
								$(this).prev('.page-indicator').prev('.page-indicator').prev('.page-indicator').removeClass('ng-hide').addClass('Dots_bettween_f-l').find('.page-index-wrapper').addClass('ng-hide').end().find('.page-ellipsis.page-ellipsis-desktop').removeClass('ng-hide');
							}
						}
					}
				}
				catalog__paginator_and_wrapper(
					$('.sortByMostPhyInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show'),
					$('.click-hide-search.content.cf').attr('esn7a841'),
					$('.ReturnCommentsIdForWrapper').text(),
					$(this).attr('ng-item-index'),
					$(this).attr('noloading'),
					$('.sortByNumberOfCommentInPage .dropdown__layer .sort-dropdown__item.sort-dropdown__item_selected span').attr('ng-show')
				);
				$(this).attr('noloading', "Done");
				// refresh
				// .product-tile_for---all--place--games
				$(this).delay(1000).queue(function(){
					readMoreComments();
					helpFulOrNotComment();
					reloadHeightOfGamesContent();
					// stop animation loading
					$('.catalog-spinner').addClass('ng-hide');
					$(this).dequeue();
				});
			}
		});

		// page indicator [arrow-wrapper]
		$('.content.cf .reviews .catalog__paginator-wrapper .catalog__paginator .paginator-container .arrow-wrapper').click(function(){
			if($(this).hasClass('arrow-wrapper--right')){
				$('.content.cf .reviews .catalog__paginator-wrapper .catalog__paginator .paginator-container .page-indicator.page-indicator--active').each(function(){
					$(this).next().click();
				});
			} else {
				$('.content.cf .reviews .catalog__paginator-wrapper .catalog__paginator .paginator-container .page-indicator.page-indicator--active').each(function(){
					$(this).prev().click();
				});
			}
		});
	}
	pageIndicatorAndArrowClick();
	/* End With Static Event For All Games */
	// close cookie banner
	$('._floating-banner ._floating-banner__container ._floating-banner__close').click(function(){
		$(this).parents('._floating-banner').remove();
	});
});
// return resault of search
function systemRequirementOperetion(ng_system, ng_game_id){

	// assign request to variables
	var myrequest = "";
	// code for IE7+, Firefox, Chrome, Opera, Safari
	if (window.XMLHttpRequest) { myrequest = new XMLHttpRequest(); }
	// code for IE6, IE5
	else { myrequest = new ActiveXObject("Microsoft.XMLHTTP"); }

	// [ onreadystatechange ] when ready state changes
	myrequest.onreadystatechange = function(){
		// http status [200[ok], 404[not found], ...]
		if(this.readyState === 4 && this.status === 200) {
			document.getElementById('systemRequirementOperetion').innerHTML = myrequest.responseText;
		}
	};

	// XMLHttpRequest [post]
	myrequest.open('POST', 'includes-php-files/static-templates/ajax_all_games/ajax_php_mysql_for_allGames_OperatingSystem.php', true);
	myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
	myrequest.send("ng_system=" + ng_system + "&ng_game_id=" + ng_game_id);
}

// return resault of comments
function reviewMyCommentWithOthre(TableName, InputVal, textAreaVal, rating, date, GameIDInDB, UserName, loadingDone, ShowCommentNumberInPage, ShowCommentPhyInPage, CustomLanguage, CustomFeatrues, CustomLastAdded){

	// assign request to variables
	var myrequest = "";
	// code for IE7+, Firefox, Chrome, Opera, Safari
	if (window.XMLHttpRequest) { myrequest = new XMLHttpRequest(); }
	// code for IE6, IE5
	else { myrequest = new ActiveXObject("Microsoft.XMLHTTP"); }

	// [ onreadystatechange ] when ready state changes
	myrequest.onreadystatechange = function(){
		// http status [200[ok], 404[not found], ...]
		if(this.readyState === 4 && this.status === 200) {
			document.getElementById('reviewMyCommentWithOthre').innerHTML = myrequest.responseText;
		}
	};

	// XMLHttpRequest [post]
	myrequest.open('POST', 'includes-php-files/static-templates/ajax_all_games/comments.php', true);
	myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
	myrequest.send("esn7a841=" + TableName + "&InputVal=" + InputVal + "&textAreaVal=" + textAreaVal + "&rating=" + rating + "&date=" + date + "&GameIDInDB=" + GameIDInDB + "&UserName=" + UserName + "&loadingDone=" + loadingDone + "&ShowCommentNumberInPage=" + ShowCommentNumberInPage + "&ShowCommentPhyInPage=" + ShowCommentPhyInPage + "&CustomLanguage=" + CustomLanguage + "&CustomFeatrues=" + CustomFeatrues + "&CustomLastAdded=" + CustomLastAdded);
}

// update comment table
function UpdateCommentTableHelpFul(TableName, UserName, commentid, HelpOrNot, HelpfulKnow){

	// assign request to variables
	var myrequest = "";
	// code for IE7+, Firefox, Chrome, Opera, Safari
	if (window.XMLHttpRequest) { myrequest = new XMLHttpRequest(); }
	// code for IE6, IE5
	else { myrequest = new ActiveXObject("Microsoft.XMLHTTP"); }

	// [ onreadystatechange ] when ready state changes
	myrequest.onreadystatechange = function(){
		// http status [200[ok], 404[not found], ...]
		if(this.readyState === 4 && this.status === 200) {}
	};

	// XMLHttpRequest [post]
	myrequest.open('POST', 'includes-php-files/static-templates/ajax_all_games/comments.php', true);
	myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
	myrequest.send("esn7a841=" + TableName + "&UserName=" + UserName + "&commentid=" + commentid + "&HelpOrNot=" + HelpOrNot + "&HelpfulKnow=" + HelpfulKnow);
}

// return resault of search
function catalog__paginator_and_wrapper(ShowCommentPhyInPage, TableName, ReturnCommentsIdForWrapper, ngItemIndex, noloading, ShowCommentNumberInPage){

	// assign request to variables
	var myrequest = "";
	// code for IE7+, Firefox, Chrome, Opera, Safari
	if (window.XMLHttpRequest) { myrequest = new XMLHttpRequest(); }
	// code for IE6, IE5
	else { myrequest = new ActiveXObject("Microsoft.XMLHTTP"); }

	// [ onreadystatechange ] when ready state changes
	myrequest.onreadystatechange = function(){
		// http status [200[ok], 404[not found], ...]
		if(this.readyState === 4 && this.status === 200) {
			document.getElementById('for_catalog__paginator_wrapper').innerHTML = myrequest.responseText;
		}
	};

	// XMLHttpRequest [post]
	myrequest.open('POST', 'includes-php-files/static-templates/ajax_all_games/ajax_php_mysql_for_GamesCommentsPageWrapper.php', true);
	myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
	myrequest.send("ShowCommentPhyInPage=" + ShowCommentPhyInPage + "&esn7a841=" + TableName + "&ReturnCommentsIdForWrapper=" + ReturnCommentsIdForWrapper + "&ngItemIndex=" + ngItemIndex + "&noloading=" + noloading + "&ShowCommentNumberInPage=" + ShowCommentNumberInPage);
}

// Filter All Games [resault]
function filter_all_games(TableName, loadingDone, ShowCommentNumberInPage, ShowCommentPhyInPage, CustomLanguage, CustomFeatrues, CustomLastAdded){

	// assign request to variables
	var myrequest = "";
	// code for IE7+, Firefox, Chrome, Opera, Safari
	if (window.XMLHttpRequest) { myrequest = new XMLHttpRequest(); }
	// code for IE6, IE5
	else { myrequest = new ActiveXObject("Microsoft.XMLHTTP"); }

	// [ onreadystatechange ] when ready state changes
	myrequest.onreadystatechange = function(){
		// http status [200[ok], 404[not found], ...]
		if(this.readyState === 4 && this.status === 200) {
			document.getElementById('reviewMyCommentWithOthre').innerHTML = myrequest.responseText;
		}
	};

	// XMLHttpRequest [post]
	myrequest.open('POST', 'includes-php-files/static-templates/ajax_all_games/filterAllComments.php', true);
	myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
	myrequest.send("esn7a841=" + TableName + "&loadingDone=" + loadingDone + "&ShowCommentNumberInPage=" + ShowCommentNumberInPage + "&ShowCommentPhyInPage=" + ShowCommentPhyInPage + "&CustomLanguage=" + CustomLanguage + "&CustomFeatrues=" + CustomFeatrues + "&CustomLastAdded=" + CustomLastAdded);
}

// calc verified owner rating
function verifiedOwnerrating(TableName){

	// assign request to variables
	var myrequest = "";
	// code for IE7+, Firefox, Chrome, Opera, Safari
	if (window.XMLHttpRequest) { myrequest = new XMLHttpRequest(); }
	// code for IE6, IE5
	else { myrequest = new ActiveXObject("Microsoft.XMLHTTP"); }

	// [ onreadystatechange ] when ready state changes
	myrequest.onreadystatechange = function(){
		// http status [200[ok], 404[not found], ...]
		if(this.readyState === 4 && this.status === 200) {
			document.getElementById('verifiedOwnerrating').innerHTML = myrequest.responseText;
		}
	};

	// XMLHttpRequest [post]
	myrequest.open('POST', 'includes-php-files/static-templates/ajax_all_games/verifiedOwnerrating.php', true);
	myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
	myrequest.send("esn7a841=" + TableName);
}
