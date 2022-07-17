<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_cafe extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function addCafe($data)
	{
		$admin = ses_get("webmaster");
		$kode = $data['kode'];
		$nama = $data['nama'];
		$provinsi = $data['provinsi'];
		$kota = $data['kota'];
		$alamat = $data['alamat'];
		$pass = $data['pass'];
		$filename = md5(rand(00000,99999)).".jpg";
		$cover = $data['cover'];
		$check = crud_selwhere("cafe",NULL,"kode = '$kode'");
		if ($check['count'] > 0){
			return 2;
		}
		else
		{
			if (move_uploaded_file($cover,"./photo-toko/$filename"))
			{

				$insert = crud_insert("cafe","'','$kode','$nama','$provinsi','$kota','$alamat','$admin','$filename'");
				if ($insert)
				{
					$user = crud_insert("user","'','$nama','$kode','$pass','','','$cover','store','',''");
					if ($user == 1)
					{
						return 1;
					}
				}
			}
		}

	}
	function dataCafe($data)
	{
		$provinsi = $data['provinsi'];
		$kota = $data['kota'];
		if ($provinsi == "*")
		{
			$cafe = crud_selwhere("cafe",NULL,"id_data > 0");
		}
		else
		{
			if ($kota == "*")
			{
				$cafe = crud_selwhere("cafe",NULL,"provinsi = '$provinsi'");

			}
			else
			{
				$cafe = crud_selwhere("cafe",NULL,"provinsi = '$provinsi' AND kota = '$kota'");

			}
		}
		return $cafe;
	}
	function dataCafeSingle($data)
	{
		$kode = $data['kode'];
		$cafe = crud_selwhere("cafe",NULL,"kode = '$kode'")['single'];
		return $cafe;
	}
	function editCafe($data)
	{
		$kode = $data['kode'];
		$nama = $data['nama'];
		$provinsi = $data['provinsi'];
		$kota = $data['kota'];
		$alamat = $data['alamat'];
		$updateCafe = crud_update("cafe","nama = '$nama',provinsi = '$provinsi',kota = '$kota',alamat = '$alamat'","kode = '$kode'");
		if ($updateCafe)
		{
			return 1;
		}

	}
	function deleteCafe($data)
	{
		$kode = $data['kode'];
		$delete = crud_delete("cafe","kode = '$kode'");
		if ($delete)
		{
			return 1;
		}
	}
	function addAva($data)
	{
		$file = $data['file'];
		$kode = $data['kode'];
		$check  = crud_selwhere("cafe",NULL,"kode = '$kode'")['single'];

			$filename = md5(rand(0000,9999)).".JPG";
			if (move_uploaded_file($file,"./photo-toko/$filename"))
			{
				$addAva = crud_insert("cover","'','$kode','$filename'");
				if ($addAva)
				{
					return 1;
				}
			}


	}
	function addMenu($data)
	{
		$kode = $data['kode'];
		$nama = $data['nama'];
		$komposisi = $data['komposisi'];
		$harga = $data['harga'];
		$jenis = $data['jenis'];
		$cover = $data['file'];
		$filename = md5(rand(00000,999999)).".JPG";
		if ($jenis == "makanan")
		{
			if (move_uploaded_file($cover,"./menu/$filename"))
			{
				$addmenu = crud_insert("makanan","'','$kode','$nama','$komposisi','$harga','$filename'");
				if ($addmenu)
				{
					return 1;
				}
			}
		}
		else if ($jenis == "minuman")
		{
			if (move_uploaded_file($cover,"./menu/$filename"))
			{
				$addmenu = crud_insert("minuman","'','$kode','$nama','$komposisi','$harga','$filename'");
				if ($addmenu)
				{
					return 1;
				}
			}
		}
	}
	function dataUser($data)
	{
		$key = $data['key'];
		if ($key == "*")
		{
			$user = crud_selwhere("user",NULL,"level = 'user'");
		}
		else
		{
			$user = crud_selwhere("user",NULL,"(level = 'user') AND (nama LIKE '%$key%' OR username LIKE '$key')");
		}
		return $user;
	}
	function deleteUser($data)
	{
		$username = $data['username'];
		$delete = crud_delete("user","username = '$username'");
		if ($delete)
		{
			return 1;
		}
	}
}
