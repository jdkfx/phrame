<!DOCTYPE html>
<html>
  <head>
    <title>Confirm</title>
  </head>
  <body>
    <h1>Confirm</h1>
    <h3><?= htmlspecialchars($blog->title, ENT_QUOTES, 'UTF-8'); ?></h3>
    <p><?= htmlspecialchars($blog->messages, ENT_QUOTES, 'UTF-8'); ?></p>
  </body>
</html>