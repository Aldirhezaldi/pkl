<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pengumuman_model extends CI_Model
{
    public function getAllPengumumanByIDIns($id_instansi)
    {
        // $id_instansi = $_SESSION['id_instansi'];
        $query = $this->db->query("SELECT p.id_pengumuman, p.tanggal_pengumuman, p.judul, p.isi, p.foto, p.tipe_foto, i.nama_instansi 
        FROM pengumuman p 
        INNER JOIN instansi i ON p.id_instansi=i.id_instansi
        WHERE p.id_instansi=$id_instansi
        ORDER BY p.tanggal_pengumuman ASC;");
        return $query->result_array();
    }

    public function tambahdatapengumumanadminins()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('pengumuman/pengumumantambahadminins', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['id_instansi'] = $_SESSION['id_instansi'];
        $data['tanggal_pengumuman'] = $this->input->post('tanggal_pengumuman', true);
        $data['judul'] = $this->input->post('judul', true);
        $data['isi'] = $this->input->post('isi', true);
        $this->db->insert('pengumuman', $data);
    }

    public function getPengumumanByID($id)
    {
        return $this->db->get_where('pengumuman', ['id_pengumuman' => $id])->result_array();
    }

    public function editdatapengumumanadminins($id)
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')
            /** upload the file to the above mentioned path */
        ) {
            // $error = array('error' => $this->upload->display_errors());
            // $this->load->view('pengumuman/pengumumaneditadminins', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            $data['foto'] = $file_encode;
            $data['tipe_foto'] = $this->upload->data('file_type');
        }
        $data['judul'] = $this->input->post('judul', true);
        $data['isi'] = $this->input->post('isi', true);
        $this->db->where('id_pengumuman', $id);
        $this->db->update('pengumuman', $data);
    }

    public function hapusdatapengumumanadminins($id)
    {
        $this->db->where('id_pengumuman', $id);
        $this->db->delete('pengumuman');
    }

    public function getAllPengumumanByIDUser($id)
    {
        // $id_instansi = $_SESSION['id_instansi'];
        $query = $this->db->query("SELECT p.id_pengumuman, p.tanggal_pengumuman, p.judul, p.isi, p.foto, p.tipe_foto, i.nama_instansi 
        FROM pengumuman p 
        INNER JOIN instansi i ON p.id_instansi=i.id_instansi
        WHERE p.id_instansi=$id
        ORDER BY p.tanggal_pengumuman ASC;");
        return $query->result_array();
    }
}
