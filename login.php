<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/login.css" />
    <title>旅フレ‐ログイン</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅ふれロゴ" width="232px" class=""> 
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="login.php">プロフィール</a></li>
                <li><a href="login.php">旅検索</a></li>
                <li><a href="login.php">マッチング通知</a></li>
                <li><a href="login.php">メッセージ</a></li>
            </ul>
        </nav>
        <button class="btn" onclick="document.location='signup.php'">新規登録</button>
    </header>
    <section class="container">
        <div>
            <h2>旅ふれ</h2>
            <h3>費用シェアで旅行をもっと楽しく</h3>
            <form action="login_act.php" method="post">
                メールアドレス <input type="text" name="email" /><br><br>
                パスワード <input type="password" name="password" /><br><br><br>
                <button class="btn_s">ログイン</button>
                <!-- <input type="submit" value="ログイン" /> -->
            </form>
        </div>
        <div>
            <img src="./img/banner.png" alt="トップページバナー" width="640px" class=""> 
        </div>
    </section>
</body>

</html>
