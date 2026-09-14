<?php

$remain_percentage = (@$product_details['selling_price'] * 100) / (@$product_details['mrp'] ?? 1);
$offer_percentage = round(100 - $remain_percentage);
?>
<div class="_1fhgRH mb-5">
    <!-- <div>
        <div class="blog-breadcrumbs">
            <ul class="cd-breadcrumb">
                <li class="home-breadcrumb">
                    <a aria-label="home" href="<?= base_url(); ?>" class="underline-a">Home</a>
                </li>
                <li class="current"><?= @$product_details['name']; ?></li>
            </ul>
        </div>
    </div> -->
    <div class="container p-1 card">

        <span class="share-icon" style="background-image: url('https://cdn.shopify.com/s/files/1/0057/8938/4802/files/share_icon_1.png?v=1689752691');"></span>
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


        <div class="container-fluid">
            <?php if (counts(@$product_details['colors'])) {  ?>
                <div class="color-div">
                    <h4>Select Color</h4>
                    <div class="color-list p-2">

                        <?php
                        foreach ($product_details['colors'] as  $c_key => $colors) {

                            if ($c_key == 0) {
                                $color_active = "active";
                            } else {
                                $color_active = "false";
                            }
                        ?>
                            <div class="color-box color-item p-2 me-2 <?= @$color_active; ?>" data-mrp="<?= @$colors['mrp']; ?>" data-selling-price="<?= @$colors['selling_price']; ?>" onclick="manage_color_click($(this),'<?= $colors['color_name']; ?>','<?= $c_key; ?>',<?= $c_key; ?>, '<?= @$colors['img1']; ?>,<?= @$colors['img2']; ?>,<?= @$colors['img3']; ?>,<?= @$colors['img4']; ?>,<?= @$colors['img5']; ?>');">
                                <!-- <div style="background-color: <?= $colors['color_code']; ?>" class="color-round  color-item-box"></div> -->
                                <img src="<?= @$colors['img1']; ?>" alt="img0" class="color_img_0">
                                <span class="color-name"><?= $colors['color_name']; ?></span>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                
            <?php } ?>

            <?php
            if (@$product_details['category_name'] == "Dress") { ?>
                <div class="storage-div mt-3">
                    <h4>Select Size</h4>
                    <div class="storage-list p-2">
                        <div class="storage-item dress-size p-2 me-2 mb-2 active" onclick="manage_size_click($(this))">
                            <span>XS</span>
                        </div>
                        <div class="storage-item dress-size p-2 me-2 mb-2" onclick="manage_size_click($(this))">
                            <span>S</span>
                        </div>
                        <div class="storage-item dress-size p-2 me-2 mb-2" onclick="manage_size_click($(this))">
                            <span>M</span>
                        </div>
                        <div class="storage-item dress-size p-2 me-2 mb-2" onclick="manage_size_click($(this))">
                            <span>L</span>
                        </div>
                        <div class="storage-item dress-size p-2 me-2 mb-2" onclick="manage_size_click($(this))">
                            <span>XL</span>
                        </div>
                        <div class="storage-item dress-size p-2 me-2 mb-2" onclick="manage_size_click($(this))">
                            <span>XXL</span>
                        </div>
                        <div class="storage-item dress-size p-2 me-2 mb-2" onclick="manage_size_click($(this))">
                            <span>3XL</span>
                        </div>
                        <div class="storage-item dress-size p-2 me-2 mb-2" onclick="manage_size_click($(this))">
                            <span>4XL</span>
                        </div>
                        <div class="storage-item dress-size p-2 me-2 mb-2" onclick="manage_size_click($(this))">
                            <span>5XL</span>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="container-fluid p-0 mt-2">
                <div class="product-title" data-id="<?= @$product_details['id']; ?>"><?= @$product_details['name']; ?></div>
                <div class="product-price d-flex my-2">
                    <span class="discount"><?= @$offer_percentage; ?>% off</span>
                    <span class="mrp" data-mrp="<?= @$product_details['mrp']; ?>">₹<?= @$product_details['mrp']; ?></span>
                    <span class="price" data-price="<?= @$product_details['selling_price']; ?>">₹<?= @$product_details['selling_price']; ?></span>
                </div>


                <div class="aMaAEs">
                    <div class="_3Zuayz">
                        <div class="_3_L3jD">
                            <div class="gUuXy- _16VRIQ _1eJXd3">
                                <span id="productRating_LSTETHFZZUWAC8X2PGQZ7T8VQ_ETHFZZUWAC8X2PGQ_" class="_1lRcqv">
                                    <div class="_3LWZlK _3uSWvT">4<img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMyIgaGVpZ2h0PSIxMiI+PHBhdGggZmlsbD0iI0ZGRiIgZD0iTTYuNSA5LjQzOWwtMy42NzQgMi4yMy45NC00LjI2LTMuMjEtMi44ODMgNC4yNTQtLjQwNEw2LjUuMTEybDEuNjkgNC4wMSA0LjI1NC40MDQtMy4yMSAyLjg4Mi45NCA0LjI2eiIvPjwvc3ZnPg==" class="_1wB99o _19cuvx"></div>
                                </span>
                                <span class="_2_R_DZ"><span><?= rand(100, 1000); ?> ratings and <?= rand(10, 100); ?> reviews</span></span>
                            </div>
                        </div>
                        <span class="b7864- _2Z07dN">
                            <img height="25" src="https://rukminim2.flixcart.com/www/110/28/promos/07/06/2022/afa33081-fdc2-4dac-af42-7f99ff316372.png" class="jMnjzX pZkvcx">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <img class="mt-4" src="<?= base_url();  ?>/assets/website/images/pay-latter.jpg" alt="pay-latter">
        <img class="" src="<?= base_url();  ?>/assets/website/images/review.jpg" alt="review">

    </div>

    <div class="container-fluid product-detail px-0 py-3 mb-4 card" style="margin-top: 3px;">
        <h3 class="ui2-heading px-2 text-center">Product<span>&nbsp;<b>Details</b>
                <sale></sale>
            </span></h3>
        <div class="product-details">
            <?php
            // echo @$product_details['fetaures'];
            if (@$product_details['fetaures']) {
                // Function to fix HTML using DOMDocument
                function fixHtmlWithDom($html)
                {
                    $dom = new DOMDocument();

                    // Load HTML content into DOMDocument
                    libxml_use_internal_errors(true); // Disable libxml errors
                    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    libxml_clear_errors(); // Clear libxml errors

                    // Save HTML content back to string format, which will help in fixing the incomplete or improperly formatted HTML
                    $fixedHtml = $dom->saveHTML();

                    return $fixedHtml;
                }

                // Fix the HTML content using DOMDocument
                $fixedHtml = fixHtmlWithDom(@$product_details['fetaures']);

                // Display the fixed HTML content
                echo $fixedHtml;
            } else {

                echo "<center><h5>Product Details Not found!!</h5></center>";
            }
            ?>
        </div>
    </div>
    <!-- <div class="categories">
        <div class="cat-list">
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
    </div> -->
    <div class="button-container flex">
        <button class="buynow-button buynow-button-white product-page-buy add_cart" onclick="add_to_cart()">
            Add to Cart
        </button>
        <button class=" buynow-button product-page-buy add_cart" onclick="add_to_cart('buyNow')"> Buy Now </button>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url("assets/website/css/boat-product.css") ?>">
<link rel="stylesheet" href="<?= base_url("assets/website/css/custom.css") ?>">

<style>
    .only-desktop {
        display: block !important;
        height: 100% !important;
    }

    .product-details img {
        max-width: 100%;
    }

    .carousel-indicators {
        column-gap: 10px;
        background: #8282822b;
        padding: 6px;
        border-radius: 29px;
        width: auto;
        margin: auto;
        margin-bottom: 20px;
        max-width: 140px;
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
        storage = $('.storage-item.active').find('span').text();

        is_added_product = 0;
        is_buyNew_product = 0;
        if (products.length > 0) {
            for (index = 0; index < products.length; index++) {
                products[index]['index'] = index;
                if (products[index]['product_id'] == product_id) {
                    if (products[index]['color'] == color && products[index]['storage'] == storage) {
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
                'storage': storage,
                'mrp': mrp_price,
                'price': price,
                "qty": 1
            });
        }

        localStorage.setItem('products', JSON.stringify(products));
        CartList();
        if (CartEvent == "buyNow") {
            window.location.href = BASEURL + "address";
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
        $(".storage-item").removeClass("active");
        that.addClass("active");
    }
</script>

<style>
    body,
    a,
    p,
    span,
    div,
    input,
    button,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: 'Poppins', sans-serif !important;
    }

    .dress-size {
        min-width: 40px;
        text-align: center;
    }
</style>