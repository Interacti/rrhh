

<div class="row-fluid">
    <div class="panel panel-security">
        <div class="panel-heading">
            <strong><?php echo $titulo ?> </strong>
        </div>
        <div class="panel-body">
            <div class="row-fuid">

                <?php if ($this->session->flashdata('errors') != "") : ?>
                    <div class="alert alert-error">
                        <ul>
                            <?php
                            echo $this->session->flashdata('errors');
                            $myFormData = $this->session->flashdata('formdata');
                            ?>
                        </ul>
                    </div>
                <?php endif ?>

                <div class="separador"></div>

                <form class="form-horizontal"
                      action="<?php echo BASE_URL ?>/bo/perfil/Guardar" method="post">
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
                            <label class="control-label">Decripcion</label>
                            <div class="controls">
                                <input id="subcategoria" name="descripcion" class="input-large"
                                       type="text"
                                       value="<?php echo isset($myFormData['descripcion']) ? $myFormData['descripcion'] : ''; ?>" />

                            </div>
                        </div>
                        <?php //print_r($modulos)?>  
                        <!--<div class="control-group">
                            <label class="control-label">Modulos</label>
                            <div class="controls">
                                 <div class="span2">
                                        <?php 
                                       
                                        
                                        $chk="";
                                        foreach ($modulos as $md) : 
                                            
                                          if(isset($myFormData['modulos']) && is_array($myFormData['modulos'])) :
                                             if (in_array($md->id_modulo, $myFormData['modulos'])): 
													$chk= 'checked="checked"';
                                            else:
                                            	$chk= '';
											 endif; 
										  endif	 
										?>
                                            
                                            
                                            <label class="checkbox ">
                                            
                                            
                                            <input type="checkbox" value="<?php echo $md->id_modulo; ?>" name="modulos[]" <?php echo $chk; ?>  ><?php echo $md->descripcion; ?>
                                           
                                            </label>
                                           
                                        <?php 
                                        endforeach;  
                                       ?>    
                                 </div>
                                
                            </div>
                            
                        </div>-->
                       <div class="control-group">
                            <label class="control-label">Modulos</label>
                            <div class="controls">
                                 <div class="span2">
                                        <?php 
                                       
                                        
                                        $chk="";
                                        foreach ($modulo as $key=>$value) : 
                                            
                                         echo '<strong style="font-size:16px">'.$key .'</strong><br>';
                                           foreach($value as $k => $v):
										?>
                                            
                                            <div style="width: 250px; margin-left: 20px; ">
                                            <label class="checkbox" >
                                            
                                              
                                            &nbsp;&nbsp;&nbsp;<input type="checkbox" value="<?php echo $v; ?>" name="modulos[]" <?php echo $chk; ?>  ><?php echo $k; ?>
                                           
                                            </label>
                                           </div>
                                        <?php 
                                            endforeach;
                                        endforeach;  
                                       ?>    
                                 </div>
                                
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="control-group">
                            <label class="control-label">Estado</label>
                            <div class="controls">
                                <select id="estado" name="estado" class="input-small">
                                    <option value=""
                                    <?php
                                    if (isset($myFormData['estado'])) {
                                        if ($myFormData['estado'] == "") {
                                            echo 'selected="selected"';
                                        }
                                    };
                                    ?>
                                    
                                    >Estado</option>
                                    <option value="1"
                                    <?php
                                    if (isset($myFormData['estado'])) {
                                        if ($myFormData['estado'] == 1) {
                                            echo 'selected="selected"';
                                        }
                                    };
                                    ?>>Activo</option>
                                    <option value="0"
                                    <?php
                                    if (isset($myFormData['estado'])) {
                                        if ($myFormData['estado'] == 0) {
                                            echo 'selected="selected"';
                                        }
                                    };
                                    ?>>Inactivo</option>
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


