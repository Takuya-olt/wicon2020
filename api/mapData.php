<?php
// DB接続
require 'pdo_connect.php';

mb_language("uni");
mb_internal_encoding("utf-8"); //内部文字コードを変更
mb_http_input("auto");
mb_http_output("utf-8");

// ファイル名
$file_path = "./data.json";
// その月の重量の合計を取得
$sql = 'SELECT box_number, sum(weight) from Box where box_number=:number AND date_format(created_at,"%m")=date_format(now(), "%m")';

$data = array();

// json形式で取得
for($i=1; $i<5;  $i++){
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':number', $i);
  $stmt->execute();

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $data[]=array(
      // 'num'=>$row['box_number'],
      'num'=>$i,
      'weight'=>$row['sum(weight)']
    );
  }
}

// file export
$json = json_encode($data);
// echo substr( sprintf( '%o', fileperms(".")), -4);
touch($file_path);
file_put_contents($file_path, $json);

echo($json);
// --------------------
// HTTPレスポンスヘッダ
// --------------------
// header('Content-Length: '.filesize($file_path));
// header('Content-Disposition: attachment; filename=download.json');

// ファイル出力
// readfile($file_path);
?>