<?php
/* $separar=explode(' ',$temas[0]->fecha);    
  $fecha=explode('-',$separar[0]);
  $fechac=$temas[0]->fecha;
  $segundos=strtotime('now')-strtotime($fechac) ;
  $diferencia_dias=intval($segundos/60/60/24);
  $mes=array('', 'Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic' );
 */

//print_r($contenido);
//die();
?>



<?php
$cn = count($contenido);

if ($cn == 0) :
?>

    <section id="product" style="margin-top:25px">
        <div class="container-fluid no-padding">
            <div class="row">
                <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                <div class="col-md-9 ">
                    <div class="col-md-12">
                        <h2 class="titulo-staticos"> <strong> </strong></h2>
                    </div>
                    <div class="col-md-12 separacion">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php else : ?>




    <div class="clearfix"></div>


    <!--/***************************
            beneficios y convenios
    **************************/-->


    <?php if ($subcategoria == 'beneficios-y-convenios') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <!-- MENU  LATERAL -->
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <!-- FIN MENU LATERAL -->
                    <div class="col-md-9 ">
                        <div class="col-md-12">
                            <h2 class="titulo-staticos">
                                <strong>
                                    <?php echo ucfirst(strtolower($categoria)); ?> / <?php echo ucfirst(strtolower(str_replace('-', ' ', $subcategoria))); ?>
                                </strong>
                            </h2>
                        </div>

                        <?php if ($banner) : ?>
                            <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                            </div>
                        <?php endif; ?>


                        <?php if (count($contenido) > 0) : ?>
                            <div class="col-md-12 no-padding">
                                <?php foreach ($contenido as $co) : ?>
                                    <div class="col-md-12 noticias-bienestar-box">
                                        <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>" class="imh-responsive" alt=""> </div>
                                        <div class="col-md-9">
                                            <div class="col-md-12 noticias-bienestar-title"><?php echo $co->titulo ?></div>
                                            <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto ?></div>
                                            <div class="col-md-12 noticias-bienestar-short-text" style="padding-top: 25px;;">
                                                <?php if ($co->seo == 'beneficios-de-la-mutual-de-seguridad') : ?>
                                                    <a href="http://rrhh.caren.cl/temas/bienestar/beneficios-y-convenios/beneficios-de-la-mutual-de-seguridad" class="btn btn-large btn-block btn-primary">CONVENIOS MUTUAL</a>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>




    <!-- /**************************
            personal destacado
    **************************/ -->

    <?php if ($contenido[0]->seo_sub_categoria == 'personal-destacado') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <!-- MENU  LATERAL -->
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <!-- FIN MENU LATERAL -->
                    <div class="col-md-9 ">
                        <div class="col-md-12">
                            <h2 class="titulo-staticos">
                                <strong>
                                    <?php echo ucfirst(strtolower($categoria)); ?> / <?php echo ucfirst(strtolower(str_replace('-', ' ', $subcategoria))); ?>
                                </strong>
                            </h2>
                        </div>

                        <?php if ($banner) : ?>
                            <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                            </div>
                        <?php endif; ?>

                        <?php if (count($contenido) > 0) : ?>
                            <div class="col-md-12 no-padding">
                                <?php foreach ($contenido as $co) : ?>
                                    <div class="col-md-12 noticias-bienestar-box">
                                        <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>" class="imh-responsive" alt=""> </div>
                                        <div class="col-md-9">
                                            <div class="col-md-12 noticias-bienestar-title"><?php echo $co->titulo ?></div>
                                            <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada ?></div>
                                            <div class="col-md-4 col-md-push-8 m-t-70">
                                                <a href="<?php echo base_url() . 'temas/' . $co->glosa_seo . '/' . $co->seo_sub_categoria . '/' . $co->seo ?>" type="button" class="btn btn-large btn-block btn-primary">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <? else : ?>
                            <div class="col-md-12 noticias-bienestar-box">
                                ALGO ASI COMO LAS LIQUDACIONES
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- /**************************
            personal destacado
    **************************/ -->

    <?php
    if ($contenido[0]->seo_sub_categoria == 'nuevos-a-bordo-equipo-caren') :
    ?>

        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">
                        <?php if (count($contenido) > 0) : ?>
                            <div class="col-md-12">
                                <h2 class="titulo-staticos"> <strong> <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> </strong></h2>
                            </div>
                            <?php if ($banner) : ?>
                                <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                    <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                                </div>
                            <?php endif; ?>
                            <?php foreach ($contenido as $co) : ?>
                                <div class="col-md-12 empleados-box">
                                    <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>" alt=""> </div>
                                    <div class="col-md-9">
                                        <div class="col-md-12 nombre-empleado"><?php echo $co->titulo ?></div>
                                        <!-- <div class="col-md-12 cargo-empleado" ><?php echo $co->bajada ?></div> -->
                                        <div class="col-md-12"><?php echo $co->texto ?></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                            <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Modal -->

    <?php endif; ?>


    <!--/**************************
            charlas de segurida
    **************************/-->

    <?php if ($subcategoria == 'papeleta-vacaciones') : ?>


        <script>
            var pop = 1;
        </script>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>


                    <div class="col-md-9 ">
                        <?php if (1 == 1) : ?>
                            <div class="col-md-9 ">
                                <h3>Momentáneamente deshabilitado</h3>
                            </div>
                        <?php
                            die();
                        endif;
                        ?>
                        <div class="col-md-12">
                            <h2 class="titulo-staticos">
                                <strong>
                                    <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> /
                                    <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?>
                                </strong>
                            </h2>
                        </div>
                        <?php if ($banner) : ?>
                            <div class="col-md-12 no-padding" style="margin-bottom: 50px">
                                <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive" />
                            </div>
                        <?php endif; ?>

                        <div class="col-md-12" style="padding: 15px ;">
                            En esta secci&oacute;n usted podr&aacute; generar una Pre Solicitud de vacaciones. Es importante considerar que este documento una vez generado, debe ser presentado de forma f&iacute;sica a su jefatura, para su posterior evaluaci&oacute;n.
                        </div>

                        <?php if (count($vacaciones) > 0) : ?>

                            <div class="col-md-12 no-padding">
                                <div class="col-md-3">
                                    <label>Fecha Inicio Vacaciones</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="ini" /><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Fecha Termino Vacaciones</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="fin" /><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <?php /* ?><label>Dias Progresivos</label>
                                      <div class="input-group">
                                      <input type="text" class="form-control" id="pro" />
                                      </div> <?php */ ?>
                                </div>

                                <div class="col-md-3">
                                    <label>Dias Disponibles</label>
                                    <div class="input-group">
                                        <input readonly="" type="text" class="form-control" id="tot" value="<?php echo number_format(($vacaciones[0]->saldo + $vacaciones[0]->acumulados), 2, ',', '.') ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12" style="margin-top: 20px;">
                                    <div class="input-group" style="float: right;">
                                        <button type="button" id="ejecutar" class="btn btn-large btn-block btn-primary">Generar Comprobante</button>
                                    </div>
                                </div>


                                <div class="col-md-12" style="margin-top: 20px;">
                                    <div class="alert alert-danger er">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Error!</strong> <span class="err"></span>
                                    </div>

                                </div>


                            </div>
                            <div class="clerfix"></div>

                        <?php else : ?>


                        <?php endif; ?>
                        <div class="col-md-12" id="formato" style="margin-top: 50px;display: none;">
                            <table width="100%" align="center">
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <tr>
                                                <td style="width: 33%;"><img src="image003.png" alt=""> </td>
                                                <td style="width: 33%;text-align: center;font-weight: bold">
                                                    COMPROBANTE DE FERIADO<br>
                                                    TARBAJADOR N° : <?php echo $this->session->userdata('codigo') ?>
                                                </td>
                                                <td style="width: 33%;">
                                                    <table width="100%" cellpadding="2" cellspacing="0" align="center">
                                                        <tr>
                                                            <td class="tdW25 borde">LUGAR</td>
                                                            <td class="tdW25 borde">DIA</td>
                                                            <td class="tdW25 borde">MES</td>
                                                            <td class="tdW25 borde">AÑO</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="tdW25 borde">Santiago</td>
                                                            <td class="tdW25 borde"><?php echo date('d') ?></td>
                                                            <td class="tdW25 borde"><?php echo date('M') ?></td>
                                                            <td class="tdW25 borde"><?php echo date('Y') ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="bl bt br">En cumplimiento a las disposiciones legales vigentes se deja constancia que a contar de las fechas que se </td>

                                    </tr>

                                    <tr>
                                        <td colspan="6" class="bl  br">indican, el trabajador:</td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="bl bb  br">
                                            <table width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td>DON:</td>
                                                        <td style="font-weight: 700;"><?php echo $this->session->userdata('apellido') ?>&nbsp;<?php echo $this->session->userdata('nombre') ?></td>
                                                        <td>RUT:</td>
                                                        <td style="font-weight: 700;"><?php echo $this->session->userdata('rutliq') ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="6" class="bl br bb">
                                            <table width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td>Hara uso</td>
                                                        <td style="font-weight: 700;">Feriado Legal</td>
                                                        <td colspan="2">( indicar si parte o el total ) de su </td>

                                                    </tr>
                                                </tbody>
                                            </table>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="60%" class="bl bb br ">Feriado anual con remuneración integra de acuerdo al siguiente detalle:</td>
                                        <td class=" bb br tac" width="10%">Dias</td>
                                        <td class=" bb br tac" width="10%">Valor</td>
                                        <td colspan="2" class=" bb br">&nbsp;&nbsp;&nbsp;&nbsp;</td>

                                    </tr>

                                    <tr>
                                        <td colspan="2" width="60%" class="bl bb br ">DESCANSO EFECTIVO ENTRE LAS FECHAS QUE SE INDICAN:</td>
                                        <td class=" bb br tac" width="10%"><span class="dias" style="font-weight: 700;"></span></td>
                                        <td class=" bb br tac" width="10%">&nbsp;</td>
                                        <td colspan="2" class=" bb br">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" width="60%" class="bl bb br ">
                                            <table width="100%" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td>Desde</td>
                                                        <td style="font-weight: 700;"><span class="inicio"></span></td>
                                                        <td>AL</td>
                                                        <td style="font-weight: 700;"><span class="final"></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td class=" bb br tac" width="10%"><strong>&nbsp;</strong></td>
                                        <td class=" bb br tac" width="10%">&nbsp;</td>
                                        <td colspan="2" class=" bb br">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="bl bb br">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="20%" class="bl bb ">(EN LETRAS)</td>
                                        <td class=" bb " style="font-weight: 700;"><span id="letras"></span> </td>
                                        <td class=" bl br  tac">TOTAL</td>
                                        <td colspan="3" class=" br ">&nbsp;</td>

                                    </tr>
                                    <tr>
                                        <td width="20%" class="bl bb  ">FECHA INGRESO </td>
                                        <td class=" bb tac"><?php echo $this->session->userdata('fecha_registro') ?></td>
                                        <td class="bb bl br tac">&nbsp;</td>
                                        <td colspan="3" class=" bb br">&nbsp;</td>

                                    </tr>
                                    <tr>
                                        <td class="bl bb bt">&nbsp;</td>
                                        <td class="bb bt">&nbsp;</td>
                                        <td class="bl bt bb br tac">DIAS</td>
                                        <td colspan="3" class=" br bl bt">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bb br bl">DIAS HABILES</td>
                                        <td class="bb br tac "><span style="font-weight: 700;" class="dias"></span></td>
                                        <td colspan="3" class="br bl">&nbsp;</td>

                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bb br bl">VACACIONES PROGRESIVAS</td>
                                        <td class="bb br tac " style="font-weight: 700;"><span class="progresivas"></span></td>
                                        <td colspan="3" class=" br bl">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="bb br bl">DOMINGOS E INHABILES</td>
                                        <td class="bb br tac ">&nbsp;</td>
                                        <td colspan="3" class=" br bl">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="bb br bl">FERIADO FRACCIONADO</td>
                                        <td class="bb br tac ">&nbsp;</td>
                                        <td colspan="3" class="bb br bl">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="bb br bl">&nbsp;</td>
                                        <td class="bb br tac ">&nbsp;</td>
                                        <td colspan="3" class="bb br bl bt tac"><strong>FIRMA DEL EMPLEADOR</strong></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="bb br bl">Saldo dias habiles pendientes años anteriores</td>
                                        <td class="bb br tac "><span style="font-weight: 700;"><?php echo number_format($vacaciones[0]->saldo, 2, ',', '.') ?></span></td>
                                        <td colspan="3" class=" br bl bt">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bb br bl">Acumulados año 2018</td>
                                        <td class="bb br tac " style="font-weight: 700;"><?php echo number_format($vacaciones[0]->acumulados, 2, ',', '.') ?></td>
                                        <td colspan="3" class=" br bl ">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bb br bl">Acumulados total a la fecha <span style="font-weight: 700; float: right;margin-right:50px ;"> <?php echo date("d-m-Y") ?></span></td>
                                        <td class="bb br tac " style="font-weight: 700;"><?php echo number_format(($vacaciones[0]->saldo + $vacaciones[0]->acumulados), 2, ',', '.') ?></td>
                                        <td colspan="3" class="br bl bb ">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="bb br bl">&nbsp;</td>
                                        <td class="bb br tac ">&nbsp;</td>
                                        <td colspan="3" class="bb br bl bt tac"><strong>FIRMA DEL TRABAJADOR</strong></td>
                                    </tr>


                                    <tr>
                                        <td colspan="6" class="tac bl bb br">NOTA: Se deja constancia que el cálculo del feriado se ha hecho de conformidad a lo dispuesto en el Capitulo VII, "Del Feriado Anual y de los Permisos, del Capítulo I del Código del Trabajo </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>


                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>



    <!--/**************************
            charlas de segurida
    **************************/-->

    <?php if ($contenido[0]->seo_sub_categoria == 'charlas-de-seguridad') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">
                        <?php if (count($contenido) > 0) : ?>
                            <div class="col-md-12">
                                <h2 class="titulo-staticos"> <strong> <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> </strong></h2>
                            </div>

                            <?php if ($banner) : ?>
                                <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                    <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                                </div>
                            <?php endif; ?>

                            <?php foreach ($contenido as $co) : ?>
                                <div class="col-md-12 empleados-box">
                                    <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>" alt=""> </div>
                                    <div class="col-md-9">
                                        <div class="col-md-12 nombre-empleado"><?php echo $co->titulo ?></div>

                                        <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto ?></div>


                                    </div>
                                </div>
                                <div class="clearfix"></div>

                            <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!--/**************************
            cumpleaños
    **************************/-->

    <style>
        .slick-slide img {

            padding: 10px;
            margin-bottom: 15px;
            width: 350px;
            height: 350px;
        }

        .cargo-empleado {
            color: #36a9e0;
            font-size: 12px !important;
            padding-bottom: 5px;
        }
    </style>

    <?php if ($subcategoria == "cumpleanos") : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">
                        <?php if (count($contenido) > 0) :
                        ?>
                            <div class="col-md-12">
                                <h2 class="titulo-staticos"> <strong> <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> </strong></h2>
                            </div>

                            <?php ?>

                            <?php if ($banner) : ?>
                                <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                    <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                                </div>
                            <?php endif; ?>
                            <div class="col-md-12" style="margin-bottom: 50px">
                                <p>En esta sección podrás conocer las fechas de los cumpleaños más próximos en el calendario.</p>
                            </div>


                            <div class="col-md-12">


                                <div id="slick1">
                                    <?php foreach ($cumples as $co) : ?>


                                        <?php if (file_exists("./assets/frontend/img/personal/" . $co->rutdv . ".jpg")) : ?>
                                            <div class="item ">
                                                <div>
                                                    <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/personal/<?php echo $co->rutdv ?>.jpg" alt="">
                                                </div>
                                                <div>
                                                    <?php $nom = explode(' ', $co->nombre); ?>
                                                    <div class="col-md-12 cargo-empleado"> <?php echo $nom[0] . ' ' . $co->apellido ?></div>
                                                    <div class="col-md-12 cargo-empleado"> <?php echo $co->centrocosto ?></div>
                                                    <div class="col-md-12 cargo-empleado"> <?php echo date('d-m', strtotime($co->fecha_nacimiento)) ?></div>
                                                </div>
                                            </div>

                                        <?php elseif (file_exists("./assets/frontend/img/personal/" . $co->rutdv . ".JPG")) : ?>
                                            <div class="item ">
                                                <div>
                                                    <img class="img-responsive" src="<?php echo base_url() ?>assets/frontend/img/personal/<?php echo $co->rutdv ?>.JPG" alt="">
                                                </div>
                                                <div>
                                                    <div class="col-md-12 cargo-empleado"> <?php echo $co->nombre . ' ' . $co->apellido ?></div>
                                                    <div class="col-md-12 cargo-empleado"> <?php echo $co->departamento ?></div>
                                                    <div class="col-md-12 cargo-empleado"> <?php echo date('d-m', strtotime($co->fecha_nacimiento)) ?></div>
                                                </div>

                                            </div>


                                        <?php endif; ?>

                                    <?php endforeach; ?>

                                </div>


                            </div>

                            <?php /* foreach ($cumples as $co):	?>
                              <div class="col-md-6 empleados-box">
                              <div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/personal/<?php echo $co->rutdv?>.jpg"  alt=""> </div>
                              <div class="col-md-9" >
                              <div class="col-md-12 cargo-empleado">NOMBRE: <?php echo $co->nombre . ' ' . $co->apellido  ?></div>
                              <div class="col-md-12 cargo-empleado" >DEPARTAMENTO: <?php echo $co->departamento?></div>
                              <div class="col-md-12 cargo-empleado" >FECHA NACIMIENTO: <?php echo date('d-m-d',strtotime($co->fecha_nacimiento))?></div>

                              </div>
                              </div>

                              <?php endforeach; */ ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!--/**************************
            noticias internas
    **************************/-->

    <?php if ($subcategoria == 'noticias-internas') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <!-- MENU  LATERAL -->
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <!-- FIN MENU LATERAL -->
                    <div class="col-md-9 ">
                        <div class="col-md-12">
                            <h2 class="titulo-staticos">
                                <strong>
                                    <?php echo ucfirst(strtolower($categoria)); ?> / <?php echo ucfirst(strtolower(str_replace('-', ' ', $subcategoria))); ?>
                                </strong>
                            </h2>
                        </div>

                        <?php if ($banner) : ?>
                            <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                            </div>
                        <?php endif; ?>

                        <?php if (count($contenido) > 0) : ?>
                            <div class="col-md-12 no-padding">
                                <?php foreach ($contenido as $co) : ?>
                                    <div class="col-md-12 noticias-bienestar-box">
                                        <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>" class="imh-responsive" alt=""> </div>
                                        <div class="col-md-9">
                                            <div class="col-md-12 noticias-bienestar-title"><?php echo $co->titulo ?></div>
                                            <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada ?></div>
                                            <div class="col-md-4 col-md-push-8 m-t-70">
                                                <a href="<?php echo base_url() . 'temas/' . $co->glosa_seo . '/' . $co->seo_sub_categoria . '/' . $co->seo ?>" type="button" class="btn btn-large btn-block btn-primary">Ver más</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>



    <!--/**************************
            galeria de fotos
    **************************/-->

    <?php if ($contenido[0]->seo_sub_categoria == 'galeria-de-fotos') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">
                        <?php if (count($contenido) > 0) : ?>
                            <div class="col-md-12 no-padding">
                                <h2 class="titulo-staticos"> <strong> <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> </strong></h2>
                            </div>

                            <?php if ($banner) : ?>
                                <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                    <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                                </div>
                            <?php endif; ?>

                            <?php foreach ($contenido as $co) : ?>
                                <div class="col-md-12 noticias-bienestar-box">
                                    <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>" class="imh-responsive" alt=""> </div>
                                    <div class="col-md-9">
                                        <div class="col-md-12 noticias-bienestar-title"><?php echo $co->titulo ?></div>
                                        <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada ?></div>
                                        <div class="col-md-4 col-md-push-8 m-t-70">
                                            <a href="<?php echo base_url() . 'temas/' . $co->glosa_seo . '/' . $co->seo_sub_categoria . '/' . $co->seo ?>" type="button" class="btn btn-large btn-block btn-primary">Ver Galeria</a>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            <?php endforeach; ?>

                    </div>
                <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>



    <!--/**************************
            concursos
    **************************/-->

    <?php if ($contenido[0]->seo_sub_categoria == 'concursos') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">
                        <?php if (count($contenido) > 0) : ?>

                            <div class="col-md-12 no-padding">
                                <h2 class="titulo-destacado-inc"> <strong> <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> </strong></h2>
                            </div>

                            <?php if ($banner) : ?>
                                <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                    <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                                </div>
                            <?php endif; ?>

                            <?php foreach ($contenido as $co) : ?>


                                <div class="col-md-12 noticias-bienestar-box">
                                    <div class="col-md-3"><img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>" class="img-responsive" alt=""></div>
                                    <div class="col-md-9">
                                        <div class="col-md-12 noticias-bienestar-title"><?php echo $co->titulo ?></div>
                                        <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada ?></div>
                                        <div class="col-md-4 col-md-push-8 m-t-70">
                                            <a href="<?php echo base_url() . 'temas/' . $co->glosa_seo . '/' . $co->seo_sub_categoria . '/' . $co->seo ?>" type="button" class="btn btn-large btn-block btn-primary">Saber m&aacute;s</a>
                                        </div>
                                    </div>


                                    <div class="clearfix"></div>
                                </div>
                            <?php endforeach; ?>

                    </div>
                <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php if ($contenido[0]->seo_sub_categoria == 'encuesta-clima') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">
                        <?php if (count($contenido) > 0) : ?>

                            <div class="col-md-12 no-padding">
                                <h2 class="titulo-destacado-inc"> <strong> <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> </strong></h2>
                            </div>

                            <?php if ($banner) : ?>
                                <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                    <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                                </div>
                            <?php endif; ?>

                            <?php foreach ($contenido as $co) : ?>

                            <?php endforeach; ?>

                    </div>
                <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>







    <?php if ($contenido[0]->seo_sub_categoria == 'productos-y-servicio-destacados') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">
                        <?php if (count($contenido) > 0) : ?>
                            <div class="col-md-12 no-padding">
                                <h2 class="titulo-destacado-inc"> <strong> <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?> </strong></h2>
                            </div>
                            <?php foreach ($contenido as $co) : ?>
                                <div class="col-md-12 noticias-bienestar-box">
                                    <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/temas/<?php echo $co->img1 ?>" class="imh-responsive" alt=""> </div>
                                    <div class="col-md-9">
                                        <div class="col-md-12 noticias-bienestar-title"><?php echo $co->titulo ?></div>
                                        <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto ?></div>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            <?php endforeach; ?>

                    </div>
                <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!--/*****
            SUPER IDEA
    *****/-->

    <?php if ($contenido[0]->seo_sub_categoria == 'super-idea') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">

                        <div class="col-md-12 no-padding">
                            <h2 class="titulo-destacado-inc">
                                <strong>
                                    <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> /
                                    <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?>
                                </strong>
                            </h2>
                        </div>
                        <?php if ($banner) : ?>
                            <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                            </div>
                        <?php endif; ?>
                        <div class="col-md-12 no-padding">
                            <?php foreach ($contenido as $co) : ?>

                                <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto ?></div>
                            <?php endforeach; ?>
                        </div>
                        <?php /* ?> 
                          <div class="col-md-12 noticias-bienestar-box">
                          <div class="col-md-12 ">
                          <div style="color: #94c120;" class="h2 text-center">Ganador</div>
                          <div class="col-md-3 no-padding"> <img src="<?php echo base_url() ?>/assets/frontend/img/empresa/avatar.jpg"  alt=""> </div>
                          <div class="col-md-9" >
                          <div class="col-md-12 h3" style="color: #94c120;">Nombre Trabajador</div>
                          <div class="col-md-12 cargo-empleado" >cargo / depto </div>
                          <div class="col-md-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vel augue tortor. Donec sodales tellus sed magna malesuada sodales. Aliquam vel sem ligula. Donec sed leo a ligula egestas congue et eu lectus. </div>
                          </div>
                          </div>
                          </div>
                          <?php */ ?>

                        <div class="col-md-12 noticias-bienestar-box">
                            <?php if ($this->session->flashdata('bien') != "") : ?>
                                <div class="alert alert-success">
                                    <?php
                                    echo $this->session->flashdata('bien');
                                    ?>

                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('errors') != "") : ?>
                                <div class="alert alert-danger">
                                    <?php
                                    echo $this->session->flashdata('errors');
                                    ?>

                                </div>
                            <?php endif; ?>

                            <form name="nidea" enctype="multipart/form-data" method="post" action="<?php base_url() ?>/temas/idea">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mensaje</label>
                                        <textarea name="idea" class="form-control" style="width: 800px"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Adjunto</label>
                                        <input type="file" name="file" id="file" />
                                    </div>

                                    <div class="form-group">
                                        <input class="btn btn-primary btn-md" value="Enviar" type="submit">

                                    </div>

                                </div>
                            </form>
                        </div>


                    </div>
                </div>
        </section>
    <?php endif; ?>


    <!--/*****
            SUPER IDEA
    *****/-->
    <?php if ($subcategoria == 'anexos-telefonicos') : ?>
        <style>
            .typeahead {
                border: 1px solid #FFF;
                border-radius: 4px;
                padding: 8px 12px;
                max-width: 300px;
                min-width: 290px;
                background: #000;
                color: #FFF;
            }

            .tt-menu {
                width: 300px;
            }

            ul.typeahead {
                margin: 0px;
                padding: 10px 0px;
            }

            ul.typeahead.dropdown-menu li a {
                padding: 10px !important;
                border-bottom: #CCC 1px solid;
                color: #FFF;
            }

            ul.typeahead.dropdown-menu li:last-child a {
                border-bottom: 0px !important;
            }

            .bgcolor {
                max-width: 100%;
                min-width: 290px;
                max-height: 340px;
                background: transparent no-repeat center center;
                padding: 100px 10px 130px;
                border-radius: 4px;
                text-align: center;
                margin: 10px;
            }

            .demo-label {
                font-size: 1.5em;
                color: #ccc;
                font-weight: 500;
                color: #FFF;
            }

            .dropdown-menu>.active>a,
            .dropdown-menu>.active>a:focus,
            .dropdown-menu>.active>a:hover {
                text-decoration: none;
                background-color: #ccc;
                outline: 0;
            }

            #resul {
                margin-top: 25px;
            }
        </style>

        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <div class="col-md-9 ">


                        <div class="col-md-12 no-padding">
                            <h2 class="titulo-staticos-rrhh">
                                <strong>
                                    <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria)); ?> /
                                    <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria)); ?>
                                </strong>
                            </h2>
                        </div>
                        <?php if ($banner) : ?>
                            <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                            </div>
                        <?php endif; ?>

                        <?php foreach ($contenido as $co) : ?>
                            <div class="col-md-12 no-padding" style="margin-bottom: 70px;">
                                <h5><?php echo $co->texto ?></h5>
                            </div>
                        <?php endforeach; ?>
                        <div class="col-md-5 ">
                            <div class="input-group input-group-sm" style="margin-top:25px">
                                <input type="text" id="txtCountry" class="form-control" placeholder="BUSQUEDA POR NOMBRE">
                                <span class="input-group-btn">
                                    <button id="search" type="button" class="btn btn-info btn-flat">BUSCAR</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-push-1 ">
                            <div class="input-group input-group-sm" style="margin-top:25px">
                                <select id="sArea" class="form-control" style="width: 400px;">
                                    <option>SELECCIONE CENTRO COSTO</option>
                                    <?php foreach ($areas as $area) : ?>
                                        <option value="<?php echo $area->id ?>"><?php echo $area->glosa ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12" id="resul">


                        </div>



                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php /* if ($contenido[0]->seo_sub_categoria=='liquidaciones-de-sueldo') : ?>
      <section id="product" style="margin-top:25px">
      <div class="container no-padding">
      <div class="row">
      <?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>
      <div class="col-md-9 " >
      <?php if (count($contenido)>0) :?>
      <div class="col-md-12 no-padding">
      <h2 class="titulo-staticos-rrhh"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
      <?php foreach ($contenido as $co):	?>
      <div class="col-md-12 "  >
      <div class="col-md-12" >
      <div class="sub-titulo-staticos-rrhh col-md-12 noticias-bienestar-short-text">PARA DESCARGAR TU LIQUIDACIÓN DE SUELDO</div>
      <div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto?></div>
      </div>

      <div class="clearfix"></div>
      </div>
      <?php endforeach;?>

      </div>
      <?php endif; ?>
      </div>
      </div>
      </section>
      <?php endif; */ ?>





    <?php if ($subcategoria == 'liquidaciones-de-sueldo') : ?>
        <section id="product" style="margin-top:25px">
            <div class="container no-padding">
                <div class="row">
                    <!-- MENU  LATERAL -->
                    <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
                    <!-- FIN MENU LATERAL -->
                    <div class="col-md-9 ">
                        <div class="col-md-12">
                            <h2 class="titulo-staticos-rrhh">
                                <strong>
                                    <?php echo strtoupper(strtolower($categoria)); ?> / <?php echo ucfirst(strtolower(str_replace('-', ' ', $subcategoria))); ?>
                                </strong>
                            </h2>
                            <?php $rutLiq = explode('-', $this->session->userdata['rutliq']); ?>
                            </p>
                        </div>

                        <?php if ($banner) : ?>
                            <div class="col-md-12 no-padding" style="margin-bottom: 50px">

                                <img src="<?php echo base_url() ?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image ?>" class="center-block  img-responsive">
                            </div>
                        <?php endif; ?>


                        <div class="col-md-12">
                            <p>
                                En esta secci&oacute;n usted podr&aacute; acceder en formato pdf a sus &uacute;ltimas 3 liquidaciones de sueldo, para los tramites que estime conveniente.
                            </p>
                        </div>


                        <div class="col-md-12 no-padding">
                            <div class="col-md-12 noticias-bienestar-box">

                                <?php /* if($rutLiq[0]!='12635182') { ?>

                                  <table class="table table-bordered table-hover">
                                  <tbody>

                                  <tr>
                                  <td>Descargar Liqudacion Agosto 2018</td>
                                  <td class="text-center"><a target="_blank" href="<?php echo base_url() ?>assets/frontend/liquidaciones/2018_08_<?php echo $rutLiq[0] ?>.pdf"><i class="fa fa-download"></i></a></td>
                                  </tr>
                                  <tr>
                                  <td>Descargar Liqudacion Septiembre 2018</td>
                                  <td class="text-center"><a target="_blank" href="<?php echo base_url() ?>assets/frontend/liquidaciones/2018_09_<?php echo $rutLiq[0] ?>.pdf"><i class="fa fa-download"></i></a></td>
                                  </tr>
                                  <tr>
                                  <td>Descargar Liqudacion Octubre 2018</td>
                                  <td class="text-center"><a target="_blank"  href="<?php echo base_url() ?>assets/frontend/liquidaciones/2018_10_<?php echo $rutLiq[0] ?>.pdf"><i class="fa fa-download"></i></a></td>
                                  </tr>
                                  </tbody>
                                  </table>
                                  <?php } */ ?>


                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <?php /* ?>
                                          <!--<tr>
                                          <td>Descargar Liqudacion Agosto 2018</td>''
                                          <td class="text-center"><a target="_blank" href="<?php echo base_url() ?>temas/descargar/2018_08_<?php echo $rutLiq[0] ?>"><i class="fa fa-download"></i></a></td>
                                          </tr>-->
                                          <?php */ ?>
                                        <tr>
                                            <td>Descargar Liqudacion Febrero 2019</td>
                                            <td class="text-center"><a target="_blank" href="<?php echo base_url() ?>temas/descargar/2019_02_<?php echo $rutLiq[0] ?>"><i class="fa fa-download"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Descargar Liqudacion Enero 2019</td>
                                            <td class="text-center"><a target="_blank" href="<?php echo base_url() ?>temas/descargar/2019_01_<?php echo $rutLiq[0] ?>"><i class="fa fa-download"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Descargar Liqudacion Diciembre 2018</td>
                                            <td class="text-center"><a target="_blank" href="<?php echo base_url() ?>temas/descargar/2018_10_<?php echo $rutLiq[0] ?>"><i class="fa fa-download"></i></a></td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>












<?php endif; ?>