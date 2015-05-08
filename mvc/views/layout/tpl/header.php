<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	
        <title><?php if(isset($this->titulo)) echo $this->titulo; ?></title> <!-- Muestra el titulo  -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <!-- Incluimos la ruta del css -->
       <link href="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css" />
       
       <!-- Añadimos la api y la funcion para que nos muestre el mapa de google -->
		  <script src="http://maps.googleapis.com/maps/api/js"></script>
                
                <script>
                    function initialize() {
                      var mapProp = {
                        center:new google.maps.LatLng(41.3012492,2.0011629),
                        zoom:5,
                        mapTypeId:google.maps.MapTypeId.ROADMAP
                      };
                      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                    }
                    google.maps.event.addDomListener(window, 'load', initialize);
                </script>
        
       
       <!-- Incluimos la ruta del jquery -->
    <script src="<?php echo BASE_URL; ?>public/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL; ?>public/js/jquery.validate.js" type="text/javascript"></script>
    
        <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])): ?>
        <?php for($i=0; $i < count($_layoutParams['js']); $i++): ?>
        
        <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript"></script>
        
      
        
        <?php endfor; ?>
        <?php endif; ?>
    
    </head>

    <body>
           
                <div id="header">
                    <div id="logo">FRAMEWORK</div>
                    
                    
                        <div id="top_menu">
                            <!-- generamos el menu creado en View -->
                            <?php if(isset($_layoutParams['menu'])): ?>
                            <?php for($i = 0; $i < count($_layoutParams['menu']); $i++): ?>
                         
							
                            <!-- -->
                            <div><a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></div>

                            <?php endfor; ?>
                            <?php endif; ?>
                            </div>
                        
                    
                </div>

                <div id="content">
                    
                    
                    <?php if(isset($this->_error)): ?>
                    <div id="error"><?php echo $this->_error; ?></div>
                    <?php endif; ?>

                     <?php if(isset($this->_mensaje)): ?>
                    <div id="mensaje"><?php echo $this->_mensaje; ?></div>
                    <?php endif; ?>