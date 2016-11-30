<html>
<head>
    <title>Nmap interface</title>
</head>
<body>
    <?= form_open('do') ?>
        <input type="text" name="ip" required>
        <select name="command">
            <?php foreach($nmapCommands as $commandCode => $command): ?>
                <option value="<?= $commandCode; ?>">
                <?= $command['tag'];  ?>
                </option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Escanear">
    <?= form_close(); ?>
</body>
</html>