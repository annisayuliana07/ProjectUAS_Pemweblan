<html>

<head>
	<title>Detail Buku</title>
</head>

<body>
	<h4>Detail Buku</h4>
	<table class="table">

		<tr>
			<th>ID Buku</th>
			<td><?php echo $detail->id_buku ?></td>
		</tr>

		<tr>
			<th>Judul Buku</th>
			<td><?php echo $detail->judul_buku ?></td>
		</tr>

		<tr>
			<th>Penerbit</th>
			<td><?php echo $detail->penerbit ?></td>
		</tr>

		<tr>
			<th>Pengarang</th>
			<td><?php echo $detail->pengarang ?></td>
		</tr>

		<tr>
			<th>Jenis</th>
			<td><?php echo $detail->id_kategori ?></td>
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