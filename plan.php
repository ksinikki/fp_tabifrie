<?php
session_start();
require_once 'funcs.php';
loginCheck();
db_conn();
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

    <script language="javascript" type="text/javascript">  
    var dList = {
        Asia : ['韓国', '台湾', 'タイ', 'マレーシア', 'ベトナム', 'インドネシア'],
        NorthAmerica :  ['アメリカ', 'カナダ'],
    };

    area = document.getElementById("area");
    country = document.getElementById("country");
    
    for (key in dList) {
        // area.innerHTML = area.innerHTML + '<option name="area" value="key">'+ key +'</option>';
        area.innerHTML = area.innerHTML + '<option>'+ key +'</option>';
    }

    area.addEventListener('change', function ref_country(e){
        country.innerHTML = '<option>-国を選択してください-</option>';
        itm = e.target.value;
        if(itm in dList){
                for (i = 0; i < dList[itm].length; i++) {
                    // country.innerHTML = country.innerHTML + '<option name="country" value="dList[itm][i]">'+ dList[itm][i] +'</option>';
                    country.innerHTML = country.innerHTML + '<option>'+ dList[itm][i] +'</option>';
                }
        }
    });
    </script>
</body>

</html>
