
<!DOCTYPE html>
<html>
<head>
	<title>Pdf User</title>
</head>
<body>
<img src="data:image/png;base64, <?= $logo?>" style="width: 150px; height: 100px; object-fit: cover;" alt="">
<h5>Data Pemesanan Meja</h5>
<table cellpadding="1" cellspacing="0" style="border: 1px solid black; width: 100%;">
	<thead>
	<tr>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">No</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Meja Dipesan</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Nama Pemesan</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Status</td>
	</tr>

	</thead>
	<tbody>
	<?php
	$i=0;
	if ($pemesanan['count'] > 0){
		foreach ($pemesanan['multi'] as $p){
			$kode = $p->kode;
			$username = $p->username;
			$meja = crud_selwhere("store_meja",NULL,"kode = '$kode'")['single'];
			$user = crud_selwhere("user",NULL,"username = '$username'")['single'];

			$i++;
			?>
			<tr>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$i?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$meja->nama?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$user->nama?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$p->status?></td>

			</tr>
			<?php
		}
	}
	?>
	</tbody>
</table>
</body>
</html>
<?php
