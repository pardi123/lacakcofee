<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>


<img src="data:image/png;base64, <?= $logo?>" style="width: 150px; height: 100px; object-fit: cover;" alt="">

<h5>Daftar Menu</h5>
<table cellpadding="1" cellspacing="0" style="border: 1px solid black; width: 100%;">
	<thead>

	<tr>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">No</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Nama</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Komposisi</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Harga</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Jenis</td>

	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;

	if ($cafe['count'] > 0){
		foreach ($cafe['multi'] as $c){

			$i++;
			?>
			<tr>

				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$i?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->nama?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->komposisi?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->harga?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Makanan</td>


			</tr>

			<?php
		}
	}
	if ($minuman['count'] > 0){
		foreach ($minuman['multi'] as $c){

			$i++;
			?>
			<tr>

				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$i?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->nama?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->komposisi?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->harga?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Minuman</td>


			</tr>

			<?php
		}
	}


	?>
	</tbody>
</table>
</body>
</html>
