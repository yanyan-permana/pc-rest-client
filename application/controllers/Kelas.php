<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kelas_model');
    }

    public function index()
    {
        $kelas = $this->kelas_model->get_data_kelas();

        $data['title'] = 'Kelas';
        $data['kelas'] = $kelas;

        $this->load->view('templates/header', $data);
        $this->load->view('kelas/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Kelas';
        $data['error_nama'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('kelas/create', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $result = $this->kelas_model->insert_data_kelas();

        if ($result['status'] == true) {
            $this->session->set_flashdata('pesan_sukses', $result['message']);
            redirect('/kelas');
        } else {
            $data['title'] = 'Kelas';
            $data['error_nama'] = $result['nama'];

            $this->load->view('templates/header', $data);
            $this->load->view('kelas/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($id)
    {
        $kelas = $this->kelas_model->get_data_kelas($id);
        $data['title'] = 'Kelas';
        $data['kelas'] = $kelas;
        $data['error_nama'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('kelas/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $result = $this->kelas_model->update_data_kelas();

        if ($result['status'] == true) {
            $this->session->set_flashdata('pesan_sukses', $result['message']);
            redirect('/kelas');
        } else {
            $data['title'] = 'Kelas';
            $data['error_nama'] = $result['nama'];

            $this->load->view('templates/header', $data);
            $this->load->view('kelas/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete()
    {
        $result = $this->kelas_model->delete_data_kelas();

        redirect('/kelas');
    }
}
