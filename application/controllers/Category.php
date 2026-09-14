<?php

class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // isMobileDevice();
    }

    /* Category */

    public function index($catId = "")
    {
        if ($catId) {

            $CategoryDetails = $this->model->get_all_records("category", ["unique_id" => $catId], true, "id,cat_name");

            if (counts($CategoryDetails)) {

                $this->db->order_by("index", "asc");
                $products = $this->model->get_all_records("tbl_product", ['category' => $CategoryDetails['id']], false);

                $data['products']          = $products;
                $data['CategoryDetails']   = $CategoryDetails;
                $data['load_page']         = "category_details";
                $data['page_title']        = "Buy " . $CategoryDetails['cat_name'];
                $data['header_title']      = @$CategoryDetails['cat_name'];

                $data['save_product_details']   = true;
                $data['show_nav']               = false;
                $data['hide_footer']            = false;
                $data['back_btn']               = true;
                $this->load->view("common_template/common", $data);
            } else {
                redirect("/");
            }
        } else {

            $data['load_page']              = "categories";
            $data['page_title']             = "boAt Wearables Categories";

            $data['save_product_details']   = true;
            $data['show_nav']               = true;
            $data['hide_footer']            = false;
            $data['back_btn']               = true;

            $this->load->view("common_template/common", $data);
        }
    }
}
