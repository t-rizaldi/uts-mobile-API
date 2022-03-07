<?php

class Kamar extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('KamarM');

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
                                                        <li class="breadcrumb-item active" aria-current="page">Daftar Kamar</li>
                                                        </ol>
                                                    </nav>');


    $data['title'] = 'Admin-Hotel | Kamar';
    $data['kamar'] = $this->KamarM->getAllKamar();
    $data['jKamar'] = $this->KamarM->getAllJenisKamar();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/kamar', $data);
    $this->load->view('templates/footer');
  }

  public function tambahKamar()
  {
    $data = array(
      'nama_kamar' => htmlspecialchars(strip_tags(stripslashes($this->input->post('nama_kamar')))),
      'id_jenis_kamar' => $this->input->post('jenis_kamar')
    );

    $kamar = $this->KamarM->tambahKamar($data);

    if ($kamar > 0) {
      $this->session->set_flashdata('message', 'berhasil ditambah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal ditambah...!!!');
    }

    redirect('admin/kamar');
  }

  public function editKamar()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'nama_kamar' => htmlspecialchars(strip_tags(stripslashes($this->input->post('nama_kamar')))),
      'id_jenis_kamar' => $this->input->post('jenis_kamar')
    );

    $kamar = $this->KamarM->editKamar($data);

    if ($kamar > 0) {
      $this->session->set_flashdata('message', 'berhasil diubah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal diubah...!!!');
    }

    redirect('admin/kamar');
  }

  public function hapusKamar()
  {
    $where = array(
      'id' => $this->input->post('id')
    );

    $kamar = $this->KamarM->hapusKamar($where);

    if ($kamar > 0) {
      $this->session->set_flashdata('message', 'berhasil dihapus...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal dihapus...!!!');
    }

    redirect('admin/kamar');
  }
}
