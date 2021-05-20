<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <form action="" method="POST">
                <input type="hidden" name="id_buku" value="<?= $edit_buku['id_buku']; ?>">
                <div class="form-group row">
                    <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Judul" placeholder="Judul" name="judul" value="<?= $edit_buku['judul']; ?>">
                        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Pengarang" class="col-sm-2 col-form-label">Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Pengarang" placeholder="Pengarang" name="pengarang" value="<?= $edit_buku['pengarang']; ?>">
                        <?= form_error('pengarang', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Penerbit" placeholder="Penerbit" name="penerbit" value="<?= $edit_buku['penerbit']; ?>">
                        <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row justify-content-lg-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary col-sm-2">Edit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>