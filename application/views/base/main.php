<!DOCTYPE html>
<html>
	<head>
		<?=$meta?>
		<?=$style?>

	</head>
	<body>
		<?=$navbar?>
		<?=$content?>
		<div class="modal fade" role="dialog" tabindex="-1" id="cari">
			<div class="modal-dialog" role="dialog">
				<div class="modal-content bg-primary">
					<div class="modal-header">
						<h4>Cari Cafe Favoritmu</h4>
					</div>
					<div class="modal-body">
						<form action="<?=base_url()?>cari-cafe">
							<?php
							$provinsi = crud_selwhere("provinsi",NULL,"id_data > 0");

							?>
							<div class="form-group">
								<p class="font-weight-bold text-white">Pilih Provinsi</p>
								<select name="lokasi" id="" class="form-control">
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
							<div class="form-group">
								<p class="font-weight-bold text-white">Cari Nama Cafe</p>
								<input type="text" name="nama" class="form-control">
							</div>
							<div class="form-group">
								<button class="btn btn-white" type="submit">Cari</button>
								<button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?=$script?>

	</body>
</html>
