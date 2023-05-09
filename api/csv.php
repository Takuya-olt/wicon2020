<?php
// DB接続
require 'pdo_connect.php';

// ファイル名,ヘッダー設定
$file_path = "./export.csv";

// --------------
//　EXPORT OPTION
// --------------
$sql = 'select Box_number, weight, created_at from Box';
$export_header = ["Box_number", "weight", "time"];

if(touch($file_path)){
  $file = new splFileObject($file_path, "w");

  $file->fputcsv($export_header);
  $stmt = $dbh->query($sql);

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
?>