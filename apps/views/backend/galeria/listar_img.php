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
                <a href="<?php echo BASE_URL ?>bo/galeria/addImage/<?php echo $id_galery?>" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                    Agregar Nueva Imagen
                </a>
            </div>  
            <div class="separador"></div>
            <div class="row-fluid">
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
                    <thead>
                        <tr>
                            <th width="1%" height="20">ID</th>
                            <th width="20%" height="20">IMAGEN</th>
                            <th width="20%" height="20">TITULO</th>
                            <th width="5%">FECHA</th>
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
                                    <td align="left"> <img src="<?php echo str_replace('.','', $ls->path_saved) ?>/<?php echo $ls->list_image ?>" width="100" alt=""> </td>  
                                    <td align="left"><?php echo $ls->title ?></td>  
                                    <td align="left"><?php echo $ls->created_at ?></td>     
                                    <td align="left"><?php echo $ls->status == 1 ? 'Activo' : 'Inactivo' ?></td>
                                    <td align="right">
                                        <div class="btn-group">
                                            
                                            
                                            <a class="btn btn-small btn-success" href="<?php echo BASE_URL ?>bo/galeria/editImage/<?php echo $ls->id ?>">
                                                <i class="icon-edit" title="Editar"></i> Editar
                                            </a>
                                            <!--<a class="btn btn-small btn-danger" href="<?php echo BASE_URL ?>bo/galeria/Eliminar/<?php echo $ls->id ?>">
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



