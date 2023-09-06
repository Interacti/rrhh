<script>

</script>
<style>
	
 .lateral ul {
    list-style: outside none none;
    margin: 0 auto;
    padding: 0;
    width: 100%;
    font-family: 'Open Sans', sans-serif;
   
}   
    
.lateral .li {
    list-style: outside none none;
    display: block;
    font-size: 16px;
    line-height: 16px;
    padding: 15px;
    text-decoration: none;
    font-family: 'Open Sans', sans-serif;
}


.lateral a {
    background: #fff none repeat scroll 0 0;
    border-bottom: 1px solid #ebebeb;
    color: #252559;
    display: block;
    font-size: 14px;
    line-height: 19px;
    padding: 23px;
    text-decoration: none;
    
    font-family: 'Open Sans', sans-serif;
}

.lateral  ul li ul li a {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border-bottom: 1px solid #fff;
    color: #000;
    display: block;
    font-size: 12px;
  
    text-decoration: none;
 
    width: 100%;
}


.lateral a:hover {
    background: #ccc none repeat scroll 0 0;
   
}


	
.mobile {
    
}
.mobile ul {
    list-style: outside none none;
    margin: 0 auto;
    padding: 0;
    width: 100%;
}
.mobile a {
    background: #fff none repeat scroll 0 0;
    border-bottom: 1px solid #ebebeb;
    color: #252559;
    display: block;
    font-size: 12px;
    line-height: 16px;
    padding: 15px;
    text-decoration: none;
    /*text-transform: uppercase;*/
    
}

.mobile a:hover {
    background: #fff none repeat scroll 0 0;
    border-bottom: 1px solid #ebebeb;
    color: #53A8E1;
    display: block;
    font-size: 12px;
    line-height: 16px;
    padding: 15px;
    text-decoration: none;
    /*text-transform: uppercase;*/
}


.mobile ul li a::before {
    content: "● ";
    vertical-align: top;
    width: 28px;
}


.mobile ul li a:hover {
   background: #53A8E1 none repeat scroll 0 0;
   color: #fff;
   /*padding-left: 30px;*/
}


.mobile ul li.desplegable a::before {
    content: "► ";
}
.mobile ul li.desplegable.activa a::before {
    content: "▼ ";
}
.mobile ul li.desplegable ul li a::before, .mobile ul li.desplegable.activa ul li a::before {
    content: "";
}
.mobile ul li ul {
    background: #fff none repeat scroll 0 0;
    display: none;
    width: 100%;
}
.mobile ul li ul li a {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border-bottom: 1px solid #fff;
    color: #000;
    display: block;
    font-size: 12px;
    
    text-decoration: none;
    text-transform: uppercase;
    width: 100%;
}




.mobile ul li ul li a:hover {
    background-color: #53A8E1;
}

#side-bar  h2 {
    background: #fff none repeat scroll 0 0; 
    color: #252559;
    font-size: 18px; 
    font-weight: 700;
    margin-bottom: 15px;
    padding: 15px 20px;
    text-align: center;
}
</style>



<div class="col-md-3 hidden-xs hidden-sm hiddden-md no-padding" id="side-bar">
    <div class="lateral" style="left: 0px;">
        <ul>    <?php echo MenuLateralCaren()?> </ul>
    </div>
</div>
