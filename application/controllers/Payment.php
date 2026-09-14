<?php

class Payment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /* Dashbaord */

    public function index()
    {
        $website = base_url();
        $con = array(
            "website_url" => $website
        );
        $settings_data = $this->model->get_all_records("settings", $con, true);

        $data['payment_method'] = @$settings_data['payment_method'] ? explode(",", @$settings_data['payment_method']) : [];
        $data['upi_address'] = @$settings_data['upi_id'];

        $merchant_key = @$settings_data['merchant_key'];
        $salt_key = @$settings_data['salt_key'];

        if (@$settings_data['netbanking'] == 1 && @trim($merchant_key) &&  @trim($salt_key)) {
            $data['netbanking'] = 1;
        }

        if (@$_POST['submit'] && $salt_key && $merchant_key) {

            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

            $PAYU_BASE_URL = "https://secure.payu.in";

            $posted = array(
                'key' => $merchant_key,
                'txnid' => $txnid,
                'amount' => trim(@$_POST['price']),
                'firstname' =>  trim(@$_POST['customerName']),
                'email' => '',
                'phone' => trim(@$_POST['customerMobile']),
                'productinfo' => @$_POST['product_name'],
                'surl' => base_url('payment/success'),
                'furl' => base_url('payment/failure'),
                'service_provider' => 'payu_paisa',
            );

            if ($this->input->post()) {
                $posted = array_merge($posted, $this->input->post());
            }

            if (empty($posted['txnid'])) {
                $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
            } else {
                $txnid = $posted['txnid'];
            }

            $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

            if (empty($posted['hash']) && count($posted) > 0) {
                $hashVarsSeq = explode('|', $hashSequence);
                $hash_string = '';
                foreach ($hashVarsSeq as $hash_var) {
                    $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                    $hash_string .= '|';
                }

                $hash_string .= $salt_key;
                $hash = strtolower(hash('sha512', $hash_string));
                $action = $PAYU_BASE_URL . '/_payment';
            } elseif (!empty($posted['hash'])) {
                $hash = $posted['hash'];
                $action = $PAYU_BASE_URL . '/_payment';
            }

            $data['posted'] = $posted;
            $data['hash'] = $hash;
            $data['MERCHANT_KEY'] = $merchant_key;
            $data['SALT'] = $salt_key;
            $data['txnid'] = $txnid;
            $data['action'] = $action;

            $this->load->view("payment", $data);
        } else {
            $data['page_title']        = "Checkout your Product";
            $data['show_nav']          = false;
            $data['hide_footer']       = true;
            $data['back_btn']          = true;
            $data['load_page']         = "payment";
            $data['header_title']      = "Payment";

            $this->load->view("common_template/common", $data);
        }
    }

    function purchase()
    {
        if (@$_POST['payType']) {

            $date = date("Y-m-d");
            $is_already = $this->model->counts("purchase", ['date' => $date]);

            if ($is_already) {
                $this->db->where('date', $date);
                $this->db->set('count', 'count+1', FALSE);
                $this->db->set('last_update_time', date("Y-m-d H:i:s"));
                $this->db->update('purchase');
            } else {
                $this->model->insert_data("purchase", ["date" => $date, "count" => 1, "last_update_time" => date("Y-m-d H:i:s")]);
            }
        }
    }

    function success()
    {
        $data['page_title']        = "Success Payment";
        $data['show_nav']          = false;
        $data['hide_footer']       = true;
        $data['back_btn']          = true;
        $data['load_page']         = "success";
        $this->load->view("common_template/common", $data);
    }

    function failure()
    {
        $data['page_title']        = "Failure Payment";
        $data['show_nav']          = false;
        $data['hide_footer']       = true;
        $data['back_btn']          = true;
        $data['load_page']         = "failure";
        $this->load->view("common_template/common", $data);
    }
}
