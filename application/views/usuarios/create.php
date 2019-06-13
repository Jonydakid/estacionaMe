<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('usuarios/create'); ?>

    <label for="nomUsuario">Nombre Usuario</label>
    <input type="input" name="nomUsuario" /><br />
	
	<label for="rol">Rol Usuario</label>
	<select name="rol">
	  <option value="1">Administrador</option>
	  <option value="2">Arrendador</option>
	  <option value="3">Arrendatario</option>
	</select>  
   
   <label for="text">Contraseña</label>
    <input type="password" name="contraseña" />

    <input type="submit" name="submit" value="Crear Usuario" />

</form>