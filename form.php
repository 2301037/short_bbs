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
        $name = $_POST['name'] ?? '名無し';
        $comment = $_POST['comment'] ?? '';
 
        $pdo = new PDO('mysql:host=mysql321.phy.lolipop.lan;
                    dbname=LAA1553845-team1kadai1;charset=utf8',
                    'LAA1553845',
                    'Banana1234');
    $sql = "INSERT INTO comment (name , comment) VALUES (:name,:comment)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':comment', $comment);
    $stmt->execute();
    }
   
                    ?>
 
    <p><a href="view.php">▶ 投稿一覧を見る</a></p>
</body>
</html>
 