<?php
session_start();
$pdo = new PDO('mysql:host=mysql321.phy.lolipop.lan;
                    dbname=LAA1553845-team1kadai1;charset=utf8',
                    'LAA1553845',
                    'Banana1234');
if (!empty($_SESSION['error_msg'])) {
    echo '<p style="color:red;">' . htmlspecialchars($_SESSION['error_message'], ENT_QUOTES, 'UTF-8') . '</p>';
    unset($_SESSION['error_msg']); // 表示後に削除する場合
} 


 if (isset($_SESSION['user_name'])) {
    header('Location: form.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="check.php" method="post">
        <p>ユーザー名：<input type="text" name="username" required></p>
        <p>パスワード：<input type="password" name="password" required></p>
        <p><button type="submit">ログイン</button></p>
    </form>
</body>
</html>
