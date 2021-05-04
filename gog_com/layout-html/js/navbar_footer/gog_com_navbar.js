$(function(){
  // serach
  // $(this).delay(1000).queue(function(){
  //   let urlParams = new URLSearchParams(document.location.search.substring(1));
  //   let action_sign_login = urlParams.get('action_sign_login');
  //   console.log(action_sign_login);
  //   $(this).dequeue();
  // });
  //window.location.replace("http://localhost/AllYourGamesInOnePlace/gog_com/gogcom.php");
  var store_search_word = "";
  $('#input_search').keyup(function(){
    if($(this).val() == store_search_word){}
    else{
      store_search_word = $(this).val();
      search_Term_Change(($(this).val()).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'), 'games/movies_for_gamers');
      $(this).delay(150).queue(function(){
        // Games
        if($('.countGamesfromSearch').text() == "0" || $(this).val() == ""){
          $('#search_totalGames').html("");
        } else {
          $('#search_totalGames').html('<div class="is-active">' + $('.countGamesfromSearch').text() + " GAMES" + '<span class="menu-triangle menu-triangle--centered"></span>' + '</div>');
        }

        // Movies
        if($('.countMoviesfromSearch').text() == "0" || $(this).val() == ""){
          $('#search_totalmovies').html("");
        } else {
          $('#search_totalmovies').html('<div class="">' + $('.countMoviesfromSearch').text() + " MOVIES" + '<span class="menu-triangle menu-triangle--centered"></span>' + '</div>');
        }
        $(this).dequeue();
      });
    }
  });

  // button search_totalGames
  $('#search_totalGames').on("click", function(){
    if($(this).find('div').hasClass('is-active')){}
    else{ select_games_movies_only_when_click('games'); }
  });
  $('#search_totalmovies').on("click", function(){
    if($(this).find('div').hasClass('is-active')){}
    else{ select_games_movies_only_when_click('movies_for_gamers'); $('.menu-search__results').removeClass('menu-search__results--for--games--movies'); }
  });

  // Start With showing [menu-submenu] in [menu-main]
  $('.--gog__com__navbar .menu__container .menu-main .menu-item').on({
    mouseenter: function(){
      $(this).find('.menu-submenu').addClass('display_flex_any_where').removeClass('ng-hide');
      $('.menu-overlay').addClass('is---visible');
    } ,
    mouseleave: function(){
      $(this).find('.menu-submenu').removeClass('display_flex_any_where').addClass('ng-hide');
      $('.menu-overlay').removeClass('is---visible');
      $(this).find('.menu-section-layer').attr('ng---category_background_game', '').html("").end().find('.menu-submenu-item').removeClass('menu-submenu-item-is-active');
    }
  });

  // for store[[[js-menu-store]]]
  $('.--gog__com__navbar .menu__container .menu-main .menu-item.js-menu-store .menu-submenu .menu-submenu-item').on({
    mouseenter: function(){
      $(this).siblings('.menu-section-layer').removeClass('ng-hide');
      fun_select_game_show_on_store($(this).attr('ng_type'), $(this).attr('ng_caregory_name'), $(this).attr('ng_caregory_title_inside'), $(this).attr('ng_caregory_btn_inside'), $(this).attr('ng_href'));
      $('.menu-section-layer').attr("ng---category_background_game", $(this).attr('ng_caregory_background_store_class'));
      $(this).addClass('menu-submenu-item-is-active').siblings('.menu-submenu-item').removeClass('menu-submenu-item-is-active');
    }
  });

  // for any item except store [[[menu-item-except-store]]]
  $('.--gog__com__navbar .menu__container .menu-main .menu-item.menu-item-except-store .menu-submenu .menu-submenu-item').on({
    mouseenter: function(){
      $(this).find('.menu-submenu-item--banner').removeClass('ng-hide');
    },
    mouseleave: function(){
      $(this).find('.menu-submenu-item--banner').addClass('ng-hide');
    }
  });

  // list in profile of language
  $('.--gog__com__navbar .menu__container .menu-main .menu-item .menu-submenu .menu-submenu-item .menu-language-and-currency .menu-language-currency .menu-language-and-currency__list li').click(function(){
    $(this).addClass('is-active').siblings('.menu-language-and-currency__list-item').removeClass('is-active');
    $(this).parents('.menu-language-currency').siblings('.menu-language-and-currency__footer').addClass('is-visible');
  });

  // Start With showing [menu-submenu] in [menu-tray] == [cart, friends, notifications]
  $('.menu-tray .menu-cart .menu-link').click(function(){
    $(this).siblings('.menu-submenu').toggleClass('ng-hide');
    $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-toolbar__close').each(function(){
      $(this).click();
    });
    $('.menu-tray .menu-lite .menu-submenu').addClass('ng-hide');
    $('.menu-overlay').addClass('is---visible');
    $(this).find('.menu-item__count--cart').removeClass('notify_cart_increased');
    $('.menu-tray .menu-lite > .menu-link').removeClass('menu-is---opened');
  });

  $('.menu-tray .menu-cart').mouseleave(function(){
    $(this).find('.menu-submenu').addClass('ng-hide');
    if($('.menu-tray .js-menu-search .menu-submenu').hasClass('ng-hide')){
      $('.menu-overlay').removeClass('is---visible');
    }
  });

  // Start With showing [menu-submenu] in [menu-tray] == [search]
  $('.menu-tray .js-menu-search .menu-link').click(function(){
    $('.menu-search__results').addClass('menu-search__results--for--games--movies');
    $(this).siblings('.menu-submenu').removeClass('ng-hide');
    $('.--gog__com__navbar').addClass('menu-item--expanded');
    $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-input input').focus();
    $('.menu-tray .menu-lite .menu-submenu').addClass('ng-hide');
    $('.menu-tray .menu-lite').addClass('ng-hide');
    $('.menu-overlay').addClass('is---visible');
    $('.menu-notifications, .menu-friends').addClass('ng-hide');
    $('.--gog__com__navbar').addClass('hide_element_navbar_lite_mode');
    $('.menu-tray .menu-lite > .menu-link').removeClass('menu-is---opened');
  });

  $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-toolbar__close').click(function(){
    $(this).parents('.menu-submenu').addClass('ng-hide');
    $('.--gog__com__navbar').removeClass('menu-item--expanded');
    $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-input input').blur();
    $('.menu-tray .menu-lite').removeClass('ng-hide');
    $('.menu-overlay').removeClass('is---visible');
    $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-input .menu-search-input__clear').each(function(){
      $(this).click();
    });
    $('.menu-notifications, .menu-friends').removeClass('ng-hide');
    $('.--gog__com__navbar').removeClass('hide_element_navbar_lite_mode');
    $('.menu-tray .menu-lite > .menu-link').removeClass('menu-is---opened');
  });

  // menu-lite
  $('.menu-tray .menu-lite > .menu-link').click(function(){
    $(this).toggleClass('menu-is---opened').siblings('.menu-submenu').toggleClass('ng-hide');
  });

  $('.menu-tray .menu-lite .menu-submenu .menu-submenu-item .menu-submenu-item__expand-trigger').click(function(){
    $(this).siblings('.menu-accordion').toggleClass('ng-hide').parent('.menu-submenu-item').siblings('.menu-submenu-item').find('.menu-accordion').addClass('ng-hide');
    $(this).toggleClass('rotate_icon_down_to_top').parent('.menu-submenu-item').siblings('.menu-submenu-item').find('.menu-submenu-item__expand-trigger').removeClass('rotate_icon_down_to_top');
  });

  $('.menu-tray .menu-lite .menu-submenu .menu-lite-anonymous .menu-link').click(function(){
    $(this).parent('.menu-lite-anonymous').toggleClass('transform_banner');
  });

  // $('.menu-overlay') click to hide search and any thing non default showing navbar
  $('.menu-overlay').click(function(){
    $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-toolbar__close').each(function(){
      $(this).click();
    });
    $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-input .menu-search-input__clear').each(function(){
      $(this).click();
    });
    $('.menu-notifications, .menu-friends').removeClass('ng-hide');
    $('.--gog__com__navbar').removeClass('hide_element_navbar_lite_mode');
    $('.menu-tray .menu-lite').removeClass('ng-hide');
    $('.menu-tray .menu-lite > .menu-link').removeClass('menu-is---opened');
  });

  // onkeyup input remove class ng-hide from clear
  $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-input input').keyup(function(){
    if($(this).val().length == "0"){
      $(this).siblings('.menu-search-input__clear').addClass('ng-hide');
    } else {
      $(this).siblings('.menu-search-input__clear').removeClass('ng-hide');
    }
  });

  // input value is empty on click clear button
  $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-input .menu-search-input__clear').click(function(){
    $(this).siblings('input').val("");
    $('#menu-search__results').html("");
    $(this).addClass('ng-hide');
    $(this).parent('.menu-search-input').siblings('.menu-search-toolbar__results-count').html("");
    $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-input input').focus();
  });

  // click [ menu-search-toolbar__results-count ] to add [ is-active ] class
  $('.menu-tray .js-menu-search .menu-search .menu-search-toolbar .menu-search-toolbar__results-count').click(function(){
    $(this).find('div').addClass('is-active').end().siblings('.menu-search-toolbar__results-count').find('div').removeClass('is-active');
  });

  /* Start cart */
  // [add] game to cart
  $('.menu-tray .js-menu-search .menu-search .menu-search__results, .--gog__com__navbar .menu__container .menu-main .menu-item .menu-submenu .menu-section-layer').on("mouseenter", function(){
    $('.--gog__com__navbar .product-state__price-btn').on("click", function(){
      if($(this).hasClass('tba_owned_prevent_action_add_to_cart') || $(this).hasClass('game_added_to_cart_successfuly')){}
      else{
        // add game to cart from [store, search]
        fun_select_game_by_id_add_to_cart($(this).attr('ng-game-movies-id'));

        $(this).addClass('game_added_to_cart_successfuly');
        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +']').addClass('game_added_to_cart_successfuly');

        $('.--gog__com__navbar .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +'] .product-status__in-cart').removeClass('ng-hide');
        $('.--gog__com__navbar .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +'] .product-state__is_choose:not(.product-status__in-cart)').addClass('ng-hide');

        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +'] .product-state__checkout-now').removeClass('ng-hide');
        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +'] .product-state__is_choose:not(.product-state__checkout-now)').addClass('ng-hide');

        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +']').parents('.button-parent--class--to-find--labels').find('.product-tile__labels .product-tile__label--in-cart').removeClass('ng-hide').siblings('.product-tile__label').addClass('ng-hide');

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
  });

  // [remove] game in cart
	$('.menu-tray .js-menu-cart .menu-submenu').mouseenter(function(){
    // remove
		$('.js-gog-scrollbar-wrapper .js-gog-scrollbar-content .menu-product .menu-product__link .menu-product__content .menu-product__content-in .menu-cart-item__options .menu-cart-option-remove').on("click", function(e){
			e.preventDefault();
      $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +']').removeClass('game_added_to_cart_successfuly').attr('gc_g_incart', '0');

      $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +'] .product-state__add-to-cart').removeClass('ng-hide');
      $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +'] .product-state__is_choose:not(.product-state__add-to-cart)').addClass('ng-hide');

      $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +']').parents('.button-parent--class--to-find--labels').find('.product-tile__labels .product-tile__label').addClass('ng-hide').siblings('.current_label_active').removeClass('ng-hide');
      $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +'].game_wishlisted_successfuly').parents('.button-parent--class--to-find--labels').find('.product-tile__labels .product-tile__label').addClass('ng-hide').siblings('.product-tile__label--is-wishlisted').removeClass('ng-hide');

      fun_select_game_by_id_remove_from_cart($(this).parents('.menu-product').attr('ng-game-movies-id'));

      // checkout game[ for games ]
      $('.click-hide-search.content.cf .layout-container .product-actions .product-state__price-btn').find('span.CheckOutNow').addClass('ng-hide').siblings('span.addToCART').removeClass('ng-hide');

      // select number of game in cart
      $(this).delay(100).queue(function(){
        fun_select_number_of_games_in_cart();
        $(this).dequeue();
      });
    });

    // wishlist
    $('.js-gog-scrollbar-wrapper .js-gog-scrollbar-content .menu-product .menu-product__link .menu-product__content .menu-product__content-in .menu-cart-item__options .menu-cart-option--add-to-wishlist').on("click", function(e){
			e.preventDefault();
      if($(this).parents('.js-gog-scrollbar-wrapper_parent').hasClass('user_realy_in_gog_enjoy')){
        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +']').removeClass('game_added_to_cart_successfuly').addClass('game_wishlisted_successfuly').attr('gc_g_incart', '0');

        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +'] .product-state__add-to-cart').removeClass('ng-hide');
        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +'] .product-state__is_choose:not(.product-state__add-to-cart)').addClass('ng-hide');

        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).parents('.menu-product').attr('ng-game-movies-id') +']').parents('.button-parent--class--to-find--labels').find('.product-tile__labels .product-tile__label').addClass('ng-hide').siblings('.product-tile__label--is-wishlisted').removeClass('ng-hide');

        // wishlisted
        $(this).addClass('ng-hide').siblings('.menu-cart-option--wishlisted').removeClass('ng-hide');

        // add to wishlist
        fun_add_game_to_wishlist($(this).parents('.menu-product').attr('ng-game-movies-id'));

        // hide this and show full heart
        $('.click-hide-search.content.cf .layout-container .product-actions .wishlist-button .wishlist-heart').addClass('ng-hide').siblings('.full-heart').removeClass('ng-hide');
        // checkout game[ for games ]
        $('.click-hide-search.content.cf .layout-container .product-actions .product-state__price-btn').find('span.CheckOutNow').addClass('ng-hide').siblings('span.addToCART').removeClass('ng-hide');

        $(this).delay(200).queue(function(){
          fun_select_game_by_id_remove_from_cart($(this).parents('.menu-product').attr('ng-game-movies-id'));
          $(this).dequeue();
        });

        // select number of game in cart
        $(this).delay(400).queue(function(){
          fun_select_number_of_games_in_cart();
          $(this).dequeue();
        });
      } else {
        $('.--gog__com__navbar .menu-anonymous-header .menu-btn.menu-anonymous-header__btn--create-account').each(function(){
          $(this).click();
        });
      }
    });

    // wishlisted
    $('.js-gog-scrollbar-wrapper .js-gog-scrollbar-content .menu-product .menu-product__link .menu-product__content .menu-product__content-in .menu-cart-item__options .menu-cart-option--wishlisted').on("click", function(e){
      e.preventDefault();
    });
	});
  /* End Cart */

  // calc  .menu-main.menu-submenu:after [left: ....]
  function calc_left_css(){
    for(var num_after = 1; num_after <= $('.--gog__com__navbar .menu__container .menu-main .menu-item').length; num_after++){
      var menu_submenu_after_left = '<style>.--gog__com__navbar .menu__container .menu-main .menu-item:nth-of-type(' + num_after + ') .menu-submenu:after{left:' + ( ($('.--gog__com__navbar .menu__container .menu-main .menu-item:nth-of-type(' + num_after + ') .menu-link').innerWidth()) - 27 ) + 'px;}</style>';
      document.head.insertAdjacentHTML( 'beforeEnd', menu_submenu_after_left );
    }
  }
  calc_left_css();
  $(window).resize(function(){ calc_left_css(); });

  // stop setinterval by class
  $('.--gog__com__navbar .menu__container .menu-main .menu-item.js-menu-signin').on({
    mouseenter: function(){ $(this).removeClass('interval_is_cleared_sign_parent').find('.menu-features-slider__slide--one').addClass('--slide_is--active').end().find('.menu-features-slider__timer-section:first-of-type').addClass('is-on'); },
    mouseleave: function(){ $(this).addClass('interval_is_cleared_sign_parent').find('.menu-features-slider__slide').removeClass('--slide_is--active').end().find('.menu-features-slider__timer-section').removeClass('is-on is-done'); }
  });

  $('.--gog__com__navbar .menu-features-slider').on({
    mouseenter: function(){ $(this).addClass('interval_is_cleared_sign'); },
    mouseleave: function(){ $(this).removeClass('interval_is_cleared_sign'); }
  });

  // Start With Function sign_in_move_to_next_text [[[[[[[[[[big-screen]]]]]]]]]]
  function sign_in_move_to_next_text_big_screen(){
    if($('.--gog__com__navbar .menu__container .menu-main .menu-item.js-menu-signin').hasClass('interval_is_cleared_sign_parent')){
    } else {

      if($('.--gog__com__navbar .menu__container .menu-main .menu-item.js-menu-signin .menu-features-slider').hasClass('interval_is_cleared_sign')){
      } else {
        if( $('.menu-main .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--three').hasClass('--slide_is--active') ){
            $('.menu-main .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--one').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
            $('.menu-main .menu-features-slider .menu-features-slider__timer .menu-features-slider__timer-section').removeClass('is-on is-done');
            $('.menu-main .menu-features-slider .menu-features-slider__timer .menu-features-slider__timer-section:first-of-type').addClass('is-on');
        } else {
            $('.menu-main .menu-features-slider .--slide_is--active').next('.menu-features-slider__slide').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
            $('.menu-main .menu-features-slider .menu-features-slider__timer .is-on').removeClass('is-on').addClass('is-done').next('.menu-features-slider__timer-section').addClass('is-on');
        }
      }

    }
  }
  // click [next, prev] to next text or previous text
  $('.--gog__com__navbar .menu__container .menu-main .menu-item.js-menu-signin .menu-features-slider .menu-features-slider-icon').click(function(){
    if($(this).hasClass('menu-features-slider-next')) {
      if( $('.menu-main .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--three').hasClass('--slide_is--active') ){
        $('.menu-main .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--one').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
        $('.menu-main .menu-features-slider .menu-features-slider__timer .menu-features-slider__timer-section').removeClass('is-on is-done');
        $('.menu-main .menu-features-slider .menu-features-slider__timer .menu-features-slider__timer-section:first-of-type').addClass('is-done is-on');
      } else {
        $('.menu-main .menu-features-slider .--slide_is--active').next('.menu-features-slider__slide').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
        $('.menu-main .menu-features-slider .menu-features-slider__timer .is-on').removeClass('is-on').addClass('is-done').next('.menu-features-slider__timer-section').addClass('is-on is-done');
      }

    } else {
      if( $('.menu-main .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--one').hasClass('--slide_is--active') ){
        $('.menu-main .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--three').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
        $('.menu-main .menu-features-slider .menu-features-slider__timer .menu-features-slider__timer-section').addClass('is-on is-done');
      } else {
        $('.menu-main .menu-features-slider .--slide_is--active').prev('.menu-features-slider__slide').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
        $('.menu-main .menu-features-slider .menu-features-slider__timer .is-on').removeClass('is-on is-done').prev('.menu-features-slider__timer-section').addClass('is-on is-done');
      }
    }
  });
  // every 5s refresh function
  setInterval(sign_in_move_to_next_text_big_screen, 5000);


  // Start With Function sign_in_move_to_next_text [[[[[[[[[[small-screen]]]]]]]]]]
  function sign_in_move_to_next_text_small_screen(){
      if($('.--gog__com__navbar .menu-submenu .menu-features-slider').hasClass('interval_is_cleared_sign')){
      } else {
        if( $('.menu-tray .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--three').hasClass('--slide_is--active') ){
            $('.menu-tray .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--one').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
        } else { $('.menu-tray .menu-features-slider .--slide_is--active').next('.menu-features-slider__slide').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active'); }
      }
  }
  // click [next, prev] to next text or previous text
  $('.menu-tray .menu-lite .menu-submenu .menu-lite-anonymous .menu-features-slider .menu-features-slider-icon').click(function(){
    if($(this).hasClass('menu-features-slider-next')) {
      if( $('.menu-tray .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--three').hasClass('--slide_is--active') ){
        $('.menu-tray .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--one').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
      } else { $('.menu-tray .menu-features-slider .--slide_is--active').next('.menu-features-slider__slide').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active'); }

    } else {
      if( $('.menu-tray .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--one').hasClass('--slide_is--active') ){
        $('.menu-tray .menu-features-slider .menu-features-slider__slide.menu-features-slider__slide--three').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active');
      } else { $('.menu-tray .menu-features-slider .--slide_is--active').prev('.menu-features-slider__slide').addClass('--slide_is--active').siblings('.menu-features-slider__slide').removeClass('--slide_is--active'); }
    }
  });
  // every 5s refresh function
  setInterval(sign_in_move_to_next_text_small_screen, 5000);

  // sign in
  $('.--gog__com__navbar .menu-anonymous-header .menu-btn').click(function(){
    $('.l-loaded.l-flexible, .l-loaded.l-flexible .catalog-spinner').removeClass('ng-hide');
    $(this).delay(600).queue(function(){
      $('.l-loaded.l-flexible .catalog-spinner').addClass('ng-hide');
      $(this).dequeue();
    });
    if($(this).hasClass('menu-anonymous-header__btn--create-account')){
      $('input[name=username]').focus();
      $('.l-loaded.l-flexible .Start-playing-with-gog-create-new-account').addClass('is-active').siblings('.Start-playing-with-gog-sign-in').removeClass('is-active');
    } else {
      $('#email_signIn').focus();
      $('.l-loaded.l-flexible .Start-playing-with-gog-sign-in').addClass('is-active').siblings('.Start-playing-with-gog-create-new-account').removeClass('is-active');
    }
  });

  $('.footer__link .footer__link-another-banner').click(function(){
    if($(this).hasClass('footer__link-old-account')){
      $('.--gog__com__navbar .menu-anonymous-header .menu-btn.menu-anonymous-header__btn--sign-in').each(function(){
        $(this).click();
      });
    } else {
      $('.--gog__com__navbar .menu-anonymous-header .menu-btn.menu-anonymous-header__btn--create-account').each(function(){
        $(this).click();
      });
    }
  });

  // .GalaxyAccountsFrameContainer__overlay click[remove iframe source]
  $('.GalaxyAccountsFrameContainer__overlay, .Start-playing-with-gog-sign-in .close-login-page, .Start-playing-with-gog-create-new-account .close-login-page').click(function(){
    $('.l-loaded.l-flexible').addClass('ng-hide');
    $('.l-loaded.l-flexible .Start-playing-with-gog-sign-in, .l-loaded.l-flexible .Start-playing-with-gog-create-new-account').removeClass('is-active');
  });

  // create_new_account[[ keyup ]] validation
  $('#username_create-new-account, #email_create-new-account, #password_create-new-account').keyup(function(){
    check_if_info_already_taken($('#username_create-new-account').val(), $('#email_create-new-account').val(), $('#password_create-new-account').val(), "create-new-account");
  });
  $('#username_create-new-account').keyup(function(){ $(this).next('span').text(""); });
  $('#email_create-new-account').keyup(function(){ $(this).next('span').text(""); });
  $('#password_create-new-account').keyup(function(){ $(this).next('span').text(""); });
  // submit_button_create_new_account click
  $('#submit_button_create_new_account').click(function(e){
    // username check
    if($('#username_create-new-account').val().length == 0){ $('.username_create-new-account_conditions').text('Username required'); e.preventDefault(); }
    else if($('#username_create-new-account').val().length < 2){ $('.username_create-new-account_conditions').text('Username too short'); e.preventDefault(); }
    else if($('#username_create-new-account').val().length >= 20){ $('.username_create-new-account_conditions').text('Username too long'); e.preventDefault(); }
    else{}

    // email check
    if($('#email_create-new-account').val().length == 0){ $('.email_create-new-account_conditions').text('Email required'); e.preventDefault(); }
    else if(($('#email_create-new-account').val()).substr(-10) != "@gmail.com" || $('#email_create-new-account').val().length == 10){ $('.email_create-new-account_conditions').text('Incorrect email'); e.preventDefault(); }
    else{}

    // password check
    if($('#password_create-new-account').val().length == 0){ $('.password_create-new-account_conditions').text('Password required'); e.preventDefault(); }
    else if($('#password_create-new-account').val().length < 2){ $('.password_create-new-account_conditions').text('too short it should have 2 character or more'); e.preventDefault(); }
    else if($('#password_create-new-account').val().length >= 20){ $('.password_create-new-account_conditions').text('too long it should have 20 character or less'); e.preventDefault(); }
    else{}
  });
  /* End create account */
  /* Start sign in  */
  // sign_in[[ keyup ]] validation
  $('#email_signIn, #password_signIn').keyup(function(){
    check_if_info_already_taken("", $('#email_signIn').val(), $('#password_signIn').val(), "sign--in");
  });
  // submit on click no event if val.length == 0  [ sign_in ]
  $('#submit_button_signIn').click(function(e){
    if($('#email_signIn').val().length == 0 || $('#password_signIn').val().length == 0){
      e.preventDefault();
    }
  });
  /* end create acount */
});
// return resault of search
function search_Term_Change(input_value_changed_onkeyup_return, movies_yes){

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
      document.getElementById('menu-search__results').innerHTML = myrequest.responseText;
    }
  };

  // XMLHttpRequest [post]
  myrequest.open('POST', 'includes-php-files/static-templates/ajax_navbar/ajax_php_mysql_for_navbar.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send("input_value_changed_onkeyup_return=" + input_value_changed_onkeyup_return + "&movies_yes=" + movies_yes);
}

// search_totalGames, search_totalmovies click
function select_games_movies_only_when_click(games_movies_for_gamers_para){
  var input_search = document.getElementById('input_search');
  search_Term_Change((input_search.value).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'), games_movies_for_gamers_para);
}

// add game to cart by id
function fun_select_game_by_id_add_to_cart(select_game_by_id_add_to_cart){

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
      document.getElementById('menu-cart__products-list').innerHTML = myrequest.responseText;
    }
  };

  // XMLHttpRequest [post]
  myrequest.open('POST', 'includes-php-files/static-templates/ajax_navbar/ajax_php_mysql_for_add_to_cart.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send("select_game_by_id_add_to_cart=" + select_game_by_id_add_to_cart);
}
// remove game from cart by id
function fun_select_game_by_id_remove_from_cart(select_game_by_id_remove_from_cart){

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
      document.getElementById('menu-cart__products-list').innerHTML = myrequest.responseText;
    }
  };

  // XMLHttpRequest [post]
  myrequest.open('POST', 'includes-php-files/static-templates/ajax_navbar/ajax_php_mysql_for_remove_from_cart.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send("select_game_by_id_remove_from_cart=" + select_game_by_id_remove_from_cart);
}

// show output on store when hover on item
function fun_select_game_show_on_store(ng_type, ng_caregory_name, ng_caregory_title_inside, ng_caregory_btn_inside, ng_href){

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
      document.getElementById('menu-section-layer').innerHTML = myrequest.responseText;
    }
  };

  // XMLHttpRequest [post]
  myrequest.open('POST', 'includes-php-files/static-templates/ajax_navbar/ajax_php_mysql_for_store.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send("ng_type=" + ng_type + "&ng_caregory_name=" + ng_caregory_name + "&ng_caregory_title_inside=" + ng_caregory_title_inside + "&ng_caregory_btn_inside=" + ng_caregory_btn_inside + "&ng_href=" + ng_href);
}

// select number of games in cart
function fun_select_number_of_games_in_cart(){
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
      document.getElementById('menu-item__count--cart').innerHTML = myrequest.responseText;
    }
  };

  // XMLHttpRequest [post]
  myrequest.open('POST', 'includes-php-files/static-templates/ajax_navbar/ajax_php_mysql_for_navbar_count_games_in_cart.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send();
}

// add game to wishlist
function fun_add_game_to_wishlist(add_game_to_wishlist_by_id){
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
      document.getElementById('userWishlistedItemsCount').innerHTML = myrequest.responseText;
    }
  };

  // XMLHttpRequest [post]
  myrequest.open('POST', 'includes-php-files/static-templates/ajax_navbar/ajax_php_mysql_for_navbar_add_game_to_wishlist.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send("add_game_to_wishlist_by_id=" + add_game_to_wishlist_by_id);
}

// from sign page
function check_if_info_already_taken(username_val, email_val, password_val, input_type){

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
      if(input_type == "create-new-account"){
        document.getElementById('submit_button_create_new_account').innerHTML = myrequest.responseText;
      } else if(input_type == "sign--in") {
        document.getElementById('submit_button_signIn').innerHTML = myrequest.responseText;
      } else {}
    }
  };

  // XMLHttpRequest [post]
  myrequest.open('POST', 'http://localhost/AllYourGamesInOnePlace/gog_com/includes-php-files/static-templates/ajax_navbar/ajax_php_mysql_for_navbar_sign_IN.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send("username_val=" + username_val + "&email_val=" + email_val + "&password_val=" + password_val + "&input_type=" + input_type);
}
