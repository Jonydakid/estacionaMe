<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Direcciones_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	        //Tutorial modo
        public function get_direcciones()
		{
		       
		   $query = $this->db->query('SELECT * FROM direcciones');
		   return $query->result();
		}
		public function set_direcciones()
		{
		    $this->load->helper('url');


		    $data = array(
		    	'Region' => $this->input->post('Region'),
		    	'Comuna' => $this->input->post('Comuna'),
		    	'Calle' => $this->input->post('Calle'),
		    	'idUsuario' => $this->input->post('idUsuario')

		    );

		    return $this->db->insert('direcciones', $data);
		}
		public function getById($id){


		$query = $this->db->query('SELECT * FROM direcciones WHERE id =' .$id);
		return $query->row();

		}

		public function updateData($id){

		    $data = array(

		    	'Region' => $this->input->post('Region'),
		    	'Comuna' => $this->input->post('Ciudad'),
		    	'Calle' => $this->input->post('Calle'),
		    	'idUsuario' => $this->input->post('idUsuario')
		    );

		    $this->db->where('id',$id);
		    $this->db->update('direcciones',$data);

		}
		public function deleteData($id){


		    $this->db->where('id',$id);
		    $this->db->delete('direcciones');

		}

}

/* End of file Direcciones_model.php */
/* Location: ./application/models/Direcciones_model.php */