<?php

defined('BASEPATH') or exit('No direct script access allowed');

class divisi_model extends CI_Model
{

    public function getAllDivisi()
    {
        $query = $this->db->get('divisi');
        return $query->result_array();
    }
    public function tambah()
    {
        $data['id_instansi'] = $this->input->post('idinstansi');
        $data['nama_divisi'] = $this->input->post('namadivisi');
        $data['deskripsi_divisi'] = $this->input->post('deskripsidivisi');
        $data['telp_divisi'] = $this->input->post('telpdivisi');
        $this->db->insert('divisi', $data);
    }
}
