

<div class="row-fluid">
    <div class="panel panel-security">
        <div class="panel-heading">
            <strong><?php echo $titulo ?> </strong>
        </div>
        <div class="panel-body">

            <?php if ($this->session->flashdata('success') != "") : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif ?>


            <div class="row-fuid">
                <a href="<?php echo BASE_URL ?>bo/cargos/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                    Agregar Nuevo Cargo
                </a>
            </div>  
            <div class="separador"></div>
            <div class="row-fluid">
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
                    <thead>
                        <tr>
                            <th width="1%" height="20">ID</th>
                            <th width="20%" height="20">DESCRIPCION</th>
                            <th width="5%">ESTADO</th>
                            <th width="10%">ACCION</th> 
                        </tr>
                    </thead> 
                    <tbody>

                        <?php
                        if (is_array($data)) :

                            foreach ($data as $ls) :
                                ?>

                                <tr>
                                    <td align="left"><?php echo $ls->id ?></td>
                                    <td align="left"><?php echo $ls->glosa ?></td>  
                                    
                                    <td align="left"><?php echo $ls->estado == 1 ? 'Activo' : 'Inactivo' ?></td>
                                    
                                    
                                    
                                    <td align="right">


                                        <div class="btn-group">
                                            <?php if ($ls->estado == 0) { ?>
                                                <a class="btn btn-small btn-danger" href="<?php echo BASE_URL ?>bo/cargos/Activar/<?php echo $ls->id ?>">
                                                    <i class="icon-ok" title="Activar"></i> Activar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </a>    

                                            <?php } else { ?>
                                                <a class="btn btn-small btn-success " href="<?php echo BASE_URL ?>bo/cargos/Desactivar/<?php echo $ls->id ?>">
                                                    <i class="icon-ban-circle " title="Desactivar"></i> Desactivar
                                                <?php } ?>
                                            </a>
                                            <a class="btn btn-small btn-success" href="<?php echo BASE_URL ?>bo/cargos/Editar/<?php echo $ls->id ?>">
                                                <i class="icon-edit" title="Editar"></i> Editar
                                            </a>
                                            <!--
                                            <a class="btn btn-small btn-danger" href="<?php echo BASE_URL ?>bo/concurso/Eliminar/<?php echo $ls->id ?>">
                                                <i class="icon-trash" title="Eliminar"></i> Eliminar
                                            </a>-->    
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            endforeach;

                        endif;
                        ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



