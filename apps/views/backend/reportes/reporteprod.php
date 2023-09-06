
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
    .th-txt {
        text-align:left !important;
    }
    
	.th-num {
        text-align:right !important;
    }
    
	.th-txt-cen {
        text-align:center !important;
    }

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
                <form action="<?php echo BASE_URL ?>bo/reportes/Productos/"
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
    <li class="active"><a href="#negocios">Top 10 Productos Canjeados</a></li>
    <li><a href="#all" >Todos Los Productos</a></li>
    <!--  <li><a href="#proveedor">Canjes Por Proveedor</a></li> -->
    <!--  <li><a href="#categoria">Por Categoria</a></li> -->
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="negocios">
        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th class="th-txt">Producto</th>
                        <th class="th-txt" >Cantidad</th>
                        <th class="th-num" >Puntos</th>
                        <th class="th-num">Pesos</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $pts = 0;
                    $pss = 0;
					$cant=0;

                    if (count($info_productos['data_productos']) > 0):
                        foreach ($info_productos['data_productos'] as $dt):
                            ?>
                            <tr>
                                <td ><?php echo $dt->producto ?></td>
                                <td ><?php echo $dt->cantidad ?></td>
                                <td class="td"><?php echo number_format($dt->puntos, 0, ',', '.') ?></td>
                                <td class="td">$ <?php echo number_format($dt->pesos, 0, ',', '.') ?></td>
                            </tr>
                            <?php
                            $cant+=$dt->cantidad;
                            $pts+=$dt->puntos;
                            $pss+=$dt->pesos;

                        endforeach;
                    endif
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>TOTAL</td>
                        <td class=""><?php echo number_format($cant, 0, ',', '.') ?></td>
                        <td class="td"><?php echo number_format($pts, 0, ',', '.') ?></td>
                        <td class="td">$ <?php echo number_format($pss, 0, ',', '.') ?></td>
                        
                    </tr>

                </tfoot>
            </table>

        </div>
        <div class="separador"></div>
        <div class="span12" id="g_render">
            <?php if (isset($info_productos['charts_productos'])) echo $info_productos['charts_productos']; ?>
        </div>    

</div>

<div class="tab-pane" id="all">
        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th class="th-txt" width="31%" >Producto</th>
                        <th class="th-txt"  width="2%">Cantidad</th>
                        <th class="th-num"  width="9%">Puntos</th>
                        <th class="th-num"  width="10%">Pesos</th>

                    </tr>
                </thead>
           </table>
           <div style="height:500px; overflow: scroll; ">
           
         
           <table class="table">     
                <tbody>
                    <?php
                    $pts = 0;
                    $pss = 0;
					$cant=0;

                    if (count($all_productos) > 0):
                        foreach ($all_productos as $dt):
                            ?>
                            <tr>
                                <td ><?php echo $dt->producto ?></td>
                                <td ><?php echo $dt->cantidad ?></td>
                                <td class="td"><?php echo number_format($dt->puntos, 0, ',', '.') ?></td>
                                <td class="td">$ <?php echo number_format($dt->pesos, 0, ',', '.') ?></td>
                            </tr>
                            <?php
                            $cant+=$dt->cantidad;
                            $pts+=$dt->puntos;
                            $pss+=$dt->pesos;

                        endforeach;
                    endif
                    ?>
                </tbody>
                </table>
                  
           </div>  
           
            <table class="table">
                <tfoot>
                    <tr>
                        <td width="31%">TOTAL</td>
                        <td class="" width="2%"><?php echo number_format($cant, 0, ',', '.') ?></td>
                        <td class="td"width="9%"><?php echo number_format($pts, 0, ',', '.') ?></td>
                        <td class="td"width="10%">$ <?php echo number_format($pss, 0, ',', '.') ?></td>
                        
                    </tr>

                </tfoot>
            </table>

        </div>
        <div class="separador"></div>
        <div class="span12" id="g_render">
            <?php //if (isset($info_productos['charts_productos'])) echo $info_productos['charts_productos']; ?>
        </div>    

</div>



</div>

<script>
