<?php
session_start();
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

$sql = "SELECT * FROM Larson_Test WHERE SIDnum = $SIDnum";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<h2>Hello " . $row["SFname"]. " " . $row["SLname"]. "!<Br><Br> You have " . $row["Hpass"]. " hall passes, and " . $row["Tardy"]. " tardies.<br></h2>";
    $Hpass = intval($row['Hpass']);
    $Tpass = intval($row['Tardy']);
    $_SESSION['pass'] = $Hpass;
    $_SESSION['tardy'] = $Tpass;
  }
} else {
  echo "<h2 style='color: red;'>Incorrect ID number.<Br>Please try again, or return to your seat.</h2>";
  echo "<button type='button' onclick='try_again()' class='yellow'> Try Again </button>";
  $WID=1000;
}

$_SESSION['SIDnum'] = $SIDnum;

$conn->close();

if ($WID==1000) {
  echo " ";
}
elseif ($Hpass>0 && $Tpass<10) {
  echo "<button type=\"button\" onclick=\"upd_pass()\"> Use a Hall Pass </button>";
}
elseif ($Hpass<=0 && $Tpass<5) {
  echo "<h2 style='color: red;'>You do not have any Hall Passes Left.<Br>If you choose to leave you will be<Br>marked tardy for this class.<Br></h2>";
  echo "<button type='button' onclick='upd_pass()' class='yellow'> Use a Hall Pass </button>";
}
elseif ($Hpass<=0 && $Tpass>=5) {
  echo "<h2 style='color: red;'>You have too many tardies!<Br>Please return to your seat.</h2>";
}
elseif ($Tpass>=10) {
  echo "<h2 style='color: red;'>You have too many tardies!<Br>Please return to your seat.</h2>";
}

?>
<button type="button" onclick="Close_form()"> Exit </button>
