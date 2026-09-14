<?php

/**
 * 
 */
class Settings extends CI_Controller
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
        $data = array();

        $website = base_url();

        //  Get Tool Data
        $con = array(
            "website_url" => $website
        );
        $settings_data = $this->model->get_all_records("settings", $con, true);

        if (@$_POST) {

            @$_POST['payment_method'] = @$_POST['payment_method'] ? implode(",", @$_POST['payment_method']) : "";

            if (counts($settings_data)) {

                if (@$_POST['submit']) {

                    $update_array = array(
                        "pixel_code"          => @$_POST['pixel_code'],
                        // "analytics"           => @$_POST['analytics'],
                        "upi_id"              => @$_POST['upi_id'],
                        "payment_method"      => @$_POST['payment_method'],
                        "netbanking"          => @$_POST['netbanking'] ? 1 : 0,
                        "merchant_key"        => @$_POST['merchant_key'],
                        "salt_key"            => @$_POST['salt_key'],
                    );
                    $this->model->update_data("settings", $con, $update_array);
                    redirect("administrator/settings");
                }
            } else {
                $insert_array = array(
                    "pixel_code"          => @$_POST['pixel_code'],
                    // "analytics"           => @$_POST['analytics'],
                    "upi_id"              => @$_POST['upi_id'],
                    "payment_method"      => @$_POST['payment_method'],
                    "netbanking"          => @$_POST['netbanking'] ? 1 : 0,
                    "merchant_key"        => @$_POST['merchant_key'],
                    "salt_key"            => @$_POST['salt_key'],
                    "website_url"         => @$website,
                );

                $this->model->insert_data("settings", $insert_array);
                redirect("administrator/settings");
            }
        }

        $data['settings_data'] = $settings_data;
        $data['update'] = true;
        $data['header'] = 'settings';    /* page header */
        $data['loadPage'] = 'settings';        /* load page active page */
        $data['curTemplateName'] = 'administrator/manage_settings/add_edit_settings';
        $this->load->view('administrator/commonTemplates/templateLayout', $data);
    }
}
