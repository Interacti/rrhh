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
					  <form class="form-horizontal" name="frmUsuarios" method="post" action="<? echo BASE_URL ?>/bo/usuarios/Guardar">
        <fieldset>

            <!-- Form Name -->

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Id</label>
                <div class="controls">
                    <input 
                            id="id" 
                            name="id" 
                            placeholder="" 
                            class="input-mini" 
                            required="" 
                            type="text" 
                            readonly 
                            
                            >

                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Nombre </label>
                <div class="controls">
                    <input 
                            id="nombre" 
                            name="nombre" 
                            placeholder="" 
                            class="input-xlarge"  
                            type="text"
                            onkeypress="return IsString(event);"
                            value="<?php echo isset($myFormData['nombre'])? $myFormData['nombre'] : '';?>"
                            >

                </div>
            </div>
            
             <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Apellido </label>
                <div class="controls">
                    <input 
                            id="apellido" 
                            name="apellido" 
                            placeholder="" 
                            class="input-xlarge"  
                            type="text"
                            onkeypress="return IsString(event);"
                            value="<?php echo isset($myFormData['apellido'])? $myFormData['apellido'] : '';?>"
                            >

                </div>
            </div>
             
             
              <!-- Text input-->
            <div class="control-group">
                <label class="control-label">E-mail </label>
                <div class="controls">
                    <input 
                            id="email" 
                            name="email" 
                            placeholder="" 
                            class="input-xlarge"  
                            type="text"
                            onkeypress="return IsAlphanumeric(event);"
                            value="<?php echo isset($myFormData['email'])? $myFormData['email'] : '';?>"
                            >

                </div>
            </div>
              
              
                <!-- Text input-->
            <div class="control-group">
                <label class="control-label">Usuario </label>
                <div class="controls">
                    <input 
                            id="usuario" 
                            name="usuario" 
                            placeholder="" 
                            class="input-small"  
                            type="text"
                            onkeypress="return IsString(event);"
                            value="<?php echo isset($myFormData['usuario'])? $myFormData['usuario'] : '';?>"
                            > 
                    (Minimo 6 caracteres)

                </div>
            </div>
            
              
              <div class="control-group">
                <label class="control-label">Password </label>
                <div class="controls">
                    <input 
                            id="password" 
                            name="password" 
                            placeholder="" 
                            class="input-small"  
                            type="password"
                            onkeypress="return IsAlphanumeric(event);"
                            value="<?php echo isset($myFormData['password'])? $myFormData['password'] : '';?>"
                            >
                    (minimo 6 caracteres)

                </div>
            </div>
                
                  <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label">Perfil</label>
                <div class="controls">
                    <select id="perfil" name="perfil" class="input-medium">
                        <option value="">Perfil</option> 
                        <?php foreach ($perfiles as $per) :?>
                        <option value="<? echo $per->id_perfil?>"><? echo $per->descripcion?></option> 
                        <?php endforeach;  ?>
                    </select>
                </div>
            </div>
                
                 <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label">Estado</label>
                <div class="controls">
                    <select id="estado" name="estado" class="input-medium">
                        <option value="">Estado</option> 
                        <option value="1" >Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>

          

            <!-- Button -->
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <button id="btn-aceptar" name="aceptar" class="btn btn-success" >Aceptar</button>
                </div>
            </div>

        </fieldset>
    </form>
					
			
			</div>
		</div>
	</div>
</div>
		 

