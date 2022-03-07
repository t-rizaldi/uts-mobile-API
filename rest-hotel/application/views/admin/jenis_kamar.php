<?php

error_reporting(1);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jenis Kamar</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Jenis Kamar</button>
    </div>

    <div class="flashdata-jkamar" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Data Jenis Kamar
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover" id="datatables">
                <thead>
                    <tr align="middle">
                        <th>NO</th>
                        <th>JENIS KAMAR</th>
                        <th>FASILITAS</th>
                        <th>HARGA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jKamar as $jk) :
                    ?>

                        <tr>
                            <td align="middle"><?= $no++; ?></td>
                            <td><?= $jk['jenis_kamar']; ?></td>
                            <td><?= $jk['fasilitas']; ?></td>
                            <td>Rp. <?= number_format($jk['harga'], 0, ',', '.'); ?></td>
                            <td align="middle">
                                <a href="#" class="btn btn-sm btn-warning tombol-edit" data-toggle="modal" data-target="#editModal" data-id="<?= $jk['id']; ?>" data-jeniskamar="<?= $jk['jenis_kamar']; ?>" data-fasilitas="<?= $jk['fasilitas']; ?>" data-harga="<?= $jk['harga']; ?>"><i class="fa fa-edit"></i></a>

                                <a href="#" class="btn btn-sm btn-danger tombol-hapus ml-3" data-toggle="modal" data-target="#deleteModal" data-id="<?= $jk['id']; ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>


<!-- Modal Insert -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Jenis Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/jenis_kamar/tambahJenisKamar') ?>" method="post">
                    <div class="form-group">
                        <label for="jenis_kamar">Jenis Kamar</label>
                        <input type="text" class="form-control" name="jenis_kamar" id="jenis_kamar" required>
                    </div>

                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <input type="text" class="form-control" name="fasilitas" id="fasilitas" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Jenis Kamar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Jenis Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/jenis_kamar/editJenisKamar') ?>" method="post">
                    <div class="form-group">
                        <label for="jenis_kamar">Jenis Kamar</label>
                        <input type="text" class="form-control" name="jenis_kamar" id="jenis_kamar" required>
                        <input type="hidden" class="form-control" name="id" id="id" required>
                    </div>

                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <input type="text" class="form-control" name="fasilitas" id="fasilitas" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" required>
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
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Jenis Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>

                <form action="<?= base_url('admin/jenis_kamar/hapusJenisKamar') ?>" method="post">
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