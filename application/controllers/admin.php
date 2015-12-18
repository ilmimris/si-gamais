<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
 
 public function __construct()
 {
   parent::__construct();
 }
 
 public function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback__check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $data['assets'] = base_url() . 'assets/';
     $this->load->view('loginView', $data);
   }
   else
   {
     redirect(site_url('main'), 'refresh');
   }
 }

 public function sign_out()
 {
  $this->session->sess_destroy();
  redirect(base_url('admin'));
 }

 public function _check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
   $result = $this->model_admin->check($username, MD5($password));
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'username' => $row->username,
	 'password' => MD5($password)
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'user/password belum terdaftar.');
     return FALSE ;
   }
 }

}
?>
