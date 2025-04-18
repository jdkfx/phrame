<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新しい記事を作成</title>
</head>
<body>
<header>
    <h1>新しい記事を作成</h1>
</header>
<main>
    <form action="./create/confirm" method="post">
        <ul>
            <li>
                <label for="title">タイトル:</label>
                <input type="text" id="title" name="title">
            </li>
            <li>
                <label for="messages">テキスト:</label>
                <textarea name="messages" id="messages" cols="30" rows="10"></textarea>
            </li>
            <li>
                <button type="submit">確認</button>
            </li>
        </ul>
    </form>
</main>
</body>
</html>