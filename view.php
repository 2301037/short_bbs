<?php
session_start();
$userid = $_SESSION['user_id'];
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

    $sql = "SELECT user.username , comment.created_at , comment.content
            FROM comment Join user ON comment.user_id = user.id
            ORDER BY comment.id ASC ";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    /* 表示処理*/
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8');
        $content = nl2br(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8'));
        $created_at = htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8');

        echo "<div class='post-box'>";
        echo "<p><strong>{$username}</strong> さん（{$created_at}）</p>";
        echo "<p>{$content}</p>";
        echo "</div><hr>";
    }
    ?>
</body>
</html>
