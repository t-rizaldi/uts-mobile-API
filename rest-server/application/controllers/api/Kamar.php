<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Kamar extends REST_Controller
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
            $kamar = $this->KamarM->getKamar()->result();
        } else {
            $kamar = $this->KamarM->getKamar($id)->result();
        }

        if ($kamar) {

            $this->response([
                'error' => false,
                'kamar' => $kamar
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'error' => true,
                'message' => 'Kamar tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'nama_kamar' => $this->post('nama_kamar'),
            'id_jenis_kamar' => $this->post('id_jenis_kamar')
        );

        $kamar = $this->KamarM->tambahKamar($data);

        if ($kamar > 0) {
            $this->response([
                'error' => false,
                'message' => 'Kamar berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Kamar gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array(
            'id' => $this->put('id')
        );

        $data = array(
            'nama_kamar' => $this->put('nama_kamar'),
            'id_jenis_kamar' => $this->put('id_jenis_kamar')
        );

        $kamar = $this->KamarM->updateKamar($where, $data);

        if ($kamar > 0) {
            $this->response([
                'error' => false,
                'message' => 'Kamar berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Kamar gagal diubah'
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
            $where = array(
                'id' => $id
            );

            $kamar = $this->KamarM->deleteKamar($where);

            if ($kamar > 0) {
                $this->response([
                    'error' => false,
                    'message' => 'Kamar berhasil dihapus'
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'error' => true,
                    'message' => 'Kamar gagal dihapus'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}
