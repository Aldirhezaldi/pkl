<?php
defined('BASEPATH') or exit('No direct script access allowed');

class divisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('divisi_model');
    }

    public function index()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllInstansi();
        $this->load->view('divisi/tambah', $data);
    }

    public function tambah()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('idinstansi', 'ID Instansi', 'required');
        $this->form_validation->set_rules('namadivisi', 'Nama Divisi', 'required');
        $this->form_validation->set_rules('deskripsidivisi', 'Deskripsi Divisi', 'required');
        $this->form_validation->set_rules('telpdivisi', 'Telepon Divisi', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllInstansi();
            $this->load->view('divisi/tambah', $data);
            // $this->load->view('divisi/tambah');
        } else {
            $this->divisi_model->tambah();
            redirect('user');
        }
    }
}
