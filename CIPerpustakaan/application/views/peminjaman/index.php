<?php $this->simple_login->cek_login(); ?>
<?php
$query = $this->Peminjaman_Model->get_join();
foreach ($query->result() as $row) {
	$this->table->add_row($row->id_pinjam, $row->tgl_pinjam, $row->tgl_kembali, $row->nama_anggota, $row->judul_buku, $row->username, anchor('peminjaman/detail/' . $row->id_pinjam, 'Detail'), anchor('peminjaman/edit/' . $row->id_pinjam, 'Edit'), anchor('peminjaman/delete/' . $row->id_pinjam, 'Delete'));
}

$data['tabel'] = $this->table->generate();

?>
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<a href="<?= base_url('peminjaman/inputpeminjaman') ?>" class="btn btn-primary ml-3 mb-3">Add New Peminjaman</a>

<table class="table table-hover">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">ID Pinjam</th>
			<th scope="col">Tanggal Pinjam</th>
			<th scope="col">Tanggal Kembali</th>
			<th scope="col">Nama Peminjam</th>
			<th scope="col">Nama Buku</th>
			<th scope="col">Nama Admin</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$count = 0;
		foreach ($query->result() as $row) :
			$count++;
		?>
			<tr>
				<td><?php echo $count; ?></td>
				<td><?php echo $row->id_pinjam; ?></td>
				<td><?php echo $row->tgl_pinjam; ?></td>
				<td><?php echo $row->tgl_kembali; ?></td>
				<td><?php echo $row->nama_anggota; ?></td>
				<td><?php echo $row->judul_buku; ?></td>
				<td><?php echo $row->username; ?></td>
				<td>
					<a href="<?= base_url('peminjaman/detail/' . $row->id_pinjam) ?>" class="badge badge-warning">detail</a>
					<a href="<?= base_url('peminjaman/edit/' .  $row->id_pinjam) ?>" class="badge badge-success">edit</a>
					<a href="<?= base_url('peminjaman/delete/' . $row->id_pinjam) ?>" class="badge badge-danger">delete</a>
				</td>

			</tr>
		<?php endforeach; ?>
	</tbody>