
<script type="text/javascript">
function ValidaFormulario(){

	 if(!$('input[name="preg_1"]').is(':checked')) {
         alert('Debe contestar la pregunta 1');
         return false;
     }

	 if(!$('input[name="preg_2"]').is(':checked')) {
         alert('Debe contestar la pregunta 2');
         return false;
     }

	 if(!$('input[name="preg_3"]').is(':checked')) {
         alert('Debe contestar la pregunta 3');
         return false;
     }

	 if(!$('input[name="preg_4"]').is(':checked')) {
         alert('Debe contestar la pregunta 4');
         return false;
     }
     
	 if(!$('input[name="preg_5"]').is(':checked')) {
         alert('Debe contestar la pregunta 5');
         return false;
     }
     
	 if(!$('input[name="preg_6"]').is(':checked')) {
         alert('Debe contestar la pregunta 6');
         return false;
     }
     
	 /*if(!$('input[name="preg_7"]').is(':checked')) {
         alert('Debe contestar la pregunta 7');
         return false;
     }*/

	 


	
}


</script>


<form action="<?php echo BASE_URL?>encuesta/save" method="post" onsubmit="return ValidaFormulario()" >
<div class="grid_9 alpha" id="content-tema">

  <div  >
     Encuesta Ruta Para&iacute;so
  </div>
  
  <div class="grid_9 alpha">
  <p style=" padding-left: 10px; padding-right: 10px    ">   
  Tu opini&oacute;n es importante para nosotros. Te invitamos a responder esta encuesta sobre nuestro servicio.
  <br>
  
  </p>
  </div>
  
  <div class="grid_7 alpha">
      <p><strong>1.- Qu&eacute; te parecen los productos del cat&aacute;logo de Ruta Para&iacute;so?</strong></p>
      <ul>
            <li> 1 - <input type="radio" name="preg_1" value="1">Muy buenos, tiene variedad de productos.</li>
            <li> 2 - <input type="radio" name="preg_1" value="2">Buenos, son productos &uacute;tiles.</li>
            <li> 3 - <input type="radio" name="preg_1" value="3">Nada especial.</li>
            <li> 4 - <input type="radio" name="preg_1" value="4">Poca variedad de productos.</li>
            <li> 5 - <input type="radio" name="preg_1" value="5">Malos, poca variedad y poco atractivos.</li>
      
      </ul>
  </div>
  <div class="grid_7 alpha">
      <p><strong>2.- Qu&eacute;  te parece la cartola de puntos que muestra el sitio web de Ruta Para&iacute;so ?</strong></p>
      <ul>
            <li> 1 - <input type="radio" name="preg_2" value="1">Muy buena, muestra la informaci&oacute;n correcta y de manera clara.</li>
            <li> 2 - <input type="radio" name="preg_2" value="2">Buena, es una herramienta &uacute;til.</li>
            <li> 3 - <input type="radio" name="preg_2" value="3">Me es indiferente.</li>
            <li> 4 - <input type="radio" name="preg_2" value="4">Mala, no tiene informaci&oacute;n &uacute;til.</li>
            <li> 5 - <input type="radio" name="preg_2" value="5">Muy mala, la informaci&oacute;n es incorrecta y  poco clara.</li>
      
      </ul>
  </div>
  
  <div class="grid_7 alpha">
      <p><strong>3.-   Qu&eacute; te parecen las noticias y novedades del sitio web de Ruta Para&iacute;so?</strong></p>
      <ul>
            <li> 1 - <input type="radio" name="preg_3" value="1">Muy bueno, tiene informaci&oacute;n y noticias interesantes cada mes.</li>
            <li> 2 - <input type="radio" name="preg_3" value="2">Bueno, su informaci&oacute;n es interesante.</li>
            <li> 3 - <input type="radio" name="preg_3" value="3">Me es indiferente.</li>
            <li> 4 - <input type="radio" name="preg_3" value="4">Malo, informaci&oacute;n poco interesante.</li>
            <li> 5 - <input type="radio" name="preg_3" value="5">No lo leo.</li>
      
      </ul>
  </div>
  
  
  
  <div class="grid_7 alpha">
      <p><strong>4.- Qu&eacute; te parece la funcionalidad de los canjes del sitio web de Ruta Para&iacute;so?</strong></p>
      <ul>
            <li> 1 - <input type="radio" name="preg_4" value="1">Muy bueno, f&aacute;cil de canjear e informaci&oacute;n clara.</li>
            <li> 2 - <input type="radio" name="preg_4" value="2">Cumple su funci&oacute;n.</li>
            <li> 3 - <input type="radio" name="preg_4" value="3">Regular, no entiendo el funcionamiento del sistema y falta informaci&oacute;n.</li>
            <li> 4 - <input type="radio" name="preg_4" value="4">Malo, no puedo realizar los canjes</li>
            <li> 5 - <input type="radio" name="preg_4" value="5">No est&aacute; operativo cuando lo necesito.</li>
      
      </ul>
  </div>
  
  
  
  
  <div class="grid_7 alpha">
      <p><strong>5.- Qu&eacute; te parece el tiempo de env&iacute;o de los productos?</strong></p>
      <ul>
            <li> 1 - <input type="radio" name="preg_5" value="1">Muy bueno, llegan muy r&aacute;pido.</li>
            <li> 2 - <input type="radio" name="preg_5" value="2">Bueno, llegan en el plazo acordado de 1 semana.</li>
            <li> 3 - <input type="radio" name="preg_5" value="3">Regular, se tardan a veces m&aacute;s de lo acordado.</li>
            <li> 4 - <input type="radio" name="preg_5" value="4">Malo, tiempo de despacho excesivo.</li>
            <li> 5 - <input type="radio" name="preg_5" value="5">Muy malo, nunca cumplen el tiempo acordado de 1 semana.</li>
      
      </ul>
  </div>
  
   
  
  <!--<div class="grid_7 alpha">
      <p><strong>6.- Que te parecer&iacute;a contar con un Centro de Canje en Santiago (oficina f&iacute;sica)<br /> donde pudieras realizar canjes de productos en stock y retiro de productos canjeados?</strong></p>
      <ul>
            <li> 1 - <input type="radio" name="preg_6" value="1">Muy bueno, ser&iacute;a fant&aacute;stico.</li>
            <li> 2 - <input type="radio" name="preg_6" value="2">Bueno, es una buena iniciativa para retirar los productos cuando los necesito.</li>
            <li> 3 - <input type="radio" name="preg_6" value="3">Regular, no influir&iacute;a mayormente en los tiempos de entrega que requiero.</li>
            <li> 4 - <input type="radio" name="preg_6" value="4">Malo, ya que puedo esperar 1 semana o m&aacute;s, no es necesario, no me gustar&iacute;a ir a retirar a otro lugar.</li>
            <li> 5 - <input type="radio" name="preg_6" value="5">No me interesa.</li>
      
      </ul>
  </div>-->
  
  
  <div class="grid_9 alpha">
      <p><strong>6.- Qu&eacute; te parece el contenido del E-News que se env&iacute;a mensualmente por correo electr&oacute;nico?</strong></p>
      <ul>
            <li> 1 - <input type="radio" name="preg_6" value="1">Muy bueno, tiene informaci&oacute;n y ofertas interesantes cada mes.</li>
            <li> 2 - <input type="radio" name="preg_6" value="2">Bueno, su informaci&oacute;n es interesante.</li>
            <li> 3 - <input type="radio" name="preg_6" value="3">Me es indiferente.</li>
            <li> 4 - <input type="radio" name="preg_6" value="4">Malo, informaci&oacute;n poco interesante.</li>
            <li> 5 - <input type="radio" name="preg_6" value="5">No lo leo.</li>
      
      </ul>
  </div>
  
  
  
   <div class="grid_6 alpha">
      <p><strong>7.- Favor env&iacute;anos un comentario final sobre tu experiencia. (Opcional)? </strong></p>
      <ul>
            <li>
                 <textarea name="comentario" rows="10" cols="50"></textarea>
            
            </li>
            
      
      </ul>
  </div>
  
  <div class="grid_8 frm-control">
    <div class="grid_2"></div>
      <div align="center" class="grdi_6"> 
      <input type="submit" value="ENVIAR"> 
    </div>
  </div>
  
</div>


</form>