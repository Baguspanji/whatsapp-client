<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('Admin_Model', 'admin');
		$this->load->model('Auth_Model', 'auth');
	}


	public function login()
	{
		$data = [
			'title' => 'Login WhatsApp',
		];

		$this->load->view('auth/login', $data);
	}

	public function index()
	{
		allowed('');

		$data = [
			'title' => 'Dashboard',
			'content' => 'home/index'
		];

		$this->load->view('layouts/index', $data);
	}

	public function whatsapp()
	{
		allowed('user');

		$post = $this->input->post();

		if ($post) {
			$data = [
				'number' => $post['nomor'],
				'message' => $post['message'],
				'sender' => $this->session->userdata('username'),
			];

			$curl = curl_init();

			$curl = curl_init('http://147.139.193.105/send-message');
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			$response = curl_exec($curl);

			curl_close($curl);

			$data = [
				'title' => 'WhatsApp',
				'content' => 'home/whatsapp'
			];
			$this->load->view('layouts/index', $data);
		} else {
			$data = [
				'title' => 'WhatsApp',
				'content' => 'home/whatsapp'
			];

			$this->load->view('layouts/index', $data);
		}
	}
}
