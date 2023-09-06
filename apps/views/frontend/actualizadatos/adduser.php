
<div class="container_12" >
<form action="<?php echo BASE_URL?>agregar" method="post">
<div class="grid_10" >
    <div > <img src="<?php echo BASE_IMG_FE?>heder-add.jpg"  ></div>
    <div id="header_form" class="info_form grid_8 prefix_1">
        <h2>Ingreso De Datos</h2>
        <div>No estas inscrito en club ruta paraiso, ingresa los datos en este formulario, y comienza adisfrutar los beneficios del club </div>
        <div class="clear"></div>
         <?php if ($this->session->flashdata('success')!="") : ?>
        <div class="info"><?php echo $this->session->flashdata('success')?></div>
        <?php endif?>
    </div>
    
         
          <div class="grid_8 prefix_1 frm-control" >
                  <div  class="grid_2">Rut</div>
                  <div class="grdi_6"> <input type="text" size="20"  class="medium" value="<?php echo $rut?>" name="rut"/></div>
              
          </div>
    
    
           <div class="clear"></div>
    
    
         <div class="grid_8 prefix_1 frm-control" >
                  <div  class="grid_2">Nombres</div>
                  <div class="grdi_6"> <input type="text" size="20" class="medium" value="<?php echo $nombres?>"  name="nombre"/></div>
              
          </div>
           <div class="clear"></div>
    
    
          <div class="grid_8 prefix_1 frm-control" >
              <div  class="grid_2">Apellidos</div>
              <div class="grdi_6"> <input name="apellido" type="text"  class="medium" id="apellido" value="<?php echo $apellidos?>" size="20"/></div>
              
          </div>  
             
          <div class="clear"></div>
    
          <div class="grid_8  prefix_1 frm-control" >
            <div  class="grid_2">Estado Civil</div>
              <div class="grdi_6"> 
              <select name="estado_civil" size="1" class="medium" id="estado_civil">
	               <option>Seleccione</option>
	               <option value="1">Soltera(a)</option>
	               <option value="2">Casado(a)</option>
            </select>
            </div>
          </div>  
            
          <div class="grid_8 prefix_1 frm-control" >
            <div  class="grid_2">Fecha Nacimiento</div>
              <div class="grdi_6"> 
              <input type="text" class="small" id="nacimiento" readonly="readonly" name="nacimiento" value=""/>
            </div>
          </div>   
          
           <div class="grid_8 prefix_1 frm-control" >
              <div  class="grid_2">Telefono</div>
              <div class="grdis_6"> <input name="telefono" type="text"  class="medium" id="telefono" value="" size="20"/></div>
          </div>
          
           <div class="grid_8 prefix_1 frm-control" >
              <div  class="grid_2">E-mail</div>
              <div class="grdi_6"> <input name="email" type="text"  class="medium" id="email" value="" size="20"/></div>
          </div>          
          
          
          
        
          
          <div class="grid_8 prefix_1 frm-control" >
            <div  class="grid_2">Fecha Ingreso</div>
              <div class="grdi_6"> 
              <input type="text" class="small" id="ingreso" name="ingreso" value=""/>
            </div>
          </div>   
          
           <div class="grid_8 prefix_1 frm-control" >
            <div  class="grid_2">Tipo Agente</div>
              <div class="grdi_6"> 
              <select name="tipo" size="1" class="medium" id="tipo">
             <option  value="">- TIPO -</option>
              <?php 
                 
                  foreach ($tipo as $tip) :
				  	
				 ?>
                   <option value="<?php  echo $tip->id_tipo_agente  ?>" ><?php  echo $tip->descripcion  ?></option>
	           <?php 
			   		
			 	endforeach;
			 
			 ?>      
            </select>
            </div>
          </div>  
          
           <div class="grid_8 prefix_1 frm-control" >
            <div  class="grid_2">Sucursal</div>
              <div class="grdi_6"> 
              <select name="sucursal" size="1" class="medium" id="sucursal">
              <option  value="">- SUCURSAL -</option>
                <?php 
                 
                  foreach ($sucursal as $suc) :
				  	
				        ?>
            
            
                  <option value="<?php echo $suc->id_sucursal?>" ><?php  echo $suc->Descripcion  ?></option>
	           <?php 
			   		
			 	         endforeach;
			 
			       ?>      
             
             
            </select>
            </div>
          </div>  
           <div class="grid_8 prefix_1 frm-control" >
              <div  class="grid_2">Codigo</div>
              <div class="grdis_6"> <input type="text" size="20"  class="mini" value="" name="codigo"/></div>
          </div>
             <div class="grid_8 prefix_1 frm-control" >
            <div  class="grid_2"></div>
              <div class="grdi_6"> 
              <input type="submit" value="ACEPTAR" />
            </div>
          </div>
</div></form>
</div>