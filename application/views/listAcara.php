<div id="alert_container"></div>

<div class="panel panel-default">
	<div class="panel-heading" style="text-transform: uppercase; font-weight: bold;">
		<span class="fa fa-users"></span> Acara Gamais ITB
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-12">
				<div class="dataTable_wrapper">
					<table class="table table-bordered table-hover" id="tabel_acara">
						<thead>
							<tr>
								<th>Nama Acara</th>
								<th>Deskripsi</th>
								<th>Target</th>
								<th>Tanggal</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody id="tabel_acara_data">
							<?php foreach($all_acara as $event) { ?>
								<tr data-id="<?=$event->id;?>" data-nama="<?=$event->nama_acara;?>">
									<td><a href="<?=$base_path;?>acara/<?=$event->id;?>"><?=$event->nama_acara;?></a></td>
									<td><?=$event->deskripsi;?></td>
									<td><?=$event->target;?></td>
									<td><?=$event->tanggal;?></td>
									<td><a href="#" class="btn-hapus-entri-acara"><span class="glyphicon glyphicon-remove" style="color: red;"></span></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
				
				<!-- modal -->
				<!-- modal -->
				<div class="modal fade" id="modal_acara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="modal_acara_label">Hapus Kader</h4>
					  </div>
					  <div class="modal-body">
						<p id="label_hapus_acara">...</p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" id="btn_batal_acara">Batal</button>
						<button type="button" class="btn btn-danger" id="btn_hapus_acara">Hapus</button>
					  </div>
					</div>
				  </div>
				</div>
				
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		
		<!-- scripts -->
		<script src="<?=$assets;?>js/modulseeallacara.js"></script>
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
		<script>
			$(document).ready(function() {
				$('#tabel_acara').DataTable();
			});
			
			
			setupSeeAllAcara('<?=$base_path;?>deleteAcara_P');
		</script>
	</div>
</div>