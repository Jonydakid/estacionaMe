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
		        'idDireccion' => $this->input->post('idDireccion'),
		        'metrosCuadrados' => $this->input->post('metrosCuadrados')
		    );

		    return $this->db->insert('estacionamientos', $data);
		}
		public function getById($id){


		$query = $this->db->query('SELECT * FROM estacionamientos WHERE id =' .$id);
		return $query->row();

		}

		public function updateData($id){

		    $data = array(
		        'idDireccion' => $this->input->post('idDireccion'),
		        'metrosCuadrados' => $this->input->post('metrosCuadrados')
		    );

		    $this->db->where('id',$id);
		    $this->db->update('estacionamientos',$data);

		}
		public function deleteData($id){


		    $this->db->where('id',$id);
		    $this->db->delete('estacionamientos');

		}

}
 ?>