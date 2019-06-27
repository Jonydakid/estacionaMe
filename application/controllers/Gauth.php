<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gauth extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->helper('url_helper');
    }

    public function index(){
    	$this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('usuarios/auth/registrar', $data);
        $this->load->view('templates/footer');

    }
}