<div class="row">
	<div class="col-md-12">

		<div class="card">
			<div class="card-header card-header-primary">
				<h4><?=$title?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<button class="btn btn-primary"  data-toggle="modal" data-target="#addProvinsi"><i class="material-icons">add</i> Tambah Provinsi</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<a href="<?=base_url()?>pdfProvinsi" target="_blank">

								<button class="btn btn-primary">Cetak Pdf</button>
							</a>
						</div>
					</div>					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
								<tr>

									<th>No</th>
									<th>Kode</th>
									<th>Nama</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="data-provinsi">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="editProvinsi">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Edit Provinsi</h4>
			</div>
			<div class="modal-body data-edit-provinsi">

			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="addProvinsi">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				 <h4>Tambah Provinsi</h4>
			</div>
			<div class="modal-body">
				<form class="addProvinsi">
					<div class="form-group">
						<label>Kode Provinsi</label>
						<input type="text" class="form-control" name="kode" placeholder="Kode Provinsi">
					</div>
					<div class="form-group">
						<label>Nama Provinsi</label>
						<input type="text" class="form-control" name="nama" placeholder="Nama Provinsi">
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Tambah</button>
						<button class="btn btn-danger" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	    reloadData();
	   $(".addProvinsi").submit(function(e){
	      e.preventDefault();
	      $("#addProvinsi").modal("hide");
	      let data = $(this).serialize();
	      ajax.ajaxPost(
	          "<?=base_url()?>add-provinsi",
			  	data,
			  function(res)
			  {
			      if (res === "1")
				  {
                      swal.fire({
                          icon:"success",
                          title:"Berhasil",
                          html:"berhasil Menambah Data"
                      });
                      reloadData();
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
	   function reloadData()
	   {
	       ajax.ajaxGet(
	           "<?=base_url()?>data-provinsi",
			   function(res)
			   {
			       $(".data-provinsi").html(res);
			   }
		   )
	   }
	});
</script>
