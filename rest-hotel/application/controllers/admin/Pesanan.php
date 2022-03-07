<?php

class Pesanan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('TransaksiM');
    $this->load->model('KamarM');
    $this->load->model('MakananM');

    if ($this->session->userdata('role_id') != 2) {
      $this->session->set_flashdata('pesan', '<div class="small alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login...!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

      redirect('auth/login');
    }
  }

  public function index()
  {
    $this->session->set_flashdata('breadcrumb', '<nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb bg-transparent mt-3">
                                                        <li class="breadcrumb-item"><a href="' . base_url() . '">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Daftar Pesanan</li>
                                                        </ol>
                                                    </nav>');


    $data['title'] = 'Admin-Hotel | Pesanan';
    $data['pesanan'] = $this->TransaksiM->getAllPesanan();
    $data['kamar'] = $this->KamarM->getAllKamar();
    $data['makanan'] = $this->MakananM->getAllMakanan();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/pesanan', $data);
    $this->load->view('templates/footer');
  }


  public function cancelPesanan()
  {
    $where = array(
      'id' => $this->input->post('id')
    );

    $pesanan = $this->TransaksiM->hapusPesanan($where);

    if ($pesanan > 0) {
      $this->session->set_flashdata('message', 'berhasil dibatalkan...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal dibatalkan...!!!');
    }

    redirect('admin/pesanan');
  }


  public function checkin()
  {
    $waktu = $this->input->post('tgl_checkin');

    $tanggal = explode('-', $waktu);

    $tanggalJam = explode(' ', $tanggal[2]);

    $waktu = $tanggalJam[1];

    $tahun = $tanggalJam[0];
    $bulan = $tanggal[1];
    $tgl = $tanggal[0];

    $waktu = $tahun . '-' . $bulan . '-' . $tgl . ' ' . $waktu;

    $data = array(
      'tgl_checkin' => $waktu,
      'id_receptionist' => $this->input->post('id_receptionist'),
      'id_pesan' => $this->input->post('id_pesan'),
      'id_kamar' => $this->input->post('id_kamar'),
      'id_makanan' => $this->input->post('id_makanan'),
      'biaya' => $this->input->post('biaya'),
      'status' => 'Y'
    );

    //update pesanan
    $pesanan = array(
      'id' => $this->input->post('id_pesan'),
      'tgl_pesan' => $this->input->post('tgl_pesan'),
      'id_tamu' => $this->input->post('id_tamu'),
      'jml_kamar' => $this->input->post('jml_kamar'),
      'status' => $this->input->post('status'),
    );

    $this->TransaksiM->updatePesanan($pesanan);

    $checkin = $this->TransaksiM->inputCheckin($data);

    if ($checkin > 0) {
      $this->session->set_flashdata('message', 'berhasil diproses...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal diproses...!!!');
    }

    redirect('admin/checkin');
  }
}
