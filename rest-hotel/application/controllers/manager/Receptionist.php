<?php

class Receptionist extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['title'] = 'Manager-Hotel | Receptionist';
        $this->session->set_flashdata('breadcrumb', '<nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb bg-transparent mt-3">
                                                        <li class="breadcrumb-item"><a href="' . base_url() . '">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Daftar Receptionist</li>
                                                        </ol>
                                                    </nav>');

        $data['recep'] = $this->PeopleM->getAllRecep();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarManager');
        $this->load->view('manager/recep', $data);
        $this->load->view('templates/footer');
    }


    public function tambahReceptionist()
    {
        $data = array(
            'nama_receptionist' => $this->input->post('nama_receptionist'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp')
        );

        $recep = $this->PeopleM->tambahRecep($data);

        if ($recep > 0) {
            $this->session->set_flashdata('message', 'berhasil ditambah...!!!');
        } else {
            $this->session->set_flashdata('error', 'gagal ditambah...!!!');
        }

        redirect('manager/receptionist');
    }

    public function editReceptionist()
    {
        $data = array(
            'id' => $this->input->post('id_recep'),
            'nama_receptionist' => $this->input->post('nama_receptionist'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp')
        );

        $recep = $this->PeopleM->editRecep($data);

        if ($recep > 0) {
            $this->session->set_flashdata('message', 'berhasil diubah...!!!');
        } else {
            $this->session->set_flashdata('error', 'gagal diubah...!!!');
        }

        redirect('manager/receptionist');
    }

    public function hapusReceptionist()
    {
        $data = array('id' => $this->input->post('id'));

        $recep = $this->PeopleM->hapusRecep($data);

        if ($recep > 0) {
            $this->session->set_flashdata('message', 'berhasil dihapus...!!!');
        } else {
            $this->session->set_flashdata('error', 'gagal dihapus...!!!');
        }

        redirect('manager/receptionist');
    }

    public function akun()
    {
        $data['title'] = 'Manager-Hotel | Akun Receptionist';
        $this->session->set_flashdata('breadcrumb', '<nav aria-label="breadcrumb">
                                                        <ol class="breadcrumb bg-transparent mt-3">
                                                        <li class="breadcrumb-item"><a href="' . base_url() . '">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Daftar Akun Receptionist</li>
                                                        </ol>
                                                    </nav>');

        $data['user'] = $this->PeopleM->getAllUser();
        $data['recep'] = $this->PeopleM->getAllRecep();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarManager');
        $this->load->view('manager/akunRecep', $data);
        $this->load->view('templates/footer');
    }


    public function tambahAkun()
    {
        $data = array(
            'id_receptionist' => $this->input->post('id_receptionist'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id')
        );

        $user = $this->PeopleM->tambahUser($data);

        if ($user > 0) {
            $this->session->set_flashdata('message', 'berhasil ditambah...!!!');
        } else {
            $this->session->set_flashdata('error', 'gagal ditambah...!!!');
        }

        redirect('manager/receptionist/akun');
    }


    public function editAkun()
    {
        $data = array(
            'id' => $this->input->post('id_akun'),
            'id_receptionist' => $this->input->post('id_receptionist'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id')
        );

        $user = $this->PeopleM->editUser($data);

        if ($user > 0) {
            $this->session->set_flashdata('message', 'berhasil diubah...!!!');
        } else {
            $this->session->set_flashdata('error', 'gagal diubah...!!!');
        }

        redirect('manager/receptionist/akun');
    }

    public function hapusAkun()
    {
        $where = array('id' => $this->input->post('id_akun'));

        $user = $this->PeopleM->hapusUser($where);

        if ($user > 0) {
            $this->session->set_flashdata('message', 'berhasil dihapus...!!!');
        } else {
            $this->session->set_flashdata('error', 'gagal dihapus...!!!');
        }

        redirect('manager/receptionist/akun');
    }
}
