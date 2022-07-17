<!DOCTYPE html>
<html>
<head>
	<title>Pdf User</title>
</head>
<body>
<img src="data:image/png;base64, <?= $logo?>" style="width: 150px; height: 100px; object-fit: cover;" alt="">

<h5>Data Provinsi</h5>
<table cellpadding="1" cellspacing="0" style="border: 1px solid black; width: 100%;">
	<thead>
	<tr>
		<th style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">No</th>
		<th style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Nama</th>


	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	if ($provinsi['count']){
		foreach ($provinsi['multi'] as $u){
			$i++
			?>
			<tr>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$i?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$u->nama?></td>

			</tr>
			<?php
		}
	}

	?>
	</tbody>
</table>
</body>
</html>
