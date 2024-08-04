<?php

function h($str){
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}


//1.  DB接続します
// insert.phpからコピペ
try {
    //ID:'root', Password:''xamppはパスワードなし。DB接続の決まりのコード。phpの場合、exitはきっぱりここで処理を止める。
    $pdo = new PDO('mysql:dbname=gs_php02_kadai;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);

} else {
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // GETデータ送信リンク作成
        $view .= '<p>';
        $view .= '<a href = "detail.php?id='. $result['id'] .'" >';
        $view .=h($result['datetime'] ) .'  ' .h($result['bookname']) .'  '.h($result['bookURL']) .'  '. h($result['bookcomment']);
        $view .='</a>';
        $view .= '<a href = "delete.php?id='. $result['id'] .'" >';
        $view .='[ 削除 ]';
        $view .='</a>';
        $view .= '</p>';
    } 
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKMARKアプリ</title>
    <style>

    /* 設定を一度リセット */
        html,body,div,span,object,iframe,
        h1,h2,h3,h4,h5,h6,p,blockquote,pre,
        abbr,address,cite,code,
        del,dfn,em,img,ins,kbd,q,samp,
        small,strong,sub,sup,var,
        b,i,
        dl,dt,dd,ol,ul,li,
        fieldset,form,label,legend,
        table,caption,tbody,tfoot,thead,tr,th,td,
        article,aside,canvas,details,figcaption,figure,
        footer,header,hgroup,menu,nav,section,summary,
        time,mark,audio,video{
            margin:0;
            padding:0;
            border:0;
            outline:0;
            font-size:100%;
            vertical-align:baseline;
            background:transparent;
        }

        body{
            line-height:1;
        }

        article,aside,details,figcaption,figure,
        footer,header,hgroup,menu,nav,section{
            display: block;
        }

        nav ul {
        list-style:none;
    }

    blockquote, q {
        quotes:none;
    }

    blockquote:before, blockquote:after,
    q:before, q:after {
        content:'';
        content:none;
    }

    a {
        margin:0;
        padding:0;
        font-size:100%;
        vertical-align:baseline;
        background:transparent;
    }

    /* change colours to suit your needs */
    ins {
        background-color:#ff9;
        color:#000;
        text-decoration:none;
    }

    /* change colours to suit your needs */
    mark {
        background-color:#ff9;
        color:#000;
        font-style:italic;
        font-weight:bold;
    }

    del {
        text-decoration: line-through;
    }

    abbr[title], dfn[title] {
        border-bottom:1px dotted;
        cursor:help;
    }

    table {
        border-collapse:collapse;
        border-spacing:0;
    }

    hr {
        display:block;
        height:1px;
        border:0;
        border-top:1px solid #cccccc;
        margin:1em 0;
        padding:0;
    }

    input, select {
        vertical-align:middle;
    }

  /* 共通のスタイル */
  body{
    padding:50px;
    font-size: 100%;
    font-family: 'ヒラギノ角ゴ Pro W3','Hiragino Kaku Gothic Pro','メイリオ',Meiryo,sans-serif;
    color: whitesmoke;
    background:#607D8B;

   }

    a {
        color:white;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    h1 {
        margin-bottom: 60px;
        font-size: 200%;
        color:whitesmoke;
        text-align: center;
    }

    /* 入力エリア */
    label{
        display:block;
        margin-bottom:7px;
        font-size:85%;
    }

    input[type="text"],
    textarea{
        margin-bottom:20px;
        padding:15px;
        font-size: 85%;
        border: 1px solid #ddd;
        border-radius: 3px;
        background: #fff;
    }
    
    input[type="text"] {
	 width: 300px;
    }

    textarea{
        width:50%;
        max-width:50%;
        height:100px;

    }

    input[type="submit"] {
	appearance: none;
    -webkit-appearance: none;
    padding: 10px 20px;
    color: #42A5F5;
    font-size: 90%;
    line-height: 1.0em;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    background-color: #FDD835;
    font-weight: bold;
    }

    input[type=submit]:hover,
    button:hover{
        background-color: #2392d8;
    }

    hr {
	 margin: 20px 0;
	 padding: 0;
    }

    .success_message{
        margin-bottom:20px;
        padding:10px;
        color:#48b400;
        border-radius: 10px;
        border: 1px solid #4dc100;
    }

    .error_message {
     margin-bottom: 20px;
     padding: 10px;
     color: #ef072d;
     list-style-type: none;
     border-radius: 10px;
     border: 1px solid #ff5f79;
   }


    .error_message li {
        font-size: 86%;
        line-height: 1.6em;
    }


  </style>
</head>
<body>
    
    <header>
        <nav class ="navbar navbar-default" >
            <div class ="container-fluid">
                <div class ="navbar-header"><a href="index.php">データ入力</a></div>
            </div>

        </nav>
    </header>

    <div>
    <div class="container jumbotron"><?= $view ?></div>
    </div>

 

</body>
</html>
