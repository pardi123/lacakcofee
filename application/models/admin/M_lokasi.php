<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class M_lokasi extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function addProvinsi($data)
	{
		$kode = $data['kode'];
		$nama = $data['nama'];
		$insert = crud_insert("provinsi","'','$kode','$nama'");
		if ($insert)
		{
			return 1;
		}
	}
	function dataProvinsi()
	{
		$select = crud_selwhere("provinsi",NULL,"id_data > 0");
		return $select;
	}
	function formProvinsi($data)
	{
		$kode = $data['kode'];
		$select = crud_selwhere("provinsi",NULL,"kode = '$kode'")['single'];
		return $select;
	}
	function editProvinsi($data)
	{
		$kode = $data['kode'];
		$nama = $data['nama'];
		$update = crud_update("provinsi","nama = '$nama'","kode = '$kode'");
		if ($update)
		{
			return 1;
		}
	}
	function deleteProvinsi($data)
	{
		$kode = $data['kode'];
		$delete = crud_delete("provinsi","kode  = '$kode'");
		if ($delete)
		{
			return 1;
		}
	}
	function addKota($data)
	{
		$kode = $data['kode'];
		$nama = $data['nama'];
		$provinsi = $data['provinsi'];
		$insert = crud_insert("kota","'','$kode','$nama','$provinsi'");
		if ($insert)
		{
			return 1;
		}
	}
	function dataKota($data)
	{
		$provinsi = $data['provinsi'];
		if ($provinsi == "*")
		{
			$select = crud_selwhere("kota",NULL,"id_data > 0");
		}
		else
		{

			$select  = crud_selwhere("kota",NULL,"provinsi = '$provinsi'");
		}
		return $select;
	}
	function formKota($data)
	{
		$kode = $data['kode'];
		$select = crud_selwhere("kota",NULL,"kode = '$kode'")['single'];
		return $select;
	}
	function editKota($data)
	{
		$kode = $data['kode'];
		$nama = $data['nama'];
		$provinsi = $data['provinsi'];
		$update = crud_update("kota","nama = '$nama',provinsi = '$provinsi'","kode = '$kode'");
		if ($update)
		{
			return 1;
		}
	}
	function deleteKota($data)
	{
		$kode = $data['kode'];
		$delete = crud_delete("kota","kode = '$kode'");
		if ($delete)
		{
			return 1;
		}
	}
	function reloadKota($data)
	{
		$kode = $data['kode'];
		$provinsi = crud_selwhere("kota",NULL,"provinsi = '$kode'");
		return $provinsi;
	}
}
