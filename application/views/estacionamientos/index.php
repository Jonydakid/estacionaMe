<h2><?php echo $title; ?></h2>
<table>
	
			<tr>
				<th>ID</th>
				<th>Direccion</td>
				<th>Metros Cuadrados</td>
			</tr>
			<?php foreach ($estacionamientos as $est): ?>
			<tr>
				
				<td><?php echo $est->id; ?></td>
				<td><?php echo $est->idDireccion; ?></td>
				<td><?php echo $est->metrosCuadrados; ?></td>
				<td>
					<a class="btn btn-info" role="button" aria-pressed="true" href="<?php echo site_url('estacionamientos/edit'); ?>/<?php echo $est->id; ?>"> Editar</a></td>
					<td>
					<a class="btn btn-danger" role="button" aria-pressed="true" href="<?php echo site_url('estacionamientos/delete'); ?>/<?php echo $est->id; ?>"> Eliminar</a></td>
						
	
			</tr>
			<?php endforeach ?>
	
</table>
<br>

<a class="btn btn-primary btn-lg active" role="button" aria-pressed="true" href="<?php echo site_url('estacionamientos/create'); ?>"> Crear</a>
