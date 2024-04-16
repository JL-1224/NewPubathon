<!DOCTYPE html>
<html lang='en-GB'>

<head>
  <meta charset="utf8mb4">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    /* CSS for styling the title */
    h1 {
      color: blue; /* Adjust the color as needed */
    }
  </style>
</head>

<body>

<h1>Pubathon</h1>
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

// Main code block
try {
  $pdo = new PDO($dsn, $db_username, $db_password, $opt);

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedArea'])) {
      $selectedArea = $_POST['selectedArea'];

      if (isset($_POST['selectedGame'])) {
          $selectedGame = $_POST['selectedGame'];
          
          if (isset($_POST['selectedFancyDress'])) {
              $selectedFancyDress = $_POST['selectedFancyDress'];

              if ($selectedGame == 'Pub Crawl') { // Route for Pub Crawl games
                  if (isset($_POST['selectedRules'])) {
                      $selectedRules = $_POST['selectedRules'];
                      generate($pdo, $selectedArea, $selectedFancyDress, $selectedGame, $selectedRules, $teamNames, $playerNames); // If all necessary data gathered, generate game
                      
                  } else {
                      selectRulesOn($selectedArea, $selectedGame, $selectedFancyDress); // Show rules selection if not set
                  }
                  
              } else { // Route for Pub Golf games - also need to ask for teams 
                  if (isset($_POST['selectedTeams'])) {
                      $noOfTeams = $_POST['selectedTeams'];

                      if (isset($_POST['team_name']) && (isset($_POST['player_names']))) {
                          $teamNames = $_POST['team_name'];
                          $playerNames = $_POST['player_names'];
                          generate($pdo, $selectedArea, $selectedFancyDress, $selectedGame, $selectedRules, $teamNames, $playerNames); // If all necessary data gathered, generate game
                          
                      } else {
                          enterTeams($noOfTeams, $selectedArea, $selectedRules, $selectedFancyDress, $selectedGame); // Show team creation section if not set yet
                      }
                      
                  } else {
                      noOfTeams($selectedArea, $selectedRules, $selectedFancyDress, $selectedGame); // Only called for pub golf
                  }
              }
              
          } else {
              selectFancyDressOn($selectedArea, $selectedGame); // Show fancy dress selection if not set
          }
          
      } else {
          selectGame($selectedArea); // Show game selection if not set
      }
      
  } else {
      selectArea($pdo); // Show area selection if not set
  }
  
} catch (PDOException $e) {
  exit("PDO Error: " . $e->getMessage() . "<br>");
}

// Displays dropdown of city areas pulled from database
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
        
        // Hidden inputs like shown above used throughout program to retain data between form submissions     
}

// Displays simple yes/no dropdown for if user wants fancy dress or not
function selectFancyDressOn($selectedArea, $selectedGame) {
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Fancy Dress On/Off</label>
        <select name='selectedFancyDress' required=true>
        <option value=''></option>
        <option value='On'>On</option>
        <option value='Off'>Off</option>
        </select>
        <input type='hidden' name='selectedArea' value='$selectedArea'>
        <input type='hidden' name='selectedGame' value='$selectedGame'>
        <input type='submit' value='Next'>
        </form>"; 
}

// Displays simple yes/no dropdown for if user wants rules or not
function selectRulesOn($selectedArea, $selectedGame, $selectedFancyDress) {
  echo "<form action='Pubathon.php' method='post'>
        <label>Select Rules On/Off</label>
        <select name='selectedRules' required=true>
        <option value=''></option>
        <option value='On'>On</option>
        <option value='Off'>Off</option>
        </select>
        <input type='hidden' name='selectedArea' value='$selectedArea'>
        <input type='hidden' name='selectedGame' value='$selectedGame'>
        <input type='hidden' name='selectedFancyDress' value='$selectedFancyDress'>
        <input type='submit' value='Next'>
        </form>"; 
}

///Function for choosing number of teams for pub golf - max of 8 but can change this if needed
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

// Allows user to create teams
// Can enter team name and players on each team
function enterTeams($noOfTeams, $selectedArea, $selectedRules, $selectedFancyDress, $selectedGame) {
    echo "<form action='Pubathon.php' method='post'>
          <label for='team_name'>Enter Team Names:</label><br>";
      
    for ($i = 1; $i <= $noOfTeams; $i++) {
        echo "Team $i: <input type='text' name='team_name[]' required><br>";
        echo "Enter players for Team $i (comma-separated): <input type='text' name='player_names[]'><br>";
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
function generate($pdo, $selectedArea, $selectedFancyDress, $selectedGame, $selectedRules, $teamNames, $playerNames) {
  $stmtPubs = $pdo->prepare("SELECT * FROM pubs WHERE area = :selectedArea ORDER BY RAND() LIMIT 9");
  $stmtPubs->execute(['selectedArea' => $selectedArea]);
  
  echo "<h2>Randomly Selected Pubs in $selectedArea:</h2>";
  
  // Pulls random fancy dress theme from database and displays to suer
  if ($selectedFancyDress == "On") {
    $stmtFancyDress = $pdo->prepare("SELECT * FROM fancyDress ORDER BY RAND() LIMIT 1");
    $stmtFancyDress->execute();
    $theme = $stmtFancyDress->fetchColumn();
    echo "<p>Fancy Dress Theme: $theme</p>";
  }
  
  // Pulls random rules/scores from database
  if ($selectedGame == "Pub Crawl" && $selectedRules == "On") {
    $stmtCrawlRules = $pdo->prepare("SELECT * FROM pubCrawlRules ORDER BY RAND() LIMIT 9");
    $stmtCrawlRules->execute();
    $crawlRules = $stmtCrawlRules->fetchAll();
  } else if ($selectedGame == "Pub Golf") {
    $stmtGolfScores = $pdo->prepare("SELECT * FROM pubGolfScores ORDER BY RAND() LIMIT 9");
    $stmtGolfScores->execute();
    $golfScores = $stmtGolfScores->fetchAll();
  }

  // Display game generated in table
  echo "<table border='1'>
        <tr>
        <th>Pub</th>
        <th>Name</th>
        <th>Address</th>";
      
  if ($selectedGame == "Pub Crawl" && $selectedRules == "On") {
    echo "<th>Pub Crawl Rules</th>";
  } else if ($selectedGame == "Pub Golf") {
    echo "<th>Drink</th>";
    echo "<th>Score</th>";
  }
        
  echo "</tr>";
   
  // Populates table with pubs and their addresses and rules for pub crawl/golf if selected earlier     
  $i = 1;
  foreach($stmtPubs as $row) {
    echo "<tr>
          <td>Pub " . $i  . "</td>
          <td>" . $row["name"] . "</td>
          <td>" . $row["address"] . "</td>";
    
    if ($selectedGame == "Pub Crawl" && $selectedRules == "On") {
      $randomRule = array_shift($crawlRules);
      echo "<td>" . $randomRule['rule'] . "</td>";
    } else if ($selectedGame == "Pub Golf") {
      $randomScore = array_shift($golfScores);
      echo "<td>" . $randomScore['drink'] . "</td>
            <td>" . $randomScore['score'] . "</td>";
    }
          
    echo "</tr>";
    $i += 1;
  }
  
  echo "</table>";
  
  // Shows created teams including name of team and players on each team
  echo "<h2>Teams:</h2>";
  echo "<ul>";
  foreach ($playerNames as $teamIndex => $players) {
      echo "<li>$teamNames[$teamIndex]: $players</li>";
  }
  echo "</ul>";
  
}

?>
</body>
</html>
