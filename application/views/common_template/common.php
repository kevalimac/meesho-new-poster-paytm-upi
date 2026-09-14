<?php

if (@$load_page) {

    $data = [];
    $this->load->view("common_template/header", $data);
    $this->load->view($load_page, $data);
    $this->load->view("common_template/footer", $data);
} else {

    error_404();
}
