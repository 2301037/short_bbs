<?php
session_start();
$userid = $SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>📜 投稿一覧</h1>
    <p><a href="form.php">← 投稿フォームへ戻る</a></p>
    <hr>
    <?php
    $pdo = new PDO('mysql:host=mysql321.phy.lolipop.lan;
                    dbname=LAA1553845-team1kadai1;charset=utf8',
                    'LAA1553845',
                    'Banana1234');

    $sql = "SELECT user.usrname , comment.content
            FROM commnet Join user ON comment.user_id = user.id
            ORDER BY comment.id ASC ";
    ?>
</body>
</html>
