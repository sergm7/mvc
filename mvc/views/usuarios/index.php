
	<?php if(Session::get('autenticado')):
    // Si esta logeado mostraremos los siguientes datos y printaremos los usuarios
	 	if(isset($this-> usuarios) && count($this-> usuarios)) : ?>
        <div class="div1">
<h1> Usuarios</h1>
</div>
    <div class="div2">
        <table width="100%">
        
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Contraseña</th>
            </tr>
            
            <?php for($i = 0; $i < count($this-> usuarios); $i++): ?>
            
            <tr>
                <td><?php echo $this-> usuarios[$i]['nombre']; ?></td>
                <td><?php echo $this-> usuarios[$i]['apellidos']; ?></td>
                <td><?php echo $this-> usuarios[$i]['usuario']; ?></td>
                <td><?php echo $this-> usuarios[$i]['email']; ?></td>
                <td><?php echo $this-> usuarios[$i]['password']; ?></td>
 
                <td>
                <a href="<?php echo BASE_URL.' usuarios/editar/'.$this-> usuarios[$i]['id_user'];?>">Editar</a>
                <a href="<?php echo BASE_URL.' usuarios/eliminar/'.$this-> usuarios[$i]['id_user'];?>">Eliminar</a>
                </td>                                
            </tr>
            
            <?php endfor;?>
        
        </table>
        </div>
        <?php else: ?>
        
        <p><strong>No se han encontrado registros</strong></p>
        
        <?php endif; ?>
        <div class="div3">
        <p align="center"><a href="<?php BASE_URL; ?> usuarios/nuevo">Añadir</a></p>
        </div>
     <?php else: ?>
     
     	<p>Esta pagina requiere registrarse</p><a href="<?php echo BASE_URL.' usuarios/registrar/'; ?>"> Registrar</a>
       
	 <?php endif; ?> 
  

  
 