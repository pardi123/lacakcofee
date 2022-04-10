<form class="editKota">
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="nama" required placeholder="Nama Kota" value="<?=$kota->nama?>">
	</div>
	<div class="form-group">
		<select name="provinsi" id="" class="form-control" required>
			<?php
				$provinsi = crud_selwhere("provinsi",NULL,"kode = '$kota->provinsi'")['single'];
			?>
			<option value="<?=$provinsi->kode?>"><?=$provinsi->nama?></option>
			<?php
				$allProvinsi = crud_selwhere("provinsi",NULL,"id_data > 0");
				if($allProvinsi['count'])
				{
					foreach ($allProvinsi['multi'] as $p)
					{
						?>
						<option value="<?=$p->kode?>"><?=$p->nama?></option>
						<?php
					}
				}
			?>
		</select>
		<input type="hidden" required value="<?=$kode?>" name="kode">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Edit</button>
			<button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
		</div>
	</div>
</form>
<script>
	$(document).ready(function(){
	   $(".editKota").submit(function(e){
	      e.preventDefault();
           $("#formKota").modal("hide");

           let data = $(this).serialize();
	      ajax.ajaxPost(
	          "<?=base_url()?>edit-kota",
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
