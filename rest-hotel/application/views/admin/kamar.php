<?php

error_reporting(1);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kamar</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Kamar</button>
    </div>

    <div class="flashdata-kamar" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-error="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Data Kamar
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover" id="datatables">
                <thead>
                    <tr align="middle">
                        <th>NO</th>
                        <th>NAMA KAMAR</th>
                        <th>JENIS KAMAR</th>
                        <th>HARGA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kamar as $k) :
                    ?>

                        <tr>
                            <td align="middle"><?= $no++; ?></td>
                            <td><?= $k['nama_kamar']; ?></td>
                            <td><?= $k['jenis_kamar']; ?></td>
                            <td>Rp. <?= number_format($k['harga'], 0, ',', '.'); ?></td>
                            <td align="middle">
                                <a href="#" class="btn btn-sm btn-warning tombol-editKamar" data-toggle="modal" data-target="#editModalKamar" data-id="<?= $k['id']; ?>" data-nama="<?= $k['nama_kamar']; ?>"><i class="fa fa-edit"></i></a>

                                <a href="#" class="btn btn-sm btn-danger tombol-hapusKamar ml-3" data-toggle="modal" data-target="#deleteModalKamar" data-id="<?= $k['id']; ?>"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="tambahModalLabel">Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/kamar/tambahKamar') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_kamar">Nama Kamar</label>
                        <input type="text" class="form-control" name="nama_kamar" id="nama_kamar" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kamar">Jenis Kamar</label>
                        <select name="jenis_kamar" id="jenis_kamar" class="form-control" required>
                            <option value="">--Pilih Jenis Kamar--</option>
                            <?php foreach ($jKamar as $jk) : ?>
                                <option value="<?= $jk['id']; ?>"><?= $jk['jenis_kamar']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Kamar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editModalKamar" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="editModalLabel">Edit Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/kamar/editKamar') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_kamar">Nama Kamar</label>
                        <input type="text" class="form-control" name="nama_kamar" id="nama_kamar" required>
                        <input type="hidden" class="form-control" name="id" id="id" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kamar">jenis_kamar</label>
                        <select name="jenis_kamar" id="jenis_kamar" class="form-control" required>
                            <option value="">--Pilih Jenis Kamar--</option>
                            <?php foreach ($jKamar as $jk) : ?>
                                <option value="<?= $jk['id']; ?>"><?= $jk['jenis_kamar']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit Kamar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Delete -->
<div class="modal fade" id="deleteModalKamar" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>

                <form action="<?= base_url('admin/kamar/hapusKamar') ?>" method="post">
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