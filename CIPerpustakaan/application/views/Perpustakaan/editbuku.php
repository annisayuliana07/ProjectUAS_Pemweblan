<div class="content-wrapper">
	<section class="content">
		<?php foreach ($Buku as $bk) { ?>

			<form action="<?php echo base_url() . 'index.php/buku/update'; ?>" method="post">

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4"> Judul Buku </label>
					<div class="col-sm-5">
						<input type="hidden" name="id_buku" class="form-control" value="<?php echo $bk->id_buku ?>">
						<input type="text" name="judul_buku" class="form-control" value="<?php echo $bk->judul_buku ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Penerbit</label>
					<div class="col-sm-5">
						<input type="text" name="penerbit" class="form-control" value="<?php echo $bk->penerbit ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Pengarang</label>
					<div class="col-sm-5">
						<input type="text" name="pengarang" class="form-control" value="<?php echo $bk->pengarang ?>">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-2 col-form-label ml-4">Kategori</label>
					<div class="col-sm-5">
						<input type="text" name="id_kategori" class="form-control" value="<?php echo $bk->id_kategori ?>">
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