<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>


<img src="data:image/png;base64, <?= $logo?>" style="width: 150px; height: 100px; object-fit: cover;" alt="">

<h5>Cafe Terdaftar</h5>
<table cellpadding="1" cellspacing="0" style="border: 1px solid black; width: 100%;">
	<thead>

	<tr>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">No</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Nama Cafe</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Provinsi</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Kota</td>
		<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Alamat Lengkap</td>

	</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	if ($cafe['count'] > 0){
		foreach ($cafe['multi'] as $c){
			$kodep = $c->provinsi;
			$kodek = $c->kota;
			if ($kodep != '' || $kodek = '')
			{
				$kota = crud_selwhere("kota",NULL,"kode = '$kodek'")['single']->nama;
				$provinsi = crud_selwhere("provinsi",NULL,"kode = '$kodep'")['single']->nama;

			}
			else
			{
				$kota = '';
				$provinsi  = '';
			}
			$i++;
			?>
			<tr>

				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$i?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->nama?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$provinsi?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$kota?></td>
				<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$c->alamat?></td>

			</tr>

			<?php
		}
	}
	?>
	</tbody>
</table>
</body>
</html>
