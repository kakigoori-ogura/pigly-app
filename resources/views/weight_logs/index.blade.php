<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>PiGLy</title>

<style>
body {
    font-family: sans-serif;
    background: #f3f4f6;
    margin: 0;
}

/* ヘッダー */
.header {
    background: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header h2 {
    color: #f472b6;
    margin: 0;
}

.header a {
    text-decoration: none;
    color: #333;
}

/* コンテンツ */
.container {
    max-width: 900px;
    margin: 30px auto;
}

/* カード */
.card {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

/* タイトル行 */
.card-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.add-btn {
    background: linear-gradient(45deg, #f472b6, #fb7185);
    color: white;
    padding: 8px 15px;
    border-radius: 8px;
    text-decoration: none;
}

/* テーブル */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th {
    text-align: left;
    color: #999;
    font-size: 14px;
    padding-bottom: 10px;
}

.table td {
    padding: 12px 0;
    border-top: 1px solid #eee;
}


.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);

    display: none;

    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 30px;
    border-radius: 15px;
    width: 300px;
}
</style>
</head>

<body>
<div id="modal" class="modal">
    <div class="modal-content">
        <h2>データ追加</h2>

        <form method="POST" action="/logs">
            @csrf

            <input type="date" name="date">
            <input type="number" name="weight" step="0.1" placeholder="体重">
            <input type="text" name="calories" placeholder="カロリー">

            <button type="submit">登録</button>
        </form>

        <button onclick="closeModal()">閉じる</button>
    </div>
</div>
<div class="header">
    <h2>PiGLy</h2>
    <a href="/goal/edit">目標体重設定</a>
    <a href="#">ログアウト</a>
</div>

<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>体重データ一覧</h3>
<a href="#" onclick="openModal()" class="add-btn">＋ データ追加</a>        </div>

        <table class="table">
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>カロリー</th>
            </tr>

            @forelse ($logs as $log)
            <tr>
                <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                <td>{{ $log->weight }}kg</td>
                <td>{{ $log->calories ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">データがありません</td>
            </tr>
            @endforelse

        </table>

    </div>
</div>
<script>
function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}
</script>
</body>
</html>