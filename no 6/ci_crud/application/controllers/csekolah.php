<?php
class Csekolah extends CI_Controller {

	function Construct(){
		parent::_construct();
		$this->load->model('m_sekolah');	
		session_start();
	}
	
	function index($offset=0){	
		if ($this->session->userdata('login') == TRUE) {	
            $this->load->model('m_sekolah');
            $data['jenis'] = 'tampil_sekolah';
			$data['offset'] = $offset;
            $data['daftar'] = $this->m_sekolah->daftar();
            $this->load->view('index_admin', $data);				
		} else {		
            redirect('clogin');
		}	
    }
	
	function edit_sekolah($id_sekolah) {
		if ($this->session->userdata('login') == TRUE) {
			if($_POST == NULL) {
				$this->load->model('m_sekolah');
				$data['rows'] = $this->m_sekolah->get_sekolah($id_sekolah);
				$data['id_sekolah'] = $id_sekolah; 
				$data['jenis'] = 'edit_sekolah';
				$this->load->view('index_admin', $data);
			} else	{			
				$this->load->model('m_sekolah');
				$this->m_sekolah->update();
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Sukses Di ubah</div>');
				redirect('csekolah','refresh');
			}
		} else {
			redirect('clogin');
		}
	}
	
	function tambah_sekolah() {
		if ($this->session->userdata('login') == TRUE) {
			$this->load->model('m_sekolah');
			$data['kec_option'] = $this->m_sekolah->kec_option();
			$data=array(
			'kd'=>$this->m_sekolah->getKodeSekolah()
			);
			$data['jenis'] = 'tambah_sekolah';
			$this->load->view('index_admin', $data);
		} else {		
			redirect('clogin');
		}	
	}
	
	function save(){
		if ($this->session->userdata('login') == TRUE) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('id_sekolah','id_sekolah', 'required|is_unique[sekolah_asal.id_sekolah]');
			$this->form_validation->set_rules('id_kec','id_kec', 'required');
			$this->form_validation->set_rules('nama_sekolah','nama_sekolah', 'required');
			$this->form_validation->set_rules('alamat_sekolah','alamat_sekolah', 'required');
            if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Gagal Di Simpan, kemungkinan data sudah ada!</div>');
				redirect('csekolah');		
			} else {				
				$this->load->model('m_sekolah');
				$this->m_sekolah->save();
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Sukses Di Simpan</div>');
				redirect('csekolah');
			}
		} else {
			redirect('clogin');
		}
	}
		
		function delete($id_sekolah) {
		if ($this->session->userdata('login') == TRUE) {
			$this->db->where('id_sekolah',$id_sekolah);
			$this->db->delete('sekolah_asal');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Sukses Di hapus</div>');
            redirect('csekolah');	
		}
		else {
			redirect('clogin');
		}
	}
}
?>