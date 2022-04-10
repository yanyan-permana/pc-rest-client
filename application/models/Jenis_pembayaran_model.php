<?php

use GuzzleHttp\Client;

class Jenis_pembayaran_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/pc-rest-server/',
        ]);;
    }

    public function get_data_jenis_pembayaran($id = null)
    {
        if ($id == null) {
            $result = $this->_client->request('GET', 'jenis_pembayaran', [
                'query' => [
                    'pc_key' => 'aabbccdd',
                ],
            ]);

            $jenis_pembayaran = json_decode($result->getBody()->getContents(), true);
            $jenis_pembayaran = $jenis_pembayaran['data'];
        } else {
            $result = $this->_client->request('GET', 'jenis_pembayaran', [
                'query' => [
                    'pc_key' => 'aabbccdd',
                    'id' => $id,
                ],
            ]);

            $jenis_pembayaran = json_decode($result->getBody()->getContents(), true);
            $jenis_pembayaran = $jenis_pembayaran['data'];
        }

        return $jenis_pembayaran;
    }

    public function insert_data_jenis_pembayaran()
    {
        $biaya = explode('.', $this->input->post('biaya', true));
        $biaya1 = null;
        foreach ($biaya as $key => $value) {
            // echo $value . '<br>';
            $biaya1 .= $value;
        }

        $result = $this->_client->request('POST', 'jenis_pembayaran', [
            'form_params' => [
                'kelas_id' => $this->input->post('kelas_id', true),
                'nama' => $this->input->post('nama', true),
                'biaya' => $biaya1,
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $jenis_pembayaran = json_decode($result->getBody()->getContents(), true);
        return $jenis_pembayaran;
    }

    public function update_data_jenis_pembayaran()
    {
        $biaya = explode('.', $this->input->post('biaya', true));
        $biaya1 = null;
        foreach ($biaya as $key => $value) {
            // echo $value . '<br>';
            $biaya1 .= $value;
        }
        $result = $this->_client->request('PUT', 'jenis_pembayaran', [
            'form_params' => [
                'id' => $this->input->post('id', true),
                'kelas_id' => $this->input->post('kelas_id', true),
                'nama' => $this->input->post('nama', true),
                'biaya' => $biaya1,
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $jenis_pembayaran = json_decode($result->getBody()->getContents(), true);
        return $jenis_pembayaran;
    }

    public function delete_data_jenis_pembayaran()
    {
        $result = $this->_client->request('DELETE', 'jenis_pembayaran', [
            'form_params' => [
                'id' => $this->input->post('id', true),
                'pc_key' => 'aabbccdd',
            ]
        ]);

        $jenis_pembayaran = json_decode($result->getBody()->getContents(), true);
        return $jenis_pembayaran;
    }
}
