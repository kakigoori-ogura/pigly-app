<div class="wrapper">
    <div class="card">
        <h3>目標体重設定</h3>

        <form method="POST" action="/goal/update">
            @csrf

            <input 
                type="number" 
                name="target_weight" 
                step="0.1"
                value="{{ old('target_weight') }}"
                placeholder="目標体重"
            >

            @error('target_weight')
                <p style="color:red;">{{ $message }}</p>
            @enderror

            <div class="btn-area">
                <button type="button" class="btn-back" onclick="location.href='/logs'">
                    戻る
                </button>

                <button type="submit" class="btn-submit">
                    更新
                </button>
            </div>
        </form>

    </div>
</div>