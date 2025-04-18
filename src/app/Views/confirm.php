<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認</title>
</head>
<body>
<header>
    <h1>確認</h1>
</header>
<main>
    <form action="../store" method="post">
        <h3><?= htmlspecialchars($response->title, ENT_QUOTES, 'UTF-8'); ?></h3>
        <p><?= htmlspecialchars($response->messages, ENT_QUOTES, 'UTF-8'); ?></p>
        <input type="hidden" name="title" value="<?= htmlspecialchars($response->title, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="messages" value="<?= htmlspecialchars($response->messages, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="token" value="<?= htmlspecialchars($csrf->token(), ENT_QUOTES, 'UTF-8'); ?>">
        <p><input name="submit" type="submit" value="投稿"></p>
    </form>
</main>
</body>
</html>