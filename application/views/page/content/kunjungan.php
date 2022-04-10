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
								if ($user->ava == "")
								{
									?>
									<img src="<?=base_url()?>assets/images/user.jpg" alt="Image placeholder" style="width: 200px; height: 200px; border-radius: 200px;" class="img-fluid mb-4">

									<?php
								}
								else
								{
									?>
									<img src="<?=base_url()?>ava/<?=$user->ava?>" alt="Image placeholder" style="width: 200px; height: 200px; border-radius: 200px;" class="img-fluid mb-4">

									<?php
								}
								?>							</div>
							<div class="desc align-self-md-center">
								<h3><?=$user->nama?></h3>
								<p><i class="material-icons">room</i>
									<?php
									$mengikuti = crud_selwhere("follower",NULL,"username = '$user->username'")['count'];
									if ($user->provinsi == "")
									{
										echo "Belum Mengatur Tempat Tinggal";
									}
									else
									{
										$provinsi = crud_selwhere("provinsi",NULL,"kode = '$user->provinsi'")['single']->nama;
										$kota = crud_selwhere("kota",NULL,"kode = '$user->kota'")['single']->nama;
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
										<strong class="number" data-number="0">0</strong>
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
							<div class="col-md-3">
								<div class="block-18 text-center">
									<div class="text">
										<div class="icon"><span class="icon-chat"></span></div>
										<strong class="number" data-number="0">0</strong>
										<span>Ulasan</span>
									</div>
								</div>

							</div>
							<div class="col-md-4">

							</div>
							<div class="col-md-4">

							</div>
							<div class="col-md-4">
								<button style="margin-bottom: 30px;" class="btn btn-primary" data-toggle="modal" data-target="#editPhoto"><i class="material-icons">edit</i> Edit Photo Profile</button>

								<button class="btn btn-primary" data-toggle="modal" data-target="#editProfile"><i class="material-icons">edit</i> Edit Profile</button>
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
								<li><a href="<?=base_url()?>profile" class="active">Ulasan</a></li>
								<li><a href="#">Pengikut</a></li>
								<li><a href="<?=base_url()?>kunjungan">Baru Dilihat</a></li>

							</div>
						</div>



					</div>
					<div class="col-md-8">
						<div class="row">
								<?php
								$username = ses_get("user");
									$kunjungan = crud_selwhere("kunjungan",NULL,"username = '$username'");
									if ($kunjungan['count'])
									{
										foreach ($kunjungan['multi'] as $k)
											{
												$cafe = crud_selwhere("cafe",NULL,"kode = '$k->cafe'");
												if ($cafe['count'])
												{
													$c = $cafe['single'];
													$provinsi = crud_selwhere("provinsi",NULL,"kode = '$c->provinsi'")['single']->nama;
													$kota = crud_selwhere("kota",NULL,"kode = '$c->kota'")['single']->nama;
													$ulasan = crud_selwhere("ulasan",NULL,"cafe = '$c->kode'");
													$tambah = 0;
													$media = crud_selwhere("media",NULL,"cafe = '$c->kode'");
													if ($media['count'])
													{
														$maps = $media['single']->gmaps;
													}
													else
													{
														$maps = "javascipt:void(0)";
													}
													foreach ($ulasan['multi'] as $u)
													{
														$r = $u->rating;
														$tambah = $tambah+$r;
													}
													if ($ulasan['count'])
													{
														$rating = $tambah/$ulasan['count'];
													}
													else
													{
														$rating = 0;
													}
													?>
													<div class="col-md-4 d-flex ftco-animate">
														<div class="blog-entry align-self-stretch">
															<a href="<?=base_url()?>cafe/<?=$c->kode?>" class="block-20" style="background-image: url('./photo-toko/<?=$c->cover?>');">
															</a>
															<div class="text py-4 d-block">

																<h3 class="heading mt-2"><a href="#"><?=$c->nama?></a></h3>
																<div class="row">
																	<div class="col-md-8">

																	</div>
																	<div class="col-md-4">
																		<a href="<?=$maps?>" target="_blank" class="btn btn-primary">Rute</a>
																	</div>
																</div>
															</div>
															<div class="meta">
																<div><a href="#" class="font-weight-bold text-white"><?=$provinsi?></a></div>
																<div><a href="#" class="font-weight-bold text-white"><?=$kota?></a></div>
																<div><a href="#" class="meta-chat"><span class="icon-star"></span> <?=number_format($rating,"1",",",".")?> <span class="icon-chat"></span> <?=$ulasan['count']?></a></div>
															</div>

														</div>
													</div>

													<?php
												}
												?>

												<?php
											}


									}
									else
									{

									}
								?>
						</div>

					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<div class="sidebar-box ftco-animate">
							<h3>Saran Untuk mengikuti</h3>
							<?php
							$person = crud_selwhere("user",NULL,"level = 'user' LIMIT 4");
							if ($person['count'])
							{
								foreach ($person['multi'] as $p)
								{
									if ($p->username == $user->username)
									{

									}
									else
									{
										?>
										<div class="block-21 mb-4 d-flex">
											<a class="blog-img mr-4" style="
											<?php
											if ($p->ava == "")
											{
												?>
												background-image: url('<?=base_url()?>assets/images/user.jpg');
												<?php
											}
											else
											{
												?>
												background-image: url('<?=base_url()?>ava/<?=$p->ava?>');
												<?php
											}
											?>
												border-radius: 100px;
												"></a>
											<div class="text">
												<h3 class="heading"><a href="<?=base_url()?>profile-person/<?=$p->username?>"><?=$p->nama?></a></h3>
												<div class="meta">
													<?php
													$check = crud_selwhere("follower",NULL,"username = '$user->username' AND mengikuti = '$p->username'");
													if ($check['count'])
													{
														?>
														<div><a href="javascript:void(0)"  ">Telah Mengikuti</a></div>

														<?php
													}
													else
													{
														?>
														<div><a href="javascript:void(0)" class="folow" data="<?=$p->username?>"><span class="material-icons">person_add</span> </a></div>

														<?php
													}
													?>
												</div>
											</div>
										</div>
										<?php
									}

								}
							}
							?>
						</div>

					</div>

				</div>
			</div>

		</div>
	</div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="editPhoto">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content bg-primary">
			<div class="modal-header">
				<h4>Edit Photo Profile</h4>
			</div>
			<div class="modal-body">
				<form class="editPhoto" enctype="multipart/form-data">
					<div class="form-group">
						<p class="text-white font-weight-bold">Masukan File</p>
						<input type="file" name="ava" accept="image/jpeg">
					</div>
					<div class="form-group">
						<button class="btn btn-white" type="submit">Edit</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
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
        $(".editPhoto").submit(function (e) {
            e.preventDefault();
            $("#editPhoto").modal("hide");
            let data = this;
            ajax.ajaxfile(
                "<?=base_url()?>edit-photo-user",
                data,
                function (res) {
                    if (res === "1")
                    {
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Mengubah Data"
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
                    else if(res === "2")
                    {
                        swal.fire({
                            icon:"error",
                            title:"Gagal",
                            html:"Format file tidak didukung"
                        });
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
        });
        $(".editProfile").submit(function (e) {
            e.preventDefault();
            $("#editProfile").modal("hide");
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
                            html:"berhasil Mengubah Data"
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
        $(".folow").click(function(e){
            e.preventDefault();
            let data = {"username":$(this).attr("data")};
            ajax.ajaxPost(
                "<?=base_url()?>followUser",
                data,
                function (res) {
                    if (res === "1")
                    {
                        window.location= "<?=base_url()?>profile";
                    }
                    else
                    {
                        window.location= "<?=base_url()?>profile";

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
