<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('usuarios/create'); ?>

    <label for="nomUsuario">Nombre Usuario</label>
    <input type="input" name="nomUsuario" /><br />

    <label for="text">Contraseña</label>
    <input type="password" name="contraseña" />

    <input type="submit" name="submit" value="Crear Usuario" />

</form>