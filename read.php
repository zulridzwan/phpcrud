<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";
    
    //if($stmt = mysqli_prepare($link, $sql)){
    if($stmt = $link->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        //mysqli_stmt_bind_param($stmt, "i", $param_id);
        $stmt->bindParam(1, $param_id, PDO::PARAM_INT);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        //if(mysqli_stmt_execute($stmt)){
        if($stmt->execute()){
            //$result = mysqli_stmt_get_result($stmt);
            $result = $stmt->fetchAll();
    
            //if(mysqli_num_rows($result) == 1){
            if(count($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $row = $result[0];
                
                // Retrieve individual field value
                $name = $row["NAME"];
                $address = $row["ADDRESS"];
                $salary = $row["SALARY"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    //mysqli_stmt_close($stmt);
    $stmt->closeCursor(); //PDO close
    
    // Close connection
    //mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $name; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $address; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <p class="form-control-static"><?php echo $salary; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>