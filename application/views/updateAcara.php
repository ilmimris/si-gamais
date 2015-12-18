<div class="panel panel-default">
	<div class="panel-heading" style="text-transform: uppercase; font-weight: bold;">
		<span class="fa fa-plus-circle"></span> Update Info Acara
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Nama Acara:</label>
					<input value="<?=$info_acara->nama_acara;?>" id="nama_acara" type="text" class="form-control" placeholder="Masukkan nama acara disini...">
				</div>
				<div class="form-group">
					<label for="">Deskripsi Acara:</label>
					<input value="<?=$info_acara->deskripsi;?>" id="deskripsi" type="text" class="form-control" placeholder="Masukkan deskripsi acara disini...">
				</div>												
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Tanggal Acara:</label> 
					
					<div class="row">
						<div class="col-md-3">
							<label for=""><small>Tanggal</small></label>
							<input value="<?=intval(date('d', strtotime($info_acara->tanggal)))?>" id="tanggal_acara" type="text" class="form-control" placeholder="5">
						</div>
						<div class="col-md-5" style="padding-left: 0; padding-right: 0;">
							<label for=""><small>Bulan</small></label>
							<?php 
								$bulan = intval(date('m', strtotime($info_acara->tanggal)));
							?>
							<select name="" id="bulan_acara" class="form-control">
								<option value="1" <?php if($bulan == 1) echo 'selected';?>>Januari</option>
								<option value="2" <?php if($bulan == 2) echo 'selected';?>>Februari</option>
								<option value="3" <?php if($bulan == 3) echo 'selected';?>>Maret</option>
								<option value="4" <?php if($bulan == 4) echo 'selected';?>>April</option>
								<option value="5" <?php if($bulan == 5) echo 'selected';?>>Mei</option>
								<option value="6" <?php if($bulan == 6) echo 'selected';?>>Juni</option>
								<option value="7" <?php if($bulan == 7) echo 'selected';?>>Juli</option>
								<option value="8" <?php if($bulan == 8) echo 'selected';?>>Agustus</option>
								<option value="9" <?php if($bulan == 9) echo 'selected';?>>September</option>
								<option value="10" <?php if($bulan == 10) echo 'selected';?>>Oktober</option>
								<option value="11" <?php if($bulan == 11) echo 'selected';?>>November</option>
								<option value="12" <?php if($bulan == 12) echo 'selected';?>>Desember</option>
							</select>
						</div>
						<div class="col-md-4">
							<label for=""><small>Tahun</small></label>
							<input value="<?=intval(date('Y', strtotime($info_acara->tanggal)))?>" id="tahun_acara" type="text" class="form-control" placeholder="2015">
						</div>
					</div>
					<div class="form-group" style="padding-top:0.25em;">
						<label for="">Target Peserta:</label> 
						<input value="<?=$info_acara->target;?>" id="target" type="text" class="form-control" placeholder="Masukkan jurusan disini...">
					</div>													
					
					<!--
						<input id="tanggal_lahir" type="text" class="form-control" placeholder="Masukkan tanggal lahir disini...">
					-->
				</div>
			</div>
			<div class="col-md-12">
				<a id="btn_simpan_entry" href="#" class="btn btn-primary btn-block" style="padding: 18px;">
					<span class="fa fa-save"></span> Update Data
				</a>
			</div>
		</div>
		<!-- /.row -->
		
		<!-- modals -->
		<div class="modal fade" id="modal_konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="modal_acara">Update Data?</h3>
			  </div>
			  <div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="">Nama Acara:</label>
							<p id="nama_acara_k"></p>
						</div>
						<div class="form-group">
							<label for="">Deskripsi Acara:</label>
							<p id="deskripsi_k"></p>
						</div>								
						<div class="form-group">
							<label for="">Tanggal Acara:</label> 
							<p id="tanggal_k"></p>
						</div>
						<div class="form-group">
							<label for="">Target Peserta:</label> 
							<p id="target_k"></p>
						</div>
					</div>
				</div>	
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" id="btn_batal" data-dismiss="modal">Batal</button>
				<a href="#" class="btn btn-primary" data-id="<?=$id_acara;?>" id="btn_update">Update</a>
			  </div>
			</div>
		  </div>
		</div>

		<div class="modal fade" id="modal_informasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-red" id="modal_organisasi_label"><span class="glyphicon glyphicon-remove"></span> Data Tidak Lengkap</h4>
			  </div>
			  <div class="modal-body">
				<p>Data yang diisikan tidak lengkap, pastikan seluruh data telah terisi.</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
			  </div>
			</div>
		  </div>
		</div>
		<!-- /.modals -->

		<!-- scripts -->
		<script src="<?=$assets;?>js/modulformaddacara.js"></script>
		<script>
			setUpdateAcara('<?=$base_path?>updateAcara_P', '<?=$base_path;?>Acara');
		</script>
		<!-- ./scripts -->					
	</div>
</div>
