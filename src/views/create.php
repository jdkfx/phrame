<!DOCTYPE html>
<html>
  <head>
    <title>New post</title>
  </head>
  <body>
    <h1>New post</h1>
    <form action="./index.php" method="post">
        <ul>
            <li>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title">
            </li>
            <li>
                <label for="message">Message:</label>
                <textarea name="message" id="message" cols="30" rows="10"></textarea>
            </li>
            <li>
                <button type="submit">Submit</button>
            </li>
        </ul>
    </form>
  </body>
</html>