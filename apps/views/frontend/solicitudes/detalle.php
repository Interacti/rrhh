<style>
    .separacion {
        padding: 10px 0px;
    }

    .input-group .input-group-addon {
        background-color: #fff;
        border-color: #d2d6de;
        border-radius: 0;
    }

    .form-control {
        border-color: #d2d6de;
        border-radius: 0;
        box-shadow: none;
    }

    .btn.btn-flat {
        border-radius: 0;
        border-width: 1px;
        box-shadow: none;
    }

    .bg-navy {
        background-color: #001f3f;
        color: #fff;
    }

    .bg-navy:hover {
        background-color: #53A8E1;
        color: #fff;
    }
</style>



<section class="product-page page fix">
    <div class="container">
        <div class="row">
            <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalle Solicitud </h3>
                    </div>
                    <div class="box-body">


                        <div class="col-sm-12">
                            <div class="table-responsive"> 
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="15%">CODIGO</th>
                                            <th width="15%">PRODUCTO</th>
                                            <th width="15%">VALOR</th>
                                            <th width="15%">FECHA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($detalle as $det): ?>
                                            <tr>
                                                <td width="15%"><?php echo $det->codigo_antiguo ?></td>
                                                <td width="15%"><?php echo $det->producto ?></td>
                                                <td width="15%"><?php echo number_format($det->valor_en_puntos, 0, ',', '.') ?></td>
                                                <td width="15%"><?php echo setea_fecha($det->fecha) ?></td>
                                            </tr>
                                        <?php endforeach ?> 
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination ">
                                <?php //echo $cartola->ShowLinks('class');?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php /* ?>

  <h3>Detalle de Solicitud Nro :<?php echo $solicitud;?> </h3>
  <div class="clear"></div>

  <table width="100%" class="carro" >
  <thead>
  <tr>
  <th width="15%">CODIGO</th>
  <th width="15%">PRODUCTO</th>
  <th width="15%">VALOR</th>
  <th width="15%">FECHA</th>

  </tr>
  </thead>
  <tbody>
  <?php foreach ($detalle as $det):?>
  <tr>
  <td width="15%"><?php echo $det->codigo_antiguo?></td>
  <td width="15%"><?php echo $det->producto?></td>
  <td width="15%"><?php echo number_format($det->valor_en_puntos,0,',','.')  ?></td>
  <td width="15%"><?php echo setea_fecha($det->fecha)?></td>
  </tr>
  <?php endforeach?>
  </tbody>


  </table>
  <?php */ ?>

