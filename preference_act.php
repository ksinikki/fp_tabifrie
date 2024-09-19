<?php
session_start();
require_once 'funcs.php';
loginCheck();

//1. POSTデータ取得
// $use_id = $_GET['user_id'];
$hotel = $_POST['hotel'];
// $flight = $_POST['flight'];
// $engaging = $_POST['engaging'];
// $smoking = $_POST['smoking'];
// $drinking = $_POST['drinking'];
// $eating = $_POST['eating'];


//2. DB接続します 
// require_once 'funcs.php';
$pdo = db_conn();

//３．データ登録SQL作成 
//3-1 SQL文を用意
// $stmt = $pdo->prepare('INSERT INTO tabifrie_preference(id, user_id, hotel, flight) VALUES(NULL, :user_id, :hotel, :flight)'); 
$stmt = $pdo->prepare('UPDATE tabifrie_user SET hotel = :hotel WHERE email = :user_id;');
// 3- 2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
// $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':hotel', $hotel, PDO::PARAM_STR);

// $stmt->bindValue(':flight', $flight, PDO::PARAM_STR);
// $stmt->bindValue(':engaging', $engaging, PDO::PARAM_STR);
// $stmt->bindValue(':smoking', $smoking, PDO::PARAM_STR);
// $stmt->bindValue(':drinking', $drinking, PDO::PARAM_STR);
// $stmt->bindValue(':eating', $eating, PDO::PARAM_STR);

// 3-3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('Error Message:'.$error[2]);
}else{
  //５．リダイレクト
  header('Location: profile.php');
}