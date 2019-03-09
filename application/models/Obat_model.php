<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model {

  public function get_obat()
  {
	return $this->db->join('kategori','kategori.id_kat = obat.id_kat')
					->get('obat')
					->result();
}
					

	public function get_kategori(){
		return $this->db->get('kategori')
						->result();
	}
	public function hapus_obat($id){
    $this->db->where('id_obat', $id)
            ->delete('obat');
  if ($this->db->affected_rows() > 0) {
    return TRUE;
  }else {
    return FALSE;
  }
  }
 
	public function get_data_obat_by_id($id)
  {
    return $this->db->where('id_obat', $id)
                    ->get('obat')
                    ->row();
}
	
  public function tambah($foto)
	{
		$data = array(
				'kode_obat' 							=> $this->input->post('kode_obat'),
				'nama_obat' 							=> $this->input->post('nama_obat'),
				'tanggal_kadaluarsa'			=> $this->input->post('tanggal_kadaluarsa'),
				'stok'										=> $this->input->post('stok'),
				'harga'										=> $this->input->post('harga'),
				'id_kat'									=> $this->input->post('kategori'),
				'foto'										=> $foto['file_name']
			);

	$this->db->insert('obat', $data);
	
	if($this->db->affected_rows() > 0){
		return TRUE;
	} else {
		return FALSE;
	}
  }

  public function ubah()
	{
		$data = array(
				'kode_obat' 							=> $this->input->post('ubah_kode_obat'),
				'nama_obat' 							=> $this->input->post('ubah_nama_obat'),
				'tanggal_kadaluarsa'			=> $this->input->post('ubah_tanggal_kadaluarsa'),
				'id_kat'									=> $this->input->post('ubah_kategori'),
				'stok'										=> $this->input->post('ubah_stok'),
				'harga'										=> $this->input->post('ubah_harga')
			);

		$this->db->where('id_obat', $this->input->post('ubah_id_obat'))
				 ->update('obat', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
}