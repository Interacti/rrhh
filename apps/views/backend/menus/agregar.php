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

    <form class="form-horizontal" name="frmCategorias" method="post" action="<?php echo BASE_URL ?>bo/categorias/Guardar">
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
                <label class="control-label">Descripcion </label>
                <div class="controls">
                    <input 
                            id="descripcion" 
                            name="descripcion" 
                            placeholder="" 
                            class="input-xlarge"  
                            type="text"
                            
                            >

                </div>
            </div>

            <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label">Estado</label>
                <div class="controls">
                    <select id="estado" name="estado" class="input-small">
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



