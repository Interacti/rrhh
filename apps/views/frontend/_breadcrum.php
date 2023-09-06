 
<?php 
 if (isset($camino_migas)) { 

?>





<div class="clearfix"></div>

<ul class="breadcrumb">
         <?php
			     
			     $cont=0; 
				 $class="";
			     $nElementos=count($camino_migas);   
                 
               
			   		foreach($camino_migas as $key=>$value):
						$cont++;  
						if ($cont==$nElementos) { 
						  $class='active';
						
			   ?>
                		<li class="<?php echo $class ?>"  ><?php echo strtoupper($key) ?></li>
                <?php }else{?>        
                        
                        <li class="<?php echo $class ?>"  ><a href="<?php echo $value ?>" ><?php echo strtoupper($key) ?></a> <span class="divider">/</span></li>
                        
            
              <?php 
			      }
			  		endforeach
			?>
</ul>







<?php }?>