<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Tamu extends REST_Controller
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
            $tamu = $this->PeopleM->getTamu()->result();
        } else {
            $tamu = $this->PeopleM->getTamu($id)->result();
        }

        if ($tamu) {
            $this->response([
                'error' => false,
                'tamu' => $tamu
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Tamu tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'nama_tamu' => $this->post('nama_tamu'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'no_hp' => $this->post('no_hp'),
            'alamat' => $this->post('alamat')
        );

        $tamu = $this->PeopleM->tambahTamu($data);

        if ($tamu > 0) {
            $this->response([
                'error' => false,
                'message' => 'Tamu berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Tamu gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'nama_tamu' => $this->put('nama_tamu'),
            'jenis_kelamin' => $this->put('jenis_kelamin'),
            'no_hp' => $this->put('no_hp'),
            'alamat' => $this->put('alamat')
        );

        $tamu = $this->PeopleM->updateTamu($where, $data);

        if ($tamu > 0) {
            $this->response([
                'error' => false,
                'message' => 'Tamu berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Tamu gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $tamu = $this->PeopleM->deleteTamu($where);

        if ($tamu > 0) {
            $this->response([
                'error' => false,
                'message' => 'Tamu berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Tamu gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
