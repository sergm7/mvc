<div class="div1">
<h1>Creación de usuario</h1>
</div>
<div class="div2">
<form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <p>Nombre:<br />
    <input type="texto" name="nombre" value="<?php if(isset($this->datos)) echo $this->datos['nombre']; ?>" /></p>
    
    <p>Apellidos:<br />
    <input type="text" name="apellidos" value="<?php if(isset($this->datos)) echo $this->datos['apellidos']; ?>" /></p>
    
    <p>Usuario:<br />
    <input type="texto" name="usuario" value="<?php if(isset($this->datos)) echo $this->datos['usuario']; ?>" /></p>
    
    <p>Email:<br />
    <input type="texto" name="email" value="<?php if(isset($this->datos)) echo $this->datos['email']; ?>" /></p>
    
    <p>Contraseña:<br />
    <input type="texto" name="password" value="<?php if(isset($this->datos)) echo $this->datos['password']; ?>" /></p>
    
    
    <p><input type="submit" class="button" value="Guardar" /></p>
    
</form>
</div>
