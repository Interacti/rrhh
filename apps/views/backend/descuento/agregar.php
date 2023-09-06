<script>
 $(document).ready(function(){
     $('#fecha').datepicker(); 
	
		
 
 })   

 </script>

<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		 	<div class="row-fuid">
		 		<?php if ($this->session->flashdata('errors')!="") : ?>
    				<div class="alert alert-error">
					<ul>
        			<?php
					echo $this->session->flashdata ( 'errors' );
					$myFormData = $this->session->flashdata ( 'formdata' );
					?>
        			</ul>
					</div>
    			<?php endif ?>
		 	   <?php if ($this->session->flashdata('success')!="") : ?>
    				<div class="alert alert-success">
					<ul>
        			<?php
					echo $this->session->flashdata ( 'success' );
					
					?>
        			</ul>
					</div>
    			<?php endif ?>
		 	
		 	    <form class="form-vertical" name="frmAbono" method="post" action="<?php echo BASE_URL ?>bo/descuento/Guardar">
		 	    	<div class="span2">
		 	    		<label>Rut</label>
		 	    		<input id="rut" name="rut" type="text" class="input-small" placeholder="Rut">
		 	    	</div>
					<div class="span3">
									<label>Descripcion</label>
									<select id="descuento" name="descuento" >
									<option value="">Seleccione</option>
									<?php foreach ($tipo as $tp) : ?>
									<option value="<?php echo $tp->id_tipo_abono?>"><?php echo $tp->descripcion?></option>
									<?php endforeach;?>
									</select>
					</div>
					
					<div class="span2">
		 	    		<label>Puntos</label>
		 	    		<input id="puntos" name="puntos" type="text" class="input-small" placeholder="Puntos">
		 	    	</div>
					
					<div class="span2">
						<label>Fecha</label>
						<input id="fecha" readonly name="fecha" type="text" class="input-small" placeholder="Fecha" data-date-format="yyyy-mm-dd" data-date="">
					</div>	
					
					<div class="span2">
						<label>&nbsp;</label>
						<button id="btn-aceptar" name="aceptar" class="btn btn-primary" ><i class=" icon-minus icon-white"></i> Descontar </button>
					</div>
					
					<div class="clearfix"></div>
					<div><hr></div>
						 	    
		 	    </form>
		 	    
		 	    <div class="separador"></div>
		 	    
		 	    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="example">
				<thead>
					<tr>
						<th width="5%" >ID</th>
						<th width="5%" >RUT SOCIO</th>
            			<th width="15%">NOMBRE</th> 
            			<th width="15%">DESCUENTO</th>
            			<th width="5%">MONTO</th>
            			<th width="5%">FECHA</th>
            			<th width="5%">ACCION</th>  
					</tr>
				</thead>
				<tbody>
				<?php foreach ($lista as $ls):?>
					<tr>
						<td ><?php echo $ls->id_descuento ?></td>
						<td ><?php echo $ls->rut_socio ?></td>
            			<td ><?php echo $ls->nombre .' '. $ls->apellido ?></td>
            			<td ><?php echo $ls->descripcion ?></td>
            			<td ><?php echo number_format( $ls->descuento,0,',',".")  ?></td> 
            			<td ><?php echo setea_fecha($ls->fecha) ?></td>
            			<td ><a href="<?php echo BASE_URL?>bo/descuento/eliminar/<?php echo $ls->id_descuento?>" class="btn btn-small"><i class="icon-remove"></i> Eliminar</a></td> 
					</tr>
				<?php endforeach;?>
				</tbody>
				</table>
		 	    
		 	</div>
		 </div>
 	</div>
</div>