<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class ActionUser extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model("M_user");
	}

}
