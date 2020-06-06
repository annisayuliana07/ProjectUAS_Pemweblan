<html>

<head>
	<title>My Form</title>
</head>

<body>

	<?php echo validation_errors(); ?>

	<?php echo $error; ?>

	<?php echo form_open_multipart('buku/inputbuku'); ?>

	<?php //echo form_open('mahasiswa/inputmhs'); 
	?>

	<h5>Tanggal Saat Ini</h5>
	<?php
	$datestring = 'Tanggal: %d - Bulan: %m - Tahun: %Y';
	$time = time();
	echo mdate($datestring, $time);
	?>

	<h5>ID Buku</h5>
	<!--
	<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
	-->
	<?php
	echo form_input('id_buku', set_value('id_buku'));
	?>

	<h5>Judul Buku</h5>
	<input type="text" name="judul_buku" value="<?php echo set_value('judul_buku'); ?>" size="50" />

	<h5>Penerbit</h5>
	<input type="text" name="penerbit" value="<?php echo set_value('penerbit'); ?>" size="50" />

	<h5>Pengarang</h5>
	<input type="text" name="pengarang" value="<?php echo set_value('pengarang'); ?>" size="50" />


	<h5>Jenis Kategori</h5>
	<?php
	foreach ($query->result() as $row) {
		$options[$row->id_kategori] = $row->jenis;
	}
	//$options = $kota_asal;

	echo form_dropdown('id_kategori', $options, 'K1');
	?>

	<br /><br />



	<br><br>
	<div><?php echo form_submit('submit', 'Kirim Data'); ?></div>

	</form>

</body>

</html>