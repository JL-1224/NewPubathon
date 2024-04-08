<!DOCTYPE html>
<html lang='en-GB'>

<head>
// head content here
</head>

<body>
//body content here
<?php
//Connecting database to script
$db_hostname = "studdb.csc.liv.ac.uk";
$db_database = "sgjlinst";
$db_username = "sgjlinst";
$db_password = "Liverpool123"; 
$db_charset = "utf8mb4";

$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
$opt = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false
);

try {
  // php code here
} catch (PDOException $e) {
  exit("PDO Error: " . $e->getMessage() . "<br>");
}

// functions here

?>
</body>
</html>
