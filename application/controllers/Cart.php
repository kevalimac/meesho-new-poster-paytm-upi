<?php

class Cart extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /* Dashbaord */

    public function index()
    {
        $data['show_nav']    = false;
        $data['hide_footer']    = true;
        $data['back_btn']       = true;
        $data['is_cart_page']         = true;
        $data['load_page']          = "cart";
        $data['page_title']        = "Add to Cart";
        $data['header_title']      = "CART";

        $this->load->view("common_template/common", $data);
    }
}
