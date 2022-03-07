<?php

use GuzzleHttp\Client;

class AuthM extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/utsMobile/rest-server/api/'
        ]);
    }


    public function cekLogin()
    {
        try {
            $data = array(
                'username' => $this->form_validation->set_value('username'),
                'password' => $this->form_validation->set_value('password')
            );

            $response = $this->_client->request('GET', 'auth', [
                'query' => $data
            ]);

            $result = json_decode($response->getBody()->getContents(), true);
            return $result['user'];
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
