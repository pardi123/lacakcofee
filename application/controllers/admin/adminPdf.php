<?php


class adminPdf extends CI_Controller
{
	function index(){
		$this->load->library('pdf');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$data['cafe'] = crud_selwhere("cafe",NULL,"id_data > 0");
		$data['kotaa'] = crud_selwhere("kota",NULL,"id_data > 0");
		$this->pdf->setPaper('A4', 'potrait');
		$filename = "User Terdaftar";
		$this->pdf->load_view($this->load->view("page/test.php",$data,TRUE),$filename);

	}
	function userpdf(){
		$this->load->library('pdf');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$data['user'] = crud_selwhere("user",NULL,"level = 'user'");
		$this->pdf->setPaper('A4', 'potrait');
		$filename = "User Terdaftar";
		$this->pdf->load_view($this->load->view("page/pdf/user.php",$data,TRUE),$filename);
	}
	function pdfProvinsi()
	{
		$this->load->library('pdf');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$data['provinsi'] = crud_selwhere("provinsi",NULL,"id_data > 0");
		$this->pdf->setPaper('A4', 'potrait');
		$filename = "Provinsi Terdaftar";
		$this->pdf->load_view($this->load->view("page/pdf/provinsi.php",$data,TRUE),$filename);
	}
	function pdfKota(){
		$this->load->library('pdf');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$data['kotaa'] = crud_selwhere("kota",NULL,"id_data > 0");
		$this->pdf->setPaper('A4', 'potrait');
		$filename = "Kota Terdaftar";
		$this->pdf->load_view($this->load->view("page/pdf/kota.php",$data,TRUE),$filename);
	}
	function cafePdf(){
		$this->load->library('pdf');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$data['cafe'] = crud_selwhere("cafe",NULL,"id_data > 0");
		$this->pdf->setPaper('A4', 'potrait');
		$filename = "Kota Terdaftar";
		$this->pdf->load_view($this->load->view("page/pdf/cafe.php",$data,TRUE),$filename);

	}
	function menuPdf(){
		$store = ses_get("store");

		$this->load->library('pdf');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$data['cafe'] = crud_selwhere("makanan",NULL,"cafe = '$store'");
		$data['minuman'] = crud_selwhere("minuman",NULL,"cafe ='$store'");
		$this->pdf->setPaper('A4', 'potrait');
		$filename = "Menu";
		$this->pdf->load_view($this->load->view("page/pdf/menu.php",$data,TRUE),$filename);
	}
	function mediaPdf(){
		$store = ses_get("store");

		$this->load->library('pdf');

		$data['cafe'] = crud_selwhere("media",NULL,"cafe = '$store'");
		$this->pdf->setPaper('A4', 'potrait');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$filename = "media";
		$this->pdf->load_view($this->load->view("page/pdf/media.php",$data,TRUE),$filename);
	}
	function mejaPdf(){
		$store = ses_get("store");

		$this->load->library('pdf');

		$data['meja']  =  crud_selwhere("store_meja",NULL,"cafe = '$store'");
		$this->pdf->setPaper('A4', 'potrait');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$filename = "Data Meja";
		$this->pdf->load_view($this->load->view("page/pdf/meja.php",$data,TRUE),$filename);
	}
	function pemesananPdf(){
		$store = ses_get("store");
		$this->load->library('pdf');
		$data['logo'] = base64_encode(file_get_contents(base_url("assets/images/logo.png")));

		$data['pemesanan'] = crud_selwhere("booking_meja",NULL,"cafe = '$store' ORDER BY id_data DESC");
		$this->pdf->setPaper('A4', 'potrait');
		$filename = "Data Meja";
		$this->pdf->load_view($this->load->view("page/pdf/pemesanan.php",$data,TRUE),$filename);
	}
}
