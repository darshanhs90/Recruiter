<?php 
    require("../config.php");
    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { die("Invalid E-Mail Address"); }
        if(empty($_POST['password'])) 
        { die("Please enter a password."); } 
         
         
        // Check if the username is already taken
/*        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
        $query_params = array( ':username' => $_POST['email'] ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row){ die("This email is already in use"); }*/ 
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 
        $row = $stmt->fetch(); 
        if($row){ die("This email address is already registered"); } 
         
        // Add row to database 
        $query = " 
            INSERT INTO users ( 
                fname,
                lname,
                pnumber,
                univname,
                companyname,
                resumelink,
                stud_rec,
                email, 
                password, 
                salt 
            ) VALUES ( 
                :fname,
                :lname,
                :pnumber,
                :univname,
                :companyname,
                :resumelink,
                :stud_rec,
                :email, 
                :password, 
                :salt 
            ) 
        "; 
        
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $_POST['password'] . $salt); 
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
        $query_params = array( 
            ':fname' => $_POST['fname'], 
            ':lname' => $_POST['lname'], 
            ':pnumber' => $_POST['pnumber'], 
            ':univname' => $_POST['univname'], 
            ':companyname' => $_POST['companyname'], 
            ':resumelink' => $_POST['resumelink'], 
            ':stud_rec' => $_POST['stud_rec'], 
            ':email' => $_POST['email'], 
            ':password' => $password, 
            ':salt' => $salt 
        ); 
         
        try {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
            } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 

        if(!empty($_POST['companyname'])) 
        {
        $query = "
                INSERT INTO companies 
                (cname)
                    SELECT * FROM (SELECT :cname) AS tmp
                        WHERE NOT EXISTS (
                    SELECT cname FROM companies WHERE cname = :cname
                ) LIMIT 1";
        $query_params = array( 
            ':cname' => $_POST['companyname'] 
            
        );
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 

        $query = "
                UPDATE users 
            SET cid = (Select cid from companies where cname=:cname)
            WHERE companyname = :cname";
        
        $query_params = array( 
            ':cname' => $_POST['companyname'] 
            
        );
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());}
    }
        header("Location: ../login.php"); 
        die("Redirecting to ../login.php"); 
    } 
?>