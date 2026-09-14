<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        isMobileDevice();
    }

    /* Dashbaord */

    public function index()
    {
    
        $data['load_page']      = "offer";
        $data['page_title']      = "Sale Sale Sale - Home";
        $data['show_nav']       = true;
        $data['hide_footer']    = false;
        $data['back_btn']       = false;
        $this->load->view("common_template/common", $data);
    }

    function product()
    {
        $page = @$_GET['page'];
        $limit = 30; // Number of products per page
        // Calculate the start

        $start = 0;

        if (is_numeric(@$page)) {
            if (@$page != 1) {
                $start = (@$page * $limit) - $limit;
            }
        }

        $this->db->limit($limit, $start);
        $this->db->order_by("index", "asc");
        // $this->db->order_by("RAND()");
        $this->db->order_by("id", "asc");
        $this->db->where("is_show", 1);
        $products = $this->model->get_all_records("tbl_product");
        $total_products = $this->model->counts("tbl_product",  ["is_show" => 1]);
        $total_page = ceil($total_products / $limit);

        $html = "";

        foreach ($products as $key => $product_details) {
           
            @$product_details['mrp'] = (intval(@$product_details['mrp']) > 0) ? @$product_details['mrp'] : 9999;

            $remain_percentage = (@$product_details['selling_price'] * 100) / (@$product_details['mrp']);
            $offer_percentage = round(100 - $remain_percentage);

            // <img src="" alt="" loading="lazy" class="custom_lazyload" decoding="async" data-original="' . @$product_details['img1'] . '">

            $html .= '<a href="' . base_url("product/" . md5(@$product_details['id'])) . '" class="product-card" data-id="' . @$product_details['id'] . '">
                <div class="product-img">
                    <img src="' . @$product_details['img1'] . '" alt="" >
                </div>
                <div class="product-details">
                    <h3 class="product-name">' . @$product_details['name'] . '</h3>
                    <div class="product-price">
                        <span class="sell-price">₹' . @$product_details['selling_price'] . '</span>
                        <span class="mrp-price line-through">₹' . @$product_details['mrp'] . '</span>
                        <span class="off-percentage m-0">' . @$offer_percentage . '% off</span>
                    </div>

                    <span class="NewProductCardstyled__OfferPill-sc-6y2tys-31 iMEkWH"><span font-size="10px" font-weight="demi" color="greenBase" class="sc-gswNZR bjrKWS">₹' . rand(145, 499) . ' with ' . rand(1, 3) . ' Special Offers</span></span>
                    
                    <span class="NewProductCardstyled__OfferPill-sc-6y2tys-31 iMEkWH"><svg viewBox="0 0 12 12" fill="#038D63" xmlns="http://www.w3.org/2000/svg" height="12" width="12" iconSize="20" class="sc-ftTHYK koHnMd"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.86 6.448a.795.795 0 0 0 .003-.895l-.726-1.051A.79.79 0 0 1 11 4.057l-.006-1.294a.764.764 0 0 0-.505-.725l-1.175-.404a.747.747 0 0 1-.365-.276L8.22.314a.718.718 0 0 0-.817-.277l-1.18.396a.7.7 0 0 1-.449 0L4.597.037a.717.717 0 0 0-.817.277l-.731 1.044a.728.728 0 0 1-.363.276l-1.177.404a.761.761 0 0 0-.503.725L1 4.057a.79.79 0 0 1-.137.445l-.726 1.05a.8.8 0 0 0 0 .896l.726 1.05A.79.79 0 0 1 1 7.943l.006 1.294c0 .33.203.622.503.725l1.177.404c.145.05.274.147.363.276l.731 1.044a.716.716 0 0 0 .817.277l1.177-.396a.701.701 0 0 1 .449 0l1.18.396c.3.101.628-.01.817-.277l.729-1.044a.747.747 0 0 1 .365-.276l1.175-.404a.764.764 0 0 0 .505-.725L11 7.943a.79.79 0 0 1 .137-.445l.723-1.05ZM8.119 3.877c-.2-.201-.526-.201-.726 0L3.876 7.392a.516.516 0 0 0 .729.727l3.514-3.515a.51.51 0 0 0 0-.727Zm-4.242 1.06a.75.75 0 1 0 1.06-1.06.75.75 0 0 0-1.06 1.06ZM8.12 8.118a.753.753 0 0 1-1.063 0 .753.753 0 0 1 0-1.06.753.753 0 0 1 1.063 0 .753.753 0 0 1 0 1.06Z"></path></svg><span font-size="10px" font-weight="demi" color="greenBase" class="sc-gswNZR new">₹' . rand(99, 499) . ' off' . ' |' .  ' Order NOW</span></span>
                    <p class="free-delivery">Free Delivery</p>

                    <div class="sc-kDvujY jTuxux NewProductCardstyled__RatingsRow-sc-6y2tys-8 heKerA NewProductCardstyled__RatingsRow-sc-6y2tys-8 heKerA" color="white">
                        <div class="NewProductCardstyled__RatingSection-sc-6y2tys-9 fyvrGC"><span label="4.3" class="sc-fbYMXx jUvjLH"><span font-size="13px" font-weight="demi" color="#ffffff" class="sc-gswNZR jrrvJf">' . number_format(mt_rand(40, 50) / 10, 1) . '</span><svg width="8" height="8" viewBox="0 0 20 20" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" ml="4" iconSize="10" class="sc-bcXHqe cyUZOu">
                                    <g clip-path="url(#clip0)">
                                        <path d="M19.5399 6.85L13.6199 5.5L10.5099 0.29C10.3999 0.11 10.2099 0 9.99993 0C9.78993 0 9.59993 0.11 9.48993 0.29L6.37993 5.5L0.45993 6.85C0.25993 6.9 0.0899297 7.05 0.0299297 7.25C-0.0300703 7.45 0.00992969 7.67 0.14993 7.83L4.13993 12.4L3.58993 18.44C3.56993 18.65 3.65993 18.85 3.82993 18.98C3.99993 19.1 4.21993 19.13 4.41993 19.05L9.99993 16.64L15.5799 19.03C15.6599 19.06 15.7399 19.08 15.8099 19.08C15.8099 19.08 15.8099 19.08 15.8199 19.08C16.1199 19.09 16.4199 18.82 16.4199 18.48C16.4199 18.42 16.4099 18.36 16.3899 18.31L15.8499 12.38L19.8399 7.81C19.9799 7.65 20.0199 7.43 19.9599 7.23C19.9099 7.04 19.7399 6.89 19.5399 6.85Z" fill="#ffffff"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="20" height="19.08" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg></span><span font-size="11px" font-weight="book" color="greyT2" class="sc-gswNZR gTFgDk NewProductCardstyled__RatingCount-sc-6y2tys-21 jZyLzI NewProductCardstyled__RatingCount-sc-6y2tys-21 jZyLzI">(' . rand(1000, 5454) . ')</span></div><svg width="55" height="20" fill="none" xmlns="http://www.w3.org/2000/svg" iconSize="20" class="sc-bcXHqe fUjwpe">
                            <path d="M9.901 5.496a2 2 0 0 1 2-2h41.6a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-41.6a2 2 0 0 1-2-2v-9Z" fill="#FFE7FB"></path>
                            <path d="M24.712 6H19.5v1.03h2.052v5.843h1.12V7.03h2.041V6ZM24.698 8.229v4.644h1.06v-2.17c0-1.09.52-1.532 1.228-1.532a.95.95 0 0 1 .353.06V8.198a.85.85 0 0 0-.363-.068c-.55 0-1.031.314-1.267.844h-.02v-.746h-.991ZM32.226 12.873V8.229h-1.07v2.67c0 .697-.481 1.188-1.09 1.188-.56 0-.884-.383-.884-1.1V8.23h-1.06v2.975c0 1.129.628 1.816 1.63 1.816.658 0 1.188-.314 1.443-.766h.05v.619h.981ZM35.25 13.02c1.1 0 1.846-.59 1.846-1.532 0-1.855-2.543-1.03-2.543-2.052 0-.304.236-.55.698-.55.422 0 .765.246.814.59l.992-.207c-.167-.706-.893-1.188-1.836-1.188-1.03 0-1.728.57-1.728 1.434 0 1.856 2.543 1.03 2.543 2.052 0 .393-.265.658-.756.658-.481 0-.874-.255-.992-.668l-.972.197c.226.795.943 1.266 1.934 1.266ZM40.083 12.97c.343 0 .638-.058.795-.136l-.118-.855a.992.992 0 0 1-.471.099c-.501 0-.747-.226-.747-.914V9.132h1.287v-.903h-1.287V6.746l-1.07.206V8.23h-.844v.903h.844v2.21c0 1.207.658 1.629 1.61 1.629ZM45.823 11.744l-.894-.265c-.206.422-.589.657-1.09.657-.746 0-1.256-.53-1.355-1.305h3.525v-.265c-.02-1.6-1.03-2.485-2.297-2.485-1.365 0-2.308 1.07-2.308 2.485 0 1.403.992 2.454 2.425 2.454.933 0 1.61-.442 1.994-1.276ZM43.73 8.906c.6 0 1.12.373 1.169 1.198h-2.406c.118-.766.56-1.198 1.237-1.198ZM46.776 10.556c0 1.463.923 2.464 2.17 2.464.619 0 1.237-.255 1.542-.854h.03v.707h.981V6h-1.07v2.828c-.246-.432-.766-.747-1.463-.747-1.247 0-2.19.992-2.19 2.475Zm1.07 0c0-.874.501-1.542 1.316-1.542.805 0 1.296.638 1.296 1.542 0 .893-.49 1.522-1.296 1.522-.795 0-1.315-.648-1.315-1.522Z" fill="#9F2089"></path>
                            <path d="M16.5 3.239 9.027.059a.746.746 0 0 0-.585 0L.969 3.24a.782.782 0 0 0-.47.721v6.36c0 5.321 3.139 7.611 7.947 9.622a.746.746 0 0 0 .576 0c4.809-2.01 7.948-4.3 7.948-9.622V3.96c0-.316-.186-.6-.47-.721Z" fill="#FFE7FB"></path>
                            <path d="m15.748 3.894-6.75-2.871a.673.673 0 0 0-.528 0l-6.75 2.87a.706.706 0 0 0-.424.652v5.745c0 4.806 2.835 6.874 7.178 8.69.167.07.353.07.52 0 4.343-1.816 7.178-3.884 7.178-8.69V4.545a.706.706 0 0 0-.424-.651Z" fill="#60014A"></path>
                            <path d="M10.852 6.455c.804.006 1.482.28 2.04.817.565.54.843 1.185.837 1.946l-.023 3.58c-.003.426-.37.77-.824.77-.45-.003-.814-.35-.81-.777l.022-3.58a1.098 1.098 0 0 0-.367-.85 1.216 1.216 0 0 0-.885-.35 1.247 1.247 0 0 0-.921.372c-.23.227-.344.54-.347.856l-.02 3.528c-.003.432-.376.782-.833.78-.458-.004-.828-.357-.824-.79l.022-3.548c.004-.31-.11-.617-.334-.844a1.254 1.254 0 0 0-.918-.378 1.253 1.253 0 0 0-.892.34c-.24.23-.37.513-.37.845l-.022 3.576c-.004.43-.373.777-.827.774-.455-.003-.818-.353-.815-.783l.023-3.564c.003-.66.25-1.308.714-1.799.6-.632 1.34-.948 2.199-.942.82.006 1.521.285 2.082.853.578-.565 1.272-.835 2.093-.832Z" fill="#FF9D00"></path>
                        </svg>
                    </div>
                </div>
            </a>';
        }

        sendData(200, ['html' => $html, "total_page" => $total_page, "start" => $start]);
    }

    function sale()
    {
        $this->load->view("sale");
    }
}
