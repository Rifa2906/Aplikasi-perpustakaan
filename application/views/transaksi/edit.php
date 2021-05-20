<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <form action="" method="POST">
                <input type="hidden" name="id_transaksi" value="<?= $edit_transaksi['id_transaksi']; ?>">
                <div class="form-group row">
                    <label for="Judul" class="col-sm-2 col-form-label">Id Buku</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" id="id_uku" name="id_buku" value="<?= $edit_transaksi['id_buku']; ?>">
                        <?= form_error('id_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_member" class="col-sm-2 col-form-label">Id Member</label>
                    <div class="col-sm-10">
                        <input readonly type="text" class="form-control" id="id_member" name="id_member" value="<?= $edit_transaksi['id_member']; ?>">
                        <?= form_error('id_member', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="<?= $edit_transaksi['tanggal_pinjam']; ?>">
                        <?= form_error('tanggal_pinjam', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_kembalit" name="tanggal_kembali" value="<?= $edit_transaksi['tanggal_kembali']; ?>">
                        <?= form_error('tanggal_kembali', '<small class="text-danger pl-3">', '</small>'); ?>
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