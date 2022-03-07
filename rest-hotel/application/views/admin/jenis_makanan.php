<?php

error_reporting(1);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jenis Makanan</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Jenis Makanan</button>
    </div>

    <div class="flashdata-jmakanan" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Data Jenis Makanan
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped table-hover" id="datatables">
                        <thead>
                            <tr align="middle">
                                <th>NO</th>
                                <th>JENIS MAKANAN</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1;
                            foreach ($jMakanan as $jm) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $jm['jenis_makanan'] ?></td>
                                    <td align="middle">
                                        <a href="#" class="btn btn-sm btn-warning tombol-editJmakanan" data-toggle="modal" data-target="#editModalJenisMakanan" data-id="<?= $jm['id']; ?>" data-jenismakanan="<?= $jm['jenis_makanan']; ?>"><i class="fa fa-edit"></i></a>

                                        <a href="#" class="btn btn-sm btn-danger tombol-hapusJmakanan ml-3" data-toggle="modal" data-target="#deleteModalJmakanan" data-id="<?= $jm['id']; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Insert -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Jenis Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/jenis_makanan/tambahJenisMakanan') ?>" method="post">
                    <div class="form-group">
                        <label for="jenis_makanan">Jenis Makanan</label>
                        <input type="text" class="form-control" name="jenis_makanan" id="jenis_makanan" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Jenis Makanan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editModalJenisMakanan" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Jenis Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/jenis_makanan/editJenisMakanan') ?>" method="post">
                    <div class="form-group">
                        <label for="jenis_makanan">Jenis Makanan</label>
                        <input type="text" class="form-control" name="jenis_makanan" id="jenis_makanan" required>
                        <input type="hidden" class="form-control" name="id" id="id" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit Jenis Kamar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Delete -->
<div class="modal fade" id="deleteModalJmakanan" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Jenis Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>

                <form action="<?= base_url('admin/jenis_makanan/hapusJenisMakanan') ?>" method="post">
                    <input type="hidden" name="id" id="id">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus Data</button>
                </form>
            </div>
        </div>
    </div>
</div>