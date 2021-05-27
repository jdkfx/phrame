<!DOCTYPE html>
<html>
  <head>
    <title>Blog</title>
  </head>
  <body>
    <h1>Blog</h1>
    <h3><?= htmlspecialchars($response["title"], ENT_QUOTES, 'UTF-8'); ?></h3>
    <p><?= htmlspecialchars($response["messages"], ENT_QUOTES, 'UTF-8'); ?></p>
  </body>
</html>