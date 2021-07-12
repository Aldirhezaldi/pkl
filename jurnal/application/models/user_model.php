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
            $data['level'] = 2;
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
}

/* End of file user_model.php */
