<?php

use GuzzleHttp\Client;

class PeopleM extends CI_Model
{
    private $_client;

    public function __construct()
    {
        parent::__construct();

        $this->_client = new Client([
            'base_uri' => 'http://localhost/utsMobile/rest-server/api/'
        ]);
    }

    public function getAllRecep()
    {
        try {
            $response = $this->_client->request('GET', 'recep');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['recep'];
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function tambahRecep($data)
    {
        $response = $this->_client->request('POST', 'recep', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function editRecep($data)
    {
        $response = $this->_client->request('PUT', 'recep', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusRecep($data)
    {
        $response = $this->_client->request('DELETE', 'recep', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function getAllUser()
    {
        try {
            $response = $this->_client->request('GET', 'user');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['user'];
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function tambahUser($data)
    {
        $response = $this->_client->request('POST', 'user', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function editUser($data)
    {
        $response = $this->_client->request('PUT', 'user', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusUser($where)
    {
        $response = $this->_client->request('DELETE', 'user', [
            'form_params' => $where
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}
