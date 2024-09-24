<?php
session_start();
require_once 'funcs.php';
loginCheck();

//1. POSTデータ取得
$email = $_SESSION['user_id'];
$hotel = $_POST['hotel'];
$flight = $_POST['flight'];
$engaging = $_POST['engaging'];
$smoking = $_POST['smoking'];
$drinking = $_POST['drinking'];
$eating = $_POST['eating'];


//2. DB接続します 
// require_once 'funcs.php';
$pdo = db_conn();

//３．データ登録
$stmt = $pdo->prepare('UPDATE tabifrie_user SET hotel = :hotel, flight = :flight, engaging = :engaging, smoking = :smoking, drinking = :drinking, eating = :eating WHERE email = :user_id;');
$stmt->bindValue(':hotel', $hotel, PDO::PARAM_STR);
$stmt->bindValue(':flight', $flight, PDO::PARAM_STR);
$stmt->bindValue(':engaging', $engaging, PDO::PARAM_STR);
$stmt->bindValue(':smoking', $smoking, PDO::PARAM_STR);
$stmt->bindValue(':drinking', $drinking, PDO::PARAM_STR);
$stmt->bindValue(':eating', $eating, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $email, PDO::PARAM_STR);

// 3-3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  $error = $stmt->errorInfo();
  exit('Error Message:'.$error[2]);
}else{
  //５．リダイレクト
  header('Location: plan.php'); // これから作成
}