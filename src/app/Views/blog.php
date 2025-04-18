<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
<header>
    <h1>Blog</h1>
</header>
<main>
    <nav>
        <a href="./">トップへ</a>
        <a href="./blog/create">New</a>
    </nav>
    <section>
        <?php foreach ($response as $key => $val) : ?>
            <article>
                <h3><?= htmlspecialchars($val["title"], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?= htmlspecialchars($val["messages"], ENT_QUOTES, 'UTF-8'); ?></p>
            </article>
        <?php endforeach; ?>
    </section>
</main>
</body>
</html>