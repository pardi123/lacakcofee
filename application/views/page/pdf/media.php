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
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Whaatsapp</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Grab</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Lokasi</td>

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
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->wa?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->grab?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->gmaps?></td>

			</tr>

			<?php
		}
	}
	?>
	</tbody>
</table>
</body>
</html>
