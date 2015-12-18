var pathDelete;

var currentElement;

function applyListener(element)
{
	$(element).find('.btn-hapus-entri-acara').click(function(){
		currentElement = $(this).parents('tr');
		nama = $(currentElement).data('nama');
		$('#label_hapus_acara').html('Hapus entri acara <b>' + nama + "</b>?");
		$( '#modal_acara' ).modal('show');
		
	});
}

function setupSeeAllAcara(del)
{
	pathDelete = del;
	
	$( '#btn_batal_acara' ).click(function(){
		closeModalAcara();
	});
	
	$( '#btn_hapus_acara' ).click(function(){
		id_entry = $(currentElement).data('id');
		nama = $(currentElement).data('nama');
		
		$.post(pathDelete + '/' + id_entry, '', function(){
			$(currentElement).remove();
			sendSuccess('Entri acara ' + nama + ' berhasil dihapus');
			closeModalAcara();
		});
	});
	
	applyListener($('#tabel_acara_data > tr'));
}

function closeModalAcara()
{
	$( '#modal_acara' ).modal('hide');
}