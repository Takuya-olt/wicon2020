<?php
// DB接続
require 'pdo_connect.php';

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");

// ファイル名
$file_path = "./ranking.json";
$sql = 'SELECT name, SUM(weight) FROM `Box` WHERE name !=\'\' AND date_format(created_at,"%m")=date_format(now(), "%m") GROUP BY name ORDER BY SUM(weight) DESC';

$data = array();

// json形式で取得
$stmt = $dbh->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $data[]=array(
    'name'=>$row['name'],
    'weight'=>$row['SUM(weight)']
  );
  // var_dump($data);
}

// file export
$json = json_encode($data);
file_put_contents($file_path, $json);

// --------------------
// HTTPレスポンスヘッダ
// --------------------
header('Content_Language: ja');
header('Content-Type: application/json; charset=UTF-8'); //パス
header('Content-Length: '.filesize($file_path)); //ファイルサイズ
header('Content-Disposition: attachment; filename=ranking.json'); //ダウンロードファイル名

// ファイル送信
readfile($file_path);

// echo "ranking json encode";
?>