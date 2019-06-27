<?php 
class Estacionamientos_model extends CI_Model{
		
        //Tutorial modo
        public function get_estacionamientos()
		{
		       
		   $query = $this->db->query('SELECT * FROM estacionamientos');
		   return $query->result();
		}
		public function set_estacionamientos()
		{
		    $this->load->helper('url');


		    $data = array(
		        
		        'metrosCuadrados' => $this->input->post('metrosCuadrados'),
		        'valorxHora' => $this->input->post('valorxHora'),
		        'valorxDia' => $this->input->post('valorxDia'),
		        'valorxMes' => $this->input->post('valorxDia'),
		        'idArredatario' => $this->input->post('idArredatario'),
		        'idDireccion' => $this->input->post('idDireccion'),
		        


		    );

		    return $this->db->insert('estacionamientos', $data);
		}
		public function getById($id){


		$query = $this->db->query('SELECT * FROM estacionamientos WHERE id =' .$id);
		return $query->row();

		}

		public function updateData($id){

		    $data = array(
		        'metrosCuadrados' => $this->input->post('metrosCuadrados'),
		        'valorxHora' => $this->input->post('valorxHora'),
		        'valorxDia' => $this->input->post('valorxDia'),
		        'valorxMes' => $this->input->post('valorxDia'),
		        'idArredatario' => $this->input->post('idArredatario'),
		        'idDireccion' => $this->input->post('idDireccion'),
		        
		    );

		    $this->db->where('id',$id);
		    $this->db->update('estacionamientos',$data);

		}
		public function deleteData($id){


		    $this->db->where('id',$id);
		    $this->db->delete('estacionamientos');

		}
		public function getNombreDireccion($idDireccion){

			$query = $this->db->query(
				'SELECT direccion.nombre, direccion.longitud, direccion.longitud 
					FROM tbl_user 
					INNER JOIN tbl_usercategory
					 ON tbl_usercategory.usercategoryid = tbl_user.usercategoryid');
		}

}
 ?>