<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Recep extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PeopleM');
    }


    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $recep = $this->PeopleM->getRecep()->result();
        } else {
            $recep = $this->PeopleM->getRecep($id)->result();
        }

        if ($recep) {
            $this->response([
                'error' => false,
                'recep' => $recep
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Receptionist tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'nama_receptionist' => $this->post('nama_receptionist'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'no_hp' => $this->post('no_hp')
        );

        $recep = $this->PeopleM->tambahRecep($data);

        if ($recep > 0) {
            $this->response([
                'error' => false,
                'message' => 'Receptionist berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Receptionist gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'nama_receptionist' => $this->put('nama_receptionist'),
            'jenis_kelamin' => $this->put('jenis_kelamin'),
            'no_hp' => $this->put('no_hp')
        );

        $recep = $this->PeopleM->updateRecep($where, $data);

        if ($recep > 0) {
            $this->response([
                'error' => false,
                'message' => 'Receptionist berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Receptionist gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $recep = $this->PeopleM->deleteRecep($where);

        if ($recep > 0) {
            $this->response([
                'error' => false,
                'message' => 'Receptionist berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Receptionist gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
