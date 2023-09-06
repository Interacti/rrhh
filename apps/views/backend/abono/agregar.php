 <script>
 $(document).ready(function(){
     $('#fecha').datepicker(); 
	 $('#error').hide();
 
 })   
 </script>
 <br />
 
 <form class="form-horizontal" id="frmAbono" name="frmAbono" method="post" action="">
      <fieldset>
        <!-- Form Name -->
          <div class="alert " id="error">
          
          </div>
         <!-- Text input-->
        
        <div class="control-group" id="cgRut">
          <label class="control-label" for="textinput">Rut</label>
          <div class="controls ">
            <input id="rut" name="rut" type="text" class="input-small" >
          </div>
        </div>
       
        <div class="clearfix"></div>
        <!-- Select Basic -->
        
        <div class="control-group" id="cgDescripcion">
          <label class="control-label" for="descripcion">Descripcion</label>
          <div class="controls">
            <select id="abono" name="abono" >
              <option value="">Seleccione</option>
              <?php foreach ($tipo as $tp) : ?>
               <option value="<?php echo $tp->id_tipo_abono?>"><?php echo $tp->descripcion?></option>
             <?php endforeach;?>
           </select>
         </div>
       </div>
       
       <!-- Text input-->
       <div class="control-group" id="cgMotivo">
        <label class="control-label" for="puntos">Motivo</label>
        <div class="controls">
          <input id="motivo" name="motivo" type="text" class="input-small" >
        </div>
      </div>
      
       <!-- Text input-->
       <div class="control-group" id="cgPuntos">
        <label class="control-label" for="puntos">Puntos</label>
        <div class="controls">
          <input id="puntos" name="puntos" type="text" class="input-small" >
        </div>
      </div>

     
      <div class="control-group" id="cgFecha">
	       <label for="appendedtext" class="control-label">Fecha Despacho</label>
	       <div class="controls">
		  <div class="input-append date" id="fecha" data-date="" data-date-format="yyyy-mm-dd">
			<input type="text" name="fecha" id="fecha" class="input-small" size="16" readonly=""> <span class="add-on"><i class="icon-calendar"></i></span>
		  </div>
	       </div>
     </div>
      

    </fieldset>
  </form>