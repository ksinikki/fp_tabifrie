<?php
session_start();
require_once 'funcs.php';
loginCheck();
db_conn();
// $pdo = db_conn();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/plan.css" />
    <title>旅フレ‐旅プラン</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅フレロゴ" width="232px" class=""> 
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="profile.php">プロフィール</a></li>
                <li><a href="plansearch.php">旅検索</a></li>
                <li><a href="notification.php">通知</a></li>
                <li><a href="message.php">メッセージ</a></li>
            </ul>
        </nav>
        <p><?= $_SESSION['user_name'] ?>さん、こんにちは！</p>
        <button class="btn" onclick="document.location='logout.php'">ログアウト</button>
    </header>
    <section class="container">
        <div>
            <img src="./img/banner.png" alt="トップページバナー" width="640px" class=""> 
        </div>
        <div>
            <!-- <h2>旅行の好み</h2> -->
            <h3>旅プラン</h3>
            <form action="plan_act.php" method="post">
                <div>
                    <p>目的地</p>
                    <p>　エリア　
                        <select id="area" name="area">
                            <option value="">-エリアを選択してください-</option>
                        </select></p>
                        <p>　国　　　
                        <select id="country" name="country">
                            <option value="">-国を選択してください-</option>
                        </select></p>
                </div><br>
                <div>
                    <p>時間</p>
                    <p>　
                        <input type="date" name="start">　から<br><br>　
                        <input type="date" name="end">　まで</p>
                </div><br><br>
                <button class="btn_s">保存</button>
                <button class="btn" onclick="document.location='profile.php'">破棄</button>
            </form>
        </div>
        
    </section>
</body>

</html>
