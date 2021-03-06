<?php 


class DaftarBimbingan extends CI_Controller{
	
	//lihat
		function __construct(){
		parent::__construct();	

		//Cek Login
		//memanggil function dari controller MY_Controller
 
  //validasi jika session dengan level tidak sesuai
    if ($this->session->userdata('level') == "mahasiswa") {
      redirect('mahasiswa/mahasiswa');
 }
	

		//ngeload model ben iso di panggil

		$this->load->model('M_Daftarbimbingan');
		$this->load->model('M_AjukanJudul');
		$this->load->model('M_Config');
        $this->load->helper('url');

		
		
	}
 
	function index($golongan){
		
		
		$Dospem = array('golongan' =>$golongan);
		//pengaturan pagination tabel dan view nya
		$this->load->database();
		$jumlah_data = $this->M_Daftarbimbingan->Pagejumlah_bimbingan('table_ta');
		$this->load->library('pagination');
		$config['base_url'] = base_url().'KoordinatorTA/DaftarBimbingan/index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(5);
		$this->pagination->initialize($config);		
		$data['table_ta'] = $this->M_Daftarbimbingan->Pagedata_bimbingan('table_ta',$Dospem,$config['per_page'],$from);
		$this->load->view('header');
		$this->load->view('KoordinatorTA/DaftarBimbingan',$data);
		
		/*
		$where = array('id_user' =>$this->session->userdata('username'));
		$data['tabel_ta'] = $this->M_AjukanJudul->tampil_data($where)->result();
		$this->load->view('mahasiswa/ajukanjudul',$data);
		*/
	}

	
	function Golongan($golongan){
		
		
		$Dospem = array('golongan' =>$golongan);
		//pengaturan pagination tabel dan view nya
		$this->load->database();
		$jumlah_data = $this->M_Daftarbimbingan->Pagejumlah_bimbingan('table_ta');
		$this->load->library('pagination');
		$config['base_url'] = base_url().'KoordinatorTA/DaftarBimbingan/index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;
		$from = $this->uri->segment(5);
		$this->pagination->initialize($config);		
		$data['table_ta'] = $this->M_Daftarbimbingan->Pagedata_bimbingan('table_ta',$Dospem,$config['per_page'],$from);
		$this->load->view('header');
		$this->load->view('KoordinatorTA/DaftarBimbingan',$data);
		
		/*
		$where = array('id_user' =>$this->session->userdata('username'));
		$data['tabel_ta'] = $this->M_AjukanJudul->tampil_data($where)->result();
		$this->load->view('mahasiswa/ajukanjudul',$data);
		*/
	}
	
	//Tambah
	function kirimbaru(){
		//manggil dosen
		
		$this->load->view('dosen/Judul-Baru');
		
	}

	
//menolak sebagai pembimbing
	function tolak($id){
	$where = array('id' => $id);

	$data = array(
			'Status_pembimbing' =>"Di Tolak"
			);

	$this->M_Daftarbimbingan->update_data($where,$data,'table_ta');
	redirect('dosen/bimbingan');
}

	//memnerima sebagai pembimbing
	function Terima($id){	
	
	
	$where = array('id' => $id);
	$data = array(
			'Status_pembimbing' =>"Di Terima"
			);
	$this->M_Daftarbimbingan->update_data($where,$data,'table_ta');
	redirect('dosen/bimbingan');
}

function edit($id){
		$where = array('id' => $id);
		$data['table_ta'] = $this->M_AjukanJudul->edit_data($where,'table_ta')->result();
		$data['dospem'] = $this->M_Config->tampilnamaDosen();
		$this->load->view('header');
		$this->load->view('KoordinatorTA/BimbinganEdit',$data);
	}
	
function update(){
	$id = $this->input->post('id');
	$Dospem = $this->input->post('dospem');

	$data = array(
			'Dospem' => $Dospem ,
			);
		

	$where = array(
		'id' => $id
	);

	$this->M_AjukanJudul->update_data($where,$data,'table_ta');
	redirect('KoordinatorTA/KoordinatorTA');
}


}
?>