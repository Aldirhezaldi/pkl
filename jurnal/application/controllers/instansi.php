<?php
defined('BASEPATH') or exit('No direct script access allowed');

class instansi extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('instansi_model');
    }

    public function index()
    {
        $data['instansi'] = $this->db->get('instansi');
        $this->load->view('user/instansiadmin', $data);
    }

    public function tambah()
    {
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        // $this->form_validation->set_rules('kodeinstansi', 'Kode Instansi', 'required|numeric');
        $this->form_validation->set_rules('namainstansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('deskripsiinstansi', 'Deskripsi Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|numeric');
        if (empty($_FILES['logo']['name'])) {
            $this->form_validation->set_rules('logo', 'Logo', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('instansi/tambah');
        } else {
            $this->instansi_model->tambah();
            redirect('divisi');
        }
    }

    public function editstatus($id)
    {
        $data['instansi'] = $this->instansi_model->getInstansiByID($id);
        $data['status'] = ['diterima', 'ditolak'];
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/editstatus', $data);
        } else {
            $this->instansi_model->editstatusinstansi();
            redirect('instansi', 'refresh');
        }
    }

    public function editinstansi($id_instansi)
    {
        $where = array('id_instansi' => $id_instansi);
        $data['instansi'] = $this->instansi_model->editinstansi($where, 'instansi')->result();
        $this->load->view('user/editinstansi',$data);
    }

    public function updateinstansi(){
        $id_instansi = $this->input->post('id_instansi');
        $nama_instansi = $this->input->post('nama_instansi');
        $alamat = $this->input->post('alamat');
        $deskripsi_instansi = $this->input->post('deskripsi_instansi');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
     
        $data = array(
            'nama_instansi' => $nama_instansi,
            'alamat' => $alamat,
            'deskripsi_instansi' => $deskripsi_instansi,
            'email' => $email,
            'telp' => $telp
        );
     
        $where = array(
            'id_instansi' => $id_instansi
        );
     
        $this->instansi_model->update_instansi($where,$data,'instansi');
        redirect('instansi');
    }

    public function hapus($id){
		$where = array('id_instansi' => $id);
		$this->instansi_model->hapus_data($where,'instansi');
		redirect('instansi');
	}

    public function tambahinstansi(){
        // $this->load->view('user/createinstansi');
        // $this->$this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
        // $this->form_validation->set_rules('kodeinstansi', 'Kode Instansi', 'required|numeric');
        $this->form_validation->set_rules('namainstansi', 'Nama Instansi', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('deskripsiinstansi', 'Deskripsi Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telp', 'Telepon', 'required|numeric');
        if (empty($_FILES['logo']['name'])) {
            $this->form_validation->set_rules('logo', 'Logo', 'required');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('user/createinstansi');
        } else {
            $this->instansi_model->tambah();
            redirect('instansi');
        }
    }
}
