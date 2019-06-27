<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calificaciones_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function get_calificaciones()
		{
		       
		   $query = $this->db->query('SELECT * FROM calificaciones');
		   return $query->result();
		}
		public function set_calificaciones()
		{
		    $this->load->helper('url');


		    $data = array(
		    	'Calificacion' => $this->input->post('Calificacion'),
		    	'Comentario' => $this->input->post('Comentario'),
		    	'idUsuario' => $this->input->post('idUsuario')

		    );

		    return $this->db->insert('calificaciones', $data);
		}
		public function getById($id){


		$query = $this->db->query('SELECT * FROM calificaciones WHERE id =' .$id);
		return $query->row();

		}

		public function updateData($id){

		    $data = array(
		    	'Calificacion' => $this->input->post('Calificacion'),
		    	'Comentario' => $this->input->post('Comentario'),
		    	'idUsuario' => $this->input->post('idUsuario')
		    );

		    $this->db->where('id',$id);
		    $this->db->update('calificaciones',$data);

		}
		public function deleteData($id){


		    $this->db->where('id',$id);
		    $this->db->delete('calificaciones');

		}

}
}

/* End of file Calificaciones_model.php */
/* Location: ./application/models/Calificaciones_model.php */