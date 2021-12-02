<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model
{

	public function get_data()
	{
		return $this->db->get('tb_user')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('tb_user', ['id' => $id])->row();
	}
	
	public function add_data($data)
	{
		$this->db->insert('tb_user', $data);
		return $this->db->insert_id();
	}
}
