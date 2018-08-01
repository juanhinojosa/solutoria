<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	function __construct (){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->model('solutoria_model');
	}
	
	public function index()
	{
		$dataseg['segmento'] = $this->uri->segment(3);
		
		if(!$dataseg['segmento']){
			$data['videojuegos'] = $this->solutoria_model->retornaVideojuegos();
			$this->load->view('header');
			$this->load->view('productos',$data);
		}else{
			$data['videojuegos'] = $this->solutoria_model->retornaVideojuegos2($dataseg['segmento']);
			$this->load->view('header');
			$this->load->view('mantencion',$data);
		}

		//$this->load->view('productos');
	}


	public function eliminar()
	{
		$dataseg['segmento'] = $this->uri->segment(3);
		
		if(!$dataseg['segmento']){
			$data['videojuegos'] = $this->solutoria_model->retornaVideojuegos();
			$this->load->view('header');
			$this->load->view('productos',$data);
			$rr = base_url().'index.php/productos/';
			redirect($rr);
		}else{
			$res = $this->solutoria_model->eliminaVideojuego($dataseg['segmento']);
			$data['videojuegos'] = $this->solutoria_model->retornaVideojuegos();
			$this->load->view('header');
			$this->load->view('productos',$data);
			$rr = base_url().'index.php/productos/';
			redirect($rr);
		}

		//$this->load->view('productos');
	}



	public function getGames(){
		$data['videojuegos'] = $this->solutoria_model->retornaVideojuegos();
		$this->load->view('productos',$data);
		//$this->load->view('productos');
	}

	public function exportarExcel(){

		$this->load->library('Excelfile');

		$object = new PHPExcel();

	  $object->setActiveSheetIndex(0);

	  $table_columns = array("ID","Nombre", "Edad Minima", "Fehca Lanzamiento", "Descripcion", "Desarrollador");

	  $column = 0;

	  foreach($table_columns as $field)
	  {
	   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	   $column++;
	  }

	  $employee_data = $this->solutoria_model->retornaVideojuegos();

	  $excel_row = 2;

	  foreach($employee_data->result() as $row)
	  {
	   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nombre);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->rango_edad);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->fecha_lanzamiento);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->descripcion);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->desarrollador);
	   $excel_row++;
	  }

	  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
	  header('Content-Type: application/vnd.ms-excel');
	  header('Content-Disposition: attachment;filename="VideoJuegos.xls"');
	  $object_writer->save('php://output');

	}
	


}

?>