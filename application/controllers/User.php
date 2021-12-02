<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Admin_Model', 'admin');
		$this->load->model('Auth_Model', 'auth');
	}

	public function index()
	{
		allowed('admin');

		$post = $this->input->post();

		if ($post) {
			$config = array(
				array(
					'field' => 'username',
					'label' => 'Username',
					'rules' => 'required|min_length[6]|is_unique[tb_user.username]'
				),
				array(
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required'
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required'
				)
			);

			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$data = [
					'title' => 'List User',
					'content' => 'user/index',
					'users' => $this->admin->get_data(),
					'data' => $post
				];

				$this->load->view('layouts/index', $data);
			} else {
				$data = [
					'nama' => $post['nama'],
					'username' => $post['username'],
					'email' => $post['email'],
					'password' => $this->auth->makeHash($post['username']),
					'is_admin' => 0,
				];

				$saved = $this->admin->add_data($data);
				if ($saved) {
					$this->session->set_flashdata('notifikasi', '<script>notifikasi("Data Berhasil di tambah", "success", "las la-exclamation")</script>');
					redirect('user');
				}
			}
		} else {
			$data = [
				'title' => 'List User',
				'content' => 'user/index',
				'users' => $this->admin->get_data()
			];

			$this->load->view('layouts/index', $data);
		}
	}

	public function detail()
	{
		$id = $this->uri->segment(3);

		$data = [
			'title' => 'Detail User',
			'content' => 'user/detail',
			'user' =>  $this->admin->get_id($id)
		];

		$this->load->view('layouts/index', $data);
	}
}
