<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class StoreAction extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function dataMenu()
	{
		$store = ses_get("store");
		$jenis = securepost("jenis",TRUE);
		$data['jenis'] = $jenis;
		$data['menu'] = crud_selwhere("$jenis",NULL,"cafe = '$store'");
		$this->load->view("page/store/viewholder/data-menu",$data);
	}
	function deleteMenu()
	{
		$store = ses_get("store");
		$jenis = securepost("jenis");
		$id = securepost("id",TRUE);
		$delete = crud_delete("$jenis","id_data = '$id'");
		if ($delete)
		{
			echo "1";
		}
	}
	function dataFoto()
	{
		$store = ses_get("store");
		$jenis = securepost("jenis",TRUE);
		if ($jenis == "foto")
		{
			$data['foto'] = crud_selwhere("cover",NULL,"cafe = '$store'");
			$this->load->view("page/store/viewholder/data-foto",$data);
		}
	elseif ($jenis == "video")
		{
			$data['video'] = crud_selwhere("video",NULL,"cafe = '$store'");

			$this->load->view("page/store/viewholder/data-video",$data);
		}
	}
	function deleteFoto()
	{
		$id = securepost("id",TRUE);
		$delete = crud_delete("cover","id_data = '$id'");
		if ($delete)
		{
			echo "1";
		}

	}
	function deleteVideo()
	{
		$id = securepost("id",TRUE);
		$delete = crud_delete("video","id_data = '$id'");
		if ($delete)
		{
			echo "1";
		}
	}
	function addMedia()
	{
		$wa = securepost("wa",TRUE);
		$grab = securepost("grab",TRUE);
		$gmaps = securepost("gmaps",TRUE);
		$store = ses_get("store");
		$insert = crud_insert("media","'','$store','$wa','$grab','$gmaps'");
		if ($insert)
		{
			echo "1";
		}
	}
	function dataMedia()
	{
		$store  = ses_get("store");
		$data['media'] = crud_selwhere("media",NULL,"cafe = '$store'");
		$this->load->view("page/store/viewholder/data-media",$data);
	}
	function deletemedia()
	{
		$id = securepost("id",TRUE);
		$delete = crud_delete("media","id_data = '$id'");
		if ($delete)
		{
			echo "1";
		}
	}
}
