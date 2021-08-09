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
        $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        $this->load->view('divisi/tambah', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('idinstansi', 'ID Instansi', 'required');
        $this->form_validation->set_rules('namadivisi', 'Nama Divisi', 'required');
        $this->form_validation->set_rules('deskripsidivisi', 'Deskripsi Divisi', 'required');
        $this->form_validation->set_rules('telpdivisi', 'Telepon Divisi', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
            $this->load->view('divisi/tambah', $data);
        } else {
            $this->divisi_model->tambah();
            redirect('user');
        }
    }

    public function divisiadminins()
    {
        $id_instansi = $_SESSION['id_instansi'];
        $data['divisi'] = $this->divisi_model->innerJoinDivisiandInstansi($id_instansi);
        $this->load->view('divisi/divisiadminins', $data);
    }

    public function tambahdatadivisiadminins()
    {
        $this->form_validation->set_rules('nama_divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('deskripsi_divisi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('telp_divisi', 'Telp', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('divisi/divisitambahadminins');
        } else {
            $this->divisi_model->tambahdatadivisiadminins();
            $data['tambah_divisi_adminins'] = 'success';
            $this->load->view('divisi/divisitambahadminins', $data);
        }
    }

    public function editdatadivisiadminins($id)
    {
        $data['divisi'] = $this->divisi_model->getDivisiByIDDivisi($id);
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nama_divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('deskripsi_divisi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('telp_divisi', 'Telp', 'required');
        // if (empty($_FILES['foto']['name'])) {
        //     $this->form_validation->set_rules('foto', 'Foto', 'required');
        // }
        // $data['tambah_admin_ins_admin'] = 'failed';

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('divisi/divisieditadminins', $data);
            // var_dump($data['divisi']);
            // print $data['divisi']['id_divisi'];
        } else {
            $this->divisi_model->editdatadivisiadminins($id);
            $data['edit_divisi_adminins'] = 'success';
            $this->load->view('divisi/divisieditadminins', $data);
            // redirect('user/useradminins', 'refresh');
        }
    }

    public function hapusdatadivisiadminins($id)
    {
        $this->divisi_model->hapusdatadivisiadminins($id);
        redirect('divisi/divisiadminins', 'refresh');
    }
}
