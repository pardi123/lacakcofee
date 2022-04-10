<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function cariCafe($data)
	{
		$lokasi = $data['lokasi'];
		$nama = $data['nama'];
		$cafe = crud_selwhere("cafe",NULL,"nama LIKE '%$nama%' AND (provinsi = '$lokasi')");
		return $cafe;
	}
	function cafe($data)
	{
		$kode = $data['kode'];
		$cafe = crud_selwhere("cafe",NULL,"kode = '$kode'");
		return $cafe;
	}
	function dataUSer()
	{
		$user = ses_get("user");
		$dataUSer = crud_selwhere("user",NULL,"username = '$user'")['single'];
		return $dataUSer;
	}
	function followUser($data)
	{
		$username = $data['username'];
		$user  = ses_get("user");
		$follow = crud_insert("follower","'','$user','$username'");
		if($follow)
		{
			return 1;
		}
	}
	function editProfile($data)
	{
		$user = ses_get("user");
		$provinsi = $data['provinsi'];
		$kota = $data['kota'];
		$editProfile = crud_update("user","provinsi = '$provinsi',kota = '$kota'","username = '$user'");
		if ($editProfile)
		{
			return 1;
		}
	}
	function dataPerson($data)
	{
		$username = $data['username'];
		$user = crud_selwhere("user",NULL,"username = '$username'");
		return $user;
	}
	function updateAva($data)
	{
		$user = ses_get("user");
		$file = $data['ava'];
		$filename = md5(rand(0000,99999).$user).".jpg";
		if (move_uploaded_file($file,"./ava/$filename"))
		{
			$updateAva = crud_update("user","ava = '$filename'","username = '$user'");
			if ($updateAva)
			{
				return 1;
			}
		}
	}
	function addUlasan($data)
	{
		$username = ses_get("user");
		$kode= $data['kode'];
		$rating = $data['rating'];
		$ulasan = $data['ulasan'];
		$date = date("Y-m-d");
		$addUlasan = crud_insert("ulasan","'','$username','$kode','$ulasan','$rating','$date'");
		if ($addUlasan)
		{
			return 1;
		}
	}
}
