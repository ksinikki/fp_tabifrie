<?php

//1. POSTデータ取得
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];

//2. DB接続します 【?】
require_once 'funcs.php';
$pdo = db_conn();

//３．データ登録SQL作成 
//3-1 SQL文を用意
$stmt = $pdo->prepare('INSERT INTO tabifrie_user(id, name, gender, age, email, password) VALUES(NULL, :name, :gender, :age, :email, :password)'); /// :xxxとは悪用されないように直接に入力するのではなく、変数のようなものを用意して処理する

// 3- 2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

// 3-3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  
  header('Location: preference.php');

}