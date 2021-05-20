<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_transaksi"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>Nama Buku</th>
            <th>Nama Member</th>
            <th>Tanggal pinjam</th>
            <th>Tanggal kembali</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach ($transaksi as $row) :
        ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_buku'] ?></td>
                <td><?php echo $row['nama_member'] ?></td>
                <td><?php echo $row['tanggal_pinjam'] ?></td>
                <td><?php echo $row['tanggal_kembali'] ?></td>
                <td>
                    <a href="<?= base_url('transaksi/Edit'); ?>/<?= $row['id_transaksi']; ?>">
                        <div class="btn btn-info btn-sm"><i class="fa fa-edit"></i></div>
                    </a>
                </td>
                <td>
                    <a href="<?= base_url('transaksi/hapus'); ?>/<?= $row['id_transaksi']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">
                        <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="tambah_transaksi" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORM INPUT BUKU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('transaksi/tambah_aksi'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Id Buku</label>
                        <select name="id_buku" class="form-control">
                            <?php
                            foreach ($id_buku as $rowB) :
                            ?>
                                <option value="<?= $rowB['judul']; ?>"><?= $rowB['judul']; ?></option>


                            <?php endforeach;  ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>id Member</label>
                        <select name="id_member" class="form-control">
                            <?php
                            foreach ($id_member as $rowB) :
                            ?>
                                <option value="<?= $rowB['nama']; ?>"><?= $rowB['nama']; ?></option>


                            <?php endforeach;  ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>