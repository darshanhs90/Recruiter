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
}else{


if(true){
	$sessionemail = $_SESSION['user']['email'];
$sql = "
SELECT stemail, ts, remail, analysed, shortlisted 
FROM employer
where cname =
(Select cname from employer where remail='$sessionemail')  
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$outp = "[";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"studentemail":"'  . $rs["stemail"].'",';
    $outp .= '"remail":"'  . $rs["remail"].'",';
    $outp .= '"analysed":"'   . $rs["analysed"]. '",';
    $outp .= '"shortlisted":"'   . $rs["shortlisted"]. '",';
    $outp .= '"ts":"'   . $rs["ts"]. '"}';
    }
$outp .="]";
echo($outp);
}
else {
    echo "0 results";
}
if($_POST['shortlist']=='1'){


    $data = json_decode(file_get_contents("php://input"));
    $stemail = mysqli_real_escape_string($conn,$data->stemail);
    $sql = "UPDATE `employer` SET `shortlisted`='1',`analysed`='0' WHERE stemail='$sessionemail'";
    $result = $conn->query($sql);
    echo "Update Successful";

}else if($_POST['shortlist']=='0'){
$data = json_decode(file_get_contents("php://input"));
    $stemail = mysqli_real_escape_string($conn,$data->stemail);
    $sql = "UPDATE `employer` SET `shortlisted`='0', `analysed`='0' WHERE stemail='$sessionemail'";
    $result = $conn->query($sql);
    echo "Update Successful";
}

} 
$conn->close();
exit();
}

?>