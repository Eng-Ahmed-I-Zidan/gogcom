<?php
  /*
    * months name [can use ( substr(string, first, end) )] months
    [01] January
    [02] February
    [03] March
    [04] April
    [05] May
    [06] June
    [07] July
    [08] August
    [09] Septemper
    [10] October
    [11] November
    [12] December
  */

  /*
    * substr(string, first, end)
    * strlen(string)
  */

  /*
    operating system in games page
    * empty [When Column Is Empty]
    * disabled [column not found]
    * notsupport [not support this operating system]
  */

  /*
    new theme in parent page (gogcom)
    * color [#FFF] in games div
    * big-spot arrow-left-right [svg-fill: #07244C background: #f4b13d border-color: #07244C]
    * game-bacground [#3292db] [product-all-for-games-...]
    * background-parent [#07244C]
    * button-buy [#ffdb2b] And Active items
    * svg-fill and arrow-left-right [#f4b13d] and non active items
    * now-on-sale [border-bottom:1px solid #bfbfbf]
    * background-discover-game-on-hover [#f4b13d]
    * show-more [background: hsla(0,0%,100%,.15)]
    * show-more [border: #D3AFD3]
  */

  /*
    parent table [all_games] games id
    * table [role-playing] => id from [11001] to [13000]
    * table [indie] => id from [13001] to [15000]
    * table [simulation] => id from [15001] to [17000]
    * table [racing & sports] => id from [17001] to [19000]
    * table [action] => id from [19001] to [21000]
    * table [strategy] => id from [21001] to [23000]
    * table [shooter] => id from [23001] to [25000]
    * table [adventure] => id from [25001] to [27000]
    * table [movies_for_gamers] => id from [27001] to [29000]
  */

  /*
    * isset() replace it by new version php
    $var = value ?? ifnotFound(false);
  */

  /*
    * database name
    [01] gogcom
    * tables name
    [00] gogcom_categery ( have all types of games )
      * categeryId
      * categeryName
      * categeryDescription

    [01] gogcom_all_game_in_one_place (have all games info)
     * gc_g_num
     * gc_g_id
     * gc_g_href
     * gc_g_picture_cover
     * gc_g_image_search_cart_modifyToStore
     * gc_g_store_image_cover
     * gc_g_store_image_logo
     * gc_g_picture_cover_glide__slides
     * gc_g_picture_logo_glide__slides
     * gc_g_store_details
     * gc_g_title
     * gc_g_details_for_search
     * gc_g_price_price_and_discount_presentage
     * gc_g_os_win_mac_linux
     * gc_g_newReleases_and_upcoming_and_onsale
     * gc_g_soon_indev
     * gc_g_tba_free_owned__noPrice_inSearch
     * gc_g_comingSoon__gameDiv
     * gc_g_incart
     * gc_g_wishlisted
     * gc_g_features_SP_MP_CO_AC_LB_CoSu_ID_ClSa_O
     * gc_g_user_rating
     * gc_g_bestselling_num
     * gc_g_date_added
     * gc_g_release_date
     * lan_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da
     * aud_en_de_fr_sp_it_bp_po_ru_po_je_cz_du_cs_ko_tu_hu_sw_fi_no_da
     * gc_g_win_min_system_requirements_sy_pr_me_gr_dix_st_sound_other
     * gc_g_win_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other
     * gc_g_mac_min_system_requirements_sy_pr_me_gr_dix_st_sound_other
     * gc_g_mac_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other
     * gc_g_lin_min_system_requirements_sy_pr_me_gr_dix_st_sound_other
     * gc_g_lin_rec_system_requirements_sy_pr_me_gr_dix_st_sound_other
     * gc_g_type
     * gc_g_type_other
     * gc_g_type_parent
     * gc_g_offer_up_to_large_discount

    [02] gogcom_wishlist ( have games you like it )
     * gc_g_wishlist_num
     * gc_g_wishlist_id
     * gc_g_wishlist_href
     * gc_g_wishlist_image_cover
     * gc_g_wishlist_title
     * gc_g_wishlist_price_price_and_discount_presentage
     * gc_g_wishlist_tba_free_owned
     * gc_g_user_rating_wishlist
     * gc_g_wishlist_os_win_mac_linux
     * gc_g_date_add_to_wishlist
     * gc_g_wishlist_type
     * gc_g_wishlist_type_parent
     * gc_g_wishlist_soon_indev
     * GamesOwner

    [03] gog_lang ( language in website )
     * gog_lang_Id
     * gog_lang_gogGalaxy2AllYourGameInOnePlace

    [04] gog_users ( users info )
     * UserID
     * Realy_in_gog
     * UserName
     * Email
     * Password
     * Profile_image
     * sign_up_date

    [05] gogcom_cart ( have games you aaded to cart )
     * gc_g_cart_num
     * gc_g_cart_id
     * gc_g_cart_href
     * gc_g_cart_image_cover
     * gc_g_cart_title
     * gc_g_cart_price_price_and_discount_presentage
     * gc_g_cart_tba_free_owned
     * gc_g_date_add_to_cart
     * gc_g_cart_private_sign_out
     * GamesOwner

    [06] gogcom_comments_baldursgate3 ( game comment )
    [07] gogcom_comments_cyberpunk2077 ( game comment )
    [08] gogcom_comments_theouterworld ( game comment )
     * commentId
     * comment_title
     * comment_text
     * game_rating
     * comment_date
     * comment_language
     * helpful_comment_for_all
     * Un_helpful_comment_for_all
     * helpful_comment_for_this_user
     * comment_username
     * comment_gameid

  */

  /*
    * all images from original website [http://....]
  */

  /*
    * all fonts in pages to now
     [01] font: 600 15px 'Lato', sans-serif;
     [02] font-family: 'Open Sans', sans-serif;
     [03] font-family: 'Bellota', cursive;
  */

  /*
    * explain content of folders
     [01] gog_com ( have every pages and games under this theme or logo )
     [02] includes-php-files ( have static files use many times such function-template-language )
      * ajax folders have files of requests send from pages to update page without load all
     [03] layout-html ( have style files css-js-fonts-images-videos )
  */

  /*
    *
  */
