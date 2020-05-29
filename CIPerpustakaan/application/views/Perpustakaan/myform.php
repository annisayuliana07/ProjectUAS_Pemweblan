<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo $error;?>

<?php echo form_open_multipart('mahasiswa/inputmhs');?>

<?php //echo form_open('mahasiswa/inputmhs'); ?>

	<h5>Tanggal Saat Ini</h5>
	<?php 
		$datestring = 'Tanggal: %d - Bulan: %m - Tahun: %Y';
		$time = time();
		echo mdate($datestring, $time);
	?>

	<h5>Username</h5>
	<!--
	<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
	-->
		<?php 
		echo form_input('username', set_value('username'));
		?>

	<h5>Password</h5>
		<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />

	<h5>Password Confirm</h5>
		<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

	<h5>Email Address</h5>
		<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />


	<h5>Kota Asal</h5>
		<?php 
			foreach ($query->result() as $row) {
				$options[$row->id_kota]=$row->nama_kota;
			}
			//$options = $kota_asal;

			echo form_dropdown('kotaasal', $options, 'SKA');
		?>
	<h5>Jenis Kelamin</h5>
		<?php 
		echo " PRIA : " ; echo form_radio('jeniskelamin', 'pria', False); echo "</br>";
		echo " WANITA : " ; echo form_radio('jeniskelamin', 'wanita', false);echo "</br>";
		?>

	<h5>Hobi</h5>
		Berenang <input type="checkbox" name="hobi" value="Berenang" <?php echo set_checkbox('mycheck', '1'); ?> />
		<br>Berlari <input type="checkbox" name="hobi" value="Berlari" <?php echo set_checkbox('mycheck', '2'); ?> />
		<br>Bersepeda <input type="checkbox" name="hobi" value="Bersepeda" <?php echo set_checkbox('mycheck', '3'); ?> />
	
	<h5>Alamat</h5>
		<input type="text" name="alamat" value="<?php echo set_value('quantity'); ?>" style="resize:none;width:200px;height:60px;"/>

	<input type="hidden" name="alamat" value="disembunyikan/dihidden" />

	<h5>File Upload</h5>
	<input type="file" name="userfile" size="20" />

	<br /><br />



<br><br>
<div><?php echo form_submit('submit', 'Kirim Data'); ?></div>

</form>

</body>
</html>