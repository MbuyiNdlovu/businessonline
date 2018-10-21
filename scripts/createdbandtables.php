<?php
$sqlFileToExecute = 'phangisa.sql';
$hostname = 'localhost';
$db_user = 'root';
$db_password = '';
$database_name = 'phangisa';

$sqlErrorCode = null;

$link = mysqli_connect($hostname,$db_user,$db_password,$database_name);
if (!$link) {
  die ("MySQL Connection error");
}

// read the sql file
$f = fopen($sqlFileToExecute,"r+");
$sqlFile = fread($f, filesize($sqlFileToExecute));
$sqlArray = explode(';',$sqlFile);
foreach ($sqlArray as $stmt) {
  if (strlen($stmt)>3 && substr(ltrim($stmt),0,2)!='/*') {
    $result = mysqli_query($link,$stmt);
    if (!$result) {
      $sqlErrorCode = mysqli_errno($link);
      $sqlErrorText = mysqli_error($link);
      $sqlStmt = $stmt;
      break;
    }
  }
}
if ($sqlErrorCode == 0) {
  echo "Script is executed succesfully!";
} else {
  echo "An error occured during installation!<br/>";
  echo "Error code: $sqlErrorCode<br/>";
  echo "Error text: $sqlErrorText<br/>";
  echo "Statement:<br/> $sqlStmt<br/>";
}
 
?>