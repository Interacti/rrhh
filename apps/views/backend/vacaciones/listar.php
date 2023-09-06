<?php 
//echo "<pre>";
//print_r($data)?>

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

                <a href="<?php echo BASE_URL ?>bo/vacaciones/Agregar" class="btn btn-primary btn-small">
                    <i class="icon-plus-sign icon-white"></i> 
                    Cargar Vacaciones
                </a>

            </div>  
            <div class="separador"></div>
            <div class="row-fluid">
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-hover" id="example">
                    <thead>
                        <tr>
                            <th width="1%" height="20">ID</th>
                             <th width="20%" height="20">RUT</th>
                            <th width="20%" height="20">NOMBRE</th>
                            <th width="20%" height="20">SALDO</th>
                            <th width="5%">ACUMULADOS</th>
                        </tr>
                    </thead> 
                    <tbody>

                        <?php
                        if (is_array($data)) :
                            foreach ($data as $ls) :
                                ?>
                                <tr>
                                    <td align="left"><?php echo $ls->id ?></td>
                                    <td align="left"><?php echo $ls->rut ?></td>
                                    <td align="left"><?php echo getSocioPorRut($ls->rut) ?></td>
                                    <td align="left"><?php echo number_format($ls->saldo, 2, ',', '.') ?></td>   
                                    <td align="left"><?php echo number_format($ls->acumulados, 2, ',', '.') ?></td>     
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



