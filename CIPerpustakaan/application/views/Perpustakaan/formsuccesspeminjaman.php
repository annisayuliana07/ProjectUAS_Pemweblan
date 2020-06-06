<html>
<head>
<title>My Form</title>
</head>
<body>

<?php
	//echo "username : $username </br>";
	//echo "email : $email </br>";
	//echo "kota asal : $kotaasal </br>";
	//echo "jenis kelamin : $jeniskelamin </br>";
	//echo "hobi : $hobi </br>";
	//echo "alamat : $alamat </br>";
?>
<h3>Your form was successfully submitted!</h3>

<h3>Your file was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('peminjaman/inputpeminjaman', 'Input Data'); ?></p> <!--anchor = link method-->

</body>
</html>