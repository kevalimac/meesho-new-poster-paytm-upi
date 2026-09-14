<?php

/**
 * 
 */
class Home extends CI_Controller
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
		$data['header'] = 'Dashboard';    /* page header */
		$data['loadPage'] = 'dashboard';		/* load page active page */
		$data['curTemplateName'] = 'administrator/dashboard';
		$this->load->view('administrator/commonTemplates/templateLayout', $data);
	}
}
