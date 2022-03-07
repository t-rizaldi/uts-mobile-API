<?php

error_reporting(1);

?>

<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Checkin</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Checkin</button>
    </div>

    <div class="flashdata-checkin" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Data Checkin
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover" id="datatables">
                <thead>
                    <tr align="middle">
                        <th>NO</th>
                        <th>TANGGAL CHECKIN</th>
                        <th>NAMA RECEPTIONIST</th>
                        <th>KAMAR</th>
                        <th>MAKANAN</th>
                        <th>BIAYA</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1;
                    foreach ($checkin as $c) :

                        $waktu = $c['tgl_checkin'];

                        $tanggal = explode('-', $waktu);

                        $tanggalJam = explode(' ', $tanggal[2]);

                        $waktu = $tanggalJam[1];

                        $tahun = $tanggal[0];
                        $bulan = $tanggal[1];
                        $tgl = $tanggalJam[0];

                        $waktu = $tgl . '-' . $bulan . '-' . $tahun . ' / ' . $waktu;
                    ?>

                        <?php if ($c['status'] == 'Y') { ?>
                            <tr>
                                <td align="middle"><?= $no++; ?></td>
                                <td align="middle"><?= $waktu; ?></td>
                                <td align="middle"><?= $c['nama_receptionist']; ?></td>
                                <td align="middle"><?= $c['nama_kamar']; ?></td>
                                <td align="middle"><?= $c['makanan']; ?></td>
                                <td align="middle">Rp. <?= number_format($c['biaya'], 0, ',', '.'); ?></td>
                                <td align="middle">
                                    <a href="#" class="btn btn-sm btn-success tombolCheckout" data-toggle="modal" data-target="#checkoutModal" data-id="<?= $c['id']; ?>" data-biaya="<?= $c['biaya']; ?>" data-tgl="<?= $c['tgl_checkin']; ?>" data-recep="<?= $c['id_receptionist']; ?>" data-pesan="<?= $c['id_pesan']; ?>" data-kamar="<?= $c['id_kamar']; ?>" data-makanan="<?= $c['id_makanan']; ?>">Checkout</a>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td align="middle"><?= $no++; ?></td>
                                <td align="middle"><?= $waktu; ?></td>
                                <td align="middle"><?= $c['nama_receptionist']; ?></td>
                                <td align="middle"><?= $c['nama_kamar']; ?></td>
                                <td align="middle"><?= $c['makanan']; ?></td>
                                <td align="middle">Rp. <?= number_format($c['biaya'], 0, ',', '.'); ?></td>
                                <td align="middle">
                                    <div class="text-success"><i class="fas fa-check"></i> Selesai</div>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<!-- Modal Checkout -->
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proses Checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/checkin/checkout'); ?>" method="post">

                    <div class="form-group">
                        <input type="hidden" name="id_checkin" id="id_checkin" class="form-control" required>
                        <label for="tgl_checkout">Tanggal Checkout</label>
                        <input type="text" name="tgl_checkout" id="tgl_checkout" class="form-control" value="<?= waktu_indo(); ?>" required readonly>

                        <input type="hidden" name="tgl_checkin" id="tgl_checkin" class="form-control" required>
                        <input type="hidden" name="id_receptionist" id="id_receptionist" class="form-control" required>
                        <input type="hidden" name="id_pesan" id="id_pesan" class="form-control" required>
                        <input type="hidden" name="id_kamar" id="id_kamar" class="form-control" required>
                        <input type="hidden" name="id_makanan" id="id_makanan" class="form-control" required>
                        <input type="hidden" name="status" id="status" class="form-control" value="N">
                        <input type="hidden" name="biaya" id="biaya" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" name="total_bayar" id="total_bayar" class="form-control" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Checkin -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Checkin Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/checkin/checkin'); ?>" method="post">
                    <div class="form-group">
                        <label>Receptionist</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('nama'); ?>" disabled>
                        <input type="hidden" class="form-control" name="id_receptionist" id="id_receptionist" value="<?= $this->session->userdata('id_receptionist'); ?>" required>
                        <input type="hidden" class="form-control" name="id_pesan" id="id_pesan" value="0" required>

                        <input type="hidden" name="tgl_pesan" id="tgl_pesan" class="form-control" required>
                        <input type="hidden" name="id_tamu" id="id_tamu" class="form-control" required>
                        <input type="hidden" name="jml_kamar" id="jml_kamar" class="form-control" required>
                        <input type="hidden" name="status" id="status" value="Y" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_checkin">Waktu Checkin</label>
                        <input type="datetime" class="form-control" name="tgl_checkin" id="tgl_checkin" value="<?= waktu_indo(); ?>" readonly required>
                    </div>

                    <div class="form-group">
                        <label for="id_kamar">Kamar</label>
                        <select name="id_kamar" id="id_kamar" class="form-control" required>
                            <option value="">--Pilih Kamar--</option>
                            <?php foreach ($kamar as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama_kamar']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_makanan">Makanan</label>
                        <select name="id_makanan" id="id_makanan" class="form-control" required>
                            <option value="">--Pilih Makanan--</option>
                            <?php foreach ($makanan as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['makanan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input type="number" class="form-control" name="biaya" id="biaya" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Checkin</button>
                </form>
            </div>
        </div>
    </div>
</div>