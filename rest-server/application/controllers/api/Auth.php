<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserM');
    }


    public function index_get()
    {
        $username = $this->get('username');
        $password = $this->get('password');

        $user = $this->UserM->cekLogin($username, $password)->result();

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
}
