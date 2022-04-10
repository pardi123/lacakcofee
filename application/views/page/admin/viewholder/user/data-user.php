<?php
if ($user['count'])
{
	$i=0;
	foreach ($user['multi'] as $u)
	{
		$i++;
		?>
		<tr>

			<td><?=$i?></td>
			<td><?=$u->nama?></td>
			<td><?=$u->username?></td>
			<td><?=$u->email?></td>
			<td><?=$u->phone?></td>
			<td>
				<a href="javascript:void(0)" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="list-menu"><i class="material-icons" >more_vert</i></a>
				<div class="dropdown-menu" aria-labelledby="list-menu">
					<a href="javascript:void(0)" class="dropdown-item delete-kota text-danger delete-user" data="<?=$u->username?>"><i class="material-icons">delete</i> Delete</a>
				</div>
			</td>
		</tr>
		<?php
	}
}
?>
<script>
	$(document).ready(function () {
        $(".delete-user").click(function(e) {
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
                    let data = {"username": $(this).attr("data")};
                    ajax.ajaxPost(
                        "<?=base_url()?>delete-user",
                        data,
                        function (res) {
                            if (res === "1") {
                                swal.fire({
                                    icon: "success",
                                    title: "Berhasil",
                                    html: "berhasil Menghapus Data"
                                });
                                reloadUser();
                            } else {
                                swal.fire({
                                    icon: "error",
                                    title: "Gagal",
                                    html: "Terjadi Kesalahan"
                                });
                            }

                        }
                    )
                }
            });
        });
        function reloadUser() {
            let data = {"key":$("#cari").val()};
            ajax.ajaxPost(
                "<?=base_url()?>data-user",
                data,
                function (res) {
                    $(".data-user").html(res);
                }
            )
        }

    });
</script>
