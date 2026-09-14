<?php

class Address extends CI_Controller
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
        $data['load_page']          = "address";
        $data['page_title']        = "Shipping Address";
        $data['header_title']      = "Add delivery address";

        $this->load->view("common_template/common", $data);
    }
}
