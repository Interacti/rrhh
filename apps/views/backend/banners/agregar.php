<script>
    $(document).ready(function () {
        $('#dp3').datepicker();
        $('#dp4').datepicker();


    })


</script>

<div class="row-fluid">
    <div class="panel panel-security">
        <div class="panel-heading">
            <strong><?php echo $titulo ?> </strong>
        </div>
        <div class="panel-body">
            <!-- inicio panel -->
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

            <!-- inicio form -->

            <form class="form-horizontal" enctype="multipart/form-data"
                  method="post" action="<?php echo BASE_URL ?>bo/banners/Guardar">
                <fieldset>
                    <div class="span5">
                        <!-- Form Name -->
                        <div class="control-group">
                            <label class="control-label">Id</label>
                            <div class="controls">
                                <input id="id" name="id" class="input-small " type="text" disabled
                                       value="<?php echo isset($myFormData['id']) ? $myFormData['id'] : ''; ?>" />

                            </div>
                        </div>

                        <!-- File Button -->
                        <div class="control-group">
                            <label class="control-label" for="appendedInputButton">Imagen</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input name="bnr_imagen" type="file" id="bnr_imagen" placeholder="" /> 

                                </div>
                                (1600px An. x 400px Alt.) 
                            </div>

                        </div>

                        <div class="control-group">
                            <label class="control-label">Categoria</label>
                            <div class="controls">
                                <select id="categoria" name="categoria" class="input-medium">
                                    <option value="">Categoria</option>
                                    <option value="home">Home</option>
                                    <?php foreach ($categorias as $categoria): ?>
                                        <option value="<?php echo $categoria->seo_sub_categoria ?>"><?php echo $categoria->glosa_sub_categoria ?></option>
                                    <?php endforeach; ?>

                                </select>



                            </div>
                        </div>

                        <!-- Text input-->

                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label">Descripcion</label>
                            <div class="controls">
                                <input id="descripcion" name="descripcion" class="input-xlarge"
                                       type="text"
                                       value="<?php echo isset($myFormData['descripcion']) ? $myFormData['descripcion'] : ''; ?>" />

                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Url</label>
                            <div class="controls">
                                <input id="url" name="url" class="input-xlarge" type="text"
                                       value="<?php echo isset($myFormData['url']) ? $myFormData['url'] : ''; ?>" />

                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Target</label>
                            <div class="controls">
                                <select id="target" name="target" class="input-medium">
                                    <option value="">Target</option>

                                    <option value="_blank"
                                            <?php if (isset($myFormData['target'])) {
                                                if ($myFormData['target'] == '_blank') {
                                                    echo 'selected="selected"';
                                                }
                                            }; ?>>Pagina
                                        Nueva</option>
                                    <option value="_self"
<?php if (isset($myFormData['target'])) {
    if ($myFormData['target'] == '_self') {
        echo 'selected="selected"';
    }
}; ?>>Misma
                                        Pagina</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="appendedInputButton">Fecha Inicio</label>
                            <div class="controls">

                                <div data-date-format="yyyy-mm-dd" data-date="" id="dp3"
                                     class="input-append date">
                                    <input type="text" readonly=""
                                           value="<?php echo isset($myFormData['fecha_inicio']) ? $myFormData['fecha_inicio'] : ''; ?>"
                                           size="16" class="input-small" id="fecha_inicio"
                                           name="fecha_inicio" /> <span class="add-on"><i
                                            class="icon-calendar"></i></span>
                                </div>

                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="appendedInputButton">Fecha
                                Termino</label>
                            <div class="controls">

                                <div data-date-format="yyyy-mm-dd" data-date="" id="dp4"
                                     class="input-append date">
                                    <input type="text" readonly="" fecha_inicio size="16"
                                           class="input-small" id="fecha_termino" name="fecha_termino"
                                           value="<?php echo isset($myFormData['fecha_termino']) ? $myFormData['fecha_termino'] : ''; ?>" />
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>

                            </div>
                        </div>



                        <!-- Text input-->
                        <div class="control-group">
                            <label class="control-label">Orden</label>
                            <div class="controls">
                                <input id="posicion" name="posicion" class="input-small"
                                       type="text"
                                       value="<?php echo isset($myFormData['posicion']) ? $myFormData['posicion'] : ''; ?>" />
                            </div>
                        </div>



                        <!-- Select Basic -->
                        <div class="control-group">
                            <label class="control-label">Estado</label>
                            <div class="controls">
                                <select id="estado" name="estado" class="input-small">
                                    <option value="">Estado</option>
                                    <option value="1"
<?php if (isset($myFormData['estado'])) {
    if ($myFormData['estado'] == 1) {
        echo 'selected="selected"';
    }
}; ?>>Activo</option>
                                    <option value="0"
<?php if (isset($myFormData['estado'])) {
    if ($myFormData['estado'] == 0) {
        echo 'selected="selected"';
    }
}; ?>>Inactivo</option>
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




                    </div>



                </fieldset>
            </form>


            <!-- fin form -->

            <!-- fin panel body -->
        </div>
    </div>
</div>



