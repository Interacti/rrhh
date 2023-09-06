<div class="container" id="frm-login">
 
    
    <form class="form-signin" action="<?php echo BASE_URL?>bo/login/validaLogin" method="post">
       <img src="http://rrhh.caren.cl/assets/frontend/img/header/logo.png" width="200" height="10"/>
        <h2 class="form-signin-heading alert alert-info ">Inicio de Sesion</h2>
        <input type="text" class="input-block-level" placeholder="Usuario" name="usuario" >
        <input type="password" class="input-block-level" placeholder="Password" name="password" >
        <div class="separador"></div>
        <div class="clearfix"></div>
      <?php 
      
        //echo "test : ".$this->session->flashdata('err');
        if ($this->session->flashdata('err')!="") : 
        
      ?>
        <div class="alert alert-error" align="center" >
            <i class="icon-warning-sign pull-left"></i>
        <?php 
            echo $this->session->flashdata('err'); 
        ?>
                
        </div>
    <?php endif ?>
        <div class="separador"></div>
        <button class="btn btn-large btn-primary" type="submit">Login!!</button>
      </form>
      
 
</div> 
