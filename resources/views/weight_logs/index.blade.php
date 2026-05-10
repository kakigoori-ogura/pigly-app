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

    
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 30px;
    border-radius: 15px;
    width: 300px;
}
.summary {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.summary-box {
    flex: 1;
    background: #fafafa;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
}

.summary-box p {
    color: #999;
    margin: 0;
}

.summary-box h2 {
    margin: 10px 0 0;
}
.search-bar {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.search-bar input,
.search-bar button {
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #ddd;
}
.edit-btn {
    text-decoration: none;
    font-size: 16px;
}
.add-btn {
    background: linear-gradient(135deg, #f472b6, #fb7185);
    color: white;
    padding: 12px 22px;
    border-radius: 12px;
    font-weight: bold;
    text-decoration: none;
    display: inline-block;
    transition: 0.2s;
}

.add-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
</style>
</head>

<body>
<script>
window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}
</script>
<div class="header">
    <h2>PiGLy</h2>
    <a href="/goal/edit">目標体重設定</a>
    <form method="POST" action="/logout" style="display:inline;">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</div>

<div class="container">

    <div class="summary">
        <div class="summary-box">
            <p>目標体重</p>
            <h2>{{ $target ?? '--' }} kg</h2>
        </div>

        <div class="summary-box">
            <p>目標まで</p>
            <h2>
                @if(isset($logs[0]) && $target)
                    {{ $logs[0]->weight - $target }} kg
                @else
                    --
                @endif
            </h2>
        </div>

        <div class="summary-box">
            <p>最新体重</p>
            <h2>{{ $logs[0]->weight ?? '--' }} kg</h2>
        </div>
    </div>

    <div class="card">

        <div class="search-bar">
            <input type="date">
            <span>〜</span>
            <input type="date">
            <button>検索</button>
        </div>

        <div class="card-header">
            <h3>体重データ一覧</h3>
            <a href="javascript:void(0);" onclick="openModal()" class="add-btn">＋ データ追加
</a>
        </div>

        <table class="table">
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>食事摂取カロリー</th>
                <th>運動時間</th>
                <th></th>
            </tr>

            @forelse ($logs as $log)
            <tr>
                <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                <td>{{ $log->weight }}kg</td>
                <td>{{ $log->calories ?? '-' }}</td>
                <td>{{ $log->exercise_time ?? '-' }}</td>
                <a href="/logs/{{ $log->id }}/edit" class="edit-btn">✏️</a>
            </tr>
            @empty
            <tr>
                <td colspan="3">データがありません</td>
            </tr>
            @endforelse
        </table>

    </div>
</div>

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
<script>
function openModal() {
    document.getElementById('modal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

window.onclick = function(event) {
    const modal = document.getElementById('modal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}
</script>
</body>