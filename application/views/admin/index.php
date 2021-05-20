<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_member"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
    <?= $this->session->flashdata('message'); ?>
    <form class="form-inline my-2 my-lg-0" action="<?= base_url('admin'); ?>" method="POST">
        <input autofocus class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" autocomplete="off" aria-label="Search">
        <input class="btn btn-success my-2 my-sm-0" name="submit" type="submit">
    </form>
    <table class="table table-bordered" id="dataTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>Alamat</th>
                <th>No telpon</th>
                <th colspan="3">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($member)) : ?>
                <tr>
                    <td colspan="5">
                        <div class="alert alert-danger" role="alert">
                            Data not found
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
            <?php
            $no = 1;
            foreach ($member as $row) :
            ?>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td><?php echo $row['no_tlp'] ?></td>
                    <td>
                        <a href="<?= base_url('Admin/Edit'); ?>/<?= $row['id_member']; ?>">
                            <div class="btn btn-info btn-sm"><i class="fa fa-edit"></i></div>
                        </a>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/hapus'); ?>/<?= $row['id_member']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">
                            <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" tabindex="-1" id="tambah_member" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORM INPUT MEMBER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/tambah_aksi'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No telpon</label>
                        <input type="number" name="no_tlp" class="form-control">
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