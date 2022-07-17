<!DOCTYPE html>
<html>
<head>
	<title>Pdf User</title>
</head>
<body>
<img src="data:image/png;base64, <?= $logo?>" style="width: 150px; height: 100px; object-fit: cover;" alt="">

<h5>Data Meja</h5>
<table cellpadding="1" cellspacing="0" style="border: 1px solid black; width: 100%;">
	<thead>
	<tr>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">No</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Kode</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Nama Meja</td>
	</tr>

	</thead>
	<tbody>
	<?php
	$i=0;
	if ($meja['count'] > 0){
		foreach ($meja['multi'] as $k){


			$i++;
			?>
			<tr>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$i?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$k->kode?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$k->nama?></td>

			</tr>
			<?php
		}
	}
	?>
	</tbody>
</table>
</body>
</html>
