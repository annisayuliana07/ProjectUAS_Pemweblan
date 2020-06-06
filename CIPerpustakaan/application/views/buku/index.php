<?php $this->simple_login->cek_login(); ?>
<?php
$query = $this->Buku_Model->get_join();
foreach ($query->result() as $row) {
    $this->table->add_row($row->id_buku, $row->judul_buku, $row->penerbit, $row->pengarang, $row->jenis, anchor('buku/detail/' . $row->id_buku, 'Detail'), anchor('buku/edit/' . $row->id_buku, 'Edit'), anchor('buku/delete/' . $row->id_buku, 'Delete'));
}

$data['tabel'] = $this->table->generate();

?>
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<a href="<?= base_url('buku/inputbuku/') ?>" class="btn btn-primary ml-3 mb-3">Add New Buku</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID Buku</th>
            <th scope="col">Judul Buku</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($buku as $b) : ?>
            <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $b['id_buku']; ?></td>
                <td><?= $b['judul_buku']; ?></td>
                <td><?= $b['penerbit']; ?></td>
                <td><?= $b['pengarang']; ?></td>
                <td><?= $b['id_kategori']; ?></td>
                <td>
                    <a href="<?= base_url('buku/detail/' . $b['id_buku']) ?>" class="badge badge-warning">detail</a>
                    <a href="<?= base_url('buku/edit/' . $b['id_buku']) ?>" class="badge badge-success">edit</a>
                    <a href="<?= base_url('buku/delete/' . $b['id_buku']) ?>" class="badge badge-danger">delete</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>