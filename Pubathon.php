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
    selectRulesOn();
    
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

  echo "<h2>Randomly Selected Pubs in $selectedArea:</h2>";

  // Previous code displayed in list format
  //foreach($stmt as $row) {
    //echo "<li>Pub " . $i  . ": " . $row["name"] . " - " . $row["address"] . "</li>";
    //$i += 1;
  //}
  
  // Updated code now displays as table
  echo "<table border='1'>
        <tr>
        <th>Pub</th>
        <th>Name</th>
        <th>Address</th>
        </tr>";
        
  $i = 1;
  foreach($stmt as $row) {
        echo "<tr>
            <td>Pub " . $i  . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["address"] . "</td>
          </tr>";
    $i += 1;
  }
  
  echo "</table>";
  
}

// rest of functions here
function selectRulesOn(){
  echo"<form action='Pubathon.php' method='post'>
      <input type='checkbox' name='rules_toggle' value='on'>
      <label for='rules_toggle'>Rules On/Off</label><br>
      <button type='submit'>Submit</button>
      </form>";
}


?>
</body>
</html>
