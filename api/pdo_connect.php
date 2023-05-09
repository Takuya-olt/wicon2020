<?php
require 'config.php';

try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "connected!\n";
} catch (PDOException $e) {
  // error_log("error: " . $e->getMessage() . "\n", 3, "/api/log/errorlog")
  echo $e->getMessage();
  exit();
}
