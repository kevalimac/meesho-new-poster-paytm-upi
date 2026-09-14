<?php

/**
 * 
 */
class Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_all_records($table_name = "", $condition = array(), $is_single = false, $selected_rows = '')
	{
		if ($selected_rows != "") {
			$this->db->select($selected_rows);
		}
		if ($condition && counts($condition)) {
			$this->db->where($condition);
		}

		$res = $this->db->get($table_name);

		if ($is_single) {
			return $res->row_array();
		} else {

			return $res->result_array();
		}
	}


	function counts($table_name = "", $condition = array())
	{
		if ($condition && counts($condition)) {
			$this->db->where($condition);
		}
		$res = $this->db->get($table_name);
		return $res->num_rows();
	}

	function insert_data($table_name = '', $insert_data = array())
	{
		$this->db->insert($table_name, $insert_data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}

	function update_data($table_name = '', $condition = array(), $udata = array())
	{
		if ($condition && counts($condition)) {
			$this->db->where($condition);
		}
		$update = $this->db->update($table_name, $udata);

		if ($update) {
			return $update;
		} else {

			return 0;
		}
	}

	public function check_if_contact_data_exists()
	{
		$condition = array('user_ip' => get_ip());
		$check_data_exist = $this->model->counts("contact_us", $condition);

		return $check_data_exist;
	}

	/*
    Check Auth Client Data
     */
	public function check_auth_client()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if ($method == 'OPTIONS') {
			exit();
		}

		$client_service = $this->input->get_request_header('Client-Service', true);
		$auth_key = $this->input->get_request_header('Auth-Key', true);

		if ($client_service != CLIENT_SERVICE || $auth_key != AUTH_KEY) {
			sendData(401, array('error' => true, 'msg' => 'Unauthorized.'));
			exit();
		} else {

			return true;
		}
	}
}
