<?php
session_start();
$userid = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>💬 一言掲示板</h1>
    <form action="" method="post">
        <p>名前：<input type="text" name="name" required></p>
        <p>コメント：<br>
        <textarea name="comment" rows="4" cols="40" required></textarea></p>
        <p><button type="submit">投稿する</button></p>
    </form>
    <!-- ↓ PHP SQL CREATED ↓ -->
    <?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $comment = $_POST['comment'] ?? '';
 
        $pdo = new PDO('mysql:host=mysql321.phy.lolipop.lan;
                    dbname=LAA1553845-team1kadai1;charset=utf8',
                    'LAA1553845',
                    'Banana1234');
    try {
    $pdo->beginTransaction();
    $sql2 = "INSERT INTO comment(user_id , content) VALUES (:add_id , :comment)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':add_id', $userid);
    $stmt2->bindParam(':comment', $comment);
    $stmt2->execute();

    $pdo->commit();
    echo "投稿を追加しました！";
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "エラーが発生しました: " . $e->getMessage();
}
    }
   
                    ?>
 
    <p><a href="view.php">▶ 投稿一覧を見る</a></p>
</body>
</html>
 