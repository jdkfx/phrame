<!DOCTYPE html>
<html>
  <head>
    <title>Confirm</title>
  </head>
  <body>
    <h1>Confirm</h1>
    <form action="../store" method="post">
      <h3><?= htmlspecialchars($response->title, ENT_QUOTES, 'UTF-8'); ?></h3>
      <p><?= htmlspecialchars($response->messages, ENT_QUOTES, 'UTF-8'); ?></p>
      <input type="hidden" name="title" value=<?= $response->title; ?>>
      <input type="hidden" name="messages" value=<?= $response->messages; ?>>
      <input type="hidden" name="token" value="<?= $csrf->token() ?>">
      <p><input name="submit" type="submit" value="Post"></p>
    </form>
  </body>
</html>