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
        // $this->load->model('instansi_model');
        // $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        // $this->load->model('divisi_model');
        // $data['divisi'] = $this->divisi_model->getAllDivisi();
        $this->load->view('user/tambah');
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

    public function tambahuser()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('namauser', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggalregistrasi', 'Tanggal Registrasi', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/tambah');
        } else {
            $this->user_model->tambahuser();
            redirect('user/tambahusernext');
        }
    }

    public function tambahusernext()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        $this->load->model('divisi_model');
        $data['divisi'] = $this->divisi_model->getAllDivisi();
        $this->load->view('user/tambahusernext', $data);
    }

    public function tambahusernextinsert()
    {
        $this->form_validation->set_rules('idinstansi', 'Asal Instansi', 'required');
        $this->form_validation->set_rules('iddivisi', 'Nama Divisi', 'required');
        $this->form_validation->set_rules('periodemulai', 'Periode Mulai', 'required');
        $this->form_validation->set_rules('periodeselesai', 'Periode Selesai', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
            $this->load->model('divisi_model');
            $data['divisi'] = $this->divisi_model->getAllDivisi();
            $this->load->view('user/tambahusernext', $data);
        } else {
            $data['user'] = $this->user_model->getLastInsertedUserID();
            $id_user = $data['user'][0]['last_inserted'];
            $this->user_model->tambahuserdetail($id_user);
            redirect('user/login');
        }
    }

    public function tambahuserinstansi()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('namauser', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggalregistrasi', 'Tanggal Registrasi', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/tambahuserinstansi');
        } else {
            $this->user_model->tambahuserinstansi();
            redirect('user/tambahuserinstansinext');
        }
    }

    public function tambahuserinstansinext()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllInstansi();
        $this->load->view('user/tambahuserinstansinext', $data);
    }

    public function tambahuserinstansinextinsert()
    {
        $this->form_validation->set_rules('idinstansi', 'Asal Instansi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllInstansi();
            $this->load->view('user/tambahuserinstansinext', $data);
        } else {
            $data['user'] = $this->user_model->getLastInsertedUserID();
            $id_user = $data['user'][0]['last_inserted'];
            $this->user_model->tambahuserinstansidetail($id_user);
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

    public function dashboardadmininstansi()
    {
        $this->load->view('user/dashboardadmininstansi');
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
                $this->session->set_userdata('id_user', $row['id_user']);
                $this->session->set_userdata('email', $row['email']);
                $this->session->set_userdata('nama', $row['nama_user']);
                $this->session->set_userdata('foto', $row['foto']);
                $this->session->set_userdata('tipe_foto', $row['tipe_foto']);

                $id_user = $_SESSION['id_user'];
                $userdetail = $this->user_model->getUserDetail($id_user);
                if ($userdetail) {
                    foreach ($userdetail as $data) {
                        $this->session->set_userdata('id_instansi', $data['id_instansi']);
                        $this->session->set_userdata('id_divisi', $data['id_divisi']);
                        $id_instansi = $_SESSION['id_instansi'];
                        $this->load->model('instansi_model');
                        $instansi = $this->instansi_model->getInstansiByID($id_instansi);
                        // print $instansi;
                        // var_dump($instansi);
                        // print $instansi['nama_instansi'];
                        if (!empty($instansi)) {
                            $this->session->set_userdata('nama_instansi', $instansi['nama_instansi']);
                        }
                        $this->load->model('divisi_model');
                        $id_divisi = $_SESSION['id_divisi'];
                        $divisi = $this->divisi_model->getDivisiByID($id_divisi);
                        if (!empty($divisi)) {
                            $this->session->set_userdata('nama_divisi', $divisi['nama_divisi']);
                        }
                    }
                }

                $userinstansidetail = $this->user_model->getUserInstansiDetail($id_user);
                if ($userinstansidetail) {
                    foreach ($userinstansidetail as $baris) {
                        $this->session->set_userdata('id_instansi', $baris['id_instansi']);
                        $id_instansi = $_SESSION['id_instansi'];
                        $this->load->model('instansi_model');
                        $instansi = $this->instansi_model->getInstansiByID($id_instansi);
                        if (!empty($instansi)) {
                            $this->session->set_userdata('nama_instansi', $instansi['nama_instansi']);
                        }
                    }
                }

                $level = $row['level'];
                if ($level == 1) {
                    $this->session->set_userdata('level', 'super admin');
                } elseif ($level == 2) {
                    $this->session->set_userdata('level', 'admin instansi');
                } elseif ($level == 3) {
                    $this->session->set_userdata('level', 'user');
                }
                if ($this->session->userdata('level') == "super admin") {
                    $data['login_super_admin'] = "success";
                    $this->load->view('user/login', $data);
                    // redirect('user/dashboardadmin');
                } elseif ($this->session->userdata('level') == "admin instansi") {
                    $data['login_admin_ins'] = "success";
                    $this->load->view('user/login', $data);
                    // redirect('user/dashboardadmininstansi');
                } elseif ($this->session->userdata('level') == "user") {
                    $data['login_user'] = "success";
                    $this->load->view('user/login', $data);
                    // redirect('user/dashboarduser');
                }
            }
        } else {
            $data['pesan'] = "username dan password anda salah";
            $this->load->view('user/login', $data);
            // redirect('user/login', 'refresh');
        }
    }

    public function useradmin()
    {
        $data['user'] = $this->user_model->getAllAdmin();
        $this->load->view('user/useradmin', $data);
    }

    public function editstatusadmin($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        $data['status'] = ['diterima', 'ditolak'];
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/editstatusadmin', $data);
        } else {
            $this->user_model->editstatusadmin();
            redirect('user/useradmin', 'refresh');
        }
    }

    public function editdataadmin($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        // $data['level'] = ['1', '2', '3'];
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/useradmineditadmin', $data);
        } else {
            $this->user_model->editdataadmin($id);
            redirect('user/useradmin', 'refresh');
        }
    }

    public function tambahdataadmin()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/usertambahadmin');
        } else {
            $this->user_model->tambahdataadmin();
            redirect('user/useradmin');
        }
    }

    public function hapusdataadmin($id)
    {
        $this->user_model->hapusdataadmin($id);
        redirect('user/useradmin', 'refresh');
    }

    public function useradmininstansiadmin()
    {
        $data['user'] = $this->user_model->getAllAdminInstansi();
        $this->load->view('user/useradminins', $data);
    }

    public function detaildataadmininsadmin($id)
    {
        $id_instansi = $this->user_model->getDetailAdminInstansi($id);
        $dataidinstansi = $id_instansi[0]['id_instansi'];
        $this->load->model('instansi_model');
        $data['user_instansi_detail'] = $this->instansi_model->getInstansiByID($dataidinstansi);
        $data['user'] = $this->user_model->getUserByID($id);
        $this->load->view('user/useradmininsdetailadmin', $data);
    }

    public function editdataadmininsadmin($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        // $data['level'] = ['1', '2', '3'];
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/useradmininseditadmin', $data);
        } else {
            $this->user_model->editdataadmin($id);
            redirect('user/useradmininstansiadmin', 'refresh');
        }
    }

    public function editstatusadmininsadmin($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        $data['status'] = ['diterima', 'ditolak'];
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/editstatusadmininsadmin', $data);
        } else {
            $this->user_model->editstatusadmin();
            redirect('user/useradmininstansiadmin', 'refresh');
        }
    }

    public function hapusdataadmininsadmin($id)
    {
        $this->user_model->hapusdataadmininsadmin($id);
        redirect('user/useradmininstansiadmin', 'refresh');
    }

    public function tambahdataadmininsadmin()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        // $data['tambah_admin_ins_admin'] = 'failed';

        if ($this->form_validation->run() == FALSE) {
            // $data['tambah_admin_ins_admin'] = 'failed';
            $this->load->view('user/usertambahadmininsadmin');
        } else {
            $this->user_model->tambahdataadmininsadmin();
            $data['tambah_admin_ins_admin'] = 'success';
            $this->load->view('user/usertambahadmininsadmin', $data);
            // redirect('user/useradmin');
        }
    }

    public function tambahdataadmininsadminnext()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        $this->load->view('user/usertambahadmininsadminnext', $data);
    }

    public function tambahdataadmininsadminnextinsert()
    {
        $this->form_validation->set_rules('idinstansi', 'Asal Instansi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
            $this->load->view('user/usertambahadmininsadminnext', $data);
        } else {
            $data['user'] = $this->user_model->getLastInsertedUserID();
            $id_user = $data['user'][0]['last_inserted'];
            $this->user_model->tambahuserinstansiadmindetail($id_user);
            $data['tambah_admin_ins_admin_next'] = 'success';
            $this->load->view('user/usertambahadmininsadminnext', $data);
            // redirect('user/login');
        }
    }

    public function user()
    {
        $data['user'] = $this->user_model->getAllUser();
        $this->load->view('user/user', $data);
    }

    public function detaildatauseradmin($id)
    {
        $data['user_detail'] = $this->user_model->getUserDetail($id);
        // var_dump($data['user_detail'][0]);
        // print $data['user_detail'][0]['id_user'];
        $id_instansi = $data['user_detail'][0]['id_instansi'];
        $id_divisi = $data['user_detail'][0]['id_divisi'];
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getInstansiByID($id_instansi);
        // var_dump($data['instansi']);
        $this->load->model('divisi_model');
        $data['divisi'] = $this->divisi_model->getDivisiByID($id_divisi);
        $data['user'] = $this->user_model->getUserByID($id);
        $this->load->view('user/useruserdetailadmin', $data);
    }

    public function editdatauseradmin($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        // $data['level'] = ['1', '2', '3'];
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/userusereditadmin', $data);
        } else {
            $this->user_model->editdatauseradmin($id);
            redirect('user/user', 'refresh');
        }
    }

    public function editstatususeradmin($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        $data['status'] = ['diterima', 'ditolak'];
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/editstatususeradmin', $data);
        } else {
            $this->user_model->editstatususeradmin();
            redirect('user/user', 'refresh');
        }
    }

    public function tambahdatauseradmin()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        // $data['tambah_admin_ins_admin'] = 'failed';

        if ($this->form_validation->run() == FALSE) {
            // $data['tambah_admin_ins_admin'] = 'failed';
            $this->load->view('user/usertambahuseradmin');
        } else {
            $this->user_model->tambahdatauseradmin();
            $data['tambah_user_admin'] = 'success';
            $this->load->view('user/usertambahuseradmin', $data);
            // redirect('user/useradmin');
        }
    }

    public function tambahdatauseradminnext()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        $this->load->model('divisi_model');
        $data['divisi'] = $this->divisi_model->getAllDivisi();
        $this->load->view('user/usertambahuseradminnext', $data);
    }

    public function tambahdatauseradminnextinsert()
    {
        $this->form_validation->set_rules('idinstansi', 'Asal Instansi', 'required');
        $this->form_validation->set_rules('iddivisi', 'Asal Divisi', 'required');
        $this->form_validation->set_rules('periode_mulai', 'Periode Mulai', 'required');
        $this->form_validation->set_rules('periode_selesai', 'Periode Selesai', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
            $this->load->model('divisi_model');
            $data['divisi'] = $this->divisi_model->getAllDivisi();
            $this->load->view('user/usertambahuseradminnext', $data);
        } else {
            $data['user'] = $this->user_model->getLastInsertedUserID();
            $id_user = $data['user'][0]['last_inserted'];
            $this->user_model->tambahuseradmindetail($id_user);
            $data['tambah_user_admin_next'] = 'success';
            $this->load->view('user/usertambahuseradminnext', $data);
            // redirect('user/login');
        }
    }

    public function hapusdatauseradmin($id)
    {
        $this->user_model->hapusdatauseradmin($id);
        redirect('user/user', 'refresh');
    }

    public function useradmininsadminins()
    {
        $data['user'] = $this->user_model->innerJoinUserandUserInsDetail();
        $this->load->view('user/useradmininsadminins', $data);
    }

    public function detaildataadmininsadminins($id)
    {
        $data['user_detail'] = $this->user_model->getDetailAdminInstansi($id);
        $id_instansi = $data['user_detail'][0]['id_instansi'];
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getInstansiByID($id_instansi);
        $data['user'] = $this->user_model->getUserByID($id);
        $this->load->view('user/useradmininsdetailadminins', $data);
    }

    public function editdataadmininsadminins($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        // $data['level'] = ['1', '2', '3'];
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/useradmininseditadminins', $data);
        } else {
            $this->user_model->editdataadmininsadminins($id);
            redirect('user/useradmininsadminins', 'refresh');
        }
    }

    public function editstatusadmininsadminins($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        $data['status'] = ['diterima', 'ditolak'];
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/editstatusadmininsadminins', $data);
        } else {
            $this->user_model->editstatusadmininsadminins();
            redirect('user/useradmininsadminins', 'refresh');
        }
    }

    public function tambahdataadmininsadminins()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        // $data['tambah_admin_ins_admin'] = 'failed';

        if ($this->form_validation->run() == FALSE) {
            // $data['tambah_admin_ins_admin'] = 'failed';
            $this->load->view('user/usertambahadmininsadminins');
        } else {
            $this->user_model->tambahdataadmininsadminins();
            $data['tambah_admin_ins_admin_ins'] = 'success';
            $this->load->view('user/usertambahadmininsadminins', $data);
            // redirect('user/useradmin');
        }
    }

    public function tambahdataadmininsadmininsnext()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        $this->load->view('user/usertambahadmininsadmininsnext', $data);
    }

    public function tambahdataadmininsadmininsnextinsert()
    {
        $this->form_validation->set_rules('idinstansi', 'Asal Instansi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
            $this->load->view('user/usertambahadmininsadmininsnext', $data);
        } else {
            $data['user'] = $this->user_model->getLastInsertedUserID();
            $id_user = $data['user'][0]['last_inserted'];
            $this->user_model->tambahadmininsadmininsdetail($id_user);
            $data['tambah_admin_ins_admin_ins_next'] = 'success';
            $this->load->view('user/usertambahadmininsadmininsnext', $data);
            // redirect('user/login');
        }
    }

    public function hapusdataadmininsadminins($id)
    {
        $this->user_model->hapusdataadmininsadminins($id);
        redirect('user/useradmininsadminins', 'refresh');
    }

    public function useradminins()
    {
        $data['user'] = $this->user_model->innerJoinUserandUserDetail();
        $this->load->view('user/useruseradminins', $data);
    }

    public function detaildatauseradminins($id)
    {
        $data['user_detail'] = $this->user_model->getUserDetail($id);
        $id_instansi = $data['user_detail'][0]['id_instansi'];
        $id_divisi = $data['user_detail'][0]['id_divisi'];
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getInstansiByID($id_instansi);
        $this->load->model('divisi_model');
        $data['divisi'] = $this->divisi_model->getDivisiByID($id_divisi);
        $data['user'] = $this->user_model->getUserByID($id);
        $this->load->view('user/useruserdetailadminins', $data);
    }

    public function editdatauseradminins($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        // $data['level'] = ['1', '2', '3'];
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/userusereditadminins', $data);
        } else {
            $this->user_model->editdatauseradminins($id);
            redirect('user/useradminins', 'refresh');
        }
    }

    public function editstatususeradminins($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        $data['status'] = ['diterima', 'ditolak'];
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/editstatususeradminins', $data);
        } else {
            $this->user_model->editstatususeradminins();
            redirect('user/useradminins', 'refresh');
        }
    }

    public function tambahdatauseradminins()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        // $data['tambah_admin_ins_admin'] = 'failed';

        if ($this->form_validation->run() == FALSE) {
            // $data['tambah_admin_ins_admin'] = 'failed';
            $this->load->view('user/usertambahuseradminins');
        } else {
            $this->user_model->tambahdatauseradminins();
            $data['tambah_user_admin_ins'] = 'success';
            $this->load->view('user/usertambahuseradminins', $data);
            // redirect('user/useradmin');
        }
    }

    public function tambahdatauseradmininsnext()
    {
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
        $this->load->model('divisi_model');
        $data['divisi'] = $this->divisi_model->getAllDivisi();
        $this->load->view('user/usertambahuseradmininsnext', $data);
    }

    public function tambahdatauseradmininsnextinsert()
    {
        $this->form_validation->set_rules('idinstansi', 'Asal Instansi', 'required');
        $this->form_validation->set_rules('iddivisi', 'Asal Divisi', 'required');
        $this->form_validation->set_rules('periode_mulai', 'Periode Mulai', 'required');
        $this->form_validation->set_rules('periode_selesai', 'Periode Selesai', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('instansi_model');
            $data['instansi'] = $this->instansi_model->getAllApprovedInstansi();
            $this->load->model('divisi_model');
            $data['divisi'] = $this->divisi_model->getAllDivisi();
            $this->load->view('user/usertambahuseradmininsnext', $data);
        } else {
            $data['user'] = $this->user_model->getLastInsertedUserID();
            $id_user = $data['user'][0]['last_inserted'];
            $this->user_model->tambahuseradmininsdetail($id_user);
            $data['tambah_user_admin_ins_next'] = 'success';
            $this->load->view('user/usertambahuseradmininsnext', $data);
            // redirect('user/login');
        }
    }

    public function hapusdatauseradminins($id)
    {
        $this->user_model->hapusdatauseradminins($id);
        redirect('user/useradminins', 'refresh');
    }

    public function useruser()
    {
        $id = $_SESSION['id_user'];
        $data['user'] = $this->user_model->getUserByID($id);
        // var_dump($data['user']);
        $this->load->view('user/useruser', $data);
    }

    public function detaildatauseruser($id)
    {
        $data['user_detail'] = $this->user_model->getUserDetail($id);
        $id_instansi = $data['user_detail'][0]['id_instansi'];
        $id_divisi = $data['user_detail'][0]['id_divisi'];
        $this->load->model('instansi_model');
        $data['instansi'] = $this->instansi_model->getInstansiByID($id_instansi);
        $this->load->model('divisi_model');
        $data['divisi'] = $this->divisi_model->getDivisiByID($id_divisi);
        $data['user'] = $this->user_model->getUserByID($id);
        $this->load->view('user/useruserdetailuser', $data);
    }

    public function editdatauseruser($id)
    {
        $data['user'] = $this->user_model->getUserByID($id);
        // $data['level'] = ['1', '2', '3'];
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggal_registrasi', 'Tanggal Registrasi', 'required');
        // $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/useruseredituser', $data);
        } else {
            $this->user_model->editdatauseruser($id);
            redirect('user/useruser', 'refresh');
        }
    }
}
