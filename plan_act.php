<?php
// 【問題❷】データの受取に問題ある、
// 配列
$dList = {
  Asia : ['韓国', '台湾', 'タイ', 'マレーシア', 'ベトナム', 'インドネシア'],
  NorthAmerica :  ['アメリカ', 'カナダ'],
};

session_start();
require_once 'funcs.php';
loginCheck();

//1. POSTデータ取得
$email = $_SESSION['user_id'];
$name = $_SESSION['user_name'];

// if($_POST['area'] == "asia"){
//   $area = "アジア";
// } else if($_POST['area'] == "northAmerica"){
//   $area = "北米";
// }
// $area = $_POST['area'];
// $country = $_POST['country'];
$startYear = $_POST['start-year'];
$startMonth = $_POST['start-month'];
$startDate = $_POST['start-date'];
$endYear = $_POST['end-year'];
$endMonth = $_POST['end-month'];
$endDate = $_POST['end-date'];


//2. DB接続します 
$pdo = db_conn();
$stmt = $pdo->prepare('SELECT * FROM tabifrie_user WHERE email = :email AND password = :password');
$status = $stmt->execute();
if($status === false) {
    sql_error($stmt);
}
$val = $stmt->fetch();

//３．データ登録
// $stmt = $pdo->prepare('INSERT INTO tabifrie_plan (id, name, email, start, end, area, country) VALUES (NULL, name = :name, email = :email, start = :start, end = :end, area = :area, country = :country)');

$stmt = $pdo->prepare('INSERT INTO tabifrie_plan (id, name, email, start, end) VALUES (NULL, name = :name, email = :email, start = :start, end = :end)');

$stmt->bindValue(':email', $val['email'], PDO::PARAM_STR);
$stmt->bindValue(':name', $val['name'], PDO::PARAM_STR);
// $stmt->bindValue(':area', $area, PDO::PARAM_STR);
// $stmt->bindValue(':country', $country, PDO::PARAM_STR);
$stmt->bindValue(':start', $startYear.$startMonth.$startDate, PDO::PARAM_STR);
$stmt->bindValue(':end', $endYear.$endMonth.$endDate, PDO::PARAM_STR);

// 3-3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  $error = $stmt->errorInfo();
  exit('Error Message:'.$error[2]);
}else{
  //５．リダイレクト
  header('Location: notification.php'); // これから作成
}