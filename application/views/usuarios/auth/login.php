<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
 <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
      	<div class="container">
	<div class="row">
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
				<h1>Login</h1>
			</div>
				
				  
			<?= form_open() ?>
				<div class="form-group">
					<label for="nomUsuario">Usuario</label>
					<input type="text" class="form-control" id="nomUsuario" name="nomUsuario">
				</div>
				<div class="form-group">
					<label for="contraseña">Contraseña</label>
					<input type="password" class="form-control" id="contraseña" name="contraseña">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="Login">
				</div>
			</form>
					<a class="btn btn-info" href="<?php echo site_url('registrar'); ?>">Registrar</a>
		</div>
	</div><!-- .row -->
</div><!-- .container -->
      </div>
    </div>
  </header>
