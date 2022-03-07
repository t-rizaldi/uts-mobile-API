<?php

class Jenis_makanan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
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
                                                        <li class="breadcrumb-item active" aria-current="page">Jenis Makanan</li>
                                                        </ol>
                                                    </nav>');


    $data['title'] = 'Admin-Hotel | Jenis Makanan';
    $data['jMakanan'] = $this->MakananM->getAllJenisMakanan();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/jenis_makanan', $data);
    $this->load->view('templates/footer');
  }


  public function tambahJenisMakanan()
  {
    $data = array(
      'jenis_makanan' => htmlspecialchars(strip_tags(stripslashes($this->input->post('jenis_makanan'))))
    );

    $jMakanan = $this->MakananM->tambahJenisMakanan($data);

    if ($jMakanan > 0) {
      $this->session->set_flashdata('message', 'berhasil ditambah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal ditambah...!!!');
    }

    redirect('admin/jenis_makanan');
  }


  public function editJenisMakanan()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'jenis_makanan' => htmlspecialchars(strip_tags(stripslashes($this->input->post('jenis_makanan'))))
    );

    $jMakanan = $this->MakananM->editJenisMakanan($data);

    if ($jMakanan > 0) {
      $this->session->set_flashdata('message', 'berhasil diubah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal diubah...!!!');
    }

    redirect('admin/jenis_makanan');
  }


  public function hapusJenisMakanan()
  {
    $where = array(
      'id' => $this->input->post('id')
    );

    $jMakanan = $this->MakananM->hapusJenisMakanan($where);

    if ($jMakanan > 0) {
      $this->session->set_flashdata('message', 'berhasil dihapus...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal dihapus...!!!');
    }

    redirect('admin/jenis_makanan');
  }
}
