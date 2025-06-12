<?php
// （ログアウト処理部分はそのまま）

if (isset($_GET['logout'])) {
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログアウト完了</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;  /* 水平方向中央 */
            align-items: center;      /* 垂直方向中央 */
            height: 100vh;            /* 画面全体の高さ */
            margin: 0;
        }
        .message-box {
            background-color: #e0f7fa;
            border: 2px solid #00796b;
            color: #004d40;
            padding: 30px 40px;
            border-radius: 10px;
            font-size: 1.3em;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <p>ログアウトしました。<br>5秒後にログインページへ移動します。</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "login.php";
        }, 5000);
    </script>
</body>
</html>
<?php
    exit;
}
?>
