<!DOCTYPE html>
<html>
	<head>
		<title>Pdf User</title>
	</head>
	<body>
	<img src="data:image/png;base64, <?= $logo?>" style="width: 150px; height: 100px; object-fit: cover;" alt="">

	<h5>Data User</h5>
	<table cellpadding="1" cellspacing="0" style="border: 1px solid black; width: 100%;">
		<thead>
		<tr>
			<th style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">No</th>
			<th style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Nama</th>
			<th style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Username</th>
			<th style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Email</th>
			<th style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">provinsi</th>
			<th style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center">Kota</th>

		</tr>
		</thead>
		<tbody>
		<?php
		$i=0;
		if ($user['count']){
			foreach ($user['multi'] as $u){
				$kodep = $u->provinsi;
				$kodek = $u->kota;
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
					<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$u->nama?></td>
					<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$u->username?></td>
					<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$u->email?></td>
					<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$provinsi?></td>
					<td style="border-right:1px solid #000;border-bottom:1px solid #000; text-align: center"><?=$kota?></td>
				</tr>
				<?php
			}
		}

		?>
		</tbody>
	</table>
	</body>
</html>
