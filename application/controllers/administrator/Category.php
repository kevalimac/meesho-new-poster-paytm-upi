<?php

/**
 * 
 */
class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!is_logged())  /* IF LOGGIN */ {
            redirect('administrator/login');
        }
    }

    /* Dashbaord */

    public function index()
    {
        $this->db->order_by("index", "asc");
        $data['all_category'] = $this->model->get_all_records("category");

        $data['header'] = 'Category List';    /* page header */
        $data['loadPage'] = 'tool_category';        /* load page active page */
        $data['curTemplateName'] = 'administrator/manage_category/view_category';
        $this->load->view('administrator/commonTemplates/templateLayout', $data);
    }


    /* Create Category Page */

    public function create()
    {

        $data = array();

        if (@$_POST['submit']) {

            $category_unique_id = strtolower(str_replace(" ", "-", trim(clean(@$_POST['cat_name']))));;

            $is_already = $this->model->counts("category", array("unique_id" => $category_unique_id));

            if (@!$is_already) {

                $insert_array = array(
                    "unique_id"          => $category_unique_id,
                    "cat_name"        => @$_POST['cat_name'],
                    "cat_img"         => @$_POST['cat_img']
                );

                $this->model->insert_data("category", $insert_array);
                redirect("administrator/category");
            }
        }

        $data['header'] = 'Add Category';    /* page header */
        $data['loadPage'] = 'tool_category';        /* load page active page */
        $data['curTemplateName'] = 'administrator/manage_category/add_edit_category';
        $this->load->view('administrator/commonTemplates/templateLayout', $data);
    }

    /* Update Category Page */
    /* Update Category Page */

    public function update($category_id = 0)
    {
        $data = array();

        if ($category_id) {

            //  Get Category Data
            $con = array(
                "id" => $category_id
            );
            $category_data = $this->model->get_all_records("category", $con, true);

            if (counts($category_data)) {

                if (@$_POST['submit']) {

                    $category_unique_id = strtolower(str_replace(" ", "-", trim(clean(@$_POST['cat_name']))));;

                    $is_already = $this->model->counts("category", array("unique_id" => $category_unique_id, "id !=" => $category_id));

                    if (@!$is_already) {

                        $update_array = array(
                            "unique_id"       => $category_unique_id,
                            "cat_name"        => @$_POST['cat_name'],
                            "cat_img"         => @$_POST['cat_img']
                        );

                        $this->model->update_data("category", $con, $update_array);
                        redirect("administrator/category");
                    }
                }

                $data['category_data'] = $category_data;
                $data['update'] = true;
                $data['header'] = 'Update Category';    /* page header */
                $data['loadPage'] = 'tool_category';        /* load page active page */
                $data['curTemplateName'] = 'administrator/manage_category/add_edit_category';
                $this->load->view('administrator/commonTemplates/templateLayout', $data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function delete()
    {
        if (@$_POST['delete_id']) {

            $delete_id = @$_POST['delete_id'];

            $category_data = $this->model->get_all_records("category", ["id" => $delete_id], true);
            @unlink(@$category_data['image']);

            $this->db->where("id", $delete_id);
            $this->db->delete("category");

            echo "1";
        } else {
            show_404();
        }
    }

    function update_index()
    {
        @$_POST['category_index'] = @$_POST['category_index'] ?? 1000;

        if (@$_POST['category_index'] && @$_POST['category_id']) {

            $this->model->update_data("category", ["id" => @$_POST['category_id']], ['index' => @$_POST['category_index']]);
        }
    }
}
