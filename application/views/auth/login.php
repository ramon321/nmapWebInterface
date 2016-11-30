<html>
<head>
	<title>Nmap</title>
    <link rel="stylesheet" href="<?= asset('css/style.css'); ?>">
</head>
<body>
	<div>
		<h1 class="center">BIENVENIDO</h1>
		<?= form_open('auth/login',['class'=>'col s10 offset-s1 m4 offset-m4 center']); ?>
			<div class="input-field col s12">
				<label for="usuario">Usuario</label>
				<input
					type		= "text"
					name		= "username"
					id			= "usuario"
					autofocus
					required
				/>
			</div>
			<div class="input-field col s12">
				<label for="clave">Clave</label>
				<input
					type		= "password"
					name		= "password"
					id			= "clave"
					required
				/>
			</div>
				<p class="center col s12"><?= get_flash_error(); ?></p>
			<input type="submit" value="Ingresar" class="btn" />
		<?= form_close(); ?>
	</div>

</body>
</html>