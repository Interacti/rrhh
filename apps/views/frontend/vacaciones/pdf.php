<style>


	
	.bb{
		border-bottom: 1px solid #000;
	}
	.bl{
		border-left: 1px solid #000;
	}
	.br{
		border-right:  1px solid #000;
	}
	
	.bt{
		border-top: 1px solid #000;
	}
	
	.tac {
		text-align: center;
	}
	
    td {
        padding: 3px;
        font-size: 10px !important;
    }
    
</style>


<page backtop="7mm">
<table style="width:750px" align="center">
	 <tr>
	 	<td>
	 		<table style="width:100%" cellpadding="0" cellspacing="0">
	 			<tr>
	 				<td style="width: 33%;text-align:center"><!--<img width="150" align="left"   src="/assets/frontend/img/header/image003.png" alt="" >--> </td>
	 				<td style="width: 33%;text-align:center;font-weight: bold">
	 					COMPROBANTE DE FERIADO<br>
	 					TRABAJADOR N° : <?php echo $this->session->userdata('codigo')?>
	 				</td>
	 				<td style="width: 33%;text-align: right;">
	 					<table style="width: 100%;text-align: center;font-size: 10px;" border="1" cellpadding="2" cellspacing="0" align="center" >
	 						<tr>
	 							<td style="width: 25%;">LUGAR</td>
	 							<td style="width: 25%;">DIA</td>
	 							<td style="width: 25%;">MES</td>
	 							<td style="width: 25%;">AÑO</td>
	 						</tr>
	 						<tr>
	 							<td >Santiago</td>
	 							<td ><?php echo date('d')?></td>
	 							<td ><?php echo date('m')?></td>
	 							<td ><?php echo date('Y')?></td>
	 						</tr>
	 					</table>
	 				</td>
	 			</tr>
	 		</table>
	 	</td>
	 </tr>
</table>
<table style="width: 750px; " align="center" >
 
    <tr>
     <td>
        <table style="width: 100%" border="1"  cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >
                    <table>
                       <tr>
                         <td>En cumplimiento a las disposiciones legales vigentes se deja constancia que a contar de las fechas que se </td>
                       </tr>
                       <tr>
                         <td>indican, el trabajador:</td>
                       </tr>
                       <tr>
                         <td style="width: 100%;">
                          <table style="width: 750px;"  cellpadding="0" cellspacing="0">
                            <tr> 
                               <td style="width: 10%;">DON</td>
                               <td style="width: 50%;font-weight: bold;"><?php echo $info['nombre'];?></td>
                               <td style="width: 10%;">RUT</td>
                               <td style="width: 20%;font-weight: bold;"><?php echo $info['rut'];?></td>
                               
                            </tr>
                          </table>
                         </td>
                       </tr>
                    </table>
                    
                </td>
            </tr>
             <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >
                    <table style="width: 750px;"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width: 30%;">Hara uso :</td>
                           <td style="width: 40%;font-weight: bold;">FERIADO LEGAL</td>
                           <td style="width: 30%;">(indicar si parte el total) de su</td>
                        </tr>
                    </table>
                    
                </td>
            </tr>

            <tr>
                <td style="width: 65%;font-size: 12px;text-align: left;" >Feriado anual con remuneración integra de acuerdo al siguiente detalle:</td>
                <td style="width: 15%;font-size: 12px;text-align: center;" >DIAS</td>
                <td style="width: 20%;font-size: 12px;text-align: center;font-weight: " >VALOR</td>
            </tr>
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr > 
                           <td colspan="4" >DESCANSO EFECTIVO ENTRE LAS FECHAS QUE SE INDICAN:</td>
                        </tr>
                        <tr> 
                           <td style="width: 25%;">Desde</td>
                           <td style="width: 25%;"><?php echo $info['inicio']?></td>
                           <td style="width: 25%;">AL</td>
                           <td style="width: 25%;"><?php echo $info['final']?></td>
                        </tr>
                    </table>
                
                     
                </td>
                <td style="width: 15%;font-size: 12px;text-align: center;" ><?php echo $info['dias']?></td>
                <td style="width: 20%;font-size: 12px;text-align: center;font-weight: " >&nbsp;</td>
            </tr>
            
            <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >&nbsp;</td>
            </tr>
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width:30%;">EN LETRAS</td>
                           <td style="width: 70%;text-align: center;"><?php echo $info['letras']?></td>
                        
                        </tr>
                    </table>
                </td>
                <td rowspan="2" valign="top" style="width: 15%;font-size: 12px;text-align: center;" >TOTAL</td>
                <td rowspan="2" style="width: 20%;font-size: 12px;text-align: center;font-weight: " >&nbsp;</td>
            </tr>
            
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width:30%;">FECHA INGRESO</td>
                           <td style="width: 70%;text-align: center;"><?php echo date('d/m/Y',strtotime($info['fecha_ingreso']))?></td>
                        
                        </tr>
                    </table>
                
                     
                </td>
            </tr>
            
            
            
        </table>
        
        
     </td>   
    </tr>
    
    <tr>
     <td>
         <table style="width: 100%" border="1"  cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: center;font-weight: bold;" >DETALLE DEL FERIADO</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >DIAS</td>
            <td style="width: 40%;font-size: 12px;text-align: center; " >&nbsp;</td>
          </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >DIAS HABILES</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['dias'],'2',',','.')?></td>
            <td rowspan="2" style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
          
           <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >VACIONES PROGRESIVAS</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['progresivas'],'2',',','.')?></td>
           </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >DOMINGOS E INHABILES</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >&nbsp;</td>
            <td style="width: 40%;font-size: 12px;text-align: center;font-weight: bold;" >NOMBRE Y FIRMA EMPLEADOR</td>
          </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >FERIADO FRACCIONADO</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ></td>
            <td rowspan="3" style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Saldo dias habiles pendientes año en curso</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['saldo'],'2',',','.')?></td>
           </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Acumulados año 2018</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format( $info['acumulado'],'2',',','.')?></td>
           </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >
              <table style="width: 100%;">
                <tr>
                    <td style="width: 60%;text-align: left;">Acumulados total a la fecha</td>
                    <td style="width: 40%;text-align: center;" ><?php echo date("d-m-Y")?></td>
                </tr> 
             </table>
            </td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['total'] + $info['progresivas'],'2',',','.') ?></td>
            <td  style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Saldo Final vacaciones</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format((($info['total'] + $info['progresivas'])-$info['dias']),'2',',','.')?></td>
            
           </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >&nbsp;</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >&nbsp;</td>
            <td rowspan="2" style="width: 40%;font-size: 12px;text-align: center;font-weight: bold;" >FIRMA DEL TRABAJADOR</td>
          </tr>
          
        </table>
     </td>
    </tr>
    <tr>
      <td style="width: 100%;font-size: 12px;text-align: center;">NOTA: Se deja constancia que el cálculo del feriado se ha hecho de conformidad a lo dispuesto en el            Capitulo VII, "Del Feriado Anual y de los Permisos, del Capítulo I del Código del Trabajo".</td>
    </tr>
</table>

</page>
<page backtop="7mm">
<table style="width:750px" align="center">
	 <tr>
	 	<td>
	 		<table style="width:100%" cellpadding="0" cellspacing="0">
	 			<tr>
	 				<td style="width: 33%;text-align:center"><!--<img width="150" align="left"   src="/assets/frontend/img/header/image003.png" alt="" >--> </td>
	 				<td style="width: 33%;text-align:center;font-weight: bold">
	 					COMPROBANTE DE FERIADO<br>
	 					TRABAJADOR N° : <?php echo $this->session->userdata('codigo')?>
	 				</td>
	 				<td style="width: 33%;text-align: right;">
	 					<table style="width: 100%;text-align: center;font-size: 10px;" border="1" cellpadding="2" cellspacing="0" align="center" >
	 						<tr>
	 							<td style="width: 25%;">LUGAR</td>
	 							<td style="width: 25%;">DIA</td>
	 							<td style="width: 25%;">MES</td>
	 							<td style="width: 25%;">AÑO</td>
	 						</tr>
	 						<tr>
	 							<td >Santiago</td>
	 							<td ><?php echo date('d')?></td>
	 							<td ><?php echo date('m')?></td>
	 							<td ><?php echo date('Y')?></td>
	 						</tr>
	 					</table>
	 				</td>
	 			</tr>
	 		</table>
	 	</td>
	 </tr>
</table>
<table style="width: 750px; " align="center" >
 
    <tr>
     <td>
        <table style="width: 100%" border="1"  cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >
                    <table>
                       <tr>
                         <td>En cumplimiento a las disposiciones legales vigentes se deja constancia que a contar de las fechas que se </td>
                       </tr>
                       <tr>
                         <td>indican, el trabajador:</td>
                       </tr>
                       <tr>
                         <td style="width: 100%;">
                          <table style="width: 750px;"  cellpadding="0" cellspacing="0">
                            <tr> 
                               <td style="width: 10%;">DON</td>
                               <td style="width: 50%;font-weight: bold;"><?php echo $info['nombre'];?></td>
                               <td style="width: 10%;">RUT</td>
                               <td style="width: 20%;font-weight: bold;"><?php echo $info['rut'];?></td>
                               
                            </tr>
                          </table>
                         </td>
                       </tr>
                    </table>
                    
                </td>
            </tr>
             <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >
                    <table style="width: 750px;"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width: 30%;">Hara uso :</td>
                           <td style="width: 40%;font-weight: bold;">FERIADO LEGAL</td>
                           <td style="width: 30%;">(indicar si parte el total) de su</td>
                        </tr>
                    </table>
                    
                </td>
            </tr>

            <tr>
                <td style="width: 65%;font-size: 12px;text-align: left;" >Feriado anual con remuneración integra de acuerdo al siguiente detalle:</td>
                <td style="width: 15%;font-size: 12px;text-align: center;" >DIAS</td>
                <td style="width: 20%;font-size: 12px;text-align: center;font-weight: " >VALOR</td>
            </tr>
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr > 
                           <td colspan="4" >DESCANSO EFECTIVO ENTRE LAS FECHAS QUE SE INDICAN:</td>
                        </tr>
                        <tr> 
                           <td style="width: 25%;">Desde</td>
                           <td style="width: 25%;"><?php echo $info['inicio']?></td>
                           <td style="width: 25%;">AL</td>
                           <td style="width: 25%;"><?php echo $info['final']?></td>
                        </tr>
                    </table>
                
                     
                </td>
                <td style="width: 15%;font-size: 12px;text-align: center;" ><?php echo $info['dias']?></td>
                <td style="width: 20%;font-size: 12px;text-align: center;font-weight: " >&nbsp;</td>
            </tr>
            
            <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >&nbsp;</td>
            </tr>
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width:30%;">EN LETRAS</td>
                           <td style="width: 70%;text-align: center;"><?php echo $info['letras']?></td>
                        
                        </tr>
                    </table>
                </td>
                <td rowspan="2" valign="top" style="width: 15%;font-size: 12px;text-align: center;" >TOTAL</td>
                <td rowspan="2" style="width: 20%;font-size: 12px;text-align: center;font-weight: " >&nbsp;</td>
            </tr>
            
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width:30%;">FECHA INGRESO</td>
                           <td style="width: 70%;text-align: center;"><?php echo date('d/m/Y',strtotime($info['fecha_ingreso']))?></td>
                        
                        </tr>
                    </table>
                
                     
                </td>
            </tr>
            
            
            
        </table>
        
        
     </td>   
    </tr>
    
    <tr>
     <td>
         <table style="width: 100%" border="1"  cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: center;font-weight: bold;" >DETALLE DEL FERIADO</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >DIAS</td>
            <td style="width: 40%;font-size: 12px;text-align: center; " >&nbsp;</td>
          </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >DIAS HABILES</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['dias'],'2',',','.')?></td>
            <td rowspan="2" style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
          
           <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >VACIONES PROGRESIVAS</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['progresivas'],'2',',','.')?></td>
           </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >DOMINGOS E INHABILES</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >&nbsp;</td>
            <td style="width: 40%;font-size: 12px;text-align: center;font-weight: bold;" >NOMBRE Y FIRMA EMPLEADOR</td>
          </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >FERIADO FRACCIONADO</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ></td>
            <td rowspan="3" style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Saldo dias habiles pendientes año en curso</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['saldo'],'2',',','.')?></td>
           </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Acumulados año 2018</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format( $info['acumulado'],'2',',','.')?></td>
           </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >
              <table style="width: 100%;">
                <tr>
                    <td style="width: 60%;text-align: left;">Acumulados total a la fecha</td>
                    <td style="width: 40%;text-align: center;" ><?php echo date("d-m-Y")?></td>
                </tr> 
             </table>
            </td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['total'] + $info['progresivas'],'2',',','.') ?></td>
            <td rowspan="2" style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Saldo Final vacaciones</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format((($info['total'] + $info['progresivas'])-$info['dias']),'2',',','.')?></td>
            
           </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >&nbsp;</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >&nbsp;</td>
            <td rowspan="2" style="width: 40%;font-size: 12px;text-align: center;font-weight: bold;" >FIRMA DEL TRABAJADOR</td>
          </tr>
          
        </table>
     </td>
    </tr>
    <tr>
      <td style="width: 100%;font-size: 12px;text-align: center;">NOTA: Se deja constancia que el cálculo del feriado se ha hecho de conformidad a lo dispuesto en el            Capitulo VII, "Del Feriado Anual y de los Permisos, del Capítulo I del Código del Trabajo".</td>
    </tr>
</table>

</page>
<page backtop="7mm">
<table style="width:750px" align="center">
	 <tr>
	 	<td>
	 		<table style="width:100%" cellpadding="0" cellspacing="0">
	 			<tr>
	 				<td style="width: 33%;text-align:center"><!-- <img width="150" align="left"   src="/assets/frontend/img/header/image003.png" alt="" >--> </td>
	 				<td style="width: 33%;text-align:center;font-weight: bold">
	 					COMPROBANTE DE FERIADO<br>
	 					TRABAJADOR N° : <?php echo $this->session->userdata('codigo')?>
	 				</td>
	 				<td style="width: 33%;text-align: right;">
	 					<table style="width: 100%;text-align: center;font-size: 10px;" border="1" cellpadding="2" cellspacing="0" align="center" >
	 						<tr>
	 							<td style="width: 25%;">LUGAR</td>
	 							<td style="width: 25%;">DIA</td>
	 							<td style="width: 25%;">MES</td>
	 							<td style="width: 25%;">AÑO</td>
	 						</tr>
	 						<tr>
	 							<td >Santiago</td>
	 							<td ><?php echo date('d')?></td>
	 							<td ><?php echo date('m')?></td>
	 							<td ><?php echo date('Y')?></td>
	 						</tr>
	 					</table>
	 				</td>
	 			</tr>
	 		</table>
	 	</td>
	 </tr>
</table>
<table style="width: 750px; " align="center" >
 
    <tr>
     <td>
        <table style="width: 100%" border="1"  cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >
                    <table>
                       <tr>
                         <td>En cumplimiento a las disposiciones legales vigentes se deja constancia que a contar de las fechas que se </td>
                       </tr>
                       <tr>
                         <td>indican, el trabajador:</td>
                       </tr>
                       <tr>
                         <td style="width: 100%;">
                          <table style="width: 750px;"  cellpadding="0" cellspacing="0">
                            <tr> 
                               <td style="width: 10%;">DON</td>
                               <td style="width: 50%;font-weight: bold;"><?php echo $info['nombre'];?></td>
                               <td style="width: 10%;">RUT</td>
                               <td style="width: 20%;font-weight: bold;"><?php echo $info['rut'];?></td>
                               
                            </tr>
                          </table>
                         </td>
                       </tr>
                    </table>
                    
                </td>
            </tr>
             <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >
                    <table style="width: 750px;"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width: 30%;">Hara uso :</td>
                           <td style="width: 40%;font-weight: bold;">FERIADO LEGAL</td>
                           <td style="width: 30%;">(indicar si parte el total) de su</td>
                        </tr>
                    </table>
                    
                </td>
            </tr>

            <tr>
                <td style="width: 65%;font-size: 12px;text-align: left;" >Feriado anual con remuneración integra de acuerdo al siguiente detalle:</td>
                <td style="width: 15%;font-size: 12px;text-align: center;" >DIAS</td>
                <td style="width: 20%;font-size: 12px;text-align: center;font-weight: " >VALOR</td>
            </tr>
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr > 
                           <td colspan="4" >DESCANSO EFECTIVO ENTRE LAS FECHAS QUE SE INDICAN:</td>
                        </tr>
                        <tr> 
                           <td style="width: 25%;">Desde</td>
                           <td style="width: 25%;"><?php echo $info['inicio']?></td>
                           <td style="width: 25%;">AL</td>
                           <td style="width: 25%;"><?php echo $info['final']?></td>
                        </tr>
                    </table>
                
                     
                </td>
                <td style="width: 15%;font-size: 12px;text-align: center;" ><?php echo $info['dias']?></td>
                <td style="width: 20%;font-size: 12px;text-align: center;font-weight: " >&nbsp;</td>
            </tr>
            
            <tr>
                <td colspan="3" style="font-size: 12px;text-align:left" >&nbsp;</td>
            </tr>
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width:30%;">EN LETRAS</td>
                           <td style="width: 70%;text-align: center;"><?php echo $info['letras']?></td>
                        
                        </tr>
                    </table>
                </td>
                <td rowspan="2" valign="top" style="width: 15%;font-size: 12px;text-align: center;" >TOTAL</td>
                <td rowspan="2" style="width: 20%;font-size: 12px;text-align: center;font-weight: " >&nbsp;</td>
            </tr>
            
            <tr >
                <td style="width: 65%;font-size: 12px;text-align: left;" >
                    <table style="width: 100%"   cellpadding="0" cellspacing="0">
                        <tr> 
                           <td style="width:30%;">FECHA INGRESO</td>
                           <td style="width: 70%;text-align: center;"><?php echo date('d/m/Y',strtotime($info['fecha_ingreso']))?></td>
                        
                        </tr>
                    </table>
                
                     
                </td>
            </tr>
            
            
            
        </table>
        
        
     </td>   
    </tr>
    
    <tr>
     <td>
         <table style="width: 100%" border="1"  cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: center;font-weight: bold;" >DETALLE DEL FERIADO</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >DIAS</td>
            <td style="width: 40%;font-size: 12px;text-align: center; " >&nbsp;</td>
          </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >DIAS HABILES</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['dias'],'2',',','.')?></td>
            <td rowspan="2" style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
          
           <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >VACIONES PROGRESIVAS</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['progresivas'],'2',',','.')?></td>
           </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >DOMINGOS E INHABILES</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >&nbsp;</td>
            <td style="width: 40%;font-size: 12px;text-align: center;font-weight: bold;" >NOMBRE Y FIRMA EMPLEADOR</td>
          </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >FERIADO FRACCIONADO</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ></td>
            <td rowspan="3" style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Saldo dias habiles pendientes año en curso</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['saldo'],'2',',','.')?></td>
           </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Acumulados año 2018</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format( $info['acumulado'],'2',',','.')?></td>
           </tr>
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >
              <table style="width: 100%;">
                <tr>
                    <td style="width: 60%;text-align: left;">Acumulados total a la fecha</td>
                    <td style="width: 40%;text-align: center;" ><?php echo date("d-m-Y")?></td>
                </tr> 
             </table>
            </td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format($info['total'] + $info['progresivas'],'2',',','.') ?></td>
            <td rowspan="2" style="width: 40%;font-size: 12px;" >&nbsp;</td>
          </tr>
           <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >Saldo Final vacaciones</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" ><?php echo number_format((($info['total'] + $info['progresivas'])-$info['dias']),'2',',','.')?></td>
            
           </tr>
          
          <tr>
            <td style="width: 50%;font-size: 12px;text-align: left;" >&nbsp;</td>
            <td style="width: 10%;font-size: 12px;text-align: center;font-weight: bold;" >&nbsp;</td>
            <td  style="width: 40%;font-size: 12px;text-align: center;font-weight: bold;" >FIRMA DEL TRABAJADOR</td>
          </tr>
          
        </table>
     </td>
    </tr>
    <tr>
      <td style="width: 100%;font-size: 12px;text-align: center;">NOTA: Se deja constancia que el cálculo del feriado se ha hecho de conformidad a lo dispuesto en el            Capitulo VII, "Del Feriado Anual y de los Permisos, del Capítulo I del Código del Trabajo".</td>
    </tr>
</table>

</page>