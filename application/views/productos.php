
	<script type="text/javascript">
		
		$(document).ready(function(){
			
		    $('#MenuHome').removeClass( "active" );
			$('#MenuProductos').removeClass( "active" );
			$('#MenuMantencion').removeClass( "active" );

			$('#MenuProductos').addClass( "active" );


		});


		function elimina(idVideoJuego) {
			
			$( "#dialog-confirm" ).dialog({
			      resizable: false,
			      height: "auto",
			      width: 400,
			      modal: true,
			      buttons: {
			        "Seguro": function() {
			           window.location.href = "eliminar/"+idVideoJuego;			           
			          $( this ).dialog( "close" );
			        },
			        "Cancelar": function() {
			          $( this ).dialog( "close" );
			        }
			      }
			    });
		   
		}


	</script>

	<div class="row thumbnail" style="padding:50px;">
	<?php

		if(isset($videojuegos)){
			$list = "";

			foreach ($videojuegos->result() as $games) {
				# code...
				$list .= "<div class='col-sm-4 '>";
		      	$list .= "<h3>".$games->nombre."</h3>";
		      	$list .= "	<p>".$games->desarrollador." | ".$games->fecha_lanzamiento." </p>";
		      	$list .= "	<p>".$games->descripcion."</p>";
		      	$list .= "<a href='index/".$games->id."'> Editar </a>";
		      	$list .= "<button class='btn btn-link'  onclick='elimina(".$games->id.");'>Eliminar</button>";
		      	//$list .= "<a class='lkEliminar' href='eliminar/".$games->id."'> Eliminar </a>";
		    	$list .= "</div>";
				
			}

			echo " ".$list;

		}
		
	 ?>
	<!-- Vista de Productos-->
	
	</div>

	<div class="row">
		<div class="col-lg-2">
			<?php echo form_open('productos/exportarExcel'); ?>
			<?php 
				echo form_submit('','Exportar Datos',array('class' => 'btn btn-success'));
			?>
			<?php echo form_close(); ?>

		</div>
	</div>

	<div id="dialog-confirm" title="Desea Eliminar VideoJuego?" style="display:none">
	  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Estas seguro de eliminar este video juego?</p>
	</div>


	</div>
</body>
</html>