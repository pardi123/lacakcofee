<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class M_validator extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function validateUser()
	{
		$admin = ses_get("webmaster");
		$user = ses_get("user");
		$store =  ses_get("store");
		if (!empty($admin))
		{
			redirect(base_url("beranda-admin"));
		}
		elseif (!empty($user))
		{
			redirect(base_url("profile"));
		}
		elseif (!empty($store))
		{
			redirect(base_url("beranda-store"));
		}
		else
		{
			redirect(base_url("index"));
		}
	}
}
