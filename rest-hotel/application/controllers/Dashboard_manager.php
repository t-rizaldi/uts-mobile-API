<?php

class Dashboard_manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransaksiM');
        $this->load->model('KamarM');
        $this->load->model('MakananM');
        $this->load->model('PeopleM');

        if ($this->session->userdata('role_id') != 1) {
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
        $data['title'] = 'Manager-Hotel | Dashboard';
        $this->session->set_flashdata('breadcrumb', '<nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb bg-white mt-3">
                                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                                        </ol>
                                                    </nav>');

        $data['pesanan'] = count($this->TransaksiM->getAllPesanan());
        $data['checkin'] = count($this->TransaksiM->getAllCheckin());
        $data['checkout'] = count($this->TransaksiM->getAllCheckout());
        $data['kamar'] = count($this->KamarM->getAllKamar());
        $data['makanan'] = count($this->MakananM->getAllMakanan());
        $data['recep'] = count($this->PeopleM->getAllRecep());

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarManager');
        $this->load->view('dashboardManager', $data);
        $this->load->view('templates/footer');
    }
}
