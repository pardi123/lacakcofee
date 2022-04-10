<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class AdminLokasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("admin/M_lokasi");
	}
	function addProvinsi()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['nama'] = securepost("nama",TRUE);
		$insert = $this->M_lokasi->addProvinsi($data);
		if ($insert == 1)
		{
			echo "1";
		}
	}
	function dataProvinsi()
	{
		$data['provinsi'] = $this->M_lokasi->dataProvinsi();
		$this->load->view("page/admin/viewholder/lokasi/data-provinsi",$data);
	}
	function formProvinsi()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['provinsi'] = $this->M_lokasi->formProvinsi($data);
		$this->load->view("page/admin/viewholder/lokasi/form-edit-provinsi",$data);
	}
	function editProvinsi()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['nama'] = securepost("nama",TRUE);
		$update = $this->M_lokasi->editProvinsi($data);
		if ($update == 1)
		{
			echo "1";
		}
	}
	function deleteProvinsi()
	{
		$data['kode'] = securepost("kode",TRUE);
		$delete = $this->M_lokasi->deleteProvinsi($data);
		if ($delete == 1)
		{
			echo "1";
		}
	}
	function addKota()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['nama'] = securepost("nama",TRUE);
		$data['provinsi'] = securepost("provinsi",TRUE);
		$insert = $this->M_lokasi->addKota($data);
		if ($insert == 1)
		{
			echo "1";
		}
	}
	function dataKota()
	{
		$data['provinsi'] = securepost("provinsi",TRUE);
		$data['kota'] = $this->M_lokasi->dataKota($data);
		$this->load->view("page/admin/viewholder/lokasi/data-kota",$data);
	}
	function formKota()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['kota'] = $this->M_lokasi->formKota($data);
		$this->load->view("page/admin/viewholder/lokasi/form-kota",$data);
	}
	function editKota()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['nama'] = securepost("nama",TRUE);
		$data['provinsi'] = securepost("provinsi",TRUE);
		$update = $this->M_lokasi->editKota($data);
		if ($update == 1)
		{
			echo "1";
		}
	}
	function deleteKota()
	{
		$data['kode'] = securepost("kode",TRUE);
		$delete= $this->M_lokasi->deleteKota($data);
		if ($delete == 1)
		{
			echo "1";
		}
	}
	function reloadKota()
	{
		$data['kode'] = securepost("kode");
		$data['kota'] = $this->M_lokasi->reloadKota($data);
		$this->load->view("page/admin/viewholder/lokasi/reloadKota",$data);
	}
}
