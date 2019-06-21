
<h2><?php echo $title; ?></h2>
<table>
	
			<tr>
				<th>ID</th>
				<th>Nombre Usuario</td>
				<th>Rol</td>
			</tr>
			<?php foreach ($usuarios as $usu): ?>
			<tr>
				
				<td><?php echo $usu->id; ?></td>
				<td><?php echo $usu->nomUsuario; ?></td>
				<td><?php echo $usu->rol; ?></td>
				<td>
					<a class="btn btn-info" role="button" aria-pressed="true" href="<?php echo site_url('usuarios/edit'); ?>/<?php echo $usu->id; ?>"> Editar</a></td>
					<td>
					<a class="btn btn-danger" role="button" aria-pressed="true" href="<?php echo site_url('usuarios/delete'); ?>/<?php echo $usu->id; ?>"> Eliminar</a></td>
						
	
			</tr>
			<?php endforeach ?>
	
</table>
<br>
