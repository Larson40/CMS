
<!DOCTYPE HTML>
<html>
<?php include '../header.php';?>

<body onload="setTimeout(ret_hm, 60000)">

  <div id="container">
  	<div id="header">
          	<h1>Tardy <span style="color:green">Tracker</span></h1>
    </div>
    <div>
      <h3>Enter your student ID number below.</h3>
    </div>

<form method="post" action="TL_action.php">
  <input type="text" name="SIDnum">
  <span class="error">* <?php echo $SIDnumErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit" class="button">
  <button type="button" onclick="Close_form()">Exit</button>
</form>


</body>
</html>
