<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

// index.phpから送られてきたデータを変数で受け取る
$name = $_POST["name"];
$sakusya = $_POST["sakusya"];
$comment = $_POST["comment"];


//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成

$sql = "INSERT INTO gs_bm_table(name,sakusya,comment,date)VALUES(:name,:sakusya,:comment,sysdate())";


// $stmt = $pdo->prepare("SQLの宣言  table名( dbの項目を入れる )VALUES( ************");
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sakusya', $sakusya, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)


$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  // $error = $stmt->errorInfo();
  // exit("QueryError:".$error[2]);
  sqlError($stmt);

}else{
  //５．index.phpへリダイレクト　この処理がないと画面が切り替わらない
  redirect("index.php");
}
?>
