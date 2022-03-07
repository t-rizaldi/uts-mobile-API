<?php

class Jenis_kamar extends CI_Controller
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
                                                        <li class="breadcrumb-item active" aria-current="page">Jenis Kamar</li>
                                                        </ol>
                                                    </nav>');


    $data['title'] = 'Admin-Hotel | Jenis Kamar';
    $data['jKamar'] = $this->KamarM->getAllJenisKamar();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/jenis_kamar', $data);
    $this->load->view('templates/footer');
  }


  public function tambahJenisKamar()
  {
    $data = array(
      'jenis_kamar' => htmlspecialchars(strip_tags(stripslashes($this->input->post('jenis_kamar')))),
      'fasilitas' => htmlspecialchars(strip_tags(stripslashes($this->input->post('fasilitas')))),
      'harga' => htmlspecialchars(strip_tags(stripslashes($this->input->post('harga'))))
    );

    $jKamar = $this->KamarM->tambahJenisKamar($data);

    if ($jKamar > 0) {
      $this->session->set_flashdata('message', 'berhasil ditambah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal ditambah...!!!');
    }

    redirect('admin/jenis_kamar');
  }


  public function editJenisKamar()
  {

    $data = array(
      'id' => $this->input->post('id'),
      'jenis_kamar' => htmlspecialchars(strip_tags(stripslashes($this->input->post('jenis_kamar')))),
      'fasilitas' => htmlspecialchars(strip_tags(stripslashes($this->input->post('fasilitas')))),
      'harga' => htmlspecialchars(strip_tags(stripslashes($this->input->post('harga'))))
    );

    $jKamar = $this->KamarM->editJenisKamar($data);

    if ($jKamar > 0) {
      $this->session->set_flashdata('message', 'berhasil diubah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal diubah...!!!');
    }

    redirect('admin/jenis_kamar');
  }


  public function hapusJenisKamar()
  {
    $id = $this->input->post('id');

    $jKamar = $this->KamarM->hapusJenisKamar($id);

    if ($jKamar > 0) {
      $this->session->set_flashdata('message', 'berhasil dihapus...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal dihapus...!!!');
    }

    redirect('admin/jenis_kamar');
  }
}
