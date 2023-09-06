<div class="row-fluid">
    <ul class="breadcrumb"  >
        <li><a href="<?php echo BASE_URL?>bo/desktop/DetalleSolicitud">Administrador</a> <span class="divider">/</span></li>
        <li><a href="<?php echo BASE_URL . $seccion[1]; ?>"><?php echo $seccion[0]; ?></a><span class="divider">/</span></li>
        <li class="active"><?php echo $seccion[2]; ?></li>
    </ul>
</div>
<div class="separador"></div>

 <div class="clearfix"></div>
                 <a href="/validar/	<?php echo $this->session->userdata ( 'bo_usuario' )?>" target="_blank" class="btn btn-primary btn-small"><i class="icon-plus-sign icon-white"></i>Vista Previa</a>   
                 <div class="clearfix" style="margin-bottom: 10px;"></div>