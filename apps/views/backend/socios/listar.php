<?php
 echo $this->session->flashdata("msf");
?>

<div class="row-fluid">
    <div class="panel panel-security">
        <div class="panel-heading">
            <strong><?php echo $titulo ?> </strong>
        </div>
        <div class="panel-body">
            <?php if ($this->session->flashdata("OKIS") != "") : 
            
            echo "asdasdasd";
            ?>
                <div class="alert alert-success">
                    <?php
                    echo $this->session->flashdata("OKIS");
                    ?>
                </div>
            <?php endif ?>

            <div class="row-fuid">
                <a href="<?php echo BASE_URL ?>bo/socios/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                    Nuevo Trabajador
                </a>
            </div>  
            <br />

            <!-- Inicio Tabla -->
            <table cellpadding="0" cellspacing="0" border="0"
                   class="table  table-hover" id="example">
                <thead>
                    <tr>
                        <th width="2%" height="20">ID</th>
                        <th width="2%">RUT</th>
                        <th width="15%">NOMBRE</th>
                        <th width="15%">E-MAIL</th>
                        <th width="15%">CELULAR</th>
                        <th width="15%">CLAVE PROVISORIA</th>
                     

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
                                <td align="left"><?php echo $ls->rutdv ?></td>  
                                <td align="left"><?php echo $ls->nombre_full ?></td>
                                <td align="left"><?php echo $ls->email ?></td>
                                <td align="left"><?php echo $ls->celular_socio ?></td>
                                <?php if ($ls->isupdate==1): ?>
                                <td align="left">*******</td>
                                <?php else: ?>
                                <td align="left"><?php echo $ls->clave ?></td>
                                <?php endif?>
                                <td align="right">
                                    <div class="btn-group">
                                        <a class="btn btn-small"
                                           href="<?php echo BASE_URL ?>bo/socios/editar/<?php echo $ls->id ?>">
                                            <i class="icon-edit" title="Editar"></i> EDITAR
                                        </a>
                                        <a class="btn btn-small"
                                           href="<?php echo BASE_URL ?>bo/socios/reenviar/<?php echo $ls->id ?>">
                                            <i class="icon-key" title="Editar"></i> REENVIAR CLAVE
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        
                                    </div>
                                </td> 
                            </tr>
                            <?php
                        endforeach
                        ;


                    endif;
                    ?>
                </tbody>
            </table>
            <!-- Fin Tabla -->
        </div>
    </div>
</div>     



