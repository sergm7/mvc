


	<?php if(Session::get('autenticado')):
        
        if(isset($this->usuarios) && count($this->usuarios)) : ?>
    
            <table width="100%">
            
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                </tr>
                
                <?php for($i = 0; $i < count($this->usuarios); $i++): ?>
                
                <tr>
                    <td><?php echo $this->usuarios[$i]['nombre']; ?></td>
                    <td><?php echo $this->usuarios[$i]['apellidos']; ?></td>
                    <td><?php echo $this->usuarios[$i]['usuario']; ?></td>
                    <td><?php echo $this->usuarios[$i]['email']; ?></td>
                    <td><?php echo $this->usuarios[$i]['password']; ?></td>
                    
                </tr>
                
                <?php endfor;?>
            </table>
    
    	<?php endif;?> 
        
        <?php else: ?>
        
        <div class="registrate"><h1>Registrate para ver los usuarios</h1></div>
    	<div class="mapa"><p align="center">Si deseas contactar con nosotros consulta el mapa: </p>
        	<div id="googleMap"></div>
        </div>
       
    <?php endif; ?>
	
	