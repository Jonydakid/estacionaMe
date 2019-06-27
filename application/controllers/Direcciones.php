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
        $data['title'] = 'Direccion';

        $this->load->view('templates/header', $data);
        $this->load->view('direcciones/index', $data);
        $this->load->view('templates/footer');
        }

     public function view()
        {
                $data['direcciones'] = $this->Direcciones_model->get_direcciones();

                if (empty($data['direcciones']))
                {
                        show_404();
                }

                $data['title'] = $data['direcciones']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('direcciones/view', $data);
                $this->load->view('templates/footer');
        }
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Crear Direccion';

            $this->form_validation->set_rules('idDireccion', 'idDireccion', 'required');
            $this->form_validation->set_rules('metrosCuadrados', 'metrosCuadrados', 'required');

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