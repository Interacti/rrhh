
<div class="row-fluid">
	<div class="panel panel-security">
		<div class="panel-heading">
			<strong><?php echo $titulo?> </strong>
		</div>
		<div class="panel-body">
		 	<div class="row-fuid">
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
    <form class="form-horizontal" name="frmCategorias" method="post" action="<?php echo BASE_URL?>bo/categorias_temas/Actualizar">
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
                            value="<?php echo $rs[0]->id_categoria?>"
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
                            value="<?php echo  $rs[0]->glosa_categoria ?>"
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
                    <button id="btn-aceptar" name="aceptar" class="btn btn-success" >Aceptar</button>
                </div>
            </div>

        </fieldset>
    </form>
		 	
		 	</div>
		 </div>
 	</div>
</div>

