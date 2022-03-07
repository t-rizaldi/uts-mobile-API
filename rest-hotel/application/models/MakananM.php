<?php

use GuzzleHttp\Client;

class MakananM extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/utsMobile/rest-server/api/'
        ]);
    }

    public function getAllJenisMakanan()
    {

        try {
            $response = $this->_client->request('GET', 'jenis_makanan');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['jenisMakanan'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function tambahJenisMakanan($data)
    {
        $response = $this->_client->request('POST', 'jenis_makanan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function editJenisMakanan($data)
    {
        $response = $this->_client->request('PUT', 'jenis_makanan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusJenisMakanan($where)
    {
        $response = $this->_client->request('DELETE', 'jenis_makanan', [
            'form_params' => $where
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    // Makanan code
    public function getAllMakanan()
    {
        try {
            $response = $this->_client->request('GET', 'makanan');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['makanan'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function tambahmakanan($data)
    {
        $response = $this->_client->request('POST', 'makanan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function editMakanan($data)
    {
        $response = $this->_client->request('PUT', 'makanan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function hapusMakanan($where)
    {
        $response = $this->_client->request('DELETE', 'makanan', [
            'form_params' => $where
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}
