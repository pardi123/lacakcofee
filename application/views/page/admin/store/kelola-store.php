<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4><?=$title?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<button class="btn btn-primary" data-toggle="modal" data-target="#addCafe"><i class="material-icons">add</i> Tambah Cafe</button>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<a href="<?=base_url()?>cafepdf" target="_blank">

								<button class="btn btn-primary">Cetak Pdf</button>
							</a>
						</div>
					</div>
				</div>
					<div class="col-md-12">
						<div class="row">

							<div class="col-md-3">
								<p class="font-weight-bold">Pilih Provinsi</p>
								<select name="k" id="provinsi" class="form-control text-center">
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
							<div class="col-md-3">
								<p class="font-weight-bold">Pilih Kota</p>
								<select name="kota" id="kota" class="form-control data-kota text-center">
									<option value="*">--- Pilih Kota/Kabupaten ---</option>
								</select>
							</div>
					</div>
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Provinsi</th>
										<th>Kota/Kabupaten</th>
										<th>Alamat</th>
										<th>Cover</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="data-cafe">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addMenu">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			 <div class="modal-header">
				 <h4>Tambah Menu</h4>
			 </div>
			<div class="modal-body formMenu">

			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="addCafe">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Tambah Cafe</h4>
			</div>
			<div class="modal-body">
				<form class="addCaffe">
					<div class="form-group">
						<label>Kode Cafe</label>
						<input type="text" class="form-control" name="kode" placeholder="Kode Cafe">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="text" class="form-control" name="pass" placeholder="pass">
					</div>
					<div class="form-group">
						<label>Nama Cafe</label>
						<input type="text" class="form-control" name="nama" required placeholder="Nama cafe">
					</div>
					<div class="form-group">
						<label>Provinsi</label>
						<select name="provinsi" id="provinsi2" class="form-control" required>
							<option value="">--- Pilih Provinsi ---</option>
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
						<label>Kota/Kabupaten</label>
						<select name="kota" id="kota2" class="form-control data-kota2" required>
							<option value="">--- Pilih Kota/Kabupaten ---</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat Lengkap</label>
						<textarea name="alamat" id="" cols="30" rows="10" class="form-control" required></textarea>
					</div>
					<p>Cover Cafe</p>
					<input type="file" name="cover" required accept="image/jpeg">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Tambah</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="addAva">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Tambah Ava</h4>
			</div>
			<div class="modal-body data-ava">

			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="formCafe">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Edit Cafe</h4>
			</div>
			<div class="modal-body formCafe">

			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	    reloadCafe();
	    $(".addCaffe").submit(function(e){
	        $("#addCafe").modal("hide");
	        e.preventDefault();
	        let data = this;
	        ajax.ajaxfile(
	            "<?=base_url()?>add-cafe",
				data,
				function (res) {
                    if (res === "1")
                    {
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Menambah Data"
                        });
                        window.location = "<?=base_url()?>kelola-store";
                    }
                    else if (res === "2")
					{
                        swal.fire({
                            icon:"error",
                            title:"Gagal",
                            html:"File Tidak Di izinkan"
                        });
                        window.location = "<?=base_url()?>kelola-store";
					}
                    else if(res === "3"){
                        swal.fire({
                            icon:"error",
                            title:"Gagal",
                            html:"Cafe Telah Ada"
                        });
					}
                    else
                    {
                        swal.fire({
                            icon:"error",
                            title:"Gagal",
                            html:"File Tidak Di izinkan"
                        });
                    }
                }
			)
		});
	    $("#kota").on("change",function () {
			reloadCafe();
        });
        $("#provinsi2").on("change",function () {
            reloadKota2();
        });
        function reloadKota2() {
            let data = {"kode":$("#provinsi2").val()};
            ajax.ajaxPost(
                "<?=base_url()?>reload-kota",
                data,
                function(res)
                {
                    $(".data-kota2").html(res);
                }
            )
        };
	    $("#provinsi").on("change",function () {
			reloadKota();
			reloadCafe();
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
        function reloadCafe() {
			let data = {"provinsi":$("#provinsi").val(),"kota":$("#kota").val()}
			ajax.ajaxPost(
			    "<?=base_url()?>data-cafe",
				data,
				function (res) {
					$(".data-cafe").html(res);
                }
			)
        }
	});
</script>
