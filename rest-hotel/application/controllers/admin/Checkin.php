<?php

class Checkin extends CI_Controller
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
                                                        <li class="breadcrumb-item active" aria-current="page">Daftar Checkin</li>
                                                        </ol>
                                                    </nav>');


    $data['title'] = 'Admin-Hotel | Checkin';
    $data['checkin'] = $this->TransaksiM->getAllCheckin();
    $data['kamar'] = $this->KamarM->getAllKamar();
    $data['makanan'] = $this->MakananM->getAllMakanan();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/checkin', $data);
    $this->load->view('templates/footer');
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

    $checkin = $this->TransaksiM->inputCheckin($data);

    if ($checkin > 0) {
      $this->session->set_flashdata('message', 'berhasil ditambah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal ditambah...!!!');
    }

    redirect('admin/checkin');
  }


  public function checkout()
  {

    $waktu = $this->input->post('tgl_checkout');

    $tanggal = explode('-', $waktu);

    $tanggalJam = explode(' ', $tanggal[2]);

    $waktu = $tanggalJam[1];

    $tahun = $tanggalJam[0];
    $bulan = $tanggal[1];
    $tgl = $tanggal[0];

    $waktu = $tahun . '-' . $bulan . '-' . $tgl . ' ' . $waktu;

    $data = array(
      'id_checkin' => $this->input->post('id_checkin'),
      'tgl_checkout' => $waktu,
      'total_bayar' => htmlspecialchars(strip_tags(stripslashes($this->input->post('total_bayar'))))
    );

    $checkin = array(
      'id' => $this->input->post('id_checkin'),
      'tgl_checkin' => $this->input->post('tgl_checkin'),
      'id_receptionist' => $this->input->post('id_receptionist'),
      'id_pesan' => $this->input->post('id_pesan'),
      'id_kamar' => $this->input->post('id_kamar'),
      'id_makanan' => $this->input->post('id_makanan'),
      'biaya' => $this->input->post('biaya'),
      'status' => $this->input->post('status'),
    );

    $this->TransaksiM->updateCheckin($checkin);

    $checkout = $this->TransaksiM->checkout($data);

    if ($checkout > 0) {
      $this->session->set_flashdata('message', 'berhasil diproses...!!');
    } else {
      $this->session->set_flashdata('message', 'gagal diproses...!!!');
    }

    redirect('admin/checkout');
  }
}
