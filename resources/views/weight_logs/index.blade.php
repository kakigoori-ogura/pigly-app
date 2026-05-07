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
    border-radius: 15px
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
</style>

<div class="container">

    <h1>体重登録</h1>

    <form action="/logs" method="POST">
        @csrf

        <input type="date" name="date">
        <input type="text" name="weight" placeholder="体重">
        <input type="text" name="calories" placeholder="カロリー">
        <input type="text" name="exercise_time" placeholder="運動時間">
        <input type="text" name="exercise_content" placeholder="運動内容">

        <button type="submit">登録</button>
    </form>

</div>