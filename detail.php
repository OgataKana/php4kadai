<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id = $_GET["id"];

//select.phpの２〜１３行をコピペ
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE  id=:id");//idに数字が入る,バインド変数
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
}
$row = $stmt->fetch();


?>

<?php require 'header.php'; ?>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>書籍：<input type="text"  name="name" Value="<?=$row["name"]?>"></label><br>
     <label>著者：<input type="text" name="sakusya" Value="<?=$row["sakusya"]?>"></label><br>
     <label>感想：<textArea name="comment" rows="4" cols="40"><?=$row["comment"]?></textArea></label><br>
     <input type="submit" value="送信">
     <input type= "hidden" name="id" Value ="<?=$row["id"]?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


<?php require 'footer.php'; ?>
