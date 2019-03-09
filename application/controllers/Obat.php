<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function __construct()
     {
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->library('form_validation');
     }


	public function index()
	{
		if ($this->session->userdata('login_status') == TRUE) {
			$data['content_view'] = 'obat_view';
			$data['obat'] = $this->Obat_model->get_obat();

			$data['kategori'] = $this->Obat_model->get_kategori();
			$this->load->view('template', $data);

         } else {
             redirect('login');
         }
	}
	public function add_obat()
	{
		if($this->session->userdata('login_status') == TRUE){
			$this->form_validation->set_rules('kode_obat', 'Kode Obat', 'trim|required');
			$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
			$this->form_validation->set_rules('tanggal_kadaluarsa', 'Tanggal Kadaluarsa', 'trim|required');
			$this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric');
			$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
			$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = './assets/images/cover_obat/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000000';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('foto')){
			if($this->Obat_model->tambah($this->upload->data()) == TRUE)
			{
				$this->session->set_flashdata('pesan', 'Tambah obat berhasil');
				redirect('obat/index');
					} else {
						$this->session->set_flashdata('pesan', 'Tambah obat gagal');
						redirect('obat/index');
					}
				} else {
					$this->session->set_flashdata('pesan', 'Tambah obat gagal upload');
					redirect('obat/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('obat/index');
			}
		} else {
			redirect('login/index');
		} 
	}

	public function ubah()
	{
		if($this->session->userdata('login_status') == TRUE){

			$this->form_validation->set_rules('ubah_kode_obat', 'Kode Obat', 'trim|required');
			$this->form_validation->set_rules('ubah_nama_obat', 'Nama Obat', 'trim|required');
			$this->form_validation->set_rules('ubah_tanggal_kadaluarsa', 'Tanggal Kadaluarsa', 'trim|required');
			$this->form_validation->set_rules('ubah_stok', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_harga', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('ubah_kategori', 'kategori', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Obat_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('pesan', 'Ubah data berhasil');
					redirect('Obat/index');
				} else {
					$this->session->set_flashdata('pesan', 'Ubah data gagal');
					redirect('Obat/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('Obat/index');
			}


		} else {
			redirect('login/index');
		}
	}

function hapus(){
	if ($this->session->userdata('login_status') == TRUE) {
		$id_obat = $this->uri->segment(3);

		if ($this->Obat_model->hapus_obat($id_obat)) {
			$this->session->set_flashdata('pesan', 'Hapus Obat Berhasil!');
			redirect('obat');
		}else {
			$this->session->set_flashdata('pesan', 'Hapus Obat Gagal!');
			redirect('obat');		
		}
		}
	}
	
	
	public function json_obat_by_id(){
		if ($this->session->userdata('login_status') == TRUE) {
			$id_obat = $this->uri->segment(3);
	
			$data = $this->Obat_model->get_data_obat_by_id($id_obat);
			echo json_encode($data);
		}
	}
	}	


