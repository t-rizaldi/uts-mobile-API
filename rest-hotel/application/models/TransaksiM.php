<?php

use GuzzleHttp\Client;

class TransaksiM extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/utsMobile/rest-server/api/'
        ]);
    }

    public function getAllPesanan()
    {

        try {
            $response = $this->_client->request('GET', 'pesanan');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['pesanan'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function hapusPesanan($where)
    {
        $response = $this->_client->request('DELETE', 'pesanan', [
            'form_params' => $where
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function updatePesanan($pesanan)
    {
        $response = $this->_client->request('PUT', 'pesanan', [
            'form_params' => $pesanan
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function inputCheckin($data)
    {
        $response = $this->_client->request('POST', 'checkin', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    // Checkin Code
    public function getAllCheckin()
    {
        try {
            $response = $this->_client->request('GET', 'checkin');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['checkin'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateCheckin($checkin)
    {
        $response = $this->_client->request('PUT', 'checkin', [
            'form_params' => $checkin
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    public function checkout($data)
    {
        $response = $this->_client->request('POST', 'checkout', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }


    // Checkout Code
    public function getAllCheckout()
    {
        try {
            $response = $this->_client->request('GET', 'checkout');
            $result = json_decode($response->getBody()->getContents(), true);
            return $result['checkout'];
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
