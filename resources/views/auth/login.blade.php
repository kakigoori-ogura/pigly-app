<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>

    <style>
    body {
        margin: 0;
        height: 100vh;
        font-family: sans-serif;
        background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        background: white;
        padding: 30px;
        border-radius: 15px;
        width: 300px;
        text-align: center;
    }

    h1 {
        color: #d291ff;
        margin-bottom: 10px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin: 8px 0;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 20px;
        background: linear-gradient(135deg, #a18cd1, #fbc2eb);
        color: white;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
    }

    .register-link {
        margin-top: 15px;
        font-size: 14px;
    }

    .register-link a {
        color: #4da6ff;
        text-decoration: none;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>

<div class="container">
    <h1>PiGLy</h1>
    <p>ログイン</p>

    <form method="POST" action="/login">
        @csrf

        <input type="email" name="email" placeholder="メールアドレス">
        <input type="password" name="password" placeholder="パスワード">

        <button type="submit">ログイン</button>
    </form>

    <p class="register-link">
        <a href="/register">アカウント作成はこちら</a>
    </p>
</div>

</body>
</html>