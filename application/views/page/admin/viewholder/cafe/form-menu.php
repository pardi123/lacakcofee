<div class="row">
	<div class="col-md-12">

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
<script>
	$(document).ready(function () {
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

        })
    })
</script>
