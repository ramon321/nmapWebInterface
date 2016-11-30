<html>
<head>
    <meta charset="utf-8">
    <title>Nmap interface</title>
    <link rel="stylesheet" href="<?= asset('css/style.css'); ?>">
</head>
<body>
    <a href="<?= site_url('logout'); ?>">Salir</a>
    <a href="<?= site_url('home'); ?>">Atras</a>
    <h1><?= $output['lastLine']; ?></h1>
    <?php foreach($output['output'] as $output): ?>
        <p
            class="
                <?php if(strpos($output, 'open') !== false): ?>open<?php endif ?>
                <?php if(strpos($output, 'closed') !== false): ?>closed<?php endif ?>"
        ><?= $output; ?></p>
    <?php endforeach ?>


    <script type="text/javascript" src="<?= asset('js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?= asset('js/fieldsUpdates.js'); ?>"></script>
</body>
</html>