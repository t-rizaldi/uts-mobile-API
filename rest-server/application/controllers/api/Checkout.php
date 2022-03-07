<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Checkout extends REST_Controller
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
            $checkout = $this->TransaksiM->getCheckout()->result();
        } else {
            $checkout = $this->TransaksiM->getCheckout($id)->result();
        }

        if ($checkout) {
            $this->response([
                'error' => false,
                'checkout' => $checkout
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Checkout tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'id_checkin' => $this->post('id_checkin'),
            'tgl_checkout' => $this->post('tgl_checkout'),
            'total_bayar' => $this->post('total_bayar')
        );

        $checkout = $this->TransaksiM->tambahCheckout($data);

        if ($checkout > 0) {
            $this->response([
                'error' => false,
                'message' => 'Checkout berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Checkout gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'id_checkin' => $this->put('id_checkin'),
            'tgl_checkout' => $this->put('tgl_checkout'),
            'total_bayar' => $this->put('total_bayar')
        );

        $checkout = $this->TransaksiM->updateCheckout($where, $data);

        if ($checkout > 0) {
            $this->response([
                'error' => false,
                'message' => 'Checkout berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Checkout gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $checkout = $this->TransaksiM->deleteCheckout($where);

        if ($checkout > 0) {
            $this->response([
                'error' => false,
                'message' => 'Checkout berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Checkout gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
