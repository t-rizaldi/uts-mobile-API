<?php

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransaksiM');

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
                                                        <li class="breadcrumb-item active" aria-current="page">Daftar Checkout</li>
                                                        </ol>
                                                    </nav>');


        $data['title'] = 'Admin-Hotel | Checkout';
        $data['checkout'] = $this->TransaksiM->getAllCheckout();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/checkout', $data);
        $this->load->view('templates/footer');
    }
}
