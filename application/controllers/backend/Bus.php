<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {
	function __construct(){
	parent::__construct();
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index(){
	$data['title'] = "List Bus";
	$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
	// die(print_r($data));
	$this->load->view('backend/bus', $data);	
	}
	public function viewbus($id=''){
		$data['title'] = "View Bus";
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus WHERE kd_bus = '".$id."'")->row_array();
		$this->load->view('backend/view_bus', $data);
	}
	public function tambahbus(){
		$kode = $this->getkod_model->get_kodbus();
		$data = array(
			'kd_bus' 		=> $kode,
			'nama_bus' 		=> $this->input->post('nama_bus'),
			'plat_bus'		=> $this->input->post('plat_bus'),
			'kapasitas_bus'	=> $this->input->post('seat'),
			'desc_bus'		=> $this->input->post('desc_bus'),
			'status_bus'	=> '1'
			 );
		$this->db->insert('tbl_bus', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil", "Data Bus Di Simpan", "success");');
		redirect('backend/bus');
	}
	public function deletebus($kode)
	{
	  $where = array('kd_bus' => $kode);
	  $this->getkod_model->delete('tbl_bus',$where);
  
	  $this->session->set_flashdata('message', 'swal("Bus Berhasil Dihapus");');
	  redirect(base_url('backend/bus'));
	}
	function editbus($kode){
        $where = array('kd_bus' => $kode);
        $data['bus'] = $this->getkod_model->edit_data('tbl_bus',$where)->result();
        $this->load->view(base_url('backend/bus/viewbus'),$data);
    }
	function updatebus(){
		$kode 		= $this->input->post('kd_bus');
		$nama 		= $this->input->post('nama_bus');
		$platbus 	= $this->input->post('plat_bus');
		$kapasitas 	= $this->input->post('kapasitas_bus');
		$descbus 	= $this->input->post('desc_bus');
	
		$data = array(
			'nama_bus' 			=> $nama,
			'plat_bus' 			=> $platbus,
			'kapasitas_bus' 	=> $kapasitas,
			'desc_bus' 			=> $descbus
		);
	
		$where = array(
			'kd_bus' 			=> $kode
		);

		$this->getkod_model->update_data($where,$data,'tbl_bus');
		$this->session->set_flashdata('message', 'swal("Bus Berhasil Diupdate");');
		redirect(base_url('backend/bus/viewbus/'.$kode));
	}
  

}

/* End of file Bus.php */
/* Location: ./application/controllers/backend/Bus.php */