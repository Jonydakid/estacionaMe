<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personas_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
		public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_personas()
		{
		       
		   $query = $this->db->query('SELECT * FROM denuncias');
		   return $query->result();
		}
		public function set_personas()
		{
		    $this->load->helper('url');


		    $data = array(
		    	'Rut' => $this->input->post('Rut'),
		    	'NombreCompleto' => $this->input->post('NombreCompleto'),
		    	'idDireccion' => $this->input->post('idDireccion'),

		    );

		    return $this->db->insert('denuncias', $data);
		}
		public function getById($id){


		$query = $this->db->query('SELECT * FROM denuncias WHERE id =' .$id);
		return $query->row();

		}

		public function updateData($id){

		    $data = array(
		    	'Rut' => $this->input->post('Rut'),
		    	'NombreCompleto' => $this->input->post('NombreCompleto'),
		    	'idDireccion' => $this->input->post('idDireccion'),
		    );

		    $this->db->where('id',$id);
		    $this->db->update('denuncias',$data);

		}
		public function deleteData($id){


		    $this->db->where('id',$id);
		    $this->db->delete('denuncias');


}

/* End of file Personas_model.php */
/* Location: ./application/models/Personas_model.php */