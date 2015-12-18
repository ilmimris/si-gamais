<div class="panel panel-default">
	<div class="panel-heading" style="text-transform: uppercase; font-weight: bold;">
		<span class="fa fa-plus-circle"></span> Tambah Acara
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<div class="form-group">
						<label for="">Nama Acara:</label>
						<input id="nama_acara" type="text" class="form-control" placeholder="Masukkan nama acara disini...">
					</div>
					<div class="form-group">
						<label for="">Deskripsi Acara:</label>
						<textarea id="deskripsi" type="text" class="form-control" placeholder="Masukkan deskripsi acara disini..."></textarea> 
					</div>									
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="">Tanggal Acara :</label> 
					<!--<input id="tanggal" type="text" class="form-control" placeholder="Masukkan tanggal acara disini...">-->
					<div class="row">
						<div class="col-md-3">
							<label for=""><small>Tanggal</small></label>
							<input id="tanggal_acara" type="text" class="form-control" placeholder="5">
						</div>
						<div class="col-md-5" style="padding-left: 0; padding-right: 0;">
							<label for=""><small>Bulan</small></label>
							<select name="" id="bulan_acara" class="form-control">
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
						<div class="col-md-4">
							<label for=""><small>Tahun</small></label>
							<input id="tahun_acara" type="text" class="form-control" placeholder="2015">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="">Target Peserta:</label> 
					<input id="target" type="text" class="form-control" placeholder="Masukkan target peserta disini...">
				</div>
			</div>
			<div class="col-md-12">
				<a id="btn_simpan_entry" href="#" class="btn btn-primary btn-block" style="padding: 18px;">
					<span class="fa fa-save"></span> Simpan Data
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
				<h3 class="modal-title" id="modal_acara">Simpan Data?</h3>
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
				<a href="#" class="btn btn-primary" id="btn_simpan">Simpan</a>
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
		<script>setupAddAcara('<?=$base_path;?>addAcara_P', '<?=$base_path;?>Acara');</script>				
	</div>
</div>
