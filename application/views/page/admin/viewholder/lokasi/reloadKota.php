
<?php
	if ($kota['count'])
	{
		?>
		<option value="*">--- Pilih Kota ---</option>
		<?php
		foreach ($kota['multi'] as $k)
		{
			?>
			<option value="<?=$k->kode?>"><?=$k->nama?></option>
			<?php
		}
	}
?>
