<?php

class Auth_Model extends CI_Model
{

	function login($user, $pass)
	{
		$data = $this->db->get_where('tb_user', array('username' => $user))->row_array();
		if ($data != null) {
			$hash = $data['password'];
			if ($data['status'] == 0) {
				return "nonaktif";
			} elseif (password_verify($pass, $hash)) {
				$role = $data['is_admin'] == 1 ? 'admin' : 'user';

				$this->session->set_userdata(
					array(
						'role'     => $role,
						'nama'     => $data['nama'],
						'username' => $data['username'],
					)
				);
				return $role;
			} else {
				return "pass false";
			}
		}
	}

	function makeHash($string)
	{
		$options = array('cost' => 11);
		$hash    = password_hash($string, PASSWORD_BCRYPT, $options);
		return $hash;
	}
}
