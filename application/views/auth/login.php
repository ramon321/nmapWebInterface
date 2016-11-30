<div id="background">
	<div></div>
	<img src="<?= asset('images/fondo.jpg'); ?>">
</div>
<div class="row vertical-center">
	<h1 class="center">BIENVENIDO</h1>
	<?= form_open('auth/login',['class'=>'col s10 offset-s1 m4 offset-m4 center']); ?>
		<div class="input-field col s12">
			<input
				type		= "text"
				name		= "username"
				id			= "usuario"
				autofocus
				required
			/>
			<label for="usuario">Usuario</label>
		</div>
		<div class="input-field col s12">
			<input
				type		= "password"
				name		= "password"
				id			= "clave"
				required
			/>
			<label for="clave">Clave</label>
		</div>
			<p class="center col s12"><?= get_flash_error(); ?></p>
		<input type="submit" value="Ingresar" class="btn" />
	<?= form_close(); ?>
</div>