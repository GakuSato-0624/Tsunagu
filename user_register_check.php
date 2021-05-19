<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <title>つなぐ</title>
</head>
<body>
    <?php
        require_once('./common/common.php');
        #POST
        $post = sanitize($_POST);
        $name = $post['name'];
        $nickname = $post['nickname'];
        $email = $post['email'];
        $password = $post['password'];
        $password_confirmation = $post['password_confirmation'];
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
    ?>
    <header>

    </header>
    <main>
        <?php
        if ($name = '') {
            $flag = FALSE;
            print '<p>氏名が入力されていません。</p>';
        } else {
            print '氏名：'.$name;
        }

        if ($nickname = '') {
            $flag = FALSE;
            print '<p>ニックネームが入力されていません。</p>';
        } else {
            print 'ニックネーム：'.$nickname;
        }


        ?>
    </main>
    <footer>
        <p class="copyright">(c)ヒューマンウェア研究所</p>
    </footer>
</body>
</html>