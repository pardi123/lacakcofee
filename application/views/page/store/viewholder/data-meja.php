<?php
if ($meja['count'])
{
	$i=0;
	foreach ($meja['multi'] as $m)
	{
		$i++;
		?>
		<tr>
			<td><?=$i?></td>
			<td><?=$m->kode?></td>
			<td><?=$m->nama?></td>
			<td><?=$m->status?></td>

		</tr>
		<?php
	}
}
?>
