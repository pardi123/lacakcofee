<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class AdminPage extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("admin/M_lokasi");
	}
	function berandaAdmin()
	{
		$data['title'] = "Beranda Admin";
		$this->renderAdmin("page/admin/index",$data);
	}
	function kelolaprovinsi()
	{
		$data['title'] = "Kelola provinsi";
		$this->renderAdmin("page/admin/lokasi/kelola-provinsi",$data);
	}
	function kelolaKota()
	{
		$data['title'] = "Kelola Kota";
		$data['provinsi'] = $this->M_lokasi->dataProvinsi();
		$this->renderAdmin("page/admin/lokasi/kelola-kota",$data);
	}
	function addStore()
	{
		$data['title'] = "Kelola Caffe";
		$data['provinsi'] = $this->M_lokasi->dataProvinsi();
		$this->renderAdmin("page/admin/store/kelola-store",$data);
	}
	function kelolaUser()
	{
		$data['title'] = "Kelola User";
		$this->renderAdmin("page/admin/user/kelola-user",$data);
	}
}
