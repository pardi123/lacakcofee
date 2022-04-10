<?php
	if ($cafe['count'])
	{
		?>
		<section class="ftco-section">
			<div class="container">
				<div class="row d-flex">
					<?php
						foreach ($cafe['multi'] as $c)
						{
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

												<p><?=$c->alamat?></p>
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
				</div>
				<div class="row mt-5">
					<div class="col text-center">
						<div class="block-27">
							<ul>
								<li><a href="#">&lt;</a></li>
								<li class="active"><span>1</span></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&gt;</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	}

	else
	{
		?>
		<section class="ftco-section">
			<div class="container">
			<center><h5>Hasil Tidak Ditemukan</h5></center>
				<div class="row mt-5">
					<div class="col text-center">
						<div class="block-27">
							<ul>
								<li><a href="#">&lt;</a></li>
								<li class="active"><span>1</span></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&gt;</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
