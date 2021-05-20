<?php
    try {
        require_once('../common/common.php');
        $post = sanitize($_POST);
    
        $email = $post['email'];
        $user_password = $post['password'];
    
        $user_password = md5($user_password);
    
        $dsn = 'mysql:dbname=tsunagu;host=localhost;charset=utf8';
        $user = 'root';
        $password = '';
        $dbh = new PDO($dsn, $user, $password);
        $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT name FROM users WHERE email = ? AND password = ?;';
        $stmt = $dbh -> prepare($sql);
        $data[] = $email;
        $data[] = $user_password;
        $stmt -> execute($data);
    
        $dbh = null;
    
        $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        $user_name = $rec['name'];
    
        if ($rec == FALSE) {
            print '<メールアドレスかパスワードが間違っています。>';
            print '<a href="user_login.html">戻る</a>';
        } else {
            session_start();
            $_SESSION['user_login'] = 1;
            $_SESSION['user_name'] = $user_name;
            header('Location: user_login_top.php');
            exit();
        }
    } catch (Exception $e) {
        print 'ただいま障害が発生しております。申し訳ございません。';
        exit();
    }
    
?>