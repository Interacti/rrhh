<script type="text/javascript">
    $().ready(function () {


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
                          action="<?php echo BASE_URL ?>bo/vacaciones/guardar"
                          enctype="multipart/form-data" method="post">
                        <fieldset>
                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label">id</label>
                                <div class="controls">
                                    <input id="id" name="id" class="input-mini" type="text" readonly>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Archivo vacaciones</label> 
                                <div class="controls">
                                    <input name="fileAdd" type="file" id="fileAdd" /> 
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








