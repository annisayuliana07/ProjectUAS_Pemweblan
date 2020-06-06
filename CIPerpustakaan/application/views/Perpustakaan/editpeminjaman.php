<div class="content-wrapper">
	<section class="content">
		<?php foreach ($Peminjaman as $p) { ?>

			<form action="<?php echo base_url() . 'index.php/peminjaman/update'; ?>" method="post">

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Tanggal Pinjam</label>
					<input type="hidden" name="id_pinjam" class="form-control" value="<?php echo $p->id_pinjam ?>">
					<div class="col-sm-5">
						<input type="date" name="tgl_pinjam" class="form-control" value="<?php echo $p->tgl_pinjam ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Tanggal Kembali</label>
					<div class="col-sm-5">
						<input type="date" name="tgl_kembali" class="form-control" value="<?php echo $p->tgl_kembali ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Jumlah Buku</label>
					<div class="col-sm-5">
						<input type="text" name="jumlah_buku" class="form-control" value="<?php echo $p->jumlah_buku ?>">
					</div>
				</div>

				<div class="form-group row justify-content-end">
					<div class="col-sm-10">
						<button type="reset" class="btn btn-danger">Reset</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</div>
</div>
</form>
<?php } ?>
</section>
</div>