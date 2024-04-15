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
  
  if (isset($_POST['selectedArea'])) {
    $selectedArea = $_POST['selectedArea'];
    
    if (isset($_POST['selectedRules'])) {
      $selectedRules = $_POST['selectedRules'];
      
      if (isset($_POST['selectedFancyDress'])) {
        $selectedFancyDress = $_POST['selectedFancyDress'];
      
        if (isset($_POST['selectedGame'])) {
          $selectedGame = $_POST['selectedGame'];
          generate($pdo, $selectedArea);
          
        } else {
          selectGame($selectedArea, $selectedRules,$selectedFancyDress);
        }
        
      else {
      selectFancyDress($selectedArea, $selectedRules);
      }
      
    } else {
      selectRulesOn($selectedArea); // Show rules selection if not set
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

function selectRulesOn($selectedArea){
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Rules On/Off</label>
        <select name='selectedRules' required=true>
        <option value=''></option>
        <option value='On'>On</option>
        <option value='Off'>Off</option>
        </select>
        <input type='hidden' name='selectedArea' value='$selectedArea'>
        <input type='submit' value='Next'>
        </form>"; 
}

function selectFancyDressOn($selectedArea, $selectedRules){
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Fancy Dress On/Off</label>
        <select name='selectedFancyDress' required=true>
        <option value=''></option>
        <option value='On'>On</option>
        <option value='Off'>Off</option>
        </select>
        <input type='hidden' name='selectedArea' value='$selectedArea'>
        <input type='hidden' name='selectedArea' value='$selectedRules'>
        <input type='submit' value='Next'>
        </form>"; 
}

// Displays dropdown to allow user to chose between pub golf and crawl
function selectGame($selectedArea, $selectedRules,$selectedFancyDress) {
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Game</label>
        <select name='selectedGame' required=true>
        <option value=''></option>
        <option value='Pub Crawl'>Pub Crawl</option>
        <option value='Pub Golf'>Pub Golf</option>
        </select>
        <input type='hidden' name='selectedArea' value='$selectedArea'>
        <input type='hidden' name='selectedRules' value='$selectedRules'> 
        <input type='hidden' name='selectedArea' value='$selectedFancyDress'>
        <input type='submit' value='Next'>
        </form>";       
}

// Generates list of pubs depending on area selected
// Maximum of 9 pubs - can change this in SQL query if needed
function generate($pdo, $selectedArea) {
  $stmtPubs = $pdo->prepare("SELECT * FROM pubs WHERE area = :selectedArea ORDER BY RAND() LIMIT 9");
  $stmtPubs->execute(['selectedArea' => $selectedArea]);
  
  $stmtFancyDress = $pdo->prepare("SELECT * FROM fancyDress ORDER BY RAND() LIMIT 1");
  $stmtFancyDress->execute();

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