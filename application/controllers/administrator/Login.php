<?php

/**
 * 
 */
class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (is_logged()) {
			redirect('administrator/home/');
		}
		$data = array();

		if (@$this->input->post('submit')) {

			$userName = $data['userName'] = @$this->input->post('userName');
			$password = @$this->input->post('password');

			if (trim(@$userName) && trim($password)) {
				$checkCondition = array(
					'userName' => $userName,
					'password' => $password,
				);
				$check = $this->model->get_all_records("admin_master", $checkCondition, true);
				$count = counts($check);

				if ($count > 0) {
					$this->session->set_userdata('adminId', $check['adminId']);
					$this->session->set_userdata('adminType', $check['type']);

					redirect('administrator/home/');
				} else {
					unset($data['userName']);
					$data['error'] = 'Please Check UserName And Passwod!!';
				}
			} else {
				$data['error'] = 'Please Enter Input';
			}
		}

		$this->load->view('administrator/auth/admin_login', $data);
	}

	public function logOut()
	{
		$this->session->sess_destroy('adminId');
		$this->session->sess_destroy('adminType');

		redirect('administrator/login');
	}
}
