<style>
    /* Personalización CSS para centrar las pestañas */
    .center-tabs {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        /* Ajusta la altura según tu diseño */
    }

    .center-tabs ul.nav.nav-tabs {
        display: inline-block;
    }

    #carrera .box-carrera {
        background: #fff;
        box-shadow: 5px 20px 15px 0px rgba(0, 0, 0, 0.5);
        padding-top: 15px;
        padding-bottom: 15px;
        margin-top: 10px;
        margin-bottom: 25px;
        display: block;
        padding-top: 15px;
        padding-bottom: 15px;
        margin-bottom: 25px;
        background-color: #fff;
        border: 1px solid #eee;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .05);
        transition: background-color .5s, -webkit-box-shadow .5s;
        background-color: #003B72;
    }

    #carrera h3 {
        font-family: 'russo_oneregular' !important;
        color: #EC691D;
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    #carrera .box-tres-mejores {
        margin-top: 20px;
        font-family: 'russo_oneregular' !important;
        background-color: #003B72;
        padding: 10px 5px;
        color: #fff;
        text-align: center;
    }

    #carrera .box-tres-mejores .numero {
        font-family: 'brandingsemibold' !important;
        font-size: 5rem;

    }

    #carrera .box-tres-mejores .ganadores {
        font-family: 'russo_oneregular' !important;
        font-size: 13pt;
        padding-top: 1rem;


    }

    #carrera .titulo {
        padding-top: 5rem;
    }


    #carrera .header-tabla-puntos {
        font-family: 'russo_oneregular' !important;
        line-height: 1rem;
        background-color: #003B72;
        padding: 0;
        padding-top: 1rem;
        color: #fff;
        text-align: center;
        margin-right: 0px;
        float: left;
        height: 35px;



    }

    #carrera .borde-tabla-puntos {
        font-family: 'russo_oneregular' !important;
        border: 1px solid #003B72;
        padding: 0;
        padding-top: 1rem;
        margin-top: 1rem;
        padding-bottom: 1rem;
        margin-right: 2px;

        float: left;
        height: 35px;
    }

    .pilar {
        width: 40%;
    }

    .sucursal {
        width: 9.5%;
    }

    .footer {
        background-color: #003B72;
        margin-top: 100px;
        margin-bottom: 50px;
    }

    .content-imagen-trabajador {
        position: absolute;

        position: absolute;
        top: 104px;
        left: 126px;
        z-index: 2;
    }

    .posicion {
        position: absolute;
        top: 198px;
        right: 50px;
        z-index: 3;
    }

    .pos-numero {
        font-family: 'russo_oneregular' !important;
        position: absolute;
        color: #003B72;
        font-size: 40px;
        z-index: 5;
        top: 27px;
        left: 10px;
        z-index: 5;
        width: 64px;
    }

    .imagen-trabajador {

        border-radius: 50%;
        width: 173px;
        height: 173px;
    }

    .content-nombre {
        margin-top: 110px;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        color: #fff;
    }

    .content-nombre .saludo {
        font-family: 'russo_oneregular' !important;
        font-size: 30px;
        font-weight: bold;
        text-align: left;
        padding: 1.5rem;
    }

    .content-nombre .nombre {
        font-family: 'russo_oneregular' !important;
        font-size: 25px;
        font-weight: bold;
        padding: .5rem;
        text-align: center;
        width: 100%;
        text-align: left;
    }

    .content-venta {

        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        color: #fff;
    }


    .content-venta .saludo {
        font-family: 'russo_oneregular' !important;
        font-size: 30px;
        font-weight: bold;
        padding: 2rem;
        text-align: left;
    }

    .content-venta .nombre {
        font-family: 'russo_oneregular' !important;
        font-size: 25px;
        font-weight: bold;
        padding: .5rem;
        text-align: center;
        width: 100%;
    }

    .no-padding-l {
        padding-left: 0;
    }

    .no-padding-r {
        padding-right: 0;
    }

    .tab-font {
        font-family: 'russo_oneregular' !important;
    }


    .center-tabs ul.nav.nav-tabs  a {
        background-color: #003B72 !important;
        border: none;
        color: #fff;

    }

    .center-tabs ul.nav.nav-tabs .active a {
        background-color: #EC691D !important;
        border: none;
        color: #fff;

    }
</style>

<section id="carrera" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
            <!-- MENU  LATERAL -->
            <?php $this->load->view('frontend/_menu_lateral', FALSE); ?>
            <!-- FIN MENU LATERAL -->
            <div class="col-md-9 no-padding">
                <div class="center-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active tab-font"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Personal</a></li>
                        <li role="presentation" class="tab-font"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">General</a></li>

                    </ul>
                </div>

                <!-- Contenido de las Pestañas -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab1">
                        <?php $this->load->view('frontend/carrera/personal') ?>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab2">
                    <?php $this->load->view('frontend/carrera/general') ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>