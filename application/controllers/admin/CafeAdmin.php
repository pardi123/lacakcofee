<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CafeAdmin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("admin/M_cafe");
		$this->load->model("admin/M_lokasi");
	}
	function addCafe()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['nama'] = securepost("nama",TRUE);
		$data['provinsi'] = securepost("provinsi",TRUE);
		$data['kota'] = securepost("kota",TRUE);
		$data['alamat'] = securepost("alamat",TRUE);
		$data['cover'] = $_FILES['cover']['tmp_name'];
		$data['pass'] = md5(securepost("pass",TRUE));
		$type = $_FILES['cover']['type'];
		if ($type == "image/jpeg")
		{

			if ($data['kota'] == "*")
			{
				echo "2";
			}
			else
			{
				$insert = $this->M_cafe->addCafe($data);
				if ($insert == 1)
				{
					echo "1";
				}
			}
		}
		else
		{
			echo "2";
		}
	}
	function dataCafe()
	{
		$data['provinsi'] = securepost("provinsi",TRUE);
		$data['kota'] = securepost("kota",TRUE);
		$data['cafe'] = $this->M_cafe->dataCafe($data);
		$this->load->view("page/admin/viewholder/cafe/data-cafe",$data);
	}
	function formCafe()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['cafe'] = $this->M_cafe->dataCafeSingle($data);
		$data['provinsi'] = $this->M_lokasi->dataProvinsi();
		$this->load->view("page/admin/viewholder/cafe/form-cafe",$data);
	}
	function editCafe()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['nama'] = securepost("nama",TRUE);
		$data['provinsi'] = securepost("provinsi",TRUE);
		$data['kota'] = securepost("kota",TRUE);
		$data['alamat'] = securepost("alamat",TRUE);
		$editCafe = $this->M_cafe->editCafe($data);
		if ($editCafe == 1)
		{
			echo "1";
		}
	}
	function deleteCafe()
	{
		$data['kode'] = securepost("kode",TRUE);
		$delete = $this->M_cafe->deleteCafe($data);
		if ($delete == 1)
		{
			echo "1";
		}
	}
	function formAva()
	{
		$data['kode'] = securepost("kode",TRUE);
		$this->load->view("page/admin/viewholder/cafe/form-ava",$data);
	}
	function addAva()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['file'] = $_FILES['ava']['tmp_name'];
		$data['type'] = $_FILES['ava']['type'];
		if ($data['type'] == "image/jpeg")
		{
			$addAva = $this->M_cafe->addAva($data);
			if ($addAva == 1)
			{
				echo "1";
			}
		}
		elseif ($data['type'] == "video/mp4")
		{
			$file = $data['file'];
			$kode = $data['kode'];
			$check  = crud_selwhere("cafe",NULL,"kode = '$kode'")['single'];

			$check2  = crud_selwhere("cafe",NULL,"kode = '$kode'");

			if ($check2['count'])
			{

				$filename = md5(rand(0000,9999)).".MP4";
				if (move_uploaded_file($file,"./photo-toko/$filename"))
				{
					$addAva = crud_update("video","video = '$filename'","cafe = '$kode'");
					if ($addAva)
					{
						echo "1";
					}
				}
			}
			else
			{


				$filename = md5(rand(0000,9999)).".MP4";
				if (move_uploaded_file($file,"./photo-toko/$filename"))
				{
					$addAva = crud_insert("video","'','$kode','$filename'");
					if ($addAva)
					{
						echo "1";
					}
				}
			}
		}
		else
		{
			echo "2";
		}
	}
	function formMenu()
	{
		$data['kode'] = securepost("kode",TRUE);
		$this->load->view("page/admin/viewholder/cafe/form-menu",$data);
	}
	function addMenu()
	{
		$data['nama'] = securepost("nama",TRUE);
		$data['harga'] = securepost("harga",TRUE);
		$data['komposisi'] = securepost("komposisi",TRUE);
		$data['jenis'] = securepost("jenis",TRUE);
		$data['kode'] = securepost("kode",TRUE);
		$data['file'] = $_FILES['cover']['tmp_name'];
		$type = $_FILES['cover']['type'];
		if ($type == "image/jpeg")
		{
			$addMenu = $this->M_cafe->addMenu($data);
			if ($addMenu)
			{
				echo "1";
			}
		}
		else
		{
			echo "2";
		}
	}
	function dataUser()
	{
		$data['key'] = securepost("key",TRUE);
		$data['user'] = $this->M_cafe->dataUser($data);
		$this->load->view("page/admin/viewholder/user/data-user",$data);

	}
	function deleteUser()
	{
		$data['username'] = securepost("username",TRUE);
		$delete = $this->M_cafe->deleteUser($data);
		if ($delete == 1)
		{
			echo "1";
		}
	}
}
