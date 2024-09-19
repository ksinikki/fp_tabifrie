<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/signup.css" />
    <title>旅フレ‐新規登録</title>
</head>

<body>
    <header class="container">
        <h1> 
            <img src="./img/logo2.png" alt="旅ふれロゴ" width="232px" class=""> 
        <!--imgのwidthとheightは画像サイズを確認して比例で調整する-->
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="login.php">プロフィール</a></li>
                <li><a href="login.php">旅検索</a></li>
                <li><a href="login.php">通知</a></li>
                <li><a href="login.php">メッセージ</a></li>
            </ul>
        </nav>
        <button class="btn" onclick="document.location='login.php'">ログイン</button>
    </header>
    <section class="container">
        <div>
            <!-- <h2>新規登録</h2> -->
            <h3>新規登録</h3>
            <form action="signup_act.php" method="post">
                ニックネーム <input type="text" name="name" ><br><br>
                性別
                <label><input type="radio" name="gender" value="女">女</label>
                <label><input type="radio" name="gender" value="男">男</label><br><br>
                年齢
                <select name="age">
                    <option value=""></option>
                    <option value="20代">20代</option>
                    <option value="30代">30代</option>
                    <option value="40代">40代</option>
                    <option value="50代">50代</option>
                    <option value="60代or以上">60代or以上</option>
                </select><br><br>
                メールアドレス <input type="text" name="email" ><br><br>
                パスワード <input type="password" name="password" ><br><br><br>
                <button class="btn_s">新規登録</button>
            </form>
        </div>
        <div>
            <img src="./img/banner.png" alt="トップページバナー" width="640px" class=""> 
        </div>
    </section>
    <!-- <footer>
        <small>(c) tabifriend.com</small>
    </footer> -->
</body>

</html>
