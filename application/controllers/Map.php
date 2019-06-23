<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function index()
	{
		$this->load->library('googlemaps');
		//view map
		$config['center']='-33.433041, -70.615209';
		$config['zoom']='15';
		$this->googlemaps->initialize($config);
		$data['map'] = $this->googlemaps->create_map();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/nav');
		$this->load->view('usuarios/arrendador',$data);
	
		$this->load->view('templates/footer',$data);
	}

}

/* End of file Map.php */
/* Location: ./application/controllers/Map.php */