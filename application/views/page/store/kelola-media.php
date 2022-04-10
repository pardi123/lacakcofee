<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4><?=$title?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-primary" data-toggle="modal" data-target="#addMedia"><i class="material-icons">add</i> Tambah Media</button>
					</div>
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Whatsap</th>
										<th>Grab</th>
										<th>Google Maps</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody class="data-media">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="addMedia">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Tambah Media</h4>
			</div>
			<div class="modal-body">
				<form class="addMedia" method="post">
					<div class="form-group">
						<label>Whatsap</label>
						<input type="text" name="wa" class="form-control" required placeholder="Whatsap">
					</div>
					<div class="form-group">
						<label>Grab</label>
						<input type="text" name="grab" class="form-control" required placeholder="Grab">
					</div>
					<div class="form-group">
						<label>Google Maps</label>
						<input type="text" name="gmaps" required class="form-control" placeholder="Google Maps">
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
	$(document).ready(function () {
	    reloadMedia();
		$(".addMedia").submit(function (e) {
			e.preventDefault();
			let data = $(this).serialize();
			ajax.ajaxPost(
			    "<?=base_url()?>add-media",
				data,
                function (res) {
                    if (res === "1") {
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            html: "berhasil Menambah Data"
                        });
                        reloadMedia();

                    } else {
                        swal.fire({
                            icon: "error",
                            title: "Gagal",
                            html: "Terjadi Kesalahan !"
                        });
                    }
                }
			)
        });
		function reloadMedia() {
			ajax.ajaxGet(
			    "<?=base_url()?>data-media",
				function (res) {
					$(".data-media").html(res);
                }
			)
        }
    })
</script>
