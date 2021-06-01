
<?php include '../header.php';?>

<?php
session_start();
$SIDnum = $_SESSION['SIDnum'];
$Hpass = $_SESSION['pass'];
$Tpass = $_SESSION['tardy'];

if ($Hpass>0) {
  echo "<body class='green'>";
  $Upass = $Hpass - 1;
}
else {
  echo "<body class='yellow'>";
  $UpT = $Tpass + 1;
}

$servername = "localhost";
$username = "Hp_Tl";
$password = "Secret";
$dbname = "HP_TL";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($Hpass>0){
  $sql = "UPDATE Larson_Test SET Hpass=$Upass WHERE SIDnum=$SIDnum";
}
else {
  $sql = "UPDATE Larson_Test SET Tardy=$UpT WHERE SIDnum=$SIDnum";
}

if (mysqli_query($conn, $sql) && $Hpass>0) {
 echo "<h2><Br>Please grab the hall or bathroom pass!<Br>You may now leave the classroom.<Br><Br></h2>";
}
elseif (mysqli_query($conn, $sql) && $Hpass<=0) {
 echo "<h2><Br>You have been marked tardy!<Br>Please grab the hall or bathroom pass!<Br>You may now leave the classroom.<Br><Br></h2>";
}
else {
  echo "Error updating record: " . mysqli_error($conn);
}
$conn->close();
?>

<button type="button" onclick="Close_form()" class="buttonB"> I have returned! </button>
</body>
