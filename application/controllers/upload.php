<?php

class Upload extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload($id="")
	{
		if ($id=="") return;

		$data = array();

		$error = "";
		$files = array();

		$uploaddir = './uploads/';
		foreach($_FILES as $file)
		{
			if ($file['type']!='image/jpeg') 
			{
				$error = "Format foto harus JPG/JPEG."; continue;
			}
			else if ($file['size'] > 524288)
			{
				$error = "Ukuran foto harus kurang dari 500KB."; continue;
			}

			if(move_uploaded_file($file['tmp_name'], $uploaddir.$id.'.jpg'))
				$files[] = $id.'.jpg';
			else
				$error = "File tidak berhasil diunggah.";
		}
		
		$data = ($error!="") ? array('error' => $error) : array('files' => $files);
		
		echo json_encode($data);
	}
	function upload_foto($id="")
	{
		if ($id=="") return;

		$data = array();

		$error = "";
		$files = array();

		$uploaddir = './uploads/acara/';
		foreach($_FILES as $file)
		{
			if ($file['type']!='image/jpeg') 
			{
				$error = "Format foto harus JPG/JPEG."; continue;
			}
			else if ($file['size'] > 524288)
			{
				$error = "Ukuran foto harus kurang dari 500KB."; continue;
			}

			if(move_uploaded_file($file['tmp_name'], $uploaddir.$id.'.jpg'))
				$files[] = $id.'.jpg';
			else
				$error = "File tidak berhasil diunggah.";
		}
		
		$data = ($error!="") ? array('error' => $error) : array('files' => $files);
		
		echo json_encode($data);
	}
}
?>
