<form class="editProvinsi">
	<div class="form-group">
		<label>Nama Provinsi</label>
		<input type="text" class="form-control" name="nama" value="<?=$provinsi->nama?>">
		<input type="hidden" name="kode" required value="<?=$provinsi->kode?>">
	</div>
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Edit</button>
		<button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
	</div>
</form>
<script>
	$(document).ready(function(){
	   $(".editProvinsi").submit(function(e){
           $("#editProvinsi").modal("hide");

           e.preventDefault();
	     let data = $(this).serialize();
	     ajax.ajaxPost(
	         "<?=base_url()?>edit-provinsi",
			 data,
			 function (res) {
				 if (res === "1")
				 {
                     swal.fire({
                         icon:"success",
                         title:"Berhasil",
                         html:"berhasil mengubah Data"
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
