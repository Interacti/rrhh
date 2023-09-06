<script type="text/javascript">
    $().ready(function() {
            
      
        $('#bajada, #texto').tinymce({
        	
            // Location of TinyMCE script
            script_url : '<?php echo BASE_JS_BO ?>tiny_mce/tiny_mce.js',

            // General options
            theme : "advanced",
			theme_advanced_resizing : true,
			resize: true,
			width: '100%',
  			height: '300',
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


<?php //print_r($rs); ?>


<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
			<div class="row-fuid">
		 		 <?php 
                   
                   print_r($this->session->flashdata('errors'));


		 		 if ($this->session->flashdata('errors')!="") : ?>
    					<div class="alert alert-error">
					<ul>
        <?php
							
							echo $this->session->flashdata ( 'errors' );
							
							$myFormData = $this->session->flashdata ( 'formdata' );
							
							 print_r($myFormData);

							
							?>
        </ul>
				</div>
    <?php endif ?>


				<div class="span7">
					<form class="form-horizontal"
						action="<?php echo BASE_URL?>bo/<?php echo $modulo?>/<?php echo $accion?>"
						enctype="multipart/form-data" method="post">
						<fieldset>



							<!-- Text input-->
							<div class="control-group">
								<label class="control-label">id</label>
								<div class="controls">
									<input id="id" name="id" class="input-mini" type="text"
										readonly value="<?php echo $rs[0]->id?>">

								</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label">Titulo</label>
								<div class="controls">
									<input id="titulo" name="titulo" class="input-xlarge"
										type="text"
										value="<?php echo isset($myFormData['titulo'])? $myFormData['titulo'] : $rs[0]->title;?>" />

								</div>
							</div>


							<!-- Select Basic -->
							<?php /*?><div class="control-group">
								<label class="control-label">Categoria</label>
								<div class="controls">
									<select id="categoria" name="categoria" class="input-xlarge">
										<option value="" selected="selected">Categorias</option>

										<option value="1"
											<?php  if($rs[0]->categoria==1) {echo 'selected="selected"';};?>>Tema
											Interes</option>
										<option value="2"
											<?php  if($rs[0]->categoria==2) {echo 'selected="selected"';};?>>Dato
											Util</option>


									</select>
								</div>
							</div>
							<?php */?>


							<!-- Textarea -->
							<div class="control-group">
								<label class="control-label">Bajada</label>
								<div class="controls">
									<textarea id="bajada" name="bajada"><?php echo isset($myFormData['bajada'])? $myFormData['bajada'] : $rs[0]->excerpt;?></textarea>
								</div>
							</div>



							<!-- Textarea -->
							<div class="control-group">
								<label class="control-label">Texto</label>
								<div class="controls">
									<textarea id="texto" name="texto"><?php echo isset($myFormData['texto'])? $myFormData['texto'] :  $rs[0]->content;?></textarea>
								</div>
							</div>



							<!-- Text input-->
							<div class="control-group">
								<label class="control-label">Imagen Home</label>
								<div class="controls">
									<input name="imagen1" type="file" id="imagen1"> <input
										name="hdImg1" type="hidden" value="<?php echo $rs[0]->list_image ?>" />
									
								</div>
							</div>

							<!-- Text input-->
							<div class="control-group">
								<label class="control-label">Imagen Principal</label>
								<div class="controls">
									<input name="imagen2" type="file" id="imagen2"> 
									<input name="hdImg2" type="hidden" value="<?php echo $rs[0]->feature_image ?>" />
									

								</div>
							</div>

							<div class="control-group">
								<label class="control-label">Archivo (Excel, Pdf, PowerPoint,Word,texto)</label> 
								<div class="controls">
									<input name="fileAdd" type="file" id="fileAdd" /> 
									<input name="hdfileAdd" type="hidden" value="<?php echo $rs[0]->alternate_file ?>" />
								</div>
							</div>
                        


							<div class="control-group">
								<label class="control-label">Estado</label>
								<div class="controls">
									<select id="estado" name="estado" class="input-small">
										<option value="">Estado</option>
										<option value="1"
											<?php  if($rs[0]->status==1) {echo 'selected="selected"';};?>>Activo</option>
										<option value="0"
											<?php  if($rs[0]->status==0) {echo 'selected="selected"';};?>>Inactivo</option>
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
				<div class="span3">
					<div class="row">
						<h5>Imagen Miniatura ocupada para el listado de noticias</h5>
						<img alt=""
							src="<?php echo base_url()?>assets/frontend/img/noticias/<?php echo $rs[0]->list_image?>"
							class="img-polaroid">
					</div>
					<div class="row">
						<h5>Imagen principal se ocupa como cabecera del detalle de la noticia</h5>
						<img alt=""
							src="<?php echo base_url()?>assets/frontend/img/noticias/<?php echo $rs[0]->feature_image?>"
							class="img-polaroid">
					</div>

					<div class="row">
						<h5>Archiv Adjunto</h5>
						<a href="<?php echo base_url()?>assets/frontend/img/noticias/<?php echo $rs[0]->feature_image?>" target="_blank" > <i class="icon-download" title="Eliminar"></i> Descargar</a>
					</div>

					
					</div>

				</div>


			</div>
		</div>
	</div>
</div>




