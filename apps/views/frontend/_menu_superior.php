<!-- BARRA MENUS-->
<?php //echo uri_string();
?>
<style>
    .pestana-orange {
        background-color: #EC691D !important;
        padding: 2px 2px !important;
        margin-bottom: -1px !important;
    }

    .carrera {
        width: 150px;
        height: auto;
    }
</style>

<div class="menu-area"><!--Start Main Menu Area-->

    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <div class="main-menu hidden-sm hidden-xs" style="float: right; ">
                    <nav>
                        <ul>
                            <li><a href="<?php echo base_url() ?>" class="active">Home</a></li>
                            <li><a class="<?php echo uri_string() === "actualizar" ? 'current' : '' ?>" href="<?php echo BASE_URL ?>mis-datos">Mis Datos</a></li>
                            <li><a class="<?php echo uri_string() === "contactanos" ? 'current' : '' ?>" href="<?php echo BASE_URL ?>contactanos">Cont&aacute;ctanos</a></li>
                            <li class="pestana-orange"><a class="<?php echo uri_string() === "contactanos" ? 'current' : '' ?>" href="<?php echo BASE_URL ?>carrera360"> <img src="/assets/frontend/img/360/logo-pestana.png" class="carrera"> </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid no-padding">
        <div class="mobile-menu hidden-md hidden-lg">
            <nav>
                <ul>
                    <li><a href="<?php echo base_url() ?>" class="active">Home</a></li>
                    <li><a href="<?php echo base_url() ?>" class="active">Mision</a></li>
                    <li><a href="<?php echo base_url() ?>" class="active">Vision</a></li>
                    <?php echo MenuLateralCaren() ?>
                    <li><a class="<?php echo uri_string() === "contactanos" ? 'current' : '' ?>" href="<?php echo BASE_URL ?>contactanos">Cont&aacute;ctanos</a></li>
                    <li><a href="">CERRAR SESI&Oacute;N</a></li>



                </ul>
            </nav>
        </div>

    </div>

</div>