<?php

class Direcciones extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Direcciones_model');
                $this->load->helper('url_helper');
        }


        public function index()
        {
            $data['direcciones'] = $this->Direcciones_model->get_direcciones();

        $this->load->view('templates/header', $data);
        $this->load->view('direcciones/index', $data);
        $this->load->view('templates/footer');
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Crear Direccion';

            $this->form_validation->set_rules('Region', 'Region', 'required');
            $this->form_validation->set_rules('Comuna', 'Comuna', 'required');
            $this->form_validation->set_rules('Calle', 'Calle', 'required');
            $this->form_validation->set_rules('idUsuario', 'idUsuario', 'required');ç

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('direcciones/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->Direcciones_model->set_direcciones();
                $this->load->view('templates/header', $data);
                $this->load->view('direcciones/success');
                $this->load->view('templates/footer');

            }
        }

        public function edit($id){
                 $data['row'] = $this->Direcciones_model->getById($id);

                $this->load->view('templates/header', $data);
                $this->load->view('direcciones/edit', $data);
                $this->load->view('templates/footer');
        }
        public function update($id){
            $this->Direcciones_model->updateData($id);
            redirect("Direcciones");

        }
        public function delete($id){

            $this->Direcciones_model->deleteData($id);
            redirect("Direcciones");
        }
}