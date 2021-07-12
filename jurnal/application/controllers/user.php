<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function index()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllInstansi();
        $this->load->model('divisi_model');
        $data['divisi'] = $this->divisi_model->getAllDivisi();
        $this->load->view('user/tambah', $data);
    }

    public function tambah()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('idinstansi', 'ID Instansi', 'required');
        $this->form_validation->set_rules('iddivisi', 'ID Divisi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('namauser', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggalregistrasi', 'Tanggal Registrasi', 'required');
        $this->form_validation->set_rules('periodemulai', 'Periode Mulai', 'required');
        $this->form_validation->set_rules('periodeselesai', 'Periode Selesai', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllInstansi();
            $this->load->model('divisi_model');
            $data['divisi'] = $this->divisi_model->getAllDivisi();
            $this->load->view('user/tambah', $data);
            // $this->load->view('user/tambah');
            // redirect('user');
        } else {
            $this->user_model->tambah();
            redirect('user/login');
        }
    }

    public function login()
    {
        $this->load->view('user/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user/login', 'refresh');
    }

    public function dashboardadmin()
    {
        $this->load->view('user/dashboardadmin');
    }

    public function dashboarduser()
    {
        $this->load->view('user/dashboarduser');
    }

    public function proses_login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        // var_dump($email);

        $ceklogin = $this->user_model->login($email, $password);
        // var_dump($ceklogin);
        if ($ceklogin) {
            foreach ($ceklogin as $row) {
                $this->session->set_userdata('nama', $row['nama_user']);
                $this->session->set_userdata('email', $row['email']);
                $this->session->set_userdata('foto', $row['foto']);
                $this->session->set_userdata('tipe_foto', $row['tipe_foto']);
                $level = $row['level'];
                if ($level == 1) {
                    $this->session->set_userdata('level', 'Admin');
                } elseif ($level == 2) {
                    $this->session->set_userdata('level', 'User');
                }
                if ($this->session->userdata('level') == "Admin") {
                    redirect('user/dashboardadmin');
                } elseif ($this->session->userdata('level') == "User") {
                    redirect('user/dashboarduser');
                }
            }
        } else {
            $data['pesan'] = "username dan password anda salah";
            $this->load->view('user/login', $data);
            // redirect('user/login', 'refresh');
        }
    }
}
