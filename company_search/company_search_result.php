<?php
if (isset($_SESSION['company_login']) == FALSE) {
        print 'ログインされていません。';
        print '<a href="company_login.html">ログイン</a>';
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
    <?php
    require_once('../common/common.php');
    $post = sanitize($_POST);

    $prefecture = $post['prefecture'];
    $skill = $post['skill'];
    $certification = $post['certification'];

    $dsn = 'mysql:dbname=tsunagu;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT nickname, email, sex, age, academic_history FROM users WHERE hope_prefecture = ? AND skill = ? AND certification = ?;';
    $stmt = $dbh -> prepare($sql);
    $data[] = $prefecture;
    $data[] = $skill;
    $data[] = $certification;
    $stmt -> execute($data);

    $dbh = null;

    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    $nickname = $rec['nickname'];

    ?>
    <header>
        <h1 class="header-title">つなぐ</h1>
    </header>
    <main>

    </main>
    <footer>
        <p class="copyright">(c)ヒューマンウェア研究所</p>
    </footer>
</body>
</html>