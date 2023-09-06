<script type="text/javascript">
    $().ready(function () {

        $('#bajada, #texto').tinymce({

            // Location of TinyMCE script
            script_url: '<?php echo BASE_JS_BO ?>tiny_mce/tiny_mce.js',

            // General options
            theme: "advanced",
            theme_advanced_resizing: true,
            resize: true,
            width: '100%',
            height: '300',
            plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
            theme_advanced_buttons1: "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,link,unlink,anchor,image,table,removeformat,code,styles",
            theme_advanced_buttons2: "forecolorpicker,fontsizeselect",
            theme_advanced_buttons3: "",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "bottom"
        });

        $('#dp3, #dp4').datepicker();

    });

</script>
<?php

    $errors=$this->session->flashdata ( 'errors' );
    $myFormData=$this->session->flashdata ( 'formdata' );
   // $myFormData=!empty($this->session->flashdata ( 'formdata' )) ? $this->session->flashdata ( 'formdata' ):isset($socios) ? (array)$socios[0] : ''  ;
      
    //print_r($myFormData);
    
?>

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
                            ?>
                        </ul>
                    </div>
                <?php endif ?>


                <div class="span7">
                    <form class="form-horizontal"
                          action="<?php echo BASE_URL ?>bo/socios/guardar"
                          enctype="multipart/form-data" method="post">
                        <fieldset>



                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">id</label>
                                <div class="controls">
                                    <input 
                                        id="id" 
                                        name="id" 
                                        class="input-mini" 
                                        value="<?php echo isset($myFormData['id'])? $myFormData['id'] : '' ?>"
                                        type="text" 
                                        readonly>

                                </div>
                            </div>



                            <div class="control-group">
                                <label class="control-label">Codigo Trabajador</label>
                                <div class="controls">
                                    <input 
                                        id="codigo" 
                                        name="codigo" 
                                        class="input-medium" 
                                        type="text" 
                                        value="<?php echo isset($myFormData['codigo']) ? $myFormData['codigo'] : ''; ?>"
                                    >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Rut</label>
                                <div class="controls">
                                    <input 
                                        id="rutdv" 
                                        name="rutdv" 
                                        class="input-medium" 
                                        value="<?php echo isset($myFormData['rutdv']) ? $myFormData['rutdv'] : ''; ?>"
                                        type="text" >


                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Nombres</label>
                                <div class="controls">
                                    <input 
                                        id="nombres" 
                                        name="nombres" 
                                        type="text"
                                        value="<?php echo isset($myFormData['nombre']) ? $myFormData['nombre'] : ''; ?>" 
                                        style="width: 100% !important;"
                                        >

                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">Apellidos</label>
                                <div class="controls">
                                    <input 
                                        id="apellidos" 
                                        name="apellidos" 
                                        type="text"
                                        value="<?php echo isset($myFormData['apellido']) ? $myFormData['apellido'] : ''; ?>" 
                                        
                                        >

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha Nacimiento</label>
                                <div class="controls">
                                    <div data-date-format="yyyy-mm-dd" data-date="" id="dp3"
                                         class="input-append date">
                                        <input type="text" readonly fecha_inicio size="16"
                                               class="input-medium" id="fecha_nacimiento" name="fecha_nacimiento"
                                               value="<?php echo isset($myFormData['fecha_nacimiento']) ? $myFormData['fecha_nacimiento'] : ''; ?>" 
                                               /> <span
                                               class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">Celular</label>
                                <div class="controls">
                                    <input 
                                        id="celular" 
                                        name="celular" 
                                        class="input-medium" 
                                        value="<?php echo isset($myFormData['celular_socio']) ? $myFormData['celular_socio'] : ''; ?>"
                                        type="text" >


                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Telefono</label>
                                <div class="controls">
                                    <input 
                                        id="telefono_socio" 
                                        name="telefono_socio" 
                                        class="input-medium" 
                                        value="<?php echo isset($myFormData['telefono_socio']) ? $myFormData['telefono_socio'] : ''; ?>"
                                        type="text" >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Anexo</label>
                                <div class="controls">
                                    <input 
                                        id="celular" 
                                        name="anexo" 
                                        class="input-medium" 
                                        value="<?php echo isset($myFormData['anexo']) ? $myFormData['anexo'] : ''; ?>"
                                        type="text" >
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">E-mail</label>
                                <div class="controls">
                                    <input 
                                        id="email" 
                                        name="email" 
                                        class="input-large" 
                                        value="<?php echo isset($myFormData['email']) ? $myFormData['email'] : ''; ?>"
                                        type="text" >
                                </div>
                            </div> 

                            <div class="control-group">
                                <label class="control-label">Fecha Ingreso</label>
                                <div class="controls">
                                    <div data-date-format="yyyy-mm-dd" fecha_inicio data-date="" id="dp4"
                                         class="input-append date">
                                        <input 
                                            type="text" 
                                            readonly 
                                            size="16"
                                            class="input-medium" 
                                            id="f_ingreso" 
                                            name="f_ingreso"
                                            value="<?php echo isset($myFormData['f_ingreso']) ? $myFormData['f_ingreso'] : ''; ?>" 
                                            /> <span
                                            class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div> 

                            <div class="control-group">
                                <label class="control-label">Cargo</label>
                                <div class="controls">
                                    <select id="cargo" style="width: 50%" name="id_cargo" class="input-small">
                                        <option value="">- Seleccione Cargo --</option>
                                        <?php foreach ($cargos as $cargo): ?>
                                        <option value="<?php echo $cargo->id?>" <?php echo $cargo->id==$myFormData['id_cargo'] ? 'selected' : ''   ?>  ><?php echo $cargo->glosa?></option>
                                        <?php endforeach;?>

                                    </select>
                                </div>
                            </div>   

                            <div class="control-group">
                                <label class="control-label">Departamento</label>
                                <div class="controls">
                                    <select id="departamento" style="width: 50%" name="id_departamento" class="input-small">
                                        <option value="">- Seleccione Departamento --</option>
                                        <?php foreach ($departamentos as $dep): ?>
                                        <option value="<?php echo $dep->id?>" <?php echo $dep->id==$myFormData['id_departamento'] ? 'selected' : ''   ?>><?php echo $dep->glosa?></option>
                                        <?php endforeach;?>

                                    </select>
                                </div>
                            </div>  

                            <div class="control-group">
                                <label class="control-label">Centro Costo</label>
                                <div class="controls">
                                    <select id="ccosto" style="width: 50%" name="id_centro_costo" class="input-small">
                                        <option value="">- Seleccione Centro Costo --</option>
                                        <?php foreach ($ccosto as $cc): ?>
                                        <option value="<?php echo $cc->id?>" <?php echo $cc->id==$myFormData['id_centro_costo'] ? 'selected' : ''   ?>><?php echo $cc->glosa?></option>
                                        <?php endforeach;?>

                                    </select>
                                </div>
                            </div>  
                    

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">Foto (400x400)</label>
                                <div class="controls">
                                    <input name="imagen1" type="file" id="imagen1" /> 
                                    

                                </div>
                            </div>

 
                            <div class="control-group">
                                <label class="control-label">Estado</label>
                                <div class="controls">
                                    <select id="estado" name="estado" class="input-small">
                                        <option value="">Estado</option>
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
</div>








