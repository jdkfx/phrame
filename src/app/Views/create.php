<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
</head>
<body>
<header>
    <h1>New Post</h1>
</header>
<main>
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
</main>
</body>
</html>