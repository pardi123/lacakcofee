<?php
	if ($cafe['count'])
	{
		$c = $cafe['single'];
		$provinsi = crud_selwhere("provinsi",NULL,"kode = '$c->provinsi'")['single']->nama;
		$kota = crud_selwhere("kota",NULL,"kode = '$c->kota'")['single']->nama;
		$ulasan = crud_selwhere("ulasan",NULL,"cafe = '$c->kode'");
		$tambah = 0;
		if ($ulasan['count'])
		{
			foreach ($ulasan['multi'] as $u)
			{
				$r = $u->rating;
				$tambah = $tambah+$r;
			}
			$rating = $tambah/$ulasan['count'];
		}
		else
		{
			$rating = 0;
		}
		?>
<section class="home-slider owl-carousel">

    <?php
				$cover = crud_selwhere("cover",NULL,"cafe = '$c->kode'");
				if ($cover['count'])
				{
					foreach ($cover['multi'] as $item)
					{
						?>
    <div class="slider-item" style="background-image: url('<?=base_url()?>photo-toko/<?=$item->cover?>');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">



            </div>
        </div>
    </div>
    <?php
					}
				}
			?>

</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="row">


                    <div class="text py-4 d-block">

                        <h3 class="heading mt-2 text-white font-weight-bold"><a href="#"><?=$cafe['single']->nama?>
                                <?php
									$kodeUser = ses_get("user");
									$check = crud_selwhere("like_cafe",NULL,"user = '$kodeUser' AND cafe = '$kode'")['count'];
									$like = crud_selwhere("like_cafe",NULL,"cafe = '$kode'")['count'];
									if (!empty(ses_get("user"))){
										if($check > 0){
											?>
											<span class="material-icons" style="color: #1c7430">thumb_up</span>
											<?php
										}
										else{
											?>
											<span class="material-icons like-cafe" data="<?=$kode?>">thumb_up</span>
											<?php
										}
									}
								?></a>
                        </h3>

                        <p><?=$cafe['single']->alamat?></p>
                        <br>
                        <div><a href="#" class="font-weight-bold text-white"><?=$provinsi?> ,<?=$kota?> ,<span
                                    class="material-icons">thumb_up</span><?=$like?>,<span class="icon-star"></span>
                                <?=number_format($rating,"1",",",".")?>, <span class="icon-chat"></span>
                                <?=$ulasan['count']?></a></div>
                    </div>
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url()?>">Home</a></span>
                            <span>Menu</span>
                            <span><a href="javascript:void(0)" class="btn btn-primary btn-outline-primary"
                                    data-toggle="modal" data-target="<?php
									if (!empty(ses_get("user"))){
										echo "#media";
									}
									else{
										echo "#opsiLain";
									}
								?>">Pesan</a></span> <span
                                class="btn btn-outline-primary" data-toggle="modal" data-target="#video">Lihat
                                Video</span>
                        </p>
                    </div>

                </div>
            </div>
            <br>
            <br>
            <div class="col-md-6 mb-5 pb-3">
                <h3 class="mb-5 heading-pricing ftco-animate">Makanan</h3>
                <?php
							$makanan = crud_selwhere("makanan",NULL,"cafe = '$c->kode'");
							if ($makanan['count'])
							{
								foreach ($makanan['multi'] as $mkn)
								{
									?>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url('<?=base_url()?>menu/<?=$mkn->cover?>');"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span><?=$mkn->nama?></span></h3>
                            <span class="price">Rp.<?=$mkn->harga?></span>
                        </div>
                        <div class="d-block">
                            <p><?=$mkn->komposisi?></p>
                        </div>
                    </div>
                </div>

                <?php
								}
							}
						?>
            </div>

            <div class="col-md-6 mb-5 pb-3">
                <h3 class="mb-5 heading-pricing ftco-animate">Minuman</h3>
                <?php
							$minuman = crud_selwhere("minuman",NULL,"cafe = '$c->kode'");
							if ($minuman['count'])
							{
								foreach ($minuman['multi'] as $mn)
								{
									?>
                <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url('<?=base_url()?>menu/<?=$mn->cover?>');"></div>
                    <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                            <h3><span><?=$mn->nama?></span></h3>
                            <span class="price">Rp.<?=$mn->harga?></span>
                        </div>
                        <div class="d-block">
                            <p><?=$mn->komposisi?></p>
                        </div>
                    </div>
                </div>
                <?php
								}
							}
							else
							{
								?>
                <div class="text-center">
                    <h4>Tidak Ada Menu</h4>
                </div>
                <?php
							}
						?>

            </div>



        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ftco-animate">



                <div class="pt-5 mt-5">
                    <?php
							$user = ses_get("user");

							$ulasan = crud_selwhere("ulasan",NULL,"cafe = '$kode'");

							?>
                    <h3 class="mb-5"><?=$ulasan['count']?> Comments</h3>
                    <ul class="comment-list">
                        <?php
									if ($ulasan['count'])
									{
										foreach ($ulasan['multi'] as $u)
										{
											$dataUser = crud_selwhere("user",NULL,"username = '$u->username'")['single'];
											?>
                        <li class="comment">
                            <div class="vcard bio">
                                <?php
														if ($dataUser->ava == "")
														{
															?>
                                <img src="<?=base_url()?>assets/images/person_2.jpg" alt="">
                                <?php
														}
														else
														{
															?>
                                <img src="<?=base_url()?>ava/<?=$dataUser->ava?>" alt="Image placeholder">

                                <?php
														}
													?>
                            </div>
                            <div class="comment-body">
                                <h3><?=$dataUser->nama?><h3>
                                        <div class="meta"><?=$u->date?></div>

                                        <p><a href="javascript:void(0)" class="reply">

                                                <?php
															for ($i=1; $i<= $u->rating; $i++)
															{
																?>
                                                <i class="material-icons">star</i>

                                                <?php
															}
															?>
                                            </a></p>
                                        <p><?=$u->ulasan?></p>

                            </div>
                        </li>

                        <?php
										}


									}
									else
									{
										?>
                        <h4>Tidak Ada komentar</h4>
                        <?php
									}
								?>

                    </ul>
                    <!-- END comment-list -->

                    <?php
								if (empty(ses_get("user")))
								{

								}
								else
								{
									$cekUlasan = crud_selwhere("ulasan",NULL,"username = '$user' AND cafe = '$c->kode'");
									if ($cekUlasan['count'])
									{

									}
									else
									{
										?>
                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Tinggalkan Ulasan</h3>
                        <form class="ulasan">

                            <div class="form-group">
                                <label for="message">Rating</label>
                                <select name="rating" id="" class="form-control"
                                    style="color: black !important; background-color: white !important;">

                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="message">Ulasan</label>
                                <input type="hidden" name="kode" value="<?=$kode?>">
                                <textarea name="ulasan" id="message" cols="30" rows="10"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn py-3 px-4 btn-primary">Kirim Ulasan</button>
                            </div>

                        </form>
                    </div>
                    <?php
									}
								}
							?>
                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-md-4 sidebar ftco-animate">

                <div class="sidebar-box ftco-animate">
                    <h3>Mungkin Cafe yang Anda Cari</h3>
                    <?php

								$cafe = crud_selwhere("cafe",NULL,"id_data > 0");
								if ($cafe['count'])
								{

									foreach ($cafe['multi'] as $c)
									{
										$namapr = crud_selwhere("provinsi",NULL,"kode = '$c->provinsi'")['single']->nama;
										if ($c->kode == $kode)
										{

										}
										else
										{
											$ulasan = crud_selwhere("ulasan",NULL,"cafe = '$c->kode'")['count'];
											?>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="
												<?php
												if ($c->cover == "")
												{
													?>
													background-image: url('<?=base_url()?>assets/images/image_1.jpg');
													<?php
												}
												else
												{
													?>
													background-image: url('<?=base_url()?>photo-toko/<?=$c->cover?>');
													<?php
												}
												?>
													"></a>
                        <div class="text">
                            <h3 class="heading"><a href="<?=base_url()?>cafe/<?=$c->kode?>"><?=$c->nama?></a></h3>
                            <div class="meta">
                                <!--<div><a href="javascript:void(0)" >
																<?php
/*																$bintang = 0;
																	$rating = crud_selwhere("ulasan",NULL,"id_data > 0");
																	foreach ($rating['multi'] as $r)
																	{
																		$bintang =0+$r->rating;
																	}
																*/?>
															</a></div>-->
                                <div><a href="#"><span class="icon-map"></span> <?=$namapr?></a></div>
                                <div><a href="#"><span class="icon-chat"></span> <?=$ulasan?></a></div>
                            </div>
                        </div>
                    </div>

                    <?php
										}

									}
								}
							?>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Tag Cloud</h3>
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link">dish</a>
                        <a href="#" class="tag-cloud-link">menu</a>
                        <a href="#" class="tag-cloud-link">food</a>
                        <a href="#" class="tag-cloud-link">sweet</a>
                        <a href="#" class="tag-cloud-link">tasty</a>
                        <a href="#" class="tag-cloud-link">delicious</a>
                        <a href="#" class="tag-cloud-link">desserts</a>
                        <a href="#" class="tag-cloud-link">drinks</a>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                        voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                        similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>

        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="video">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
									$video = crud_selwhere("video",NULL,"cafe = '$c->kode'");
									if ($video['count'])
									{
										?>
                        <video controls style="width: 400px; height: 400px;">
                            <source src="<?=base_url()?>photo-toko/<?=$video['single']->video?>" type="video/webm" />
                            Browsermu tidak mendukung tag ini, upgrade donk!
                        </video>
                        <?php
									}
								?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="media">
    <?php
				$meja = crud_selwhere("store_meja",NULL,"cafe = '$kode'");


			?>
    <div class="modal-dialog" role="dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4>Pesan Meja</h4>
            </div>
            <div class="modal-body">
               <div class="row">
				   <div class="col-md-12">
					   <form class="bookingMeja">
						   <div class="form-group">
							   <label  class="text-white">Nomor Meja </label>
							   <select name="kodeMeja" id="" class="form-control text-black-50 bg-dark" required>
								   <?php
								   		if ($meja['count']){
								   			foreach ($meja['multi'] as $m){
								   				?>
												<option value="<?=$m->kode?>" class="text-black-50"><?=$m->nama?></option>
												<?php
											}
										}
								   ?>
							   </select>
						   </div>
						   <div class="form-group">
							   <label class="text-white">
								   Nomor Handphone
							   </label>
							   <input type="text" class="form-control" required name="phone">
							   <input type="hidden" name="username" value="<?=$kodeUser?>" required>
							   <input type="hidden" name="cafe" value="<?=$kode?>" required>
						   </div>

						   <div class="form-group">
							   <label class="text-white" >Tanggal Pemesanan</label>
							   <input type="date" class="form-control" name="date" required>
						   </div>
						   <div class="form-group">
							   <button class="btn btn-dark btn-lg">Pesan</button>
						   </div>
					   </form>
				   </div>
			   </div>
            </div>
        </div>
    </div>

</div><!-- .section -->
<div class="modal fade" tabindex="-1" role="dialog" id="opsiLain">
			<?php
			$media = crud_selwhere("media",NULL,"cafe = '$c->kode'");
			if ($media['count'])
			{
				$m = $media['single'];
				$wa = $m->wa;
				$grab = $m->grab;
			}
			else
			{
				$m = "";
				$wa = "";
				$grab = "";
			}
			?>
			<div class="modal-dialog" role="dialog">
				<div class="modal-content bg-primary">
					<div class="modal-header">
						<h4>Pesan Meja</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-5">

										<img src="<?=base_url()?>assets/images/wa.png" alt=""
											 style="width: 100px; height: 100px; object-fit: cover">
									</div>
									<div class="col-md-6">
										<p class="text-white" style="margin-top: 30px;"><b><?=$wa?></b></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-4">

										<img src="<?=base_url()?>assets/images/grab.jpg" alt=""
											 style="width: 50px; height: 50px; margin-left: 25px; object-fit: cover">
									</div>
									<div class="col-md-6">
										<p class="text-white" style="margin-top: 10px; margin-left: 25px"><b><?=$grab?></b></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- .section -->


<?php
	}
?>
<script>
$(document).ready(function() {
    $(".bookingMeja").submit(function(e){
        e.preventDefault();
        let data = $(this).serialize();
        ajax.ajaxPost(
            "<?=base_url()?>pesan-meja",
			data,
			function (res) {
                if (res === "1") {
                    swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        html: "berhasil Memesan Meja"
                    });
                    let time = 2;
                    let terv = setInterval(function() {
                        time--;
                        if (time === 0) {
                            window.location = "<?=base_url()?>cafe/<?=$kode?>";

                        }
                    }, 1000);
                }
                else{
                    swal.fire({
                        icon: "error",
                        title: "Gagal",
                        html: "Meja Telah Dipesan"
                    });
                    let time = 2;
                    let terv = setInterval(function() {
                        time--;
                        if (time === 0) {
                            window.location = "<?=base_url()?>cafe/<?=$kode?>";

                        }
                    }, 1000);
				}
            }
		)
	})
    $(".like-cafe").click(function(e) {
        e.preventDefault();
        let data = {
            "kode": $(this).attr("data")
        };
        ajax.ajaxPost(
            "<?=base_url()?>add-like-cafe",
            data,
            function(res) {
                if (res === "1") {
                    swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        html: "berhasil Menyukai Cafe"
                    });
                    let time = 2;
                    let terv = setInterval(function() {
                        time--;
                        if (time === 0) {
                            window.location = "<?=base_url()?>cafe/<?=$kode?>";

                        }
                    }, 1000);
                } else {
                    alert(res)
                }
            }
        )
    })
    $(".ulasan").submit(function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        ajax.ajaxPost(
            "<?=base_url()?>add-ulasan",
            data,
            function(res) {
                if (res === "1") {
                    swal.fire({
                        icon: "success",
                        title: "Berhasil",
                        html: "berhasil Memberikan Ulasan"
                    });
                    let time = 2;
                    let terv = setInterval(function() {
                        time--;
                        if (time === 0) {
                            window.location = "<?=base_url()?>cafe/<?=$kode?>";

                        }
                    }, 1000);
                } else {
                    swal.fire({
                        icon: "error",
                        title: "Gagal",
                        html: "Terjadi Kesalahan"
                    });
                    let time = 2;
                    let terv = setInterval(function() {
                        time--;
                        if (time === 0) {
                            window.location = "<?=base_url()?>cafe/<?=$kode?>";

                        }
                    }, 1000);
                }
            }
        )
    })
});
</script>
