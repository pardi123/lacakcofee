<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4><?=$title?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<button class="btn btn-primary" data-toggle="modal" data-target="#addMeja"><i class="material-icons">add</i> Tambah Meja</button>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<a href="<?=base_url()?>pdfMeja" target="_blank">

								<button class="btn btn-primary">Cetak Pdf</button>
							</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode Meja</th>
									<th>Nama Meja</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="data-meja">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addMeja">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Tambah Meja</h4>
			</div>
			<div class="modal-body">
				<form class="addMeja" method="post">
					<div class="form-group">
						<label>Kode Meja</label>
						<input type="text" name="kode" class="form-control" required placeholder="kode meja">
					</div>
					<div class="form-group">
						<label>Nama Meja</label>
						<input type="text" name="nama" class="form-control" required placeholder="Nama Meja">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Kirim</button>
						<button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	    reloadMeja();
        $(".addMeja").submit(function (e) {
            e.preventDefault();
            let data = $(this).serialize();
            ajax.ajaxPost(
                "<?=base_url()?>add-meja",
                data,
                function (res) {
                    if (res === "1") {
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            html: "berhasil Menambah Data"
                        });
                        reloadMeja();

                    } else {
                        swal.fire({
                            icon: "error",
                            title: "Gagal",
                            html: "Meja Telah Ada !"
                        });
                    }
                }
            )
        });
        function reloadMeja() {
            ajax.ajaxGet(
                "<?=base_url()?>data-meja",
                function (res) {
                    $(".data-meja").html(res);
                }
            )
        }
	})
</script>
