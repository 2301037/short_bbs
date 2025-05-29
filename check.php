<?php
session_start();
    $pdo = new PDO('  ');


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //データ取得
        $name = $_POST[''];
        $pass = $_POST[''];

        //データベースから値を取得
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $name);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        //入力した情報とデータベースの情報が一致するか
        if ($user && $pass === $user['password']) {
            $_SESSION['user_pass'] = $user['password'];
            $_SESSION['user_name'] = $user['username'];

        // ホーム画面にリダイレクト
        header('/form.php');
        exit();
        } else {
            //エラーメッセージ
            $_SESSION['error_msg'] = "メールアドレスまたはパスワードが正しくありません。";
            header('/login.php');
            exit();
        }     
    }      
?>
