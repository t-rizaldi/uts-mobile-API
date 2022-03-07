<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Jenis_kamar extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('KamarM');
    }


    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $jenisKamar = $this->KamarM->getJenisKamar()->result();
        } else {
            $jenisKamar = $this->KamarM->getJenisKamar($id)->result();
        }

        if ($jenisKamar) {
            $this->response([
                'error' => false,
                'jenisKamar' => $jenisKamar
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Jenis kamar tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'jenis_kamar' => $this->post('jenis_kamar'),
            'fasilitas' => $this->post('fasilitas'),
            'harga' => $this->post('harga')
        );

        $jenisKamar = $this->KamarM->tambahJenisKamar($data);

        if ($jenisKamar > 0) {
            $this->response([
                'error' => false,
                'message' => 'Jenis kamar berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Jenis kamar gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array(
            'id' => $this->put('id')
        );

        $data = array(
            'jenis_kamar' => $this->put('jenis_kamar'),
            'fasilitas' => $this->put('fasilitas'),
            'harga' => $this->put('harga')
        );

        $jenisKamar = $this->KamarM->updateJenisKamar($where, $data);

        if ($jenisKamar > 0) {
            $this->response([
                'error' => false,
                'message' => 'Jenis kamar berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Jenis kamar gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array(
            'id' => $this->delete('id')
        );

        $jenis_kamar = $this->KamarM->deleteJenisKamar($where);

        if ($jenis_kamar > 0) {
            $this->response([
                'error' => false,
                'message' => 'Jenis kamar berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Jenis kamar gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
