<?php

class Estacionamientos extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Estacionamientos_model');
                $this->load->helper('url_helper');
        }


        public function index()
        {
             $data['estacionamientos'] = $this->Estacionamientos_model->get_estacionamientos();
        $data['title'] = 'Estacionamiento';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('estacionamientos/index', $data);
        $this->load->view('templates/footer');
        }

     public function view()
        {
                $data['estacionamientos'] = $this->Estacionamientos_model->get_estacionamientos();

                if (empty($data['estacionamientos']))
                {
                        show_404();
                }

                $data['title'] = $data['estacionamientos']['title'];

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav');
                $this->load->view('estacionamientos/view', $data);
                $this->load->view('templates/footer');
        }
        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Crear Estacionamiento';

            $this->form_validation->set_rules('idDireccion', 'idDireccion', 'required');
            $this->form_validation->set_rules('metrosCuadrados', 'metrosCuadrados', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav');
                $this->load->view('estacionamientos/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->Estacionamientos_model->set_estacionamientos();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav');
                $this->load->view('estacionamientos/success');
                $this->load->view('templates/footer');

            }
        }

        public function edit($id){
                 $data['row'] = $this->Estacionamientos_model->getById($id);

                $this->load->view('templates/header', $data);
                $this->load->view('templates/nav');
                $this->load->view('estacionamientos/edit', $data);
                $this->load->view('templates/footer');
        }
        public function update($id){
            $this->Estacionamientos_model->updateData($id);
            redirect("Estacionamientos");

        }
        public function delete($id){

            $this->Estacionamientos_model->deleteData($id);
            redirect("Estacionamientos");
        }
}