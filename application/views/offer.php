<div class="categories">
    <div class="cat-list">
        <!--<a class="category" href="<?= base_url(); ?>">-->
        <!--    <img src="https://images.meesho.com/images/marketing/1594489152649_100.webp" alt="Categories">-->
        <!--    <p>Categories</p>-->
        <!--</a>-->
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
<div style="max-width:900px; margin:20px auto; padding:0 12px;">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="border-radius:14px; overflow:hidden;">

        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">

            <div class="carousel-item">
                <img src="https://mir-s3-cdn-cf.behance.net/projects/404/22103193.548fbf7c2662d.jpg" alt="First slide" style="width:100%; height:auto; display:block;">
            </div>

            <div class="carousel-item active">
               <img src="https://mir-s3-cdn-cf.behance.net/projects/404/22103193.548fbf7c2662d.jpg" alt="Second slide" style="width:100%; height:auto; display:block;">
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

</div>
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
        <!--         
        <div class="d-none" id="not-found">
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
        // Function to fetch and append data
        function fetchData() {
            showLoader(); // Show loader before AJAX call
            is_started = true;
            $.ajax({
                url: 'home/product?page=' + page, // Replace with your API endpoint
                method: 'GET',
                success: function(data) {

                    hideLoader(); // Hide loader after appending data
                    // Append data to the product-list div
                    $('.product-list').append(data.html);

                    // Increment the page number for the next request
                    if (data.total_page > page) {
                        page++;
                        is_started = false;
                    }
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Function to check if the user has scrolled to the bottom of the page
        function isScrollAtBottom() {
            return $(window).scrollTop() + $(window).height() >= $(document).height() - 500;
        }

        // Event listener for scroll
        $(window).scroll(function() {
            if (!is_started) {
                if (isScrollAtBottom()) {
                    // Call the fetchData function when the user scrolls to the bottom
                    fetchData();
                }
            }
        });

        // Initial call to fetch data
        fetchData();



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

<!--  Popup ======================================= -->

<style>
    .offer-img {
        max-width: 300px;
        border-radius: 20px;
    }

    /* Style for the overlay */
    .popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 111;
    }

    /* Style for the popup */
    .popup {
        /* background-color: #fff; */
        /* padding: 20px; */
        position: relative;
        border-radius: 8px;
        text-align: center;
    }

    /* Style for the close icon */
    .popup-close-icon {
        position: absolute;
        top: -10px;
        right: -10px;
        cursor: pointer;
        background: #000000;
        padding: 4px 10px;
        border-radius: 50%;
        font-size: 14px;
        color: white;
    }
</style>

<div id="custom-popup" style="display:none; position:fixed; bottom:20px; right:20px; background-color:#333; color:#fff; padding:20px; border-radius:10px; z-index:9999; max-width:300px;">
  <span id="popup-close" style="position:absolute; top:5px; right:10px; cursor:pointer;">&#10006;</span>
  <h3 style="margin:0; color:#e91e63; font-weight:bold;">30% CASH BACK ON ORDER OFF 298</h3>
  <p style="margin:0; margin-top:5px; font-weight:bold;">OFFER VAILD ONLY TODAY</p>
</div>

<script>
  // Function to show popup
  function showPopup() {
    document.getElementById('custom-popup').style.display = 'block';
  }

  // Function to hide popup and set it to reappear
  function hidePopup() {
    document.getElementById('custom-popup').style.display = 'none';
    // Reappear after 5 seconds
    setTimeout(showPopup, 5000);
  }

  // Show popup first time after 1 second
  setTimeout(showPopup, 1000);

  // Close popup on click
  document.getElementById('popup-close').onclick = function(){
    hidePopup();
  }
</script>


<!-- Popup HTML structure -->
<div class="popup-overlay" onclick="closePopup()">
    <div class="popup" onclick="event.stopPropagation()">
        <span class="popup-close-icon" onclick="closePopup()">
            <i class="fa fa-times"></i>
        </span>
        <a href="<?= base_url("category/mobiles--watch"); ?>">
            <img src="<?= base_url("assets/website/images/new-offer.png") ?>" alt="Tagged Image" class="offer-img">
        </a>
    </div>
</div>


<script>
    $(document).ready(function() {

        // let reloadCount = parseInt(localStorage.getItem('reloadCount')) || 0;

        // if (reloadCount % 4 === 0) {
        //     setTimeout(() => {
        //         openPopup();
        //     }, 1000);
        // }

        localStorage.setItem('reloadCount', (reloadCount + 1).toString());
    })

    function openPopup() {
        document.querySelector('.popup-overlay').style.display = 'flex';
    }

    function closePopup() {
        document.querySelector('.popup-overlay').style.display = 'none';
    }
</script>