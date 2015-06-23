<?php
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
	$sessionemail = $_SESSION['user']['email'];
$sql = "SELECT cname,ts, remail, analysed,shortlisted FROM employer where stemail='$sessionmail' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"cname":"'  . $rs["cname"].'",';
    $outp .= '"remail":"'  . $rs["remail"].'",';
    $outp .= '"analysed":"'   . $rs["analysed"]. '",';
    $outp .= '"shortlisted":"'   . $rs["shortlisted"]. '",';
    $outp .= '"ts":"'   . $rs["ts"]. '"}';
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