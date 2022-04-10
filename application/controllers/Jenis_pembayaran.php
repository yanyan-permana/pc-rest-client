<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(['jenis_pembayaran_model', 'kelas_model']);
    }

    public function index()
    {
        $jenis_pembayaran = $this->jenis_pembayaran_model->get_data_jenis_pembayaran();

        $data['title'] = 'Jenis Pembayaran';
        $data['jenis_pembayaran'] = $jenis_pembayaran;

        $this->load->view('templates/header', $data);
        $this->load->view('jenis_pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Jenis Pembayaran';
        $data['kelas'] = $this->kelas_model->get_data_kelas();
        $data['error_kelas_id'] = '';
        $data['error_nama'] = '';
        $data['error_biaya'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('jenis_pembayaran/create', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $result = $this->jenis_pembayaran_model->insert_data_jenis_pembayaran();

        if ($result['status'] == true) {
            $this->session->set_flashdata('pesan_sukses', $result['message']);
            redirect('/jenis_pembayaran');
        } else {
            $data['title'] = 'Jenis Pembayaran';
            $data['kelas'] = $this->kelas_model->get_data_kelas();
            $data['error_kelas_id'] = $result['kelas_id'];
            $data['error_nama'] = $result['nama'];
            $data['error_biaya'] = $result['biaya'];

            $this->load->view('templates/header', $data);
            $this->load->view('jenis_pembayaran/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($id)
    {
        $jenis_pembayaran = $this->jenis_pembayaran_model->get_data_jenis_pembayaran($id);
        $data['title'] = 'Jenis Pembayaran';
        $data['kelas'] = $this->kelas_model->get_data_kelas();
        $data['jenis_pembayaran'] = $jenis_pembayaran;
        $data['error_kelas_id'] = '';
        $data['error_nama'] = '';
        $data['error_biaya'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('jenis_pembayaran/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $result = $this->jenis_pembayaran_model->update_data_jenis_pembayaran();

        if ($result['status'] == true) {
            $this->session->set_flashdata('pesan_sukses', $result['message']);
            redirect('/jenis_pembayaran');
        } else {
            $data['title'] = 'Jenis Pembayaran';
            $data['kelas'] = $this->kelas_model->get_data_kelas();
            $data['error_kelas_id'] = $result['kelas_id'];
            $data['error_nama'] = $result['nama'];
            $data['error_biaya'] = $result['biaya'];

            $this->load->view('templates/header', $data);
            $this->load->view('jenis_pembayaran/edit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete()
    {
        $result = $this->jenis_pembayaran_model->delete_data_jenis_pembayaran();

        var_dump($result);
        die;

        redirect('/jenis_pembayaran');
    }
}
