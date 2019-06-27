<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Denuncias_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_denuncias()
		{
		       
		   $query = $this->db->query('SELECT * FROM denuncias');
		   return $query->result();
		}
		public function set_denuncias()
		{
		    $this->load->helper('url');


		    $data = array(
		    	'Descripcion' => $this->input->post('Descripcion'),
		    	'idUsuario' => $this->input->post('idUsuario')

		    );

		    return $this->db->insert('denuncias', $data);
		}
		public function getById($id){


		$query = $this->db->query('SELECT * FROM denuncias WHERE id =' .$id);
		return $query->row();

		}

		public function updateData($id){

		    $data = array(
		    	'Descripcion' => $this->input->post('Descripcion'),
		    	'idUsuario' => $this->input->post('idUsuario')
		    );

		    $this->db->where('id',$id);
		    $this->db->update('denuncias',$data);

		}
		public function deleteData($id){


		    $this->db->where('id',$id);
		    $this->db->delete('denuncias');

		}

}
}

/* End of file Denuncias_model */
/* Location: ./application/models/Denuncias_model */