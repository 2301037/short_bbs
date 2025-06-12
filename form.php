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
        $name = $_POST['name'] ?? '';
        $comment = $_POST['comment'] ?? '';
 
        $pdo = new PDO('mysql:host=mysql321.phy.lolipop.lan;
                    dbname=LAA1553845-team1kadai1;charset=utf8',
                    'LAA1553845',
                    'Banana1234');
    try {
    $pdo->beginTransaction();

    $sql1 = "INSERT INTO user(username) VALUES (:name)";
    $stmt1 = $pdo->prepare($sql1);
    $stmt1->bindParam(':name', $name);
    $stmt1->execute();

    $sql2 = "INSERT INTO comment(content) VALUES (:comment)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':comment', $comment);
    $stmt2->execute();

    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    echo "エラーが発生しました: " . $e->getMessage();
}
    }
   
                    ?>
 
    <p><a href="view.php">▶ 投稿一覧を見る</a></p>
</body>
</html>
 