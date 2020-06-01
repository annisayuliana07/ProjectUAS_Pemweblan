<html>
<head>
<title>Detail Buku</title>
</head>
<body>
<h4>Detail Buku</h4>
<table class="table">

<tr>
	<th>ID Peminjaman</th>
	<td><?php echo $detail->id_pinjam ?></td>
</tr>

<tr>
	<th>Tanggal Pinjam</th>
	<td><?php echo $detail->tgl_pinjam ?></td>
</tr>

<tr>
	<th>Tanggal Kembali</th>
	<td><?php echo $detail->tgl_kembali ?></td>
</tr>

<tr>
	<th>Jumlah Buku</th>
	<td><?php echo $detail->jumlah_buku ?></td>
</tr>

<tr>
	<th>ID Anggota</th>
	<td><?php echo $detail->id_anggota ?></td>
</tr>

<tr>
	<th>ID Buku</th>
	<td><?php echo $detail->id_buku ?></td>
</tr>

<tr>
	<th>ID Admin</th>
	<td><?php echo $detail->id_admin ?></td>
</tr>

</table>

</body>
</html>