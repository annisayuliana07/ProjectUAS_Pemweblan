<div class="content-wrapper">
	<section class="content">
		<?php foreach ($Anggota as $agt) { ?>

			<form action="<?php echo base_url() . 'index.php/anggota/update'; ?>" method="post">

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Nama Mahasiswa</label>
					<input type="hidden" name="id_anggota" class="form-control" value="<?php echo $agt->id_anggota ?>">
					<div class="col-sm-5">
						<input type="text" name="nama_anggota" class="form-control" value="<?php echo $agt->nama_anggota ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Tanggal Lahir</label>
					<div class="col-sm-5">
						<input type="text" name="tgl_lahir" class="form-control" value="<?php echo $agt->tgl_lahir ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Nomor Telepon</label>
					<div class="col-sm-5">
						<input type="text" name="no_telp" class="form-control" value="<?php echo $agt->no_telp ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Alamat</label>
					<div class="col-sm-5">
						<input type="text" name="alamat" class="form-control" value="<?php echo $agt->alamat ?>">
					</div>
				</div>
				<div class="form-group row justify-content-end">
					<div class="col-sm-10">
						<button type="reset" class="btn btn-danger">Reset</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>

			</form>
		<?php } ?>
	</section>
</div>