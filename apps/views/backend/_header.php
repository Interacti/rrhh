<div class="navbar navbar-fixed-top ">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a data-target=".nav-collapse" data-toggle="collapse"
               class="btn btn-navbar"> <span class="icon-bar"></span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span>
            </a> <a href="<?php echo BASE_URL ?>bo/desktop/solicitudes"
                    class="brand"><img src="<?php echo BASE_IMG_BO ?>logo-bo.fw.png"
                               width="200" height="10" /></a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a
                            href="<?php echo BASE_URL ?>bo/desktop/solicitudes"> <i
                                class="icon-home"></i> Home
                        </a></li>
                    <?php echo menu_bo($this->session->userdata('bo_perfil')); ?>
                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown" id="fat-menu"><a data-toggle="dropdown"
                                                          class="dropdown-toggle" role="button" id="drop3" href="#"> <i
                                class="icon-user"></i><span class="hidden-phone"> 
                                    <?php echo $this->session->userdata('bo_nombre') . " (" . $this->session->userdata('bo_perfil_desc') . ")" ?>
                            </span> <b class="caret"></b>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo BASE_URL ?>bo/login/Logout"><i
                                        class="icon-lock"></i> Logout</a></li>

                        </ul></li>

                </ul>



            </div>
            <!-- /.nav-collapse -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.navbar-inner -->
</div>

<div class="clearfix"></div>

