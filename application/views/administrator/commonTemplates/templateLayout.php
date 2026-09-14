<?php
$adminId = $this->session->userdata('adminId');
$getUserCondition = array(
    'adminId' => $adminId
);
$data['admin_data'] = $this->model->get_all_records("admin_master", $getUserCondition, true);

$data['admin_name'] = $data['admin_data']['Name'];
$data['admin_type'] = $data['admin_data']['type'] ? "Super Admin" : "Sub Admin";

$this->load->view("administrator/commonTemplates/templateHeader", $data);
$this->load->view("administrator/commonTemplates/templateSidebar", $data);
$this->load->view($curTemplateName, $data);
$this->load->view("administrator/commonTemplates/templateFooter", $data);
