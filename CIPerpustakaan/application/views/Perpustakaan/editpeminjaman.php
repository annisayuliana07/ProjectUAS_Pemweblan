<div class="content-wrapper">
	<section class="content">
		<?php foreach($Peminjaman as $p) { ?>
		
		<form action="<?php echo base_url().'index.php/peminjaman/update'; ?>"
		method="post">
		
		<div class="form-group">
			<label>Tanggal Pinjam</label>
			<input type="hidden" name="id_pinjam" class="form-control"
			value="<?php echo $p->id_pinjam ?>">
			<input type="date" name="tgl_pinjam" class="form-control"
			value="<?php echo $p->tgl_pinjam ?>">
		</div>
		
		<div class="form-group">
			<label>Tanggal Kembali</label>
			<input type="date" name="tgl_kembali" class="form-control"
			value="<?php echo $p->tgl_kembali ?>">
		</div>
		
		<div class="form-group">
			<label>Jumlah Buku</label>
			<input type="text" name="jumlah_buku" class="form-control"
			value="<?php echo $p->jumlah_buku ?>">
		</div>
		
		<button type="reset" class=btn btn-danger">Reset</button>
		<button type="submit" class=btn btn-primary">Simpan</button>
		
		</form>
		<?php } ?>
	</section>
</div>