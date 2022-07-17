<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4><?=$title?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					 <div class="col-md-12">
						 <div class="row">

							 <div class="col-md-4">

								 <button class="btn btn-primary" data-toggle="modal" data-target="#addMenu"><i class="material-icons">add</i> Tambah Menu</button>
							 </div>
							 <div class="col-md-4">
								 <div class="form-group">
									 <a href="<?=base_url()?>menupdf" target="_blank">

										 <button class="btn btn-primary">Cetak Pdf</button>
									 </a>
								 </div>
							 </div>
						 </div>
					 </div>
					<div class="col-md-4">
						<div class="form-group">
							<select name="jenis" id="jenis" class="form-control jenis-menu">
								<option value="makanan">Makanan</option>
								<option value="minuman">Minuman</option>
							</select>
						</div>
					</div>

					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Jenis</th>
										<th>Harga</th>
										<th>Photo</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="data-menu">

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
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<?php
						$kode = ses_get("store");
						?>
						<form class="addMenu" enctype="multipart/form-data">
							<div class=form-group>
								<label>Nama Menu</label>
								<input type="text" class="form-control" name="nama" required placeholder="Nama Menu">
							</div>
							<div class="form-group">
								<label>Komposisi</label>
								<input type="text" class="form-control" name="komposisi" required placeholder="Komposisi">
							</div>
							<div class="form-group">
								<label>Harga</label>
								<input type="text" name="harga" class="form-control uang" placeholder="Harga">
								<input type="hidden" name="kode" value="<?=$kode?>" required>
							</div>
							<div class="form-group">
								<label>Jenis</label>
								<select name="jenis" id="" class="form-control">
									<option value="makanan">Makanan</option>
									<option value="minuman">Minuman</option>
								</select>
							</div>
							<label>Cover</label>
							<br>
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
	</div>
</div>
<script>
    $(document).ready(function () {
        reloadMenu();
        $(".jenis-menu").on("change",function () {
			reloadMenu();
        });
        $(".addMenu").submit(function(e){
            e.preventDefault();
            $("#addMenu").modal("hide");
            let data = this;
            ajax.ajaxfile(
                "<?=base_url()?>add-menu",
                data,
                function (res) {
                    if (res === "1")
                    {
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Menambah Data"
                        });
                        reloadMenu();
                    }
                    else if(res === "2")
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
                            html:"Terjadi Kesalahan !"
                        });
                    }
                }
            )
        });
        $( '.uang' ).mask('000.000.000', {reverse: true});
        $(".add-menu").submit(function (re) {

        });
        function reloadMenu() {
            let data = {"jenis":$(".jenis-menu").val()};
			ajax.ajaxPost(
			    "<?=base_url()?>data-menu",
				data,
				function (res) {
					$(".data-menu").html(res);
                }
			)
        }
    })
</script>
