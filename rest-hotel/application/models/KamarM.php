<?php

use GuzzleHttp\Client;

class KamarM extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/utsMobile/rest-server/api/'
        ]);
    }

    // Jenis Kamar Code
    public function getAllJenisKamar()
    {

        try {
            $response = $this->_client->request('GET', 'jenis_kamar');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['jenisKamar'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getJenisKamarById($id)
    {
        $response = $this->_client->request('GET', 'jenis_kamar', [
            'query' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result['jenisKamar'][0]['jenis_kamar'];
    }

    public function tambahJenisKamar($data)
    {
        $response = $this->_client->request('POST', 'jenis_kamar', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function editJenisKamar($data)
    {
        $response = $this->_client->request('PUT', 'jenis_kamar', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusJenisKamar($id)
    {
        $response = $this->_client->request('DELETE', 'jenis_kamar', [
            'form_params' => [
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    // Kamar Code
    public function getAllKamar()
    {

        try {
            $response = $this->_client->request('GET', 'kamar');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['kamar'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function tambahKamar($data)
    {
        $response = $this->_client->request('POST', 'kamar', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function editKamar($data)
    {
        $response = $this->_client->request('PUT', 'kamar', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function hapusKamar($where)
    {
        $response = $this->_client->request('DELETE', 'kamar', [
            'form_params' => $where
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}
