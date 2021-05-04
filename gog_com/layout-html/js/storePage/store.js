$(function(){
  $("html, body").animate({ scrollTop: 0 }, "slow");
  // request from other pages in address [GET]
  $(this).delay(100).queue(function(){
    if($('.discover_games').attr('games__sort') == "NewRelease" && $('.discover_games').attr('category__games') == "Allgames" && $('.discover_games').attr('games__system') == "" && $('.discover_games').attr('games__searchText') == ""){
      $('.content.cf .container--spaced .dropdown--bottom .dropdown__layer span[sortbyoptionhere=dateAdded]').each(function(){
        $(this).click();
      });
    } else if($('.discover_games').attr('games__sort') == "onSale" && $('.discover_games').attr('category__games') == "Allgames" && $('.discover_games').attr('games__system') == "" && $('.discover_games').attr('games__searchText') == "") {
      $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.filter__item--radio .filter__item-options .option__item[pricevalue=1692200]').each(function(){
        $(this).click();
      });
    } else if($('.discover_games').attr('games__system') != "" && $('.discover_games').attr('category__games') == "Allgames" && $('.discover_games').attr('games__sort') == "" && $('.discover_games').attr('games__searchText') == "") {
      $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.system--filter__item--checkbox .filter__item-options .option__item[itemtextfilteroff='+ $('.discover_games').attr('games__system') +']').each(function(){
        $(this).click();
      });
    } else if($('.discover_games').attr('category__games') != "" && $('.discover_games').attr('games__system') == "" && $('.discover_games').attr('games__sort') == "" && $('.discover_games').attr('games__searchText') == "") {
      $('.content.cf .container--spaced .dropdown--bottom .dropdown__layer span[gamestypelist_1par='+ $('.discover_games').attr('category__games') +']').each(function(){
        $(this).click();
      });
    } else if($('.discover_games').attr('category__games') == "Allgames" && $('.discover_games').attr('games__searchText') != "" && $('.discover_games').attr('games__sort') == "" && $('.discover_games').attr('games__system') == "") {
      $('.content.cf .container--spaced .search-input-container input').val($('.discover_games').attr('games__searchText'));
      $('.content.cf .container--spaced .search-input-container input').each(function(){ $(this).keyup(); });
    } else if($('.discover_games').attr('category__games') == "movie" && $('.discover_games').attr('games__searchText') != "" && $('.discover_games').attr('games__sort') == "" && $('.discover_games').attr('games__system') == "") {
      $('.content.cf .container--spaced .dropdown--bottom .dropdown__layer span[gamestypelist_1par='+ $('.discover_games').attr('category__games') +']').each(function(){
        $(this).click();
      });
      $('.content.cf .container--spaced .search-input-container input').val($('.discover_games').attr('games__searchText'));
      $('.content.cf .container--spaced .search-input-container input').each(function(){ $(this).keyup(); });
    }else {}
    $(this).dequeue();
  });

  function reloadHeightOfGamesContent(){
    $('#for_catalog__paginator_wrapper').css('min-height', $('.container--two-columns__child--curated-collection').height());
  }
  reloadHeightOfGamesContent();
  // search
  var testIfInputChangeValue = "";
  $('.content.cf .container--spaced .search-input-container input').keyup(function(){
    if(testIfInputChangeValue == $(this).val()){
    } else {
      testIfInputChangeValue = $(this).val();
      if($(this).val().length == "0"){
        $(this).siblings('.search-button-wrapper').addClass('ng-hide');
      } else {
        $(this).siblings('.search-button-wrapper').removeClass('ng-hide');
      }

      // for request
      Store_page_custom_games_bytype(
        $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption'),
        ($(this).val()).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'),
        $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent'),
        $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr('gamestyleshow'),
        "",
        $('.catalog__search-container').attr('gamestypelist_1par'),
        $('.catalog__search-container').attr('gamestypelist_1par_parent'),
        $('.filter__item.filter__item--radio').attr('customprice'),
        $('.system--filter__item--checkbox').attr('customsystem'),
        $('.featrues--filter__item--checkbox').attr('customfeatrues'),
        $('.language--filter__item--checkbox').attr('customlanguage'),
        $('.DLCs--filter__item--checkbox').attr('customdlcs')
      );

      // refresh
      // .product-tile_for---all--place--games
      $(this).delay(1000).queue(function(){
        reloadHeightOfGamesContent();
        $('.product-tile_for---all--place--games').on({
          mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
          mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
        });
        // add to cart
        addToCartMoreTimes();
        // stop animation loading
        $('.catalog-spinner').addClass('ng-hide');
        pageIndicatorAndArrowClick();
        $(this).dequeue();
      });
    }
  });

  // input value is empty on click clear button
  $('.content.cf .container--spaced .search-input-container .search-button-wrapper').click(function(){
    if($(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){/*nothing*/}
    else{
      $(this).siblings('input').val("");
      $(this).addClass('ng-hide');
      $(this).siblings('input').focus();

      // for request
      Store_page_custom_games_bytype(
        $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption'),
        "",
        $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent'),
        $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr("gamestyleshow"),
        "",
        $('.catalog__search-container').attr('gamestypelist_1par'),
        $('.catalog__search-container').attr('gamestypelist_1par_parent'),
        $('.filter__item.filter__item--radio').attr('customprice'),
        $('.system--filter__item--checkbox').attr('customsystem'),
        $('.featrues--filter__item--checkbox').attr('customfeatrues'),
        $('.language--filter__item--checkbox').attr('customlanguage'),
        $('.DLCs--filter__item--checkbox').attr('customdlcs')
      );

      // refresh
      // .product-tile_for---all--place--games
      $(this).delay(1000).queue(function(){
        reloadHeightOfGamesContent();
        $('.product-tile_for---all--place--games').on({
          mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
          mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
        });
        // add to cart
        addToCartMoreTimes();
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

  // .product-tile_for---all--place--games
  $('.product-tile_for---all--place--games').on({
    mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
    mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
  });

  // add to cart
  function addToCartMoreTimes(){
    $('.content.cf .product-state__price-btn:not(.product-state__browse_deal)').on("click", function(e){
      e.preventDefault();
      if($(this).hasClass('tba_owned_prevent_action_add_to_cart') || $(this).hasClass('game_added_to_cart_successfuly')){}
      else{
        // add game to cart from [store, search]
        fun_select_game_by_id_add_to_cart($(this).attr('ng-game-movies-id'));

        $('.content.cf .product-state__price-btn[ng-game-movies-id='+ $(this).attr('ng-game-movies-id') +']').addClass('game_added_to_cart_successfuly');

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
  }
  addToCartMoreTimes();

  //tabbed-section__head now-on-sale__title js-head
  $('.tabbed-section__head .tabs-wrapper .tabbed-section__tab').on("click", function(){
    if($(this).hasClass('tabbed-section__tab--active') || $(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){/*nothing*/}
    else{
      $(this).parent('.tabs-wrapper.tabs-wrapper--inverted').siblings('.tabs-wrapper.tabs-wrapper--select').find('.tabs-wrapper--select--vis').text($(this).text());
      $(this).addClass('tabbed-section__tab--active').siblings('.tabbed-section__tab').removeClass('tabbed-section__tab--active');
      $(this).parent('.tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent', $(this).attr('bigThingyBanner'));

      // when click {onsale} hide price
      if($(this).attr('bigthingybanner') == "onSale"){
        $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.filter__item--radio').addClass('ng-hide');
        $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.filter__item--radio .filter__header .filter__clear-wrapper').each(function(){
          $(this).click();
        });
      } else {
        $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.filter__item--radio').removeClass('ng-hide');
      }

      // for request
      Store_page_custom_games_bytype(
        $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption'),
        ($('.content.cf .container--spaced .search-input-container input').val()).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'),
        $(this).attr('bigThingyBanner'),
        $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr("gamestyleshow"),
        "",
        $('.catalog__search-container').attr('gamestypelist_1par'),
        $('.catalog__search-container').attr('gamestypelist_1par_parent'),
        $('.filter__item.filter__item--radio').attr('customprice'),
        $('.system--filter__item--checkbox').attr('customsystem'),
        $('.featrues--filter__item--checkbox').attr('customfeatrues'),
        $('.language--filter__item--checkbox').attr('customlanguage'),
        $('.DLCs--filter__item--checkbox').attr('customdlcs')
      );

      // refresh
      // .product-tile_for---all--place--games
      $(this).delay(1000).queue(function(){
        reloadHeightOfGamesContent();
        $('.product-tile_for---all--place--games').on({
          mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
          mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
        });
        // add to cart
        addToCartMoreTimes();
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

  // in small screen
  $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--select').on("click", function(){
    $(this).siblings('.tabs-wrapper').toggleClass('tabs-wrapper--shift-breakpoint-1');
  });
  $('.tabbed-section__head').on('mouseleave', function(){
    $(this).find('.tabs-wrapper.tabs-wrapper--inverted').addClass('tabs-wrapper--shift-breakpoint-1')
  });

  // select type of games next to [search] show
  $('.content.cf .container--spaced .dropdown--bottom .dropdown__trigger').click(function(){
    $(this).parent('.dropdown--bottom').toggleClass('dropdown--bottom--is--open');
  });

  // select type of games next to [search] hide
  $('.content.cf .container--spaced .dropdown--bottom').on("mouseleave", function(){
    $(this).removeClass('dropdown--bottom--is--open');
  });

  // select type of games next to [search] select from it
  $('.content.cf .container--spaced .dropdown--bottom .dropdown__layer span').on("click", function(){
    if($(this).hasClass('search-dropdown-item---selected') || $(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){
    } else {
      $(this).addClass('search-dropdown-item---selected').find('svg.sort-dropdown__icon-full').removeClass('ng-hide').end().find('svg.sort-dropdown__icon-empty').addClass('ng-hide');
      $(this).parents('.dropdown__layer').siblings('.dropdown__trigger').find('.selected-category').text($(this).find('.search-dropdown-text').text());
      // remove selected class
      $(this).siblings('span').removeClass('search-dropdown-item---selected').find('svg.sort-dropdown__icon-full').addClass('ng-hide');
      $(this).siblings('span').find('svg.sort-dropdown__icon-empty').removeClass('ng-hide');
      // After click hide dropdown__layer
      $(this).parents('.dropdown--bottom').removeClass('dropdown--bottom--is--open');

      // [catalog__search-container] for attributes selected to show
      if($(this).parents('.catalog__search-container').hasClass('container--spaced--for_test')){
        $(this).parents('.catalog__search-container').attr({GamesTypeList_1Par_Parent:$(this).attr('GamesTypeList_1Par_Parent'), GamesTypeList_1Par:$(this).attr('GamesTypeList_1Par')});

        // when click on [movies-of-gamers] hide [system, dlcs, featrues]
        if($(this).attr('gamestypelist_1par_parent') == "movies_for_gamers"){
          $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.DLCs--filter__item--checkbox, .content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.featrues--filter__item--checkbox, .content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.system--filter__item--checkbox').addClass('ng-hide');
          $(this).siblings('span:not(:first-child)').addClass('ng-hide');
          $(this).siblings('span:first-child').addClass('movies_for_gamers_isActived');
        } else if($(this).hasClass('movies_for_gamers_isActived')) {
          $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.DLCs--filter__item--checkbox, .content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.featrues--filter__item--checkbox, .content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.system--filter__item--checkbox').removeClass('ng-hide');
          $(this).siblings('span:not(:first-child)').removeClass('ng-hide');
        }

        // same thing in two option
        if($(this).attr('gamestypelist_1par_parent') == "movies_for_gamers" || $(this).hasClass('movies_for_gamers_isActived')){
          // removeClass [movies_for_gamers_isActived] from allgames
          if($(this).hasClass('movies_for_gamers_isActived')){ $(this).removeClass('movies_for_gamers_isActived'); }
          $('.content.cf .discover_games').removeClass('filters_off');
          $('.tabbed-section__head .section-title_inside .filters-status').each(function(){
            $(this).click();
          });
          $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.filter__item--radio').removeClass('ng-hide');
          // for [bigthingybanner]
          $('.tabbed-section__head .tabs-wrapper .tabbed-section__tab[bigthingybanner=everything]').addClass('tabbed-section__tab--active').siblings('div').removeClass('tabbed-section__tab--active');

          // for [sortby]
          $('.content.cf .dropdown--bottom .dropdown__layer .search-dropdown-content .search-dropdown-item[sortbyoptionhere=bestselling]').addClass('search-dropdown-item---selected').find('svg.sort-dropdown__icon-full').removeClass('ng-hide').end().find('svg.sort-dropdown__icon-empty').addClass('ng-hide');
          $('.content.cf .dropdown--bottom .dropdown__layer .search-dropdown-content .search-dropdown-item[sortbyoptionhere=bestselling]').siblings('span').removeClass('search-dropdown-item---selected').find('svg.sort-dropdown__icon-full').addClass('ng-hide');
          $('.content.cf .dropdown--bottom .dropdown__layer .search-dropdown-content .search-dropdown-item[sortbyoptionhere=bestselling]').siblings('span').find('svg.sort-dropdown__icon-empty').removeClass('ng-hide');
          $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__sort-by .dropdown__trigger .selected-category').text('bestselling');

          // for [showStyle]
          $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn-grid').each(function(){
            $(this).click();
          });

          // for [input]
          $('.content.cf .container--spaced .search-input-container input').val("");
          $('.content.cf .container--spaced .search-input-container .search-button-wrapper').addClass('ng-hide');

          // loadingDone
          $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item .filter__item-options .option__item').attr('loadingdone', "");

          // make value of attributes "empty"
          $('.filter__item.filter__item--radio').attr('customprice', "");
          $('.system--filter__item--checkbox').attr('customsystem', "");
          $('.featrues--filter__item--checkbox').attr('customfeatrues', "");
          $('.language--filter__item--checkbox').attr('customlanguage', "");
          $('.DLCs--filter__item--checkbox').attr('customdlcs', "");
          $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent', "everything");
          $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption', "bestselling");
          $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr('gamestyleshow', "Default");
          $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item').removeClass("filters_options_off");
          $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item .ShowWhenFilterOff').html("");
        }
      } else {
        // for sortbyoption
        $(this).parents('.catalog__sort-by-trigger-container').attr({sortbyoption:$(this).attr('SortByOptionHere')});
      }

      // function
      Store_page_custom_games_bytype(
        $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption'),
        ($('.content.cf .container--spaced .search-input-container input').val()).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'),
        $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent'),
        $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr('gamestyleshow'),
        "",
        $('.catalog__search-container').attr('gamestypelist_1par'),
        $('.catalog__search-container').attr('gamestypelist_1par_parent'),
        $('.filter__item.filter__item--radio').attr('customprice'),
        $('.system--filter__item--checkbox').attr('customsystem'),
        $('.featrues--filter__item--checkbox').attr('customfeatrues'),
        $('.language--filter__item--checkbox').attr('customlanguage'),
        $('.DLCs--filter__item--checkbox').attr('customdlcs')
      );

      // refresh
      // .product-tile_for---all--place--games
      $(this).delay(1000).queue(function(){
        reloadHeightOfGamesContent();
        $('.product-tile_for---all--place--games').on({
          mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
          mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
        });
        // add to cart
        addToCartMoreTimes();
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

  // discover_games[show games in list]
  $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg').click(function(){
    $(this).addClass('view-switch-btn--active').siblings('svg').removeClass('view-switch-btn--active');
    if($(this).hasClass('view-switch-btn-list')){
      $('.discover_games').addClass('showGamesInlist')
                          .find('.container--two-columns__child--discover-games .product-tile_for---all--place--games.product-tile--games--list').removeClass('ng-hide').end()
                          .find('.container--two-columns__child--discover-games .product-tile_for---all--place--games:not(.product-tile--games--list)').addClass('ng-hide');
    } else {
      $('.discover_games').removeClass('showGamesInlist')
                          .find('.container--two-columns__child--discover-games .product-tile_for---all--place--games.product-tile--games--list').addClass('ng-hide').end()
                          .find('.container--two-columns__child--discover-games .product-tile_for---all--place--games:not(.product-tile--games--list)').removeClass('ng-hide');
    }
  });

  // discover_games [hide-filters]
  $('.tabbed-section__head .section-title_inside .section-title__icon-wrapper, .tabbed-section__head .section-title_inside .section-title__title-wrapper').click(function(){
    $('.tabbed-section__head .section-title_inside').toggleClass('hideFilters');
    $('.discover_games').toggleClass('filters_off');
  });

  // filter header[on-off]
  $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item .filter__header .filter__toggle').click(function(){
    $(this).parents('.curated-collection-section').toggleClass('filters_options_off');
    reloadHeightOfGamesContent();
  });

  // choose from filters
  var countNumberOfFilterChecked = 0;
  var radioJustOneAdd = 0;
  //radio
  $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.filter__item--radio .filter__item-options .option__item').click(function(){
    if($(this).hasClass('option__item---active') || $(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){
    } else {
      $(this).addClass('option__item---active').find('svg.sort-dropdown__icon-full').removeClass('ng-hide').end().find('svg.sort-dropdown__icon-empty').addClass('ng-hide');
      $(this).siblings('.option__item').removeClass('option__item---active').find('svg.sort-dropdown__icon-full').addClass('ng-hide').end().find('svg.sort-dropdown__icon-empty').removeClass('ng-hide');
      $(this).parents('.curated-collection-section').find('.filter__clear-wrapper').removeClass('ng-hide');
      $(this).parents('.curated-collection-section').find('.filter__header .filter__toggle').addClass('lessOneOptionItemChecked');

      // add 1 to big filter parent
      if(radioJustOneAdd == 0){
        countNumberOfFilterChecked += 1;
        $('.tabbed-section__head .filters-status').removeClass('ng-hide').find('span').text('('+ countNumberOfFilterChecked +')');
      }
      radioJustOneAdd = 1;
      // function
      $(this).parents('.filter__item.filter__item--radio').attr('customprice', $(this).attr('priceValue'));
      $(this).parent('.filter__item-options').siblings('.ShowWhenFilterOff').text($(this).attr('itemTextFilterOff'));
      Store_page_custom_games_bytype(
        $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption'),
        ($('.content.cf .container--spaced .search-input-container input').val()).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'),
        $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent'),
        $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr("gamestyleshow"),
        $(this).attr('loadingDone'),
        $('.catalog__search-container').attr('gamestypelist_1par'),
        $('.catalog__search-container').attr('gamestypelist_1par_parent'),
        $(this).parents('.filter__item.filter__item--radio').attr('customprice'),
        $('.system--filter__item--checkbox').attr('customsystem'),
        $('.featrues--filter__item--checkbox').attr('customfeatrues'),
        $('.language--filter__item--checkbox').attr('customlanguage'),
        $('.DLCs--filter__item--checkbox').attr('customdlcs')
      );

      // for loading
      $(this).attr('loadingDone', 'Done');
      // refresh
      // .product-tile_for---all--place--games
      $(this).delay(1000).queue(function(){
        reloadHeightOfGamesContent();
        $('.product-tile_for---all--place--games').on({
          mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
          mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
        });
        // add to cart
        addToCartMoreTimes();
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
  // checkbox
  $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item.filter__item--checkbox .filter__item-options .option__item').click(function(){
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
  function forAllFiltersExceptPrice(classNameOfParent, attrValueItemsSon, attrValueParent, staticSystemPN, staticSystemVP, staticFeaturesPN, staticFeaturesVP, staticLanguagePN, staticLanguageVP, staticDLCsPN, staticDLCsVP){
    var customValueOfSystemCollection = [];
    var customValueOfFilterOff = [];
    $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item'+ classNameOfParent +' .filter__item-options .option__item').click(function(){
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

          // minuse 1
          countNumberOfFilterChecked -= 1;
        } else {
          // customValueOfSystemCollection
          customValueOfSystemCollection.push($(this).attr(attrValueItemsSon));

          // customValueOfFilterOff
          customValueOfFilterOff.push($(this).attr('itemTextFilterOff') + " ");

          // add 1
          countNumberOfFilterChecked += 1;
        }

        // add 1 to big filter parent
        $('.tabbed-section__head .filters-status').removeClass('ng-hide').find('span').text('('+ countNumberOfFilterChecked +')');
        if(countNumberOfFilterChecked == 0){
          radioJustOneAdd = 0;
          $('.tabbed-section__head .filters-status').addClass('ng-hide').find('span').text('('+ countNumberOfFilterChecked +')');
        }
        $(this).parent('.filter__item-options').siblings('.ShowWhenFilterOff').text(customValueOfFilterOff);
        $(this).parents(classNameOfParent).attr(attrValueParent, customValueOfSystemCollection);
        Store_page_custom_games_bytype(
          $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption'),
          ($('.content.cf .container--spaced .search-input-container input').val()).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'),
          $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent'),
          $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr("gamestyleshow"),
          $(this).attr('loadingDone'),
          $('.catalog__search-container').attr('gamestypelist_1par'),
          $('.catalog__search-container').attr('gamestypelist_1par_parent'),
          $('.filter__item.filter__item--radio').attr('customprice'),
          $(staticSystemPN).attr(staticSystemVP),
          $(staticFeaturesPN).attr(staticFeaturesVP),
          $(staticLanguagePN).attr(staticLanguageVP),
          $(staticDLCsPN).attr(staticDLCsVP)
        );

        // for loading
        $(this).attr('loadingDone', 'Done');
        // refresh
        // .product-tile_for---all--place--games
        $(this).delay(1000).queue(function(){
          reloadHeightOfGamesContent();
          $('.product-tile_for---all--place--games').on({
            mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
            mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
          });
          // add to cart
          addToCartMoreTimes();
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
  // [system]
  forAllFiltersExceptPrice('.system--filter__item--checkbox', 'systemvalue', 'customsystem', '.system--filter__item--checkbox', 'customsystem', '.featrues--filter__item--checkbox', 'customfeatrues', '.language--filter__item--checkbox', 'customlanguage', '.DLCs--filter__item--checkbox', 'customdlcs');
  // [featrues]
  forAllFiltersExceptPrice('.featrues--filter__item--checkbox', 'featruesvalue', 'customfeatrues', '.system--filter__item--checkbox', 'customsystem', '.featrues--filter__item--checkbox', 'customfeatrues', '.language--filter__item--checkbox', 'customlanguage', '.DLCs--filter__item--checkbox', 'customdlcs');
  // [Language]
  forAllFiltersExceptPrice('.language--filter__item--checkbox', 'languagevalue', 'customlanguage', '.system--filter__item--checkbox', 'customsystem', '.featrues--filter__item--checkbox', 'customfeatrues', '.language--filter__item--checkbox', 'customlanguage', '.DLCs--filter__item--checkbox', 'customdlcs');
  // [DLCs]customdlcs
  forAllFiltersExceptPrice('.DLCs--filter__item--checkbox', 'dlcsvalue', 'customdlcs', '.system--filter__item--checkbox', 'customsystem', '.featrues--filter__item--checkbox', 'customfeatrues', '.language--filter__item--checkbox', 'customlanguage', '.DLCs--filter__item--checkbox', 'customdlcs');

  // remove all filter
  $('.content.cf .discover_games .tabbed-section .container--two-columns__child--curated-collection .filter__item .filter__header .filter__clear-wrapper').click(function(){
    if($(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){
    } else {
      $(this).parent('.filter__header').siblings('.filter__item-options').find('span').removeClass('option__item---active');
      $(this).parent('.filter__header').siblings('.filter__item-options').find('span .sort-dropdown__icon-full').addClass('ng-hide');
      $(this).parent('.filter__header').siblings('.filter__item-options').find('span .sort-dropdown__icon-empty').removeClass('ng-hide');
      $(this).addClass('ng-hide');
      $(this).siblings('.filter__toggle').removeClass('lessOneOptionItemChecked');
      $(this).parent('.filter__header').siblings('.ShowWhenFilterOff').text("");

      countNumberOfFilterChecked = $('.container--two-columns__child--curated-collection').find('.option__item.option__item---active').length;
      // add 1 to big filter parent
      $('.tabbed-section__head .filters-status').removeClass('ng-hide').find('span').text('('+ countNumberOfFilterChecked +')');
      if(countNumberOfFilterChecked == 0){
        radioJustOneAdd = 0;
        $('.tabbed-section__head .filters-status').addClass('ng-hide').find('span').text('('+ countNumberOfFilterChecked +')');
      }

      // request for database
      if($(this).parents('.filter__item').hasClass('filter__item--radio')){
        $(this).parents('.filter__item.filter__item--radio').attr('CustomPrice', "");
        radioJustOneAdd = 0;
      }
      /* [system] */
      else if($(this).parents('.filter__item').hasClass('system--filter__item--checkbox')){
        $(this).parents('.filter__item.system--filter__item--checkbox').attr('CustomSystem', "");
      }
      /* [featrues] */
      else if($(this).parents('.filter__item').hasClass('featrues--filter__item--checkbox')){
        $(this).parents('.filter__item.featrues--filter__item--checkbox').attr('CustomFeatrues', "");
      }
      /* [Language] */
      else if($(this).parents('.filter__item').hasClass('language--filter__item--checkbox')){
        $(this).parents('.filter__item.language--filter__item--checkbox').attr('CustomLanguage', "");
      }
      /* [DLCs] */
      else if($(this).parents('.filter__item').hasClass('DLCs--filter__item--checkbox')){
        $(this).parents('.filter__item.DLCs--filter__item--checkbox').attr('CustomDLCs', "");
      }

      Store_page_custom_games_bytype(
        $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption'),
        ($('.content.cf .container--spaced .search-input-container input').val()).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'),
        $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent'),
        $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr("gamestyleshow"),
        "",
        $('.catalog__search-container').attr('gamestypelist_1par'),
        $('.catalog__search-container').attr('gamestypelist_1par_parent'),
        $('.filter__item.filter__item--radio').attr('customprice'),
        $('.system--filter__item--checkbox').attr('customsystem'),
        $('.featrues--filter__item--checkbox').attr('customfeatrues'),
        $('.language--filter__item--checkbox').attr('customlanguage'),
        $('.DLCs--filter__item--checkbox').attr('customdlcs')
      );

      $(this).delay(1000).queue(function(){
        reloadHeightOfGamesContent();
        $('.product-tile_for---all--place--games').on({
          mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
          mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
        });
        // add to cart
        addToCartMoreTimes();
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

  // grant clear filter
  $('.tabbed-section__head .section-title_inside .filters-status').on('click',function(){
    if($(this).parents('.content.cf').hasClass('PleaseWait1SecondForLoading')){
    } else {
      $('.container--two-columns__child--curated-collection').find('span').removeClass('option__item---active');
      $('.container--two-columns__child--curated-collection').find('span .sort-dropdown__icon-full').addClass('ng-hide');
      $('.container--two-columns__child--curated-collection').find('span .sort-dropdown__icon-empty').removeClass('ng-hide');
      $('.container--two-columns__child--curated-collection').find('.filter__clear-wrapper').addClass('ng-hide');

      $('.container--two-columns__child--curated-collection').find('.filter__toggle').removeClass('lessOneOptionItemChecked');
      $('.container--two-columns__child--curated-collection').find('.ShowWhenFilterOff').text("");

      countNumberOfFilterChecked = 0;
      radioJustOneAdd = 0;
      $('.tabbed-section__head .filters-status').addClass('ng-hide').find('span').text('('+ countNumberOfFilterChecked +')');

      $('.filter__item.filter__item--radio').attr('CustomPrice', "");
      $('.filter__item.system--filter__item--checkbox').attr('CustomSystem', "");
      $('.filter__item.featrues--filter__item--checkbox').attr('CustomFeatrues', "");
      $('.filter__item.language--filter__item--checkbox').attr('CustomLanguage', "");
      $('.filter__item.DLCs--filter__item--checkbox').attr('CustomDLCs', "");

      Store_page_custom_games_bytype(
        $('.container--spaced .catalog__sort-by-trigger-container').attr('sortbyoption'),
        ($('.content.cf .container--spaced .search-input-container input').val()).replace(/&/g, 'A.N.D').replace(/'/g, 'S.Q.U'),
        $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--inverted').attr('bigThingyBannerParent'),
        $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr("gamestyleshow"),
        "",
        $('.catalog__search-container').attr('gamestypelist_1par'),
        $('.catalog__search-container').attr('gamestypelist_1par_parent'),
        $('.filter__item.filter__item--radio').attr('customprice'),
        $('.system--filter__item--checkbox').attr('customsystem'),
        $('.featrues--filter__item--checkbox').attr('customfeatrues'),
        $('.language--filter__item--checkbox').attr('customlanguage'),
        $('.DLCs--filter__item--checkbox').attr('customdlcs')
      );

      $(this).delay(1000).queue(function(){
        reloadHeightOfGamesContent();
        $('.product-tile_for---all--place--games').on({
          mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
          mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
        });
        // add to cart
        addToCartMoreTimes();
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
  })

  function pageIndicatorAndArrowClick(){
    // page indicator [items]
    $('.content.cf .discover_games .tabbed-section .catalog__paginator-wrapper .catalog__paginator .paginator-container .page-indicator').click(function(){
      //window.scrollTo(0, 0);
      if($(this).hasClass('Dots_bettween_f-l') || $(this).hasClass('page-indicator--active')){
      } else {
        //window.scrollTo(0, 0);
        //$(window).scrollTop(0);
        $("html, body").animate({ scrollTop: 0 }, "cubic-bezier(0.42, 0, 0.58, 1)");
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
        catalog__paginator_and_wrapper($('.ReturnGamesIdForWrapper').text(), $(this).attr('ng-item-index'), $('.tabbed-section__head .catalog__sort-by-trigger-container .catalog__view-switch svg.view-switch-btn--active').attr("gamestyleshow"), $(this).attr('noloading'));
        $(this).attr('noloading', "Done");
        // refresh
        // .product-tile_for---all--place--games
        $(this).delay(1000).queue(function(){
          reloadHeightOfGamesContent();
          $('.product-tile_for---all--place--games').on({
            mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
            mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
          });
          // add to cart
          addToCartMoreTimes();
          // stop animation loading
          $('.catalog-spinner').addClass('ng-hide');
          $(this).dequeue();
        });
      }
    });

    // page indicator [arrow-wrapper]
    $('.content.cf .discover_games .tabbed-section .catalog__paginator-wrapper .catalog__paginator .paginator-container .arrow-wrapper').click(function(){
      if($(this).hasClass('arrow-wrapper--right')){
        $('.content.cf .discover_games .tabbed-section .catalog__paginator-wrapper .catalog__paginator .paginator-container .page-indicator.page-indicator--active').each(function(){
          $(this).next().click();
        });
      } else {
        $('.content.cf .discover_games .tabbed-section .catalog__paginator-wrapper .catalog__paginator .paginator-container .page-indicator.page-indicator--active').each(function(){
          $(this).prev().click();
        });
      }
    });
  }
  pageIndicatorAndArrowClick();

});
// return resault of search
function Store_page_custom_games_bytype(SortByOption, textInSearch, bigThingyBannerParent, GameStyleShow, loadingDone, GamesTypeList_1Par, GamesTypeList_1Par_Parent, CustomPrice, CustomSystem, CustomFeatrues, CustomLanguage, CustomDLCs){

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
      document.getElementById('AllResault_AnyFilters').innerHTML = myrequest.responseText;
    }
  };

  // XMLHttpRequest [post]
  myrequest.open('POST', 'includes-php-files/static-templates/ajax_store/ajax_php_mysql_for_storePage.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send("SortByOption=" + SortByOption + "&textInSearch=" + textInSearch + "&bigThingyBannerParent=" + bigThingyBannerParent + "&GameStyleShow=" + GameStyleShow + "&loadingDone=" + loadingDone + "&GamesTypeList_1Par=" + GamesTypeList_1Par + "&GamesTypeList_1Par_Parent=" + GamesTypeList_1Par_Parent + "&CustomPrice=" + CustomPrice + "&CustomSystem=" + CustomSystem + "&CustomFeatrues=" + CustomFeatrues + "&CustomLanguage=" + CustomLanguage + "&CustomDLCs=" + CustomDLCs);
}

// return resault of search
function catalog__paginator_and_wrapper(ReturnGamesIdForWrapper, ngItemIndex, GameStyleShow, noloading){

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
  myrequest.open('POST', 'includes-php-files/static-templates/ajax_store/ajax_php_mysql_for_storePageWrapper.php', true);
  myrequest.setRequestHeader("content-type" ,"application/x-www-form-urlencoded");
  myrequest.send("ReturnGamesIdForWrapper=" + ReturnGamesIdForWrapper + "&ngItemIndex=" + ngItemIndex + "&GameStyleShow=" + GameStyleShow + "&noloading=" + noloading);
}
