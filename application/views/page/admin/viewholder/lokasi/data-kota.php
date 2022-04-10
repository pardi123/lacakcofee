<?php
	if ($kota['count'])
	{
		$i=0;
		foreach ($kota['multi'] as $k)
		{
			$i++;
			$provinsi = crud_selwhere("provinsi",NULL,"kode = '$k->provinsi'")['single']->nama;
			?>
				<tr>
					<td><?=$i?></td>
					<td><?=$k->kode?></td>
					<td><?=$k->nama?></td>
					<td><?=$provinsi?></td>
					<td>
						<div class="dropdown">

							<a href="javascript:void(0)" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="list-menu"><i class="material-icons" >more_vert</i></a>
							<div class="dropdown-menu" aria-labelledby="list-menu">
								<a class="dropdown-item text-warning form-edit-kota" kode="<?=$k->kode?>" href="#" data-toggle="modal" data-target="#formKota"><i class="material-icons">edit</i> Edit</a>
								<a href="javascript:void(0)" class="dropdown-item delete-kota text-danger" data="<?=$k->kode?>"><i class="material-icons">delete</i> Delete</a>
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
	   $(".form-edit-kota").click(function(e){
	      e.preventDefault();
	      let data = {"kode":$(this).attr("kode")};
	      ajax.ajaxPost(
	          "<?=base_url()?>form-kota",
			  data,
			  function(res)
			  {
			      $(".data-edit-kota").html(res);
			  }
		  )
	   });
	   $(".delete-kota").click(function(e){
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
                       "<?=base_url()?>delete-kota",
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
