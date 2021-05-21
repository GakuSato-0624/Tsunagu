<?php
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

$sql = 'SELECT company_name, staff_name FROM companies WHERE email = ? AND password = ?;';
$stmt = $dbh -> prepare($sql);
$data[] = $email;
$data[] = $user_password;
$stmt -> execute($data);

$dbh = null;

$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
$company_name = $rec['company_name'];
$staff_name = $rec['staff_name'];

if ($rec == FALSE) {
    print '<メールアドレスかパスワードが間違っています。>';
    print '<a href="company_login.html">戻る</a>';
} else {
    session_start();
    $_SESSION['company_login'] = 1;
    $_SESSION['company_name'] = $company_name;
    $_SESSION['staff_name'] = $staff_name;
    header('Location: company_login_top.php');
    exit();
}
?>