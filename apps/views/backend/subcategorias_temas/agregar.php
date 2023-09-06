<?php $myFormData = ""?>
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
    		
    		<div class="separador"></div>
    		
    		<form class="form-horizontal"
		action="<?php echo BASE_URL?>bo/subcategorias_temas/guardar" method="post">
		<fieldset>



			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">id</label>
				<div class="controls">
					<input id="id" name="id" class="input-mini" type="text" readonly>

				</div>
			</div>

			<div class="control-group">
				<label class="control-label">Categoria</label>
				<div class="controls">
					<select id="categoria" name="categoria" class="input-xlarge">
						<option value="" selected="selected">Categorias</option>
     <?php
					foreach ( $lstCategorias as $ls ) :
						if ($ls->id_categoria == $myFormData ['categoria']) {
							$cheked = 'selected="selected"';
						}
						;
						?>
    <option value="<?php echo $ls->id_categoria?>"
							<?php echo isset($cheked)? $cheked : '';?>><?php echo $ls->glosa_categoria?></option>
     
	 <?php
					endforeach
					
					?>
            
    </select>
				</div>
			</div>



			<!-- Text input-->
			<div class="control-group">
				<label class="control-label">Subcategoria</label>
				<div class="controls">
					<input id="subcategoria" name="subcategoria" class="input-large"
						type="text"
						value="<?php echo isset($myFormData['subcategoria'])? $myFormData['subcategoria'] : '';?>" />

				</div>
			</div>


			<!-- Select Basic -->
			<div class="control-group">
				<label class="control-label">Estado</label>
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
					<button id="btn-aceptar" name="aceptar" class="btn btn-success">Aceptar</button>
				</div>
			</div>


		</fieldset>
	</form>
    		
		 	</div>
		</div>
	</div>
</div>




<div class="bs-docs-example">





	

</div>


