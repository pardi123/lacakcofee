

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4><?=$title?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">

							<button class="btn btn-primary" data-toggle="modal" data-target="#addKota"><i  class="material-icons">add</i>Tambah Kota</button>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<a href="<?=base_url()?>pdfKota" target="_blank">

								<button class="btn btn-primary">Cetak Pdf</button>
							</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<select name="provinsi" id="provinsi" class="form-control">
										<option value="*">---- Pilih Provinsi ----</option>
										<?php
										if ($provinsi['count'])
										{
											foreach ($provinsi['multi'] as $pr)
											{
												?>
												<option value="<?=$pr->kode?>"><?=$pr->nama?></option>
												<?php
											}
										}
										?>
									</select>
								</div>

							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-hover table-striped">
								<thead>
								<tr>
									<th>No</th>
									<th>Kode Kota</th>
									<th>Nama Kota</th>
									<th>Provinsi</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="data-kota">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" role="dialog" tabindex="-1" id="addKota">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Tambah Kota</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<form class="addKota">
							<div class="form-group">
								<label>Kode Kota</label>
								<input type="text" name="kode" class="form-control" required placeholder="Kode Kota">
							</div>
							<div class="form-group">
								<label>Nama Kota</label>
								<input type="text" class="form-control" name="nama" required placeholder="Nama Kota">
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<select name="provinsi" id="" class="form-control" required>
									<option value="">---- Pilih Provinsi ----</option>
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
<div class="modal fade" role="dialog" tabindex="-1" id="formKota">
	<div class="modal-dialog" role="dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Edit Kota</h4>
			</div>
			<div class="modal-body data-edit-kota">

			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	    reloadData();
	   $(".addKota").submit(function(e){
	       $("#addKota").modal("hide");
	      e.preventDefault();
	      let data = $(this).serialize();
	      ajax.ajaxPost(
	          "<?=base_url()?>add-kota",
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
	   $("#provinsi").on("change",function () {
		  reloadData();
       });
	   function reloadData()
	   {
	       let data = {"provinsi":$("#provinsi").val()};
	       ajax.ajaxPost(
	           "<?=base_url()?>data-kota",
			   data,
			   function(res)
			   {
			       $(".data-kota").html(res);
			   }
		   )
	   }
	});
</script>
<script>

    function initMap() {

        // membuat objek untuk titik koordinat
        var lombok = {lat: -8.5830695, lng: 116.3202515};

        // membuat objek peta
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: lombok
        });

        // mebuat konten untuk info window
        var contentString = '<h2>Hello Dunia!</h2>';

        // membuat objek info window
        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            position: lombok
        });

        // membuat marker
        var marker = new google.maps.Marker({
            position: lombok,
            map: map,
            title: 'Pulau Lombok'
        });

        // event saat marker diklik
        marker.addListener('click', function() {
            // tampilkan info window di atas marker
            infowindow.open(map, marker);
        });

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPYGOeyMWTPJQBGVD5l8vaploV3p8hH48&callback=initMap"
		async defer></script>
