// commit test

// second commit test

// third commit test

<!DOCTYPE html>
<html lang='en-GB'>
<head>
<title>PHP 02C</title>
</head>
<body>
<h1>Types and Type Casting</h1>
<?php
error_reporting( E_ALL );
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
echo "<h2>Types and Type Casting</h2>\n";
$mode = rand(1,4);
if ($mode == 1)
$randvar = rand();
elseif ($mode == 2)
$randvar = (string) rand();
elseif ($mode == 3)
$randvar = rand()/(rand()+1);
else
$randvar = (bool) $mode;
echo "Random scalar: $randvar<br>\n";
?>
</body>
</html>