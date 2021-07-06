<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("Location:index.php");
	}
	$con = mysqli_connect("localhost","root","","online_exam_system");
	$sql = "SELECT * FROM chat ORDER BY ID ASC";
	$result = mysqli_query($con,$sql);
	mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h1>Message</h1>

<form action=""> 
<select name="customers" onchange="showCustomer(this.value)">
<option value="">Message:</option>
<?php
	while($row = mysqli_fetch_array($result))
	{
		echo '<option value="'.$row['ID'].'">'.$row["ID"].'</option>';
	}
?>
</select>
</form>
<br>
<div id="txtHint">Customer info will be listed here...</div>

<script>

function showCustomer(str) {
  var xhttp;   
'alert(str);  '
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getmessage.php?q="+str, true);
  xhttp.send();
}
</script>

</body>
</html>
