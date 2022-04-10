<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
	<!--
	  Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

	  Tip 2: you can also add an image using data-image tag
  -->
	<div class="logo"><a href="<?=base_url()?>" class="simple-text logo-normal">
			Lacakopi
		</a></div>
	<div class="sidebar-wrapper">
		<ul class="nav">
			<li class="nav-item  ">
				<a class="nav-link" href="<?=base_url()?>">
					<i class="material-icons">dashboard</i>
					<p>Dashboard</p>
				</a>
			</li>

					<li class="nav-item">
						<a href="<?=base_url()?>kelola-user" class="nav-link"><i class="material-icons">person</i>
							<p>Kelola User</p>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons">library_books</i>
							<p>Kelola Lokasi </p>

						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="<?=base_url()?>kelola-provinsi">Kelola Provinsi</a>
							<a class="dropdown-item" href="<?=base_url()?>kelola-kota">Kelola Kota</a>
						</div>
					</li>

					<li class="nav-item">
						<a href="<?=base_url()?>kelola-store" class="nav-link"><i class="material-icons">free_breakfast</i>
							<p>Kelola Caffe</p>
						</a>
					</li>


		</ul>
	</div>
</div>
