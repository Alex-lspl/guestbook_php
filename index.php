<?php
require_once('config.php');
$stmt = $pdo->query("SELECT * FROM messages ORDER BY created_at DESC");
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <form method="POST">
            <input type="text" name="name" placeholder="Ваше имя" required>
            <textarea name="message" rows="4" placeholder="Ваше сообщение" required></textarea>
            <button type="submit">Отправить</button>
        </form>

        <h3>Сообщения (<?= count($messages) ?>):</h3>
        <?php if (empty($messages)): ?>
        <p>Пока нет сообщений. Не пиши сюда!</p>
    <?php else: ?>
        <?php foreach ($messages as $msg): ?>
            <div class="message">
            <div class="name">👤 <?= htmlspecialchars($msg['name']) ?></div>
                <div><?= htmlspecialchars($msg['message']) ?></div>
                <div class="date">🕗 <?= $msg['created_at'] ?></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    
</div>
</body>
</html>