<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthM');
    }

    public function login()
    {
        if ($this->session->userdata('role_id')) {
            switch ($this->session->userdata('role_id')) {
                case 1:
                    redirect('dashboard_manager');
                    break;
                case 2:
                    redirect();
                    break;
            }
        }

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username tidak boleh kosong...!!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password tidak boleh kosong...!!!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Hotel - Login';

            $this->load->view('templates/header', $data);
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            $auth = $this->AuthM->cekLogin();

            if ($auth == false) {
                $this->session->set_flashdata('pesan', '<div class="small alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Username</strong> atau <strong>Password</strong> salah...!!!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

                redirect('auth/login');
            } else {

                $this->session->set_userdata('username', $auth[0]['username']);
                $this->session->set_userdata('password', $auth[0]['password']);
                $this->session->set_userdata('role_id', $auth[0]['role_id']);
                $this->session->set_userdata('id_receptionist', $auth[0]['id_receptionist']);
                $this->session->set_userdata('nama', $auth[0]['nama_receptionist']);

                switch ($auth[0]['role_id']) {
                    case 1:
                        redirect('dashboard_manager');
                        break;
                    case 2:
                        redirect('dashboard');
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
