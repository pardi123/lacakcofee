<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function login()
	{
		$username = securepost("username",TRUE);
		$password = md5(securepost("password",TRUE));
		$check = crud_selwhere("user",NULL,"username = '$username' AND password = '$password'");
		if ($check['count'] == 1)
		{
			$level = $check['single']->level;
			if ($level == "webmaster")
			{
				ses_set("webmaster",$username);
				echo "1";
			}
			elseif ($level == "user")
			{
				ses_set("user",$username);
				echo "1";
			}
			elseif ($level == "store")
			{
				ses_set("store",$username);
				echo "1";
			}
		}
	}
	function registUser()
	{
		$nama = securepost("nama",TRUE);
		$username = securepost("username",TRUE);
		$email = securepost("email",TRUE);
		$password = md5(securepost("password",TRUE));
		$peliharaan  = md5(securepost("peliharaan",TRUE));
		$check  = crud_selwhere("user",NULL,"username = '$username'");
		if ($check['count'] > 0)
		{
			echo "2";
		}
		else
		{

			$addUser = crud_insert("user","'','$nama','$username','$password','$email','','','user','',''");
			if ($addUser)
			{
				$addChangePas = crud_insert("auntetikasi","'','$username','$peliharaan'");
				if ($addChangePas){
					ses_set("user",$username);
					echo "1";
				}
			}
		}
	}
	function logout()
	{
		ses_unset("webmaster");
		ses_unset("user");
		ses_unset("store");
		redirect(base_url());
	}
}
