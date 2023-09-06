<script>

 $(document).ready(function(){
     
	setTimeout( function() {$('#errors').fadeOut() },7000);
 
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
    				<div class="alert alert-error" id="errors">
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
		 	
		 	    
                   <form class="form-horizontal" enctype="multipart/form-data"
		method="post" action="<?php echo BASE_URL?>bo/formalizacion/Save">
		<fieldset>
			<div class="span5">
				<!-- Form Name -->
				<div class="control-group">
					<label class="control-label">ID</label>
					<div class="controls">
						<input id="id" name="id" class="input-small " type="text" disabled
							value="<?php echo isset($myFormData['id'])? $myFormData['id'] : '';?>" />
					   </div>
				</div>


                <div class="control-group">
					<label class="control-label">MES</label>
					<div class="controls">
                        <select id="mes" name="mes" class="input-medium">
							<option value="">MES</option>
                            <?php foreach($mes as $key=>$value):?>
							<option value="<?php echo $value?>"><?php echo $key?></option>
                            <?php endforeach ?>
						</select>

					</div>
				</div>

                <div class="control-group">
					<label class="control-label">A&Ntilde;O</label>
					<div class="controls">
						<select id="anno" name="anno" class="input-small">
							<option value="">A&Ntilde;O</option>
                           	<option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            
                          
                        </select>

					</div>
				</div>

				<!-- File Button -->
				  <div class="control-group">
					<label class="control-label" for="appendedInputButton">ARCHIVO AGENTES</label>
					<div class="controls">
						<div class="input-append">
							<input name="archivo" type="file" id="archivo" /> 
						</div>(Formato Excel 2007+)
					</div>
				</div>
                
                <!-- File Button -->
				  <div class="control-group">
					<label class="control-label" for="appendedInputButton">ARCHIVO SUPERVISORES</label>
					<div class="controls">
						<div class="input-append">
							<input name="archivo_sup" type="file" id="archivo_sup" /> 
						</div>(Formato Excel 2007+)
					</div>
				</div>
                
             <!-- <div class="control-group">
					<label class="control-label">TIPO</label>
					<div class="controls">
						<select id="tipo" name="tipo" class="input-small">
							<option value="">TIPO</option>
                           	<option value="AGE">AGENTES</option>
                            <option value="SUP">SUPERVISORES</option>
                        </select>

					</div>
				</div>
             -->                   

				<!-- Text input-->

				<!-- Text input-->
				<div class="control-group">
					<label class="control-label">DESCRIPCION</label>
					<div class="controls">
						<input id="descripcion" name="descripcion" class="input-xlarge" maxlength="50"
							type="text"
							value="<?php echo isset($myFormData['descripcion'])? $myFormData['descripcion'] : '';?>" />

					</div>
				</div>

				<!-- Select Basic -->
				<div class="control-group">
					<label class="control-label">ESTADO</label>
					<div class="controls">
						<select id="estado" name="estado" class="input-small">
							<option value="">Estado</option>
							<option value="1"
								<?php if (isset($myFormData['estado'])) { if($myFormData['estado']==1) {echo 'selected="selected"';}};?>>Activo</option>
							<option value="0"
								<?php if (isset($myFormData['estado'])) { if($myFormData['estado']==0) {echo 'selected="selected"';}};?>>Inactivo</option>
						</select>
					</div>
				</div>


				<!-- Button -->
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
                        <i class="icon-disk"></i>
						<button id="btn-aceptar" name="aceptar" class="btn btn-success">Aceptar</button>
					</div>
				</div>




			</div>



		</fieldset>
	</form>
                
			


			</div>
		</div>
	</div>
</div>