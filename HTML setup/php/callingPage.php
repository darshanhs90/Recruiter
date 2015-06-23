<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$servername = "localhost";
$username = "root";
$password = "";
$dbname="ibmhack";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "Database Connection Error";
}
if(true){
	$sessionemail = $_SESSION['user'];
$sql = "
Select fname, lname, pnumber, voicelink,resumelink, email from users where email in
 (Select semail from employer where shortlisted='0' and cname=(Select cname from employer where remail='$sessionemail'))  
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"fname":"'  . $rs["fname"].'",';
    $outp .= '"lname":"'  . $rs["lname"].'",';
    $outp .= '"pnumber":"'   . $rs["pnumber"]. '",';
    $outp .= '"resumelink":"'   . $rs["resumelink"]. '",';
    $outp .= '"remail":"'   . $sessionemail. '",';
    $outp .= '"voicelink":"'   . $rs["voicelink"]. '",';
    $outp .= '"email":"'   . $rs["email"]. '"}';
    }
$outp .="]";
echo($outp);
} else {
    echo "0 results";
}
$conn->close();
exit();
}

?>