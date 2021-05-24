<?php
if (isset($_SESSION['company_login']) == FALSE) {
        print 'ログインされていません。';
        print '<a href="../company_login/company_login.html">ログイン</a>';
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <title>つなぐ</title>
</head>
<body>
    <header>
        <h1 class="header-title">つなぐ</h1>
    </header>
    <main>
        <h2>求職者検索</h2>
        <form method="POST" action="company_search_check.php">
            <div class="form-item">
                <label for="pref" class="label">希望都道府県</label>
                <select name="prefecture" id="pref" required>
                    <option value=""></option>
                    <option value="1">北海道</option>
                    <option value="2">青森県</option>
                    <option value="3">岩手県</option>
                    <option value="4">宮城県</option>
                    <option value="5">秋田県</option>
                    <option value="6">山形県</option>
                    <option value="7">福島県</option>
                    <option value="8">茨城県</option>
                    <option value="9">栃木県</option>
                    <option value="10">群馬県</option>
                    <option value="11">埼玉県</option>
                    <option value="12">千葉県</option>
                    <option value="13">東京都</option>
                    <option value="14">神奈川県</option>
                    <option value="15">新潟県</option>
                    <option value="16">富山県</option>
                    <option value="17">石川県</option>
                    <option value="18">福井県</option>
                    <option value="19">山梨県</option>
                    <option value="20">長野県</option>
                    <option value="21">岐阜県</option>
                    <option value="22">静岡県</option>
                    <option value="23">愛知県</option>
                    <option value="24">三重県</option>
                    <option value="25">滋賀県</option>
                    <option value="26">京都府</option>
                    <option value="27">大阪府</option>
                    <option value="28">兵庫県</option>
                    <option value="29">奈良県</option>
                    <option value="30">和歌山県</option>
                    <option value="31">鳥取県</option>
                    <option value="32">島根県</option>
                    <option value="33">岡山県</option>
                    <option value="34">広島県</option>
                    <option value="35">山口県</option>
                    <option value="36">徳島県</option>
                    <option value="37">香川県</option>
                    <option value="38">愛知県</option>
                    <option value="39">高知県</option>
                    <option value="40">福岡県</option>
                    <option value="41">佐賀県</option>
                    <option value="42">長崎県</option>
                    <option value="43">熊本県</option>
                    <option value="44">大分県</option>
                    <option value="45">宮城県</option>
                    <option value="46">鹿児島県</option>
                    <option value="47">沖縄県</option>
                </select>
            </div>
            <div class="form-item">
                <label for="skill" class="label">学習した技術</label>
                <select name="skill" id="skill" required>
                    <option value=""></option>
                    <option value="1">Java</option>
                    <option value="2">Ruby</option>
                    <option value="3">PHP</option>
                    <option value="4">Python</option>
                </select>
            </div>
            <div class="form-item">
                <label for="certification" class="label">取得資格</label>
                <select name="certification" id="certification" required>
                    <option value=""></option>
                    <option value="1">基本情報技術者</option>
                    <option value="2">応用情報技術者</option>
                </select>
            </div>
            <div class="form-item no-label">
                <input type="submit" value="検索">
            </div>
        </form>
    </main>
    <footer>
        <p class="copyright">(c)ヒューマンウェア研究所</p>
    </footer>
</body>
</html>