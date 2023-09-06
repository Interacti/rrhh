<script>
 $(document).ready(function(){
     $('#fecha').datepicker(); 
	
 })   
 
 function OpenControl()
{
    // var btnOK='oK'
   //Limpiamos nuestro control en la p�gina master
    $("#dialog").html("");
    $("#dialog").load('<?php echo BASE_URL ?>bo/abono/Agregar').dialog({
        height:'auto', //(height==null) ? 450 : height,
        width: 'auto',//(width==null) ? 750 : width,
        modal: true,
        show : true, 
        hide : true,
        position: [160,215],
        resizable: false,
        draggable: false,
        autoOpen: true,
        title:'Ingreso de Abonos ', //(name==null) ? "Control gen�rico" : name,
         buttons: {
            "Ok": function () {
                
           $.ajax({
                    type: "POST",		   
                    url: '<?php echo BASE_URL ?>bo/abono/Guardar',
                    data: $("#frmAbono").serialize(),
		            dataType: "json",
                    success: function(data)
                    {
                        if (data['succes']=="error"){	
					         //  $('#error').html('<ul>'+data['rut']+data['abono']+'</ul>').fadeIn();
                               $('#cgRut').addClass('error');
                               $('#cgDescripcion').addClass('error');
                               $('#cgPuntos').addClass('error');
                               $('#cgFecha').addClass('error');
                               $('#cgMotivo').addClass('error');
                        }  
                        
                        if (data['succes']=="OK"){
                               $('#error').addClass('alert-success').html('<ul><li>'+data['msg']+'<li></ul>').fadeIn();
                               $(location).attr('href','<?php echo BASE_URL ?>bo/abono/');       
                        }
                             
                             
                    }
           })    
               
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }
    });
    
    
      
}
 

 </script>
<div id="dialog" ></div>
              
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
                
                 <div class="clearfix"></div>
                 <a href="javascript:OpenControl()" class="btn btn-primary btn-small"><i class="icon-plus-sign icon-white"></i> Agregar Abono</a>   
                 <div class="clearfix" style="margin-bottom: 10px;"></div>
                
                
		 	    <table cellpadding="0" cellspacing="0" border="0" class="table table-hover" id="example">
				<thead>
					<tr>
						<th width="5%" >ID</th>
						<th width="5%" >RUT SOCIO</th>
            			<th width="15%">NOMBRE</th>
            			<th width="15%">ABONO</th>
            			<th width="5%">MONTO</th>
            			<th width="5%">FECHA</th>
            			<th width="5%">ACCION</th>  
					</tr>
				</thead>
				<tbody>
				<?php foreach ($lista as $ls):?>
					<tr>
						<td ><?php echo $ls->id_abono ?></td>
						<td ><?php echo $ls->rut_socio ?></td>
            			<td ><?php echo $ls->nombre .' '. $ls->apellido ?></td>
            			<td ><?php echo $ls->descripcion ?></td>
            			<td ><?php echo number_format( $ls->abono,0,',',".")  ?></td> 
            			<td ><?php echo setea_fecha($ls->fecha) ?></td>
            			<td ><a href="<?php echo BASE_URL?>bo/abono/eliminar/<?php echo $ls->id_abono?>" class="btn btn-small"><i class="icon-remove"></i> Eliminar</a></td> 
					</tr>
				<?php endforeach;?>
				</tbody>
				</table>
		 	    
		 	</div>
		 </div>
 	</div>
</div>