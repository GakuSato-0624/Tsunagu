<?php
    session_start();
    session_regenerate_id(TRUE);
    if (isset($_SESSION['user_login']) == FALSE) {
        print 'ログインされていません。';
        print '<a href="user_login.html">ログイン</a>';
        exit();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <title>つなぐ</title>
</head>
<body>
    <header>
        <?php
        if (isset($_SESSION['user_login']) == TRUE) {
            print '<p>'.$_SESSION['user_name'].'さんログイン中</p>';
        }
        ?>
        <h1>つなぐ</h1>
    </header>
    <main>
        <p>ログイン完了</p>
        <a href="user_logout.php">ログアウト</a>
    </main>
    <footer>
        <p class="copyright">(c)ヒューマンウェア研究所</p>
    </footer>
</body>
</html>