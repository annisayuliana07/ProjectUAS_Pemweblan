<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<h5>Username</h5>
<!--
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
-->

    <?php 
	echo form_input('username', set_value('username'));
	?>

<h5>Password</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Email Address</h5>
<input type="textarea" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<h5>kota Asal</h5>
	<?php
		$options = array(
	        'Ska'         => 'Surakarta',
	        'Kra'         => 'Karanganyar',
	        'Byl'         => 'Wonogiri',
	        'Skh'         => 'Sukoharjo',
	);
	echo form_dropdown('kotaasal', $options, 'Surakarta');
	?>

<h5>Jenis Kelamin</h5>
<?php 
echo " PRIA : " ; echo form_radio('jeniskelamin', 'pria', False); echo "</br>";
echo " WANITA : " ; echo form_radio('jeniskelamin', 'wanita', false);echo "</br>";
?>

<h5>Masukkan alamat URL</h5>
<?php
echo form_hidden('url', 'http://example.com');
?>
<br>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>