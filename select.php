<?php
include "funcs.php";
$pdo = db_con();

//1.  DB接続します
// try {
// $pdo = new PDO('mysql:dbname=gs_db_0525;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('データベースに接続できませんでした。'.$e->getMessage());
// }

//２．データ表示SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  // $error = $stmt->errorInfo();
  // exit("ErrorQuery:".$error[2]);
  sqlError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //$resultにデータが入ってくるのでそれを活用して[html]に表示させる為の変数を作成して代入する
    $view .= '<p>';
    $view .='<a href="detail.php?id='.$result["id"].'">';
    $view .= " 書籍名 『".$result ["name"] ." 』  著者 《".$result["sakusya"]."》  感想  〈".$result["comment"]."〉";
    $view .='</a>';
    $view .=' ';
    $view .='<a href="delete.php?id='.$result["id"].'">';
    $view .= "[削除]";
    $view .='</a>';
    $view .= '<p>';
  }
}
?>


<?php require 'header.php'; ?>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a><br>
      <form action="search-output.php" method="post">
<input type="text" name="keyword">
<input type="submit" value="検索">
</form>



      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

<?php require 'footer.php'; ?>
