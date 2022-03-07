<?php

error_reporting(1);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
    </div>

    <div class="flashdata-pesanan" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="card mb-5">
        <div class="card-header bg-primary text-white">
            Data Makanan
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover" id="datatables">
                <thead>
                    <tr align="middle">
                        <th>NO</th>
                        <th>WAKTU PESAN</th>
                        <th>NAMA TAMU</th>
                        <th>KET. KAMAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <?php $no = 1;
                foreach ($pesanan as $psn) :
                    $waktu = $psn['tgl_pesan'];

                    $tanggal = explode('-', $waktu);

                    $tanggalJam = explode(' ', $tanggal[2]);

                    $waktu = $tanggalJam[1];

                    $tahun = $tanggal[0];
                    $bulan = $tanggal[1];
                    $tgl = $tanggalJam[0];

                    $waktu = $tgl . '-' . $bulan . '-' . $tahun . ' / ' . $waktu;
                ?>

                    <?php if ($psn['status'] == 'Y') { ?>
                        <tr>
                            <td align="middle"><?= $no++; ?></td>
                            <td align="middle"><?= $waktu; ?></td>
                            <td><?= $psn['nama_tamu']; ?></td>
                            <td><?= $psn['jml_kamar']; ?></td>
                            <td align="middle">
                                <a href="#" class="btn btn-sm btn-success tombol-checkin" data-toggle="modal" data-target="#checkinModal" data-id="<?= $psn['id']; ?>" data-tgl="<?= $psn['tgl_pesan']; ?>" data-idtamu="<?= $psn['id_tamu']; ?>" data-kamar="<?= $psn['jml_kamar']; ?>">Checkin</a>
                                <a href="#" class="btn btn-sm btn-danger tombol-batal ml-3" data-toggle="modal" data-target="#cancelModal" data-id="<?= $psn['id']; ?>">Cancel</a>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td align="middle"><?= $no++; ?></td>
                            <td align="middle"><?= $waktu; ?></td>
                            <td><?= $psn['nama_tamu']; ?></td>
                            <td><?= $psn['jml_kamar']; ?></td>
                            <td align="middle">
                                <div class="text-success"><i class="fas fa-check"></i> Selesai</div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php endforeach; ?>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>
</div>



<!-- Modal Cancel -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Batalkan Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan membatalkan pesanan ini?</p>

                <form action="<?= base_url('admin/pesanan/cancelPesanan'); ?>" method="post">
                    <input type="hidden" name="id" id="id">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-danger">Ya, Saya Yakin</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Checkin -->
<div class="modal fade" id="checkinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Checkin Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= base_url('admin/pesanan/checkin'); ?>" method="post">
                    <div class="form-group">
                        <label>Receptionist</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('nama'); ?>" disabled>
                        <input type="hidden" class="form-control" name="id_receptionist" id="id_receptionist" value="<?= $this->session->userdata('id_receptionist'); ?>" required>
                        <input type="hidden" class="form-control" name="id_pesan" id="id_pesan" placeholder="id pesan..." required>

                        <input type="hidden" name="tgl_pesan" id="tgl_pesan" class="form-control" required>
                        <input type="hidden" name="id_tamu" id="id_tamu" class="form-control" required>
                        <input type="hidden" name="jml_kamar" id="jml_kamar" class="form-control" required>
                        <input type="hidden" name="status" id="status" value="N" class="form-control" required>
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