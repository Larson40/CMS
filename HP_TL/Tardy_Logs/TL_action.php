<body onload="setTimeout(ret_hm, 30000)">
<?php
include '../header.php';
// define variables and set to empty values
$SIDnumErr = "";
$SIDnum = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["SIDnum"])) {
    $SIDnumErr = "Student ID number is required";
  } else {
    $SIDnum = test_input($_POST["SIDnum"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include 'use_TL.php';

?>
</body>
