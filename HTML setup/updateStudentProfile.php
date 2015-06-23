<?php 
    require("config.php");
    var_dump($_POST);
    if(!empty($_POST)) 
    { 
    $conn = new mysqli($host, $username, $password, $dbname);
    var_dump($_POST);
        // Add row to database 
        $query = ' 
            Update 
              users1  
                set fname=:fname,
                set lname=:lname,
                set univname=:univname,
                set resumelink=:resumelink,
                set stud_rec=:stud_rec, 
                set password=:password, 
                set salt=:salt 
             where 
                email=:email '; 
         
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $_POST['password'] . $salt); 
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
        $query_params = array( 
            ':fname' => $_POST['fname'], 
            ':lname' => $_POST['lname'], 
            ':univname' => $_POST['univname'], 
	        ':resumelink' => $_POST['resumelink'], 
            ':stud_rec' => $_POST['stud_rec'], 
            ':email' => $_POST['email'], 
            ':password' => $password, 
            ':salt' => $salt 
        ); 
        try {  
            $stmt = $conn->prepare($query);
            $result = $stmt->execute($query_params); 
            echo "Updated";
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        header("Location: studentProfile.php"); 
        die("Redirecting to studentProfile.php"); 
    }
     
?>