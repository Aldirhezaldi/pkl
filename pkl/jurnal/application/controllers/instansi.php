<?php
defined('BASEPATH') or exit('No direct script access allowed');

class instansi extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('instansi_model');
    }

    public function index()
    {
        $data['instansi'] = $this->db->get('instansi');
        $this->load->view('user/instansiadmin', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('namainstansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('deskripsiinstansi', 'Deskripsi Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|numeric');
        if (empty($_FILES['logo']['name'])) {
            $this->form_validation->set_rules('logo', 'Logo', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('instansi/tambah');
        } else {
            $this->instansi_model->tambah();
            $data['tambah_instansi'] = 'success';
            $this->load->view('instansi/tambah', $data);
        }
    }

    public function editstatus($id)
    {
        $data['instansi'] = $this->instansi_model->getInstansiByID($id);
        $data['status'] = ['diterima', 'ditolak'];
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/editstatus', $data);
        } else {
            $this->instansi_model->editstatusinstansi();
            redirect('instansi', 'refresh');
        }
    }

    public function tambahdata()
    {
        $this->form_validation->set_rules('namainstansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('deskripsiinstansi', 'Deskripsi Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|numeric');
        if (empty($_FILES['logo']['name'])) {
            $this->form_validation->set_rules('logo', 'Logo', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/instansitambahadmin');
        } else {
            $this->instansi_model->tambahdata();
            redirect('instansi');
        }
    }

    public function hapusdata($id)
    {
        $this->instansi_model->hapusdata($id);
        redirect('instansi', 'refresh');
    }

    public function editdata($id)
    {
        $data['instansi'] = $this->instansi_model->getInstansiByID($id);
        $this->form_validation->set_rules('namainstansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('deskripsiinstansi', 'Deskripsi Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/instansieditadmin', $data);
        } else {
            $this->instansi_model->editdatainstansi($id);
            redirect('instansi', 'refresh');
        }
    }
}
