<?php
session_start();

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
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
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
            animation: fadeIn 1s forwards;
            opacity: 0;
        }
        @keyframes fadeIn {
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="message-box">
        <p>ログアウトしました。<br>5秒後にログインページへ移動します。</p>
        <p id="countdown">5</p>
    </div>

    <script>
        let countdownNum = 5;
        const countdownEl = document.getElementById('countdown');

        const interval = setInterval(() => {
            countdownNum--;
            if (countdownNum <= 0) {
                clearInterval(interval);
                window.location.href = "login.php";
            } else {
                countdownEl.textContent = countdownNum;
            }
        }, 1000);
    </script>
</body>
</html>
<?php
    exit;
}
?>
