

<div class="row-fluid">
    <div class="panel panel-security">
        <div class="panel-heading">
            <strong><?php echo $titulo ?> </strong>
        </div>
        <div class="panel-body">

           


            <div class="row-fuid">

                <a href="<?php echo BASE_URL ?>bo/ventas/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                   Ventas
                </a>

            </div>  
            <div class="separador"></div>
            <div class="row-fluid">
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
                    <thead>
                        <tr>
                            <th width="1%" height="20">#</th>
                            <th width="20%" height="20">NOMBRE</th>
                            <th width="5%">MES</th>
                            <th width="5%">AÑO</th>
                            <th width="5%">RUT</th>
                            <th width="5%">SUBIDO</th>
                           
                        </tr>
                    </thead> 
                    <tbody>

                        <?php
                        if (is_array($data)) :

                            foreach ($data as $ls) :
                                ?>

                                <tr>
                                    <td align="left"><?php echo $ls->id ?></td>
                                    <td align="left"><?php echo $ls->name ?></td>   
                                   
                                    <td align="left"><?php echo $ls->month ?></td> 
                                     <td align="left"><?php echo $ls->year ?></td>   
                                    <td align="left"><?php echo $ls->key ?></td>   
                                    <td align="left"><?php echo $ls->date_add ?></td>     
                                   
 <?php /*?>                                   <td align="right">


                                        <div class="btn-group">
                                            <?php if ($ls->status == 0) { ?>
                                                <a class="btn btn-small btn-danger" href="<?php echo BASE_URL ?>bo/noticias/Activar/<?php echo $ls->id ?>">
                                                    <i class="icon-ok" title="Activar"></i> Activar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </a>    

                                            <?php } else { ?>
                                                <a class="btn btn-small btn-success " href="<?php echo BASE_URL ?>bo/noticias/Desactivar/<?php echo $ls->id ?>">
                                                    <i class="icon-ban-circle " title="Desactivar"></i> Desactivar
                                                <?php } ?>
                                            </a>
                                            <a class="btn btn-small btn-success" href="<?php echo BASE_URL ?>bo/noticias/Editar/<?php echo $ls->id ?>">
                                                <i class="icon-edit" title="Editar"></i> Editar
                                            </a>
                                            <a class="btn btn-small btn-danger" href="<?php echo BASE_URL ?>bo/noticias/Eliminar/<?php echo $ls->id ?>">
                                                <i class="icon-trash" title="Eliminar"></i> Eliminar
                                            </a>    
                                        </div>
                                        
                                    </td>
                                    <?php */?>
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



