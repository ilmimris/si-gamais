<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Main extends MY_Controller
{

	private $seeAllKaderGamaisPath;
	
	public function __construct()
	{
		parent::__construct();
		$this->base_path = base_url() . 'index.php/main/';
		$this->seeAllKaderGamaisPath = $this->base_path . 'seeAllKaderGamais';
		$this->load->dbforge();
		$this->load->model('mainmodel', 'm_m');
	}
	
	/*** FUNGSI-FUNGSI VIEW ***/
	
	public function addKader()
	{
		if (!parent::checkLoginState()) return;
		$this->displayView('addKader');
	}
	
	public function updateInfoKader()
	{
		if (!parent::checkLoginState()) return;

		$id_kader = $this->session->userdata('id_kader');
		$data = array
		(
			'info_kader' => $this->m_m->getInfoKader($id_kader),
			'id_kader' => $id_kader
		);
		
		$this->displayView('updateInfoKader', $data);
	}
	
	public function seeInfoKader($id_kader = null)
	{
		if (!parent::checkLoginState()) return;

		if($id_kader)
		{
			$this->session->set_userdata('id_kader', $id_kader);
		
			if (file_exists("./uploads/{$id_kader}.jpg"))
				$img="../../../uploads/{$id_kader}.jpg";
			else
				$img="../../../assets/img/img.jpg";

			$data = array
			(
				'id_kader' => $id_kader,
				'info_kader' => $this->m_m->getInfoKader($id_kader),
				'foto_kader' => $img,
				'riwayat_organisasi' => $this->m_m->getRiwayatOrganisasi($id_kader),
				'riwayat_kepanitiaan' => $this->m_m->getRiwayatKepanitiaan($id_kader),
				'riwayat_pembinaan' => $this->m_m->getRiwayatPembinaan($id_kader)
			);
			
			$this->displayView('seeInfoKader', $data);
		} else {
			$this->index();
		}
	}
	
	public function seeAllKaderGamais()
	{
		if (!parent::checkLoginState()) return;

		$data['all_kader_gamais'] = $this->m_m->getAllKaderGamais();
		$this->displayView('seeAllKaderGamais', $data);
	}
	public function listAcara()
	{
		if (!parent::checkLoginState()) return;
		$id_acara = $this->session->userdata('id_acara');
		$data['all_acara'] = $this->m_m->getAllAcaraGamais();
		$this->viewEvent('listAcara', $data);
	}
	public function acara($id_acara=null)
	{
		if (!parent::checkLoginState()) return;

		if($id_acara)
		{
			$this->session->set_userdata('id_acara', $id_acara);
		
			if (file_exists("./uploads/acara/{$id_acara}.jpg"))
				$img="../../../uploads/acara/{$id_acara}.jpg";
			else
				$img="../../../assets/img/img.jpg";
			$this->m_m->CreateTableAcara($id_acara);
			$data = array
			(
				'id_acara' => $id_acara,
				'info_acara' => $this->m_m->getInfoAcara($id_acara),
				'logo_acara' => $img,
				'hadir' => $this->m_m->getAllHadir($id_acara),
				'AllKader' => $this->m_m->getAllKaderGamais()
			);
			$this->viewEvent('acara', $data);
		} else {
			$data['all_acara'] = $this->m_m->getAllAcaraGamais();
			$this->viewEvent('listAcara', $data);
		}
	}
	public function addAcara()
	{
		if (!parent::checkLoginState()) return;
		$id_acara = $this->session->userdata('id_acara');
		//if (file_exists("./uploads/{$id_acara}.jpg"))
		//		$img="../../../uploads/{$id_acara}.jpg";
		//	else
		//		$img="../../assets/img/img.jpg";
		$data = array
			(
				'id_acara' => $id_acara,
				//'foto_acara' => $img
			);
		$this->viewEvent('addAcara',$data);
	}
	public function updateAcara()
	{
		if (!parent::checkLoginState()) return;

		$id_acara = $this->session->userdata('id_acara');
		$data = array
		(
			'info_acara' => $this->m_m->getInfoAcara($id_acara),
			'id_acara' => $id_acara
		);
		
		$this->viewEvent('updateAcara', $data);
	}
	public function index()
	{
		if (!parent::checkLoginState()) return;

		$this->seeAllKaderGamais();
	}
	
	/*** FUNGSI-FUNGSI PROSES ***/
	
	public function addKader_P()
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->addKader($_POST);
		echo $state;
		
		$this->notifyState($state, 'Kader baru berhasil ditambahkan', 'Penambahan kader gagal dilakukan');
	}
	
	public function addOrganisasi_P()
	{
		if (!parent::checkLoginState()) return;

		$id_kader = $this->session->userdata('id_kader');
		$state = $this->m_m->addOrganisasi($id_kader, $_POST);
		$this->notifyStateAJAX($state);
	}
	
	public function addKepanitiaan_P()
	{
		if (!parent::checkLoginState()) return;

		$id_kader = $this->session->userdata('id_kader');
		$state = $this->m_m->addKepanitiaan($id_kader, $_POST);
		$this->notifyStateAJAX($state);		
	}
	
	public function addPembinaan_P()
	{
		if (!parent::checkLoginState()) return;

		$id_kader = $this->session->userdata('id_kader');
		$state = $this->m_m->addPembinaan($id_kader, $_POST);
		$this->notifyStateAJAX($state);
	}
	
	public function updateInfoKader_P()
	{
		if (!parent::checkLoginState()) return;

		$id_kader = $this->session->userdata('id_kader');
		$state = $this->m_m->updateInfoKader($id_kader, $_POST);
		$this->notifyState($state, 'Informasi kader berhasil diubah', 'Tidak ada perubahan pada informasi kader');		
	}
	
	public function updateOrganisasi_P($id_entry)
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->updateOrganisasi($id_entry, $_POST);
		$this->notifyStateAJAX($state);		
	}
	
	public function updateKepanitiaan_P($id_entry)
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->updateKepanitiaan($id_entry, $_POST);
		$this->notifyStateAJAX($state);		
	}
	
	public function updatePembinaan_P($id_entry)
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->updatePembinaan($id_entry, $_POST);
		$this->notifyStateAJAX($state);	
	}
	
	public function deletePembinaan_P($id_entry)
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->deletePembinaan($id_entry);
		$this->notifyStateAJAX($state);
	}
	
	public function deleteOrganisasi_P($id_entry)
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->deleteOrganisasi($id_entry);
		$this->notifyStateAJAX($state);
	}
	
	public function deleteKepanitiaan_P($id_entry)
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->deleteKepanitiaan($id_entry);
		$this->notifyStateAJAX($state);
	}
	
	public function deleteKader_P($id_kader)
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->deleteKader($id_kader);
		$this->notifyStateAJAX($state);
	}
	//Code Acara by Mr.Is
	public function deleteAcara_P($id_acara)
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->deleteAcara($id_acara);
		$this->notifyStateAJAX($state);
	}
	public function deletePresensi_P($id_kader)
	{
		if (!parent::checkLoginState()) return;
		$id_acara = $this->session->userdata('id_acara');

		$state = $this->m_m->deletePresensi($id_kader, $id_acara);
		$this->notifyStateAJAX($state);
	}
	public function addAcara_P()
	{
		if (!parent::checkLoginState()) return;

		$state = $this->m_m->addAcara($_POST);
		echo $state;
		
		$this->notifyState($state, 'Acara baru berhasil ditambahkan', 'Penambahan Acara gagal dilakukan');
	}
	public function updateAcara_P()
	{
		if (!parent::checkLoginState()) return;

		$id_acara = $this->session->userdata('id_acara');
		$this->m_m->updateAcara($id_acara, $_POST);
		//$this->notifyState($state, 'Tidak ada perubahan pada informasi acara', 'Informasi acara berhasil diubah');		
	}
	public function konfirmasi()
	{
		if (!parent::checkLoginState()) return;

		$id_acara = $this->session->userdata('id_acara');
		$nim = $this->input->post('nim');
		$this->m_m->konfirmasi($nim, $id_acara);
		redirect('/main/acara/' . $id_acara . '/');
		//$state = $this->m_m->konfirmasi($id_acara, $_POST);
		//$this->notifyState($state, 'Informasi kehadiran berhasil diubah', 'Tidak ada perubahan pada informasi kehadiran');	
	}
	function get_data(){
	    $q = $this->input->get('term');
		$data['response'] = 'false'; //Set default response
		 
		$query = $this->m_m->get_data($q); 

		if($query->num_rows() > 0){
			$data['response'] = 'true'; //Set response
			$data['results'] = array(); //Create array
			foreach($query->result() as $row){
				$data['results'][] = array('label'=> $row->nim . " " . $row->nama_lengkap,
				'value'=> $row->nim,
				'id' => $row->id); //Add a row to array
			}
		}
		echo json_encode($data['results']);
	}
   /*Export Import CSV*/
    function download()
    {
        $i=0;
        $data = array();
        $this->load->model('mainmodel','', TRUE);
        $list = $this->mainmodel->getAllKaderGamais(); //contoh query
        $data[0] = array(/*'id', */'nim', 'nama_lengkap', 'jurusan', 'angkatan', 'hp');
        
        foreach ($list as $row) {        
            $data[++$i] = array(/*$i,*/ $row->nim, $row->nama_lengkap, $row->jurusan, $row->angkatan, $row->hp, );
        } 
        $this->load->helper('csv');
        echo array_to_csv($data,'Data-Kader-Gamais.csv');                    
        die();
        redirect('main','refresh');
    }
    function db_upload()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            {
                $this->load->model('mainmodel','',TRUE);
               	/*$user = $session_data['username'];*/
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'csv';
                $config['max_size'] = '1000';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload())
                {
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                }
                else
                {
                    $data = $this->upload->data();
                    $this->load->library('csvreader');
                    $result = $this->csvreader->parse_file($data['full_path']);//path to csv file
                    //var_dump($result);
                    foreach ($result as $csvRow) {
                        $this->mainmodel->insertData($csvRow);
                    }
                    redirect('main', 'refresh');
                }
            }
        }
        else
        {
            redirect('main', 'refresh');
        }
    }
    function upload_foto($id="")
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
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
        }
        else
        {
            redirect('main', 'refresh');
        }
    }	
}

?>
