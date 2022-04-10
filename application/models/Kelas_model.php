<?php

use GuzzleHttp\Client;

class Kelas_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/pc-rest-server/',
        ]);;
    }

    public function get_data_kelas($id = null)
    {
        if ($id == null) {
            $result = $this->_client->request('GET', 'kelas', [
                'query' => [
                    'pc_key' => 'aabbccdd',
                ],
            ]);

            $kelas = json_decode($result->getBody()->getContents(), true);
            $kelas = $kelas['data'];
        } else {
            $result = $this->_client->request('GET', 'kelas', [
                'query' => [
                    'pc_key' => 'aabbccdd',
                    'id' => $id,
                ],
            ]);

            $kelas = json_decode($result->getBody()->getContents(), true);
            $kelas = $kelas['data'];
        }

        return $kelas;
    }

    public function insert_data_kelas()
    {
        $result = $this->_client->request('POST', 'kelas', [
            'form_params' => [
                'nama' => $this->input->post('nama', true),
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $kelas = json_decode($result->getBody()->getContents(), true);
        return $kelas;
    }

    public function update_data_kelas()
    {
        $result = $this->_client->request('PUT', 'kelas', [
            'form_params' => [
                'id' => $this->input->post('id', true),
                'nama' => $this->input->post('nama', true),
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $kelas = json_decode($result->getBody()->getContents(), true);
        return $kelas;
    }

    public function delete_data_kelas()
    {
        $result = $this->_client->request('DELETE', 'kelas', [
            'form_params' => [
                'id' => $this->input->post('id', true),
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $kelas = json_decode($result->getBody()->getContents(), true);
        return $kelas;
    }
}
