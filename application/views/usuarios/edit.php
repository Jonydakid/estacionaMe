<h2>Editar </h2>

<form method="POST" action="<?php echo site_url('usuarios/update')?>/<?php echo $row->id ?>">

    <label for="nomUsuario">Nombre Usuario</label>
    <input type="input" name="nomUsuario" value="<?php echo $row->nomUsuario?>"/><br />

    <label for="text">Contraseña</label>
    <input type="password" name="contraseña"/>

    <input type="submit" name="submit" value="Actualizar Usuario" />
</form>