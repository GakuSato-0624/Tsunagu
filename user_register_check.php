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
    <?php
        require_once('./common/common.php');
        # サニタイジング
        $post = sanitize($_POST);
        # POST
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

        print '<p>お名前: '.$name.'</p>';
        print '<p>ニックネーム: '.$nickname.'</p>';
        print '<p>email: '.$email.'</p>';

        if ($password != $password_confirmation) {
            $flag = FALSE;
            print '<p style="color: red;">パスワードが一致していません。</p>';
        } elseif (preg_match('/\A[a-z\d]{8,32}+\z/', $password) == false) {
            $flag = FALSE;
            print '<p style="color: red;">パスワードは8文字以上32文字以内の半角英数で設定してください。</p>';
        } else {
            print '<p>パスワード: セキュリティ上表示しません。</p>';
        }

        if (is_valid_phone_number($tel) == false) {
            print '<p style="color: red;">ハイフン付きで電話番号を入力してください。</p>';
        } else {
            print '<p>電話番号: '.$tel.'</p>';
        }

        switch ($sex) {
            case 1:
                print '<p>性別: 男性</p>';
                break;
            case 2: 
                print '<p>性別: 女性</p>';
                break;
            case 9: 
                print '<p>性別: その他</p>';
                break;
            case 0: 
                print '<p>性別: 選択しない</p>';
                break;
        }

        print '<p>年齢:'.$age.'</p>';

        switch ($academic_history) {
            case 1: 
                print '<p>最終学歴: 大学卒業</p>';
                break;
            case 2: 
                print '<p>最終学歴: 大学中退</p>';
                break;
            case 3: 
                print '<p>最終学歴: 大学院卒業</p>';
                break;
            case 4: 
                print '<p>最終学歴: 大学院中退</p>';
                break;
            case 5: 
                print '<p>最終学歴: 専門学校卒業</p>';
                break;
            case 6: 
                print '<p>最終学歴: 高専卒業</p>';
                break;
            case 7: 
                print '<p>最終学歴: 高専中退</p>';
                break;
            case 8: 
                print '<p>最終学歴: 高等学校卒業</p>';
                break;
            case 9: 
                print '<p>最終学歴: 高等学校中退</p>';
                break;
            case 10: 
                print '<p>最終学歴: 中学校卒業</p>';
                break;
        }

        switch ($prefecture) {
            case 1: 
                print '<p>お住まい: 北海道'.$city.'</p>';
                break;
            case 2: 
                print '<p>お住まい: 青森県'.$city.'</p>';
                break;
            case 3: 
                print '<p>お住まい: 岩手県'.$city.'</p>';
                break;
            case 4: 
                print '<p>お住まい: 宮城県'.$city.'</p>';
                break;
            case 5: 
                print '<p>お住まい: 秋田県'.$city.'</p>';
                break;
            case 6: 
                print '<p>お住まい: 山形県'.$city.'</p>';
                break;
            case 7: 
                print '<p>お住まい: 福島県'.$city.'</p>';
                break;
            case 8: 
                print '<p>お住まい: 茨城県'.$city.'</p>';
                break;
            case 9: 
                print '<p>お住まい: 栃木県'.$city.'</p>';
                break;
            case 10: 
                print '<p>お住まい: 群馬県'.$city.'</p>';
                break;
            case 11: 
                print '<p>お住まい: 埼玉県'.$city.'</p>';
                break;
            case 12: 
                print '<p>お住まい: 千葉県'.$city.'</p>';
                break;
            case 13: 
                print '<p>お住まい: 東京都'.$city.'</p>';
                break;
            case 14: 
                print '<p>お住まい: 神奈川県'.$city.'</p>';
                break;
            case 15: 
                print '<p>お住まい: 新潟県'.$city.'</p>';
                break;
            case 16: 
                print '<p>お住まい: 富山県'.$city.'</p>';
                break;
            case 17: 
                print '<p>お住まい: 石川県'.$city.'</p>';
                break;
            case 18: 
                print '<p>お住まい: 福井県'.$city.'</p>';
                break;
            case 19: 
                print '<p>お住まい: 山梨県'.$city.'</p>';
                break;
            case 20: 
                print '<p>お住まい: 長野県'.$city.'</p>';
                break;
            case 21: 
                print '<p>お住まい: 岐阜県'.$city.'</p>';
                break;
            case 22: 
                print '<p>お住まい: 静岡県'.$city.'</p>';
                break;
            case 23: 
                print '<p>お住まい: 愛知県'.$city.'</p>';
                break;
            case 24: 
                print '<p>お住まい: 三重県'.$city.'</p>';
                break;
            case 25: 
                print '<p>お住まい: 滋賀県'.$city.'</p>';
                break;
            case 26: 
                print '<p>お住まい: 京都府'.$city.'</p>';
                break;
            case 27: 
                print '<p>お住まい: 大阪府'.$city.'</p>';
                break;
            case 28: 
                print '<p>お住まい: 兵庫県'.$city.'</p>';
                break;
            case 29: 
                print '<p>お住まい: 奈良県'.$city.'</p>';
                break;
            case 30: 
                print '<p>お住まい: 和歌山県'.$city.'</p>';
                break;
            case 31: 
                print '<p>お住まい: 鳥取県'.$city.'</p>';
                break;
            case 32: 
                print '<p>お住まい: 島根県'.$city.'</p>';
                break;
            case 33: 
                print '<p>お住まい: 岡山県'.$city.'</p>';
                break;
            case 34: 
                print '<p>お住まい: 広島県'.$city.'</p>';
                break;
            case 35: 
                print '<p>お住まい: 山口県'.$city.'</p>';
                break;
            case 36: 
                print '<p>お住まい: 徳島県'.$city.'</p>';
                break;
            case 37: 
                print '<p>お住まい: 香川県'.$city.'</p>';
                break;
            case 38: 
                print '<p>お住まい: 愛知県'.$city.'</p>';
                break;
            case 39: 
                print '<p>お住まい: 高知県'.$city.'</p>';
                break;
            case 40: 
                print '<p>お住まい: 福岡県'.$city.'</p>';
                break;
            case 41: 
                print '<p>お住まい: 佐賀県'.$city.'</p>';
                break;
            case 42: 
                print '<p>お住まい: 長崎県'.$city.'</p>';
                break;
            case 43: 
                print '<p>お住まい: 熊本県'.$city.'</p>';
                break;
            case 44: 
                print '<p>お住まい: 大分県'.$city.'</p>';
                break;
            case 45: 
                print '<p>お住まい: 宮城県'.$city.'</p>';
                break;
            case 46: 
                print '<p>お住まい: 鹿児島県'.$city.'</p>';
                break;
            case 47: 
                print '<p>お住まい: 沖縄県'.$city.'</p>';
                break;
        }


        switch ($hope_prefecture) {
            case 1: 
                print '<p>ご希望の勤務先: 北海道</p>';
                break;
            case 2: 
                print '<p>ご希望の勤務先: 青森県</p>';
                break;
            case 3: 
                print '<p>ご希望の勤務先: 岩手県</p>';
                break;
            case 4: 
                print '<p>ご希望の勤務先: 宮城県</p>';
                break;
            case 5: 
                print '<p>ご希望の勤務先: 秋田県</p>';
                break;
            case 6: 
                print '<p>ご希望の勤務先: 山形県</p>';
                break;
            case 7: 
                print '<p>ご希望の勤務先: 福島県</p>';
                break;
            case 8: 
                print '<p>ご希望の勤務先: 茨城県</p>';
                break;
            case 9: 
                print '<p>ご希望の勤務先: 栃木県</p>';
                break;
            case 10: 
                print '<p>ご希望の勤務先: 群馬県</p>';
                break;
            case 11: 
                print '<p>ご希望の勤務先: 埼玉県</p>';
                break;
            case 12: 
                print '<p>ご希望の勤務先: 千葉県</p>';
                break;
            case 13: 
                print '<p>ご希望の勤務先: 東京都</p>';
                break;
            case 14: 
                print '<p>ご希望の勤務先: 神奈川県</p>';
                break;
            case 15: 
                print '<p>ご希望の勤務先: 新潟県</p>';
                break;
            case 16: 
                print '<p>ご希望の勤務先: 富山県</p>';
                break;
            case 17: 
                print '<p>ご希望の勤務先: 石川県</p>';
                break;
            case 18: 
                print '<p>ご希望の勤務先: 福井県</p>';
                break;
            case 19: 
                print '<p>ご希望の勤務先: 山梨県</p>';
                break;
            case 20: 
                print '<p>ご希望の勤務先: 長野県</p>';
                break;
            case 21: 
                print '<p>ご希望の勤務先: 岐阜県</p>';
                break;
            case 22: 
                print '<p>ご希望の勤務先: 静岡県</p>';
                break;
            case 23: 
                print '<p>ご希望の勤務先: 愛知県</p>';
                break;
            case 24: 
                print '<p>ご希望の勤務先: 三重県</p>';
                break;
            case 25: 
                print '<p>ご希望の勤務先: 滋賀県</p>';
                break;
            case 26: 
                print '<p>ご希望の勤務先: 京都府</p>';
                break;
            case 27: 
                print '<p>ご希望の勤務先: 大阪府</p>';
                break;
            case 28: 
                print '<p>ご希望の勤務先: 兵庫県</p>';
                break;
            case 29: 
                print '<p>ご希望の勤務先: 奈良県</p>';
                break;
            case 30: 
                print '<p>ご希望の勤務先: 和歌山県</p>';
                break;
            case 31: 
                print '<p>ご希望の勤務先: 鳥取県</p>';
                break;
            case 32: 
                print '<p>ご希望の勤務先: 島根県</p>';
                break;
            case 33: 
                print '<p>ご希望の勤務先: 岡山県</p>';
                break;
            case 34: 
                print '<p>ご希望の勤務先: 広島県</p>';
                break;
            case 35: 
                print '<p>ご希望の勤務先: 山口県</p>';
                break;
            case 36: 
                print '<p>ご希望の勤務先: 徳島県</p>';
                break;
            case 37: 
                print '<p>ご希望の勤務先: 香川県</p>';
                break;
            case 38: 
                print '<p>ご希望の勤務先: 愛知県</p>';
                break;
            case 39: 
                print '<p>ご希望の勤務先: 高知県</p>';
                break;
            case 40: 
                print '<p>ご希望の勤務先: 福岡県</p>';
                break;
            case 41: 
                print '<p>ご希望の勤務先: 佐賀県</p>';
                break;
            case 42: 
                print '<p>ご希望の勤務先: 長崎県</p>';
                break;
            case 43: 
                print '<p>ご希望の勤務先: 熊本県</p>';
                break;
            case 44: 
                print '<p>ご希望の勤務先: 大分県</p>';
                break;
            case 45: 
                print '<p>ご希望の勤務先: 宮城県</p>';
                break;
            case 46: 
                print '<p>ご希望の勤務先: 鹿児島県</p>';
                break;
            case 47: 
                print '<p>ご希望の勤務先: 沖縄県</p>';
                break;
        }

        switch ($skill) {
            case 1: 
                print '<p>学習している言語: Java</p>';
                break;
            case 2: 
                print '<p>学習している言語: Ruby</p>';
                break;
            case 3: 
                print '<p>学習している言語: PHP</p>';
                break;
            case 4: 
                print '<p>学習している言語: Python</p>';
                break;
        }

        switch ($certification) {
            case 0: 
                print '<p>取得資格: なし</p>';
                break;
            case 1: 
                print '<p>取得資格: 基本情報技術者</p>';
                break;
            case 2: 
                print '<p>取得資格: 応用情報技術者</p>';
                break;
        }

        if ($flag == FALSE) {
            print '<p style="color: red;">修正してください。</p>';
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
        } else {
            print '上記の情報で登録します。';
            print '<form method="POST" action="user_register_done.php">';
            print '<input type="hidden" name="name" value="'.$name.'">';
            print '<input type="hidden" name="nickname" value="'.$nickname.'">';
            print '<input type="hidden" name="email" value="'.$email.'">';
            print '<input type="hidden" name="password" value="'.$password.'">';
            print '<input type="hidden" name="tel" value="'.$tel.'">';
            print '<input type="hidden" name="sex" value="'.$sex.'">';
            print '<input type="hidden" name="age" value="'.$age.'">';
            print '<input type="hidden" name="academic_history" value="'.$academic_history.'">';
            print '<input type="hidden" name="prefecture" value="'.$prefecture.'">';
            print '<input type="hidden" name="city" value="'.$city.'">';
            print '<input type="hidden" name="hope_prefecture" value="'.$hope_prefecture.'">';
            print '<input type="hidden" name="skill" value="'.$skill.'">';
            print '<input type="hidden" name="certification" value="'.$certification.'">';
            print '<input type="button" onclick="history.back()" value="戻る">';
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