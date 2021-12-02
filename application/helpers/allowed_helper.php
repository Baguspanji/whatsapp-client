<?php
if (!function_exists('allowed')) {
	function allowed($param)
	{
		$CI = &get_instance();
		$role = $CI->session->userdata('role');
		if ($role == null) {
			$CI->session->set_flashdata('notifikasi', '<script>notifikasi("Anda harus login terlebih dahulu", "danger", "fa fa-exclamation")</script>');
			redirect(base_url('admin/login'));
		} elseif ($role != $param) {
			if ($param == 'admin') {
				$CI->session->set_flashdata('notifikasi', '<script>notifikasi("Anda Harus Login Sebagai Admin", "danger", "fa fa-exclamation")</script>');
				redirect(base_url('admin/login'));
			} elseif ($param == 'user') {
				$CI->session->set_flashdata('notifikasi', '<script>notifikasi("Anda Harus Login Sebagai User", "danger", "fa fa-exclamation")</script>');
				redirect(base_url('admin/login'));
			} 
		}
	}
}

if (!function_exists('link_active')) {
	function link_active($param)
	{
		$CI = &get_instance();
		$uri1 = $CI->uri->segment(1);
		$uri2 = $CI->uri->segment(2);

		if ($uri1 . '/' . $uri2 == $param) {
			return 'active';
		}
	}
}
