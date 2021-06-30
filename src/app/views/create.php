<!DOCTYPE html>
<html>
  <head>
    <title>New post</title>
  </head>
  <body>
    <h1>New post</h1>
    <form action="./create/confirm" method="post">
        <ul>
            <li>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title">
            </li>
            <li>
                <label for="messages">Message:</label>
                <textarea name="messages" id="messages" cols="30" rows="10"></textarea>
            </li>
            <li>
                <button type="submit">Confirm</button>
            </li>
        </ul>
    </form>
  </body>
</html>