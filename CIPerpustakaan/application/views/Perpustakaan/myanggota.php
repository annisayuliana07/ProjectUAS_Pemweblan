<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo $error;?>

<?php echo form_open_multipart('anggota/inputanggota');?>

<?php //echo form_open('mahasiswa/inputmhs'); ?>

	<h5>Tanggal Saat Ini</h5>
	<?php 
		$datestring = 'Tanggal: %d - Bulan: %m - Tahun: %Y';
		$time = time();
		echo mdate($datestring, $time);
	?>

	<h5>ID Anggota</h5>
	
		<?php 
		echo form_input('id_anggota', set_value('id_anggota'));
		?>

	<h5>Nama Anggota</h5>
		<input type="text" name="nama_anggota" value="<?php echo set_value('nama_anggota'); ?>" size="50" />

	<h5>Tanggal Lahir</h5>
		<input type="date" name="tgl_lahir" value="<?php echo set_value('tgl_lahir'); ?>" size="50" />

	<h5>Nomor Telepon</h5>
		<input type="text" name="no_telp" value="<?php echo set_value('no_telp'); ?>" size="50" />
		
	<h5>Alamat</h5>
		<input type="text" name="alamat" value="<?php echo set_value('alamat'); ?>" size="50" />

	<br /><br />



<br><br>
<div><?php echo form_submit('submit', 'Kirim Data'); ?></div>

</form>

</body>
</html>