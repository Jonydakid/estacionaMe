<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios_model extends CI_Model{
		

		public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
		}
	
        //Tutorial modo
        public function get_usuarios()
		{
		       
		   $query = $this->db->query('SELECT * FROM usuarios');
		   return $query->result();
		}
		public function set_usuarios($nomUsuario,$email,$contraseña,$rol)
		{
		    $this->load->helper('url');

		    		
			
		    $data = array(
		        'nomUsuario' => $nomUsuario,
		        'email' =>$email,
		        'contraseña' => $this->hash_password($contraseña),
				'rol' => $rol
		    );

		    return $this->db->insert('usuarios', $data);
		}
		public function getById($id){


			//$query = $this->db->query('SELECT * FROM usuarios WHERE id =' .$id);
			//return $query->row();

			$this->db->select('*');
			$this->db->from('usuarios');
			$this->db->where('id', $id);

			return $this->db->get()->row();
		
		}

		public function updateData($id){

		    $data = array(
		        'nomUsuario' => $this->input->post('nomUsuario'),
		        'email' => $this->input->post('email'),
		        'contraseña' => $this->input->post('contraseña'),
				'rol' => $this->input->post('rol')
		    );

		    $this->db->where('id',$id);
		    $this->db->update('usuarios',$data);

		}
		public function deleteData($id){


		    $this->db->where('id',$id);
		    $this->db->delete('usuarios');

		}
		public function verificarLogin($nomUsuario, $contraseña) {
		
			$this->db->select('contraseña');
			$this->db->from('usuarios');
			$this->db->where('nomUsuario', $nomUsuario);
					
			$hash = $this->db->get()->row('contraseña');

			return password_verify($contraseña, $hash);
			
		}
		public function getIdByNomUsuario($nomUsuario) {
			
			$this->db->select('id');
			$this->db->from('usuarios');
			$this->db->where('nomUsuario', $nomUsuario);

			return $this->db->get()->row('id');
		
		}
		public function getRolById($id) {
			
			$this->db->select('rol');
			$this->db->from('usuarios');
			$this->db->where('id', $id);

			return $this->db->get()->row('rol');
		
		}
		private function hash_password($contraseña) {
		
			return password_hash($contraseña, PASSWORD_DEFAULT);
		
		}
		

}
 ?>