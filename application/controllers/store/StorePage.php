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
}
