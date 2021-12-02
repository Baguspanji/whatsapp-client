<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Auth_Model', 'auth');
	}

	public function login()
	{
		$post = $this->input->post();
		if ($post != null) {

			$cekdata = $this->auth->login($post['username'], $post['password']);

			// echo json_encode($cekdata);

			if ($cekdata == "admin") {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Anda Berhasil Login sebagai Admin", "success", "las la-exclamation")</script>');
				redirect();
			} elseif ($cekdata == "user") {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Anda Berhasil Login sebagai User", "success", "las la-exclamation")</script>');
				redirect();
			} elseif ($cekdata == "pass false") {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Login Gagal, Password Salah", "danger", "las la-exclamation")</script>');
				redirect('admin/login');
			} elseif ($cekdata == "nonaktif") {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Login Gagal, akun dinonaktifkan", "danger", "las la-exclamation")</script>');
				redirect('admin/login');
			} else {
				$this->session->set_flashdata('notifikasi', '<script>notifikasi("Login Gagal, Username tidak ditemukan", "danger", "las la-exclamation")</script>');
				redirect('admin/login');
			}
		} else {
			$this->load->view('admin/login');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
