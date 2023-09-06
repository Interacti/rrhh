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


    });
</script>


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


                <div class="span7">
                    <form class="form-horizontal"
                          action="<?php echo BASE_URL ?>bo/beneficios/guardar"
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
                                    <input id="titulo" name="titulo" 
                                           type="text"
                                           value="<?php echo isset($myFormData['titulo']) ? $myFormData['titulo'] : ''; ?>" 
                                           style="width: 100% !important;"
                                           >

                                </div>
                            </div>


                            <!-- Select Basic -->

                            <div class="control-group">
                                <label class="control-label">Categoria</label>
                                <div class="controls">
                                    <select id="categoria" name="categoria" class="input-xlarge">
                                        <option value="0" >Principal</option>
                                        <?php foreach ($categorias as $categoria) :?>
                                        <option value="<?php echo $categoria->id?>"  > <?php echo $categoria->title?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>



                            <!-- Textarea -->
                            <div class="control-group">
                                <label class="control-label">Bajada</label>
                                <div class="controls">
                                    <textarea id="bajada" name="bajada"><?php echo isset($myFormData['bajada']) ? $myFormData['bajada'] : ''; ?></textarea>
                                </div>
                            </div>



                            <!-- Textarea -->
                            <div class="control-group">
                                <label class="control-label">Texto</label>
                                <div class="controls">
                                    <textarea id="texto" name="texto"><?php echo isset($myFormData['texto']) ? $myFormData['texto'] : ''; ?></textarea>
                                </div>
                            </div>



                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">Imagen Listado</label>
                                <div class="controls">
                                    <input name="imagen1" type="file" id="imagen1" /> 

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">Imagen Interior</label>
                                <div class="controls">
                                    <input name="imagen2" type="file" id="imagen2"> 

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Archivo (Excel, Pdf, PowerPoint,Word,texto)</label> 
                                <div class="controls">
                                    <input name="fileAdd" type="file" id="fileAdd" /> 
                                </div>
                            </div>



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


                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>








