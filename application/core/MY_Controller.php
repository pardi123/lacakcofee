<?php


class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function renderLandingPage($conten,$data = null)
	{


			$data['meta'] = $this->load->view("template/meta.php",$data,TRUE);
			$data['script'] = $this->load->view("template/script.php",$data,TRUE);
			$data['style'] = $this->load->view("template/style.php",$data,TRUE);
			$data['navbar']= $this->load->view("template/navbar.php",$data,TRUE);
			//load content
			$data['content'] = $this->load->view($conten,$data,TRUE);
			$this->load->view("base/main",$data);
	}
	function renderAdmin($content,$data = null)
	{
		$webmaster = ses_get("webmaster");
		if ($webmaster)
		{
			$data['meta'] = $this->load->view("template/admin/meta.php",$data,TRUE);
			$data['style'] = $this->load->view("template/admin/style.php",$data,TRUE);
			$data['script'] = $this->load->view("template/admin/script.php",$data,TRUE);
			$data['navbar'] = $this->load->view("template/admin/navbar.php",$data,TRUE);
			$data['sidebar'] = $this->load->view("template/admin/sidebar.php",$data,TRUE);
			// load content
			$data['content'] = $this->load->view($content,$data,TRUE);
			$this->load->view("base/base-admin",$data);
		}
		else
		{
			redirect(base_url());
		}


	}
	function renderStore($content,$data = null)
	{
		$store = ses_get("store");
		if ($store)
		{
			$data['meta'] = $this->load->view("template/store/meta.php",$data,TRUE);
			$data['style'] = $this->load->view("template/store/style.php",$data,TRUE);
			$data['script'] = $this->load->view("template/store/script.php",$data,TRUE);
			$data['navbar'] = $this->load->view("template/store/navbar.php",$data,TRUE);
			$data['sidebar'] = $this->load->view("template/store/sidebar.php",$data,TRUE);
			// load content
			$data['content'] = $this->load->view($content,$data,TRUE);
			$this->load->view("base/base-store",$data);
		}
		else
		{
			redirect(base_url());
		}

	}
}
