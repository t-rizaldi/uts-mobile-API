<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Checkin extends REST_Controller
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
            $checkin = $this->TransaksiM->getCheckin()->result();
        } else {
            $checkin = $this->TransaksiM->getCheckin($id)->result();
        }

        if ($checkin) {
            $this->response([
                'error' => false,
                'checkin' => $checkin
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Checkin tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_post()
    {
        $data = array(
            'tgl_checkin' => $this->post('tgl_checkin'),
            'id_receptionist' => $this->post('id_receptionist'),
            'id_pesan' => $this->post('id_pesan'),
            'id_kamar' => $this->post('id_kamar'),
            'id_makanan' => $this->post('id_makanan'),
            'biaya' => $this->post('biaya'),
	    'status' => $this->post('status')
        );

        $checkin = $this->TransaksiM->tambahCheckin($data);

        if ($checkin > 0) {
            $this->response([
                'error' => false,
                'message' => 'Checkin berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Checkin gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put()
    {
        $where = array('id' => $this->put('id'));

        $data = array(
            'tgl_checkin' => $this->put('tgl_checkin'),
            'id_receptionist' => $this->put('id_receptionist'),
            'id_pesan' => $this->put('id_pesan'),
            'id_kamar' => $this->put('id_kamar'),
            'id_makanan' => $this->put('id_makanan'),
            'biaya' => $this->put('biaya'),
	    'status' => $this->put('status')
        );

        $checkin = $this->TransaksiM->updateCheckin($where, $data);

        if ($checkin > 0) {
            $this->response([
                'error' => false,
                'message' => 'Checkin berhasil diubah'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Checkin gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete()
    {
        $where = array('id' => $this->delete('id'));

        $checkin = $this->TransaksiM->deleteCheckin($where);

        if ($checkin > 0) {
            $this->response([
                'error' => false,
                'message' => 'Checkin berhasil dihapus'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'error' => true,
                'message' => 'Checkin gagal dihapus'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
