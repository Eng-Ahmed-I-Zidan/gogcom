$(function(){

  $('.big-spot-height.big-spots-container .big-spot:nth-of-type(4)').addClass('item-is-active').prev('.big-spot').addClass('item-is-previous').end().next('.big-spot').addClass('item-is-next');
  $('.big-spot-height.big-spots-container .big-spot__carousel-pages-container span:first-of-type').addClass('glide__bullet--active').nextAll('span').addClass('glide__bullet--next').end().prevAll('span').addClass('glide__bullet--previous');

  // stop interval function infinite
  $('.big-spot-height.big-spots-container').on({
    mouseenter: function(){ $(this).addClass('stop_setInterval_work_infinite'); },
    mouseleave: function(){ $(this).removeClass('stop_setInterval_work_infinite'); }
  });

  // setInterval function
  function next_game_spot_setInterval(){
    if($('.big-spot-height').hasClass('stop_setInterval_work_infinite')){}
    else{ $('.big-spot-height .big-spots-wrapper .glide .big-spots__arrows .big-spots__arrow-wrapper.big-spots__arrow-wrapper--right').each(function(){ $(this).click(); }); }
  }
  next_game_spot_setInterval();
  setInterval(next_game_spot_setInterval, 4000);

  // big-spots__arrow-wrapper
  var big_spot_height_clicked_num = 0;
  var width = 0;
  // big-spot [width]
  function big_spot_resize_window(){
    if($(document).outerWidth() < 1160 && $(document).outerWidth() > 680){ width = ($('.big-spots-container.big-spot-height').outerWidth() - 40); $('.big-spot-height.big-spots-container .big-spot').css('width', width); }
    else if($(document).outerWidth() <= 680){ width = ($('.big-spots-container.big-spot-height').outerWidth() - 20); $('.big-spot-height.big-spots-container .big-spot').css('width', width); }
    else { width = '1096px'; $('.big-spot-height.big-spots-container .big-spot').css('width', width); }
  }
  big_spot_resize_window();
  $(window).resize(function(){ $('.big-spot-height.big-spots-container *').css('transition', 'none'); big_spot_resize_window(); });

  // glide__slides [width]
  var spot___width = 0;
  function glide__slides_resize_window(){
    if($(document).outerWidth() < 1160 && $(document).outerWidth() > 680){
      spot___width = ($('.big-spots-container.big-spot-height').outerWidth() - 40) + 16;
      $('.big-spot-height.big-spots-container .big-spots-wrapper').css({ 'width': (spot___width * 3) });
      $('.big-spot-height.big-spots-container .big-spots-wrapper .glide .glide__track .glide__slides').css({'width': ($('.big-spot-height.big-spots-container .big-spot').length) * (spot___width), 'transform': 'translateX('+ (-(spot___width * 2) - (spot___width * big_spot_height_clicked_num)) +'px)'});
    } else if($(document).outerWidth() <= 680){
      spot___width = ($('.big-spots-container.big-spot-height').outerWidth() - 20) + 16;
      $('.big-spot-height.big-spots-container .big-spots-wrapper').css({ 'width': (spot___width * 3) });
      $('.big-spot-height.big-spots-container .big-spots-wrapper .glide .glide__track .glide__slides').css({'width': ($('.big-spot-height.big-spots-container .big-spot').length) * (spot___width), 'transform': 'translateX('+ (-(spot___width * 2) - (spot___width * big_spot_height_clicked_num)) +'px)'});
    } else {
      spot___width = '3336px';
      $('.big-spot-height.big-spots-container .big-spots-wrapper').css({ 'width': spot___width });
      $('.big-spot-height.big-spots-container .big-spots-wrapper .glide .glide__track .glide__slides').css({'width': ($('.big-spot-height.big-spots-container .big-spot').length) * (1096 + 16), 'transform': 'translateX('+ (-((1096 + 16) * 2) - ((1096 + 16) * big_spot_height_clicked_num)) +'px)'});
    }
  }
  glide__slides_resize_window();
  $(window).resize(function(){ $('.big-spot-height.big-spots-container *').css('transition', 'none'); glide__slides_resize_window(); });

  /* start with big carousel [big-spot] */
  $('.big-spot-height .big-spots-wrapper .slide-hover').on({
    mouseenter: function(){
      if($(this).hasClass('slide-hover--left')){
        $('.big-spot-height .big-spot.item-is-previous').addClass('item-is-previous-next-opacity-1');
        $(this).siblings('.glide').find('.glide__track .glide__slides').css({'transform': 'translateX('+ ( -(big_spot_height_clicked_num * $(this).siblings('.glide').find('.glide__track .glide__slides .big-spot').outerWidth(true)) - 2224 + 30) +'px)', 'transition': 'all 0.2s cubic-bezier(0.6, 0.16, 0.36, 0.94) 0s'});
      }
      else if($(this).hasClass('slide-hover--right')){
        $('.big-spot-height .big-spot.item-is-next').addClass('item-is-previous-next-opacity-1');
        $(this).siblings('.glide').find('.glide__track .glide__slides').css({'transform': 'translateX('+ ( -(big_spot_height_clicked_num * $(this).siblings('.glide').find('.glide__track .glide__slides .big-spot').outerWidth(true)) - 2224 - 30) +'px)', 'transition': 'all 0.2s cubic-bezier(0.6, 0.16, 0.36, 0.94) 0s'});
      }
    },
    mouseleave: function(){
      $('.big-spot-height .big-spot').removeClass('item-is-previous-next-opacity-1');
      $(this).siblings('.glide').find('.glide__track .glide__slides').css({'transform': 'translateX('+ ( -(big_spot_height_clicked_num * $(this).siblings('.glide').find('.glide__track .glide__slides .big-spot').outerWidth(true)) - 2224) +'px)', 'transition': 'all 0.2s cubic-bezier(0.6, 0.16, 0.36, 0.94) 0s'});
    }
  });
  // big-spots__arrow-wrapper
  $('.big-spot-height .big-spots-wrapper .glide .big-spots__arrows .big-spots__arrow-wrapper').on("click", function(){
    if($(this).hasClass('big-spots__arrow-wrapper--right') && !$('.big-spot-height').hasClass('stop_click_to_finish_prev_opearation')){

      // big-spot glide__slide--last one
      if($('.big-spot-height .glide__slides .big-spot.glide__slide--last').hasClass('item-is-active')){
        $(this).delay(250).queue(function(){
          big_spot_height_clicked_num = 0;
          $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides, .big-spot').css({'transition': 'none'});

          $('.big-spot-height .big-spot').removeClass('item-is-active item-is-previous item-is-next');
          $('.big-spot-height .big-spot:nth-of-type(4)').addClass('item-is-active').prev('.big-spot').addClass('item-is-previous').end().next('.big-spot').addClass('item-is-next');

          // transform: translateX(value)
          $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides').css({'transform': 'translateX('+ ( -(big_spot_height_clicked_num * $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true)) - (($(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true) * 2)) ) +'px)'});
          $(this).dequeue();
        });
      }

      big_spot_height_clicked_num+=1;
      $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides, .big-spot').css({'transition': 'all .3s cubic-bezier(.6,.16,.36,.94)'});

      // [item-is-active] to next
      $('.big-spot-height .big-spot.item-is-active').removeClass('item-is-active').addClass('item-is-previous').prev('.big-spot').removeClass('item-is-previous').end().next('.big-spot').removeClass('item-is-next').addClass('item-is-active').next('.big-spot').addClass('item-is-next');

      // transform: translateX(value)
      $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides').css({'transform': 'translateX('+ ( -(big_spot_height_clicked_num * $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true)) - (($(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true) * 2)) ) +'px)'});

      // big-spot__carousel-pages-container
      if($('.big-spot-height .big-spot__carousel-pages-container span:last-of-type').hasClass('glide__bullet--active')){
        $('.big-spot-height .big-spot__carousel-pages-container span').removeClass('glide__bullet--active glide__bullet--next glide__bullet--previous');
        $('.big-spot-height .big-spot__carousel-pages-container span:first-of-type').addClass('glide__bullet--active').nextAll('span').addClass('glide__bullet--next').end().prevAll('span').addClass('glide__bullet--previous');
      } else {
        $('.big-spot-height .big-spot__carousel-pages-container span.glide__bullet--active').removeClass('glide__bullet--active').next('span').addClass('glide__bullet--active').removeClass('glide__bullet--next').nextAll('span').addClass('glide__bullet--next').end().prevAll('span').addClass('glide__bullet--previous');
      }

      // to next click wait 250 milli second for [transition]
      $(this).delay(600).queue(function(){
        $('.big-spot-height').removeClass('stop_click_to_finish_prev_opearation');
        $(this).dequeue();
      });

    } else if($(this).hasClass('big-spots__arrow-wrapper--left') && !$('.big-spot-height').hasClass('stop_click_to_finish_prev_opearation')) {

      // big-spot glide__slide--first one
      if($('.big-spot-height .glide__slides .big-spot.glide__slide--first').hasClass('item-is-active')){
        $(this).delay(250).queue(function(){
          big_spot_height_clicked_num = parseInt(($(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').length) - 6 - 1);
          $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides, .big-spot').css({'transition': 'none'});

          $('.big-spot-height .big-spot').removeClass('item-is-active item-is-previous item-is-next');
          $('.big-spot-height .big-spot:nth-of-type('+ parseInt(($(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').length) - 3) +')').addClass('item-is-active').prev('.big-spot').addClass('item-is-previous').end().next('.big-spot').addClass('item-is-next');

          // transform: translateX(value)
          $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides').css({'transform': 'translateX('+ ( -(big_spot_height_clicked_num * $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true)) - (($(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true) * 2)) ) +'px)'});
          $(this).dequeue();
        });
      }

      big_spot_height_clicked_num-=1;
      $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides, .big-spot').css({'transition': 'all .3s cubic-bezier(.6,.16,.36,.94)'});

      // [item-is-active] to next
      $('.big-spot-height .big-spot.item-is-active').removeClass('item-is-active').addClass('item-is-next').next('.big-spot').removeClass('item-is-next').end().prev('.big-spot').removeClass('item-is-previous').addClass('item-is-active').prev('.big-spot').addClass('item-is-previous');

      // transform: translateX(value)
      $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides').css({'transform': 'translateX('+ ( -(big_spot_height_clicked_num * $(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true)) - (($(this).parent('.big-spots__arrows').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true) * 2)) ) +'px)'});

      // big-spot__carousel-pages-container
      if($('.big-spot-height .big-spot__carousel-pages-container span:first-of-type').hasClass('glide__bullet--active')){
        $('.big-spot-height .big-spot__carousel-pages-container span').removeClass('glide__bullet--active glide__bullet--next glide__bullet--previous');
        $('.big-spot-height .big-spot__carousel-pages-container span:last-of-type').addClass('glide__bullet--active').nextAll('span').addClass('glide__bullet--next').end().prevAll('span').addClass('glide__bullet--previous');
      } else {
        $('.big-spot-height .big-spot__carousel-pages-container span.glide__bullet--active').removeClass('glide__bullet--active').prev('span').addClass('glide__bullet--active').removeClass('glide__bullet--previous').prevAll('span').addClass('glide__bullet--previous').end().nextAll('span').addClass('glide__bullet--next');
      }

      // to next click wait 250 milli second for [transition]
      $(this).delay(600).queue(function(){
        $('.big-spot-height').removeClass('stop_click_to_finish_prev_opearation');
        $(this).dequeue();
      });

    }
    $('.big-spot-height').addClass('stop_click_to_finish_prev_opearation');
  });
  // slide-hover
  $('.big-spot-height .big-spots-wrapper .slide-hover').on("click", function(){
    if($(this).hasClass('slide-hover--right') && !$('.big-spot-height').hasClass('stop_click_to_finish_prev_opearation')){ $('.big-spot-height .big-spots-wrapper .glide .big-spots__arrows .big-spots__arrow-wrapper.big-spots__arrow-wrapper--right').each(function(){ $(this).click(); }); }
    else if($(this).hasClass('slide-hover--left') && !$('.big-spot-height').hasClass('stop_click_to_finish_prev_opearation')) { $('.big-spot-height .big-spots-wrapper .glide .big-spots__arrows .big-spots__arrow-wrapper.big-spots__arrow-wrapper--left').each(function(){ $(this).click(); }); }
  });
  // big-spot__carousel-pages-container
  $('.big-spot-height .big-spot__carousel-pages-container span').click(function(){
    // transform
    big_spot_height_clicked_num = parseInt($(this).attr('js-page-position'));
    $(this).parent('.big-spot__carousel-pages-container').siblings('.glide__track').find('.glide__slides, .big-spot').css({'transition': 'all .3s cubic-bezier(.6,.16,.36,.94)'});
    $(this).parent('.big-spot__carousel-pages-container').siblings('.glide__track').find('.glide__slides').css({'transform': 'translateX('+ ( -(big_spot_height_clicked_num * $(this).parent('.big-spot__carousel-pages-container').siblings('.glide__track').find('.glide__slides .big-spot').outerWidth(true)) - ((($('.big-spot-height.big-spots-container .glide__slides .big-spot').outerWidth(true)) * 2)) ) +'px)'});

    // .big-spot__carousel-pages-container [span]
    $('.big-spot-height .big-spot__carousel-pages-container span').removeClass('glide__bullet--active glide__bullet--next glide__bullet--previous');
    $(this).addClass('glide__bullet--active').nextAll('span').addClass('glide__bullet--next').end().prevAll('span').addClass('glide__bullet--previous');

    // [item-is-active] to next
    $('.big-spot-height .big-spot').removeClass('item-is-active item-is-previous item-is-next')
    $('.big-spot-height .big-spot:nth-of-type('+ (parseInt($(this).attr('js-page-position')) + 3 + 1) +')').addClass('item-is-active').prev('.big-spot').addClass('item-is-previous').end().next('.big-spot').addClass('item-is-next');

  });

  // add to cart
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

  // click on offer
  $('.giveaway-banner .giveaway-banner__content .giveaway-banner__button').on("click", function(e){
    e.preventDefault();
    if($(this).parents('.giveaway-banner').hasClass('user_realy_in_gog_enjoy')){
      $('.giveaway-banner .giveaway-banner__content > div').addClass('ng-hide').parent('.giveaway-banner__content').siblings('.giveaway-banner__success').removeClass('ng-hide');
    } else {
      $('.--gog__com__navbar .menu-anonymous-header .menu-btn.menu-anonymous-header__btn--create-account').each(function(){
        $(this).click();
      });
    }
  });

  // deadline game offer [giveaway-banner__countdown]
  function decrease_time_offer(end_date_of_offer_date, remove_parent_div_if_date_end, element_fetch_return_data_to_page, data_is_printed_type){
    // end Date
    var end_date_of_offer = new Date(end_date_of_offer_date);
    // Date now
    var current_date_now  = new Date();
    var last_current_date_now  = new Date(current_date_now.getFullYear(), current_date_now.getMonth() + 1, 0).getDate();
    var date_hour = 0;
    var second_date = 0;
    var minute_date = 0;
    var loop_last_day_multi_months = 0;

    if(!(end_date_of_offer < current_date_now)){
    /**/
      if(current_date_now.getMinutes() > end_date_of_offer.getMinutes()){
      /**/

        // if deadline end in next month of current month
        if(end_date_of_offer.getMonth() - current_date_now.getMonth() == 1){
          date_hour = (((last_current_date_now - current_date_now.getDate()) + end_date_of_offer.getDate()) * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours()) - 1;

        // if deadline end in afew months of current month
        } else if((end_date_of_offer.getMonth() - current_date_now.getMonth() > 1) && (end_date_of_offer.getMonth() - current_date_now.getMonth() <= 11)) {
          // loop calc new of day for months
          for(var t = current_date_now.getMonth(); t < end_date_of_offer.getMonth(); t++){
            loop_last_day_multi_months = new Date(current_date_now.getFullYear(), t + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }
          date_hour -= current_date_now.getDate();
          date_hour += end_date_of_offer.getDate();
          date_hour = (date_hour * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours()) - 1;

        // if deadline end in next year of current year
        } else if(end_date_of_offer.getMonth() - current_date_now.getMonth() < 0){
          // loop calc new of day for months [current year]
          for(var q = current_date_now.getMonth(); q <= 11; q++){
            loop_last_day_multi_months = new Date(current_date_now.getFullYear(), q + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }

          // loop calc new of day for months [new year]
          for(var e = 0; e < end_date_of_offer.getMonth(); e++){
            loop_last_day_multi_months = new Date(end_date_of_offer.getFullYear(), e + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }
          date_hour -= current_date_now.getDate();
          date_hour += end_date_of_offer.getDate();
          date_hour = (date_hour * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours()) - 1;

        // if deadline end in current month
        } else {
          date_hour = ((end_date_of_offer.getDate() - current_date_now.getDate()) * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours()) - 1;
        }

        minute_date = 60 - (current_date_now.getMinutes() - end_date_of_offer.getMinutes());

        if(date_hour == 0 && minute_date == 0){ second_date = end_date_of_offer.getSeconds() - current_date_now.getSeconds(); }
        else { second_date = 59 - current_date_now.getSeconds(); }

      /**/
      } else {
      /**/

        // if deadline end in next month of current month
        if(end_date_of_offer.getMonth() - current_date_now.getMonth() == 1){
          date_hour = (((last_current_date_now - current_date_now.getDate()) + end_date_of_offer.getDate()) * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours());

        // if deadline end in afew months of current month
        } else if((end_date_of_offer.getMonth() - current_date_now.getMonth() > 1) && (end_date_of_offer.getMonth() - current_date_now.getMonth() <= 11)) {
          // loop calc new of day for months
          for(var t = current_date_now.getMonth(); t < end_date_of_offer.getMonth(); t++){
            loop_last_day_multi_months = new Date(current_date_now.getFullYear(), t + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }
          date_hour -= current_date_now.getDate();
          date_hour += end_date_of_offer.getDate();
          date_hour = (date_hour * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours());

        // if deadline end in next year of current year
        } else if(end_date_of_offer.getMonth() - current_date_now.getMonth() < 0){
          // loop calc new of day for months [current year]
          for(var q = current_date_now.getMonth(); q <= 11; q++){
            loop_last_day_multi_months = new Date(current_date_now.getFullYear(), q + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }

          // loop calc new of day for months [new year]
          for(var e = 0; e < end_date_of_offer.getMonth(); e++){
            loop_last_day_multi_months = new Date(end_date_of_offer.getFullYear(), e + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }
          date_hour -= current_date_now.getDate();
          date_hour += end_date_of_offer.getDate();
          date_hour = (date_hour * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours());

        // if deadline end in current month
        } else {
          date_hour = ((end_date_of_offer.getDate() - current_date_now.getDate()) * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours());
        }

        minute_date = -(current_date_now.getMinutes() - end_date_of_offer.getMinutes());

        if(date_hour == 0 && minute_date == 0){ second_date = end_date_of_offer.getSeconds() - current_date_now.getSeconds(); }
        else { second_date = 59 - current_date_now.getSeconds(); }
      /**/
      }

      if(date_hour < 10){ date_hour = "0" + date_hour; }
      if(minute_date < 10){ minute_date = "0" + minute_date; }
      if(second_date < 10){ second_date = "0" + second_date; }

    /**/
    } else {
      $(remove_parent_div_if_date_end).remove();
    }

    if(data_is_printed_type == '0:0:0' || Math.floor(date_hour / 24) == 0){
      // resault [hour - minute - second]
      $(element_fetch_return_data_to_page).text(date_hour + "H : " + minute_date + "M : " + second_date + "S left");

    } else {
      // resault [day - hour - minute - second]
      $(element_fetch_return_data_to_page).text((Math.floor(date_hour / 24)) + "D : " + (date_hour % 24) + "H : " + minute_date + "M : " + second_date + "S left");
    }

  }

  // to run function [decrease_time_offer] without parameter in setInterval
  function run_decrease_time_offer_without_parameter(){ decrease_time_offer('5 29 2021 20:44:59', '.giveaway-banner', '.giveaway-banner .giveaway-banner__content .giveaway-banner__text .giveaway-banner__countdown', '0:0:0'); }
  run_decrease_time_offer_without_parameter();
  // refresh function every second
  setInterval(run_decrease_time_offer_without_parameter, 1000);

  // .product-tile_for---all--place--games
  $('.product-tile_for---all--place--games').on({
    mouseenter: function(){ $(this).addClass('product-tile_for---all--place--games--active'); },
    mouseleave: function(){ $(this).removeClass('product-tile_for---all--place--games--active'); }
  });

  // .galaxy-section-wrapper
  $('.galaxy-section-wrapper .galaxy-section-info .galaxy-tooltip-wrapper').on({
    mouseenter: function(){
      $(this).find('.dropdown__layer').addClass('dropdowm--is--open').end().siblings('.galaxy-tooltip-wrapper').find('.dropdown__layer').removeClass('dropdowm--is--open');
      $('.galaxy-section-wrapper .explore-galaxy .galaxy-tooltip-wrapper').find('.dropdown__layer').removeClass('dropdowm--is--open');
    }
  });
  $('.galaxy-section-wrapper .explore-galaxy .galaxy-tooltip-wrapper').on({
    mouseenter: function(){
      $(this).find('.dropdown__layer').addClass('dropdowm--is--open');
      $('.galaxy-section-wrapper .galaxy-section-info .galaxy-tooltip-wrapper').find('.dropdown__layer').removeClass('dropdowm--is--open');
    }
  });
  $('.galaxy-section-wrapper .galaxy-section').on({
    mouseleave: function(){ $(this).find('.dropdown__layer').removeClass('dropdowm--is--open'); }
  });

  /* Start With now_on_sale */

    //tabbed-section__head now-on-sale__title js-head
    $('.tabbed-section__head .tabs-wrapper .tabbed-section__tab').on("click", function(){
      if($(this).hasClass('tabbed-section__tab--active')){/*nothing*/}
      else{
        $(this).parent('.tabs-wrapper.tabs-wrapper--inverted').siblings('.tabs-wrapper.tabs-wrapper--select').find('.tabs-wrapper--select--vis').text($(this).text());
        $(this).parents('.tabbed-section__head').siblings('.tab-products--tabbed-section').removeClass('now-on-sale__tab-products--visible').siblings('.tab-products--tabbed-section[big-thingy-banner='+ $(this).attr('big-thingy-banner') +']').addClass('now-on-sale__tab-products--visible').find('.dots-wrapper').removeClass('ng-hide');
        $(this).addClass('tabbed-section__tab--active').siblings('.tabbed-section__tab').removeClass('tabbed-section__tab--active');
        $(this).delay(3000).queue(function(){
          $(this).parents('.tabbed-section__head').siblings('.tab-products--tabbed-section[big-thingy-banner='+ $(this).attr('big-thingy-banner') +']').find('.dots-wrapper').addClass('ng-hide-dot-wrapper');
          $(this).dequeue();
        });
      }
    });

    // in small screen
    $('.tabbed-section__head .tabs-wrapper.tabs-wrapper--select').on("click", function(){
      $(this).siblings('.tabs-wrapper').toggleClass('tabs-wrapper--shift-breakpoint-1');
    });
    $('.tabbed-section__head').on('mouseleave', function(){
      $(this).find('.tabs-wrapper.tabs-wrapper--inverted').addClass('tabs-wrapper--shift-breakpoint-1')
    });

    // js-items-wrapper [big-thingy-banner="Featured_deals"]
    var now_on_sale__width_Featured_deals = 0;
    var now_on_sale__width_Headup = 0;
    var now_on_sale__width_Weekly_Sale = 0;
    var now_on_sale__width_Bethesda = 0;

    var now_on_sale__width_staff_pics = 0;
    var now_on_sale__width_whats_good = 0;
    var now_on_sale__width_news = 0;
    function js_item_wrapper_now_on_sale(){
      if($(document).outerWidth() < 1000 && ($(document).outerWidth() > 760)){
        now_on_sale__width_Featured_deals = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="Featured_deals"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 4) - 1) * (25 - 8));
        now_on_sale__width_Headup = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="Headup"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 4) - 1) * (25 - 8));
        now_on_sale__width_Weekly_Sale = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="Weekly_Sale"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 4) - 1) * (25 - 8));
        now_on_sale__width_Bethesda = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="Bethesda"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 4) - 1) * (25 - 8));
      } else if(($(document).outerWidth() <= 760)){
        now_on_sale__width_Featured_deals = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="Featured_deals"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 2) - 1) * (25 - 8));
        now_on_sale__width_Headup = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="Headup"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 2) - 1) * (25 - 8));
        now_on_sale__width_Weekly_Sale = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="Weekly_Sale"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 2) - 1) * (25 - 8));
        now_on_sale__width_Bethesda = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="Bethesda"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 2) - 1) * (25 - 8));
      } else {
        now_on_sale__width_Featured_deals = 0;
        now_on_sale__width_Headup = 0;
        now_on_sale__width_Weekly_Sale = 0;
        now_on_sale__width_Bethesda = 0;
      }

      now_on_sale__width_staff_pics = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="staff_pics"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 1) - 1) * (25 - 8));
      now_on_sale__width_whats_good = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="whats_good"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length) / 1) - 1) * (25 - 8));
      now_on_sale__width_news = ((Math.ceil(($('.tab-products--tabbed-section[big-thingy-banner="news"] .js-items-wrapper .tab-products--tab-collection .js-item-news.carousel__item-news').length) / 1) - 1) * (25 - 8));
      // js-items-wrapper [big-thingy-banner="Featured_deals"]
      $('.tab-products--tabbed-section[big-thingy-banner="Featured_deals"] .js-items-wrapper .tab-products--tab-collection').css('width', (
        (
          ($('.tab-products--tabbed-section[big-thingy-banner="Featured_deals"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').outerWidth(true))
          *
          ($('.tab-products--tabbed-section[big-thingy-banner="Featured_deals"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length)
        )
        +
        now_on_sale__width_Featured_deals
       )
      );

      // js-items-wrapper [big-thingy-banner="Headup"]
      $('.tab-products--tabbed-section[big-thingy-banner="Headup"] .js-items-wrapper .tab-products--tab-collection').css('width', (
        (
          ($('.tab-products--tabbed-section[big-thingy-banner="Headup"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').outerWidth(true))
          *
          ($('.tab-products--tabbed-section[big-thingy-banner="Headup"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length)
        )
        +
        now_on_sale__width_Headup
       )
      );

      // js-items-wrapper [big-thingy-banner="Weekly_Sale"]
      $('.tab-products--tabbed-section[big-thingy-banner="Weekly_Sale"] .js-items-wrapper .tab-products--tab-collection').css('width', (
        (
          ($('.tab-products--tabbed-section[big-thingy-banner="Weekly_Sale"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').outerWidth(true))
          *
          ($('.tab-products--tabbed-section[big-thingy-banner="Weekly_Sale"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length)
        )
        +
        now_on_sale__width_Weekly_Sale
       )
      );

      // js-items-wrapper [big-thingy-banner="Bethesda"]
      $('.tab-products--tabbed-section[big-thingy-banner="Bethesda"] .js-items-wrapper .tab-products--tab-collection').css('width', (
        (
          ($('.tab-products--tabbed-section[big-thingy-banner="Bethesda"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').outerWidth(true))
          *
          ($('.tab-products--tabbed-section[big-thingy-banner="Bethesda"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length)
        )
        +
        now_on_sale__width_Bethesda
       )
      );

      // staff_pics
      $('.tab-products--tabbed-section[big-thingy-banner="staff_pics"] .js-items-wrapper .tab-products--tab-collection').css('width', (
        (
          ($('.tab-products--tabbed-section[big-thingy-banner="staff_pics"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').outerWidth(true))
          *
          ($('.tab-products--tabbed-section[big-thingy-banner="staff_pics"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length)
        )
        +
        now_on_sale__width_staff_pics
       )
      );

      // whats_good
      $('.tab-products--tabbed-section[big-thingy-banner="whats_good"] .js-items-wrapper .tab-products--tab-collection').css('width', (
        (
          ($('.tab-products--tabbed-section[big-thingy-banner="whats_good"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').outerWidth(true))
          *
          ($('.tab-products--tabbed-section[big-thingy-banner="whats_good"] .js-items-wrapper .tab-products--tab-collection .js-item.carousel__item').length)
        )
        +
        now_on_sale__width_whats_good
       )
      );

      // news
      $('.tab-products--tabbed-section[big-thingy-banner="news"] .js-items-wrapper .tab-products--tab-collection').css('width', (
        (
          ($('.tab-products--tabbed-section[big-thingy-banner="news"] .js-items-wrapper .tab-products--tab-collection .js-item-news.carousel__item-news').outerWidth(true))
          *
          ($('.tab-products--tabbed-section[big-thingy-banner="news"] .js-items-wrapper .tab-products--tab-collection .js-item-news.carousel__item-news').length)
        )
        +
        now_on_sale__width_news
       )
      );

    }
    js_item_wrapper_now_on_sale();
    // resize window
    $(window).resize(function(){ js_item_wrapper_now_on_sale(); });

    // .carousel-pagination.big-arrows [carousel__nav]
    function carousel__nav__games_transform(parent_node){
      var numberOfClicked = 0;
      // .carousel-pagination.big-arrows [carousel-pagination__page]
      $(parent_node + ' .carousel .carousel-pagination.big-arrows .carousel-pagination__page').on("click", function(){
        numberOfClicked = parseInt($(this).attr('carousel-pagination__page_number'));
        $(this).parent('.carousel-pagination.big-arrows').siblings('._gog-module-slider__items-container').find('.tab-products--tab-collection').css('transform', 'translateX(' + -(numberOfClicked * ($(this).parents('.js--tabbed-section--for-transform').innerWidth() + 24)) + 'px)');
        $(this).addClass('is---active').siblings('.tab-products--tabbed-section .carousel .carousel-pagination .carousel-pagination__page').removeClass('is---active');
      });
      // .carousel-pagination.big-arrows [carousel__nav]
      $(parent_node + ' .carousel .carousel-pagination.big-arrows .carousel__nav').on("click", function(){
        var numberOfGamesInOneTab = parseInt($(this).parents('.js--tabbed-section--for-transform').attr('numberofgamesinonetab'));
        if(parent_node == ".Featured_deals" || parent_node == ".Headup" || parent_node == ".Weekly_Sale" || parent_node == ".Bethesda"){
          if($(document).outerWidth() <= 760){ numberOfGamesInOneTab = 2; }
        }
        var numberOfGameTabsEnd = Math.ceil((($(this).parent('.carousel-pagination.big-arrows').siblings('._gog-module-slider__items-container').find('.js-item.carousel__item').length) + ($(this).parent('.carousel-pagination.big-arrows').siblings('._gog-module-slider__items-container').find('.tab-products--tab-collection--one-tab').length) + ($(this).parent('.carousel-pagination.big-arrows').siblings('._gog-module-slider__items-container').find('.js-item-news.carousel__item-news').length)) / numberOfGamesInOneTab) - 1;
        // carousel__nav--right
        if($(this).hasClass('carousel__nav--right')){
          // back to first
          if(numberOfClicked >= numberOfGameTabsEnd){
            numberOfClicked = 0;
            $(this).parent('.carousel-pagination.big-arrows').siblings('._gog-module-slider__items-container').find('.tab-products--tab-collection').css('transform', 'translateX(0)');
            $(this).siblings('.carousel-pagination__page.is---active').removeClass('is---active').siblings('.carousel-pagination__page:first-of-type').addClass('is---active');
          // to next games
          } else {
            numberOfClicked+=1;
            $(this).parent('.carousel-pagination.big-arrows').siblings('._gog-module-slider__items-container').find('.tab-products--tab-collection').css('transform', 'translateX(' + -(numberOfClicked * ($(this).parents('.js--tabbed-section--for-transform').innerWidth() + 24)) + 'px)');
            $(this).siblings('.carousel-pagination__page.is---active').removeClass('is---active').next('.carousel-pagination__page').addClass('is---active');
          }

        // carousel__nav--left
        } else {
          // go to end
          if(numberOfClicked == 0){
            numberOfClicked = numberOfGameTabsEnd;
            $(this).parent('.carousel-pagination.big-arrows').siblings('._gog-module-slider__items-container').find('.tab-products--tab-collection').css('transform', 'translateX(' + -(numberOfClicked * ($(this).parents('.js--tabbed-section--for-transform').innerWidth() + 24)) + 'px)');
            $(this).siblings('.carousel-pagination__page.is---active').removeClass('is---active').siblings('.carousel-pagination__page:nth-of-type('+ (numberOfClicked + 1) +')').addClass('is---active');
          // to prev games
          } else {
            numberOfClicked-=1;
            $(this).parent('.carousel-pagination.big-arrows').siblings('._gog-module-slider__items-container').find('.tab-products--tab-collection').css('transform', 'translateX(' + -(numberOfClicked * ($(this).parents('.js--tabbed-section--for-transform').innerWidth() + 24)) + 'px)');
            $(this).siblings('.carousel-pagination__page.is---active').removeClass('is---active').prev('.carousel-pagination__page').addClass('is---active');
          }
        }
      });
    }
    carousel__nav__games_transform('.Featured_deals'); //Featured_deals
    carousel__nav__games_transform('.Headup'); // Headup
    carousel__nav__games_transform('.Weekly_Sale'); // Weekly_Sale
    carousel__nav__games_transform('.Bethesda'); // Bethesda
    carousel__nav__games_transform('.staff_pics'); // staff_pics
    carousel__nav__games_transform('.whats_good'); // whats_good
    carousel__nav__games_transform('.news'); // whats_good

    // function on resize to transform
    function resize_transform(resize_parent_transform){
      var numberOfClickedResize = parseInt($(resize_parent_transform + ' .carousel .carousel-pagination .carousel-pagination__page.is---active').attr('carousel-pagination__page_number'));
      if(resize_parent_transform == ".Featured_deals" || resize_parent_transform == ".Headup" || resize_parent_transform == ".Weekly_Sale" || resize_parent_transform == ".Bethesda"){
        $(resize_parent_transform + ' .tab-products--tab-collection').css({'transform': 'translateX(' + -(numberOfClickedResize * ($(resize_parent_transform).parents('.js--tabbed-section--for-transform').innerWidth() + 24)) + 'px)'});
      } else {
        $(resize_parent_transform + ' .tab-products--tab-collection').css({'transform': 'translateX(' + -(numberOfClickedResize * ($(resize_parent_transform).innerWidth() + 24)) + 'px)'});
      }
    }
    $(window).resize(function(){
      resize_transform('.Featured_deals'); //Featured_deals
      resize_transform('.Headup'); // Headup
      resize_transform('.Weekly_Sale'); // Weekly_Sale
      resize_transform('.Bethesda'); // Bethesda
      resize_transform('.staff_pics'); // staff_pics
      resize_transform('.whats_good'); // whats_good
      resize_transform('.news'); // whats_good
    });

    // to run function [decrease_time_offer] without parameter in setInterval
    function NOW_ON_SALE_DEALS_DEADLINE_Headup(){ decrease_time_offer('5 27 2021 13:30:59', '.tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item.carousel__item[big-thingy-banner--offer=Headup]', '.tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item.carousel__item[big-thingy-banner--offer=Headup] .now-on-sale__banner .big-thingy .big-thingy__bottom-wrapper .giveaway-banner__countdown', '0:0:0:0'); }
    NOW_ON_SALE_DEALS_DEADLINE_Headup();
    // refresh function every second
    setInterval(NOW_ON_SALE_DEALS_DEADLINE_Headup, 1000);

    // to run function [decrease_time_offer] without parameter in setInterval
    function NOW_ON_SALE_DEALS_DEADLINE_Bethesda(){ decrease_time_offer('5 1 2021 21:45:59', '.tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item.carousel__item[big-thingy-banner--offer=Bethesda]', '.tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item.carousel__item[big-thingy-banner--offer=Bethesda] .now-on-sale__banner .big-thingy .big-thingy__bottom-wrapper .giveaway-banner__countdown', '0:0:0:0'); }
    NOW_ON_SALE_DEALS_DEADLINE_Bethesda();
    // refresh function every second
    setInterval(NOW_ON_SALE_DEALS_DEADLINE_Bethesda, 1000);

    // to run function [decrease_time_offer] without parameter in setInterval
    function NOW_ON_SALE_DEALS_DEADLINE_Weekly_Sale(){ decrease_time_offer('5 28 2021 01:01:59', '.tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item.carousel__item[big-thingy-banner--offer="Weekly_Sale"]', '.tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item.carousel__item[big-thingy-banner--offer="Weekly_Sale"] .now-on-sale__banner .big-thingy .big-thingy__bottom-wrapper .giveaway-banner__countdown', '0:0:0:0'); }
    NOW_ON_SALE_DEALS_DEADLINE_Weekly_Sale();
    // refresh function every second
    setInterval(NOW_ON_SALE_DEALS_DEADLINE_Weekly_Sale, 1000);

  /* End With now_on_sale */

  // time from start showing to now [news]
  function calc_time_showing_news(start_showing_game_date, remove_date_if_start_not_come, element_fetch_return_data_to_page){
    // end Date
    var end_date_of_offer = new Date();
    // Date now
    var current_date_now  = new Date(start_showing_game_date);
    var last_current_date_now  = new Date(current_date_now.getFullYear(), current_date_now.getMonth() + 1, 0).getDate();
    var date_hour = 0;
    var second_date = 0;
    var minute_date = 0;
    var loop_last_day_multi_months = 0;

    if(!(end_date_of_offer < current_date_now)){
    /**/
      if(current_date_now.getMinutes() > end_date_of_offer.getMinutes()){
      /**/

        // if deadline end in next month of current month
        if(end_date_of_offer.getMonth() - current_date_now.getMonth() == 1){
          date_hour = (((last_current_date_now - current_date_now.getDate()) + end_date_of_offer.getDate()) * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours()) - 1;

        // if deadline end in afew months of current month
        } else if((end_date_of_offer.getMonth() - current_date_now.getMonth() > 1) && (end_date_of_offer.getMonth() - current_date_now.getMonth() <= 11)) {
          // loop calc new of day for months
          for(var t = current_date_now.getMonth(); t < end_date_of_offer.getMonth(); t++){
            loop_last_day_multi_months = new Date(current_date_now.getFullYear(), t + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }
          date_hour -= current_date_now.getDate();
          date_hour += end_date_of_offer.getDate();
          date_hour = (date_hour * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours()) - 1;

        // if deadline end in next year of current year
        } else if(end_date_of_offer.getMonth() - current_date_now.getMonth() < 0){
          // loop calc new of day for months [current year]
          for(var q = current_date_now.getMonth(); q <= 11; q++){
            loop_last_day_multi_months = new Date(current_date_now.getFullYear(), q + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }

          // loop calc new of day for months [new year]
          for(var e = 0; e < end_date_of_offer.getMonth(); e++){
            loop_last_day_multi_months = new Date(end_date_of_offer.getFullYear(), e + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }
          date_hour -= current_date_now.getDate();
          date_hour += end_date_of_offer.getDate();
          date_hour = (date_hour * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours()) - 1;

        // if deadline end in current month
        } else {
          date_hour = ((end_date_of_offer.getDate() - current_date_now.getDate()) * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours()) - 1;
        }

        minute_date = 60 - (current_date_now.getMinutes() - end_date_of_offer.getMinutes());

        second_date = end_date_of_offer.getSeconds();

      /**/
      } else {
      /**/

        // if deadline end in next month of current month
        if(end_date_of_offer.getMonth() - current_date_now.getMonth() == 1){
          date_hour = (((last_current_date_now - current_date_now.getDate()) + end_date_of_offer.getDate()) * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours());

        // if deadline end in afew months of current month
        } else if((end_date_of_offer.getMonth() - current_date_now.getMonth() > 1) && (end_date_of_offer.getMonth() - current_date_now.getMonth() <= 11)) {
          // loop calc new of day for months
          for(var t = current_date_now.getMonth(); t < end_date_of_offer.getMonth(); t++){
            loop_last_day_multi_months = new Date(current_date_now.getFullYear(), t + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }
          date_hour -= current_date_now.getDate();
          date_hour += end_date_of_offer.getDate();
          date_hour = (date_hour * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours());

        // if deadline end in next year of current year
        } else if(end_date_of_offer.getMonth() - current_date_now.getMonth() < 0){
          // loop calc new of day for months [current year]
          for(var q = current_date_now.getMonth(); q <= 11; q++){
            loop_last_day_multi_months = new Date(current_date_now.getFullYear(), q + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }

          // loop calc new of day for months [new year]
          for(var e = 0; e < end_date_of_offer.getMonth(); e++){
            loop_last_day_multi_months = new Date(end_date_of_offer.getFullYear(), e + 1, 0).getDate();
            date_hour += loop_last_day_multi_months;
          }
          date_hour -= current_date_now.getDate();
          date_hour += end_date_of_offer.getDate();
          date_hour = (date_hour * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours());

        // if deadline end in current month
        } else {
          date_hour = ((end_date_of_offer.getDate() - current_date_now.getDate()) * 24) - (24 - end_date_of_offer.getHours()) + (24 - current_date_now.getHours());
        }

        minute_date = -(current_date_now.getMinutes() - end_date_of_offer.getMinutes());

        second_date = end_date_of_offer.getSeconds();

      /**/
      }
    /**/
    } else {
      $(remove_date_if_start_not_come).remove();
    }

    if(date_hour == 0 && minute_date <= 5 && minute_date >= 0 && Math.floor(date_hour / 24) == 0){ $(element_fetch_return_data_to_page).text("Just now"); }
    else if(date_hour == 0 && minute_date <= 15 && minute_date >= 6 && Math.floor(date_hour / 24) == 0){ $(element_fetch_return_data_to_page).text("Afew Minutes ago"); }
    else if(date_hour == 0 && minute_date >= 16 && Math.floor(date_hour / 24) == 0){ $(element_fetch_return_data_to_page).text(minute_date + " Minutes ago"); }
    else if(date_hour > 0 && Math.floor(date_hour / 24) == 0){ $(element_fetch_return_data_to_page).text(date_hour + " Hours ago"); }
    else if(Math.floor(date_hour / 24) > 0 && Math.floor(date_hour / 24) < 7){ $(element_fetch_return_data_to_page).text(Math.floor(date_hour / 24) + " Days ago"); }
    else if(Math.floor(date_hour / 24) >= 7 && Math.floor(date_hour / 24) < 30){
      if(Math.floor(date_hour / 24) == 7){ $(element_fetch_return_data_to_page).text("1 Weeks ago"); }
      else if(Math.floor(date_hour / 24) == 14){ $(element_fetch_return_data_to_page).text("2 Weeks ago"); }
      else if(Math.floor(date_hour / 24) == 21){ $(element_fetch_return_data_to_page).text("3 Weeks ago"); }
      else if(Math.floor(date_hour / 24) == 28){ $(element_fetch_return_data_to_page).text("4 Weeks ago"); }
      else{ $(element_fetch_return_data_to_page).text(Math.floor(date_hour / 24) + " Days ago"); }
    }
    else if(Math.floor(date_hour / 24) >= 30){ $(element_fetch_return_data_to_page).text(Math.floor((Math.floor(date_hour / 24)) / 30) + " Month ago"); }
    else{ $(element_fetch_return_data_to_page).text(date_hour + " Hours ago"); }

  }

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-1-1="1-1"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_1_1(){ calc_time_showing_news('10 30 2020 22:08:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-1-1="1-1"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-1-1="1-1"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_1_1();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_1_1, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-1-2="1-2"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_1_2(){ calc_time_showing_news('12 1 2020 23:05:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-1-2="1-2"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-1-2="1-2"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_1_2();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_1_2, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-1-3="1-3"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_1_3(){ calc_time_showing_news('12 1 2020 21:59:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-1-3="1-3"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-1-3="1-3"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_1_3();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_1_3, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-2-1="2-1"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_2_1(){ calc_time_showing_news('12 1 2020 18:42:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-2-1="2-1"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-2-1="2-1"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_2_1();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_2_1, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-2-2="2-2"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_2_2(){ calc_time_showing_news('12 1 2020 5:42:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-2-2="2-2"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-2-2="2-2"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_2_2();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_2_2, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-2-3="2-3"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_2_3(){ calc_time_showing_news('12 1 2020 9:50:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-2-3="2-3"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-2-3="2-3"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_2_3();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_2_3, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-2-4="2-4"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_2_4(){ calc_time_showing_news('12 1 2020 15:10:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-2-4="2-4"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-2-4="2-4"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_2_4();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_2_4, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-3-1="3-1"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_3_1(){ calc_time_showing_news('11 27 2020 18:42:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-3-1="3-1"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-3-1="3-1"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_3_1();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_3_1, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-3-2="3-2"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_3_2(){ calc_time_showing_news('11 29 2020 5:42:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-3-2="3-2"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-3-2="3-2"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_3_2();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_3_2, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-3-3="3-3"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_3_3(){ calc_time_showing_news('11 25 2020 9:50:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-3-3="3-3"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-3-3="3-3"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_3_3();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_3_3, 1000);

  // to run function [calc_time_showing_news] without parameter in setInterval [ng-banner-3-4="3-4"]
  function NEWS_TIME_SHOWING_IN_WEBSITE_3_4(){ calc_time_showing_news('11 21 2020 15:10:00', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-3-4="3-4"] .news-tile .news-tile__time-wrapper', '.news .tab-products--tabbed-section .carousel .tab-products--tab-collection .js-item-news.carousel__item-news .news-tile-wrapper[ng-banner-3-4="3-4"] .news-tile .news-tile__time-wrapper'); }
  NEWS_TIME_SHOWING_IN_WEBSITE_3_4();
  // refresh function every second
  setInterval(NEWS_TIME_SHOWING_IN_WEBSITE_3_4, 1000);
});
