<h1>Registro</h1>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <p>
        <label>Nombre: </label>
        <input type="text" name="nombre" value="<?php if(isset($this->datos)) echo $this->datos['nombre']; ?>" />
    </p>
    
    <p>
        <label>Apellidos: </label>
        <input type="text" name="apellido" value="<?php if(isset($this->datos)) echo $this->datos['apellidos']; ?>" />
    </p>
    
    <p>
        <label>Usuario: </label>
        <input type="text" name="usuario" value="<?php if(isset($this->datos)) echo $this->datos['usuario']; ?>" />
    </p>
    
    <p>
        <label>Email: </label>
        <input type="text" name="email" value="<?php if(isset($this->datos)) echo $this->datos['email']; ?>" />
    </p>
    
    <p>
        <label>Contraseña: </label>
        <input type="password" name="pass" />
    </p>
    
 
    <p>
        <input type="submit" value="enviar" />
    </p>
</form>