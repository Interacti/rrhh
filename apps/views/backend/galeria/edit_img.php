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
<?php 
print_r($data);

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
                            $myFormData = $this->session->flashdata('formdata');
                            ?>
                        </ul>
                    </div>
                <?php endif ?>


                <div class="span7">
                    <form class="form-horizontal"
                          action="<?php echo BASE_URL ?>bo/galeria/updateNewImage"
                          enctype="multipart/form-data" method="post">
                        <fieldset>

                            

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">id</label>
                                <div class="controls">
                                    <input id="id" name="id" class="input-mini" type="text" readonly value="<?php echo $data[0]->id?>">
                                    <input type="hidden" name="id_galery" value="<?php echo $data[0]->id_galery ?>">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">Titulo</label>
                                <div class="controls">
                                    <input id="titulo" name="titulo" 
                                           type="text"
                                           value="<?php echo isset($myFormData['titulo']) ? $myFormData['titulo'] : $data[0]->title ; ?>" 
                                           style="width: 100% !important;"
                                           >

                                </div>
                            </div>


                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">Imagen Listado</label>
                                <div class="controls">
                                    <input name="imagen1" type="file" id="imagen1" /> (tamaño : 1000px x 1000px, peso maximo: 300kb ) 
                                    <input type="hidden" name="hd_img" value="<?php echo $data[0]->list_image?>">
                                </div>
                            </div>

                            



                            <div class="control-group">
                                <label class="control-label">Estado </label>
                                <div class="controls">
                                    <select id="estado" name="estado" class="input-small">
                                        <option value="">Estado</option>
                                        <option value="1" <?php echo $data[0]->status ==1 ? 'selected' : '' ?>>Activo</option>
                                        <option value="0" <?php echo $data[0]->status ==0 ? 'selected' : '' ?>>Inactivo
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="controls">
                                    <button id="btn-aceptar" name="aceptar" class="btn btn-success">Guardar</button>
                                </div>
                            </div>


                        </fieldset>
                    </form>
                </div>
                
                <div class="span4">
                    <img src="<?php echo base_url(). $data[0]->path_saved ?>/<?php echo $data[0]->list_image ?>" alt="">
                </div>
                
            </div>
        </div>
    </div>
</div>








