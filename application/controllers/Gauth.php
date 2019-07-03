<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gauth extends CI_Controller {
     function __construct(){
        parent::__construct();
        
        
        // Load user model
        $this->load->model('user_model');
    }
    
    public function index(){

        
        if (isset($_POST['user'])) {
            //Decodifica el json enviado a través de js
            $user=json_decode($_POST['user'],true);
            //Le agrego un elemento al array para el estado de la sesión del usuario
            $this->session->set_userdata('loggedIn', true);
            //Setea una sesión con los datos rescatados al momento del signin con google
            $this->session->set_userdata('user',$user);

        }
        

    }
    
    public function profile(){
        // Redirect to login page if the user not logged in
        if(!$this->session->userdata('loggedIn')){
            redirect('/gauth/');
        }
        
        // Get user info from session
        $data['user'] = $this->session->userdata('user');
        
        // Load user profile view
        $this->load->view('usuarios/perfil',$data);
    }
    
    public function logout(){        
        // Remove token and user data from the session
        $this->session->unset_userdata('loggedIn');
        $this->session->unset_userdata('user');
        
        // Destroy entire session data
        $this->session->sess_destroy();
        
        // Redirect to login page
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
    }
    
}