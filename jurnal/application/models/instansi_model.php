<?php

defined('BASEPATH') or exit('No direct script access allowed');

class instansi_model extends CI_Model
{
    public function getAllInstansi()
    {
        $query = $this->db->get('instansi');
        return $query->result_array();
    }

    public function getInstansiByID($id)
    {
        return $this->db->get_where('instansi', ['id_instansi' => $id])->row_array();
    }

    public function tambah()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('logo')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('instansi/tambah', $error);
        } else {
            $image_data = $this->upload->data();
            $imgdata = file_get_contents($image_data['full_path']);
            $file_encode = base64_encode($imgdata);
            // $data['kode_instansi'] = $this->input->post('kodeinstansi', true);
            $data['nama_instansi'] = $this->input->post('namainstansi', true);
            $data['alamat'] = $this->input->post('alamat', true);
            $data['deskripsi_instansi'] = $this->input->post('deskripsiinstansi', true);
            $data['email'] = $this->input->post('email', true);
            $data['telp'] = $this->input->post('telp', true);
            $data['logo'] = $file_encode;
            $data['tipe_logo'] = $this->upload->data('file_type');
            $this->db->insert('instansi', $data);
        }
    }

    public function editstatusinstansi()
    {
        $data = [
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id_instansi', $this->input->post('id_instansi'));
        $this->db->update('instansi', $data);
    }

    public function editinstansi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_instansi($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}
