<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylesheet_2.css">
    <title>新規登録</title>
</head>
<body>
    
        <h2>新規登録</h2>
        <form action="user_insert.php" method="POST">
            
                <label for="name">お名前</label>
                <input type="text" id="name" name="name" required>
            
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" required>
           
            <button type="submit">新規登録</button>
        </form>
        <p><a href="login.php">ログインはこちら</a></p>
    
</body>
</html>