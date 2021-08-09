<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function tambah()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['id_instansi'] = $this->input->post('idinstansi', true);
            $data['id_divisi'] = $this->input->post('iddivisi', true);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = md5($this->input->post('password', true));
            $data['nip'] = $this->input->post('nip', true);
            $data['nama_user'] = $this->input->post('namauser', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['tanggal_registrasi'] = $this->input->post('tanggalregistrasi', true);
            $data['periode_mulai'] = $this->input->post('periodemulai', true);
            $data['periode_selesai'] = $this->input->post('periodeselesai', true);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
            $data['level'] = 3;
            // $password = $this->input->post('password', true);
            // $data = password_hash($password, PASSWORD_DEFAULT);
            $this->db->insert('user', $data);
        }
    }

    public function tambahuserinstansi()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/tambahuserinstansi', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = md5($this->input->post('password', true));
            $data['nip'] = $this->input->post('nip', true);
            $data['nama_user'] = $this->input->post('namauser', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['tanggal_registrasi'] = $this->input->post('tanggalregistrasi', true);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
            $data['level'] = 2;
            $data['status'] = "ditolak";
            // $password = $this->input->post('password', true);
            // $data = password_hash($password, PASSWORD_DEFAULT);
            $this->db->insert('user', $data);
        }
    }

    public function tambahuser()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/tambahuser', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = md5($this->input->post('password', true));
            $data['nip'] = $this->input->post('nip', true);
            $data['nama_user'] = $this->input->post('namauser', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['tanggal_registrasi'] = $this->input->post('tanggalregistrasi', true);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
            $data['level'] = 3;
            $data['status'] = "ditolak";
            // $password = $this->input->post('password', true);
            // $data = password_hash($password, PASSWORD_DEFAULT);
            $this->db->insert('user', $data);
        }
    }

    public function login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('status', "diterima");
        $this->db->limit(1);

        // $query = $this->db->query("SELECT email,password,level FROM user WHERE email='$email' AND password='$password';");

        // foreach ($query->result() as $row) {
        //     echo $row->email;
        //     echo $row->password;
        //     echo $row->level;
        // }

        $query = $this->db->get();
        // var_dump($query->result_array());
        // echo $query->result_array();
        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getUserDetail($id)
    {
        $this->db->select('*');
        $this->db->from('user_detail');
        $this->db->where('id_user', $id);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getUserInstansiDetail($id)
    {
        $this->db->select('*');
        $this->db->from('user_instansi_detail');
        $this->db->where('id_user', $id);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getLastInsertedUserID()
    {
        $query = $this->db->query("SELECT MAX(id_user) AS last_inserted FROM user;");
        return $query->result_array();
    }

    public function tambahuserdetail($id)
    {
        $data['id_user'] = $id;
        $data['id_instansi'] = $this->input->post('idinstansi', true);
        $data['id_divisi'] = $this->input->post('iddivisi', true);
        $data['periode_mulai'] = $this->input->post('periodemulai', true);
        $data['periode_selesai'] = $this->input->post('periodeselesai', true);
        $this->db->insert('user_detail', $data);
    }

    public function tambahuserinstansidetail($id)
    {
        $data['id_user'] = $id;
        $data['id_instansi'] = $this->input->post('idinstansi', true);
        $this->db->insert('user_instansi_detail', $data);
    }

    public function getAllAdmin()
    {
        return $this->db->get_where('user', ['level' => "1"])->result();
    }

    public function getUserByID($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->result();
    }

    public function editstatusadmin()
    {
        $data = [
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function editdataadmin($id)
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/useradmineditadmin', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['email'] = $this->input->post('email', true);
        if (!empty($this->input->post('password'))) {
            $data['password'] = md5($this->input->post('password', true));
        }
        $data['nip'] = $this->input->post('nip', true);
        $data['nama_user'] = $this->input->post('nama_user', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
        // $data['level'] = $this->input->post('level', true);
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function tambahdataadmin()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/usertambahadmin', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = md5($this->input->post('password', true));
            $data['nip'] = $this->input->post('nip', true);
            $data['nama_user'] = $this->input->post('nama_user', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
            $data['level'] = $this->input->post('level', true);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
            $data['level'] = "1";
            $data['status'] = "ditolak";
            $this->db->insert('user', $data);
        }
    }

    public function hapusdataadmin($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function getAllAdminInstansi()
    {
        return $this->db->get_where('user', ['level' => "2"])->result();
    }

    public function getDetailAdminInstansi($id)
    {
        return $this->db->get_where('user_instansi_detail', ['id_user' => $id])->result_array();
    }

    public function editdataadmininsadmin($id)
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/editdataadmininsadmin', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['email'] = $this->input->post('email', true);
        if (!empty($this->input->post('password'))) {
            $data['password'] = md5($this->input->post('password', true));
        }
        $data['nip'] = $this->input->post('nip', true);
        $data['nama_user'] = $this->input->post('nama_user', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
        $data['level'] = $this->input->post('level', true);
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function hapusdataadmininsadmin($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user_instansi_detail');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function tambahdataadmininsadmin()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/usertambahadmininsadmin', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = md5($this->input->post('password', true));
            $data['nip'] = $this->input->post('nip', true);
            $data['nama_user'] = $this->input->post('nama_user', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
            $data['level'] = $this->input->post('level', true);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
            $data['level'] = "2";
            $data['status'] = "ditolak";
            $this->db->insert('user', $data);
        }
    }

    public function tambahuserinstansiadmindetail($id)
    {
        $data['id_user'] = $id;
        $data['id_instansi'] = $this->input->post('idinstansi', true);
        $this->db->insert('user_instansi_detail', $data);
    }

    public function getAllUser()
    {
        return $this->db->get_where('user', ['level' => "3"])->result();
    }

    public function editdatauseradmin($id)
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/useradmineditadmin', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['email'] = $this->input->post('email', true);
        if (!empty($this->input->post('password'))) {
            $data['password'] = md5($this->input->post('password', true));
        }
        $data['nip'] = $this->input->post('nip', true);
        $data['nama_user'] = $this->input->post('nama_user', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
        // $data['level'] = $this->input->post('level', true);
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function editstatususeradmin()
    {
        $data = [
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function tambahdatauseradmin()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/usertambahuseradmin', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = md5($this->input->post('password', true));
            $data['nip'] = $this->input->post('nip', true);
            $data['nama_user'] = $this->input->post('nama_user', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
            $data['level'] = $this->input->post('level', true);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
            $data['level'] = "3";
            $data['status'] = "ditolak";
            $this->db->insert('user', $data);
        }
    }

    public function tambahuseradmindetail($id)
    {
        $data['id_user'] = $id;
        $data['id_instansi'] = $this->input->post('idinstansi', true);
        $data['id_divisi'] = $this->input->post('iddivisi', true);
        $data['periode_mulai'] = $this->input->post('periode_mulai', true);
        $data['periode_selesai'] = $this->input->post('periode_selesai', true);
        $this->db->insert('user_detail', $data);
    }

    public function hapusdatauseradmin($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user_detail');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function getAllUserInsByIDInstansi()
    {
        return $this->db->get_where('user_instansi_detail', ['id_instansi' => $_SESSION['id_instansi']])->result();
    }

    public function innerJoinUserandUserInsDetail()
    {
        $id_instansi = $_SESSION['id_instansi'];
        $query = $this->db->query("SELECT * FROM user INNER JOIN user_instansi_detail ON user.id_user=user_instansi_detail.id_user WHERE user_instansi_detail.id_instansi=$id_instansi;");
        return $query->result();
    }

    public function editdataadmininsadminins($id)
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/useradmininseditadminins', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['email'] = $this->input->post('email', true);
        if (!empty($this->input->post('password'))) {
            $data['password'] = md5($this->input->post('password', true));
        }
        $data['nip'] = $this->input->post('nip', true);
        $data['nama_user'] = $this->input->post('nama_user', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
        // $data['level'] = $this->input->post('level', true);
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function editstatusadmininsadminins()
    {
        $data = [
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function tambahdataadmininsadminins()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/usertambahadmininsadminins', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = md5($this->input->post('password', true));
            $data['nip'] = $this->input->post('nip', true);
            $data['nama_user'] = $this->input->post('nama_user', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
            $data['level'] = $this->input->post('level', true);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
            $data['level'] = "2";
            $data['status'] = "ditolak";
            $this->db->insert('user', $data);
        }
    }

    public function tambahadmininsadmininsdetail($id)
    {
        $data['id_user'] = $id;
        $data['id_instansi'] = $this->input->post('idinstansi', true);
        $this->db->insert('user_instansi_detail', $data);
    }

    public function hapusdataadmininsadminins($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user_instansi_detail');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function innerJoinUserandUserDetail()
    {
        $id_instansi = $_SESSION['id_instansi'];
        $query = $this->db->query("SELECT * FROM user INNER JOIN user_detail ON user.id_user=user_detail.id_user WHERE user_detail.id_instansi=$id_instansi;");
        return $query->result();
    }

    public function editdatauseradminins($id)
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/userusereditadminins', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['email'] = $this->input->post('email', true);
        if (!empty($this->input->post('password'))) {
            $data['password'] = md5($this->input->post('password', true));
        }
        $data['nip'] = $this->input->post('nip', true);
        $data['nama_user'] = $this->input->post('nama_user', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
        // $data['level'] = $this->input->post('level', true);
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function editstatususeradminins()
    {
        $data = [
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function tambahdatauseradminins()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/usertambahuseradminins', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['email'] = $this->input->post('email', true);
            $data['password'] = md5($this->input->post('password', true));
            $data['nip'] = $this->input->post('nip', true);
            $data['nama_user'] = $this->input->post('nama_user', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
            $data['level'] = $this->input->post('level', true);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
            $data['level'] = "3";
            $data['status'] = "ditolak";
            $this->db->insert('user', $data);
        }
    }

    public function tambahuseradmininsdetail($id)
    {
        $data['id_user'] = $id;
        $data['id_instansi'] = $this->input->post('idinstansi', true);
        $data['id_divisi'] = $this->input->post('iddivisi', true);
        $data['periode_mulai'] = $this->input->post('periode_mulai', true);
        $data['periode_selesai'] = $this->input->post('periode_selesai', true);
        $this->db->insert('user_detail', $data);
    }

    public function hapusdatauseradminins($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user_detail');
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function editdatauseruser($id)
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/useruseredituser', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['email'] = $this->input->post('email', true);
        if (!empty($this->input->post('password'))) {
            $data['password'] = md5($this->input->post('password', true));
        }
        $data['nip'] = $this->input->post('nip', true);
        $data['nama_user'] = $this->input->post('nama_user', true);
        $data['alamat'] = $this->input->post('alamat', true);
        $data['tanggal_registrasi'] = $this->input->post('tanggal_registrasi', true);
        // $data['level'] = $this->input->post('level', true);
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
}

/* End of file user_model.php */
