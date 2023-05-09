<?php
// DB接続
require 'pdo_connect.php';

// ファイル名,ヘッダー設定
$file_path = "./indiv.csv";
$data = json_decode(file_get_contents('php://input'), false);
$user_name = $data->user_name;

// --------------
//　EXPORT OPTION
// --------------
$sql = 'SELECT Box_number, name, weight, created_at from Box where name = :name';
$export_header = ["Box_number", "name", "weight", "time"];

// -------------
//  SQL
// -------------
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':name', $user_name, PDO::PARAM_STR);
$stmt->execute();

if(touch($file_path)){
  $file = new splFileObject($file_path, "w");
  $file->fputcsv($export_header);

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $file->fputcsv($row);
  }
}

// HTTPレスポンスヘッダ
header('Content-Length: '.filesize($file_path));
header('Content-Disposition: attachment; filename=download.csv');

// ファイル出力
readfile($file_path);

$dbh = null;

// echo "csv generate";
?>