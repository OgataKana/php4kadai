<?php require './header.php'; ?>
<?php require './menu.php'; ?>
<div class="com_singUp">


<!-- Main[Start] -->
    <form method="post" action="insert.php">
        <div class="jumbotron">
            <div class="titlle"><p>企業様会員登録</p></div>
                <fieldset>
                <label>企業名<input type="text" name="co_name"></label><br>
                <label>担当者名<input type="text" name="a_name"></label><br>
                <label>TEL<input type="" name="co_tel"></label><br>
                <label>MAIL<input type="text" name="co_mail"></label><br>
                <label>郵便番号<input type="text" name="co_addnum"></label><br>
                <label>住所<input type="text" name="co_add"></label><br>
                <label>分類<p><!-- レディース／メンズ／キッズ チェックBOX-->
                    <input type="checkbox" name="co_type" value="1" checked="checked">women
                    <input type="checkbox" name="co_type" value="2">men
                    <input type="checkbox" name="co_type" value="3">kids</p></label><br>


                <label>ジャンル<p><!-- カジュアル／きれいめ／ドレッシー／スポーティ、、、 チェックBOX-->
                    <input type="checkbox" name="co_genre" value="1" checked="checked" style="font-size:5px;">１０代
                    <input type="checkbox" name="co_genre" value="2">２０代
                    <input type="checkbox" name="co_genre" value="3">３０代
                    <input type="checkbox" name="co_genre" value="4">４０代以上<br>
                    <input type="checkbox" name="co_genre" value="5">カジュアル
                    <input type="checkbox" name="co_genre" value="6">オフィス
                    <input type="checkbox" name="co_genre" value="7">ガーリー
                    <input type="checkbox" name="co_genre" value="8">ストリート
                    <input type="checkbox" name="co_genre" value="9">スポーティ
                    <input type="checkbox" name="co_genre" value="10">その他</p></label><br>
                <label>パスワード<input type="passward" name="co_pass"></label><br>
                <input type="submit" value="送信"><input type="reset" value="リセット">

                </fieldset>
        </div>
    </form>

<!-- Main[End] -->


</body>
</html>
