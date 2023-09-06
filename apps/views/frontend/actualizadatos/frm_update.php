<style>
.nav > li {
    border-right: none;
    background: none;
}
</style>
<div class="clearfix" ></div>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
             <?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
             <div class="col-md-9">
                 
                 
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">MODIFICAR CONTRASE&Ntilde;A</a>
                        </li>
                        
                    </ul>
                
                    <!-- Tab panes -->
                    <div class="tab-content">
                       <div role="tabpanel" class="tab-pane active" id="tab">
                            <form action="<?php echo BASE_URL?>mis-datos/actualizar" method="post">
                                <p style="margin: 15px 0 15px 0;">En esta secci&oacute;n usted podr&aacute; cambiar su contrase&ntilde;a si lo desea</p>
                                <div class="form-group">
                                    <label >Contrase&ntilde;a</label>
                                    <input type="text" size="20"  class="form-control" value="" name="password"/>
                                </div>
                                
                                <div class="form-group">
                                    <label >Repita Contrase&ntilde;a</label>
                                    <input type="text" size="20"  class="form-control" value="" name="re_password"/>
                                </div>
                                
                                <input class="float-right btn bg-navy btn-flat margin" type="submit" value="Actualizar" /> 
                                
                            </form>
                        </div>
                        
                        <div class="clearfix"></div>
                        <?php 
                    
                    $this->session->userdata('id');
                    if ($this->session->flashdata('errors')!="") : ?>
    					<div class="alert alert-danger " style="margin-top: 15px">
							<?php echo $this->session->flashdata ( 'errors' );?>
						</div>
   			 		<?php endif ?>
                        
                    </div>
                </div>
               

             
             </div>			
        </div>
    </div>
</section>





<?php /*?>
<section class="product-page page fix">
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>
			<div class="col-md-9 no-padding">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Actualizacion de datos</h3>
					</div>
					<div class="box-body">
					<div class="col-md-7">
						
                        <div class="alert alert-info">
                          <?php echo $this->session->flashdata('success')?>
                        </div>
                    <?php else :?>
                    <form action="<?php echo BASE_URL?>actualizar/actualizar/" method="post">
					   <div class="form-group">
                        <label >RUT</label>
                         <input type="text" size="20"  class="form-control" value="<?php echo $socio[0]->rut?>" name="rut"/>
                      </div>
                      
                      <div class="form-group">
                        <label >Nombre</label>
                         <input type="text" size="20" class="form-control" value="<?php echo $socio[0]->nombre?>"  name="nombre"/>
                      </div>
                      
                      <div class="form-group">
                        <label >Apellidos</label>
                        <input name="apellido" type="text"  class="form-control" id="apellido" value="<?php echo $socio[0]->apellido?>" size="20"/>
                      </div>
                      
                      <!--<div class="form-group">
                        <label >Estado Civil</label>
                            <select name="estado_civil" size="1" class="form-control" id="estado_civil">
                	               <option value="" >Seleccione</option>
                	               <option value="1"  >Soltera(a)</option>
                	               <option value="2"  >Casado(a)</option>
                            </select>
                      </div>-->
                      
                
                      
                      <div class="form-group">
                        <label >Fecha Nacimiento</label>
                        <div class="form-group">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control pull-right" type="text" class="form-control" id="nacimiento" name="nacimiento" value="<?php  echo substr($socio[0]->fecha_nacimiento,0,10) ?>" />
							</div>
							<!-- /.input group -->
						</div>
                         
                      </div>
						  
                      
                      <div class="form-group">
                        <label >Celular</label>
                        <input name="telefono" type="text"  class="form-control" id="telefono" value="<?php echo $socio[0]->telefono_socio?>" size="20"/> 
                      </div>
						
                      <div class="form-group">
                        <label >E-Mail</label>
                        <input name="email" type="text"  class="form-control" id="email" value="<?php echo $socio[0]->email?>" size="20"/> 
                      </div>
                      
                      
                      <!--<div class="form-group">
                        <label >Fecha Ingreso</label>
                        <div class="form-group">
							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input class="form-control pull-right"
									id="ingreso" name="ingreso" type="text" class="form-control"  value="<?php  echo substr($socio[0]->f_ingreso,0,10) ?>" />
							</div>
							
						</div>
                      </div>-->
                      
                      <div class="form-group">
                        <label >Oficina Despacho</label>
                        <div class="form-group">
							<select name="sucursal" size="1" class="form-control" id="sucursal">
                             <option  value="">Oficina Despacho</option>
                              <?php 
                                 print_r($sucursales);
                                  foreach ($sucursales as $s) :
                				  	if ($s->id_sucursal==$socio[0]->id_sucursal) :
                				 ?>
                                   <option value="<?php  echo $s->id_sucursal  ?>" selected="selected"  ><?php  echo $s->Descripcion  ?></option>
                                 <?php else :?>  
                                   <option value="<?php  echo $s->id_sucursal  ?>" ><?php  echo $s->Descripcion  ?></option>
                	           <?php 
                			   		endif;
                			 	endforeach;
                			 ?>      
                            </select> 
						</div>
                      </div>
                      
                      <div class="form-group">
                        <label >Tipo Socio</label>
                        <select name="tipo" size="1" class="form-control" id="tipo">
                         <option  value="">- TIPO -</option>
                          <?php 
                             
                              foreach ($tipo as $tip) :
            				  	if ($tip->id_tipo_agente==$socio[0]->id_tipo) :
            				 ?>
                               <option value="<?php  echo $tip->id_tipo_agente  ?>" selected="selected"  ><?php  echo $tip->descripcion  ?></option>
                             <?php else :?>  
                               <option value="<?php  echo $tip->id_tipo_agente  ?>" ><?php  echo $tip->descripcion  ?></option>
            	           <?php 
            			   		endif;
            			 	endforeach;
            			 
            			 ?>      
                        </select> 
                      </div>
                      
                       <input class="float-right btn bg-navy btn-flat margin" type="submit" value="Actualizar">
                      
                      
                        
					
						</form>
                        <?php endif?>
										
						</div>
						<div class="col-md-5 ">
						
							<img class="hidden-xs hidden-sm" alt="" src="<?php echo base_url()?>assets/frontend/images/Banner_datos.jpg" >
						
						
						</div>
					
                    
					
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php */?>