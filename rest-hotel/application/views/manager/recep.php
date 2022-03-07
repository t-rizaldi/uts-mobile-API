<?php

error_reporting(1);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Receptionist</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Receptionist</button>
    </div>

    <div class="flashdata-recep" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Data Receptionist
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover" id="datatables">
                <thead>
                    <tr align="middle">
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>NO HP</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($recep as $r) : ?>
                        <tr>
                            <td align="middle"><?= $no++; ?></td>
                            <td><?= $r['nama_receptionist']; ?></td>
                            <td><?= $r['jenis_kelamin']; ?></td>
                            <td><?= $r['no_hp']; ?></td>
                            <td align="middle">
                                <a href="#" class="btn btn-sm btn-warning tombol-editRecep" data-toggle="modal" data-target="#editModalRecep" data-id="<?= $r['id']; ?>" data-nama="<?= $r['nama_receptionist']; ?>" data-nohp="<?= $r['no_hp']; ?>"><i class="fa fa-edit"></i></a>

                                <a href="#" class="btn btn-sm btn-danger tombol-hapusRecep ml-3" data-toggle="modal" data-target="#deleteModalRecep" data-id="<?= $r['id']; ?>"><i class="fa fa-trash"></i></a>
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
                <h5 class="modal-title" id="tambahModalLabel">Tambah Receptionist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('manager/receptionist/tambahReceptionist') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_receptionist">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_receptionist" id="nama_receptionist" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Receptionist</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Update -->
<div class="modal fade" id="editModalRecep" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Receptionist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('manager/receptionist/editReceptionist') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_receptionist">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_receptionist" id="nama_receptionist" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" required>
                        <input type="hidden" class="form-control" name="id_recep" id="id_recep" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit Receptionist</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModalRecep" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Receptionist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus receptionist ini?</p>

                <form action="<?= base_url('manager/receptionist/hapusReceptionist') ?>" method="post">
                    <input type="hidden" name="id" id="id">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>