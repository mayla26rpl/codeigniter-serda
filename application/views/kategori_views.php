<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title"><b>Data Kategori Obat</b></h1>
                  <p class="card-description">
                  <a href="#modal_tambah_kategori" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
							
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Aksi</th>
								</tr>
							
							<?php
								$no = 1;
								foreach ($kategori as $kt) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$kt->nama_kat.'</td>
											<td>
											<a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/Kategori/hapus/'.$kt->id_kat.'"> Hapus </a>
											<a href="#" onclick="prepare_ubah_kategori('.$kt->id_kat.')" data-toggle="modal" data-target="#modal_ubah_kategori" class="btn btn-success btn-md"> Edit </a></td>
											</td>
										</tr>
									';
									$no++;
								}
							?>
								
						</table>
                                <?php if($this->session->flashdata('pesan')!=null): ?>
                                <div class= "alert alert-success"><?= $this->session->flashdata('pesan');?></div>
                                <?php endif?>
                              </div>
                              </div>
                          </div>

<div id="modal_tambah_kategori" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <form action="<?php echo base_url('index.php/Kategori/tambah'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="text" class="form-control" placeholder="Nama" name="nama_kat">
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<div id="modal_ubah_kategori" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Kategori</h4>
      </div>
      <form action="<?php echo base_url('index.php/Kategori/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id" id="ubah_id">
	        	<input type="text" class="form-control" placeholder="Nama" name="ubah_nama" id="ubah_nama">
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	
	function prepare_ubah_kategori(id_kat)
	{
		$.getJSON('<?php echo base_url(); ?>index.php/kategori/json_data_kategori_by_id/' + id_kat,  function(data){
			$("#ubah_nama").val(data.nama_kat);
			$("#ubah_id").val(data.id_kat);
		});
	}

</script>
