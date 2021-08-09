<?php

defined('BASEPATH') or exit('No direct script access allowed');

class divisi_model extends CI_Model
{

    public function getAllDivisi()
    {
        $query = $this->db->get('divisi');
        return $query->result_array();
    }

    public function getDivisiByID($id)
    {
        return $this->db->get_where('divisi', ['id_divisi' => $id])->row_array();
    }

    public function tambah()
    {
        $data['id_instansi'] = $this->input->post('idinstansi');
        $data['nama_divisi'] = $this->input->post('namadivisi');
        $data['deskripsi_divisi'] = $this->input->post('deskripsidivisi');
        $data['telp_divisi'] = $this->input->post('telpdivisi');
        $this->db->insert('divisi', $data);
    }

    public function innerJoinDivisiandInstansi($id)
    {
        $query = $this->db->query("SELECT d.id_divisi, i.nama_instansi, d.nama_divisi, d.deskripsi_divisi, d.telp_divisi 
        FROM divisi d 
        INNER JOIN instansi i ON d.id_instansi=i.id_instansi
        WHERE d.id_instansi=$id;");
        return $query->result_array();
    }

    public function tambahdatadivisiadminins()
    {
        $data['id_instansi'] = $this->input->post('id_instansi', true);
        $data['nama_divisi'] = $this->input->post('nama_divisi', true);
        $data['deskripsi_divisi'] = $this->input->post('deskripsi_divisi', true);
        $data['telp_divisi'] = $this->input->post('telp_divisi', true);
        $this->db->insert('divisi', $data);
    }

    public function editdatadivisiadminins($id)
    {
        $data['nama_divisi'] = $this->input->post('nama_divisi', true);
        $data['deskripsi_divisi'] = $this->input->post('deskripsi_divisi', true);
        $data['telp_divisi'] = $this->input->post('telp_divisi', true);
        $this->db->where('id_divisi', $id);
        $this->db->update('divisi', $data);
    }

    public function getDivisiByIDDivisi($id)
    {
        return $this->db->get_where('divisi', ['id_divisi' => $id])->result_array();
    }

    public function hapusdatadivisiadminins($id)
    {
        $this->db->where('id_divisi', $id);
        $this->db->delete('divisi');
    }
}
