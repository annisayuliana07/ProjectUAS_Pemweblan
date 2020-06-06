
<?php $this->simple_login->cek_login(); ?>

<?php
$query = $this->Anggota_Model->get_all();
foreach ($query->result() as $row) {
    $this->table->add_row($row->id_anggota, $row->nama_anggota, $row->tgl_lahir, $row->no_telp, $row->alamat, anchor('anggota/detail/' . $row->id_anggota, 'Detail'), anchor('anggota/edit/' . $row->id_anggota, 'Edit'), anchor('anggota/delete/' . $row->id_anggota, 'Delete'));
}

$data['tabel'] = $this->table->generate();

?>
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<a href="<?= base_url('anggota/inputanggota/') ?>" class="btn btn-primary ml-3 mb-3">Add New Anggota</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID Anggota</th>
            <th scope="col">Nama Anggota</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Alamat</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($anggota as $a) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $a['id_anggota']; ?></td>
                <td><?= $a['nama_anggota']; ?></td>
                <td><?= $a['tgl_lahir']; ?></td>
                <td><?= $a['no_telp']; ?></td>
                <td><?= $a['alamat']; ?></td>
                <td>
                    <a href="<?= base_url('anggota/detail/' . $a['id_anggota']) ?>" class="badge badge-warning">detail</a>
                    <a href="<?= base_url('anggota/edit/' .  $a['id_anggota']) ?>" class="badge badge-success">edit</a>
                    <a href="<?= base_url('anggota/delete/' .  $a['id_anggota']) ?>" class="badge badge-danger">delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>