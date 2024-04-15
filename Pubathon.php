<!DOCTYPE html>
<html lang='en-GB'>

<head>

// html head content here

</head>

<body>

// html body content here

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
  $pdo = new PDO($dsn, $db_username, $db_password, $opt);
  
  // Check if user has selected an area
  if (isset($_POST['selectedArea'])) {
    $selectedArea = $_POST['selectedArea'];
    
    if (isset($_POST['selectedGame'])) {
      $selectedGame = $_POST['selectedGame'];
      generatePubs($pdo, $selectedArea);
      
    } else {
      selectGame($selectedArea); // called if user hasn't selected game yet
    }  
    
  } else {
    selectArea($pdo); // called if user hasn't selected area yet
  }
} catch (PDOException $e) {
  exit("PDO Error: " . $e->getMessage() . "<br>");
}

// Displays dropdown of areas pulled from database
function selectArea($pdo) {
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Area:</label>
        <select name='selectedArea' required=true>
        <option value=''></option>";
        
  $stmt = $pdo->query("SELECT DISTINCT area FROM pubs");
  
  while ($row = $stmt->fetch()) {
      echo "<option value='" . $row["area"] . "'>" . $row["area"] . "</option>";
  }
  
  echo "</select>
        <input type='submit' value='Next'>
        </form>";
}

// Displays dropdown to allow user to chose between pub golf and crawl
function selectGame($selectedArea) {
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Game</label>
        <select name='selectedGame' required=true>
        <option value=''></option>
        <option value='Pub Crawl'>Pub Crawl</option>
        <option value='Pub Golf'>Pub Golf</option>
        </select>
        <input type='hidden' name='selectedArea' value='$selectedArea'> 
        <input type='submit' value='Next'>
        </form>";       
}

// Generates list of pubs depending on area selected
// Maximum of 9 pubs - can change this in SQL query if needed
function generatePubs($pdo, $selectedArea) {
  $stmt = $pdo->prepare("SELECT * FROM pubs WHERE area = :selectedArea ORDER BY RAND() LIMIT 9");
  $stmt->execute(['selectedArea' => $selectedArea]);

  // Displays pubs on screen
  echo "<h2>Randomly Selected Pubs in $selectedArea:</h2>";
  echo "<ul>";
  $i = 1;
  foreach($stmt as $row) {
    echo "<li>Pub " . $i  . ": " . $row["name"] . "</li>";
    $i += 1;
  }
  
  echo "</ul>";
}

// rest of functions here

?>
</body>
</html>
