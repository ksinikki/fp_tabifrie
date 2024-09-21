<?php
session_start();
require_once 'funcs.php';
loginCheck();

//1. POSTデータ取得
$email = $_SESSION['user_id'];

$area = $_POST['area'];
$country = $_POST['country'];
$start = $_POST['start'];
$end = $_POST['end'];


//2. DB接続します 
$pdo = db_conn();

//３．データ登録
$stmt = $pdo->prepare('INSERT INTO tabifrie_plan (id, email, start, end, area, country) VALUES (NULL, email = :email, start = :start, end = :end, area = :area, country = :country)');
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':area', $area, PDO::PARAM_STR);
$stmt->bindValue(':country', $country, PDO::PARAM_STR);
$stmt->bindValue(':start', $start, PDO::PARAM_STR);
$stmt->bindValue(':end', $end, PDO::PARAM_STR);

// 3-3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  $error = $stmt->errorInfo();
  exit('Error Message:'.$error[2]);
}else{
  //５．リダイレクト
  header('Location: profile.php'); // これから作成
}