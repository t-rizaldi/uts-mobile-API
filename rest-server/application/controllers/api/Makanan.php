<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Makanan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MakananM');
    }


    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $makanan = $this->MakananM->getMakanan()->result();
        } else {
            $makanan = $this->MakananM->getMakanan($id)->result();
        }

        if ($makanan) {
            $this->response([
                'error' => false,
                'makanan' => $makanan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Makanan tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'id_jenis_makanan' => $this->post('id_jenis_makanan'),
            'makanan' => $this->post('makanan'),
            'harga' => $this->post('harga')
        );

        $jenisMakanan = $this->MakananM->tambahMakanan($data);

        if ($jenisMakanan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Makanan berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Makanan gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'id_jenis_makanan' => $this->put('id_jenis_makanan'),
            'makanan' => $this->put('makanan'),
            'harga' => $this->put('harga')
        );

        $makanan = $this->MakananM->updateMakanan($where, $data);

        if ($makanan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Makanan berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Makanan gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array(
            'id' => $this->delete('id')
        );

        $Makanan = $this->MakananM->deleteMakanan($where);

        if ($Makanan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Makanan berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Makanan gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
