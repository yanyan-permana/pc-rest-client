<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Angkatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('angkatan_model');
    }

    public function index()
    {
        $angkatan = $this->angkatan_model->get_data_angkatan();

        $data['title'] = 'Angkatan';
        $data['angkatan'] = $angkatan;

        $this->load->view('templates/header', $data);
        $this->load->view('angkatan/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Angkatan';
        $data['error_tahun'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('angkatan/create', $data);
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $result = $this->angkatan_model->insert_data_angkatan();

        if ($result['status'] == true) {
            $this->session->set_flashdata('pesan_sukses', $result['message']);
            redirect('/angkatan');
        } else {
            $data['title'] = 'Angkatan';
            $data['error_tahun'] = $result['tahun'];

            $this->load->view('templates/header', $data);
            $this->load->view('angkatan/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function edit($id)
    {
        $angkatan = $this->angkatan_model->get_data_angkatan($id);
        $data['title'] = 'Angkatan';
        $data['angkatan'] = $angkatan;
        $data['error_tahun'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('angkatan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $result = $this->angkatan_model->update_data_angkatan();

        if ($result['status'] == true) {
            $this->session->set_flashdata('pesan_sukses', $result['message']);
            redirect('/angkatan');
        } else {
            $data['title'] = 'Angkatan';
            $data['error_tahun'] = $result['tahun'];

            $this->load->view('templates/header', $data);
            $this->load->view('angkatan/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function delete()
    {
        $result = $this->angkatan_model->delete_data_angkatan();

        redirect('/angkatan');
    }
}
