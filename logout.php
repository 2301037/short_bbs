<?php
session_start();
$pdo = new PDO('mysql:host=mysql321.phy.lolipop.lan;
                    dbname=LAA1553845-team1kadai1;charset=utf8',
                    'LAA1553845',
                    'Banana1234');
 
// ✅ ログアウト処理（URLに ?logout=1 がある場合）
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
    header('Location: login.php'); // ログアウト後の遷移先
    exit;
}

//  ログインチェック（未ログインならログインページへ）
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

//  ここに管理者専用処理を追加してもOK
// 例: 管理者かどうかを確認（必要な場合）
if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin') {
    echo "このページにはアクセスできません。";
    exit;
}
?>


<p><a href="?logout=1">ログアウト</a></p>




