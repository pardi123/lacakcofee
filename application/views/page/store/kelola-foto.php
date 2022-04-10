<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4><?=$title?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-primary" data-toggle="modal" data-target="#addFoto"><i class="material-icons">add</i> Tambah Foto Atau Video</button>

					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Jenis</label>
									<select name="jenis" id="jenis" class="form-control">
										<option value="foto">Foto</option>
										<option value="video">Video</option>
									</select>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Foto Atau Video</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="data-foto">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="addFoto">
	<div class="modal-dialog" role="dialog">
		<?php
			$kode = ses_get("store");
		?>
		<div class="modal-content">
			<div class="modal-header">
				<h4>Tambah Foto</h4>
			</div>
			<div class="modal-body">
				<form class="addAva" enctype="multipart/form-data">
					<label>Pilih Photo</label>
					<input type="hidden" name="kode" value="<?=$kode?>" required>
					<input type="file" class="form-control-file" name="ava" required accept="image/jpeg, video/mp4">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Kirim</button>
						<button class="btn btn-danger" type="button" data-dismis="modal">Batal</button>
					</div>
				</form>


			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function () {
        reloadFoto();
        $(".addAva").submit(function (e) {
            $("#addAva").modal("hide");
            e.preventDefault();
            let data = this;
            ajax.ajaxfile(
                "<?=base_url()?>add-ava",
                data,
                function (res) {
                    if (res === "1")
                    {
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Menambah Photo"
                        });
                    }
                    else if (res === "2")
                    {
                        swal.fire({
                            icon:"error",
                            title:"Gagal",
                            html:"Format File Tidak Didukung"
                        });
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
        $("#jenis").on("change",function () {
			reloadFoto();
        });
        function reloadFoto() {
            let data = {"jenis":$("#jenis").val()};
			ajax.ajaxPost(
			    "<?=base_url()?>data-foto",
				data,
				function (res) {
					$(".data-foto").html(res);
                }
			)
        }

    })
</script>
