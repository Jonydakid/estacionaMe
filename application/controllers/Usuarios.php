<?php

class Usuarios extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Usuarios_model');
                $this->load->helper('url_helper');
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

                $data['title'] = $data['usuarios']['title'];

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
}