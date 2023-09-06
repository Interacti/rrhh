<style>
.separacion {
	padding: 10px 0px;
}

.input-group .input-group-addon {
	background-color: #fff;
	border-color: #d2d6de;
	border-radius: 0;
}

.form-control {
	border-color: #d2d6de;
	border-radius: 0;
	box-shadow: none;
}

.btn.btn-flat {
	border-radius: 0;
	border-width: 1px;
	box-shadow: none;
}

.bg-navy {
	background-color: #001f3f;
	color: #fff;
}

.bg-navy:hover {
	background-color: #53A8E1;
	color: #fff;
}
</style>



<section class="product-page page fix">
	<div class="container">
		<div class="row">
			<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>
			<div class="col-md-9">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Cont&aacute;ctanos</h3>
					</div>
					<div class="box-body">
                    <!--<div class="col-sm-12"><img src="<?php echo BASE_IMG_CON ?>contacto/Banerrutaparaisook.jpg" class="img-responsive" /></div>-->
                    <div class="col-sm-12">
                       <p>
                        En Caren te escuchamos.
Cont&aacute;ctenos cualquiera que sea su inquietud, sugerencia o duda, queremos resolverla.
                       </p>
                      
                    </div>
                    
                    <div style="margin-bottom: 15px;">&nbsp;</div>
                   <?php if ($this->session->flashdata('errors')!="") : ?>
                    <div class="alert alert-danger">
                       
                        <?php 
                             echo $this->session->flashdata('errors'); 
                             $myFormData=$this->session->flashdata('formdata');
                        ?>
                        
                    </div>
                    <?php endif ?>
                    
                    
                      <?php if ($this->session->flashdata('success')!="") : ?>
                      <div class="alert alert-success">
                         <?php 
                             echo $this->session->flashdata('success'); 
                         ?>
                      </div>
                      
                    
                    <?php endif ?>
                    
                    
                  
                    <form class='contacto' action="<?php BASE_URL?>enviacontacto" method="post">
					   <div class="form-group">
                        <label >Tu Nombre</label>
                         <input class="form-control" type='text' value='<?php echo $this->session->userdata('nombre')?> <?php echo $this->session->userdata('apellido')?>' name="nombre">
                      </div>
                      
                       <div class="form-group">
                        <label >Tu E-Mail</label>
                         <input class="form-control" type='text' value='<?php echo isset($myFormData['email'])? $myFormData['email'] : '';?>' name="email">
                      </div>
                      
                      <div class="form-group">
                        <label >Asunto</label>
                        <select name="asunto" class="form-control">
                    		<option value="">Asunto</option>
                    		<option value="Consulta" <?php if (isset($myFormData['asunto'])) { if($myFormData['asunto']=='Consulta') {echo 'selected="selected"';}};?>>Consulta</option>
                    		<option value="Reclamo" <?php if (isset($myFormData['asunto'])) { if($myFormData['asunto']=='Reclamo') {echo 'selected="selected"';}};?>>Reclamo</option>
                    		<option value="Encuesta" <?php if (isset($myFormData['asunto'])) { if($myFormData['asunto']=='Encuesta') {echo 'selected="selected"';}};?>>Encuesta</option>
                    		<option value="Sugerencia" <?php if (isset($myFormData['asunto'])) { if($myFormData['asunto']=='Sugerencia') {echo 'selected="selected"';}};?>>sugerencia</option>
                    		<option value="Concurso" <?php if (isset($myFormData['asunto'])) { if($myFormData['asunto']=='Concurso') {echo 'selected="selected"';}};?>>Concurso</option>
                    		<option value="Otros" <?php if (isset($myFormData['asunto'])) { if($myFormData['asunto']=='Otros') {echo 'selected="selected"';}};?>>Otros</option>
                     
                    	</select>
                         
                      </div>
                      
                      <div class="form-group">
                        <label >Mensaje</label>
                        <textarea class="form-control" rows='6' name="mensaje"><?php echo isset($myFormData['mensaje'])? $myFormData['mensaje'] : '';?></textarea>
                      </div>
                      
                      
                       <input class="float-right btn bg-navy btn-flat margin" type="submit" value="Enviar" />
                      
                      
                        
					
						</form>
                     
					
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
