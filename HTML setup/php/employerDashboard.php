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
SELECT semail, ts, remail, analysed, shortlisted,cname 
FROM employer
where cname =
(Select cname from employer where remail='$sessionemail')  
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"studentemail":"'  . $rs["semail"].'",';
    $outp .= '"remail":"'  . $rs["remail"].'",';
    if($rs["analysed"]==1)
        $outp .= '"analysed":"'   . "analysed". '",';
    else
            $outp .= '"analysed":"'   . "shortlisted". '",';
    $outp .= '"cname":"'   . $rs["cname"]. '",';
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