<?php

error_reporting(1);

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Makanan</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Makanan</button>
    </div>

    <div class="flashdata-makanan" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Data Makanan
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover" id="datatables">
                <thead>
                    <tr align="middle">
                        <td>NO</td>
                        <td>NAMA MAKANAN</td>
                        <td>JENIS MAKANAN</td>
                        <td>HARGA</td>
                        <td>AKSI</td>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($makanan as $m) : ?>
                        <tr>
                            <td align="middle"><?= $no++; ?></td>
                            <td><?= $m['makanan']; ?></td>
                            <td><?= $m['jenis_makanan']; ?></td>
                            <td>Rp. <?= number_format($m['harga'], 0, ',', '.'); ?></td>
                            <td align="middle">
                                <a href="#" class="btn btn-sm btn-warning tombol-editMakanan" data-toggle="modal" data-target="#editModalMakanan" data-id="<?= $m['id']; ?>" data-nama="<?= $m['makanan']; ?>" data-harga="<?= $m['harga']; ?>"><i class="fa fa-edit"></i></a>

                                <a href="#" class="btn btn-sm btn-danger tombol-hapusMakanan ml-3" data-toggle="modal" data-target="#deleteModalMakanan" data-id="<?= $m['id']; ?>"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="tambahModalLabel">Tambah Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/makanan/tambahMakanan') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_makanan">Nama Makanan</label>
                        <input type="text" class="form-control" name="nama_makanan" id="nama_makanan" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_makanan">jenis Makanan</label>
                        <select name="jenis_makanan" id="jenis_makanan" class="form-control" required>
                            <option value="">--Pilih Jenis Makanan--</option>
                            <?php foreach ($jMakanan as $jm) : ?>
                                <option value="<?= $jm['id']; ?>"><?= $jm['jenis_makanan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Makanan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<div class="modal fade" id="editModalMakanan" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/makanan/editMakanan') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_makanan">Nama Makanan</label>
                        <input type="text" class="form-control" name="nama_makanan" id="nama_makanan" required>
                        <input type="hidden" class="form-control" name="id" id="id" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_makanan">jenis Makanan</label>
                        <select name="jenis_makanan" id="jenis_makanan" class="form-control" required>
                            <option value="">--Pilih Jenis Makanan--</option>
                            <?php foreach ($jMakanan as $jm) : ?>
                                <option value="<?= $jm['id']; ?>"><?= $jm['jenis_makanan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Makanan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Delete -->
<div class="modal fade" id="deleteModalMakanan" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Makanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data ini?</p>

                <form action="<?= base_url('admin/makanan/hapusMakanan') ?>" method="post">
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