<?php
include 'Dbconnect.php';


$id=$_GET['editid']; 

$obj=new query();
$data=$obj->selectbyid('form',$id);



if(isset($_POST['submit']))
{
	$data= array(
	
        "name"  => $obj->escape_string($_POST['name']),	
        "phone"  => $obj->escape_string($_POST['phone']),
        "email"  => $obj->escape_string($_POST['email'])
	
	);
    
	  $obj->updateData($data,'form',$id);
	
	
	if($data)
	{
	echo 'updated successfully';
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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<form method="POST" action="" enctype="multipart/form-data">
    <div class="container my-5">
        <h3>Crud Operations</h3>
        <div>
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $data['name'];?>">
            
        </div>
        <div class="form-group">
            <label for="phone">Mobile Number</label>
            <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $data['phone'];?>">
            
        </div>
        <div class="form-group">
            <label for="email">Enter Your email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $data['email'];?>">
            
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
            
            </div>
        </div>
    </div>
   
</form>

      </div>
      
    </div>
  </div>
</div>
  <script>
      $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>  
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


</body>
</html>