<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$affiche = $titre = $resume = "";
$affiche_err = $titre_err = $resume_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["affiche"]);
    if(empty($input_name)){
        $affiche_err = "Please enter a name.";
    }  else{
        $affiche = $input_affiche;
    }
    
    // Validate address address
    $input_address = trim($_POST["titre"]);
    if(empty($input_address)){
        $titre_err = "Please enter an address.";     
    } else{
        $titre = $input_titre;
    }
    
    // Validate salary
    $input_salary = trim($_POST["resume"]);
    if(empty($input_salary)){
        $resume_err = "Please enter the salary amount.";     
    }  else{
        $resume = $input_resume;
    }
    
    // Check input errors before inserting in database
    if(empty($affiche_err) && empty($titre_err) && empty($resume_err)){
        // Prepare an update statement
        $sql = "UPDATE films SET affiche=?, titre=?, resume=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_affiche, $param_titre, $param_resume, $param_id);
            
            // Set parameters
            $param_affiche = $affiche;
            $param_titre = $titre;
            $param_resume = $resume;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM films WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["affiche"];
                    $address = $row["titre"];
                    $salary = $row["resume"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($affiche_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $affiche; ?>">
                            <span class="invalid-feedback"><?php echo $affiche_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($titre_err)) ? 'is-invalid' : ''; ?>"><?php echo $titre; ?></textarea>
                            <span class="invalid-feedback"><?php echo $titre_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($resume_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $resume; ?>">
                            <span class="invalid-feedback"><?php echo $resume_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>