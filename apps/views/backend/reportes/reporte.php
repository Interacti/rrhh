
<script>
    $(document).ready(function() {
        $('#dp3').datepicker();
        $('#dp4').datepicker();

        $('#myTab').tab();

        $('#myTab a').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        })
    })

</script>


<style>
   
    .td {
        text-align: right !important;
    }
</style>


<div class="row-fluid">




    <div class="panel panel-security">
        <div class="panel-heading">
            <strong><?php echo $titulo_filtro ?> </strong>
        </div>
        <div class="panel-body">




            <div class="row-fluid" id="filtro-fechas">
                <form action="<?php echo BASE_URL ?>bo/reportes/Canjes/"
                      method="post" name="filter">
                    <div class="span2">
                        <div class="controls">
                            <div data-date-format="yyyy-mm-dd" data-date="" id="dp3"
                                 class="input-append date">
                                <label class="control-label" for="appendedInputButton">Fecha
                                    Inicio </label> <input type="text" readonly
                                                       value="<?php echo isset($finicio) ? $finicio : ''; ?>" size="10"
                                                       class="input-mini" id="fecha_inicio" name="fecha_inicio"
                                                       style="font-size: 10px;" /> <span class="add-on"><i
                                        class="icon-calendar"></i></span>

                            </div>
                        </div>
                    </div>


                    <div class="span2">
                        <div class="controls">
                            <div data-date-format="yyyy-mm-dd" data-date="" id="dp4"
                                 class="input-append date">
                                <label class="control-label" for="appendedInputButton">Fecha
                                    Termino </label> <input type="text" readonly
                                                        value="<?php echo isset($ftermino) ? $ftermino : ''; ?>"
                                                        size="10" class="input-mini" id="fecha_termino"
                                                        name="fecha_termino" style="font-size: 10px;" /> <span
                                                        class="add-on"><i class="icon-calendar"></i></span>

                            </div>
                        </div>
                    </div>

                    <!-- BOTON -->
                    <!-- Boton Aceptar -->
                    <div class="span2" id="btn-filtro-fechas">
                        <div class="controls">
                            <a href="javascript:;" onClick="document.filter.submit()"
                               class="btn btn-primary"><i class=" icon-filter icon-white"></i>
                                Filtrar Fechas </a>
                        </div>
                    </div>
                    <!-- Fin Boton Aceptar -->
                    <!-- FIN BOTON -->



                </form>
            </div>

        </div>
    </div>
</div>
<div class="separador"></div>

<ul class="nav nav-tabs" id="myTab">

</ul>


<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#negocios">Canjes Por Negocio</a></li>
    <li><a href="#sucursal" >Canjes Por Sucursal</a></li>
    <li><a href="#proveedor">Canjes Por Proveedor</a></li>
    <li><a href="#categoria">Por Categoria</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="negocios">
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th align="left">Negocio</th>
                        <th align="right">Puntos</th>
                        <th align="right">Pesos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pts = 0;
                    $pss = 0;


                    if (count($info_negocios['data_negocios']) > 0):
                        foreach ($info_negocios['data_negocios'] as $dt):
                            ?>
                            <tr>
                                <td><?php echo $dt->tipo_socio ?></td>
                                <td class="td"><?php echo number_format($dt->puntos, 0, ',', '.') ?></td>
                                <td class="td">$ <?php echo number_format($dt->pesos, 0, ',', '.') ?></td>
                            </tr>
                            <?php
                            $pts+=$dt->puntos;
                            $pss+=$dt->pesos;

                        endforeach;
                    endif
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>TOTAL</td>
                        <td class="td"><?php echo number_format($pts, 0, ',', '.') ?></td>
                        <td class="td">$ <?php echo number_format($pss, 0, ',', '.') ?></td>
                    </tr>

                </tfoot>
            </table>

        </div>
        <div class="separador"></div>
        <div class="span12" id="g_render">
            <?php if (isset($info_negocios['charts_negocio'])) echo $info_negocios['charts_negocio']; ?>
        </div>    

    </div>




    <div class="tab-pane" id="sucursal">
        <div >
            <table class="table ">
                <thead>
                    <tr>
                        <th align="left">Sucursal</th>
                        <th align="right">Puntos</th>
                        <th align="right">Pesos</th>

                      
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pts = 0;
                    $pss = 0;
                    if (count($info_sucursal['data_sucursal']) > 0):
                        foreach ($info_sucursal['data_sucursal'] as $dt):
                            ?>
                            <tr>
                                <td><?php echo $dt->sucursal ?></td>
                                <td class="td"><?php echo number_format($dt->puntos, 0, ',', '.') ?></td>
                                <td class="td">$ <?php echo number_format($dt->pesos, 0, ',', '.') ?></td>
                            </tr>
                            <?php
                            $pts+=$dt->puntos;
                            $pss+=$dt->pesos;

                        endforeach;
                    endif;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>TOTAL</td>
                        <td class="td"><?php echo number_format($pts, 0, ',', '.') ?></td>
                        <td class="td">$ <?php echo number_format($pss, 0, ',', '.') ?></td>
                    </tr>

                </tfoot>
            </table>
        </div>
        <div class="separador"></div>
        <div class="span12" id="g_render">
            <?php if (isset($info_sucursal['charts_sucursal'])) echo $info_sucursal['charts_sucursal']; ?>
        </div>   


    </div>







    <div class="tab-pane" id="proveedor">

        <div >
            <table class="table ">
                <thead>
                    <tr>
                       <th align="left">Proveedor</th>
                        <th align="right">Puntos</th>
                        <th align="right">Pesos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pts = 0;
                    $pss = 0;
                    if (count($info_proveedor['data_proveedor']) > 0):
                        foreach ($info_proveedor['data_proveedor'] as $dt):
                            ?>
                            <tr>
                                <td><?php echo $dt->nombre_empresa ?></td>
                                <td class="td"><?php echo number_format($dt->puntos, 0, ',', '.') ?></td>
                                <td class="td">$ <?php echo number_format($dt->pesos, 0, ',', '.') ?></td>
                            </tr>
                            <?php
                            $pts+=$dt->puntos;
                            $pss+=$dt->pesos;
                        endforeach;
                    endif;
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>TOTAL</td>
                        <td class="td"><?php echo number_format($pts, 0, ',', '.') ?></td>
                        <td class="td">$ <?php echo number_format($pss, 0, ',', '.') ?></td>
                    </tr>

                </tfoot>
            </table> 
        </div>





        <div class="separador"></div>
        <div class="span12" id="g_render">
            <?php if (isset($info_proveedor['charts_proveedor'])) echo $info_proveedor['charts_proveedor']; ?>
        </div>   
    </div>


    <div class="tab-pane" id="categoria">


        <div >
            <table class="table ">
                <thead>
                    <tr>
                       <th align="left">Categoria</th>
                        <th align="right">Puntos</th>
                        <th align="right">Pesos</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pts = 0;
                    $pss = 0;
                    foreach ($info_categorias['data_categoria'] as $dt):
                        ?>
                        <tr>
                            <td><?php echo $dt->glosa_sub_categoria ?></td>
                            <td class="td"><?php echo number_format($dt->puntos, 0, ',', '.') ?></td>
                            <td class="td">$ <?php echo number_format($dt->pesos, 0, ',', '.') ?></td>
                        </tr>
                        <?php
                        $pts+=$dt->puntos;
                        $pss+=$dt->pesos;

                    endforeach
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>TOTAL</td>
                        <td class="td"><?php echo number_format($pts, 0, ',', '.') ?></td>
                        <td class="td">$ <?php echo number_format($pss, 0, ',', '.') ?></td>
                    </tr>

                </tfoot>
            </table>

        </div>

        <div class="separador"></div>
        <div class="span12" id="g_render">
            <?php if (isset($info_categorias['charts_categoria'])) echo $info_categorias['charts_categoria']; ?>
        </div>   

    </div>



</div>

<script>
