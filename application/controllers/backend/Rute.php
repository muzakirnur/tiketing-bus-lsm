<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rute extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Jakarta");
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
		$data['title'] = "List Tujuan";
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan")->result_array();
		// die(print_r($data));
		$this->load->view('backend/tujuan', $data);
	}
	public function viewrute($id=''){
		$data['title'] = "List Tujuan";
		$data['rute'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan = '".$id."' ")->row_array();
		// die(print_r($data));
		$this->load->view('backend/view_tujuan', $data);
	}
	public function tambahtujuan(){
		$kode = $this->getkod_model->get_kodtuj();
		$data = array(
			'kd_tujuan' => $kode,
			'kota_tujuan' => $this->input->post('tujuan'),
			'nama_terminal_tujuan' => $this->input->post('nama'),
			'terminal_tujuan' => $this->input->post('terminal')
			 );
		// die(print_r($data));
		$this->db->insert('tbl_tujuan', $data);
		$this->session->set_flashdata('message', 'swal("Data Berhasil Di Tambah");');
		redirect('backend/rute');
	}
	function editrute($kode){
        $where = array('kd_tujuan' => $kode);
        $data['rute'] = $this->getkod_model->edit_data('tbl_tujuan',$where)->result();
        $this->load->view(base_url('backend/rute/viewrute'),$data);
    }
	function updaterute(){
		$kode 		= $this->input->post('kd_tujuan');
		$kota 		= $this->input->post('kota_tujuan');
		$nama 		= $this->input->post('nama_terminal_tujuan');
		$info 		= $this->input->post('terminal_tujuan');
	
		$data = array(
			'kota_tujuan' 			=> $kota,
			'nama_terminal_tujuan' 	=> $nama,
			'terminal_tujuan' 		=> $info
		);
	
		$where = array(
			'kd_tujuan' 			=> $kode
		);

		$this->getkod_model->update_data($where,$data,'tbl_tujuan');
		$this->session->set_flashdata('message', 'swal("Tujuan Berhasil Diupdate");');
		redirect(base_url('backend/rute/viewrute/'.$kode));
	}
	public function deleterute($kode)
	{
	  $where = array('kd_tujuan' => $kode);
	  $this->getkod_model->delete('tbl_tujuan',$where);
  
	  $this->session->set_flashdata('message', 'swal("Data Berhasil Dihapus");');
	  redirect(base_url('backend/rute'));
	}
}

/* End of file Rute.php */
/* Location: ./application/controllers/backend/Rute.php */