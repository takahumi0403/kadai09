<?php
//1. POSTデータ取得
// [bookname,bookURL,bookcomment]
$name = $_POST['bookname'];
$URL = $_POST['bookURL'];
$comment = $_POST['bookcomment'];


//2. DB接続します
// PHPからDBに接続する
try {
    //ID:'root', Password:''xamppはパスワードなし。DB接続の決まりのコード。phpの場合、exitはきっぱりここで処理を止める。
    $pdo = new PDO('mysql:dbname=gs_php02_kadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

//  3. データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO 
               gs_bm_table( id, bookname, bookURL, bookcomment, datetime)
                VALUES(NULL, :bookname, :bookURL, :bookcomment, now())');

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':bookname', $name, PDO::PARAM_STR);
$stmt->bindValue(':bookURL', $URL, PDO::PARAM_STR);
$stmt->bindValue(':bookcomment', $comment, PDO::PARAM_STR);

//  3. 実行 true or false （書き込みを実施。実施後trueかfalseが入る。）
$status = $stmt->execute();

//４．データ登録処理後
if($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
} else {
    //５．index.phpへリダイレクト
     header('Location: index.php');

}

?>

