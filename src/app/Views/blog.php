<!DOCTYPE html>
<html>
  <head>
    <title>Blog</title>
  </head>
  <body>
    <h1>Blog</h1>
    <a href="./blog/create">New</a>
    
    <?php foreach ($response as $key => $val) : ?>

    <h3><?= htmlspecialchars($val["title"], ENT_QUOTES, 'UTF-8'); ?></h3>
    <p><?= htmlspecialchars($val["messages"], ENT_QUOTES, 'UTF-8'); ?></p>

    <?php endforeach; ?>
  </body>
</html>