<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>体重登録</title>
</head>
<body>
    <h1>体重登録</h1>

    <form method="POST" action="/logs">
        @csrf

        <label>体重</label>
        <input type="number" name="weight" step="0.1">

        <button type="submit">登録</button>
    </form>

    <a href="/home">戻る</a>
</body>
</html>