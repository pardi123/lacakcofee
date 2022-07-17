<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url('<?=base_url()?>assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<div class="about-author d-flex">
							<div class="bio align-self-md-center mr-5">
								<?php
								if ($user['single']->ava == "")
								{
									?>
									<img src="<?=base_url()?>assets/images/user.jpg" alt="Image placeholder" style="width: 200px; height: 200px; border-radius: 200px;" class="img-fluid mb-4">

									<?php
								}
								else
								{
									?>
									<img src="<?=base_url()?>ava/<?=$user['single']->ava?>" alt="Image placeholder" style="width: 200px; height: 200px; border-radius: 200px;" class="img-fluid mb-4">

									<?php
								}
								?>
							</div>
							<div class="desc align-self-md-center">
								<h3><?=$user['single']->nama?></h3>
								<p><i class="material-icons">room</i>
									<?php
									$me = ses_get("user");
									$u = $user['single'];

									$mengikuti = crud_selwhere("follower",NULL,"username = '$u->username'")['count'];
									$pengikut = crud_selwhere("follower",NULL,"mengikuti = '$username'")['count'];
									if ($user['single']->provinsi == "")
									{
										echo "Belum Mengatur Tempat Tinggal";
									}
									else
									{
										$provinsi = crud_selwhere("provinsi",NULL,"kode = '$u->provinsi'")['single']->nama;
										$kota = crud_selwhere("kota",NULL,"kode = '$u->kota'")['single']->nama;
										?>
										<?=$provinsi?>, <?=$kota?>
										<?php
									}
									?>
								</p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="row">
							<div class="col-md-4">

							</div>

							<div class="col-md-3">

							</div>
							<div class="col-md-3">

							</div>
							<div class="col-md-3">
								<div class="block-18 text-center">
									<div class="text">
										<div class="icon"><span class="material-icons">person</span></div>
										<strong class="number" data-number="<?=$pengikut?>">0</strong>
										<span>Pengikut</span>
									</div>
								</div>

							</div>
							<div class="col-md-3">
								<div class="block-18 text-center">
									<div class="text">
										<div class="icon"><span class="material-icons">person</span></div>
										<strong class="number" data-number="<?=$mengikuti?>">0</strong>
										<span>Mengikuti</span>
									</div>
								</div>

							</div>
							<?php
									$user1 = ses_get("user");

									$ulasan = crud_selwhere("ulasan",NULL,"username = '$user1'");

								?>
							<div class="col-md-3">
								<div class="block-18 text-center">
									<div class="text">
										<div class="icon"><span class="icon-chat"></span></div>
										<strong class="number" data-number="<?=$ulasan['count']?>">0</strong>
										<span>Ulasan</span>
									</div>
								</div>

							</div>
							<div class="col-md-4">

							</div>
							<div class="col-md-4">

							</div>
							<div class="col-md-4">
								<?php
								$check = crud_selwhere("follower",NULL,"username = '$me' AND mengikuti = '$username'");
								if ($check['count'])
								{
									?>
									<button class="btn btn-primary" data-toggle="modal"><i class="material-icons">check</i> Telah Mengikuti</button>

									<?php
								}
								else
								{
									?>
									<button class="btn btn-primary follow" data="<?=$username?>" ><i class="material-icons">person_add</i> Ikuti</button>

									<?php
								}

								?>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<div class="sidebar-box ftco-animate">
							<div class="categories">
								<h3>Aktivitas</h3>
								<li><a href="#" class="active">Ulasan</a></li>
								<li><a href="#">Pengikut</a></li>
								<li><a href="#">Baru Dilihat</a></li>

							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<div class="modal fade" role="dialog" tabindex="-1" id="editProfile">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content bg-primary">
			<div class="modal-header">
				<h4>Edit Profile</h4>
			</div>
			<div class="modal-body">
				<form class="editProfile">
					<div class="form-group">
						<p class="text-white font-weight-bold" >Pilih Provinsi</p>
						<select name="provinsi" id="provinsi" class="form-control" required>
							<?php
							$provinsi = crud_selwhere("provinsi",NULL,"id_data >0");
							if ($provinsi['count'])
							{
								foreach ($provinsi['multi'] as $pr)
								{
									?>
									<option value="<?=$pr->kode?>"><?=$pr->nama?></option>
									<?php
								}
							}

							?>
						</select>
					</div>
					<div class="form-group">
						<p class="text-white font-weight-bold">Pilih Kota</p>
						<select name="kota" id="Kota" class="form-control data-kota" required>

						</select>

					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-outline-white">Edit</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
        reloadKota();
        $("#provinsi").on("change",function () {
            reloadKota();
        });
        $(".editProfile").submit(function (e) {
            e.preventDefault();
            $("#editProfile").modal("hdie");
            let data = $(this).serialize();
            ajax.ajaxPost(
                "<?=base_url()?>edit-profile",
                data,
                function (res) {
                    if (res === "1")
                    {
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Menambah Data"
                        });
                        let time =2;
                        let terv = setInterval(function ()
                        {
                            time--;
                            if (time === 0)
                            {
                                window.location= "<?=base_url()?>profile";

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
                    }
                }
            )
        })
        $(".follow").click(function(e){
            e.preventDefault();
            let data = {"username":$(this).attr("data")};
            ajax.ajaxPost(
                "<?=base_url()?>followUser",
                data,
                function (res) {
                    if (res === "1")
                    {
                        window.location= "<?=base_url()?>profile-person/<?=$username?>";
                    }
                    else
                    {
                        window.location= "<?=base_url()?>profile-person/<?=$username?>";

                    }
                }
            )
        });
        function reloadKota() {
            let data = {"kode":$("#provinsi").val()};
            ajax.ajaxPost(
                "<?=base_url()?>reload-kota",
                data,
                function(res)
                {
                    $(".data-kota").html(res);
                }
            )
        };
    });
</script>
