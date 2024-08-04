<?php
// 1 insert.php略の中身をコピー・貼り付け
// 2　$id =$_POST['id']を追加
// 3．SQLの修正
// 4．header関数をselect.phpに変更



// 以下、insert.php略の中身
//1. POSTデータ取得
// [bookname,bookURL,bookcomment]
$name   = $_POST['bookname'];
$URL    = $_POST['bookURL'];
$comment = $_POST['bookcomment'];
$id     = $_POST['id'];


//2. DB接続します
// PHPからDBに接続する
try {
    //ID:'root', Password:''xamppはパスワードなし。DB接続の決まりのコード。phpの場合、exitはきっぱりここで処理を止める。
    $pdo = new PDO('mysql:dbname=gs_php02_kadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DB ConnectError:'. $e->getMessage());
}

//  3. データ登録SQL作成 コピーしたのは一度消して書き直し
$stmt = $pdo->prepare('UPDATE 
                            gs_bm_table 
                        SET bookname = :bookname,
                            bookURL = :bookURL,
                            bookcomment =:bookcomment,
                            datetime = now()
                        WHERE id = :id;
                        ');


//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':bookname', $name, PDO::PARAM_STR);
$stmt->bindValue(':bookURL', $URL, PDO::PARAM_STR);
$stmt->bindValue(':bookcomment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

//  3. 実行 true or false （書き込みを実施。実施後trueかfalseが入る。）
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('SQLMessage:'.$error[2]);
} else {
    //５．index.phpへリダイレクト
     header('Location:select.php');
     exit();
}



?>