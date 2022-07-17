<?php
	if ($menu['count'])
	{
		$i=0;
		foreach ($menu['multi'] as $m)
		{
			$i++;
			?>
				<tr>
					<td><?=$i?></td>
					<td><?=$m->nama?></td>
					<?php
						if ($jenis === "makanan"){
							?>
								<td>Makanan</td>
							<?php
						}
						else {
							?>
								<td>Minuman</td>
							<?php
						}
					?>
					<td><?=$m->harga?></td>
					<td>
						<img src="<?=base_url()?>menu/<?=$m->cover?>" alt="" style="width: 100px; height: 100px; object-fit: cover">
					</td>
					<td>
						<button class="btn btn-danger delete-menu" id="<?=$m->id_data?>"><i class="material-icons">delete</i></button>

					</td>
				</tr>
			<?php
		}
	}
?>
<script>
	$(document).ready(function () {
		$(".delete-menu").click(function () {
		    let data = {"jenis":"<?=$jenis?>","id":$(this).attr("id")};
			ajax.ajaxPost(
			    "<?=base_url()?>delete-menu",
				data,
				function (res) {
					if (res === "1")
					{
                        swal.fire({
                            icon:"success",
                            title:"Berhasil",
                            html:"berhasil Menghapus Data"
                        });
                        reloadMenu();
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
        function reloadMenu() {
            let data = {"jenis":$(".jenis-menu").val()};
            ajax.ajaxPost(
                "<?=base_url()?>data-menu",
                data,
                function (res) {
                    $(".data-menu").html(res);
                }
            )
        }
    });

</script>
