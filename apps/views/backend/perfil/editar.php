

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
                      action="<?php echo BASE_URL ?>bo/perfil/Actualizar" method="post">
                    <fieldset>
                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label">id</label>
                            <div class="controls">
                                <input id="id" name="id" class="input-mini" type="text" readonly value="<?php echo $data[0]->id_perfil ?>" >

                            </div>
                        </div>
                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label">Decripcion</label>
                            <div class="controls">
                                <input id="subcategoria" name="descripcion" class="input-large"
                                       type="text"
                                       value="<?php echo $data[0]->descripcion ?>" />

                            </div>
                        </div>
                        <?php //print_r($modulos)?>  
                        <div class="control-group">
                            <label class="control-label">Modulos</label>
                            <div class="controls">
                                 <div class="span2">
                                        <?php 
                                        $chk="";
                                        $dt=explode('|',$data[0]->modulos);
                                        foreach ($modulos as $md) : 
                                         
                                             if (in_array($md->id_modulo, $dt)): 
													$chk= 'checked="checked"';
                                             else:
                                            	$chk= '';
											 endif; 
										 	 
										?>
                                            
                                            
                                            <label class="checkbox ">
                                            
                                            
                                            <input type="checkbox" value="<?php echo $md->id_modulo; ?>" name="modulos[]" <?php echo $chk; ?>  ><?php echo $md->descripcion; ?>
                                           
                                            </label>
                                           
                                        <?php 
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
                                   
                                        if ($data[0]->estado == "") {
                                            echo 'selected="selected"';
                                        }
                                   
                                    ?>
                                    
                                    >Estado</option>
                                    <option value="1"
                                    <?php
                                    
                                        if ($data[0]->estado == 1) {
                                            echo 'selected="selected"';
                                        }
                                    
                                    ?>>Activo</option>
                                    <option value="0"
                                    <?php
                                    
                                        if ($data[0]->estado == 0) {
                                            echo 'selected="selected"';
                                        }
                                    
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





