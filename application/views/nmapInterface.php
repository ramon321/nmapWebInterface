<html>
<head>
    <meta charset="utf-8">
    <title>Nmap interface</title>
    <link rel="stylesheet" href="<?= asset('css/style.css'); ?>">
</head>
<body>
    <a href="<?= site_url('logout'); ?>">Salir</a>
    <?= form_open('do') ?>
        <b>Ip:</b> <input type="text" name="ip" placeholder="Direccion ip" value="192.168." required>
        <b>Mascara:</b> <input type="text" name="netMask" placeholder="Mascara" value="255.255.255.0" required>
        <select name="command">
            <?php foreach($nmapCommands as $commandCode => $command): ?>
                <option value="<?= $commandCode; ?>">
                <?= $command['tag'];  ?>
                </option>
            <?php endforeach ?>
        </select>
        <?= get_flash_error(); ?>
        <input type="submit" value="Escanear">
    <?= form_close(); ?>

    <script type="text/javascript" src="<?= asset('js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?= asset('js/fieldsUpdates.js'); ?>"></script>
</body>
</html>