<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Pesanan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TransaksiM');
    }


    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $pesan = $this->TransaksiM->getPesanan()->result();
        } else {
            $pesan = $this->TransaksiM->getPesanan($id)->result();
        }

        if ($pesan) {
            $this->response([
                'error' => false,
                'pesanan' => $pesan
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Pesanan tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'tgl_pesan' => $this->post('tgl_pesan'),
            'id_tamu' => $this->post('id_tamu'),
            'jml_kamar' => $this->post('jml_kamar'),
	    'status' => $this->post('status')
        );

        $pesan = $this->TransaksiM->tambahPesanan($data);

        if ($pesan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Pesanan berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Pesanan gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'tgl_pesan' => $this->put('tgl_pesan'),
            'id_tamu' => $this->put('id_tamu'),
            'jml_kamar' => $this->put('jml_kamar'),
	    'status' => $this->put('status')
        );

        $pesan = $this->TransaksiM->updatePesanan($where, $data);

        if ($pesan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Pesanan berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Pesanan gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $pesan = $this->TransaksiM->deletePesanan($where);

        if ($pesan > 0) {
            $this->response([
                'error' => false,
                'message' => 'Pesanan berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Pesanan gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
