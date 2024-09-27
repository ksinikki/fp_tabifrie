<?php
// 【問題❶】選択されたエリアによって、国の選択肢が表示できていない※下記の方法でkeyが英語表示になる
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
                <li><a href="offer.php">オファー</a></li>
                <li><a href="notification.php">マッチング通知</a></li>
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
                    <p>　地域　
                        <select id="area" name="area">
                            <option value="">-地域を選択してください-</option>
                            <option value="1">北米</option>
                            <option value="2">アジア</option>
                            
                        </select></p>
                        <p>　国　　　
                        <select id="country" name="country">
                            <option value="">-国を選択してください-</option>
                            <option value="1">カナダ</option>
                            <option value="2">アメリカ</option>
                            <option value="3">韓国</option>
                            <option value="4">台湾</option>
                            <option value="5">タイ</option>
                            <option value="7">ベトナム</option>
                            <option value="6">マレーシア</option>
                        </select></p>
                </div><br>  
                <div>
                    <p>時間</p>
                    <div class="start">
                        <p>　<select name="start-year">
                                <option value=""></option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                        </select>　年　</p>
                        <p>　<select name="start-month">
                                <option value=""></option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                        </select>　月　</p>
                        <p>　<select name="start-date">
                                <option value=""></option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                        </select>　日　から</p></p>
                    </div>
                    <div class="end">
                        <p>　<select name="end-year">
                                <option value=""></option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                        </select>　年　</p>
                        <p>　<select name="end-month">
                                <option value=""></option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                        </select>　月　</p>
                        <p>　<select name="end-date">
                                <option value=""></option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                        </select>　日　まで</p></p>
                    </div>
                    
                </div><br><br>
                <button class="btn_s">保存</button>
                <button class="btn" onclick="document.location='***.php'">破棄</button>
            </form>
        </div>
        
    </section>
    <script language="javascript" type="text/javascript">  
    // var dList = {
    //     1 : {1:'カナダ', 2:'アメリカ'},
    //     2 : {3:'韓国',  4:'台湾', 5:'タイ', 6:'マレーシア', 7:'ベトナム'},
       
    // };

    // area = document.getElementById("area");
    // country = document.getElementById("country");
    
    // for (key in dList) {
    //     area.innerHTML = area.innerHTML + '<option value="' + key + '">' + key +'</option>';
    // }

    // area.addEventListener('change', function ref_country(e){
    //     country.innerHTML = '<option>-国を選択してください-</option>';
    //     itm = e.target.value;
    //     if(itm in dList){
    //             for (i = 0; i < dList[itm].length; i++) {
    //                 // country.innerHTML = country.innerHTML + '<option value="'+ dList[itm][i] +'">'+ dList[itm][i] +'</option>';
    //                 country.innerHTML = country.innerHTML + '<option value="'+ dList[itm][i] +'">' + '</option>';
    //             }
    //     }
    // });
    </script>
</body>

</html>
