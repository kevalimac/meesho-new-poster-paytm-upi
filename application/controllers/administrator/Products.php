<?php

/**
 * 
 */
class Products extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!is_logged())  /* IF LOGGIN */ {
            redirect('administrator/login');
        }
    }

    public function index()
    {
        $this->db->order_by("index", "asc");
        $data['products_list'] = $this->model->get_all_records("tbl_product");

        $data['header'] = 'Products List';    /* page header */
        $data['loadPage'] = 'products';        /* load page active page */
        $data['curTemplateName'] = 'administrator/manage_products/view_products';
        $this->load->view('administrator/commonTemplates/templateLayout', $data);
    }

    /* Create Blog Page */

    public function create()
    {
        $data = array();
        if (@$_POST['submit']) {

            $outputjson['success'] = 0;

            $target_dir = "upload/";
            $target_file = $target_dir . date("Y_m_d_h_i_s_") . basename($_FILES["file"]["name"]);
            $uploadOk = 1;

            if ($_FILES['file']['error'] == 0) {  // Check if file is uploaded without errors
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if the file is a CSV
                if ($imageFileType != "csv") {
                    $outputjson['message'] = "Sorry, only CSV file is allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

                    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                        // Open the CSV file and read its contents
                        $handle = fopen($target_file, "r");
                        if ($handle !== FALSE) {
                            // Loop through each row of the CSV file
                            $is_header = 1;
                            $i = 1;
                            $last_item = array();
                            while (($data = fgetcsv($handle, 40000, ",")) !== FALSE) {
                                ob_start();
                                if ($is_header == 0) {


                                    $unique_name = @$data[0];
                                    $name = @$data[1];

                                    // Fix the HTML content using DOMDocument
                                    $fetaures = str_replace('""""', "''", @$data[2]);
                                    $fetaures = str_replace('=""', "=''", @$fetaures);
                                    $fetaures = str_replace('""', '"', @$fetaures);
                                    $fetaures = str_replace('{""', '{"', @$fetaures);
                                    $fetaures = str_replace('"":', '":', @$fetaures);
                                    $fetaures = str_replace(',""', ',"', @$fetaures);
                                    $fetaures = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $fetaures);

                                    $color = @$data[9]; // Color = Size


                                    $selling_price  = @$data[20];
                                    $mrp            = @$data[21];
                                    $img1           = @$data[25];


                                    if ($name != "" || $color != "" || $unique_name != "") {

                                        $unique_name = ($unique_name == '' || $unique_name == '-') ? @$last_item['unique_name'] : $unique_name;
                                        if (count($last_item) !== 0 && $unique_name != $last_item['unique_name']) {
                                            $last_item = array();
                                        }

                                        $rows_product = $this->model->get_all_records("tbl_product", ["unique_name" => @$unique_name], true);

                                        $is_not_verient = false;
                                        if (counts($rows_product)) {
                                            $product_id = $rows_product['id'];
                                            if ($color == "") {
                                                if (@$data[26] <= 5 && @$data[26] != "") {
                                                    $this->model->update_data("tbl_product", ["id" => $product_id], ["img" . @$data[26] => $img1]);
                                                }
                                                $is_not_verient = true;
                                            }
                                        } else {

                                            if (count($last_item) !== 0) {
                                                $unique_name    = ($unique_name == '' || $unique_name == '-') ? $last_item['unique_name'] : $unique_name;
                                                $name           = ($name == '' || $name == '-') ? $last_item['name'] : $name;
                                                $color          = ($color == '' || $color == '-') ? $last_item['color'] : $color;
                                                $selling_price  = ($selling_price == '' || $selling_price == '-') ? $last_item['selling_price'] : $selling_price;
                                                $mrp            = ($mrp == '' || $mrp == '-') ? $last_item['mrp'] : $mrp;
                                                $fetaures       = ($fetaures == '' || $fetaures == '-') ? $last_item['fetaures'] : $fetaures;
                                                $img1           = ($img1 == '' || $img1 == '-') ? $last_item['img1'] : $img1;
                                            }

                                            $last_item = array(
                                                "unique_name"   => $unique_name,
                                                "name"          => $name,
                                                "color"         => $color,
                                                "selling_price" => $selling_price,
                                                "mrp"           => $mrp,
                                                "fetaures"      => $fetaures,
                                                "img1"          => $img1,
                                                "from_csv"      => 1,
                                            );
                                            $product_id = $this->model->insert_data("tbl_product", $last_item);
                                        }


                                        if (!$is_not_verient) {

                                            $tbl_product_verient = $this->model->counts("tbl_product_verient", ["product_id" => @$product_id, "color" => $color]);
                                            if (!@$tbl_product_verient) {

                                                $data = array(
                                                    "product_id"    => $product_id,
                                                    "name"          => $name,
                                                    "color"         => $color,
                                                    "selling_price" => $selling_price,
                                                    "mrp"           => $mrp,
                                                    "fetaures"      => $fetaures,
                                                    "img1"          => $img1,
                                                    "from_csv"      => 1,
                                                );
                                                $this->model->insert_data("tbl_product_verient", $data);
                                            }
                                        }
                                    }
                                    $i++;
                                }
                                $is_header = 0;
                                ob_end_clean();
                            }

                            fclose($handle);

                            $outputjson['success'] = 1;
                            $outputjson['message'] = 'Data inserted Successfully.';
                        } else {
                            $outputjson['message'] = "File not open!";
                        }
                    } else {
                        $outputjson['message'] = "File not Found!";
                    }
                } else {
                    $outputjson['message'] = 'Failed to upload the CSV file.';
                }
            } else {
                $outputjson['message'] = 'Only CSV files are allowed.';
            }


            @unlink(@$target_file);

            if ($outputjson['success'] == 1) {
                @$data['suc_msg'] = $outputjson['message'];
            } else {

                @$data['error_msg'] = $outputjson['message'];
            }

            // redirect("administrator/products");
        }

        $data['header'] = 'Add Products';    /* page header */
        $data['loadPage'] = 'products';        /* load page active page */
        $data['curTemplateName'] = 'administrator/manage_products/add_edit_products';
        $this->load->view('administrator/commonTemplates/templateLayout', $data);
    }

    public function create_old()
    {
        $data = array();
        if (@$_POST['submit']) {

            $outputjson['success'] = 0;

            $target_dir = "upload/";
            $target_file = $target_dir . date("Y_m_d_h_i_s_") . basename($_FILES["file"]["name"]);
            $uploadOk = 1;

            if ($_FILES['file']['error'] == 0) {  // Check if file is uploaded without errors
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if the file is a CSV
                if ($imageFileType != "csv") {
                    $outputjson['message'] = "Sorry, only CSV file is allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

                    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                        // Open the CSV file and read its contents
                        $handle = fopen($target_file, "r");
                        if ($handle !== FALSE) {
                            // Loop through each row of the CSV file
                            $is_header = 1;
                            $i = 1;
                            $last_item = array();
                            while (($data = fgetcsv($handle, 40000, ",")) !== FALSE) {

                                ob_start();
                                if ($is_header == 0) {

                                    $name = @$data[0];
                                    $color = @$data[1];
                                    $size = @$data[2];
                                    $storage = @$data[3];
                                    $selling_price = @$data[4];
                                    $mrp = @$data[5];

                                    // Fix the HTML content using DOMDocument
                                    // // pre($fixedHtml);
                                    $fetaures = str_replace('=""', "=''", @$data[6]);
                                    $fetaures = str_replace('""', '"', @$fetaures);
                                    // $fetaures = @$fetaures ? $this->fixHtmlWithDom(@$fetaures) : "";
                                    // pre($fetaures);die;

                                    $img1 = @$data[7];
                                    $img2 = @$data[8];
                                    $img3 = @$data[9];
                                    $img4 = @$data[10];
                                    $img5 = @$data[11];

                                    if ($name != "" || $color != "" || $size != "" || $storage != "") {
                                        // echo '# ' . $name . '-' . $last_item['name'] . '-' . $color . '-' . $storage;
                                        $name = ($name == '' || $name == '-') ? $last_item['name'] : $name;
                                        if (count($last_item) !== 0 && $name != $last_item['name']) {
                                            $last_item = array();
                                        }
                                        if (count($last_item) !== 0) {
                                            // echo '~name ' . $last_item['name'];
                                            $name = ($name == '' || $name == '-') ? $last_item['name'] : $name;
                                            $color = ($color == '' || $color == '-') ? $last_item['color'] : $color;
                                            $size = ($size == '' || $size == '-') ? $last_item['size'] : $size;
                                            $storage = ($storage == '' || $storage == '-') ? $last_item['storage'] : $storage;
                                            $selling_price = ($selling_price == '' || $selling_price == '-') ? $last_item['selling_price'] : $selling_price;
                                            $mrp = ($mrp == '' || $mrp == '-') ? $last_item['mrp'] : $mrp;
                                            $fetaures = ($fetaures == '' || $fetaures == '-') ? $last_item['fetaures'] : $fetaures;
                                            $img1 = ($img1 == '' || $img1 == '-') ? $last_item['img1'] : $img1;
                                            $img2 = ($img2 == '' || $img2 == '-') ? $last_item['img2'] : $img2;
                                            $img3 = ($img3 == '' || $img3 == '-') ? $last_item['img3'] : $img3;
                                            $img4 = ($img4 == '' || $img4 == '-') ? $last_item['img4'] : $img4;
                                            $img5 = ($img5 == '' || $img5 == '-') ? $last_item['img5'] : $img5;
                                        }
                                        // echo $i . '. ' . $name;

                                        $last_item = array(
                                            "name" => $name,
                                            "color" => $color,
                                            "size" => $size,
                                            "storage" => $storage,
                                            "selling_price" => $selling_price,
                                            "mrp" => $mrp,
                                            "fetaures" => $fetaures,
                                            "img1" => $img1,
                                            "img2" => $img2,
                                            "img3" => $img3,
                                            "img4" => $img4,
                                            "img5" => $img5,
                                            "from_csv" => 1,
                                        );

                                        $rows_product = $this->model->get_all_records("tbl_product", ["name" => @$name]);
                                        if ($rows_product != null && is_array($rows_product) && count($rows_product) > 0) {
                                            $product_id = $rows_product[0]['id'];
                                        } else {
                                            $data = $last_item;
                                            $product_id = $this->model->insert_data("tbl_product", $data);
                                        }

                                        // Port rates
                                        $rows_port_chk = $this->model->get_all_records("tbl_product_verient", ["product_id" => @$product_id, "color" => $color, "size" => $size, "storage" => $storage]);


                                        if ($rows_port_chk != null && is_array($rows_port_chk) && count($rows_port_chk) > 0) {
                                            //Data already Exist
                                        } else {
                                            $data = array(
                                                "product_id" => $product_id,
                                                "name" => $name,
                                                "color" => $color,
                                                "size" => $size,
                                                "storage" => $storage,
                                                "selling_price" => $selling_price,
                                                "mrp" => $mrp,
                                                "fetaures" => $fetaures,
                                                "img1" => $img1,
                                                "img2" => $img2,
                                                "img3" => $img3,
                                                "img4" => $img4,
                                                "img5" => $img5,
                                                "from_csv" => 1,
                                            );
                                            // $db->insert("tbl_product_verient", $data);
                                            $this->model->insert_data("tbl_product_verient", $data);
                                        }
                                    }
                                    $i++;
                                }
                                $is_header = 0;
                                ob_end_clean();
                            }

                            fclose($handle);

                            $outputjson['success'] = 1;
                            $outputjson['message'] = 'Data inserted Successfully.';
                        } else {
                            $outputjson['message'] = "File not open!";
                        }
                    } else {
                        $outputjson['message'] = "File not Found!";
                    }
                } else {
                    $outputjson['message'] = 'Failed to upload the CSV file.';
                }
            } else {
                $outputjson['message'] = 'Only CSV files are allowed.';
            }


            @unlink(@$target_file);

            if ($outputjson['success'] == 1) {
                @$data['suc_msg'] = $outputjson['message'];
            } else {

                @$data['error_msg'] = $outputjson['message'];
            }

            // redirect("administrator/products");
        }

        $data['header'] = 'Add Products';    /* page header */
        $data['loadPage'] = 'products';        /* load page active page */
        $data['curTemplateName'] = 'administrator/manage_products/add_edit_products';
        $this->load->view('administrator/commonTemplates/templateLayout', $data);
    }

    function fixHtmlWithDom($html)
    {
        $dom = new DOMDocument();

        // Load HTML content into DOMDocument
        libxml_use_internal_errors(true); // Disable libxml errors
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors(); // Clear libxml errors

        // Save HTML content back to string format, which will help in fixing the incomplete or improperly formatted HTML
        $fixedHtml = $dom->saveHTML();

        return $fixedHtml;
    }
    public function delete()
    {
        if (@$_POST['delete_id']) {

            $delete_id = @$_POST['delete_id'];

            $this->db->where("id", $delete_id);
            $this->db->delete("tbl_product");

            $this->db->where("product_id", $delete_id);
            $this->db->delete("tbl_product_verient");

            echo "1";
        } else {
            show_404();
        }
    }

    function update_index()
    {

        @$_POST['product_index'] = @$_POST['product_index'] ?? 1000;

        if (@$_POST['product_index'] && @$_POST['product_id']) {

            $this->model->update_data("tbl_product", ["id" => @$_POST['product_id']], ['index' => @$_POST['product_index']]);
        }
    }

    function update_category()
    {
        @$_POST['product_category'] = @$_POST['product_category'] ?? 1000;

        if (@$_POST['product_category'] && @$_POST['product_id']) {

            $this->model->update_data("tbl_product", ["id" => @$_POST['product_id']], ['category' => @$_POST['product_category']]);
        }
    }

    function update_hide_show()
    {
        if (@$_POST['product_id']) {

            $this->model->update_data("tbl_product", ["id" => @$_POST['product_id']], ['is_show' => @$_POST['is_show']]);
        }
    }

    function all_hide_product()
    {
        $this->model->update_data("tbl_product", [], ['is_show' => 0]);
        redirect("administrator/products");
    }

    function all_show_product()
    {
        $this->model->update_data("tbl_product", [], ['is_show' => 1]);
        redirect("administrator/products");
    }

    function remove_all_product()
    {
        $this->db->where("id !=", 0);
        $this->db->delete("tbl_product");

        $this->db->where("id !=", 0);
        $this->db->delete("tbl_product_verient");

        redirect("administrator/products");
    }

    function update_verient_price()
    {
        if (@$_POST['verient_id'] && @$_POST['product_id'] && @$_POST['price']) {

            $this->model->update_data("tbl_product_verient", ["id" => @$_POST['verient_id']], ['selling_price' => @$_POST['price']]);

            if (@$_POST['is_first']) {
                $this->model->update_data("tbl_product", ["id" => @$_POST['product_id']], ['selling_price' => @$_POST['price']]);
            }
        }
    }

}
