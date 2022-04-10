<form class="addAva" enctype="multipart/form-data">
		<label>Pilih Photo</label>
	<input type="hidden" name="kode" value="<?=$kode?>" required>
		<input type="file" class="form-control-file" name="ava" required accept="image/jpeg">
	<div class="form-group">
		<button class="btn btn-primary" type="submit">Kirim</button>
		<button class="btn btn-danger" type="button" data-dismis="modal">Batal</button>
	</div>
</form>
<script>
	$(document).ready(function () {
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
        })
    })
</script>
