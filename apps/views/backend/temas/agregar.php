<script type="text/javascript">
    $().ready(function() {
            
           
        $('#bajada, #texto').tinymce({
            // Location of TinyMCE script
            script_url : '<?php echo BASE_JS_BO ?>tiny_mce/tiny_mce.js',

            // General options
            theme : "advanced",
			theme_advanced_resizing : true,
			resize: true,
            plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
            theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,link,unlink,anchor,image,table,removeformat,code,styles",
            theme_advanced_buttons2 : "forecolorpicker,fontsizeselect",
            theme_advanced_buttons3 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom"
        });
    });
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


  
<form class="form-horizontal"
					action="<?php echo BASE_URL?>bo/temas/guardar"
					enctype="multipart/form-data" method="post">
					<fieldset>



						<!-- Text input-->
						<div class="control-group">
							<label class="control-label">id</label>
							<div class="controls">
								<input id="id" name="id" class="input-mini" type="text" readonly>

							</div>
						</div>

						<!-- Text input-->
						<div class="control-group">
							<label class="control-label">Titulo</label>
							<div class="controls">
								<input id="titulo" name="titulo" class="input-xlarge"
									type="text"
									value="<?php echo isset($myFormData['titulo'])? $myFormData['titulo'] : '';?>" />

							</div>
						</div>


						<!-- Select Basic -->
						<div class="control-group">
							<label class="control-label">Categoria</label>
							<div class="controls">
								<select id="categoria" name="categoria" class="input-xlarge">
									<option value="" selected="selected">Categorias</option>
									 
									 <?php echo SelectCategorias()?>

									

								</select>
							</div>
						</div>



						<!-- Textarea -->
						<div class="control-group">
							<label class="control-label">Bajada</label>
							<div class="controls">
								<textarea id="bajada" name="bajada"><?php echo isset($myFormData['bajada'])? $myFormData['bajada'] : '';?></textarea>
							</div>
						</div>



						<!-- Textarea -->
						<div class="control-group">
							<label class="control-label">Texto</label>
							<div class="controls">
								<textarea id="texto" name="texto"><?php echo isset($myFormData['texto'])? $myFormData['texto'] : '';?></textarea>
							</div>
						</div>



						<!-- Text input-->
						<div class="control-group">
							<label class="control-label">Imagen Home</label>
							<div class="controls">
								<input name="imagen1" type="file" id="imagen1" /> (316x150)

							</div>
						</div>

						<!-- Text input-->
						<div class="control-group">
							<label class="control-label">Imagen Principal</label>
							<div class="controls">
								<input name="imagen2" type="file" id="imagen2"> (225x231)

							</div>
						</div>
                        
                        <div class="control-group">
							<label class="control-label">Imagen Responsiva</label> 
							<div class="controls">
								<input name="imagen_r" type="file" id="imagen_r" /> (878 x 300)

							</div>
						</div>
                        
                        

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








