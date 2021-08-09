<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kegiatan_model extends CI_Model
{
    public function getAllKegiatanByIDUser($id)
    {
        return $this->db->get_where('kegiatan', ['id_user' => $id])->result_array();
    }

    public function tambahdatakegiatanuser()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('kegiatan/kegiatantambahuser', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['id_user'] = $_SESSION['id_user'];
        $data['tanggal_kegiatan'] = $this->input->post('tanggal_kegiatan', true);
        $data['deskripsi_kegiatan'] = $this->input->post('deskripsi_kegiatan', true);
        $this->db->insert('kegiatan', $data);
    }

    public function getKegiatanByID($id)
    {
        return $this->db->get_where('kegiatan', ['id_kegiatan' => $id])->result_array();
    }

    public function editdatakegiatanuser($id)
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            // $error = array('error' => $this->upload->display_errors());
            // $this->load->view('kegiatan/kegiatanedituser', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['deskripsi_kegiatan'] = $this->input->post('deskripsi_kegiatan', true);
        $this->db->where('id_kegiatan', $id);
        $this->db->update('kegiatan', $data);
    }

    public function hapusdatakegiatanuser($id)
    {
        $this->db->where('id_kegiatan', $id);
        $this->db->delete('kegiatan');
    }

    public function innerJoinKegiatanandUserandUserDetail()
    {
        $id_instansi = $_SESSION['id_instansi'];
        $query = $this->db->query("SELECT k.tanggal_kegiatan, u.nama_user, i.nama_instansi, k.deskripsi_kegiatan, k.foto, k.tipe_foto 
        FROM kegiatan k 
        INNER JOIN user u ON k.id_user=u.id_user 
        INNER JOIN user_detail ud ON u.id_user=ud.id_user
        INNER JOIN instansi i ON ud.id_instansi=i.id_instansi 
        WHERE ud.id_instansi=$id_instansi
        ORDER BY k.tanggal_kegiatan ASC;");
        return $query->result_array();
    }

    public function getKegiatanJuli2021AdminIns()
    {
        $id_instansi = $_SESSION['id_instansi'];
        $query = $this->db->query("SELECT k.tanggal_kegiatan, u.nama_user, i.nama_instansi, k.deskripsi_kegiatan, k.foto, k.tipe_foto 
        FROM kegiatan k 
        INNER JOIN user u ON k.id_user=u.id_user 
        INNER JOIN user_detail ud ON u.id_user=ud.id_user
        INNER JOIN instansi i ON ud.id_instansi=i.id_instansi
        WHERE ud.id_instansi=$id_instansi 
        AND k.tanggal_kegiatan BETWEEN '2021-07-01 00:00:00' AND '2021-07-31 23:59:59' 
        ORDER BY k.tanggal_kegiatan ASC;");
        return $query->result_array();
    }

    public function getKegiatanAgt2021AdminIns()
    {
        $id_instansi = $_SESSION['id_instansi'];
        $query = $this->db->query("SELECT k.tanggal_kegiatan, u.nama_user, i.nama_instansi, k.deskripsi_kegiatan, k.foto, k.tipe_foto 
        FROM kegiatan k 
        INNER JOIN user u ON k.id_user=u.id_user 
        INNER JOIN user_detail ud ON u.id_user=ud.id_user
        INNER JOIN instansi i ON ud.id_instansi=i.id_instansi
        WHERE ud.id_instansi=$id_instansi 
        AND k.tanggal_kegiatan BETWEEN '2021-08-01 00:00:00' AND '2021-08-31 23:59:59' 
        ORDER BY k.tanggal_kegiatan ASC;");
        return $query->result_array();
    }

    public function innerJoinKegiatanandUserandUserDetailAdmin($id_instansi)
    {
        // $id_instansi = $_SESSION['id_instansi'];
        $query = $this->db->query("SELECT k.tanggal_kegiatan, u.nama_user, i.nama_instansi, k.deskripsi_kegiatan, k.foto, k.tipe_foto 
        FROM kegiatan k 
        INNER JOIN user u ON k.id_user=u.id_user 
        INNER JOIN user_detail ud ON u.id_user=ud.id_user
        INNER JOIN instansi i ON ud.id_instansi=i.id_instansi 
        WHERE ud.id_instansi=$id_instansi
        ORDER BY k.tanggal_kegiatan ASC;");
        return $query->result_array();
    }
}
