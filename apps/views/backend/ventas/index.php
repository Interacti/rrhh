<link href="<?php echo base_url() ?>assets/frontend/theme/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/backoffice/js/dropzone/css/dropzone.css" type="text/css" />  
<script type="text/javascript" src="<?php echo base_url() ?>assets/backoffice/js/dropzone/dropzone.min.js"></script>
<script>
    Dropzone.options.dropzone = {
        url: "<?php echo base_url() ?>bo/ventas/upload",
        parallelUploads: 1,
        uploadMultiple: false,
        maxFilesize: 2000,
        dictResponseError: "Ha ocurrido un error en el server",
        acceptedFiles: ".zip",
        dictDefaultMessage: '<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Arrastre el o los archivos</span> \
                        <span class="smaller-80 grey">(o clic)</span> <br /> \
                        <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>',
        totaluploadprogress(uploadProgress) {
            
             $('.progress-bar').css('width', uploadProgress + '%')
             $('.progress-bar').html( uploadProgress + '%')
             if (uploadProgress>50){
                 $('.progress-bar').css('color','#fff');
             }
        },  
        successmultiple(files, res) {
             alert("Archvos Subidos de manera correcta");
        },        
        complete: function (file) {
            if (file.status == "success")
            {
                alert("El siguiente archivo ha subido correctamente: " + file.name);
                window.location.href="<?php echo base_url()?>bo/ventas/";
             
            }
        },
        error: function (file) {
            alert("Error subiendo el archivo " + file.name);
        },
        removedfile: function (file, serverFileName) {
            var name = file.name;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>bo/archivos/delete",
                data: "filename=" + name,
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.res == true)
                    {
                        var element;
                        (element = file.previewElement) != null ?
                                element.parentNode.removeChild(file.previewElement) :
                                false;
                        alert("El elemento fué eliminado: " + name);
                    }
                }
            });
        }

    };
</script>

<div style="background: #00a65a;width: 0;text-align: center" class="progress-bar">
    0%
</div>

<form class="form-horizontal" id="frmrchivo" name="frmAbono" method="post" action="">
    <div id="dropzone" class="dropzone"></div>
</form>