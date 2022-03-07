<?php

error_reporting(1);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Checkout</h1>
    </div>

    <div class="flashdata-checkout" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-flasherror="<?= $this->session->flashdata('error'); ?>"></div>

    <div class="row mb-5">
        <div class="col-md-8 mx-auto">

            <div class="card">
                <div class="card-header bg-primary text-white">
                    Data Checkout
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped table-hover" id="datatables">
                        <thead>
                            <tr align="middle">
                                <th>NO</th>
                                <th>ID CHECKIN</th>
                                <th>WAKTU CHECKOUT</th>
                                <th>TOTAL BAYAR</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1;
                            foreach ($checkout as $c) :

                                $waktu = $c['tgl_checkout'];

                                $tanggal = explode('-', $waktu);

                                $tanggalJam = explode(' ', $tanggal[2]);

                                $waktu = $tanggalJam[1];

                                $tahun = $tanggal[0];
                                $bulan = $tanggal[1];
                                $tgl = $tanggalJam[0];

                                $waktu = $tgl . '-' . $bulan . '-' . $tahun . ' / ' . $waktu;
                            ?>

                                <tr>
                                    <td align="middle"><?= $no++; ?></td>
                                    <td><?= $c['id_checkin']; ?></td>
                                    <td><?= $waktu; ?></td>
                                    <td>Rp. <?= number_format($c['total_bayar'], 0, ',', '.'); ?></td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>