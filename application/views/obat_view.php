<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title"><b>Data Obat</b></h1>
                  <p class="card-description">
                  <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
									<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Cover</th>
									<th>Nama Obat</th> 
									<th>Kategori</th>
									<th>Exp</th>
									<th>Stok</th>
									<th>Harga</th>
									<th>Aksi</th>
								</tr>
                                <?php
                                $no=0;
                                foreach ($obat as $o) {
                                  $no++;
                                  echo '<tr>
																	<td>'.$no.'</td>
																	<td>'.$o->kode_obat.'</td>
																	<td><img src="'.base_url().'assets/images/cover_obat/'.$o->foto.'" width="50px" /></td>
																	<td>'.$o->nama_obat.'</td>
																	<td>'.$o->nama_kat.'</td>
																	<td>'.$o->tanggal_kadaluarsa.'</td>
																	<td>'.$o->stok.'</td>
																	<td>Rp '.$o->harga.',-</td>
																	<td>
																	<a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/Obat/hapus/'.$o->id_obat.'"> Hapus </a>
																	<a href="#" onclick="prepare_ubah_obat('.$o->id_obat.')" data-toggle="modal" data-target="#ubah" class="btn btn-success btn-md"> Edit </a></td>
																	</td>
																</tr>';
                                }
                                ?>

    <div class="modal fade" id="tambah">
    <div class="modal-dialog">
		<div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Obat</h4>
      </div>
      <form action="<?php echo base_url('index.php/Obat/add_obat'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	      		<input type="text" class="form-control" placeholder="Kode obat" name="kode_obat">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Nama Obat" name="nama_obat">
	        	<br>
	        	<input type="date" class="form-control" placeholder="Tanggal Kadaluarsa" name="tanggal_kadaluarsa">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Stok" name="stok">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Harga" name="harga">
	        	<br>
						<select name="kategori" class="form-control">
					<?php
						foreach ($kategori as $kt) {
							echo '
								<option value="'.$kt->id_kat.'">'.$kt->nama_kat.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<input type="file" class="form-control" placeholder="Foto" name="foto">
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
      	</form>
			</table>
			<?php if($this->session->flashdata('pesan')!=null): ?>
			<div class= "alert alert-success"><?= $this->session->flashdata('pesan');?></div>
			<?php endif?>
		</div>
	</div>
</div>



<div class="modal fade" id="ubah">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="<?php echo base_url() ?>index.php/obat/ubah" method="post">
      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Ubah Obat</h4>
        </div>

        <div class="modal-body">
        <input type="hidden" name="ubah_id_obat" id="ubah_id_obat">

          Kode Obat
          <input type="text" id="ubah_kode_obat" name="ubah_kode_obat" class="form-control"><br>
          Nama Obat
          <input type="text" id="ubah_nama_obat" name="ubah_nama_obat" class="form-control"><br>
          Tanggal Kadaluarsa
          <input type="text" id="ubah_tanggal_kadaluarsa" name="ubah_tanggal_kadaluarsa" class="form-control"><br>
          Stok Obat
          <input type="enum" id="ubah_stok" name="ubah_stok" class="form-control"><br>
          Harga Obat
          <input type="text" id="ubah_harga" name="ubah_harga" class="form-control"><br>
					Kategori Obat
          <select type="text" id="ubah_kategori" name="ubah_kategori" class="form-control"><br>
					<?php
						foreach ($kategori as $kt) {
							echo '
								<option value="'.$kt->id_kat.'">'.$kt->nama_kat.'</option>
							';
						}
					?>	        		
	        	</select>
	        	<br>
	        	<div id="data_foto"></div>
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
        function prepare_ubah_obat(id_obat) {
      $.getJSON('<?php echo base_url() ?>index.php/obat/json_obat_by_id/'+id_obat, function(data){
			$("#ubah_kode_obat").val(data.kode_obat);
      $("#ubah_nama_obat").val(data.nama_obat);
      $("#ubah_tanggal_kadaluarsa").val(data.tanggal_kadaluarsa);
      $("#ubah_stok").val(data.stok);
      $("#ubah_harga").val(data.harga);
			$("#ubah_kategori").val(data.id_kat);
      $("#data_foto").html('<img src="<?php echo base_url(); ?>assets/images/cover_obat/' + data.foto + '" width="50px" >');
      $("#ubah_id_obat").val(data.id_obat);
          });
        }
        </script>          
