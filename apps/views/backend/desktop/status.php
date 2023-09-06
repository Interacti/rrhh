        <script>
             $(document).ready(function(){
                 $('#dp3').datepicker();
             })   

        </script>
<?php 

//print_r($estados);

?>
<form class="form-horizontal" id="frmStatus">
<fieldset>

<div class="control-group" >
          <label class="control-label" for="textinput">Nro Sol.</label>
          <div class="controls ">
            <input id="id" name="id" readonly="readonly" type="text" value="<?php echo $id?>" class="input-mini" >
          </div>
</div>

<!-- Select Basic -->
<div class="control-group" id="cgEstado">
  <label class="control-label" for="selectbasic">Estado</label>
  <div class="controls" >
    <select id="estado" name="estado" class="input-large">
      <option value="">Estado</option>
      <?php foreach ($estados as $ls ) :?>
      	<option value="<?php echo $ls->id_estado_solicitd?>"><?php echo $ls->descripcion ?></option>  
      <?php endforeach;?>
      
      
    </select>
    <span id="error-estado" style="font-size: 9px;color:red"></span>
  </div>
</div>
<!-- Appended Input-->
<div class="control-group" id="cgFecha">
	<label class="control-label" for="appendedtext">Fecha Despacho</label>
	<div class="controls">
		<div data-date-format="yyyy-mm-dd" data-date="" id="dp3"
			class="input-append date">
			<input type="text" size="16"  class="input-small"
				id="fecha_despacho" name="fecha_despacho" /> <span class="add-on"><i
				class="icon-calendar"></i></span>
		</div>
        <span id="error-fecha" style="font-size: 9px;color:red"></span>
	</div>
</div>

<!-- Textarea -->
<div class="control-group" id="cgObservacion">
  <label class="control-label" for="textarea">Observacion</label>
  <div class="controls">                     
    <textarea id="observacion" name="observacion"></textarea>
    <span id="error-obser" style="font-size: 9px;color:red"></span>
  </div>
  
</div>

</fieldset>
</form>
