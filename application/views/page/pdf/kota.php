<!DOCTYPE html>
<html>
<head>
	<title>Pdf User</title>
</head>
<body>
<img src="data:image/png;base64, <?= $logo?>" style="width: 150px; height: 100px; object-fit: cover;" alt="">

<h5>Kota Terdaftar</h5>
<table cellpadding="1" cellspacing="0" style="border: 1px solid black; width: 100%;">
	<thead>
	<tr>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">No</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Kota</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Provinsi</td>
	</tr>

	</thead>
	<tbody>
	<?php
	$i=0;
	if ($kotaa['count'] > 0){
		foreach ($kotaa['multi'] as $k){
			$kodekk = $k->provinsi;
			$provinsi2 = crud_selwhere("provinsi",NULL,"kode = '$kodekk'")['single']->nama;

			$i++;
			?>
			<tr>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$i?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$k->nama?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$provinsi2?></td>

			</tr>
			<?php
		}
	}
	?>
	</tbody>
</table>
</body>
</html>
