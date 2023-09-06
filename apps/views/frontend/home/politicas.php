<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
             <?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
             <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12"><h2 class="titulo-staticos-rrhh"> <strong> Pol&iacute;ticas y procedimientos internos</strong></h2> </div>
                    <div class="col-md-12"> <img src="<?php echo base_url()?>assets/frontend/img/banners/politicas.jpg"  class="center-block  img-responsive" />    </div>  
                    
                    <div class="col-md-6 mision">
                        <select class="form-control" id="scategoria">
                            <option value="">-- SELECIONE UNA CATEGOR&Iacute;A --</option>
                            <option value="1">Manuales</option>
                            <option value="2">Protocolos</option>
                            <option value="3">Comunicados</option>
                            <option value="4">Otros</option>
                        </select> 
                                              
                    </div>
                 
                    <div class="col-md-12 mision c">
                     <?php 
                               
                                foreach ($files as $f): ?>
                       <table class="table table-bordered table-hover" style="font-size: 14px;">
                                <tbody>
                               
                                    <tr>
                                        <td width="90%"><h4 style="color:#E71873;"><?php echo ucwords(strtolower($f->file_title)) ?></h5><br /><?php echo ucfirst(strtolower($f->file_description)) ?></td>
<td class="text-center" style="vertical-align: middle !important;"><a target="_blank" href="http://rrhh.caren.cl/assets/frontend/pdf/<?php echo $f->file_name?>"><i class="fa fa-download fa-2x"></i></a></td>
                                    </tr>
                                
                                </tbody>
                       </table>
                       <?php  endforeach;?>
                    </div>
                    <?php /*?>
                    <div class="col-md-12 mision">
                        <h2 class="titulo_fuxia">MANUAL USO B&Aacute;SICO DE SAAD </h2>
                        <p>SAAD es un sistema de informaci&oacute;n computacional, integrado y modular orientado a la agilizaci&oacute;n y control de las funciones operativas y de administraci&oacute;n en las empresas. Fue creado desde hace 15 a&ntilde;os en plataforma RMCobol - Linux y se compone de varios m&oacute;dulos integrados, en que cada uno contiene un grupo de funciones relacionadas. </p>
                        
                    </div>
                   <div class="col-md-12 mision">
                        <a target="_blank" href="<?php base_url()?>assets/frontend/pdf/ManualBasicodeSAAD_2017.pdf" type="button" class="btn btn-warning">DESCARGAR</a>
                    </div> 
                    
                    <div class="col-md-12 mision">
                        <h2 class="titulo_fuxia">Protocolo de Atenci&oacute;n a Clientes Cajero(a) </h2>
                        <p></p>
                        
                    </div>
                   <div class="col-md-12 mision">
                        <a target="_blank" href="<?php base_url()?>assets/frontend/pdf/ProtocolodeAtencionaClientesCajero_a.pdf" type="button" class="btn btn-warning">DESCARGAR</a>
                    </div> 
                    
                    <div class="col-md-12 mision">
                        <h2 class="titulo_fuxia">Protocolo de Atenci&oacute;n a Clientes Vendedor(a) De Meson Presencial y Telef&oacute;nica </h2>
                        <p></p>
                        
                    </div>
                   <div class="col-md-12 mision">
                        <a target="_blank" href="<?php base_url()?>assets/frontend/pdf/ProtocolodeAtencionaClientesVendedor_aDeMesonPresencialyTelefonica.pdf" type="button" class="btn btn-warning">DESCARGAR</a>
                    </div> 
                    
                    <div class="col-md-12 mision">
                        <h2 class="titulo_fuxia">Protocolo de Atenci&oacute;n a Clientes Jefe(a) de Servicios</h2>
                        <p></p>
                        
                    </div>
                   <div class="col-md-12 mision">
                        <a target="_blank" href="<?php base_url()?>assets/frontend/pdf/ProtocolodeAtencionaClientesJefe_a_de_Servicios.pdf" type="button" class="btn btn-warning">DESCARGAR</a>
                    </div> 
                    
                   <div class="col-md-12 mision">
                        <h2 class="titulo_fuxia">Protocolo de Atenci&oacute;n a Clientes Vendedor(a) De Terreno</h2>
                        <p></p>
                        
                    </div>
                   <div class="col-md-12 mision">
                        <a target="_blank" href="<?php base_url()?>assets/frontend/pdf/ProtocolodeAtencionaClientesVendedor_aDe_Terreno.pdf" type="button" class="btn btn-warning">DESCARGAR</a>
                    </div>  <?php */?>
                   
             </div>			
        </div>
    </div>
</section>

