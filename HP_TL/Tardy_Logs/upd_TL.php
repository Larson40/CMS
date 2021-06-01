
<?php include '../header.php';?>

<body onload="setTimeout(ret_hm, 30000)">
<?php
session_start();
$SIDnum = $_SESSION['SIDnum'];
$Hpass = $_SESSION['pass'];
$Tpass = $_SESSION['tardy'];

if ($Tpass<5) {
  echo "<body class='green'>";
}
elseif ($Tpass==5) {
  echo "<body class='yellow'>";
}
else {
  echo "<body class='orange'>";
}

  $UpT = $Tpass + 1;

$servername = "localhost";
$username = "DB_user";
$password = "Secret";
$dbname = "HP_TL";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($Tpass<=5){
  $sql = "UPDATE Larson_Test SET Tardy=$UpT WHERE SIDnum=$SIDnum";
}
else {
  $sql = "UPDATE Larson_Test SET Tardy=$UpT WHERE SIDnum=$SIDnum";
}

if (mysqli_query($conn, $sql) && $Tpass<5) {
 echo "<h2><Br>You have been marked tardy!<Br>Please go to your seat quietly and begin working.<Br><Br></h2>";
}
elseif (mysqli_query($conn, $sql) && $Tpass==5) {
 echo "<h2><Br>You have been marked tardy!<Br>Your parents will be contacted on your next tardy!<Br>Please go to your seat quietly and begin working.<Br><Br></h2>";
}
elseif (mysqli_query($conn, $sql) && $Tpass>5) {
 echo "<h2><Br>You have been marked tardy!<Br>Your parents will be contacted at the end of the day!<Br>Please go to your seat quietly and begin working.<Br><Br></h2>";
}
else {
  echo "Error updating record: " . mysqli_error($conn);
}
$conn->close();
?>

<button type="button" onclick="Close_form()" class="buttonB"> Exit </button>
</body>
