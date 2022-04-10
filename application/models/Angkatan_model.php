<?php

use GuzzleHttp\Client;

class Angkatan_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/pc-rest-server/',
        ]);;
    }

    public function get_data_angkatan($id = null)
    {
        if ($id == null) {
            $result = $this->_client->request('GET', 'angkatan', [
                'query' => [
                    'pc_key' => 'aabbccdd',
                ],
            ]);

            $angkatan = json_decode($result->getBody()->getContents(), true);
            $angkatan = $angkatan['data'];
        } else {
            $result = $this->_client->request('GET', 'angkatan', [
                'query' => [
                    'pc_key' => 'aabbccdd',
                    'id' => $id,
                ],
            ]);

            $angkatan = json_decode($result->getBody()->getContents(), true);
            $angkatan = $angkatan['data'];
        }

        return $angkatan;
    }

    public function insert_data_angkatan()
    {
        $result = $this->_client->request('POST', 'angkatan', [
            'form_params' => [
                'tahun' => $this->input->post('tahun', true),
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $angkatan = json_decode($result->getBody()->getContents(), true);
        return $angkatan;
    }

    public function update_data_angkatan()
    {
        $result = $this->_client->request('PUT', 'angkatan', [
            'form_params' => [
                'id' => $this->input->post('id', true),
                'tahun' => $this->input->post('tahun', true),
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $angkatan = json_decode($result->getBody()->getContents(), true);
        return $angkatan;
    }

    public function delete_data_angkatan()
    {
        $result = $this->_client->request('DELETE', 'angkatan', [
            'form_params' => [
                'id' => $this->input->post('id', true),
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $angkatan = json_decode($result->getBody()->getContents(), true);
        return $angkatan;
    }
}
