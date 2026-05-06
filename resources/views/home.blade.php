<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ホーム</title>
</head>
<body>
    <h1>ホーム画面</h1>

    <p>ログイン成功！</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
    <a href="/logs/create">体重登録</a>
</body>
</html>