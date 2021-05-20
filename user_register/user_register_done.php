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
        <h1>つなぐ</h1>
    </header>
    <main>
        <?php
        try {
            require_once('../common/common.php');
            # サニタイジング
            $post = sanitize($_POST);
            # POST
            $name = $post['name'];
            $nickname = $post['nickname'];
            $email = $post['email'];
            $user_password = $post['password'];
            $tel = $post['tel'];
            $sex = $post['sex'];
            $age = $post['age'];
            $academic_history = $post['academic_history'];
            $prefecture = $post['prefecture'];
            $city = $post['city'];
            $hope_prefecture = $post['hope_prefecture'];
            $skill = $post['skill'];
            $certification = $post['certification'];
    
            #flag
            $flag = TRUE;
    
            $dsn = 'mysql:dbname=tsunagu;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = 'INSERT INTO users (name, nickname, email, password, tel, sex, age, academic_history, prefecture,
                    city, hope_prefecture, skill, certification) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
            $stmt = $dbh -> prepare($sql);
            $data[] = $name;
            $data[] = $nickname;
            $data[] = $email;
            $data[] = $user_password;
            $data[] = $tel;
            $data[] = $sex;
            $data[] = $age;
            $data[] = $academic_history;
            $data[] = $prefecture;
            $data[] = $city;
            $data[] = $hope_prefecture;
            $data[] = $skill;
            $data[] = $certification;
            $stmt -> execute($data);
    
            $dbh = null;
    
            print '<p>登録完了しました。</p>';
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