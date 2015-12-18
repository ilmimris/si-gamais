/*** CRUD Riwayat Organisasi ***/

var ctxIdPhoto;
var pathUploadPhoto;
var files;

function prepareUpload(event)
{
	files = event.target.files;
}

function setImgIdPhoto(val)
{
	ctxIdPhoto = val;
}

function updatePhoto(cb)
{
	form_data = new FormData();
	$.each(files, function(key, value)
	{
		form_data.append(key, value);
	});

	$.ajax({
		url: pathUploadPhoto+'/'+ctxIdPhoto,
		type: 'POST',
		data: form_data,
		processData: false,
      		contentType: false,
		success: function(data, textStatus, jqXHR)
		{
			if(typeof data.error === 'undefined')
				setTimeout(function(){updateNow(data)},50);
			else
				console.log('ERRORS: ' + data.error);
			cb();
			location.reload();//buat refresh page
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			console.log('ERRORS: ' + textStatus);
			cb();
		}
	});
}

function updateNow(data)
{
	obj = JSON.parse(data);

	if (typeof obj.error == 'undefined')
		$('#imgPhoto').attr('src', '/uploads/' + obj.files + '?'+ new Date().getTime());
	else
		setTimeout(function(){alert(obj.error)},50);
} 

function closeModalPhoto()
{
	$('#modal_photo').modal('hide');
	clearModalPhoto();
}

function clearModalPhoto()
{
	$('input[type=file]').reset();
}

function setupPhoto(url)
{	
	pathUploadPhoto = url;

	$('#btn_ubah_photo' ).click(function(){
		$('#modal_photo').modal('show');
	});

	$('#btn_upload_photo' ).click(function(){
		updatePhoto(function(){
			$('#modal_photo').modal('hide');
		});	
	});

	$('#modal_photo_label').html('Upload Foto');
	$('input[type=file]').on('change', prepareUpload);
}
