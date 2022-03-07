<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Jenis_makanan extends REST_Controller
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
            $jenisMakanan = $this->MakananM->getJenisMakanan()->result();
        } else {
            $jenisMakanan = $this->MakananM->getJenisMakanan($id)->result();
        }

        if ($jenisMakanan) {

            $this->response([
                'error' => false,
                'jenisMakanan' => $jenisMakanan
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'error' => true,
                'message' => 'Jenis makanan tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'jenis_makanan' => $this->post('jenis_makanan')
        );

        $jenisMakanan = $this->MakananM->tambahJenisMakanan($data);

        if ($jenisMakanan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Jenis makanan berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Jenis makanan gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'jenis_makanan' => $this->put('jenis_makanan')
        );

        $jenisMakanan = $this->MakananM->updateJenisMakanan($where, $data);

        if ($jenisMakanan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Jenis makanan berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Jenis makanan gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array(
            'id' => $this->delete('id')
        );

        $jenisMakanan = $this->MakananM->deleteJenisMakanan($where);

        if ($jenisMakanan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Jenis makanan berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Jenis makanan gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
