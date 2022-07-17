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

	function dataMeja(){
		$store = ses_get("store");
		$data['meja']  =  crud_selwhere("store_meja",NULL,"cafe = '$store'");
		$this->load->view("page/store/viewholder/data-meja",$data);
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
	function addMeja() {
		$store = ses_get("store");
		$kode =  securepost("kode",TRUE);
		$nama = securepost("nama",TRUE);
		$check = crud_selwhere("store_meja",NULL,"kode = '$kode' AND cafe = '$store'")['count'];
		if ($check > 0){
			echo "2";
		}
		else{
			$addMeja = crud_insert("store_meja","'','$store','$kode','$nama','free'");
			if ($addMeja){
				echo "1";
			}
		}
	}
	function pesanMeja(){
		$cafe = securepost("cafe",TRUE);
		$kodeMeja = securepost("kodeMeja",TRUE);
		$username = securepost("username",TRUE);
		$phone = securepost("phone",TRUE);
		$date = securepost("date",TRUE);
		$noBoking = rand(1,9999);
		$check = crud_selwhere("booking_meja",NULL,"cafe = '$cafe' AND kode = '$kodeMeja' AND tanggal_pemesanan  = '$date' AND status = 'dipesan'");
		if ($check['count'] > 0) {
			echo "2";
		}
		else {
			$addBoking = crud_insert("booking_meja","'','$cafe','$kodeMeja','$username','$phone','$date','$noBoking','dipesan'");
			if ($addBoking){
				echo "1";
			}
		}

	}
	function pemesananSelesai(){
		$id = securepost("id",TRUE);
		$status = securepost("status",TRUE);
		if ($status == "selesai"){
			$pesananSelesai = crud_update("booking_meja","status = 'selesai'","id_data = '$id'");
			if ($pesananSelesai){
				echo "1";
			}
		}
		elseif ($status == "batal"){
			$pesananSelesai = crud_update("booking_meja","status = 'dibatalkan'","id_data = '$id'");
			if ($pesananSelesai){
				echo "1";
			}
		}

	}
}
