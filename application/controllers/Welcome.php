<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model("admin/M_lokasi");
	}

	public function index()
	{

		$data['title'] = "Beranda";
		$data['provinsi'] = $this->M_lokasi->dataProvinsi();
		$this->renderLandingPage("index",$data);

	}
	function changePassWord(){
		$data['title'] = "Change Password";
		$this->renderLandingPage("page/content/changePassword",$data);
	}
	function ValidatePass(){
		$username = securepost("username",TRUE);
		$data['username'] = $username;
		$peliharaan = md5(securepost("peliharaan",TRUE));
		$select = crud_selwhere("auntetikasi",NULL,"username = '$username' AND auth = '$peliharaan'");
		if ($select['count'] == 1){
			$this->load->view("page/content/changePass",$data);
		}
		else {
			echo "2";
		}
	}
	function newPass() {
		$username = securepost("username");
		$pass = md5(securepost("newPass"));
		$konfirmasi = md5(securepost("confirmPass"));
		if ($pass == $konfirmasi){
			$update = crud_update("user","password = '$pass'","username = '$username'");
			if ($update)
			{
				echo "1";
			}
		}
		else
		{
			echo "2";
		}
	}
}
