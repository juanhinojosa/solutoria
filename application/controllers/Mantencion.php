<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantencion extends CI_Controller {

	function __construct (){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('solutoria_model');
	}
	
	public function index()
	{
		
		

        $this->load->view('header');
		$this->load->view('mantencion');

	}

	

	public function nuevo(){
		$this->load->view('header');
		$this->load->view('mantencion');
	}

	

	public function registraVideojuego(){

		$this->load->library('form_validation');

        $this->form_validation->set_rules('nombre', 'Nombre unico', 'callback_nombre_check');

 		if ($this->form_validation->run() == FALSE)
        {
        	//$this->load->view('myform');
        	$data['mensajeError'] = "Ya esta utilizado este nombre, debes cambiarlo";
        	$this->load->view('header');
			$this->load->view('mantencion',$data);

		}
		else
        {
         	$data = array(
			'nombre' => $this->input->post('nombre'),
			'rango_edad' => $this->input->post('rango_edad'),
			'fecha_lanzamiento' => $this->input->post('fecha_lanzamiento'),
			'descripcion' => $this->input->post('descripcion'),
			'desarrollador' => $this->input->post('desarrollador')
			);

			$resultado = $this->solutoria_model->insertVideojuego($data);
			$rr = base_url().'index.php/productos/';
			redirect($rr);

        }

		
		
	}

	public function nombre_check($str)
    {
    	$resultado = $this->solutoria_model->ExisteNombre($str);

        if ($resultado == true)
        {
        	$this->form_validation->set_message('nombre_check', 'Ya esta utilizado este nombre, debes cambiarlo');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

	public function modificar(){
		$dataseg['segmento'] = $this->uri->segment(3);
		if($dataseg['segmento']){
			$data['resultado'] = $this->solutoria_model->ActualizaVideojuego();
		}
		$this->load->view('header');
		$this->load->view('productos');

	}

	
	public function ActualizaVideojuego(){


		$data = array(
			'idVideoJuego' => $this->input->post('idVideoJuego'),
			'nombre' => $this->input->post('nombre'),
			'rango_edad' => $this->input->post('rango_edad'),
			'fecha_lanzamiento' => $this->input->post('fecha_lanzamiento'),
			'descripcion' => $this->input->post('descripcion'),
			'desarrollador' => $this->input->post('desarrollador')
			);

		$resultado = $this->solutoria_model->ActualizaVideojuego($data);

		$data['videojuegos'] = $this->solutoria_model->retornaVideojuegos();
		//$this->load->view('productos',$data);
		//$this->load->view('productos',$data);
		$rr = base_url().'index.php/productos/';
		redirect($rr);

	}


}

?>