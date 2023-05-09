<?php
require 'pdo_connect.php';

$data = json_decode(file_get_contents('php://input'), false);
$box_num = $data->box_num;
$name = $data->name;
$weight = $data->weight;

$sql = 'INSERT into Box (box_number, name, weight) values (:box_num, :name, :weight)';
$prepare = $dbh->prepare($sql);

$prepare->bindValue(':box_num', $box_num);
$prepare->bindValue(':weight', $weight);
$prepare->bindValue(':name', $name);

$prepare->execute();

// db切断
$dbh = null;
?>
