<div class="row">
	<div class="col-md-12">
		<form class="ediTCafe">
			<div class="form-group">
				<label>Nama Cafe</label>
				<input type="text" class="form-control" name="nama" required value="<?=$cafe->nama?>">
			</div>
			<div class="form-group">
				<label>Provinsi</label>
				<select name="provinsi" id="provinsi" class="form-control" required>
					<?php
						$namaP = crud_selwhere("provinsi",NULL,"kode = '$cafe->provinsi'")['single']->nama;
					?>
					<option value="<?=$cafe->provinsi?>"><?=$namaP?></option>
					<?php
						if ($provinsi['count'])
						{
							foreach ($provinsi['multi'] as $p)
							{
								if ($cafe->provinsi == $p->kode)
								{

								}
								else
								{
									?>
									<option value="<?=$p->kode?>"><?=$p->nama?></option>
									<?php
								}

							}
						}
					?>
				</select>
				<div class="form-group">
					<label>Kota/Kabupaten</label>
					<input type="hidden" name="kode" value="<?=$cafe->kode?>" required >
					<select name="kota" id="kota" class="form-control data-kota">

					</select>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" id="" cols="30" rows="10" class="form-control"><?=$cafe->alamat?></textarea>
				</div>
			</div>
			<div class="form-group">

				<button class="btn btn-primary" type="submit">Edit</button>
				<button class="btn btn-danger" data-dismiss="modal" type="button">Batal</button>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function () {
		$(".ediTCafe").submit(function (e) {
			e.preventDefault();
			$("#formCafe").modal("hide");
			let data = $(this).serialize();
			ajax.ajaxPost(
			    "<?=base_url()?>edit-cafe",
				data,
				function (res) {
                    if (res === "1")
                    {
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Mengubah Data"
                        });
                        reloadCafe()
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
		reloadKota();
        $("#provinsi").on("change",function () {
            reloadKota();
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

    })
</script>
