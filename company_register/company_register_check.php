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

    $company_name = $post['company_name'];
    $email = $post['email'];
    $password = $post['password'];
    $password_confirmation = $post['password_confirmation'];
    $tel = $post['tel'];
    $department = $post['department'];
    $name = $post['name'];

    $flag = TRUE;
    ?>
    <header>
        <h1 class="header-title">つなぐ</h1>
    </header>
    <main>
        <?php
        print '<p>企業名: '.$company_name.'</p>';
        print '<p>email: '.$email.'</p>';
        if ($password != $password_confirmation) {
            $flag = FALSE;
            print '<p style="color: red;">パスワードが一致していません。</p>';
        } elseif (preg_match('/\A[a-z\d]{8,32}+\z/', $password) == FALSE) {
            $flag = FALSE;
            print '<p style="color: red;">パスワードは8文字以上32文字以内の半角英数で設定してください。</p>';
        } else {
            print '<p>パスワード: セキュリティ上表示しません。</p>';
        }

        if (is_valid_phone_number($tel) == FALSE) {
            $flag = FALSE;
            print '<p style="color: red;">ハイフン付きで電話番号を入力してください。</p>';
        } else {
            print '<p>電話番号: '.$tel.'</p>';
        }

        print '<p>部署: '.$department.'</p>';
        print '<p>担当者様お名前: '.$name.'</p>';

        if ($flag == FALSE) {
            print '<p style="color: red;">修正してください。</p>';
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
        } else {
            $password = md5($password);
            print '<p>上記の情報で登録します。</p>';
            print '<form method="POST" action="company_register_done.php">';
            print '<input type="hidden" name="company_name" value="'.$company_name.'">';
            print '<input type="hidden" name="email" value="'.$email.'">';
            print '<input type="hidden" name="password" value="'.$password.'">';
            print '<input type="hidden" name="tel" value="'.$tel.'">';
            print '<input type="hidden" name="department" value="'.$department.'">';
            print '<input type="hidden" name="name" value="'.$name.'">';
            print '<input type="button" onclick="history.back()" value="戻る"><br>';
            print '<input type="submit" value="送信">';
            print '</form>';
        }
        ?>
    </main>
    <footer>
        <p class="copyright">(c)ヒューマンウェア研究所</p>
    </footer>
</body>
</html>