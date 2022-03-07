<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserM');
    }


    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $user = $this->UserM->getUser()->result();
        } else {
            $user = $this->UserM->getUser($id)->result();
        }

        if ($user) {

            $this->response([
                'error' => false,
                'user' => $user
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'error' => true,
                'message' => 'User tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'id_receptionist' => $this->post('id_receptionist'),
            'username' => $this->post('username'),
            'password' => $this->post('password'),
            'role_id' => $this->post('role_id')
        );

        $user = $this->UserM->tambahUser($data);

        if ($user) {

            $this->response([
                'error' => false,
                'message' => 'User berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {

            $this->response([
                'error' => true,
                'message' => 'User gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));
        $data = array(
            'id_receptionist' => $this->put('id_receptionist'),
            'username' => $this->put('username'),
            'password' => $this->put('password'),
            'role_id' => $this->put('role_id')
        );

        $user = $this->UserM->editUser($where, $data);

        if ($user) {

            $this->response([
                'error' => false,
                'message' => 'User berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'error' => true,
                'message' => 'User gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {

        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'error' => true,
                'message' => 'Masukkan id data yang ingin dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            $where = array('id' => $id);
        }

        $user = $this->UserM->hapusUser($where);

        if ($user) {

            $this->response([
                'error' => false,
                'message' => 'User berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'error' => true,
                'message' => 'User gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
