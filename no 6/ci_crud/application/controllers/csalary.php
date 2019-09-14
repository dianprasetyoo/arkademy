<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csalary extends CI_Controller {

	function Construct(){
		parent::_construct();
		$this->load->model('m_salary');
	}

	function index($offset=0){

						$this->load->model('m_salary');
						$data['jenis'] = 'index';
			$data['offset'] = $offset;
						$data['daftar'] = $this->m_salary->daftar();
						$this->load->view('index', $data);
		}

		function edit_salary($id) {
				if($_POST == NULL) {
					$this->load->model('m_salary');
					$data['rows'] = $this->m_salary->get_salary($id);
					$data['id'] = $id;
					//$data['jenis'] = 'edit_sekolah';
					$this->load->view('edit_salary', $data);
				} else	{
					$this->load->model('m_salary');
					$this->m_sekolah->update();
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Sukses Di ubah</div>');
					redirect('csalary','refresh');
				}
		}

		function update(){
			$this->load->model('m_salary');
			$this->m_salary->update();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Sukses Di ubah</div>');
			redirect('csalary','refresh');
		}

		function save(){
				$this->load->library('form_validation');
				$this->form_validation->set_rules('id','id', 'required|is_unique[name.id]');
				$this->form_validation->set_rules('name','name', 'required');
				$this->form_validation->set_rules('work','work', 'required');
				$this->form_validation->set_rules('salary','salary', 'required');
	            if ($this->form_validation->run() == FALSE){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Gagal Di Simpan, kemungkinan data sudah ada!</div>');
					redirect('csalary');
				} else {
					$this->load->model('m_salary');
					$this->m_salary->save();
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Sukses Di Simpan</div>');
					redirect('csalary');
				}
		}

		function tambah_salary() {
				$this->load->model('m_salary');
				//$data['kec_option'] = $this->m_sekolah->kec_option();
				$data=array(
				'kd'=>$this->m_salary->getKodeSalary()
				);
				//$data['jenis'] = 'tambah_salary';
				$this->load->view('tambah_salary', $data);
		}

		function hapus_salary($id) {
			$this->db->where('id',$id);
			$this->db->delete('name');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Data Sukses Di hapus</div>');
						redirect('csalary/index');
		}
}
