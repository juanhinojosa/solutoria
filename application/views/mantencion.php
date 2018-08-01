
<?php
	
	if(isset($videojuegos)){

		$datoNombre = array(
			'name' => 'nombre',
			'placeholder' => 'Nombre de Video juego',
			'value' => $videojuegos->result()[0]->nombre,
			'class' => 'form-control'
			);
		$datoEdad = array(
			'name' => 'rango_edad',
			'placeholder' => 'Edad minima',
			'value' => $videojuegos->result()[0]->rango_edad,
			'class' => 'form-control'
			);
		
		$datoLanzamiento = array(
			'name' => 'fecha_lanzamiento',
			'placeholder' => 'Fecha Lanzamiento',
			'value' => $videojuegos->result()[0]->fecha_lanzamiento,
			'class' => 'form-control'
			);

		$datodescripcion = array(
			'name' => 'descripcion',
			'placeholder' => 'Pequeña descripcion',
			'value' => $videojuegos->result()[0]->descripcion,
			'class' => 'form-control'
			);

		$datodesarrollador = array(
			'name' => 'desarrollador',
			'placeholder' => 'Compañia desarrolladora',
			'value' => $videojuegos->result()[0]->desarrollador,
			'class' => 'form-control'
			);
		$datoInputId = (array(
			'type' => 'hidden',
			'name' => 'idVideoJuego',
			'value' => $videojuegos->result()[0]->id
			));
	}else{
		$datoNombre = array(
			'name' => 'nombre',
			'placeholder' => 'Nombre de Video juego',
			'class' => 'form-control'
		);
		$datoEdad = array(
			'name' => 'rango_edad',
			'placeholder' => 'Edad minima',
			'class' => 'form-control'
			);
		
		$datoLanzamiento = array(
			'name' => 'fecha_lanzamiento',
			'placeholder' => 'Fecha Lanzamiento',
			'class' => 'form-control'
			);

		$datodescripcion = array(
			'name' => 'descripcion',
			'placeholder' => 'Pequeña descripcion',
			'class' => 'form-control'
			);

		$datodesarrollador = array(
			'name' => 'desarrollador',
			'placeholder' => 'Compañia desarrolladora',
			'class' => 'form-control'
			);
	}

	


 ?>
 	<?php 
 		if(isset($mensajeError)){
 			echo "<script> alert('".$mensajeError."');</script>;";
 		}
 	?>
 	<script type="text/javascript">
 		$(document).ready(function(){
		
 			$('#MenuHome').removeClass( "active" );
			$('#MenuProductos').removeClass( "active" );
			$('#MenuMantencion').removeClass( "active" );

			$('#MenuMantencion').addClass( "active" );
 		});
 	</script>
 	<div class="row ">
 		<div class="col-lg-2">
 			
 		</div>
 		<div class="col-lg-8 thumbnail" style="padding:50px;">
 			<fieldset>
 				<legend>Mantencion Video Juegos</legend>
 			</fieldset>
 			<?php 
	 		if(isset($videojuegos)){
	 			//modificado
	 			echo form_open('/mantencion/ActualizaVideojuego');
		//<div class='form-group'>
	    //	<label for='email'>Email address:</label>
	    //	<input type='email' class="form-control" id="email">
	 	//</div>
	 			
	 			//echo form_label('Nombre video juego','nombre');
	 			echo form_input($datoInputId);
	 			
				echo "<div class='form-group'>";
	 			echo form_label('Nombre video juego','nombre');
				echo form_input($datoNombre);
				echo "</div>";

				echo "<div class='form-group'>";
	 			echo form_label('Edad minima','rango_edad');
				echo form_input($datoEdad); 
				echo "</div>";

				echo "<div class='form-group'>";
	 			echo form_label('Fecha Lanzamiento','fecha_lanzamiento');
				echo form_input($datoLanzamiento);
				echo "</div>";

				echo "<div class='form-group'>";
	 			echo form_label('Descripcion del videojuego','descripcion');
				echo form_input($datodescripcion);
				echo "</div>";

				echo "<div class='form-group'>";
	 			echo form_label('Nombre del Desarrollador','desarrollador');
				echo form_input($datodesarrollador);
				echo "</div>";

				echo form_submit('btnGuardar','Actualizar',array('class'=>'btn btn-success'));
				echo form_close();

	 		}else{
	 			//nuevo
	 			echo form_open('/mantencion/registraVideojuego');

	 			echo "<div class='form-group'>";
	 			echo form_label('Nombre video juego','nombre');
				echo form_input($datoNombre);
				echo "</div>";

				echo "<div class='form-group'>";
	 			echo form_label('Edad minima','rango_edad');
				echo form_input($datoEdad); 
				echo "</div>";

				echo "<div class='form-group'>";
	 			echo form_label('Fecha Lanzamiento','fecha_lanzamiento');
				echo form_input($datoLanzamiento);
				echo "</div>";

				echo "<div class='form-group'>";
	 			echo form_label('Descripcion del videojuego','descripcion');
				echo form_input($datodescripcion);
				echo "</div>";

				echo "<div class='form-group'>";
	 			echo form_label('Nombre del Desarrollador','desarrollador');
				echo form_input($datodesarrollador);
				echo "</div>";

				echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-success'));
				echo form_close();
	 		}
 		?>
 		</div>
 		
 		
 		<div class="col-lg-2">
 			
 		</div>
 	</div>



 	</div>
</div>

</body>
</html>