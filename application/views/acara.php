<div id="alert_container">
	<?php if($success) { ?>
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-ok"></span> <?=$success;?>
		</div>
	<?php } else if($error) { ?>
		<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<span class="glyphicon glyphicon-remove"></span> <?=$error;?>
		</div>
	<?php } ?>
</div>

<div class="panel panel-default">
	<div class="panel-heading" style="text-transform: uppercase; font-weight: bold;">
		<span class="fa fa-users"></span> Detail Acara Gamais ITB
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<h2 style="margin-top:-0.23em; font-weight:bold;"><?=$info_acara->nama_acara;?></h2>
			</div>
			<div class="col-mid-12">
				<div class="col-md-2">
					<img id="imgPhoto" src="<?=$logo_acara?>" alt="" style="padding-bottom:0.5em; width: 100%; height: auto; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;">
					<a href="<?=$base_path;?>updateAcara" class="btn btn-primary btn-sm btn-block">
						<span class="glyphicon glyphicon-pencil"></span> Ubah Informasi
					</a>
					<a class="btn btn-primary btn-sm btn-block" id="btn_ubah_photo" style="margin-top: 3px;">
						<span class="glyphicon glyphicon-picture"></span> Upload Foto
					</a>
				</div>
				<div class="col-md-10">
					<span style="font-weight:bold;">Deskripsi Acara : </span>
					<h4 style="margin-top:-0.1em"><?=$info_acara->deskripsi;?></h4>
					<span style="font-weight:bold;">Tanggal Pelaksanaan : </span>
					<p style="margin-top:-0.2em"><?=$info_acara->tanggal;?></p>
					<span style="font-weight:bold;">Target Peserta : </span>
					<span style="margin-top:-0.20em"><?=$info_acara->target;?></span>
				</div>
			</div>
		</div>
	</div>
		<!-- /.row -->
</div>
<div class="panel panel-default">
	<div class="panel-heading" style="text-transform: uppercase; font-weight: bold;">
		<span class="fa fa-users"></span> Presensi Kader Gamais ITB
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
	  			<?php echo form_open('main/konfirmasi');?>
	  			<form id="konfirmasi">
					<div class="input-group">
					    <input type="text" class="form-control" id="nim" name="nim" autocomplete="on" placeholder="Masukkan Nim...">
					    <span class="input-group-btn">
						    <button class="btn btn-default" value="input" type="submit">Konfirmasi</button>
					    </span>
					</div>
	  			</form>
			</div>
			<div class="col-md-12">
				<div style="padding-top: 1em;" class="dataTable_wrapper">
					<table class="table table-bordered table-hover" id="tabel_presensi">
						<thead>
							<tr>
								<th>Nama Lengkap</th>
								<th>NIM</th>
								<th>Jurusan</th>
								<th>Angkatan</th>
								<th>Handphone</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody id="tabel_acara_presensi">
							<?php foreach($hadir as $kader) { ?>
								<tr data-id="<?=$kader->id;?>" data-nama="<?=$kader->nama_lengkap;?>">
									<td><a href="<?=$base_path;?>seeInfoKader/<?=$kader->id;?>"><?=$kader->nama_lengkap;?></a></td>
									<td><?=$kader->nim;?></td>
									<td><?=$kader->jurusan;?></td>
									<td><?=$kader->angkatan;?></td>
									<td><?=$kader->hp;?></td>
									<td><a href="#" class="btn-hapus-entri-presensi"><span class="glyphicon glyphicon-remove" style="color: red;"></span></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>
</div>
		<script>
				$(document).ready(function(){
				  $("#nim").autocomplete({
				  source: "<?=site_url('/main/get_data')?>",
				  minLength : 1
				 });
				});
		</script>
		<!-- Modal -->
				<div class="modal fade" id="modal_presensi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="modal_presensi_label">Hapus presensi</h4>
					  </div>
					  <div class="modal-body">
						<p id="label_hapus_presensi">...</p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" id="btn_batal_presensi">Batal</button>
						<button type="button" class="btn btn-danger" id="btn_hapus_presensi">Hapus</button>
					  </div>
					</div>
				  </div>
				</div>
				<div class="modal fade" id="modal_photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="modal_photo_label">Upload Foto</h4>
                          </div>
                          <div class="modal-body">
                                <form id='form_upload_photo' enctype='multipart/form-data'>
                                      <input type="file" name="userfile" size="20" />
                                </form>
                          </div>
                          <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="btn_upload_photo">Upload</button>
                          </div>
                        </div>
                  </div>
                </div>
		<script src="<?=$assets;?>js/profil_acara.js"></script>
		<!--<script src="<?=$assets;?>js/modulseeallkader.js"></script>-->
		<script>
			setupPhoto('<?=base_url('/upload/upload_foto')?>');
			setImgIdPhoto(<?=$id_acara?>);
		</script>
		<script>
			function sendSuccess(msg)
			{
				$( '#alert_container' ).html
				(
					"<div class='alert alert-success alert-dismissable'>" +
						"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" +
						"<span class='glyphicon glyphicon-ok'></span> " + msg +
					"</div>"
				);
			}
			
			function sendError(msg)
			{
				$( '#alert_container' ).html
				(
					"<div class='alert alert-danger alert-dismissable'>" +
						"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" +
						"<span class='glyphicon glyphicon-remove'></span> " + msg +
					"</div>"
				);
			}
		</script>
		<script src="<?=$assets;?>js/modulpresensi.js"></script>
		<script>
			$(document).ready(function() {
				$('#tabel_presensi').DataTable();
			});
			
			
			setupSeeAllpresensi('<?=$base_path;?>deletePresensi_P');
		</script>
		
		<!-- /.scripts -->