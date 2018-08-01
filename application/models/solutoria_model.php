<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solutoria_model extends CI_Model {

	function __construct (){
		parent::__construct();
		$this->load->database();
	}
	
	function insertVideojuego($data){

		$this->db->insert('videojuegos',
				array('nombre' => $data['nombre'],
					  'rango_edad' => $data['rango_edad'],
					  'fecha_lanzamiento' => $data['fecha_lanzamiento'],
					  'descripcion' => $data['descripcion'],
					  'desarrollador' => $data['desarrollador']));

		return true;
		
	}

	function ActualizaVideojuego($data){

		$this->db->set(array(
					  'nombre' => $data['nombre'],
					  'rango_edad' => $data['rango_edad'],
					  'fecha_lanzamiento' => $data['fecha_lanzamiento'],
					  'descripcion' => $data['descripcion'],
					  'desarrollador' => $data['desarrollador']), FALSE);

		$this->db->where('id', $data['idVideoJuego']);
		$this->db->update('videojuegos'); // gives UPDATE mytable SET field = field+1 WHERE id = 2

		return true;
		
	}
	function eliminaVideojuego($data){
	
		$this->db->where('id', $data);
		$this->db->delete('videojuegos'); // gives UPDATE mytable SET field = field+1 WHERE id = 2

		return true;
		
	}

	function retornaVideojuegos(){

		$query = $this->db->get('videojuegos');
		//$query = $this->db->query('SELECT * FROM videojuegos');

		if($query->num_rows() > 0 ){
			return $query;
		}else{
			return false;
		}

	}

	function retornaVideojuegos2($id){
		//$this->db->where('id',$id);
		//$query = $this->db->get('videojuegos');
		$sql  = 'SELECT * FROM videojuegos where id = '.$id;
		$query = $this->db->query($sql);

		if($query->num_rows() > 0 ){
			return $query;
		}else{
			return false;
		}

	}


	function ExisteNombre($nombreJuego){

		$sql  = "SELECT * FROM videojuegos where nombre = '".$nombreJuego."'";
		$query = $this->db->query($sql);

		if($query->num_rows() > 0 ){
			return true;
		}else{
			return false;
		}
	}

	

	
}

?>