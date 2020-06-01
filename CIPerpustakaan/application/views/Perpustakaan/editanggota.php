<div class="content-wrapper">
	<section class="content">
		<?php foreach($Anggota as $agt) { ?>
		
		<form action="<?php echo base_url().'index.php/anggota/update'; ?>"
		method="post">
		
		<div class="form-group">
			<label>Nama Mahasiswa</label>
			<input type="hidden" name="id_anggota" class="form-control"
			value="<?php echo $agt->id_anggota ?>">
			<input type="text" name="nama_anggota" class="form-control"
			value="<?php echo $agt->nama_anggota ?>">
		</div>
		
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="text" name="tgl_lahir" class="form-control"
			value="<?php echo $agt->tgl_lahir ?>">
		</div>
		
		<div class="form-group">
			<label>Nomor Telepon</label>
			<input type="text" name="no_telp" class="form-control"
			value="<?php echo $agt->no_telp ?>">
		</div>
		
		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control"
			value="<?php echo $agt->alamat ?>">
		</div>
		
		<button type="reset" class=btn btn-danger">Reset</button>
		<button type="submit" class=btn btn-primary">Simpan</button>
		
		</form>
		<?php } ?>
	</section>
</div>