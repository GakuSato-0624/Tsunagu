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
        <?php
        try {
            require_once('../common/common.php');

            $post = sanitize($_POST);
    
            $company_name = $post['company_name'];
            $email = $post['email'];
            $company_password = $post['password'];
            $tel = $post['tel'];
            $department = $post['department'];
            $name = $post['name'];
    
            $dsn = 'mysql:dbname=tsunagu;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = 'INSERT INTO companies (company_name, email, password, tel, department, staff_name) VALUES (?, ?, ?, ?, ?, ?);';
            $stmt = $dbh -> prepare($sql);
            $data[] = $company_name;
            $data[] = $email;
            $data[] = $company_password;
            $data[] = $tel;
            $data[] = $department;
            $data[] = $name;
            $stmt -> execute($data);
    
            $dbh = null;
    
            print '<p>登録完了しました。</p>';
            print '<a href="../company_login/company_login.html">ログイン</a>';


        } catch (Exception $e) {
            print 'ただいま障害が発生しております。申し訳ございません。';
            exit();
        }
        ?>
    </main>
    <footer>
        <p class="copyright">(c)ヒューマンウェア研究所</p>
    </footer>
</body>
</html>