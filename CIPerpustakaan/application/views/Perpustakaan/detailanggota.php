<html>

<head>
	<title>Detail Anggota</title>
</head>

<body>
	<h4>Detail Anggota</h4>
	<table class="table">

		<tr>
			<th>ID Anggota</th>
			<td><?php echo $detail->id_anggota ?></td>
		</tr>

		<tr>
			<th>Nama Anggota</th>
			<td><?php echo $detail->nama_anggota ?></td>
		</tr>

		<tr>
			<th>Tanggal Lahir</th>
			<td><?php echo $detail->tgl_lahir ?></td>
		</tr>

		<tr>
			<th>No Telepon</th>
			<td><?php echo $detail->no_telp ?></td>
		</tr>

		<tr>
			<th>Alamat</th>
			<td><?php echo $detail->alamat ?></td>
		</tr>

	</table>

	<button onclick="goBack()">Go Back</button>

	<script>
		function goBack() {
			window.history.back();
		}
	</script>

</body>

</html>