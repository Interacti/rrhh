<script>
    $(document).ready(function() {
        $("#CboAgente").change(function() {

            $("#rut").val($(this).val())

        })
    });
</script>


<h3>
    CONCURSO DE VENTAS
</h3>


<div class="info">
    Recuerde :
    <li>- Los Puntos no son acumulables para el mes siguiente.</li>
    <li>- Si los puntos no son ocupados durante el mes que corresponde, se pierden.</li>
    <li>- Los puntos son cargados de forma automat&iacute;ca todos los comienzos de mes.</li>
</div> 

<form id="frmteleventas" method="post" action="<?php echo BASE_URL ?>concursoventas/abonar/">

    <div class="grid_9">

        <div class="grid_2">Gerente</div>
        <div class="grid_3"><?php ?></div>
        <div class="clear"></div>

    </div>

    <div class="grid_9">

        <table>
            <thead>
                <tr> 
                    <th width="15%" align="left" >Nombre Agente</th>
                    <th width="10%" align="left">Rut</th>

                    <th width="10%" align="left">Puntos</th>
                    <th width="15%" align="left">Descripcion</th>
                    <th width="15%" align="left">Fecha Traspaso</th>
                </tr>
            </thead>
            <tbody>
                <tr> 
                    <td width="15%" ><select name="CboAgente" id="CboAgente" class="televentas-texto">
                            <option value="">SELECCIONE</option>
                            <?php
                            foreach ($agentes as $age):
                                $nm = explode(' ', trim($age->nombre));
                                $ap = explode(' ', trim($age->apellido))
                                ?>
                                <option value="<?php echo $age->rut ?>"><?php echo $nm[0] . ' ' . $ap[0] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td width="15%"><input name="rut" readonly="readonly" type="text" class="texto" id="rut" size="10"></td>
                    <td width="10%"><input name="puntos" type="text" class="texto" id="puntos" size="5"></td>
                    <td width="15%"><input name="descripcion" type="text"  class="texto" id="mesc"  value="" ></td>
                    <td width="15%"><input name="fecha" type="text" readonly="readonly" class="texto" id="fecha" value="<?php echo date('Y-m-d') ?>" size="10"></td>
                </tr>
            </tbody>
            <tfoot>

            </tfoot>	
        </table>



        <div class="clear"> </div> 



    </div>

    <div class="clear"> </div>
    <hr>
    <div class="clear"> </div>
    <div class="grid_9">
        <div class="grid_2 prefix_7">
            <button type="submit" class="btn sample btn-sample"> Aceptar</button>
        </div>	 
    </div>

</form>

<div class="clear"></div>
<h3>Abonos Concurso Ventas</h3>
<div class="clear"></div>
<?php 
//echo "<pre>";
//print_r($lista);

//die();
if (count($lista)> 0) { ?>
    <table width="100%" class="carro" id="data" >
        <thead>
            <tr>
                <th width="10%">FECHA</th>
                <th width="30%">NOMBRE</th>
                <th width="15%">DESCRIPCION</th>
                <th width="5%">ABONO</th>
                <th width="10%">ACCION</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista as $p):
                ?>
                <tr>
                    <td><?php echo setea_fecha($p->fecha) ?></td>
                    <td><?php echo $p->nombre . ' ' . $p->apellido ?></td>
                    <td align="right"><?php echo empty($p->descrip)? $p->descripcion: $p->descrip?></td>
                    <td align="right"><?php echo number_format($p->abono, 0, ',', '.') ?></td>
                    <td align="right"><a href="<?php echo BASE_URL ?>concursoventas/eliminar/<?php echo $p->id_abono ?>">Eliminar</a></td>

                </tr>
        <?php endforeach ?>
        </tbody>
        <tfoot>
            

        </tfoot> 

    </table>

    <?php
        }

else {
    ?>

    <div class="info"> No existen abonos para este mes </div>
    <?php
}
?>

