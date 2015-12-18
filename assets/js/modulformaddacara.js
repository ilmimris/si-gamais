$(function(){

	$( '#btn_simpan_entry' ).click(function(){
		saveDataToPostVar();
		if(checkIsFormValid()) {
			prepareDataModalKonfirmasi();
			$( '#modal_konfirmasi' ).modal('show');
		} else {
			$( '#modal_informasi').modal('show');
		}
	});

	$( '#btn_batal' ).click(function(){
		clearPostVar();
	});

	$( '#btn_simpan' ).click(function(){
		sendDataToServer(pathAddAcara, redirectURL);
		clearPostVar();
	});

	$( '#btn_update' ).click(function(){
		id_acara = $(this).data('id');
		
		$.post(pathUpdateAcara + '/' + id_acara, postVar, function(state){
			console.log(state);
			window.location.replace(redirectURL + '/' + id_acara);
		});
	});

});

function setupAddAcara(pg, url)
{
	pathAddAcara = pg;
	redirectURL = url;
}

function setUpdateAcara(pg, url)
{
	pathUpdateAcara = pg;
	redirectURL = url;
}

var pathAddAcara;
var pathUpdateAcara;
var redirectURL;

var postVar = {
	nama_acara: '',
	deskripsi: '',
	target: '',
	tanggal: '', 
}

function clearPostVar()
{
	postVar = 
	{
		nama_acara: '',
		deskripsi: '',
		target: '',
		tanggal: ''
	}
}

function saveDataToPostVar()
{
	postVar.nama_acara = $( '#nama_acara' ).val();
	postVar.deskripsi = $( '#deskripsi' ).val();
	postVar.target = $( '#target' ).val();
	postVar.tanggal = constructTanggal($( '#tanggal_acara' ).val(), $( '#bulan_acara' ).val(), $( '#tahun_acara' ).val());
}
function constructTanggal(day, month, year)
{
	var myDate = new Date(year, month - 1, day);
	return myDate.format('Y-m-d'); 
}

function prepareDataModalKonfirmasi()
{
	$( '#nama_acara_k' ).html(postVar.nama_acara);
	$( '#deskripsi_k' ).html(postVar.deskripsi);
	$( '#target_k' ).html(postVar.target);
	$( '#tanggal_k' ).html(postVar.tanggal);

}

function paintParagraph(obj, state)
{
	clearColorClass(obj);
	switch(state)
	{
		case 0:
			$(obj).addClass('text-red');
			break;
		case 1:
			$(obj).addClass('text-yellow');
			break;
		case 2:
			$(obj).addClass('text-blue');
			break;
		case 3:
			$(obj).addClass('text-green');
			break;
	}
}

function clearColorClass(obj)
{
	$(obj).removeClass('text-red');
	$(obj).removeClass('text-yellow');
	$(obj).removeClass('text-blue');
	$(obj).removeClass('text-green');
}

function checkIsFormValid()
{
	return (postVar.nama_acara != '') && (postVar.deskripsi != '') && (postVar.target != '') && (postVar.tanggal != '') ;
}

function sendDataToServer(pathAddAcara, redirectURL)
{
	$.post(pathAddAcara, postVar, function(id){
		//console.log(id);
		window.location.replace(redirectURL + '/' + id);
	})
}