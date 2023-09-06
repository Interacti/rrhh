<script>



</script>

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
                    <div class="box-header with-border"><h3 class="box-title">Concurso de Ventas</h3></div>
                    <div class="box-body">
                        <div class="alert alert-info">
                            <h5>Recuerde :</h5>
                            <ul>

                                <li>Los Puntos no son acumulables para el mes siguiente.</li>

                                <li>Si los puntos no son ocupados durante el mes que corresponde, se pierden.</li>

                                <li>Los puntos son cargados de forma automat&iacute;ca todos los comienzos de mes.</li>

                            </ul>

                        </div>

                        <form id="frmteleventas" method="post" action="<?php echo BASE_URL ?>concursoventas/abonar/">

                            <div class="col-sm-3">

                                <div class="form-group">

                                    <label>Agente</label>

                                    <select name="CboAgente" id="CboAgente" class="form-control">

                                        <option value="">SELECCIONE</option>

                                        <?php

                                        foreach ($agentes as $age):

                                            $nm = explode(' ', trim($age->nombre));

                                            $ap = explode(' ', trim($age->apellido))

                                            ?>

                                            <option value="<?php echo $age->rut ?>"><?php echo $nm[0] . ' ' . $ap[0] ?></option>

                                        <?php endforeach; ?>

                                    </select>

                                </div>

                            </div>

                            <div class="col-sm-2">

                                <div class="form-group">

                                    <label>R.U.T</label>

                                    <input name="rut" readonly="readonly" type="text" class="form-control" id="rut" size="10" />

                                </div> 

                            </div>

                            <div class="col-sm-2">

                                <div class="form-group">

                                    <label>Puntos</label>

                                    <input name="puntos" type="text" class="form-control" id="puntos" size="5">

                                </div> 

                            </div>

                            <div class="col-sm-3">

                                <div class="form-group">

                                    <label>Descripcion</label>

                                    <input name="descripcion" type="text"  class="form-control" id="mesc"  value="" >

                                </div> 

                            </div>

                            <div class="col-sm-2">

                                <div class="form-group">

                                    <label>Fecha</label>

                                    <input name="fecha" type="text" readonly="readonly" class="form-control" id="fecha" value="<?php echo date('Y-m-d') ?>" size="10">

                                </div> 

                            </div>

                            <div class="col-sm-3 col-sm-offset-9 text-right">

                                <button type="submit" class="btn btn-primary btn-md"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Aceptar</button>

                            </div>





                        </form>

                    </div>

                </div>





                <div class="box box-primary">

                    <div class="box-header with-border"><h3 class="box-title">Abonos Concurso Ventas</h3></div>

                    <div class="box-body">

                        <div class="table-responsive">

                            <table class="table table-bordered" style="font-size: 12px">

                                <thead>

                                    <tr>

                                        <th width="5%">FECHA</th>

                                        <th width="20%">NOMBRE</th>

                                        <th width="20%">DESCRIPCION</th>

                                        <th width="5%">ABONO</th>

                                        <th width="5%">ACCION</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php foreach ($lista as $p): ?>

                                        <tr>

                                            <td><?php echo setea_fecha($p->fecha) ?></td>

                                            <td><?php echo $p->nombre . ' ' . $p->apellido ?></td>

                                            <td align="left"><?php echo empty($p->descrip) ? $p->descripcion : $p->descrip ?></td>

                                            <td align="right"><?php echo number_format($p->abono, 0, ',', '.') ?></td>

                                            <td align="right"><a href="<?php echo BASE_URL ?>concursoventas/eliminar/<?php echo $p->id_abono ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>

</a></td>



                                        </tr>

                                    <?php endforeach ?>



                                </tbody>

                                <tfoot></tfoot>

                            </table>



                        </div>

                    </div>

                    <div class="box-footer"></div>

                </div>





            </div>

        </div>	

    </div>



</section>

