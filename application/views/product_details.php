<?php
@$product_details['mrp'] = (intval(@$product_details['mrp']) > 0) ? @$product_details['mrp'] : 9999;
$remain_percentage = (@$product_details['selling_price'] * 100) / (@$product_details['mrp'] ?? 1);
$offer_percentage = round(100 - $remain_percentage);
?>
<div class="sc-ksBlkl cTXbpL"></div>
<div class="_1fhgRH mb-5">
    <div class="container p-0 card">
        <!-- <span class="share-icon" style="background-image: url('https://cdn.shopify.com/s/files/1/0057/8938/4802/files/share_icon_1.png?v=1689752691');"></span> -->
        <div class="container-fluid px-0 product-slider">
            <div id="sliderX" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php if (@trim(@$product_details['img1'])) { ?>
                        <li data-bs-target="#sliderX" data-bs-slide-to="0" class="active"></li>
                    <?php } ?>
                    <?php if (@trim(@$product_details['img2'])) { ?>
                        <li data-bs-target="#sliderX" data-bs-slide-to="1" class=""></li>
                    <?php } ?>
                    <?php if (@trim(@$product_details['img3'])) { ?>
                        <li data-bs-target="#sliderX" data-bs-slide-to="2" class=""></li>
                    <?php } ?>
                    <?php if (@trim(@$product_details['img4'])) { ?>
                        <li data-bs-target="#sliderX" data-bs-slide-to="3" class=""></li>
                    <?php } ?>
                    <?php if (@trim(@$product_details['img5'])) { ?>
                        <li data-bs-target="#sliderX" data-bs-slide-to="4" class=""></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <?php if (@trim(@$product_details['img1'])) { ?>
                        <div class="carousel-item active">
                            <img class="d-block w-100 main_image  slider-item-1" src="<?= @$product_details['img1']  ?>" alt="First slide">
                        </div>
                    <?php } ?>
                    <?php if (@trim(@$product_details['img2'])) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100   slider-item-2" src="<?= @$product_details['img2']  ?>" alt="First slide">
                        </div>
                    <?php } ?>
                    <?php if (@trim(@$product_details['img3'])) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100   slider-item-3" src="<?= @$product_details['img3']  ?>" alt="First slide">
                        </div>
                    <?php } ?>
                    <?php if (@trim(@$product_details['img4'])) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100   slider-item-4" src="<?= @$product_details['img4']  ?>" alt="First slide">
                        </div>
                    <?php } ?>
                    <?php if (@trim(@$product_details['img5'])) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100   slider-item-5" src="<?= @$product_details['img5']  ?>" alt="First slide">
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>


        <div class="container-fluid p-0">
            <?php if (counts(@$product_details['colors'])) {  ?>
                <div class="color-div">
                    <h4><?= counts($product_details['colors']); ?> Similar Products</h4>
                    <div class="color-list p-2">

                        <?php
                        foreach ($product_details['colors'] as  $c_key => $colors) {

                            if ($c_key == 0) {
                                $color_active = "active";
                            } else {
                                $color_active = "false";
                            }
                            if (@$colors['img1']) {
                        ?>
                                <div class="color-box color-item p-2 me-2 <?= @$color_active; ?>" data-mrp="<?= @$colors['mrp']; ?>" data-selling-price="<?= @$colors['selling_price']; ?>" onclick="manage_color_click($(this),'<?= $colors['color_name']; ?>','<?= $c_key; ?>',<?= $c_key; ?>, '<?= @$colors['img1']; ?>,<?= @$colors['img2']; ?>,<?= @$colors['img3']; ?>,<?= @$colors['img4']; ?>,<?= @$colors['img5']; ?>');">
                                    <!-- <div style="background-color: <?= $colors['color_code']; ?>" class="color-round  color-item-box"></div> -->
                                    <img src="<?= @$colors['img1']; ?>" alt="img0" class="color_img_0">
                                    <span class="color-name d-none"><?= $colors['color_name']; ?></span>
                                </div>
                        <?php }
                        } ?>

                    </div>
                </div>
            <?php } ?>

            <?php if (counts(@$product_details['storage']) && @$product_details['storage'][0]['storage'] != "") { ?>
                <div class="storage-div mt-3 p-3">
                    <h4>Select Storage</h4>
                    <div class="storage-list p-2">
                        <?php
                        foreach (@$product_details['storage'] as $s_key => $storage) {
                            $comma_storage = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '_', @$storage['storage']));

                            if ($s_key == 0) {
                                $storage_active = "active";
                            } else {
                                $storage_active = "false";
                            }
                        ?>
                            <div class="storage-item p-2 me-2 mb-2 <?= @$comma_storage; ?> <?= @$storage_active; ?>" data-mrp="<?= @$storage['mrp']; ?>" data-selling-price="<?= @$storage['selling_price']; ?>" onclick="manage_storage_click($(this),'<?= @$comma_storage; ?>');">
                                <span class="storage-name"><?= @$storage['storage']; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <div class="container-fluid mt-5">
                <div class="product-title-div">
                    <div class="product-title" data-id="<?= @$product_details['id']; ?>"><?= @$product_details['name']; ?></div>
                    <div class="ProductWishListIconstyled__ProductWishList-sc-1clzx80-1 gNlzBX">
                        <div class="ProductWishListIconstyled__WishListIcon-sc-1clzx80-3 bdcVUy"><svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" iconSize="17" class="sc-gswNZR ProductWishListIconstyled__ProductWishListImage-sc-1clzx80-0 kwsBSS iZRFqd">
                                <g clip-path="url(#wishlist-product_svg__a)">
                                    <path d="M4.616 2.048c.856 0 1.672.384 2.416 1.144a1.35 1.35 0 0 0 1.936 0c.744-.76 1.56-1.136 2.416-1.136 1.28 0 2.52.888 3.08 2.2.584 1.376.264 2.856-.888 4.056L8.336 13.8a.478.478 0 0 1-.336.152.447.447 0 0 1-.336-.152l-5.24-5.488C1.272 7.104.952 5.624 1.536 4.248c.56-1.312 1.8-2.2 3.08-2.2Zm0-1.248c-3.584 0-6.52 4.784-3.088 8.376l5.24 5.488c.336.36.784.536 1.232.536.448 0 .896-.176 1.232-.536l5.24-5.488C17.896 5.592 14.96.8 11.376.8c-1.096 0-2.248.448-3.296 1.512a.103.103 0 0 1-.08.032.103.103 0 0 1-.08-.032C6.872 1.248 5.712.8 4.616.8Z" fill="#333"></path>
                                </g>
                                <defs>
                                    <clipPath id="wishlist-product_svg__a">
                                        <path fill="#fff" transform="translate(0 .8)" d="M0 0h16v14.4H0z"></path>
                                    </clipPath>
                                </defs>
                            </svg></div><span font-size="small" font-weight="book" color="greyBase" class="sc-dkrFOg gTFoAs ProductWishListIconstyled__Text1-sc-1clzx80-2 dyZkZi ProductWishListIconstyled__Text1-sc-1clzx80-2 dyZkZi">Wishlist</span>
                    </div>
                    <div class="ProductShareIconstyles__ProductShare-sc-uxw4hm-0 cDBOnq">
                        <div class="ProductShareIconstyles__ShareIcon-sc-uxw4hm-2 clikdT"><svg width="17" height="17" fill="none" xmlns="http://www.w3.org/2000/svg" iconSize="17" class="sc-gswNZR juWHgk">
                                <path fill="#fff" d="M.947.979h16v16h-16z"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.489 3.912c0-1.62 1.266-2.933 2.829-2.933 1.562 0 2.828 1.313 2.828 2.933 0 1.62-1.266 2.933-2.828 2.933a2.784 2.784 0 0 1-2.175-1.057L7.071 8.303a3.007 3.007 0 0 1 .295 1.866l3.643 2.18a2.797 2.797 0 0 1 2.309-1.238c1.562 0 2.828 1.314 2.828 2.934s-1.266 2.933-2.828 2.933c-1.563 0-2.829-1.313-2.829-2.933 0-.172.014-.34.042-.504l-3.636-2.176a2.798 2.798 0 0 1-2.32 1.254c-1.562 0-2.828-1.314-2.828-2.934s1.266-2.933 2.828-2.933a2.75 2.75 0 0 1 1.674.568l4.33-2.673a3.042 3.042 0 0 1-.09-.735Zm4.423 0c0-.914-.714-1.654-1.594-1.654-.88 0-1.595.74-1.595 1.653s.714 1.654 1.595 1.654c.88 0 1.594-.74 1.594-1.654ZM6.17 9.684c0-.913-.714-1.653-1.595-1.653-.88 0-1.594.74-1.594 1.653s.714 1.653 1.594 1.653c.88 0 1.595-.74 1.595-1.653Zm7.148 2.706c.88 0 1.594.74 1.594 1.653s-.714 1.654-1.594 1.654c-.88 0-1.595-.74-1.595-1.654 0-.913.714-1.653 1.595-1.653Z" fill="#353543"></path>
                                <mask id="share_svg__a" maskUnits="userSpaceOnUse" x="1" y="0" width="16" height="17" style="mask-type: luminance;">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.318.979c-1.563 0-2.829 1.313-2.829 2.933 0 .254.031.5.09.735L6.249 7.32a2.75 2.75 0 0 0-1.674-.568c-1.562 0-2.828 1.313-2.828 2.933 0 1.62 1.266 2.934 2.828 2.934.96 0 1.808-.496 2.32-1.254l3.636 2.176a3.064 3.064 0 0 0-.042.504c0 1.62 1.266 2.933 2.829 2.933 1.562 0 2.828-1.313 2.828-2.933 0-1.62-1.266-2.934-2.828-2.934-.953 0-1.796.49-2.309 1.238l-3.643-2.18a3.06 3.06 0 0 0-.295-1.866l4.072-2.515a2.784 2.784 0 0 0 2.175 1.057c1.562 0 2.828-1.313 2.828-2.933 0-1.62-1.266-2.933-2.828-2.933Z" fill="#fff"></path>
                                </mask>
                            </svg></div><span font-size="small" font-weight="book" color="greyBase" class="sc-dkrFOg gTFoAs ProductShareIconstyles__Text1-sc-uxw4hm-1 cHjLGv ProductShareIconstyles__Text1-sc-uxw4hm-1 cHjLGv">Share</span>
                    </div>
                </div>
                <div class="product-price d-flex my-2">
                    <span class="price" data-price="<?= @$product_details['selling_price']; ?>">₹<?= @$product_details['selling_price']; ?></span>
                    <span class="mrp" data-mrp="<?= @$product_details['mrp']; ?>">₹<?= @$product_details['mrp']; ?></span>
                    <span class="discount"><?= @$offer_percentage; ?>% off</span>
                </div>

                <span class="Offersstyled__OfferWrapper-sc-1ng6jp-0 hdHcbs">
                    <span font-size="15px" font-weight="demi" color="greenBase" class="sc-ipEyDJ gHgHGw">₹675 with 2 Special Offers</span>
                    <svg width="16" height="16" fill="#91E5BD" xmlns="http://www.w3.org/2000/svg" iconsize="16" class="sc-gswNZR EaPUQ">
                        <rect width="16" height="16" rx="8"></rect>
                        <path d="M6.387 4.59a.647.647 0 0 0 0 .908L8.86 8l-2.474 2.502a.647.647 0 0 0 0 .91.63.63 0 0 0 .899 0l2.927-2.96a.647.647 0 0 0 0-.91l-2.927-2.96a.636.636 0 0 0-.9.007Z" fill="#038D63"></path>
                    </svg>
                </span>

                <div class="aMaAEs">
                    <div class="_3Zuayz mt-2">
                        <div class="_3_L3jD">
                            <div class="gUuXy- _16VRIQ _1eJXd3">
                                <span id="productRating_LSTETHFZZUWAC8X2PGQZ7T8VQ_ETHFZZUWAC8X2PGQ_" class="_1lRcqv">
                                    <div class="_3LWZlK _3uSWvT">4<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMiI+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTYuNSA5LjQzOWwtMy42NzQgMi4yMy45NC00LjI2LTMuMjEtMi44ODMgNC4yNTQtLjQwNEw2LjUuMTEybDEuNjkgNC4wMSA0LjI1NC40MDQtMy4yMSAyLjg4Mi45NCA0LjI2eiIvPjwvc3ZnPg==" class="_1wB99o _19cuvx"></div>
                                </span>
                                <span class="_2_R_DZ"><span><?= rand(100, 1000); ?> ratings and <?= rand(10, 100); ?> reviews</span></span>
                            </div>
                        </div>
                        <span class="ShippingInfoMobilestyles__Dot-sc-b8wrmp-7 bxhscH"></span>
                        <span class="b7864- _2Z07dN">
                            <svg width="55" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" iconSize="20" class="sc-gswNZR eCiixe">
                                <path d="M9.901 5.496a2 2 0 0 1 2-2h41.6a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-41.6a2 2 0 0 1-2-2v-9Z" fill="#FFE7FB"></path>
                                <path d="M24.712 6H19.5v1.03h2.052v5.843h1.12V7.03h2.041V6ZM24.698 8.229v4.644h1.06v-2.17c0-1.09.52-1.532 1.228-1.532a.95.95 0 0 1 .353.06V8.198a.85.85 0 0 0-.363-.068c-.55 0-1.031.314-1.267.844h-.02v-.746h-.991ZM32.226 12.873V8.229h-1.07v2.67c0 .697-.481 1.188-1.09 1.188-.56 0-.884-.383-.884-1.1V8.23h-1.06v2.975c0 1.129.628 1.816 1.63 1.816.658 0 1.188-.314 1.443-.766h.05v.619h.981ZM35.25 13.02c1.1 0 1.846-.59 1.846-1.532 0-1.855-2.543-1.03-2.543-2.052 0-.304.236-.55.698-.55.422 0 .765.246.814.59l.992-.207c-.167-.706-.893-1.188-1.836-1.188-1.03 0-1.728.57-1.728 1.434 0 1.856 2.543 1.03 2.543 2.052 0 .393-.265.658-.756.658-.481 0-.874-.255-.992-.668l-.972.197c.226.795.943 1.266 1.934 1.266ZM40.083 12.97c.343 0 .638-.058.795-.136l-.118-.855a.992.992 0 0 1-.471.099c-.501 0-.747-.226-.747-.914V9.132h1.287v-.903h-1.287V6.746l-1.07.206V8.23h-.844v.903h.844v2.21c0 1.207.658 1.629 1.61 1.629ZM45.823 11.744l-.894-.265c-.206.422-.589.657-1.09.657-.746 0-1.256-.53-1.355-1.305h3.525v-.265c-.02-1.6-1.03-2.485-2.297-2.485-1.365 0-2.308 1.07-2.308 2.485 0 1.403.992 2.454 2.425 2.454.933 0 1.61-.442 1.994-1.276ZM43.73 8.906c.6 0 1.12.373 1.169 1.198h-2.406c.118-.766.56-1.198 1.237-1.198ZM46.776 10.556c0 1.463.923 2.464 2.17 2.464.619 0 1.237-.255 1.542-.854h.03v.707h.981V6h-1.07v2.828c-.246-.432-.766-.747-1.463-.747-1.247 0-2.19.992-2.19 2.475Zm1.07 0c0-.874.501-1.542 1.316-1.542.805 0 1.296.638 1.296 1.542 0 .893-.49 1.522-1.296 1.522-.795 0-1.315-.648-1.315-1.522Z" fill="#9F2089"></path>
                                <path d="M16.5 3.239 9.027.059a.746.746 0 0 0-.585 0L.969 3.24a.782.782 0 0 0-.47.721v6.36c0 5.321 3.139 7.611 7.947 9.622a.746.746 0 0 0 .576 0c4.809-2.01 7.948-4.3 7.948-9.622V3.96c0-.316-.186-.6-.47-.721Z" fill="#FFE7FB"></path>
                                <path d="m15.748 3.894-6.75-2.871a.673.673 0 0 0-.528 0l-6.75 2.87a.706.706 0 0 0-.424.652v5.745c0 4.806 2.835 6.874 7.178 8.69.167.07.353.07.52 0 4.343-1.816 7.178-3.884 7.178-8.69V4.545a.706.706 0 0 0-.424-.651Z" fill="#60014A"></path>
                                <path d="M10.852 6.455c.804.006 1.482.28 2.04.817.565.54.843 1.185.837 1.946l-.023 3.58c-.003.426-.37.77-.824.77-.45-.003-.814-.35-.81-.777l.022-3.58a1.098 1.098 0 0 0-.367-.85 1.216 1.216 0 0 0-.885-.35 1.247 1.247 0 0 0-.921.372c-.23.227-.344.54-.347.856l-.02 3.528c-.003.432-.376.782-.833.78-.458-.004-.828-.357-.824-.79l.022-3.548c.004-.31-.11-.617-.334-.844a1.254 1.254 0 0 0-.918-.378 1.253 1.253 0 0 0-.892.34c-.24.23-.37.513-.37.845l-.022 3.576c-.004.43-.373.777-.827.774-.455-.003-.818-.353-.815-.783l.023-3.564c.003-.66.25-1.308.714-1.799.6-.632 1.34-.948 2.199-.942.82.006 1.521.285 2.082.853.578-.565 1.272-.835 2.093-.832Z" fill="#FF9D00"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="sc-dkrFOg kdtyUz DeliveryBadge__BadgeRow-sc-skvcwk-4 cYgzqn DeliveryBadge__BadgeRow-sc-skvcwk-4 cYgzqn mb-4" color="white">
                        <div class="sc-hhOBVt evBRxL"><span font-size="10px" font-weight="demi" color="greyT1" class="sc-jrcTuL eXZucf"></span></div>
                    </div>
                </div>
            </div>
        <div class="storage-div mt-3"> <div class="sc-kDvujY iGlGaV SizeSelectionstyled__SizeCard-sc-155vsje-0 eeldyg SizeSelectionstyled__SizeCard-sc-155vsje-0 eeldyg" color="white"> <h6 font-size="17px" font-weight="bold" color="greyBase" class="sc-gswNZR hmRtgo SizeSelectionstyled__Headline6Styled-sc-155vsje-1 keaMtN SizeSelectionstyled__Headline6Styled-sc-155vsje-1 keaMtN">Select Size</h6> <div class="sc-kImNAt hnbNOX SizeSelectionstyled__SizeSelectorChipsStyled-sc-155vsje-2 dEkkqK"> <span class="sc-eKJbhj dqLmGj dress-size active" onclick="manage_size_click($(this))"> <span font-size="15px" font-weight="demi" color="greyBase" class="sc-gswNZR iwPwcX">S</span> </span> <span class="sc-eKJbhj dqLmGj dress-size" onclick="manage_size_click($(this))"> <span font-size="15px" font-weight="demi" color="greyBase" class="sc-gswNZR iwPwcX">M</span> </span> <span class="sc-eKJbhj dqLmGj dress-size" onclick="manage_size_click($(this))"> <span font-size="15px" font-weight="demi" color="greyBase" class="sc-gswNZR iwPwcX">L</span> </span> <span class="sc-eKJbhj dqLmGj dress-size" onclick="manage_size_click($(this))"> <span font-size="15px" font-weight="demi" color="greyBase" class="sc-gswNZR iwPwcX">XL</span> </span> <span class="sc-eKJbhj dqLmGj dress-size" onclick="manage_size_click($(this))"> <span font-size="15px" font-weight="demi" color="greyBase" class="sc-gswNZR iwPwcX">XXL</span> </span> <span class="sc-eKJbhj dqLmGj dress-size" onclick="manage_size_click($(this))"> <span font-size="15px" font-weight="demi" color="greyBase" class="sc-gswNZR iwPwcX">3XL</span> </span> <span class="sc-eKJbhj dqLmGj dress-size" onclick="manage_size_click($(this))"> <span font-size="15px" font-weight="demi" color="greyBase" class="sc-gswNZR iwPwcX">4XL</span> </span> </div> </div>
        </div>
    </div>
    <div style="
    background:#ffffff;
    padding:18px;
    border-radius:14px;
    box-shadow:0 4px 14px rgba(0,0,0,0.06);
    margin:16px 0;
    font-family: Arial, sans-serif;
">

    <!-- Title -->
    <h6 style="font-size:18px; font-weight:700; margin-bottom:14px;">
        Sold By
    </h6>

    <div style="display:flex; justify-content:space-between; align-items:center;">

        <!-- LEFT SIDE -->
        <div style="display:flex; gap:14px; align-items:center;">

            <!-- Shop Icon -->
            <div style="
                width:55px;
                height:55px;
                border-radius:50%;
                background:linear-gradient(135deg,#f2f4ff,#e8ebff);
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:22px;
                color:#5b63ff;
            ">
                🛍️
            </div>

            <!-- Seller Info -->
            <div>
                <div style="font-size:18px; font-weight:700; color:#222;">
                    Meesho
                </div>

                <div style="display:flex; gap:14px; margin-top:6px; align-items:center;">

                    <!-- Rating -->
                    <div style="
                        background:#eef2ff;
                        color:#4a5cff;
                        padding:4px 10px;
                        border-radius:20px;
                        font-size:13px;
                        font-weight:600;
                    ">
                        4.0 ★
                    </div>

                    <span style="font-size:13px; color:#666;">
                        31,535 Ratings
                    </span>
                </div>

                <!-- Extra Stats -->
                <div style="display:flex; gap:24px; margin-top:8px; font-size:13px; color:#555;">
                    <span><strong>28Cr</strong> Followers</span>
                    <span><strong>33L</strong> Products</span>
                </div>

            </div>

        </div>
        

        <!-- RIGHT BUTTON -->
        <button style="
            padding:8px 16px;
            background:#9F2089;
            color:#fff;
            border:none;
            border-radius:8px;
            font-size:14px;
            font-weight:600;
            cursor:pointer;
            transition:0.3s ease;
        " onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
            View Shop
        </button>

    </div>

</div>

    <?php if (@$product_details['storage'][0]) { ?>
     
    <?php } ?>
    <div class="container-fluid product-detail mb-4 card" style="margin-top: 3px;padding: 20px 16px;">
        <h6 font-size="17px" font-weight="bold" color="greyBase" class="sc-hBxehG jvhzrN">Product Details</h6>
        <div class="product-details">
            <?php
            // echo @$product_details['fetaures'];
            if (@$product_details['fetaures']) {
                // Function to fix HTML using DOMDocument
                // function fixHtmlWithDom($html)
                // {
                //     $dom = new DOMDocument();

                //     // Load HTML content into DOMDocument
                //     libxml_use_internal_errors(true); // Disable libxml errors
                //     $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                //     libxml_clear_errors(); // Clear libxml errors

                //     // Save HTML content back to string format, which will help in fixing the incomplete or improperly formatted HTML
                //     $fixedHtml = $dom->saveHTML();

                //     return $fixedHtml;
                // }

                // // Fix the HTML content using DOMDocument
                // $fixedHtml = fixHtmlWithDom(@$product_details['fetaures']);

                // Display the fixed HTML content
                // echo $fixedHtml;
                echo @$product_details['fetaures'];
            } else {

                echo "<center><h5>Product Details Not found!!</h5></center>";
            }
            ?>
        </div>
    </div>



<div class="products" style="padding: 1px 16px;background: white;">    
<h6 font-size="17px" font-weight="bold" color="greyBase" class="sc-eDvSVe ejJekP">Product Ratings & Reviews</h6>
</div>
    
<div class="sc-bqWxrE eWKScb CountWrapper__CountWrapperCard-sc-fa0m6i-0 eVCkpk CountWrapper__CountWrapperCard-sc-fa0m6i-0 eVCkpk" color="white" style="padding: 4px 16px;">
    <div class="sc-bqWxrE eWKScb CountWrapper__LeftSection-sc-fa0m6i-1 halpYD CountWrapper__LeftSection-sc-fa0m6i-1 halpYD" color="white">
        <div class="sc-bqWxrE eWKScb CountWrapper__AverageRating-sc-fa0m6i-3 cusQWQ count CountWrapper__AverageRating-sc-fa0m6i-3 cusQWQ count" color="white">
          <h1 font-size="35px" font-weight="bold" color="greenBase" class="sc-eDvSVe jcBvSe" id="average-rating">4.1</h1>
          <svg width="12" height="12" viewBox="0 0 20 20" fill="green" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#star_svg__a)">
              <path d="M19.54 6.85 13.62 5.5 10.51.29a.596.596 0 0 0-1.02 0L6.38 5.5.46 6.85a.599.599 0 0 0-.31.98l3.99 4.57-.55 6.04c-.02.21.07.41.24.54.17.12.39.15.59.07L10 16.64l5.58 2.39c.08.03.16.05.23.05h.01c.3.01.6-.26.6-.6 0-.06-.01-.12-.03-.17l-.54-5.93 3.99-4.57c.14-.16.18-.38.12-.58a.544.544 0 0 0-.42-.38Z" fill="GREEN"></path>
            </g>
          </svg>
        </div>
        <div class="sc-bqWxrE lhrEnl CountWrapper__RatingReviewCount-sc-fa0m6i-2 bSmHPX CountWrapper__RatingReviewCount-sc-fa0m6i-2 bSmHPX" color="white">
          <span font-size="11px" font-weight="book" color="greyT2" class="sc-eDvSVe jjjvce" id="total-ratings">8204&nbsp; Ratings,</span>
          <span font-size="11px" font-weight="book" color="greyT2" class="sc-eDvSVe jjjvce" id="total-reviews">2992&nbsp; Reviews</span>
        </div>
    </div>
  
     <div class="sc-bqWxrE eWKScb RatingMap__RatingMapCard-sc-a5ve9b-0 dcLEEY RatingMap__RatingMapCard-sc-a5ve9b-0 dcLEEY" color="white">
        <div class="RatingMap__CountList-sc-a5ve9b-2 dhYzXT">
          <div dir="auto" class="rating_label">Poor</div>
          <div class="rating_meter"><div class="RatingMap__RatingMeter-sc-a5ve9b-1 kGeNPR"><span id="poor-meter"></span></div></div>
          <div dir="auto" class="ratingCount"><span id="poor-count">642</span></div>
        </div>
        <div class="RatingMap__CountList-sc-a5ve9b-2 dhYzXT">
          <div dir="auto" class="rating_label">Average</div>
          <div class="rating_meter"><div class="RatingMap__RatingMeter-sc-a5ve9b-1 wmxTo"><span id="average-meter"></span></div></div>
          <div dir="auto" class="ratingCount"><span id="average-count">294</span></div>
        </div>
        <div class="RatingMap__CountList-sc-a5ve9b-2 dhYzXT">
          <div dir="auto" class="rating_label">Good</div>
          <div class="rating_meter"><div class="RatingMap__RatingMeter-sc-a5ve9b-1 kHbMxB"><span id="good-meter"></span></div></div>
          <div dir="auto" class="ratingCount"><span id="good-count">1033</span></div>
        </div>
        <div class="RatingMap__CountList-sc-a5ve9b-2 dhYzXT">
          <div dir="auto" class="rating_label">Very Good</div>
          <div class="rating_meter"><div class="RatingMap__RatingMeter-sc-a5ve9b-1 gMlcfu"><span id="very-good-meter"></span></div></div>
          <div dir="auto" class="ratingCount"><span id="very-good-count">2113</span></div>
        </div>
        <div class="RatingMap__CountList-sc-a5ve9b-2 dhYzXT">
          <div dir="auto" class="rating_label">Excellent</div>
          <div class="rating_meter"><div class="RatingMap__RatingMeter-sc-a5ve9b-1 dtgQRP"><span id="excellent-meter"></span></div></div>
          <div dir="auto" class="ratingCount"><span id="excellent-count">4122</span></div>
        </div>
    </div>
</div>

<script>
  // Generate a random number between min and max
  function getRandomNumber(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  // Dummy dynamic data with random rating and review count
  const data = {
    averageRating: (Math.random() * (5 - 4) + 4).toFixed(1), // Random rating between 3.0 and 5.0
    ratingCount: getRandomNumber(1000, 10000), // Random rating count between 1000 and 10000
    reviewCount: getRandomNumber(100, 5000),  // Random review count between 100 and 5000
    ratings: {
      poor: getRandomNumber(300, 400),
      average: getRandomNumber(400, 800),
      good: getRandomNumber(300, 3000),
      veryGood: getRandomNumber(400, 900),
      excellent: getRandomNumber(1000, 4000)
    }
  };

  // Update the content dynamically
  document.getElementById('average-rating').innerText = data.averageRating;
  document.getElementById('total-ratings').innerText = `${data.ratingCount} Ratings,`;
  document.getElementById('total-reviews').innerText = `${data.reviewCount} Reviews`;

  // Update individual rating values and widths
  const totalRatings = Object.values(data.ratings).reduce((acc, val) => acc + val, 0);

  document.getElementById('poor-count').innerText = data.ratings.poor;
  document.getElementById('poor-meter').style.width = `${(data.ratings.poor / totalRatings) * 100}%`;

  document.getElementById('average-count').innerText = data.ratings.average;
  document.getElementById('average-meter').style.width = `${(data.ratings.average / totalRatings) * 100}%`;

  document.getElementById('good-count').innerText = data.ratings.good;
  document.getElementById('good-meter').style.width = `${(data.ratings.good / totalRatings) * 100}%`;

  document.getElementById('very-good-count').innerText = data.ratings.veryGood;
  document.getElementById('very-good-meter').style.width = `${(data.ratings.veryGood / totalRatings) * 100}%`;

  document.getElementById('excellent-count').innerText = data.ratings.excellent;
  document.getElementById('excellent-meter').style.width = `${(data.ratings.excellent / totalRatings) * 100}%`;
</script>
<div class="sc-ksBlkl cTXbpL"></div>
<div color="white" class="sc-ftTHYK laxjno" style="padding: 10px 16px;">
    <span font-size="13px" font-weight="demi" color="greyBase" class="sc-eDvSVe ddiUdO">Real Images and videos from customers</span>
    <div class="sc-ftTHYK ckqRfQ MediaSection__FlexRow-sc-o6ljlw-0 bgQzYE MediaSection__FlexRow-sc-o6ljlw-0 bgQzYE" color="white">
        <?php
        // Loop through the product details' colors
        foreach ($product_details['colors'] as $colors) {
            // Loop through the image keys
            for ($i = 1; $i <= 5; $i++) {
                $img_key = 'img' . $i; // Dynamic key name (img1, img2, img3, etc.)
                if (!empty($colors[$img_key])) { // Check if the image exists
        ?>
                    <div class="sc-ftTHYK dWSThK MediaCard__MediaWrapper-sc-hfhfqq-0 fMgmZi MediaCard__MediaWrapper-sc-hfhfqq-0 fMgmZi" color="white">
                        <img alt="img-<?= $i ?>" width="48" height="48" layout="fixed" class="MediaCard__StyledLazyImages-sc-hfhfqq-1 bLnigD" src="<?= htmlspecialchars($colors[$img_key]); ?>">
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>
<div class="sc-ksBlkl cTXbpL"></div>

<div class="comments-container" id="comments-container"></div>

<script>
// Array of random first names
const firstNames = [
    "Geeta", "Ajay", "Bhumi", "Chelsi", "Gopi", 
    "Henna", "Isha", "Vivek", "Sarah", "Ali"
];

// Array of random last names
const lastNames = [
    "Khan", "Patil", "arora", "bhanushali", "Shukla", 
    "Negi", "Pawar", "kahrwa", "jain", "kapoor"
];

// Array of random comments
const comments = [
    "Same as shown, Mst hai, ❤️❤️",
    "Really happy with the purchase!",
    "Not what I expected, quite disappointed.",
    "Amazing quality and fast shipping!",
    "Will definitely buy again, love it!",
    "Could be better, but overall satisfied.",
    "The product is just okay, not great.",
    "Exceeded my expectations, great job!",
    "Quick delivery and great service!",
    "Highly recommend this to everyone!"
];

// Get the random images from PHP
const all_images = <?php
$all_images = []; // Array to hold all images

// Loop through the product details' colors
foreach ($product_details['colors'] as $colors) {
    for ($i = 1; $i <= 5; $i++) {
        $img_key = 'img' . $i; // Dynamic key name (img1, img2, img3, etc.)
        if (!empty($colors[$img_key])) {
            $all_images[] = htmlspecialchars($colors[$img_key]); // Add image to the array
        }
    }
}

// Shuffle the array of images
shuffle($all_images);

// Get the first 4 images
$random_images = array_slice($all_images, 0, 4);

// Output as JSON
echo json_encode($random_images);
?>;

// Function to generate a random date within the last 30 days
function getRandomDate() {
    const today = new Date();
    const past30Days = new Date();
    past30Days.setDate(today.getDate() - 30);
    const timestamp = Math.random() * (today - past30Days) + past30Days.getTime();
    const date = new Date(timestamp);
    return date.toLocaleDateString('en-US', { day: 'numeric', month: 'long', year: 'numeric' });
}

// Function to create random comments
function createRandomComments(numComments) {
    let htmlContent = "";

    for (let i = 0; i < numComments; i++) {
        const randomFirstName = firstNames[Math.floor(Math.random() * firstNames.length)];
        const randomLastName = lastNames[Math.floor(Math.random() * lastNames.length)];
        const randomComment = comments[Math.floor(Math.random() * comments.length)];
        const randomDate = getRandomDate();
        const randomRatingOptions = [4.1, 4.6, 5.0]; // Only these ratings
        const randomRating = randomRatingOptions[Math.floor(Math.random() * randomRatingOptions.length)];
        const helpfulCount = Math.floor(Math.random() * (899 - 499 + 1)) + 499; // Random number between 499 and 899

        // Shuffle and slice to get 4 random images from the all_images array
        const shuffledImages = [...all_images].sort(() => 0.5 - Math.random()).slice(0, 4);

        // Build image HTML
        const imagesHTML = shuffledImages.map((image, index) => `
            <div class="sc-ftTHYK dWSThK MediaCard__MediaWrapper-sc-hfhfqq-0 fMgmZi" color="white">
                <img alt="img-${index + 1}" width="48" height="48" layout="fixed" class="MediaCard__StyledLazyImages-sc-hfhfqq-1 bLnigD" src="${image}">
            </div>
        `).join('');

        htmlContent += `
        <div color="white" class="sc-ftTHYK ckqRfQ" style="padding: 10px 16px;">
            <div class="sc-ftTHYK ckqRfQ Comment__FlexRow-sc-1ju5q0e-1 cTbiMl Comment__FlexRow-sc-1ju5q0e-1 cTbiMl" color="white">
                <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" iconsize="16" class="sc-pyfCe gdsYQw">
                    <path d="M20 40c11.046 0 20-8.954 20-20S31.046 0 20 0 0 8.954 0 20s8.954 20 20 20Z" fill="#F7F9FF"></path>
                    <mask id="user_svg__a" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                        <path d="M20 40c11.046 0 20-8.954 20-20S31.046 0 20 0 0 8.954 0 20s8.954 20 20 20Z" fill="#F7F9FF"></path>
                    </mask>
                    <g mask="url(#user_svg__a)">
                        <path d="M27.222 15.222C27.222 11.24 23.982 8 20 8s-7.222 3.24-7.222 7.222c0 3.983 3.24 7.222 7.222 7.222s7.222-3.24 7.222-7.222ZM20 22.444c-7.168 0-13 5.832-13 13v1.354c0 .41.175.802.48 1.076C11 41.027 15.446 42.763 20 42.763s9.001-1.736 12.52-4.89c.305-.273.48-.664.48-1.075v-1.354c0-7.168-5.832-13-13-13Z" fill="#D6E2FF"></path>
                    </g>
                </svg>
                <span font-size="13px" font-weight="demi" color="greyT1" class="sc-eDvSVe jSwkON">${randomFirstName} ${randomLastName}</span>
            </div>
            <div class="sc-ftTHYK dIZdpq Comment__FlexRow-sc-1ju5q0e-1 cTbiMl Comment__FlexRow-sc-1ju5q0e-1 cTbiMl" color="white">
                <span label="${randomRating}" class="sc-eDWCr hOOymY">
                    <span font-size="13px" font-weight="demi" color="#ffffff" class="sc-eDvSVe eDLaPV">${randomRating}</span>
                    <svg width="8" height="8" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" ml="4" iconsize="10" class="sc-pyfCe hEOSRm">
                        <g clip-path="url(#clip0)">
                            <path d="M19.5399 6.85L13.6199 5.5L10.5099 0.29C10.3999 0.11 10.2099 0 9.99993 0C9.78993 0 9.59993 0.11 9.48993 0.29L6.37993 5.5L0.45993 6.85C0.25993 6.9 0.0899297 7.05 0.0299297 7.25C-0.0300703 7.45 0.00992969 7.67 0.14993 7.83L4.13993 12.4L3.58993 18.44C3.56993 18.65 3.65993 18.85 3.82993 18.98C3.99993 19.1 4.21993 19.13 4.41993 19.05L9.99993 16.64L15.5799 19.03C15.6599 19.06 15.7399 19.08 15.8099 19.08C15.8099 19.08 15.8099 19.08 15.8199 19.08C16.1199 19.09 16.4199 18.82 16.4199 18.48C16.4199 18.42 16.4099 18.36 16.3999 18.31L15.8499 12.4L19.8399 7.83C19.9799 7.67 20.0199 7.45 19.9799 7.25C19.9199 7.05 19.7599 6.9 19.5399 6.85Z" fill="white"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="20" height="20" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                </span>
                <span font-size="13px" font-weight="book" color="greyBase" class="sc-eDvSVe jjjvce">Posted on ${randomDate}</span>
            </div>
            
            <div font-size="13px" font-weight="book" color="greyBase" class="sc-eDvSVe jYzkTh Comment__CommentText-sc-1ju5q0e-3 cfdxfJ Comment__CommentText-sc-1ju5q0e-3 cfdxfJ">${randomComment}</span>
            </div>

            <div color="white" class="sc-ftTHYK laxjno">
                <div class="sc-ftTHYK ckqRfQ MediaSection__FlexRow-sc-o6ljlw-0 bgQzYE MediaSection__FlexRow-sc-o6ljlw-0 bgQzYE" color="white">
                    ${imagesHTML} <!-- Insert the random images here -->
                </div>
            </div>

            <div class="sc-ftTHYK jSumTZ Comment__FlexRow-sc-1ju5q0e-1 cTbiMl Comment__FlexRow-sc-1ju5q0e-1 cTbiMl" color="white">
                <svg viewBox="0 0 16 16" fill="greyT1" xmlns="http://www.w3.org/2000/svg" size="16" iconsize="20" class="sc-pyfCe fQNEJD">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.712 5.245 8.68 1.13a1.039 1.039 0 0 1 1.51-.008c.258.268.366.647.294 1.018l-.68 3.402h4.046c1.54 0 2.578 1.635 1.977 3.106L13.492 14.3c-.229.542-.745.899-1.318.899H5.73c-.788 0-1.432-.669-1.432-1.486V6.293c0-.394.15-.773.415-1.048Zm-1.847 8.471c0 .818-.645 1.486-1.433 1.486-.787 0-1.432-.668-1.432-1.486V7.773c0-.817.645-1.486 1.432-1.486.788 0 1.433.67 1.433 1.486v5.943Z" fill="#666"></path>
                </svg>
                <p font-size="13px" font-weight="book" color="greyT1" class="sc-eDvSVe jxplze">Helpful (${helpfulCount})</p>
            </div>
        </div>
        <div class="sc-ksBlkl cTXbpL"></div>`;
    }

    return htmlContent;
}

// Generate 5 random comments and insert them into the comments container
const commentsHTML = createRandomComments(5);
document.getElementById('comments-container').innerHTML = commentsHTML;
</script>

<div class="sc-ftTHYK jprYTe ReviewRatingSummary__ViewAll-sc-1a11wne-0 jeUArv ReviewRatingSummary__ViewAll-sc-1a11wne-0 jeUArv" color="white" style="padding: 10px 16px;"><button color="#9F2089" font-size="13px" class="sc-ksBlkl kscNpO">
        <div class="sc-hBxehG ecKRxp"><span font-size="13px" font-weight="bold" color="#9F2089" class="sc-eDvSVe EyLTQ sc-iBYQkv dunyzP sc-iBYQkv dunyzP">View all reviews &nbsp;</span></div>
    </button><svg width="20" height="20" fill="pinkBase" xmlns="http://www.w3.org/2000/svg" iconsize="20" class="sc-pyfCe bbkPXD">
        <path d="M7.31 4.316a1.079 1.079 0 0 0 0 1.515l4.125 4.17-4.124 4.17a1.079 1.079 0 0 0 0 1.515 1.05 1.05 0 0 0 1.499 0l4.88-4.933a1.079 1.079 0 0 0 0-1.515L8.81 4.305a1.06 1.06 0 0 0-1.5.01Z" fill="#666"></path>
    </svg></div>
    
    <div class="sc-ftTHYK hjHKtq Marketing__MarketingCard-sc-1ngqanf-0 bfehda Marketing__MarketingCard-sc-1ngqanf-0 bfehda" style="padding: 10px 16px;" color="white"><span class="Marketing__Divider-sc-1ngqanf-2 kuJlxX"></span>
    <div class="sc-ftTHYK ckqRfQ Marketing__TagCardStyled-sc-1ngqanf-1 eAgvXz Marketing__TagCardStyled-sc-1ngqanf-1 eAgvXz" color="white">
        <div class="sc-ftTHYK ckqRfQ Marketing__ImageContainer-sc-1ngqanf-4 iLRKFY Marketing__ImageContainer-sc-1ngqanf-4 iLRKFY" color="white"><img alt="Lowest Price" loading="lazy" width="40" height="40" decoding="async" data-nimg="1" style="color:transparent" src="https://images.meesho.com/images/value_props/lowest_price_new.png"></div><span font-size="11px" font-weight="book" color="greyBase" class="sc-eDvSVe qHUyq Marketing__Caption2Styled-sc-1ngqanf-3 igXNZB Marketing__Caption2Styled-sc-1ngqanf-3 igXNZB">Lowest Price</span>
    </div><span class="Marketing__Divider-sc-1ngqanf-2 kuJlxX"></span>
    <div class="sc-ftTHYK ckqRfQ Marketing__TagCardStyled-sc-1ngqanf-1 eAgvXz Marketing__TagCardStyled-sc-1ngqanf-1 eAgvXz" color="white">
        <div class="sc-ftTHYK ckqRfQ Marketing__ImageContainer-sc-1ngqanf-4 iLRKFY Marketing__ImageContainer-sc-1ngqanf-4 iLRKFY" color="white"><img alt="Cash on Delivery" loading="lazy" width="40" height="40" decoding="async" data-nimg="1" style="color:transparent" src="https://images.meesho.com/images/value_props/cod_new.png"></div><span font-size="11px" font-weight="book" color="greyBase" class="sc-eDvSVe qHUyq Marketing__Caption2Styled-sc-1ngqanf-3 igXNZB Marketing__Caption2Styled-sc-1ngqanf-3 igXNZB">Cash on Delivery</span>
    </div><span class="Marketing__Divider-sc-1ngqanf-2 kuJlxX"></span>
    <div class="sc-ftTHYK ckqRfQ Marketing__TagCardStyled-sc-1ngqanf-1 eAgvXz Marketing__TagCardStyled-sc-1ngqanf-1 eAgvXz" color="white">
        <div class="sc-ftTHYK ckqRfQ Marketing__ImageContainer-sc-1ngqanf-4 iLRKFY Marketing__ImageContainer-sc-1ngqanf-4 iLRKFY" color="white"><img alt="7-day Returns" loading="lazy" width="40" height="40" decoding="async" data-nimg="1" style="color:transparent" src="https://images.meesho.com/images/value_props/return_new.png"></div><span font-size="11px" font-weight="book" color="greyBase" class="sc-eDvSVe qHUyq Marketing__Caption2Styled-sc-1ngqanf-3 igXNZB Marketing__Caption2Styled-sc-1ngqanf-3 igXNZB">7-day Returns</span>
    </div><span class="Marketing__Divider-sc-1ngqanf-2 kuJlxX"></span>
    </div>

    <div class="products" style="background-color: #fff;">
        <h4 font-size="21px" font-weight="book" color="greyBase" class="sc-gswNZR wDrko">Products For You</h4>
        <div class="product-list">
            <?php
            $this->db->order_by('RAND()');
            $this->db->limit(6);
            $products = $this->model->get_all_records("tbl_product", ["is_show" => 1]);

            foreach ($products as $key => $product_details) {
            ?>
                <a href="<?= base_url("product/" . md5(@$product_details['id']));  ?>" class="product-card">
                    <!-- <div class="product-img" style="background-image:url('<?= @$product_details['img1'] ?>')"></div> -->
                    <div class="product-img">
                        <img src="" alt="" loading="lazy" class="custom_lazyload" decoding="async" data-original="<?= @$product_details['img1'] ?>">
                    </div>
                    <div class="product-details">
                        <h3 class="product-name"><?= @$product_details['name']; ?></h3>
                        <div class="product-price">
                            <span class="sell-price">₹<?= @$product_details['selling_price']; ?></span>
                            <span class="mrp-price line-through">₹<?= @$product_details['mrp'] ?></span>
                            <?php
                            @$product_details['mrp'] = (intval(@$product_details['mrp']) > 0) ? @$product_details['mrp'] : 999;
                            $remain_percentage = (@$product_details['selling_price'] * 100) / (@$product_details['mrp']);
                            $offer_percentage = round(100 - $remain_percentage);
                            ?>
                            <span class="off-percentage m-0"><?= @$offer_percentage; ?>% off</span>
                        </div>

                        <span class="NewProductCardstyled__OfferPill-sc-6y2tys-31 iMEkWH"><svg viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" iconSize="12" class="sc-bcXHqe eqGISc">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6A6 6 0 1 1 0 6a6 6 0 0 1 12 0ZM5.168 9.008l.8.17L3.554 6.49l-.005-.75h1.298c.383 0 .687-.076.91-.228.225-.152.375-.352.45-.6h-2.76l.261-.892h2.478c-.167-.507-.62-.76-1.36-.76h-1.38l.277-1h4.834l-.262.897H7.176c.174.245.287.533.338.863h1.037l-.257.891H7.52c-.076.54-.301.952-.678 1.238-.376.286-.908.457-1.596.512L6.88 8.493l.064-.826a.41.41 0 0 1 .437-.375.403.403 0 0 1 .373.436L7.59 9.88l-.004.012-.004.013a.42.42 0 0 1-.03.104l-.001.005a.263.263 0 0 1-.017.037.288.288 0 0 1-.011.031c-.018.026-.039.045-.06.065a.07.07 0 0 0-.006.008c-.004.004-.007.009-.013.012a.433.433 0 0 1-.12.068.417.417 0 0 1-.155.023c-.005.002-.01.003-.015.002-.019-.002-.037-.006-.054-.01l-2.102-.445a.407.407 0 0 1 .17-.797Z" fill="#219653"></path>
                            </svg><span font-size="10px" font-weight="demi" color="greenBase" class="sc-gswNZR bjrKWS">₹<?= rand(999, 4999); ?> with <?= rand(1, 3); ?> Special Offers</span></span>
                        <p class="free-delivery">Free Delivery</p>

                        <div class="sc-kDvujY jTuxux NewProductCardstyled__RatingsRow-sc-6y2tys-8 heKerA NewProductCardstyled__RatingsRow-sc-6y2tys-8 heKerA" color="white">
                            <div class="NewProductCardstyled__RatingSection-sc-6y2tys-9 fyvrGC"><span label="4.3" class="sc-fbYMXx jUvjLH"><span font-size="13px" font-weight="demi" color="#ffffff" class="sc-gswNZR jrrvJf"><?= number_format(mt_rand(40, 50) / 10, 1); ?></span><svg width="8" height="8" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" ml="4" iconSize="10" class="sc-bcXHqe cyUZOu">
                                        <g clip-path="url(#clip0)">
                                            <path d="M19.5399 6.85L13.6199 5.5L10.5099 0.29C10.3999 0.11 10.2099 0 9.99993 0C9.78993 0 9.59993 0.11 9.48993 0.29L6.37993 5.5L0.45993 6.85C0.25993 6.9 0.0899297 7.05 0.0299297 7.25C-0.0300703 7.45 0.00992969 7.67 0.14993 7.83L4.13993 12.4L3.58993 18.44C3.56993 18.65 3.65993 18.85 3.82993 18.98C3.99993 19.1 4.21993 19.13 4.41993 19.05L9.99993 16.64L15.5799 19.03C15.6599 19.06 15.7399 19.08 15.8099 19.08C15.8099 19.08 15.8099 19.08 15.8199 19.08C16.1199 19.09 16.4199 18.82 16.4199 18.48C16.4199 18.42 16.4099 18.36 16.3899 18.31L15.8499 12.38L19.8399 7.81C19.9799 7.65 20.0199 7.43 19.9599 7.23C19.9099 7.04 19.7399 6.89 19.5399 6.85Z" fill="#ffffff"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="20" height="19.08" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg></span><span font-size="11px" font-weight="book" color="greyT2" class="sc-gswNZR gTFgDk NewProductCardstyled__RatingCount-sc-6y2tys-21 jZyLzI NewProductCardstyled__RatingCount-sc-6y2tys-21 jZyLzI">(<?= rand(1000, 5454); ?>)</span></div><svg width="55" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" iconSize="20" class="sc-bcXHqe fUjwpe">
                                <path d="M9.901 5.496a2 2 0 0 1 2-2h41.6a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-41.6a2 2 0 0 1-2-2v-9Z" fill="#FFE7FB"></path>
                                <path d="M24.712 6H19.5v1.03h2.052v5.843h1.12V7.03h2.041V6ZM24.698 8.229v4.644h1.06v-2.17c0-1.09.52-1.532 1.228-1.532a.95.95 0 0 1 .353.06V8.198a.85.85 0 0 0-.363-.068c-.55 0-1.031.314-1.267.844h-.02v-.746h-.991ZM32.226 12.873V8.229h-1.07v2.67c0 .697-.481 1.188-1.09 1.188-.56 0-.884-.383-.884-1.1V8.23h-1.06v2.975c0 1.129.628 1.816 1.63 1.816.658 0 1.188-.314 1.443-.766h.05v.619h.981ZM35.25 13.02c1.1 0 1.846-.59 1.846-1.532 0-1.855-2.543-1.03-2.543-2.052 0-.304.236-.55.698-.55.422 0 .765.246.814.59l.992-.207c-.167-.706-.893-1.188-1.836-1.188-1.03 0-1.728.57-1.728 1.434 0 1.856 2.543 1.03 2.543 2.052 0 .393-.265.658-.756.658-.481 0-.874-.255-.992-.668l-.972.197c.226.795.943 1.266 1.934 1.266ZM40.083 12.97c.343 0 .638-.058.795-.136l-.118-.855a.992.992 0 0 1-.471.099c-.501 0-.747-.226-.747-.914V9.132h1.287v-.903h-1.287V6.746l-1.07.206V8.23h-.844v.903h.844v2.21c0 1.207.658 1.629 1.61 1.629ZM45.823 11.744l-.894-.265c-.206.422-.589.657-1.09.657-.746 0-1.256-.53-1.355-1.305h3.525v-.265c-.02-1.6-1.03-2.485-2.297-2.485-1.365 0-2.308 1.07-2.308 2.485 0 1.403.992 2.454 2.425 2.454.933 0 1.61-.442 1.994-1.276ZM43.73 8.906c.6 0 1.12.373 1.169 1.198h-2.406c.118-.766.56-1.198 1.237-1.198ZM46.776 10.556c0 1.463.923 2.464 2.17 2.464.619 0 1.237-.255 1.542-.854h.03v.707h.981V6h-1.07v2.828c-.246-.432-.766-.747-1.463-.747-1.247 0-2.19.992-2.19 2.475Zm1.07 0c0-.874.501-1.542 1.316-1.542.805 0 1.296.638 1.296 1.542 0 .893-.49 1.522-1.296 1.522-.795 0-1.315-.648-1.315-1.522Z" fill="#9F2089"></path>
                                <path d="M16.5 3.239 9.027.059a.746.746 0 0 0-.585 0L.969 3.24a.782.782 0 0 0-.47.721v6.36c0 5.321 3.139 7.611 7.947 9.622a.746.746 0 0 0 .576 0c4.809-2.01 7.948-4.3 7.948-9.622V3.96c0-.316-.186-.6-.47-.721Z" fill="#FFE7FB"></path>
                                <path d="m15.748 3.894-6.75-2.871a.673.673 0 0 0-.528 0l-6.75 2.87a.706.706 0 0 0-.424.652v5.745c0 4.806 2.835 6.874 7.178 8.69.167.07.353.07.52 0 4.343-1.816 7.178-3.884 7.178-8.69V4.545a.706.706 0 0 0-.424-.651Z" fill="#60014A"></path>
                                <path d="M10.852 6.455c.804.006 1.482.28 2.04.817.565.54.843 1.185.837 1.946l-.023 3.58c-.003.426-.37.77-.824.77-.45-.003-.814-.35-.81-.777l.022-3.58a1.098 1.098 0 0 0-.367-.85 1.216 1.216 0 0 0-.885-.35 1.247 1.247 0 0 0-.921.372c-.23.227-.344.54-.347.856l-.02 3.528c-.003.432-.376.782-.833.78-.458-.004-.828-.357-.824-.79l.022-3.548c.004-.31-.11-.617-.334-.844a1.254 1.254 0 0 0-.918-.378 1.253 1.253 0 0 0-.892.34c-.24.23-.37.513-.37.845l-.022 3.576c-.004.43-.373.777-.827.774-.455-.003-.818-.353-.815-.783l.023-3.564c.003-.66.25-1.308.714-1.799.6-.632 1.34-.948 2.199-.942.82.006 1.521.285 2.082.853.578-.565 1.272-.835 2.093-.832Z" fill="#FF9D00"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            <?php } ?>

            <div class="d-none" id="not-found">
                <center class="my-5">
                    <h1>No Search Found!!!</h1>
                </center>
            </div>

        </div>
    </div>

    <div class="button-container flex">
        <button class="buynow-button buynow-button-white product-page-buy add_cart" onclick="add_to_cart()">
            <svg width="21" height="21" fill="none" xmlns="http://www.w3.org/2000/svg" ml="4" mr="4" iconsize="20" class="sc-gswNZR egWgdn">
                <g clip-path="url(#cart_svg__a)">
                    <path fill="#fff" d="M.394.479h20v20h-20z"></path>
                    <g clip-path="url(#cart_svg__b)">
                        <g clip-path="url(#cart_svg__c)">
                            <path d="M4.396 4.293h15.139c.507 0 .907.491.849 1.046l-.762 7.335c-.068.619-.536 1.1-1.102 1.12l-12.075.492-2.05-9.993Z" fill="#C53EAD"></path>
                            <path d="M10.193 20.478c.674 0 1.22-.598 1.22-1.335s-.546-1.334-1.22-1.334c-.674 0-1.22.597-1.22 1.334 0 .737.546 1.335 1.22 1.335ZM15.181 20.478c.674 0 1.22-.598 1.22-1.335s-.546-1.334-1.22-1.334c-.674 0-1.22.597-1.22 1.334 0 .737.546 1.335 1.22 1.335Z" fill="#9F2089"></path>
                            <path d="M1.126 3.28 4.152 4.7 6.68 16.784c.127.608.615 1.035 1.18 1.035h9.615" stroke="#9F2089" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </g>
                </g>
                <defs>
                    <clipPath id="cart_svg__a">
                        <path fill="#fff" transform="translate(.394 .479)" d="M0 0h20v20H0z"></path>
                    </clipPath>
                    <clipPath id="cart_svg__b">
                        <path fill="#fff" transform="translate(.394 .479)" d="M0 0h20v20H0z"></path>
                    </clipPath>
                    <clipPath id="cart_svg__c">
                        <path fill="#fff" transform="translate(.394 2.479)" d="M0 0h20v18H0z"></path>
                    </clipPath>
                </defs>
            </svg>
            Add to Cart
        </button>
        <button class=" buynow-button product-page-buy buy_now" onclick="add_to_cart('buyNow')">
            <svg width="21" height="21" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" ml="4" mr="4" stroke="transparent" btntype="solid" class="sc-gswNZR dXbsni PdpFooter__SolidButtonBigStyled-sc-rnhxff-1 kEhBpR" iconsize="20">
                <path d="M1.894 4.546v11.796a.5.5 0 0 0 .837.369l6.74-6.18a.5.5 0 0 0-.017-.752l-6.74-5.617a.5.5 0 0 0-.82.384ZM11.894 4.546v11.796a.5.5 0 0 0 .837.369l6.74-6.18a.5.5 0 0 0-.017-.752l-6.74-5.617a.5.5 0 0 0-.82.384Z" fill="#fff"></path>
            </svg>
            Buy Now
        </button>
    </div>

</div>


<style>
    .only-desktop {
        display: block !important;
        height: 100% !important;
    }

    .product-details img {
        max-width: 100%;
    }

    .share-icon {
        width: 30px;
        height: 30px;
        display: block;
        /* background-color: #fff; */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 20px 20px;
        border-radius: 30px;
        position: absolute;
        right: 0;
        /* border: 1px solid #eee; */
        padding: 20px;
        border-radius: 50%;
        z-index: 1;
        top: 6px;
    }

    .eeldyg.eeldyg {
        margin-bottom: 8px;
    }

    .iGlGaV {
        background-color: rgb(255, 255, 255);
        border-radius: 0px;
        margin-bottom: 8px;
        padding: 20px 16px;
        border-top: 5px solid #eaeaf2;
        border-bottom: 5px solid #eaeaf2;
    }

    .keaMtN.keaMtN {
        margin-bottom: 16px;
    }

    .hmRtgo {
        color: rgb(53, 53, 67);
        font-style: normal;
        font-weight: 700;
        font-size: 17px;
        line-height: 20px;
        font-family: "Mier bold";
        margin: 0px;
        padding: 0px;
    }

    .hnbNOX {
        display: flex;
        flex-wrap: wrap;
    }

    .dqLmGj {
        background: rgb(255, 255, 255);
        padding: 6px 16px;
        border-radius: 40px;
        border: 1px solid rgb(53, 53, 67);
        margin: 6px 12px 6px 0px;
        min-width: 46px;
        height: 32px;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        position: relative;
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
    }

    .iwPwcX {
        color: rgb(53, 53, 67);
        font-style: normal;
        font-weight: 600;
        font-size: 15px;
        line-height: 20px;
        font-family: "Mier demi";
        text-align: center;
        margin: 0px;
        padding: 0px;
    }
</style>

<script type="text/javascript">
    BASEURL = "<?= base_url(); ?>";

    function manage_color_click(that, color, keys, color_id, all_images) {
        $(".color-item").removeClass('active');
        that.addClass("active");
        var images = all_images.split(',');
        var active_color = 0;
        images.forEach(function(image_url, i) {
            if (image_url != "") {
                c_index = i + 1;
                $(".slider-item-" + c_index).attr('src', image_url);
            }
        });
        $(".main_image  ").addClass('active');

        if ($(".storage-item.active").length == 0) {
            $(".mrp").text("₹" + that.attr("data-mrp")).attr("data-mrp", that.attr("data-mrp"));
            $(".price").text("₹" + that.attr("data-selling-price")).attr("data-price", that.attr("data-selling-price"));
        }
    }

    function add_to_cart(CartEvent = "") {

        products = [];
        if (localStorage.getItem('products')) {
            products = JSON.parse(localStorage.getItem('products'));
        }

        price = parseInt($('.price').attr("data-price"));
        mrp_price = parseInt($('.mrp').attr("data-mrp"));
        product_id = $('.product-title').attr("data-id");
        product_title = $('.product-title').html();
        discount_percentage = $('.discount').html();
        discount_amount = (mrp_price - price);
        product_img = $('.main_image').attr('src');
        color = $('.color-item.active').find('span').text();
        size = $('.dress-size.active').find('span').text();
        storage = $('.storage-item.active').find('span').text();

        is_added_product = 0;
        is_buyNew_product = 0;
        if (products.length > 0) {
            for (index = 0; index < products.length; index++) {
                products[index]['index'] = index;
                if (products[index]['product_id'] == product_id) {
                    if (products[index]['size'] == size) {
                        // if (CartEvent != "buyNow") {
                        //     products[index]['qty'] = products[index]['qty'] + 1;
                        // }
                        is_added_product = 1;
                        break;
                    }
                }
            }
        }
        if (!is_added_product) {
            products.push({
                'index': products.length,
                'product_id': product_id,
                'product_title': product_title,
                'discount_percentage': discount_percentage,
                'discount_amount': discount_amount,
                'product_img': product_img,
                'color': color,
                'size': size,
                'storage': storage,
                'mrp': mrp_price,
                'price': price,
                "qty": 1
            });
        }

        localStorage.setItem('products', JSON.stringify(products));
        CartList();
        if (CartEvent == "buyNow") {
            window.location.href = BASEURL + "cart";
        } else {
            openNav();
        }
    }

    function manage_storage_click(that, class_name) {
        $(".storage-item").removeClass("active");
        $("." + class_name).addClass("active");
        $(".mrp").text("₹" + that.attr("data-mrp")).attr("data-mrp", that.attr("data-mrp"));
        $(".price").text("₹" + that.attr("data-selling-price")).attr("data-price", that.attr("data-selling-price"));
    }

    function manage_size_click(that, class_name) {
        $(".dress-size").removeClass("active");
        that.addClass("active");
    }
</script>