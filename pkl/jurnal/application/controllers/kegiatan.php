<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kegiatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('kegiatan_model');
    }

    public function kegiatanuser()
    {
        $id_user = $_SESSION['id_user'];
        $data['kegiatan'] = $this->kegiatan_model->getAllKegiatanByIDUser($id_user);
        $this->load->view('kegiatan/kegiatanuser', $data);
    }

    public function tambahdatakegiatanuser()
    {
        $this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'required');
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('kegiatan/kegiatantambahuser');
        } else {
            $this->kegiatan_model->tambahdatakegiatanuser();
            $data['tambah_kegiatan_user'] = 'success';
            $this->load->view('kegiatan/kegiatantambahuser', $data);
        }
    }

    public function editdatakegiatanuser($id)
    {
        $data['kegiatan'] = $this->kegiatan_model->getKegiatanByID($id);
        $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('kegiatan/kegiatanedituser', $data);
        } else {
            $this->kegiatan_model->editdatakegiatanuser($id);
            $data['edit_kegiatan_user'] = 'success';
            $this->load->view('kegiatan/kegiatanedituser', $data);
        }
    }

    public function hapusdatakegiatanuser($id)
    {
        $this->kegiatan_model->hapusdatakegiatanuser($id);
        redirect('kegiatan/kegiatanuser', 'refresh');
    }

    public function kegiatanadminins()
    {
        $data['kegiatan'] = $this->kegiatan_model->innerJoinKegiatanandUserandUserDetail();
        $this->load->view('kegiatan/kegiatanadminins', $data);
    }

    public function kegiatanjuli2021adminins()
    {
        $data['kegiatan'] = $this->kegiatan_model->getKegiatanJuli2021AdminIns();
        $this->load->view('kegiatan/kegiatanjuli2021adminins', $data);
    }

    public function kegiatanagt2021adminins()
    {
        $data['kegiatan'] = $this->kegiatan_model->getKegiatanAgt2021AdminIns();
        $this->load->view('kegiatan/kegiatanagt2021adminins', $data);
    }

    public function kegiatanadmin()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        $this->load->view('kegiatan/kegiatanadmin', $data);
    }

    public function kegiatanadminperins($id)
    {
        $data['kegiatan'] = $this->kegiatan_model->innerJoinKegiatanandUserandUserDetailAdmin($id);
        $this->load->view('kegiatan/kegiatanadminperins', $data);
    }
}
