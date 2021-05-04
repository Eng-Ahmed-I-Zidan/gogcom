<!-- Start With productcard-player -->
<div class="productcard-player productcard-image hide-when-content-is-expanded ng-scope">
  <div class="productcard-player__container layout-container layout-container--no-padding ng-scope">
    <img class="productcard-player__logo" srcset="<?php if(count($gamelogosrcset) > 0){ echo $gamelogosrcset[0]; } ?>" alt=""/>
    <?php if(count($videosArray) > 0){ ?>
      <a class="productcard-player__play-button ng-scope"></a>
    <?php } ?>
  </div>
</div>
<!-- End With productcard-player -->
<!-- Start With productcard-background -->
<div class="productcard-background productcard-image"></div>
<!-- End With productcard-background -->
<!-- Start With gog-gallery -->
<?php if(count($videosArray) > 0 || count($imagesArray) > 0 || count($smallImagesArray) > 0){ ?>
  <div class="gog-gallery ng-scope">
    <span class="gog-gallery__shadow"></span>
    <div class="gog-gallery__layer">
      <!-- big -->
      <div id="carouselExampleControls" class="gog-gallery__display-wrapper carousel" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="0">
        <div class="carousel-inner">
          <?php
            // for loop [videos]
            for($i = 0; $i < count($videosArray); $i++){
          ?>
            <div class="carousel-item <?php if($i == 0){ echo 'active'; } ?>" gog-gallery="gog-gallery-<?php echo ($i + 1); ?>" this-index="<?php echo ($i + 1); ?>">
              <iframe ng-src="<?php echo $videosArray[$i]; ?>" class="gog-gallery__display-video ng-scope" ng-if="gallery.selectedItem.isVideo &amp;&amp; gallery.isOpen" allowfullscreen="" src="<?php echo $videosArray[$i]; ?>" frameborder="0"></iframe>
            </div>
          <?php } ?>

          <?php
            // for loop [images]
            for($p = 0; $p < count($imagesArray); $p++){
          ?>
            <div class="carousel-item" gog-gallery="gog-gallery-<?php echo ($p + count($videosArray) + 1); ?>" this-index="<?php echo ($p + count($videosArray) + 1); ?>">
              <button class="prev-image carousel-control-prev" data-bs-target="#carouselExampleControls" type="button" data-bs-slide="prev"></button>
              <button class="next-image carousel-control-next" data-bs-target="#carouselExampleControls" type="button" data-bs-slide="next"></button>
              <img class="gog-gallery__display-image" src="<?php echo $imagesArray[$p]; ?>" alt=""/>
              <a class="view-original-image" target="_blank" href="<?php echo $imagesArray[$p]; ?>">view original</a>
            </div>
          <?php } ?>
          <span class="gog-gallery-close">
            <svg class="gog-gallery__close">
              <use xlink:href="#gallery-close">
                <symbol viewBox="0 0 16 16" id="gallery-close"><defs><style>#gallery-close .cls-1 {fill-rule: evenodd;}</style></defs><path id="gallery-close_gallery-close" class="cls-1" d="M803.936,855H792.064A2.071,2.071,0,0,0,790,857.064v11.872A2.071,2.071,0,0,0,792.064,871h11.872A2.071,2.071,0,0,0,806,868.936V857.064A2.071,2.071,0,0,0,803.936,855Zm-1.147,11.859-0.931.931L798,863.931l-3.858,3.858-0.931-.931L797.069,863l-3.858-3.858,0.931-.931L798,862.068l3.858-3.857,0.931,0.931L798.931,863Z" transform="translate(-790 -855)"></path></symbol>
              </use>
            </svg>
          </span>
        </div>
        <button class="carousel-control-prev" data-bs-target="#carouselExampleControls" type="button" data-bs-slide="prev">
          <svg class="gog-gallery__nav gog-gallery__nav--left" ng-click="gallery.prevItem()" ng-show="gallery.galleryItems.length > 1">
            <use xlink:href="#gallery-left">
              <symbol viewBox="0 0 32 32" id="gallery-left"><defs><style>#gallery-left .cls-1 {fill-rule: evenodd;}</style></defs><path id="gallery-left_gallery-left" class="cls-1" d="M561.129,1036h23.742a4.143,4.143,0,0,0,4.13-4.13v-23.74a4.143,4.143,0,0,0-4.13-4.13H561.129a4.143,4.143,0,0,0-4.13,4.13v23.74A4.143,4.143,0,0,0,561.129,1036ZM569,1018.14l7.715-7.72,1.863,1.86-7.715,7.72,7.715,7.72-1.863,1.86L569,1021.86l-1.862-1.86" transform="translate(-557 -1004)"></path></symbol>
            </use>
          </svg>
        </button>
        <button class="carousel-control-next" data-bs-target="#carouselExampleControls" type="button" data-bs-slide="next">
          <svg class="gog-gallery__nav gog-gallery__nav--right" ng-click="gallery.nextItem()" ng-show="gallery.galleryItems.length > 1">
            <use xlink:href="#gallery-right">
              <symbol viewBox="0 0 32 32" id="gallery-right"><defs><style>#gallery-right .cls-1 {fill-rule: evenodd;}</style></defs><path id="gallery-right_gallery-right" class="cls-1" d="M1600.87,1004h-23.74a4.144,4.144,0,0,0-4.13,4.13v23.74a4.144,4.144,0,0,0,4.13,4.13h23.74a4.144,4.144,0,0,0,4.13-4.13v-23.74A4.144,4.144,0,0,0,1600.87,1004Zm-7.87,17.86-7.72,7.72-1.86-1.86,7.72-7.72-7.72-7.72,1.86-1.86,7.72,7.72,1.86,1.86" transform="translate(-1573 -1004)"></path></symbol>
            </use>
          </svg>
        </button>

      </div>

      <!-- small -->
      <div id="carouselExampleControlsSmall" class="gog-gallery__slider-wrapper carousel slide" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="0">
        <div class="carousel-indicators">
          <?php for($t = 0; $t < ceil(count($smallImagesArray) / 4); $t++){ ?>
            <button type="button" data-bs-target="#carouselExampleControlsSmall" data-bs-slide-to="<?php echo $t; ?>" class="<?php if($t == 0){ echo 'active'; } ?>" aria-current="true" aria-label="Slide <?php echo ($t + 1); ?>"></button>
          <?php } ?>
        </div>
        <div class="carousel-inner">
          <?php
            // for loop [carousel-item]
            for($e = 0; $e < ceil(count($smallImagesArray) / 4); $e++){
            $count = ($e * 4);
          ?>
            <div class="carousel-item <?php if($e == 0){ echo 'active'; } ?>" data-slide="<?php echo $e; ?>">
              <div class="js-items-wrapper">
                <?php for($r = $count; $r < ($count + 4); $r++){ ?>
                  <?php if($r >= count($smallImagesArray)){ break; ?>
                  <?php } else { ?>
                    <div class="gog-gallery__thumbnails-item _gog-slider__item js-item ng-scope <?php if($r == 0){ echo 'gog-gallery__thumbnails-item--is-active'; } ?>" gog-gallery="gog-gallery-<?php echo ($r + 1); ?>">
                      <img srcset="<?php echo $smallImagesArray[$r]; ?>" alt=""/>
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
        <button class="carousel-control-prev" data-bs-target="#carouselExampleControlsSmall" type="button" data-bs-slide="prev">
          <svg class="ic-svg gog-gallery__slider-nav-icon">
            <use xlink:href="#chevron-left">
              <symbol viewBox="0 0 9 16" id="chevron-left">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                    <g stroke-width="2" stroke="currentColor">
                        <g transform="translate(4.500000, 8.000000) scale(-1, 1) translate(-4.500000, -8.000000) ">
                            <polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
                        </g>
                    </g>
                </g>
              </symbol>
            </use>
          </svg>
        </button>
        <button class="carousel-control-next" data-bs-target="#carouselExampleControlsSmall" type="button" data-bs-slide="next">
          <svg class="ic-svg gog-gallery__slider-nav-icon">
            <use xlink:href="#chevron-right">
              <symbol viewBox="0 0 9 16" id="chevron-right">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                    <g stroke-width="2" stroke="currentColor">
                        <polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
                    </g>
                </g>
              </symbol>
            </use>
          </svg>
        </button>
      </div>
    </div>
  </div>
<?php } ?>
<!-- End With gog-gallery -->
<!-- Start With layout-container -->
<div class="layout-container">
  <div class="productcard-basics">
    <h1 class="productcard-basics__title"><?php echo $fetch_game_by_Name['gc_g_title']; ?></h1>
    <div class="productcard-basics__wrapper">
      <?php if($gc_g_soon == "0"){ ?>
        <div class="productcard-rating">
          <div class="productcard-rating__star-icon-wrapper">
            <svg class="ic-svg productcard-rating__star-icon <?php if($commentIndex > 0){}else{ echo 'ng-hide'; } ?>"><use xlink:href="#star-full"><symbol viewBox="0 0 32 32" id="star-full">
              <g id="star-full_icomoon-ignore">
                <line stroke-width="1" stroke="#449FDB" opacity=""></line>
              </g>
                <path d="M20.654 10.814l11.557 2.225-8.361 7.823 2.164 11.137-9.91-6.005-10.011 6.005 2.265-11.137-8.358-7.823 11.557-2.225 4.515-10.814 4.582 10.814z"></path>
              </symbol></use>
            </svg>
          </div>
          <div class="rating productcard-rating__score"><?php if($commentIndex > 0){ echo number_format(($sumOfCommentsRating / $commentIndex), 1, ".", "") . '/5'; } else { echo 'be first one to rate'; } ?></div>
        </div>
        <div class="productcard-basics__separator productcard-basics__separator--languages hide-on-small-screens"></div>
      <?php } ?>
      <div class="product-tile__info-operating-system">
        <!-- icon windows -->
        <?php if($gc_g_os_win == "1"){ ?>
          <svg class="ic-svg productcard-os-support__system">
            <use xlink:href="#windows"><symbol viewBox="0 0 32 32" id="windows">
              <g id="windows_icomoon-ignore">
                <line stroke-width="1" stroke="#449FDB"></line>
              </g>
                <path d="M12.882 15.997c-1.491-0.766-2.94-1.155-4.309-1.155-0.186 0-0.373 0.006-0.561 0.022-1.746 0.145-3.341 0.605-4.367 0.963-0.272 0.1-0.551 0.205-0.838 0.322l-2.807 9.731c1.928-0.713 3.634-1.061 5.196-1.061 2.526 0 4.36 0.944 5.875 1.916 0.718-2.435 2.439-8.315 2.953-10.073-0.373-0.228-0.752-0.455-1.141-0.666zM16.511 18.471l-2.826 9.817c0.838 0.48 3.659 2.002 5.819 2.002 1.744 0 3.695-0.447 5.964-1.369l2.699-9.437c-1.832 0.591-3.59 0.891-5.233 0.891-2.998 0-5.097-0.972-6.422-1.905zM9.151 11.525c2.41 0.025 4.192 0.944 5.669 1.891l2.898-9.917c-0.611-0.35-2.213-1.222-3.371-1.519-0.762-0.178-1.563-0.269-2.413-0.269-1.619 0.030-3.387 0.436-5.403 1.244l-2.764 9.706c2.025-0.764 3.77-1.136 5.378-1.136 0.001 0 0.004 0 0.004 0zM32 6.191c-1.838 0.713-3.631 1.077-5.345 1.077-2.865 0-4.978-0.994-6.347-1.949l-2.873 9.945c1.93 1.241 4.009 1.871 6.191 1.871 1.78 0 3.623-0.427 5.483-1.271l-0.006-0.069 0.117-0.028 2.779-9.576z"></path>
              </symbol>
            </use>
          </svg>
        <?php } ?>
        <!-- icon linux -->
        <?php if($gc_g_os_mac == "1"){ ?>
          <svg class="ic-svg productcard-os-support__system"><use xlink:href="#osx"><symbol viewBox="0 0 32 32" id="osx">
            <g id="osx_icomoon-ignore">
              <line stroke-width="1" stroke="#449FDB" opacity=""></line>
            </g>
              <path d="M24.734 17.003c-0.040-4.053 3.305-5.996 3.454-6.093-1.88-2.751-4.808-3.127-5.851-3.171-2.492-0.252-4.862 1.467-6.127 1.467-1.261 0-3.213-1.43-5.28-1.392-2.716 0.040-5.221 1.579-6.619 4.012-2.822 4.897-0.723 12.151 2.028 16.123 1.344 1.944 2.947 4.127 5.051 4.049 2.026-0.081 2.793-1.311 5.242-1.311s3.138 1.311 5.283 1.271c2.18-0.041 3.562-1.981 4.897-3.931 1.543-2.255 2.179-4.439 2.216-4.551-0.048-0.022-4.252-1.632-4.294-6.473zM20.705 5.11c1.117-1.355 1.871-3.235 1.665-5.11-1.609 0.066-3.559 1.072-4.713 2.423-1.036 1.199-1.942 3.113-1.699 4.951 1.796 0.14 3.629-0.913 4.747-2.264z"></path>
            </symbol></use>
          </svg>
        <?php } ?>
        <!-- icon mac -->
        <?php if($gc_g_os_linux == "1"){ ?>
          <svg class="ic-svg productcard-os-support__system"><use xlink:href="#linux"><symbol viewBox="0 0 45 41" id="linux">
            <path d="M44.4,27.3c-1,0.7-3.2-0.6-4.4-1.3c-1.1-0.7-2-0.5-2-0.5l0,0c0,2.1-1.3,5.7-1.9,7.1l0,0l-0.6,1.4c2.1,0.6,5.3,1.7,5.3,2.9
              c0,0,0,0.1,0,0.1c0.1,0.2,0.1,0.5,0.1,0.7c0,1.8-1.8,3.3-3.9,3.3h-9.7c-1.4,0-2.6-0.6-3.3-1.5h-3.1C20.2,40.4,19,41,17.6,41H8
              c-2.2,0-3.9-1.5-3.9-3.4c0-0.2,0-0.5,0.1-0.7c0,0,0-0.1,0-0.1c0-1.2,3.2-2.4,5.3-3l-0.6-1.5l0,0c-0.6-1-1.9-4.9-1.9-6.9l0,0.1
              c0,0-0.9-0.2-2,0.5c-1.1,0.7-3.4,2.1-4.3,1.3c-1-0.7-0.5-1.3,0.2-2.2c0.8-0.9,8.1-7,8.3-8.7c0.2-1.7,0.5-7.4,0.7-8
              C10,7.7,12.4,0.2,22.2,0v0c0,0-0.6,0-1.2,0c0,0,0,0,0,0c0.2,0,0.5,0,0.7,0c0.2,0,0.5,0,0.8,0c0.3,0,0.5,0,0.8,0c0.2,0,0.4,0,0.6,0
              c0,0,0,0,0,0c-0.6,0-1.1,0-1.1,0v0C33.1,0.2,35,7.7,35.2,8.3c0.2,0.6,0.6,6.3,0.7,8c0.2,1.7,7.5,7.8,8.3,8.7
              C45,26,45.4,26.6,44.4,27.3z M28,15.6c1.3-0.6,2.3-2,2.3-3.5c0-2.1-1.7-3.9-3.7-3.9c-1.5,0-2.8,0.9-3.4,2.3l-0.6-0.7l-0.6,0.7
              c-0.6-1.3-1.9-2.3-3.4-2.3c-2.1,0-3.7,1.7-3.7,3.9c0,1.6,0.9,3,2.3,3.5 M19.2,16.1L19.2,16.1c0-0.1-0.1-0.3-0.1-0.4
              c0-0.1,0-0.1,0-0.2c0-0.2,0.1-0.3,0.2-0.5c0.5-0.5,1.2-0.9,1.4-0.9h1.6h1.5c0.2,0,0.8,0.5,1.3,0.9c0.1,0.1,0.2,0.3,0.2,0.4
              c0,0.2,0,0.3,0,0.5 M25.4,16.3L25.4,16.3c-0.1,0.2-0.1,0.3-0.1,0.3s-1.5,2-2,2.6c-0.5,0.6-0.9,0.5-0.9,0.5s-0.5,0.1-1-0.5
              c-0.5-0.6-2-2.6-2-2.6s0-0.1-0.1-0.2l0,0c-5,4-6.3,13.3-6,15.2c0,0.2,0.1,0.5,0.2,0.8c0.7-0.1,0.2,1,1.2,1c3.7,0,6.5,1.4,6.9,3.2
              c0.2,0.3,0.2,0.6,0.2,0.9c0,0.4-0.1,0.7-0.3,1h2c-0.2-0.3-0.3-0.6-0.3-1c0-0.4,0.2-0.8,0.4-1.1c0.7-1.7,3.3-3,6.8-3
              c1,0,0.5-1.1,1.2-1c0.1-0.3,0.1-0.5,0.2-0.8C32,29.6,31.1,20.8,25.4,16.3z M23.8,13.1c-0.4,0-0.8-0.7-0.8-1.6c0-0.9,0.4-1.6,0.8-1.6
              s0.8,0.7,0.8,1.6C24.6,12.4,24.3,13.1,23.8,13.1z M21.2,13.1c-0.4,0-0.8-0.7-0.8-1.6c0-0.9,0.4-1.6,0.8-1.6c0.4,0,0.8,0.7,0.8,1.6
              C22,12.4,21.6,13.1,21.2,13.1z"></path>
            </symbol></use>
          </svg>
        <?php } ?>
      </div>
      <div class="productcard-basics__separator productcard-basics__separator--languages hide-on-small-screens"></div>
      <?php if($countLanguageSupport != 0){ ?>
        <div class="hide-on-small-screens productcard-basics__languages">english &amp; <?php if(($countLanguageSupport - 1) != 0){ echo ($countLanguageSupport - 1) . " More"; } ?></div>
      <?php } ?>
    </div>
  </div>
  <div class="product-actions ng-scope">
    <?php if($gc_g_soon == 1){ ?>
      <div class="product-actions__playable-after">
          Playable on
          <span class="product-actions__playable-after-date">September 17, 2020</span>
          <svg class="ic-svg product-actions__playable-after-icon">
            <use xlink:href="#calendar">
              <symbol viewBox="0 0 448 512" id="calendar"><defs><path id="calendar_a" d="m180 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48h-352c-26.5 0-48-21.5-48-48v-352c0-26.5 21.5-48 48-48h48v-52c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128v-52c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346v-298h-352v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path></defs><use transform="translate(-32)" xlink:href="#calendar_a"></use></symbol>
            </use>
          </svg>
      </div>
    <?php } ?>
    <div class="product-actions-price <?php if($gc_g_discount_presentage > 0){ echo 'has_discount'; } ?>">
      <span class="product-actions-price__discount ng-binding <?php if($gc_g_discount_presentage == 0){ echo 'ng-hide'; } ?>"><?php echo $gc_g_discount_presentage; ?>%</span>
      <span class="product-actions-price__base-amount _price ng-binding <?php if($gc_g_discount_presentage == 0){ echo 'ng-hide'; } ?>"><?php echo $gc_g_price_price; ?></span>
      <span class="product-actions-price__final-amount _price ng-binding"><?php echo $gc_g_format_price_discount; ?></span>
    </div>
    <div ng-game-movies-id="<?php echo $gc_g_id; ?>"
          href="<?php echo $gc_g_href; ?>"
          gc_g_title="<?php echo $gc_g_title; ?>"
          gc_g_incart="<?php echo $gc_g_incart; ?>"
          gc_g_type="<?php echo $gc_g_type; ?>"
          gc_g_type_parent="<?php echo $gc_g_type_parent; ?>"
          gc_g_price_price="<?php echo $gc_g_price_price; ?>"
          gc_g_os_win_mac_linux="<?php echo $gc_g_os_win . " & " . $gc_g_os_mac . " & " . $gc_g_os_linux; ?>"
          gc_g_soon_indev="<?php echo $gc_g_soon . " & " . $gc_g_indev; ?>"
          gc_g_type_other="<?php echo $gc_g_discount_presentage; ?>"
          class="ng-scope-preorder-now product-tile__button-one-game product-state__price-btn menu-product__price-btn menu-product__price-btn--active">
      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 172 172" style="fill: rgb(0, 0, 0);"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal;"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M21.5,37.625c-2.96045,0 -5.375,2.41455 -5.375,5.375c0,2.96045 2.41455,5.375 5.375,5.375h11.92578l14.10938,56.4375c1.19678,4.78711 5.47998,8.0625 10.41406,8.0625h67.01953c4.8501,0 8.96533,-3.2124 10.24609,-7.89453l13.94141,-51.23047h-11.25391l-12.93359,48.375h-67.01953l-14.10937,-56.4375c-1.19678,-4.78711 -5.47998,-8.0625 -10.41406,-8.0625zM118.25,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM69.875,112.875c-8.83935,0 -16.125,7.28565 -16.125,16.125c0,8.83935 7.28565,16.125 16.125,16.125c8.83935,0 16.125,-7.28565 16.125,-16.125c0,-8.83935 -7.28565,-16.125 -16.125,-16.125zM86,37.625v16.125h-16.125v10.75h16.125v16.125h10.75v-16.125h16.125v-10.75h-16.125v-16.125zM69.875,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375zM118.25,123.625c3.02344,0 5.375,2.35156 5.375,5.375c0,3.02344 -2.35156,5.375 -5.375,5.375c-3.02344,0 -5.375,-2.35156 -5.375,-5.375c0,-3.02344 2.35156,-5.375 5.375,-5.375z"></path></g></g>
      </svg>
      <span class="addToCART <?php if($gc_g_incart == 0){  } else { echo 'ng-hide'; } ?>"><?php if($gc_g_soon == 1){ echo 'preorder now'; }else{ echo 'add to cart'; } ?></span>
      <span class="CheckOutNow <?php if($gc_g_incart == 0){ echo 'ng-hide'; } else {  } ?>">checkout out now</span>
    </div>
    <div class="button button--big wishlist-button ng-scope">
      <span class="empty-heart wishlist-heart <?php if($gc_g_wishlisted == 0){  }else{ echo 'ng-hide'; } ?>">
        <svg style="margin-right: 5px;" fill="#000" width="17" height="16" class="ic-svg button__icon">
          <use xlink:href="#heart-empty">
            <symbol viewBox="0 0 25.1 25.1" id="heart-empty"><path d="M17.7,18.7c-2.5,2.4-4.9,5.2-5.2,6.4c-0.3-1.2-2.5-3.9-5.2-6.3C4.6,16.3,0,14.5,0,8.9C0.1-1.1,9.9-2.5,12.5,4.1C14.8-2.5,25-1.2,25.1,8.9C25.1,14.4,20.4,16.1,17.7,18.7z M12.5,6.8C8.4-0.9,2.3,1.7,2,8.8c-0.2,4.2,3.7,5.7,6,7.7s4.2,4.4,4.5,5.3c0.2-0.9,2.5-3.8,4.6-5.6c2.3-2,6.2-3.3,5.9-7.5C22.5,1.9,17.1-0.9,12.5,6.8z"></path></symbol>
          </use>
        </svg>
        wishlist it
      </span>
      <span class="full-heart wishlist-heart <?php if($gc_g_wishlisted == 0){ echo 'ng-hide'; }else{ } ?>">
        <svg style="margin-right: 5px;" fill="#ffa200" width="17" height="16" class="ic-svg button__icon wishlist-button__heart-filled">
          <use xlink:href="#heart-filled">
            <symbol viewBox="0 0 11 11" id="heart-filled">
            <path d="M5.5,1.8C4.3-1.1,0-0.5,0,3.9c0,2.4,2,3.2,3.2,4.3C4.2,9,5,9.9,5.5,11
                c0.6-1.1,1.3-2,2.3-2.8C9,7.1,11,6.3,11,3.9C11-0.5,6.5-1.1,5.5,1.8z"></path>
            </symbol>
          </use>
        </svg>
        wishlisted
      </span>
    </div>
  </div>
</div>
<!-- End With layout-container -->
<!-- Start With layout-container -->
<div id="gog-gallery__slider-wrapper-out" class="gog-gallery__slider-wrapper-out carousel slide" data-bs-ride="carousel" data-bs-pause="false" data-bs-interval="0">
  <div class="carousel-indicators">
    <?php for($H = 0; $H < ceil(count($bigImagesArray) / 4); $H++){ ?>
      <button type="button" data-bs-target="#gog-gallery__slider-wrapper-out" data-bs-slide-to="<?php echo $H; ?>" class="<?php if($H == 0){ echo 'active'; } ?>" aria-current="true" aria-label="Slide <?php echo ($H + 1); ?>"></button>
    <?php } ?>
  </div>
  <div class="carousel-inner">
    <?php
      // for loop [carousel-item]
      for($B = 0; $B < ceil(count($bigImagesArray) / 4); $B++){
      $countB = ($B * 4);
    ?>
      <div class="carousel-item <?php if($B == 0){ echo 'active'; } ?>" data-slide="<?php echo $B; ?>">
        <div class="js-items-wrapper">
          <?php for($D = $countB; $D < ($countB + 4); $D++){ ?>
            <?php if($D >= count($bigImagesArray)){ break; ?>
            <?php } else { ?>
              <div class="gog-gallery__thumbnails-item _gog-slider__item js-item ng-scope <?php if($D == 0){ echo 'gog-gallery__thumbnails-item--is-active'; } ?>" gog-gallery="gog-gallery-<?php echo ($D + 1); ?>">
                <?php if(substr($bigImagesArray[$D], 0, 26) == "https://img.youtube.com/vi"){ ?>
                  <span class="play-video"></span>
                  <img srcset="<?php echo $bigImagesArray[$D]; ?>" alt=""/>
                <?php } else { ?>
                  <picture><?php echo $bigImagesArray[$D]; ?></picture>
                <?php } ?>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
  <button class="carousel-control-prev" data-bs-target="#gog-gallery__slider-wrapper-out" type="button" data-bs-slide="prev">
    <svg class="ic-svg gog-gallery__slider-nav-icon">
      <use xlink:href="#chevron-left">
        <symbol viewBox="0 0 9 16" id="chevron-left">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
              <g stroke-width="2" stroke="currentColor">
                  <g transform="translate(4.500000, 8.000000) scale(-1, 1) translate(-4.500000, -8.000000) ">
                      <polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
                  </g>
              </g>
          </g>
        </symbol>
      </use>
    </svg>
  </button>
  <button class="carousel-control-next" data-bs-target="#gog-gallery__slider-wrapper-out" type="button" data-bs-slide="next">
    <svg class="ic-svg gog-gallery__slider-nav-icon">
      <use xlink:href="#chevron-right">
        <symbol viewBox="0 0 9 16" id="chevron-right">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
              <g stroke-width="2" stroke="currentColor">
                  <polyline points="0.778174593 0 9 7.77817459 0.778174593 15.5563492"></polyline>
              </g>
          </g>
        </symbol>
      </use>
    </svg>
  </button>
</div>
<!-- End With layout-container -->
