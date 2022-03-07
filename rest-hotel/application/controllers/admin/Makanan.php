<?php

class Makanan extends CI_Controller
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
                                                        <li class="breadcrumb-item active" aria-current="page">Daftar Makanan</li>
                                                        </ol>
                                                    </nav>');


    $data['title'] = 'Admin-Hotel | Makanan';
    $data['makanan'] = $this->MakananM->getAllMakanan();
    $data['jMakanan'] = $this->MakananM->getAllJenisMakanan();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/makanan', $data);
    $this->load->view('templates/footer');
  }


  public function tambahMakanan()
  {
    $data = array(
      'id_jenis_makanan' => $this->input->post('jenis_makanan'),
      'makanan' => htmlspecialchars(strip_tags(stripslashes($this->input->post('nama_makanan')))),
      'harga' => htmlspecialchars(strip_tags(stripslashes($this->input->post('harga'))))
    );

    $makanan = $this->MakananM->tambahMakanan($data);

    if ($makanan > 0) {
      $this->session->set_flashdata('message', 'berhasil ditambah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal ditambah...!!!');
    }

    redirect('admin/makanan');
  }


  public function editMakanan()
  {
    $data = array(
      'id' => $this->input->post('id'),
      'id_jenis_makanan' => $this->input->post('jenis_makanan'),
      'makanan' => htmlspecialchars(strip_tags(stripslashes($this->input->post('nama_makanan')))),
      'harga' => htmlspecialchars(strip_tags(stripslashes($this->input->post('harga'))))
    );

    $makanan = $this->MakananM->editMakanan($data);

    if ($makanan > 0) {
      $this->session->set_flashdata('message', 'berhasil diubah...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal diubah...!!!');
    }

    redirect('admin/makanan');
  }


  public function hapusMakanan()
  {
    $where = array(
      'id' => $this->input->post('id')
    );

    $makanan = $this->MakananM->hapusMakanan($where);

    if ($makanan > 0) {
      $this->session->set_flashdata('message', 'berhasil dihapus...!!!');
    } else {
      $this->session->set_flashdata('error', 'gagal dihapus...!!!');
    }

    redirect('admin/makanan');
  }
}
