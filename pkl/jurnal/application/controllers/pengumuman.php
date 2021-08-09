<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pengumuman_model');
    }

    public function pengumumanadminins()
    {
        $id_instansi = $_SESSION['id_instansi'];
        $data['pengumuman'] = $this->pengumuman_model->getAllPengumumanByIDIns($id_instansi);
        // var_dump($data['kegiatan']);
        $this->load->view('pengumuman/pengumumanadminins', $data);
    }

    public function tambahdatapengumumanadminins()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('tanggal_pengumuman', 'Tanggal Pengumuman', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        // $data['tambah_admin_ins_admin'] = 'failed';

        if ($this->form_validation->run() == FALSE) {
            // $data['tambah_admin_ins_admin'] = 'failed';
            $this->load->view('pengumuman/pengumumantambahadminins');
        } else {
            $this->pengumuman_model->tambahdatapengumumanadminins();
            $data['tambah_pengumuman_adminins'] = 'success';
            $this->load->view('pengumuman/pengumumantambahadminins', $data);
            // redirect('user/useradmin');
        }
    }

    public function editdatapengumumanadminins($id)
    {
        $data['pengumuman'] = $this->pengumuman_model->getPengumumanByID($id);
        
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pengumuman/pengumumaneditadminins', $data);
        } else {
            $this->pengumuman_model->editdatapengumumanadminins($id);
            $data['edit_pengumuman_adminins'] = 'success';
            $this->load->view('pengumuman/pengumumaneditadminins', $data);
        }
    }

    public function hapusdatapengumumanadminins($id)
    {
        $this->pengumuman_model->hapusdatapengumumanadminins($id);
        redirect('pengumuman/pengumumanadminins', 'refresh');
    }

    public function pengumumanuser()
    {
        $id_instansi = $_SESSION['id_instansi'];
        $data['pengumuman'] = $this->pengumuman_model->getAllPengumumanByIDUser($id_instansi);
        // var_dump($data['kegiatan']);
        $this->load->view('pengumuman/pengumumanuser', $data);
    }

    public function pengumumanadmin()
    {
        // $id_user = $_SESSION['id_user'];
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        // var_dump($data['kegiatan']);
        $this->load->view('pengumuman/pengumumanadmin', $data);
    }

    public function pengumumanadminperins($id)
    {
        // $id_user = $_SESSION['id_user'];
        // $this->load->model('instansi_model');
        $data['pengumuman'] = $this->pengumuman_model->getAllPengumumanByIDIns($id);
        // $data['kegiatan'] = $this->kegiatan_model->getAllKegiatanByIDUser($id_user);
        // var_dump($data['kegiatan']);
        $this->load->view('pengumuman/pengumumanadminperins', $data);
    }
}
