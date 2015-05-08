<h2>Editar cuenta</h2>

<form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <p>Nombre:<br />
    <input type="text" name="Nombree" value="<?php if(isset($this->datos)) echo $this->datos['nombre']; ?>" /></p>
    
    <p>Apellidos:<br />
    <input type="text" name="Apellidoss" value="<?php if(isset($this->datos)) echo $this->datos['apellidos']; ?>" /></p>
    
    <p>Usuario:<br />
    <input type="text" name="Usuarioo" value="<?php if(isset($this->datos)) echo $this->datos['usuario']; ?>" /></p>
    
    <p>Email:<br />
    <input type="text" name="Emaill" value="<?php if(isset($this->datos)) echo $this->datos['email']; ?>" /></p>
	
    <p>Contraseña:<br />
    <input type="text" name="Passwordd" value="<?php if(isset($this->datos)) echo $this->datos['password']; ?>" /></p>
    
  
    <p><input type="submit" class="button" value="Guardar" /></p>
</form>