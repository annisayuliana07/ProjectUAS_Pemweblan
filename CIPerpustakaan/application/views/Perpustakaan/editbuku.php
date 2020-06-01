<div class="content-wrapper">
	<section class="content">
		<?php foreach($Buku as $bk) { ?>
		
		<form action="<?php echo base_url().'index.php/buku/update'; ?>"
		method="post">
		
		<div class="form-group">
			<label>Judul Buku</label>
			<input type="hidden" name="id_buku" class="form-control"
			value="<?php echo $bk->id_buku ?>">
			<input type="text" name="judul_buku" class="form-control"
			value="<?php echo $bk->judul_buku ?>">
		</div>
		
		<div class="form-group">
			<label>Penerbit</label>
			<input type="text" name="penerbit" class="form-control"
			value="<?php echo $bk->penerbit ?>">
		</div>
		
		<div class="form-group">
			<label>Pengarang</label>
			<input type="text" name="pengarang" class="form-control"
			value="<?php echo $bk->pengarang ?>">
		</div>
		
		<div class="form-group">
			<label>Kategori</label>
			<input type="text" name="id_kategori" class="form-control"
			value="<?php echo $bk->id_kategori ?>">
		</div>
		
		<button type="reset" class=btn btn-danger">Reset</button>
		<button type="submit" class=btn btn-primary">Simpan</button>
		
		</form>
		<?php } ?>
	</section>
</div>