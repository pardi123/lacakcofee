<?php
	if ($provinsi['count'])
	{
		$i=0;
		foreach ($provinsi['multi'] as $p)
		{
			$i++;
			?>
				<tr>
					<td><?=$i?></td>
					<td><?=$p->kode?></td>
					<td><?=$p->nama?></td>
					<td>
						<div class="dropdown">

							<a href="javascript:void(0)" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="list-menu"><i class="material-icons" >more_vert</i></a>
							<div class="dropdown-menu" aria-labelledby="list-menu">
								<a class="dropdown-item text-warning form-edit" kode="<?=$p->kode?>" href="#" data-toggle="modal" data-target="#editProvinsi"><i class="material-icons">edit</i> Edit</a>
								<a href="javascript:void(0)" class="dropdown-item delete-provinsi text-danger" data="<?=$p->kode?>"><i class="material-icons">delete</i> Delete</a>
							</div>
						</div>



					</td>
				</tr>
			<?php
		}
	}
?>
<script>
	$(document).ready(function () {
		$(".form-edit").click(function(e){
		    e.preventDefault();
		    let data = {"kode":$(this).attr("kode")};
		    ajax.ajaxPost(
		        "<?=base_url()?>form-provinsi",
				data,
				function(res)
				{
				    $(".data-edit-provinsi").html(res);
				}
			)
		});
		$(".delete-provinsi").click(function(e){
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
					    "<?=base_url()?>delete-provinsi",
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
                }
            });
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
    })
</script>
