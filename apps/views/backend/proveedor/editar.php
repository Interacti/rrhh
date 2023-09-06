
<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		 	<div class="row-fuid">
		 	 <?php if ($this->session->flashdata('errors')!="") : ?>
    		<div class="alert alert-error">
        		<ul>
        <?php 
             echo $this->session->flashdata('errors'); 
             $myFormData=$this->session->flashdata('formdata');
        ?>
        		</ul>    
    		</div>
    	<?php endif ?>
    <div class="separador"></div>

    <form class="form-horizontal" name="frmProveedor" method="post" action="<?php echo BASE_URL ?>bo/proveedor/Actualizar">
        <fieldset>

            <!-- Form Name -->

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Id</label>
                <div class="controls">
                    <input 
                            id="id_proveedor" 
                            name="id_proveedor" 
                            placeholder="" 
                            class="input-mini" 
                            required="" 
                            type="text" 
                            readonly 
                            value="<?php echo $rs[0]->id_proveedor?>"
                            
                            >

            	</div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Rut</label>
                <div class="controls">
                    <input 
                            id="rut" 
                            name="rut" 
                            placeholder="" 
                            class="input-small"  
                            type="text"
                            value="<?php echo $rs[0]->rut_empresa?>"
                            
                            >

                </div>
            </div>

      <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Empresa</label>
                <div class="controls">
                    <input 
                            id="empresa" 
                            name="empresa" 
                            placeholder="" 
                            class="input-large"  
                            type="text"
                            value="<?php echo $rs[0]->nombre_empresa?>"
                            
                            >

                </div>
            </div>

			 <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Contacto</label>
                <div class="controls">
                    <input 
                            id="contacto" 
                            name="contacto" 
                            placeholder="" 
                            class="input-large"  
                            type="text"
                            value="<?php echo $rs[0]->nombre_contacto?>"
                            >

                </div>
            </div>

			<div class="control-group">
                <label class="control-label">Email Contacto</label>
                <div class="controls">
                    <input 
                            id="email" 
                            name="email" 
                            placeholder="" 
                            class="input-large"  
                            type="text"
                             value="<?php echo $rs[0]->email_contacto?>"
                            >

                </div>
            </div>
            
            
            <!-- Select Basic -->
			<div class="control-group">
				<label class="control-label">Estado</label>
				<div class="controls">
					<select id="estado" name="estado" class="input-small">
						<option value="">Estado</option>
						 <option value="1" <?php if ($rs[0]->estado==1){echo "selected='selected'";};?> >Activo</option>
                        <option value="0" <?php if ($rs[0]->estado==0){echo "selected='selected'";};?>>Inactivo</option>
					</select>
				</div>
			</div>
            

            <!-- Button -->
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <button id="btn-aceptar" name="aceptar" class="btn btn-success" > <i class="icon-hdd icon-white"></i> Guadar</button>
                </div>
            </div>

        </fieldset>
    </form>
		 	
		 	</div>
		 </div>
 	</div>
</div>



