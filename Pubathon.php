<!DOCTYPE html>
<html lang='en-GB'>

<head>



  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pubathon</title>
  <style>
    /* CSS for styling the title */
    title {
      color: blue; /* Adjust the color as needed */
    }
  </style>




</head>

<body>

<!-- html body content here -->

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
          
          if ($selectedGame == 'Pub Golf'){
            noOfTeams($selectedArea, $selectedRules,$selectedFancyDress,$selectedGame);
            generate($pdo, $selectedArea);
          }
          else {
            generate($pdo, $selectedArea);
          }
          
        } else {
          selectGame($selectedArea, $selectedRules, $selectedFancyDress);
        }
        
      } else {
        selectFancyDressOn($selectedArea, $selectedRules);
      }
      
    } else {
      selectRulesOn($selectedArea); // Show rules selection if not set
    }
    
  } else {
    selectArea($pdo); // called if the user hasn't selected an area yet
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

function selectFancyDressOn($selectedArea, $selectedRules) {
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Fancy Dress On/Off</label>
        <select name='selectedFancyDress' required=true>
        <option value=''></option>
        <option value='On'>On</option>
        <option value='Off'>Off</option>
        </select>
        <input type='hidden' name='selectedArea' value='$selectedArea'>
        <input type='hidden' name='selectedRules' value='$selectedRules'>
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
        <input type='hidden' name='selectedFancyDress' value='$selectedFancyDress'>
        <input type='submit' value='Next'>
        </form>";       
}

///Function for choosing number of teams
function noOfTeams($selectedArea, $selectedRules, $selectedFancyDress, $selectedGame) {
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Number of Teams</label>
        <select name='selectedTeams' required=true>
        <option value=''></option>";
        
  for ($i = 2; $i <= 8; $i++) {
    echo "<option value='$i'>$i</option>";
  }
  
  echo "</select>
        <input type='hidden' name='selectedArea' value='$selectedArea'>
        <input type='hidden' name='selectedRules' value='$selectedRules'> 
        <input type='hidden' name='selectedFancyDress' value='$selectedFancyDress'>
        <input type='hidden' name='selectedGame' value='$selectedGame'>
        <input type='submit' value='Next'>
        </form>";       
}

///Function for chosing number of players
function noOfPlayers($selectedArea, $selectedRules, $selectedFancyDress, $selectedGame,$noOfTeams) {
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Number of Players</label>
        <select name='selectedPlayers' required=true>
        <option value=''></option>";
        
  for ($i = 2; $i <= 20; $i++) {
    echo "<option value='$i'>$i</option>";
  }
  
  echo "</select>
        <input type='hidden' name='selectedArea' value='$selectedArea'>
        <input type='hidden' name='selectedRules' value='$selectedRules'> 
        <input type='hidden' name='selectedFancyDress' value='$selectedFancyDress'>
        <input type='hidden' name='selectedGame' value='$selectedGame'>
        <input type='hidden' name='selectedTeams' value='$noOfTeams'>
        <input type='submit' value='Next'>
        </form>";       
}


// Generates list of pubs depending on area selected
// Maximum of 9 pubs - can change this in SQL query if needed
function generate($pdo, $selectedArea) {
  $stmtPubs = $pdo->prepare("SELECT * FROM pubs WHERE area = :selectedArea ORDER BY RAND() LIMIT 9");
  $stmtPubs->execute(['selectedArea' => $selectedArea]);

  echo "<h2>Randomly Selected Pubs in $selectedArea:</h2>";
  
  // Display crawl/golf in table
  echo "<table border='1'>
        <tr>
        <th>Pub</th>
        <th>Name</th>
        <th>Address</th>
        </tr>";
        
  $i = 1;
  foreach($stmtPubs as $row) {
        echo "<tr>
            <td>Pub " . $i  . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["address"] . "</td>
          </tr>";
    $i += 1;
  }
  
  echo "</table>";
  
}

?>
</body>

</html>

