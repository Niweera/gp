<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with password) */
session_start();
$conn = mysqli_connect("localhost", "root", "srilanka", "hmsdb");
if (isset($_SESSION['patientid'])){
    $clinicno = $_SESSION['patientid'];

    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    if(isset($_REQUEST["term"])){
        // Prepare a select statement
        
        $sql = "SELECT DISTINCT LEFT(date,10) AS date FROM prescription WHERE clinicno = '$clinicno' AND date LIKE ? LIMIT 7";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_term);
            
            // Set parameters
            $param_term = $_REQUEST["term"] . '%';
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                
                // Check number of rows in the result set
                if(mysqli_num_rows($result) > 0){
                    // Fetch result rows as an associative array
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo "<p>" . $row["date"] . "</p>";
                    }
                } else{
                    echo "<p>No matches found</p>";
                }
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
}else{
    echo "<p>No records found</p>";
}
// close connection
mysqli_close($conn);

//This vrd-search.php file is for view patient medical records 
?>

