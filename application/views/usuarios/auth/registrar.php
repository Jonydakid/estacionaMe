<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
      	<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Registrar</h1>
			</div>
			<?= form_open() ?>
			<div id="my-signin2"></div>
				<div class="form-group">
					<label for="nomUsuario">Nombre Usuario</label>
					<input type="text" class="form-control" id="nomUsuario" name="nomUsuario" placeholder="<?php echo $this->session->user["nombre"];?>">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $this->session->user["email"];?>">
				</div>
				<div class="form-group">
				<label for="rol">Rol Usuario</label>
				<select name="rol">
				  <option value="1">Administrador</option>
				  <option value="2">Arrendador</option>
				  <option value="3">Arrendatario</option>
				</select>  
				</div>
				<div class="form-group">
					<label for="contraseña">Contraseña</label>
					<input type="password" class="form-control" id="contraseña" name="contraseña">
				</div>

				<div class="form-group">
					<label for="confirmarPass">Confirm password</label>
					<input type="password" class="form-control" id="confirmarPass" name="confirmarPass">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Registrar">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->
      </div>
    </div>
  </header>
