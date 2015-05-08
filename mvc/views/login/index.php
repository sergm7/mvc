<h1>Login</h1>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <p>
        <label>Usuario: </label>
        <input type="text" name="usuario" value="<?php if(isset($this->datos)) echo $this->datos['usuario']; ?>" />
    </p>
    
    <p>
        <label>Password: </label>
        <input type="password" name="pass" />
    </p>
    
    <p class="pbutton">
        <input type="submit" value="enviar" />
    </p>
</form>
