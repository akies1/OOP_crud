<?php
include 'Dbconnect.php';
$obj=new query();


if(isset($_POST['submit']))
{
	$data= array(
	
                "name"  => $obj->escape_string($_POST['name']),	
				"phone"  => $obj->escape_string($_POST['phone']),
                "email"  => $obj->escape_string($_POST['email']),
                "age"  => $obj->escape_string($_POST['age'])
                
	
	);

    
	
	
    $obj->insertData($data,'form');
	
	
	if($data)
	{
	echo 'insert successfully';
	header('location:display.php');
	}
	
else
	{
	echo 'try again' ;
	}
	
	
}


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="script.js"></script>
</head>
<body>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="container my-5">
        <h3>Crud Operations</h3>
        <div>
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" id="name">
            
        </div>
        <div class="form-group">
            <label for="phone">Mobile Number</label>
            <input type="text" class="form-control" name="phone" id="phone">
            
        </div>
        <div class="form-group">
            <label for="email">Enter Your email</label>
            <input type="email" class="form-control" name="email" id="email">
            
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="age" class="form-control" name="age" id="age">
        </div>
        <!-- <div class="form-group">
            <label for="file">Upload Image</label>
            <input type="file" class="form-control" name="files" id="files">
        </div> -->
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                <input type="reset" class="btn btn-secondary floating-btn" value="Reset">
                <button type="button" class="btn btn-info"><a href= "display.php" class="text-light">Display Records</a></button>
                    
            </div>
        </div>
    </div>
   
</form>
    
</body>
</html>