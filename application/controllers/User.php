<?php


class User extends MY_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->model("M_user");

	}

	function followUser()
	{
		$data['username'] = securepost("username",TRUE);
		$follow = $this->M_user->followUser($data);
		if ($follow == 1)
		{
			echo "1";
		}
	}
	function editProfile()
	{
		$data['provinsi'] = securepost("provinsi",TRUE);
		$data['kota'] = securepost("kota",TRUE);
		$editProfile = $this->M_user->editProfile($data);
		if ($editProfile == 1)
		{
			echo "1";
		}
	}
	function editPhoto()
	{
		$data['ava'] = $_FILES['ava']['tmp_name'];
		$type = $_FILES['ava']['type'];
		if ($type == "image/jpeg")
		{
			$updateAva = $this->M_user->updateAva($data);
			if ($updateAva == 1)
			{
				echo "1";
			}
		}
		else
		{
			echo "2";
		}
	}
	function addUlasan()
	{
		$data['kode'] = securepost("kode",TRUE);
		$data['rating'] = securepost("rating",TRUE);
		$data['ulasan'] = securepost("ulasan",TRUE);
		$addUlasan = $this->M_user->addUlasan($data);
		if ($addUlasan == 1)
		{
			echo "1";
		}
	}
	function cariCafe()
	{
		$data['lokasi'] = htmlspecialchars($this->db->escape_str($_GET['lokasi']));
		$data['title'] = "Cari Cafe";
		$data['nama'] = htmlspecialchars($this->db->escape_str($_GET['nama']));
		$data['cafe'] = $this->M_user->cariCafe($data);

		$this->renderLandingPage("page/content/list-cafe",$data);

	}
	function cafe()
	{
		$data['kode'] = secureget("2");
		$kode = $data['kode'];
		$nama = crud_selwhere("cafe",NULL,"kode = '$kode'")['single']->nama;
		$data['title'] = $nama;
		$data['cafe'] = $this->M_user->cafe($data);
		$username = ses_get("user");
		$kode = $data['kode'];
		if (!empty($username))
		{

			$check  = crud_selwhere("kunjungan",NULL,"username = '$username' AND cafe = '$kode'");
			if ($check['count'])
			{

			}
			else
			{
				$insert = crud_insert("kunjungan","'','$username','$kode'");
			}
		}
		$this->renderLandingPage("page/content/cafe",$data);
	}
	function profile()
	{
		$user  = ses_get("user");
		if (!empty($user))
		{
			$data['user'] = $this->M_user->dataUSer();
			$data['title'] = "Profile";
			$this->renderLandingPage("page/content/profile",$data);
		}
		else
		{
			redirect(base_url());
		}
	}
	function profilePerson()
	{
		$data['username'] = secureget("2",TRUE);
		$data['user'] = $this->M_user->dataPerson($data);
		$user = $data['user'];
		if ($user['count'])
		{
			$data['title'] = "Profile ".$user['single']->nama;

			$this->renderLandingPage("page/content/profile-person",$data);
		}

	}
	function baruDilihat()
	{
		$user  = ses_get("user");
		if (!empty($user))
		{
			$data['user'] = $this->M_user->dataUSer();
			$data['title'] = "Profile";
			$this->renderLandingPage("page/content/kunjungan",$data);
		}
		else
		{
			redirect(base_url());
		}
	}
}
