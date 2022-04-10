<?php
	if ($media['count'])
	{
		$i=0;
		foreach ($media['multi'] as $m)
		{
			$i++;
			?>
				<tr>
					<td><?=$i?></td>
					<td><?=$m->wa?></td>
					<td><?=$m->grab?></td>
					<td>
						<a href="<?=$m->gmaps?>" target="_blank" class="btn btn-primary">Lihat</a>
					</td>
					<td>
						<button class="btn btn-danger delete-media" id="<?=$m->id_data?>"><i class="material-icons">delete</i></button>

					</td>
				</tr>
			<?php
		}
	}
	?>
<script>
	$(document).ready(function () {
		$(".delete-media").click(function (e) {
			e.preventDefault();
			let data = {"id":$(this).attr("id")};
			ajax.ajaxPost(
			    "<?=base_url()?>delete-media",
				data,
				function (res) {
			        if (res === "1")
					{
                        swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            html: "berhasil Menghapus Data"
                        });
                        reloadMedia();
                    }
                    else {
                        swal.fire({
                            icon: "error",
                            title: "Gagal",
                            html: "Terjadi Kesalahan !"
                        });
                    }
                }

			)
        });
        function reloadMedia() {
            ajax.ajaxGet(
                "<?=base_url()?>data-media",
                function (res) {
                    $(".data-media").html(res);
                }
            )
        }
    })
</script>
