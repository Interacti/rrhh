<div class="row-fluid">
    <div class="panel panel-security">
        <div class="panel-heading">
            <strong><?php echo $titulo ?> </strong>
        </div>
        <div class="panel-body">
            <div class="row-fuid">
                <?php if ($this->session->flashdata('oks') != "") : ?>
                    <div class="alert alert-success">
                        <?php
                        echo $this->session->flashdata('oks');
                        ?>
                    </div>
                <?php endif ?>
                <div class="separador"></div>

                <a href="<? echo BASE_URL ?>bo/perfil/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                    Agregar Perfil
                </a>

                <div class="separador"></div>

                <table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
                    <thead>
                        <tr>
                       
                            <th width="5%">ID</th>
                            <th width="5%">PERFIL</th>
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
                                    <td align="left"><?php echo $ls->id_perfil ?></td>
                                    <td align="left"><?php echo $ls->descripcion ?></td>
                                    <td align="left"><?php echo $ls->estado == 1 ? 'Activo' : 'Inactivo' ?></td>
                                    <td align="right">

                                        <div class="btn-group">
                                            <a class="btn btn-small " href="<? echo BASE_URL ?>bo/perrfil/Activar/<?php echo $ls->id_perfil ?>/<?php echo $ls->estado ?>">
        <?php if ($ls->estado == 0) { ?>
                                                    <i class="icon-ok" title="Activar"></i> Activar
                                                <?php } else { ?>
                                                    <i class="icon-ban-circle " title="Desactivar"></i> Desactivar
                                                <?php } ?>
                                            </a>
                                       
                                            <a class="btn btn-small" href="<?php echo BASE_URL ?>bo/perfil/Editar/<?php echo $ls->id_perfil ?>">
                                                <i class="icon-edit" title="Editar"></i> Editar</a>
                                             <a class="btn btn-small" href="<?php echo BASE_URL ?>bo/perfil/Editar/<?php echo $ls->id_perfil ?>">
                                                <i class="icon-trash" title="Editar"></i> Eliminar</a>    
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





