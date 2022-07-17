<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?=base_url()?>index">Lacakopi</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<?php
					$user = ses_get("user");
					if (empty($user))
					{
						?>
						<li class="nav-item "><a href="<?=base_url()?>" class="nav-link">Home</a></li>
						<li class="nav-item "><a href="javascript:void(0)" data-toggle="modal" data-target="#regist"  class="nav-link">Daftar</a></li>

						<li class="nav-item"><a href="contact.html" class="nav-link" data-toggle="modal" data-target="#modal">Login</a></li>

						<?php
					}
					else
					{
						?>

						<li class="nav-item">
							<a href="javascript:void(0)" class="nav-link text-white" data-toggle="modal" data-target="#cari"> cari</a>

						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="javascript:void(0)" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon-user"></span> Profile</a>
							<div class="dropdown-menu" aria-labelledby="dropdown04">
								<a href="<?=base_url()?>profile" class="dropdown-item">Profile</a>
								<a class="dropdown-item" href="<?=base_url()?>profile">Ulasan</a>
								<a class="dropdown-item" href="<?=base_url()?>profile">Pengikut</a>
								<a class="dropdown-toggle" href="<?=base_url()?>logout"><span class="icon-sign-out"></span> Logout</a>

							</div>
						</li>
						<?php
					}
				?>

			</ul>
		</div>
	</div>

</nav>


<!-- END nav -->
<div class="modal fade" tabindex="-1" role="dialog" id="regist">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content bg-primary">
			<div class="modal-header">
				<center></center>
			</div>
			<div class="modal-body">
				<center>
					<h4 class="text-dark">Daftar</h4>
				</center>
				<form class="ajaxRegist text-dark">
					<div class="form-group">
						<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="username" required placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" name="password" required class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<div class="form-group">
							<input type="email" class="form-control" name="email" required placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="peliharaan" placeholder="Nama Hewan Peliharaan anda">
					</div>

					<div class="form-group">

						<button class="btn btn-white"style="width: 100%;" type="submit">Daftar</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="1" id="modal">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content bg-primary">
			<div class="modal-header">
				<center>
				</center>
			</div>
			<div class="modal-body">
				<center>					<h4 class="text-dark">Login</h4>
				</center>
				<form class="appointment-form login" method="post">
					<div class="form-group">
						<input type="text" class="form-control " name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">

						<a href="<?=base_url()?>changePassword" class="text-white font-weight-bold">Lupa Password ?</a>

					</div>
					<div class="form-group">
						<button class="btn btn-white" id="click" type="submit">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>

<script src="<?=base_url()?>assets/scripts/AjaxRequest.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function(){
        $(".ajaxRegist").submit(function (e)
		{
			e.preventDefault();
			let data = $(this).serialize();
			ajax.ajaxPost(
			    "<?=base_url()?>add-user",
				data,
				function (res) {
					if (res === "1")
					{
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Daftar"
                        });
                        let time =2;
                        let terv = setInterval(function ()
                        {
                            time--;
                            if (time === 0)
                            {
                                window.location= "<?=base_url()?>";

                            }
                        },1000);
					}
					else if(res === "2")
					{
                        swal.fire({
                            icon:"error",
                            title:"Gagal",
                            html:"Akun Telah Ada"
                        });
                        let time =2;
                        let terv = setInterval(function ()
                        {
                            time--;
                            if (time === 0)
                            {
                                window.location= "<?=base_url()?>";

                            }
                        },1000);
					}
					else
					{
                        swal.fire({
                            icon:"error",
                            title:"Gagal",
                            html:"Terjadi Kesalahan"
                        });
                        let time =2;
                        let terv = setInterval(function ()
                        {
                            time--;
                            if (time === 0)
                            {
                                window.location= "<?=base_url()?>";

                            }
                        },1000);
					}
                }
			)
        });
        $(".login").submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();
            ajax.ajaxPost(
                "<?=base_url()?>auth",
				data,
				function (res) {
					if (res === "1")
					{
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Login"
                        });
                        let time =2;
                        let terv = setInterval(function ()
                        {
                            time--;
                            if (time === 0)
                            {
                                window.location= "<?=base_url()?>";

                            }
                        },1000);
					}
					else
					{
                        swal.fire({
                            icon:"error",
                            title:"Gagal",
                            html:"Email Atau Password Salah"
                        });
                        let time =2;
                        let terv = setInterval(function ()
                        {
                            time--;
                            if (time === 0)
                            {
                                window.location= "<?=base_url()?>";

                            }
                        },1000);
					}
                }
			)
        });
    });
</script>
