<!-- jQuery 2.1.4 -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery-2.1.4.min.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/bootstrap.min.js"></script>
<!-- Owl Carousel JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/owl.carousel.min.js"></script>
<!--countTo JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery.countTo.js"></script>
<!-- mixitup JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery.mixitup.min.js"></script>
<!-- magnific popup JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery.magnific-popup.min.js"></script>
<!-- Appear JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery.appear.js"></script>
<!-- MeanMenu JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery.meanmenu.min.js"></script>
<!-- Nivo Slider JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery.nivo.slider.pack.js"></script>
<!-- Scrollup JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery.scrollup.min.js"></script>
<!-- simpleLens JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery.simpleLens.min.js"></script>
<!-- Price Slider JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/jquery-price-slider.js"></script>
<!-- WOW JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/wow.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/slick/slick.min.js"></script>


<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/data-tables/media/js/jquery.dataTables.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/data-tables/media/js/dataTables.bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/ekko/ekko-lightbox.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/autocomplete/typeahead.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/cycle/jquery.cycle2.min.js"></script>


<script>

function unloaded(){
        alert("Come again!");
      }

   /*window.addEventListener("beforeunload", function (e) {
        var confirmationMessage = "\o/";

        (e || window.event).returnValue = confirmationMessage; //Gecko + IE
        return confirmationMessage;                            //Webkit, Safari, Chrome
    });*/

    /*window.onbeforeunload = function() {
     return "Leaving this page will reset the wizard";
     };*/
</script>
<script language="JavaScript">
  /*window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "Estas intentando cerrar el acceso directo a nuestra intranet, este es un recurso de mucha utilidad que necesitamos  mantengas permanentemente abierto";
  }
  
  function cerrarventana() {
      alert("Estas intentando cerrar el acceso directo a nuestra intranet, este es un recurso de mucha utilidad que necesitamos  mantengas permanentemente abierto")
  }*/
  
</script>
<script>
    
    
    
    
    new WOW().init();
    var pop;



    $(document).ready(function () {
        
        //$("#Modal2").modal("show");
        
        if (pop == 1) {
            $('#Modal').modal('show');
        }


        $(".er").hide();
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        $("#ejecutar").click(function (e) {

            $.ajax({
                url: "<?php echo base_url() ?>calcular",
                data: {
                    inicio: $('#ini').val(),
                    fin: $('#fin').val(),
                    progr: $('#pro').val(),
                    total: $('#tot').val(),
                },
                dataType: "json",
                type: "POST",
                success: function (data) {
                    if (data['success'] == 'ok') {
                        $(".er").hide();
                        $(".dias").html(data['dias']);
                        $(".inicio").html(data['inicio']);
                        $(".final").html(data['final']);
                        $(".progresivas").html(data['progresivas']);
                        $("#letras").html(data['letras']);

                        window.open('<?php echo base_url() ?>/assets/comprobantes/' + data['nombre'], '_blank');

                        //window.location.href="<?php echo base_url() ?>/assets/comprobantes/"+data['nombre']

                        //$("#formato").fadeIn(500);
                    } else {
                        $("#formato").fadeOut(500);
                        $(".er").fadeIn(500);
                        $(".err").html(data['msg'])
                    }
                }
            });

            e.preventDefault();

        });




        $("#sArea").change(function (e) {

            $.ajax({
                type: "POST",
                data: {
                    area: $(this).val(),
                },
                url: "<?php echo base_url() ?>area",
                dataType: 'html',
                success: function (data) {
                    $("#resul").html(data);
                    $("#sArea").val('');

                }
            });
            e.preventDefault();

        });



        $("#scategoria").change(function (e) {

            $.ajax({
                type: "POST",
                data: {
                    id: $(this).val(),
                },
                url: "<?php echo base_url() ?>documentos",
                dataType: 'html',
                success: function (data) {
                    $(".c").html(data);

                }
            });
            e.preventDefault();

        });










        $('.single-item').slick();

        $('#slick1').slick({
            rows: 3,
            dots: true,
            arrows: true,
            infinite: true,
            speed: 1000,
            slidesToShow: 3,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesPerRow: 3,
                        rows: 3,
                        slidesToScroll: 1,
                        slidesToShow: 1,
                        dots: true
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        rows: 1,
                        slidesPerRow: 1,
                        slidesToScroll: 1,
                        slidesToShow: 1,
                        dots: true
                    }
                }
            ]
        });


        $('#txtCountry').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "<?php echo base_url() ?>autocomplete",
                    data: 'query=' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        result($.map(data, function (item) {
                            return item;
                        }));
                    }
                });
            }
        });



        $("#search").click(function () {
            $.ajax({
                type: "POST",
                data: {
                    name: $('#txtCountry').val(),
                },
                url: "<?php echo base_url() ?>anexo",
                dataType: 'html',
                success: function (data) {
                    $("#resul").html(data);
                    $('#txtCountry').val('');

                }
            });
        });

        $("#televenta").DataTable({
            "order": [[0, "desc"]],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "_TOTAL_ registros totales",
                "sInfoEmpty": "No hay registros",
                "sInfoFiltered": "",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }

        });

        $('.mobile > ul > li:has(ul)').addClass('desplegable');
        $('.mobile > ul > li > a').click(function () {
            var comprobar = $(this).next();
            $('.menujq li').removeClass('activa');
            $(this).closest('li').addClass('activa');
            if ((comprobar.is('ul')) && (comprobar.is(':visible'))) {
                $(this).closest('li').removeClass('activa');
                comprobar.slideUp('normal');
            }
            if ((comprobar.is('ul')) && (!comprobar.is(':visible'))) {
                $('.mobile ul ul:visible').slideUp('normal');
                comprobar.slideDown('normal');
            }
        });
    });

    $('#datepicker_solicitud_1,#datepicker_solicitud_2,#ingreso,#nacimiento').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
    });

    $('.datepicker_carto').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
    });


    $('.date').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
    });

</script>	
<!-- Main JS -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/theme') ?>/js/main.js"></script>