<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class StorePage extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function berandaStore()
	{
		$data['title'] = "Beranda Store";
		$this->renderStore("page/store/beranda-store",$data);
	}
	function kelolaCafe()
	{
		$data['title'] = "Kelola menu";
		$this->renderStore("page/store/kelola-cafe",$data);
	}
	function kelolaFoto()
	{
		$data['title'] = "Kelola Foto";
		$this->renderStore("page/store/kelola-foto",$data);
	}
	function kelolaMedia()
	{
		$data['title'] = "Kelola Media";
		$this->renderStore("page/store/kelola-media",$data);
	}
	function kelolaMeja(){
		$data['title'] = "Kelola Meja";
		$this->renderStore("page/store/kelola-meja",$data);
	}
	function kelolaPesanMeja() {
		$data['title'] = "Kelola Pemesanan Meja";
		$store = ses_get("store");
		$data['pemesanan'] = crud_selwhere("booking_meja",NULL,"cafe = '$store' ORDER BY id_data DESC");
		$this->renderStore("page/store/kelola-pemesanan",$data);
	}

	function likeCafe(){
		if(!empty(ses_get("user"))){
			$user = ses_get("user");
			$kode = securepost("kode",TRUE);
			$like = crud_insert("like_cafe","'','$kode','$user'");
			if($like){
				echo "1";
			}

		}
		else{
			echo "2";
		}
		
	}
}	
