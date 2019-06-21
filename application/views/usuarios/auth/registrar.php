<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
				<div class="form-group">
					<label for="nomUsuario">Nombre Usuario</label>
					<input type="text" class="form-control" id="nomUsuario" name="nomUsuario">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="rol">Rol</label>
					<input type="text" class="form-control" id="rol" name="rol">
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