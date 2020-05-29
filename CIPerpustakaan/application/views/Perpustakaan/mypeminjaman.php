<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo $error;?>

<?php echo form_open_multipart('peminjaman/inputpeminjaman');?>

<?php //echo form_open('mahasiswa/inputmhs'); ?>

	<h5>Tanggal Saat Ini</h5>
	<?php 
		$datestring = 'Tanggal: %d - Bulan: %m - Tahun: %Y';
		$time = time();
		echo mdate($datestring, $time);
	?>

	<h5>ID Pinjam</h5>
	
		<?php 
		echo form_input('id_pinjam', set_value('id_pinjam'));
		?>

	<h5>Tanggal Pinjam</h5>
		<input type="date" name="tgl_pinjam" value="<?php echo set_value('tgl_pinjam'); ?>" size="50" />

	<h5>Tanggal Kembali</h5>
		<input type="date" name="tgl_kembali" value="<?php echo set_value('tgl_kembali'); ?>" size="50" />

	<h5>Nama Peminjam</h5>
		<?php 
			foreach ($query3->result() as $row) {
				$options[$row->id_anggota]=$row->nama_anggota;
			}
			//$options = $kota_asal;

			echo form_dropdown('id_anggota', $options, 'M01');
		?>

	<h5>Nama Buku</h5>
		<?php 
			foreach ($query->result() as $row) {
				$options1[$row->id_buku]=$row->judul_buku;
			}
			//$options = $kota_asal;

			echo form_dropdown('id_buku', $options1, 'K1');
		?>
	<h5>Nama Admin</h5>
		<?php 
			foreach ($query2->result() as $row) {
				$options2[$row->id_admin]=$row->username;
			}
			//$options = $kota_asal;

			echo form_dropdown('id_admin', $options2, 'A01');
		?>
	
	<br /><br />



<br><br>
<div><?php echo form_submit('submit', 'Kirim Data'); ?></div>

</form>

</body>
</html>