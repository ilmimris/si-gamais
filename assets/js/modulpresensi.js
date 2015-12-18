var pathDelete;

var currentElement;

function applyListener(element)
{
	$(element).find('.btn-hapus-entri-presensi').click(function(){
		currentElement = $(this).parents('tr');
		nama = $(currentElement).data('nama');
		$('#label_hapus_presensi').html('Hapus presensi dari <b>' + nama + "</b>?");
		$( '#modal_presensi' ).modal('show');
		
	});
}

function setupSeeAllpresensi(del)
{
	pathDelete = del;
	
	$( '#btn_batal_presensi' ).click(function(){
		closeModalpresensi();
	});
	
	$( '#btn_hapus_presensi' ).click(function(){
		id_entry = $(currentElement).data('id');
		nama = $(currentElement).data('nama');
		
		$.post(pathDelete + '/' + id_entry, '', function(){
			$(currentElement).remove();
			sendSuccess('Presensi dari ' + nama + ' berhasil dihapus');
			closeModalpresensi();
		});
	});
	
	applyListener($('#tabel_acara_presensi > tr'));
}

function closeModalpresensi()
{
	$( '#modal_presensi' ).modal('hide');
}