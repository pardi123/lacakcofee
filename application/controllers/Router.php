<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Router extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("System/M_validator");
	}
	function index()
	{
		$this->M_validator->validateUser();
	}
}
