<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>初期体重登録</title>

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
        margin-bottom: 5px;
    }

    p {
        font-size: 12px;
        color: gray;
        margin-bottom: 20px;
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
    </style>
</head>

<body>

<div class="container">
    <h1>PiGLy</h1>
    <h2>新規会員登録</h2>
    <p>STEP2 体重データの入力</p>

    <form action="/weight/initial" method="POST">
        @csrf
        <input type="number" name="weight" placeholder="現在の体重" step="0.1">
        <input type="number" name="target_weight" placeholder="目標の体重" step="0.1">

        <button type="submit">アカウント作成</button>
    </form>
</div>

</body>
</html>