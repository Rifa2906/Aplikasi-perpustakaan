<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <form action="" method="POST">
                <input type="hidden" name="id_member" value="<?= $edit_member['id_member']; ?>">
                <div class="form-group row">
                    <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Nama" placeholder="Nama" name="nama" value="<?= $edit_member['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Alamat" class="col-sm-2 col-form-label">alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Alamat" placeholder="alamat" name="alamat" value="<?= $edit_member['alamat']; ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="NoTlp" class="col-sm-2 col-form-label">No tlp</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="NoTlp" placeholder="No telpon" name="no_tlp" value="<?= $edit_member['no_tlp']; ?>">
                        <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
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