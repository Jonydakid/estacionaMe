<?php

class Usuarios extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Usuarios_model');
                $this->load->helper('url_helper');
                $this->load->library(array('session'));
        }


        public function index()
        {
            $data['usuarios'] = $this->Usuarios_model->get_usuarios();
            $data['title'] = 'Usuarios';

            $this->load->view('templates/header', $data);
            $this->load->view('usuarios/index', $data);
            $this->load->view('templates/footer');
        }

     public function view()
        {
                $data['usuarios'] = $this->Usuarios_model->get_usuarios();

                if (empty($data['usuarios']))
                {
                        show_404();
                }

                

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/view', $data);
                $this->load->view('templates/footer');
        }
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Crear Usuarios';

            $this->form_validation->set_rules('nomUsuario', 'nomUsuario', 'required');
            $this->form_validation->set_rules('contraseña', 'contraseña', 'required');
			$this->form_validation->set_rules('rol', 'rol', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->Usuarios_model->set_usuarios();
                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/success');
                $this->load->view('templates/footer');

            }
        }

        public function edit($id){
                 $data['row'] = $this->Usuarios_model->getById($id);

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/edit', $data);
                $this->load->view('templates/footer');
        }
        public function update($id){
            $this->Usuarios_model->updateData($id);
            redirect("Usuarios");

        }
        public function delete($id){

            $this->Usuarios_model->deleteData($id);
            redirect("Usuarios");
        }

        public function registrar() {
        
        // create the data object
        $data = new stdClass();
        
        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // set validation rules
        $this->form_validation->set_rules('nomUsuario', 'nomUsuario', 'trim|required|alpha_numeric|min_length[4]|is_unique[usuarios.nomUsuario]', array('is_unique' => 'El nombre de usuario ya existe.'));
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[usuarios.email]');
        $this->form_validation->set_rules('contraseña', 'contraseña', 'trim|required|min_length[6]');
         $this->form_validation->set_rules('rol', 'rol', 'required');
       
        $this->form_validation->set_rules('confirmarPass', 'confirmarPass', 'trim|required|min_length[6]|matches[contraseña]');
        
        if ($this->form_validation->run() === false) {
            
            // validation not ok, send validation errors to the view
            $this->load->view('templates/header');
            $this->load->view('usuarios/auth/registrar', $data);
            $this->load->view('templates/footer');
            
        } else {
            
            // set variables from the form
            $nomUsuario = $this->input->post('nomUsuario');
            $email    = $this->input->post('email');
            $contraseña = $this->input->post('contraseña');
            $rol = $this->input->post('rol');
            if ($this->Usuarios_model->set_usuarios($nomUsuario, $email,$contraseña,$rol)) {

                if ($this->Usuarios_model->verificarLogin($nomUsuario, $contraseña)) {
                
                    $id      = $this->Usuarios_model->getIdByNomUsuario($nomUsuario);
                    $usuario = $this->Usuarios_model->getById($id);
                    
                    $_SESSION['id']      = (int)$usuario->id;
                    $_SESSION['nomUsuario']     = (string)$usuario->nomUsuario;
                    $_SESSION['logged_in']    = (bool)true;
                    
                    if ($rol == 1) {
                        
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/admin', $data);
                        $this->load->view('templates/footer');
                    }elseif ($rol == 2) {
                        
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/arrendador', $data);
                        $this->load->view('templates/footer');
                    }elseif ($rol == 3) {
                        
                        $this->load->view('templates/header', $data);
                        $this->load->view('usuarios/arrendatario', $data);
                        $this->load->view('templates/footer');
                    } 
                }
                
            } else {
                
                // user creation failed, this should never happen
                $data->error = 'Problema al crear el usuario intentelo denuevo.';
                
                // send error to the view
                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/auth/registrar', $data);
                $this->load->view('templates/footer');
                
            }
            
        }
        
    }
        
    /**
     * login function.
     * 
     * @access public
     * @return void
     */
    public function login() {
        
        // create the data object
        $data = new stdClass();
        
        // load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        // set validation rules
        $this->form_validation->set_rules('nomUsuario', 'nomUsuario', 'required');
        $this->form_validation->set_rules('contraseña', 'contraseña', 'required');
            
        if ($this->form_validation->run() == false) {
            
            // validation not ok, send validation errors to the view
            $this->load->view('templates/header');
            $this->load->view('usuarios/auth/login');
            $this->load->view('templates/footer');
            
        } else {


            $nomUsuario = $this->input->post('nomUsuario');
            $contraseña = $this->input->post('contraseña');
                          
            if ($this->Usuarios_model->verificarLogin($nomUsuario, $contraseña)) {
                
                $id      = $this->Usuarios_model->getIdByNomUsuario($nomUsuario);
                $usuario = $this->Usuarios_model->getById($id);
                
                $_SESSION['id']      = (int)$usuario->id;
                $_SESSION['nomUsuario']     = (string)$usuario->nomUsuario;
                $_SESSION['logged_in']    = (bool)true;
                
                $rol = $this->Usuarios_model->getRolById($id);
                // user login ok
                if ($rol == 1) {
                    
                    $this->load->view('templates/header', $data);
                    $this->load->view('usuarios/admin', $data);
                    $this->load->view('templates/footer');
                }elseif ($rol == 2) {
                    
                    $this->load->view('templates/header',$data);
                    $this->load->view('usuarios/arrendador', $data);
                    $this->load->view('templates/footer');
                }elseif ($rol == 3) {
                    
                    $this->load->view('templates/header', $data);
                    $this->load->view('usuarios/arrendatario', $data);
                    $this->load->view('templates/footer');
                }
                            
            } else {
                
                // login failed
                $data->error = 'Usuario o contraseña invalido.';
                
                // send error to the view
                $this->load->view('templates/header');
                $this->load->view('usuarios/auth/login', $data);
                $this->load->view('templates/footer');
                
            }

            
        }
        
    }
    
    /**
     * logout function.
     * 
     * @access public
     * @return void
     */
    public function logout() {
        
        // create the data object
        $data = new stdClass();
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            
            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            
            // user logout ok
            $this->load->view('templates/header', $data);
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
            
        } else {
            
            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('/');
            
        }
        
    }
}