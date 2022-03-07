<?php

error_reporting(1);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Akun Receptionist</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Akun Receptionist</button>
    </div>

    <div class="flashdata-akunRecep" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Data Akun Receptionist
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover">

                <thead>
                    <tr align="middle">
                        <th>NO</th>
                        <th>NAMA RECEPTIONIST</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($user as $u) : ?>

                        <tr>
                            <td align="middle"><?= $no++; ?></td>
                            <td><?= $u['nama_receptionist']; ?></td>
                            <td><?= $u['username']; ?></td>
                            <td><?= $u['password']; ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning tombol-editAkunRecep" data-toggle="modal" data-target="#editModalAkunRecep" data-id="<?= $u['id']; ?>" data-idrecep="<?= $u['id_receptionist']; ?>" data-username="<?= $u['username']; ?>" data-password="<?= $u['password']; ?>"><i class="fa fa-edit"></i></a>

                                <a href="#" class="btn btn-sm btn-danger tombol-hapusAkunRecep ml-3" data-toggle="modal" data-target="#deleteModalAkunRecep" data-id="<?= $u['id']; ?>"><i class="fa fa-trash"></i></a>
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

                <form action="<?= base_url('manager/receptionist/tambahAkun') ?>" method="post">

                    <div class="form-group">
                        <label for="id_receptionist">Receptionist</label>
                        <select name="id_receptionist" id="id_receptionist" class="form-control" required>
                            <option value="">--Pilih Receptionist</option>
                            <?php foreach ($recep as $r) : ?>
                                <option value="<?= $r['id'] ?>"><?= $r['nama_receptionist']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password" required>
                        <input type="hidden" class="form-control" name="role_id" id="role_id" value="2" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Update -->
<div class="modal fade" id="editModalAkunRecep" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Edit Akun Receptionist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('manager/receptionist/editAkun') ?>" method="post">


                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                        <input type="hidden" class="form-control" name="id_receptionist" id="id_receptionist" required>
                        <input type="hidden" class="form-control" name="id_akun" id="id_akun" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password" required>
                        <input type="hidden" class="form-control" name="role_id" id="role_id" value="2" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah Akun</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModalAkunRecep" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Akun Receptionist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus akun receptionist ini?</p>

                <form action="<?= base_url('manager/receptionist/hapusAkun') ?>" method="post">
                    <input type="hidden" name="id_akun" id="id_akun" class="form-control">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>