<div class="categories">
    <div class="cat-list">
        <a class="category" href="<?= base_url(); ?>">
            <img src="https://images.meesho.com/images/marketing/1594489152649_100.webp" alt="Categories">
            <p>Categories</p>
        </a>
        <!-- <a class="category" href="<?= base_url(); ?>">
            <img src="https://rukminim2.flixcart.com/flap/138/130/image/0f3d008be60995d4.jpg?q=60" alt="Offer Zone">
        </a> -->
        <?php
        $this->db->order_by("index", "asc");
        $categories = $this->model->get_all_records("category");
        foreach ($categories as $key => $category) {
        ?>
            <a class="category" href="<?= base_url("category/" . @$category['unique_id']); ?>">
                <img src="<?= @$category['cat_img'] ?>" alt="<?= @$category['cat_name'] ?>">
                <p><?= @$category['cat_name']; ?></p>
            </a>
        <?php } ?>
    </div>
</div>

<img src="https://images.meesho.com/images/widgets/Y8HIH/2f53o.gif" alt="" class="w-100 mb-2">
<div class="_3lqN6b">
    <div class="WhKF32">
        <div class="IF3BzC">
            <div class="_1fhgRH">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 p-0">
                            <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> -->
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="https://images.meesho.com/images/marketing/1705665922742_600.webp" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="https://images.meesho.com/images/marketing/1705664942315_600.webp" alt="Second slide">
                                    </div>
                                    <!-- <div class="carousel-item">
                                        <img class="d-block w-100" src="https://rukminim2.flixcart.com/fk-p-flap/720/320/image/208c09e2dcc27a6d.jpg?q=60" alt="Third slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="https://rukminim2.flixcart.com/fk-p-flap/720/320/image/5837255c1412eec0.jpeg?q=60" alt="Fourth slide">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="menu">
    <div class="menu__item">
        <div class="marquee">
            <div class="marquee__inner">
                <span>Buy 2 Get 1 Free (Add 3 item to cart)</span>
                <span>&nbsp;</span>
                <span>Buy 2 Get 1 Free (Add 3 item to cart)</span>
                <span>&nbsp;</span>
                <span>Buy 2 Get 1 Free (Add 3 item to cart)</span>
                <span>&nbsp;</span>
                <span>Buy 2 Get 1 Free (Add 3 item to cart)</span>
                <span>&nbsp;</span>
                <span>Buy 2 Get 1 Free (Add 3 item to cart)</span>
            </div>
        </div>
    </div>
</nav>
<img src="https://images.meesho.com/images/widgets/OY6J5/xwgyl_800.webp" alt="" class="w-100 mb-2">

<div color="white" class="sc-bcXHqe eCQLMa">
    <div class="sc-bcXHqe fctQgp OfferTimerSubtitle__StyledSubtitleContainer-sc-9svgo6-0 JgdIi OfferTimerSubtitle__StyledSubtitleContainer-sc-9svgo6-0 JgdIi" color="white">
        <p font-weight="book" color="greyT1" class="sc-dkrFOg kZrHuA">Meesho Daily Deals
            <span><svg width="19" height="22" fill="none" xmlns="http://www.w3.org/2000/svg" iconSize="20" class="sc-bcXHqe bMWbfM">
                    <mask id="deal_svg__a" mask-type="alpha" maskUnits="userSpaceOnUse" x="1" y="0" width="17" height="22">
                        <path d="M5.198.795a.73.73 0 0 0-.699.522l-2.621 8.858a1.458 1.458 0 0 0 1.568 1.862l6.018-.708L6.835 19.8a1.089 1.089 0 0 0 1.944.929l8.174-12.206c.698-1.043-.16-2.423-1.405-2.257l-5.033.671 1.724-5.183a.73.73 0 0 0-.692-.96H5.198Z" fill="#fff"></path>
                    </mask>
                    <g mask="url(#deal_svg__a)">
                        <path fill="#E11900" d="M-.208.947H18.75v21.875H-.208z"></path>
                    </g>
                </svg>
            </span>
        </p>
        <div data-testid="offer-wrapper" class="OfferTimerstyled__StyledMediumOfferWrapper-sc-1otdyo0-0 eVLdcs">
            <img alt="Offer clock icon" loading="lazy" width="16" height="16" decoding="async" data-nimg="1" style="color:transparent;margin-right:4px" src="https://images.meesho.com/images/offer-widget-group-icon/T1W36/7tepb.png"><span font-size="13px" font-weight="demi" data-testid="offer-timer-text" class="sc-dkrFOg bZxmrh OfferTimer__Subtitle2Styled-sc-dfvdiq-1 jFYRpH OfferTimer__Subtitle2Styled-sc-dfvdiq-1 jFYRpH" color="pinkBase">00h : 00m : 00s</span>
        </div>
    </div>
</div>

<div class="products" id="products">
    <h4 font-size="21px" font-weight="book" color="greyBase" class="sc-gswNZR wDrko">Products For You</h4>
    <div class="product-list">
        <?php

        $this->db->order_by("index", "asc");
        $this->db->order_by("id", "asc");
        $this->db->where("is_show", 1);
        $products = $this->model->get_all_records("tbl_product");

        foreach ($products as $key => $product_details) {

            @$product_details['mrp'] = (intval(@$product_details['mrp']) > 0) ? @$product_details['mrp'] : 9999;

            $remain_percentage = (@$product_details['selling_price'] * 100) / (@$product_details['mrp']);
            $offer_percentage = round(100 - $remain_percentage);
        ?>

            <a href="<?= base_url("product/" . md5(@$product_details['id'])); ?>" class="product-card" data-id="<?= @$product_details['id']; ?>">
                <div class="product-img">
                    <img src="<?= @$product_details['img1']; ?>" alt="">
                </div>
                <div class="product-details">
                    <h3 class="product-name"><?= @$product_details['name']; ?></h3>
                    <div class="product-price">
                        <span class="sell-price">₹<?= @$product_details['selling_price']; ?></span>
                        <span class="mrp-price line-through">₹<?= @$product_details['mrp']; ?></span>
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

        <?php  }  ?>

        <!-- <div class="d-none" id="not-found">
            <center class="my-5">
                <h1>No Search Found!!!</h1>
            </center>
    </div> -->

    </div>
    <div class="product_loader"></div>
</div>

<script>
    $(document).ready(function() {

        // Set initial page number
        let page = 1;
        is_started = false;

        function showLoader() {
            $('.product_loader').show();
        }

        function hideLoader() {
            $('.product_loader').hide();
        }
        // // Function to fetch and append data
        // function fetchData() {
        //     showLoader(); // Show loader before AJAX call
        //     is_started = true;
        //     $.ajax({
        //         url: 'home/product?page=' + page, // Replace with your API endpoint
        //         method: 'GET',
        //         success: function(data) {

        //             hideLoader(); // Hide loader after appending data
        //             // Append data to the product-list div
        //             $('.product-list').append(data.html);

        //             // Increment the page number for the next request
        //             if (data.total_page > page) {
        //                 page++;
        //                 is_started = false;
        //             }
        //         },
        //         error: function(error) {
        //             console.error('Error fetching data:', error);
        //         }
        //     });
        // }

        // // Function to check if the user has scrolled to the bottom of the page
        // function isScrollAtBottom() {
        //     return $(window).scrollTop() + $(window).height() >= $(document).height() - 500;
        // }

        // // Event listener for scroll
        // $(window).scroll(function() {
        //     if (!is_started) {
        //         if (isScrollAtBottom()) {
        //             // Call the fetchData function when the user scrolls to the bottom
        //             fetchData();
        //         }
        //     }
        // });

        // // Initial call to fetch data
        // fetchData();



        // ------------- Banner Timer

        var hours = parseInt(localStorage.getItem('timerHours')) || 1;
        var minutes = parseInt(localStorage.getItem('timerMinutes')) || 15;
        var seconds = parseInt(localStorage.getItem('timerSeconds')) || 0;

        // Update the DOM with initial values
        // $(".js-timer-hours").text(String(hours).padStart(2, '0'));
        // $(".js-timer-minutes").text(String(minutes).padStart(2, '0'));
        // $(".js-timer-seconds").text(String(seconds).padStart(2, '0'));

        function countdown() {
            var interval = setInterval(function() {
                if (seconds > 0) {
                    seconds--;
                } else {
                    if (minutes > 0) {
                        minutes--;
                        seconds = 59;
                    } else {
                        if (hours > 0) {
                            hours--;
                            minutes = 59;
                            seconds = 59;
                        } else {
                            clearInterval(interval);
                            // alert('Countdown finished!');
                        }
                    }
                }

                // Store timer state in localStorage
                localStorage.setItem('timerHours', hours);
                localStorage.setItem('timerMinutes', minutes);
                localStorage.setItem('timerSeconds', seconds);

                // Format numbers to always have 2 digits
                var formattedHours = String(hours).padStart(2, '0');
                var formattedMinutes = String(minutes).padStart(2, '0');
                var formattedSeconds = String(seconds).padStart(2, '0');

                // Update the countdown display
                $(".jFYRpH").html(formattedHours + "h : " + formattedMinutes + "m : " + formattedSeconds + "s");
                // $(".js-timer-hours").text(formattedHours);
                // $(".js-timer-minutes").text(formattedMinutes);
                // $(".js-timer-seconds").text(formattedSeconds);
            }, 1000); // Update every 1000 milliseconds (1 second)
        }

        // Initial call
        countdown();
        // ------------- Banner Timer

        $('#search-input').on('keyup', function() {
            var searchText = $(this).val().toLowerCase(); // Get the input value and convert to lowercase
            total_product = $(".product-card").length;
            show_product = 0;
            $('.product-card').each(function() { // Loop through each list item
                var listItemText = $(this).find(".product-name").text().toLowerCase(); // Get the text content of the list item and convert to lowercase
                if (listItemText.includes(searchText)) { // Check if the list item contains the search text
                    show_product++;
                    $(this).show(); // Show the list item if it matches
                } else {
                    $(this).hide(); // Hide the list item if it does not match
                }
            });

            if (show_product == 0) {
                $("#not-found").removeClass("d-none");
            } else {
                $("#not-found").addClass("d-none");
            }

            if ($(this).val().length > 0) {
                $('#clear-button').css('visibility', 'visible'); // Show the clear button
            } else {
                $('#clear-button').css('visibility', 'hidden'); // Hide the clear button
            }
        });

        $('#clear-button').on('click', function() {
            $('#search-input').val('').keyup(); // Clear the input value
            $(this).css('visibility', 'hidden'); // Hide the clear button
        });
    })
</script>

<style>
    .product_loader {
        border: 7px solid #f3f3f3;
        border-top: 7px solid #9f2089;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 100px auto;
        display: none;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .menu {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 10px 0;
        --marquee-width: 100vw;
        --offset: 20vw;
        --move-initial: calc(-25% + var(--offset));
        --move-final: calc(-50% + var(--offset));
        --item-font-size: 10vw;
        counter-reset: menu;
        background: #970e71;
    }

    /* Make sure 3 items are visible in the viewport by setting suitable font size. */

    .marquee {
        /* position: absolute;
        top: 0;
        left: 0; */
        width: var(--marquee-width);
        overflow: hidden;
        pointer-events: none;
    }

    .marquee__inner {
        width: fit-content;
        display: flex;
        position: relative;
        transform: translate3d(var(--move-initial), 0, 0);
        animation: marquee 5s linear infinite;
        animation-play-state: paused;
        opacity: 0;
        transition: opacity 0.1s;
    }

    .marquee .marquee__inner {
        animation-play-state: running;
        opacity: 1;
        transition-duration: 0.4s;
    }

    .marquee span {
        text-align: center;
        white-space: nowrap;
        font-size: 18px;
        padding: 0 1vw;
        font-weight: 900;
        line-height: 1.15;
        color: #ffffff;
    }

    @keyframes marquee {
        0% {
            transform: translate3d(var(--move-initial), 0, 0);
        }

        100% {
            transform: translate3d(var(--move-final), 0, 0);
        }
    }
</style>