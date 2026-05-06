<h1>体重一覧</h1>

<h2>新規登録</h2>

<form action="/logs" method="POST">
    @csrf

    <div>
        日付: <input type="date" name="date">
    </div>

    <div>
        体重: <input type="text" name="weight">
    </div>

    <div>
        カロリー: <input type="text" name="calories">
    </div>

    <div>
        運動時間: <input type="text" name="exercise_time">
    </div>

    <div>
        運動内容: <input type="text" name="exercise_content">
    </div>

    <button type="submit">登録</button>
</form>

<table border="1">
    <tr>
        <th>日付</th>
        <th>体重</th>
        <th>カロリー</th>
        <th>運動時間</th>
    </tr>

    @foreach ($logs as $log)
        <tr>
            <td>{{ $log->date }}</td>
            <td>{{ $log->weight }}</td>
            <td>{{ $log->calories }}</td>
            <td>{{ $log->exercise_time }}</td>
        </tr>
    @endforeach
</table>

<a href="/home">戻る</a>