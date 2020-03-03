<?php 


class Beranda extends CI_Controller
{
	public function index()
	{
		$title['title'] = ' | Beranda';
		$this->load->view('templates/header_beranda',$title);
		$this->load->view('frontend/beranda');
		$this->load->view('templates/footer_beranda');
	}
}