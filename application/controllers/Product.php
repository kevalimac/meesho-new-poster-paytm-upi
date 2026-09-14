<?php

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /* Dashbaord */

    public function index($productId)
    {
        if ($productId) {

            $productDetails = $this->getProductById($productId);
            if (counts($productDetails)) {

                $data["product_details"]    = $productDetails;

                $data['page_title']         = @$productDetails['name'];
                $data['load_page']          = "product_details";
                $data['save_product_details']   = true;
                $data['show_nav']       = false;
                $data['hide_footer']    = true;
                $data['back_btn']       = true;
                $this->load->view("common_template/common", $data);
            } else {
                redirect("/");
            }
        } else {
            redirect("/");
        }
    }

    public function getProductById($id)
    {
        $this->db->select('p.*, GROUP_CONCAT(DISTINCT pv.size) AS sizes, GROUP_CONCAT(DISTINCT pv.storage) AS storages, cat.cat_name as category_name');
        $this->db->from('tbl_product as p');
        $this->db->join('tbl_product_verient as pv', 'pv.product_id = p.id', 'inner');
        $this->db->join('category as cat', 'cat.id = p.category', 'left');
        $this->db->where('MD5(p.id)', $id);
        $this->db->group_by('p.id'); // Ensure the correct grouping

        $query = $this->db->get();
        $result = $query->row_array();

        if ($result) {
            $product_id = $result['id'];

            // Fetch product verients
            // $this->db->select('*');
            // $this->db->from('tbl_product_verient');
            // $this->db->where('product_id', $product_id);
            // $result['verients'] = $this->db->get()->result_array();

            // Fetch distinct colors associated with the product ID
            $this->db->select('color as color_name, color_code, img1, img2, img3, img4, img5,selling_price, mrp'); // Select the necessary columns
            $this->db->from('tbl_product_verient');
            $this->db->where('product_id', $product_id);
            $this->db->group_by('color_name'); // Group by the actual column names
            $result['colors'] = $this->db->get()->result_array();

            // Fetch distinct colors associated with the product ID
            $this->db->select('storage,selling_price, mrp'); // Select the necessary columns
            $this->db->from('tbl_product_verient');
            $this->db->where('product_id', $product_id);
            $this->db->group_by('storage'); // Group by the actual column names
            $result['storage'] = $this->db->get()->result_array();

            return $result;
        } else {
            return [];
        }
    }
}
