<?php
$mysqli = new mysqli("localhost", "root", "", "online_exam_system");
if($mysqli->connect_error) {
  exit('Could not connect');
}
$con = mysqli_connect("localhost","root","","online_exam_system");
$query = "UPDATE chat SET Seen=0 WHERE Seen=1";
mysqli_query($con,$query);
$sql = "SELECT Mail,Text
FROM chat WHERE ID = ?";
mysqli_close($con);

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname);
$stmt->fetch();
$stmt->close();
echo "<form action='sent.php' method='POST'>";
echo "<table>";
echo "<tr>";
echo "<th>From</th>";
echo "<td><h1>". $cid . "</h1><input type='hidden' name='mail' value='$cid'</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Message</th>";
echo "<td>" . $cname . "</td>";
echo "</tr>";
echo "<th>Reply</th>";
echo "<td><input type='text' name='reply'></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2'><input type='submit' name='send'></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
?>
