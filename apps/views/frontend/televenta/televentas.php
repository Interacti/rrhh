<script>
$(document).ready(function () {
$("#CboAgente").change(function(){
       
    $("#rut").val($(this).val())       
   
})
});
</script>



<h3>TELEVENTAS</h3>
<?php if ($this->session->flashdata('errors')):?>
<div class="error"><ul><?php echo $this->session->flashdata('errors')?></ul></div>
<?php endif?>
<?php if ($this->session->flashdata('success')):?>
<div class="exito"><ul><li><?php echo $this->session->flashdata('success')?></li></ul></div>
<?php endif?>
<form id="frmteleventas" method="post" action="<?php echo BASE_URL?>televenta/abonarteleventa">
<div class="grid_9">

     <table>
          <thead>
          	<tr> 
          	     <th width="15%" align="left" >Agente</th>
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
				       $nm=explode(' ',trim($age->nombre));
				       $ap=explode(' ' ,trim($age->apellido)) 
				     
				     ?>
				      <option value="<?php echo $age->rut ?>"><?php echo  $nm[0].' '.$ap[0]   ?></option>
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
<h3>Abonos Televentas</h3>
<div class="clear"></div>
<?php if (count($lista)>0) {?>
<table width="100%" class="carro" id="data">
  <thead>
  <tr>
    
    <th width="10%">FECHA</th>
    <th width="30%">NOMBRE</th>
    <th width="30%">DESCRIPCION</th>
    <th width="5%">ABONO</th>
    <th width="5%">ACCION</th>
   
  </tr>
  </thead>
  <tbody>
    <?php 
    
    foreach($lista as $p):
     
    ?>
  <tr>
   
    <td><?php echo setea_fecha($p->fecha)?></td>
    <td><?php echo $p->nombre .' '. $p->apellido ?></td>
    <td align="right"><?php echo empty($p->descrip)? $p->descripcion: $p->descrip?></td>
    <td align="right"><?php echo number_format($p->abono,0,',','.')?></td>
    <td align="right"><a href="<?php echo BASE_URL  ?>televentas/eliminar/<?php echo $p->id_abono?>">Eliminar</a></td>
    
  </tr>
   <?php 
      
      endforeach?>
  </tbody>
  
</table>
<?php
} 
   
     else
      { ?>
        
         <div class="info"> No existen abonos para este mes </div>
      <?php 
      }
    ?>


<?php /*?>
<h3>
TELEVENTAS
</h3>

 
<form id="frmteleventas" method="post" action="<?php echo BASE_URL?>televenta/abonarteleventa">

<div class="grid_9">
      <div class="grid_3 televentas-alinea-izquierda alpha" >Seleccione Mes Abono</div>
      <div class="clear"> </div>
      <div class="grid_2 alpha" >
      <select name="mes_abono" id="mes_abono">
      	<option>Seleccione Mes</option>
      	<?php for ($i=date('m')-1 ;$i<=12;$i++) :?>
      	<option value="<?php echo  date('Y').'-' . ($i<10 ?   '0'. strval( $i) : $i )  .'-' .date('d') ; ?>"><?php echo $meses[$i]?></option>
      	<?php endfor; ?>
      	
     </select>
    </div>
</div>




<div class="clear"> </div>

<div class="grid_9" style="height: 25px !important;">&nbsp;</div>
<div class="clear"> </div>
<div class="grid_9">

     <div class="grid_2 televentas-alinea-centro" >Supervisor Televentas</div>
     <div class="grid_2 televentas-alinea-centro" >% Cumplimiento Meta Entrevistas</div> 
     <div class="grid_2 televentas-alinea-centro" >Indice Calidad del Equipo</div>
     <div class="grid_2 televentas-alinea-centro" >Total</div>
     <div class="clear"> </div>
     <div class="grid_2 alpha" >
      <select name="CboSuper" class="televentas-texto"> 
      	<option value="">Seleccione</option>
      <?php 
      
       foreach ($supervisor as $sup):
       $nm=explode(' ',trim($sup->nombre));
       $ap=explode(' ' ,trim($sup->apellido));  
     
     ?>
      <option value="<?php echo $sup->rutdv ?>"><?php echo  $nm[0] . ' '.$ap[0]   ?></option>
      <?php endforeach; ?>
      </select>
      </div>
      <div class="grid_2 televentas-alinea-derecha" ><input name="txtCumplimiento" id="txtCumplimiento"type="text" class="televentas-texto" value="0" size="5" onChange="return SumaAbonoSup()" onkeypress="return IsNumber(event);"   /></div>
      <div class="grid_2 televentas-alinea-derecha" ><input name="txtIndice" id="txtIndice" type="text" class="televentas-texto" value="0" size="5"  onChange="return SumaAbonoSup()" onkeypress="return IsNumber(event);"></div>
      <div class="grid_2 televentas-alinea-derecha" ><input name="txtTotal" id="txtTotal"type="text" class="televentas-texto" value="0" size="5"  readonly="true"></div>	 
      
</div>
<div class="clear"> </div>
<hr>
<div class="clear"> </div>
<div class="grid_9">
     <div class="grid_2 televentas-alinea-centro" >Agentes Televentas</div>
     <div class="grid_1 televentas-alinea-centro" >Cantidad Entrevistas</div>
     <div class="grid_1 televentas-alinea-centro" >Indice Calidad</div>
     <div class="grid_1 televentas-alinea-centro" >Premio Liderazgo</div>
     <div class="grid_1 televentas-alinea-centro" >LLamada Puntual</div>
     <div class="grid_1 televentas-alinea-centro" >Descuento Auditoria</div>
     <div class="grid_1 televentas-alinea-centro" >Total</div>
       
     <div class="clear"> </div> 
          
     <div class="grid_2 alpha" >
     <select name="CboAgente" class="televentas-texto">
     <option value="">SELECCIONE</option>
     <?php 
       foreach ($agentes as $age):
       $nm=explode(' ',trim($age->nombre));
       $ap=explode(' ' ,trim($age->apellido)); 
     
     ?>
      <option value="<?php echo $age->rutdv ?>"><?php echo  $nm[0].' '.$ap[0]   ?></option>
      <?php endforeach; ?>
     </select>
     </div>
 
     <div class="grid_1 televentas-alinea-derecha" ><input name="txtCantidad" type="text" class="televentas-texto" id="txtCantidad" onChange="SumaAbonoAge()" value="0" size="5"></div>
     <div class="grid_1 televentas-alinea-derecha" ><input name="txtCalidad" type="text" class="televentas-texto" id="txtCalidad" onChange="SumaAbonoAge()" value="0" size="5"></div>
     <div class="grid_1 televentas-alinea-derecha" ><input name="txtPremio" type="text" class="televentas-texto" id="txtPremio" onChange="SumaAbonoAge()" value="0" size="5" ></div>
     <div class="grid_1 televentas-alinea-derecha" ><input name="txtLlamadas" type="text" class="televentas-texto" id="txtLlamadas"  onChange="SumaAbonoAge()" value="0" size="5"></div>
     <div class="grid_1 televentas-alinea-derecha" ><input name="txtDescuentos" type="text" class="televentas-texto" id="txtDescuentos" onChange="SumaAbonoAge()" value="0" size="5"></div>
     <div class="grid_1 televentas-alinea-derecha" ><input name="txtTotalAgente" type="text" class="televentas-texto"  id="txtTotalAgente"value="0" readonly="true" size="5"></div>
      
</div>

<div class="clear"> </div>
<hr/>
<div class="clear"> </div>
<div class="grid_9">
      <div class="grid_2 prefix_7">
		<button type="submit" class="btn sample btn-sample"> Aceptar</button>
	 </div>	 
</div>

</form>
<?*/?>