<style>
	.ftco-menu
	{
		background-image: url("<?=base_url()?>assets/images/bg_1.jpg");
	}
</style>

<section class="ftco-menu mb-5 pb-5">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Lacakopi</span>
				<br>
				<h2 class="mb-4">Cari tampat kopi terbaikmu</h2>
				<div class="row">
					<div class="col-md-12">
						<form action="<?=base_url()?>cari-cafe" method="get">
							<div class="row">
								<div class="col-md-3">

									<select name="lokasi" id="" class="form-control bg-white">
										<?php
											if ($provinsi['count'])
											{
												foreach ($provinsi['multi'] as $p)
												{
													?>
													<option value="<?=$p->kode?>"><?=$p->nama?></option>
													<?php
												}
											}
										?>
									</select>
								</div>
								<div class="col-md-9">

									<div class="form-group">
										<input type="text" name="nama" class="form-control bg-white" placeholder=" Cari kopi terbaikmu">
									</div>
								</div>
							</div>
							<button class="btn btn-primary btn-outline-primary p-3 px-xl-4 py-xl-3" type="submit">Car Sekarang</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-md-flex">
			<div class="col-lg-12 ftco-animate p-md-5">
				<div class="row">
					<div class="col-md-12 d-flex align-items-center">


						<div class="tab-content ftco-animate" id="v-pills-tabContent">

							<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
								<div class="row">
									<div class="col-md-2">

									</div>
									<div class="col-md-3 text-center">
										<div class="menu-wrap">
											<a href="#" class="menu-img img mb-4" style="background-image: url('<?=base_url()?>assets/images/kopi2.jpg');"></a>
											<div class="text">
												<h3><a href="#">Roastery</a></h3>
												<p>Cari roastery kopi terbaik disini</p>
												<p><a href="#" class="btn btn-primary btn-outline-primary " data-toggle="modal" data-target="#cari">Cari</a></p>
											</div>
										</div>
									</div>
									<div class="col-md-3 text-center">
										<div class="menu-wrap">
											<a href="#" class="menu-img img mb-4" style="background-image: url('<?=base_url()?>assets/images/kopi1.jpg');"></a>
											<div class="text">
												<h3><a href="#">Kedai Terbaik</a></h3>
												<p>Di lacakopi menyediakan kedai-kedai terbaik di berbagai daerah</p>
 												<p><a href="#" class="btn btn-primary btn-outline-primary" data-toggle="modal" data-target="#cari">Cari</a></p>
											</div>
										</div>
									</div>

									<div class="col-md-3 text-center">
										<div class="menu-wrap">
											<a href="#" class="menu-img img mb-4 cari-lokasi" data-toggle="modal" data-target="#cari-lokasi" style="background-image: url('<?=base_url()?>assets/images/lokasi.webp');"></a>
											<div class="text">
												<h3><a href="#">Kedai Terdekat</a></h3>
												<p>Cari Kedai Terdekatmu di lacakopi</p>
												<p><a href="#" class="btn btn-primary btn-outline-primary " data-toggle="modal" data-target="#cari">Cari</a></p>
												</div>
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>








