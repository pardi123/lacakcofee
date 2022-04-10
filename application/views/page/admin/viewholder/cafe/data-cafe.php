<?php
	if ($cafe['count'])
	{
		$i=0;
		foreach ($cafe['multi'] as $c)
		{
			$i++;
			$provinsi = crud_selwhere("provinsi",NULL,"kode = '$c->provinsi'")['single']->nama;
			$kota = crud_selwhere("kota",NULL,"kode = '$c->kota'")['single']->nama;
			?>
				<tr>
					<td><?=$i?></td>
					<td><?=$c->nama?></td>
					<td><?=$provinsi?></td>
					<td><?=$kota?></td>
					<td><?=$c->alamat?></td>
					<td></td>
					<td>
						<div class="dropdown">

							<a href="javascript:void(0)" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="list-menu"><i class="material-icons" >more_vert</i></a>
							<div class="dropdown-menu" aria-labelledby="list-menu">
								<a class="dropdown-item text-warning add-menu" kode="<?=$c->kode?>" href="#" data-toggle="modal" data-target="#addMenu"><i class="material-icons">add</i> Tambah Menu</a>

								<a class="dropdown-item text-warning add-ava" kode="<?=$c->kode?>" href="#" data-toggle="modal" data-target="#addAva"><i class="material-icons">add_a_photo</i> Tambah Photo</a>
								<a class="dropdown-item text-warning form-edit-cafe" kode="<?=$c->kode?>" href="#" data-toggle="modal" data-target="#formCafe"><i class="material-icons">edit</i> Edit</a>
								<a href="javascript:void(0)" class="dropdown-item delete-cafe text-danger" data="<?=$c->kode?>"><i class="material-icons">delete</i> Delete</a>
							</div>
						</div>
					</td>
				</tr>
			<?php
		}
	}
?>
<script>
	$(document).ready(function(){
	    $(".add-menu").click(function (e) {
			e.preventDefault();
			let data = {"kode":$(this).attr("kode")};
			ajax.ajaxPost(
			    "<?=base_url()?>form-menu",
				data,
				function (res) {
					$(".formMenu").html(res);
                }
			)
        })
	    $(".add-ava").click(function (e) {
			e.preventDefault();
			let data = {"kode":$(this).attr("kode")};
			ajax.ajaxPost(
			    "<?=base_url()?>formAva",
				data,
				function (res) {
					$(".data-ava").html(res);
                }
			)
        })
	    $(".delete-cafe").click(function(e){
	       e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin',
                text: "Keputusan Tidak Bisa Diubah",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let data = {"kode":$(this).attr("data")};
                    ajax.ajaxPost(
                        "<?=base_url()?>delete-cafe",
                        data,
                        function(res)
                        {
                            if (res === "1")
                            {
                                swal.fire({
                                    icon:"success",
                                    title:"Berhasil",
                                    html:"berhasil Menghapus Data"
                                });
                                reloadCafe();
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
                }
            });
		});
	   $(".form-edit-cafe").click(function (e) {
		   e.preventDefault();
		   let data = {"kode":$(this).attr("kode")};
		   ajax.ajaxPost(
		       "<?=base_url()?>formCafe",
			   data,
			   function (res) {
		           $(".formCafe").html(res);

               }
		   )
       });
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


    });
</script>
