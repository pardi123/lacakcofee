<?php
if ($video['count'])
{
	$i=0;
	foreach ($video['multi'] as $f)
	{
		$i++
		?>
		<tr>
			<td><?=$i?></td>
			<td>
				<video controls style="width: 300px; height: 300px;">
					<source src="<?=base_url()?>photo-toko/<?=$f->video?>" type="video/webm" />
					Browsermu tidak mendukung tag ini, upgrade donk!
				</video>
			</td>
			<td>
				<button class="btn btn-danger delete-foto" id="<?=$f->id_data?>"><i class="material-icons"  >delete</i></button>

			</td>
		</tr>
		<?php
	}
}
?>
<script>
    $(document).ready(function () {
        $(".delete-foto").click(function (e) {
            e.preventDefault();
            let data = {"id":$(this).attr("id")};

            ajax.ajaxPost(
                "<?=base_url()?>delete-video",
                data,
                function (res) {
                    if (res === "1")
                    {
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Menghapus Data"
                        });
                        reloadFoto();

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
        function reloadFoto() {
            ajax.ajaxGet(
                "<?=base_url()?>data-foto",
                function (res) {
                    $(".data-foto").html(res);
                }
            )
        }
    });
</script>
