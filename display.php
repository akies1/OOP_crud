<?php
include 'Dbconnect.php';
if(!empty($_GET['delid'])) 
{ 

//something new
//sbdvhsdguljabuivkbadfh
//nsdbhvbsh
//something jabhfvlsvjhadlfvbfdvbh
$id=$_GET['delid']; 


$crud= new query(); 
$crud->deleteData('form',$id); 
header('location:display.php');
} 


?>
<!DOCTYPE html> 
 <html lang="en"> 
 <head> 
   <title>Listing</title> 
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
 </head> 
<body> 
    <div class="container my-5">
    <button type="button" class="btn btn-info"><a href= "create.php" class="text-light">Add New</a></button> 
    </div>
   
  <div class="container"> 
        
    <table class="table table-striped"> 
      <thead> 
        <tr> 
        <th>id</th> 
          <th>Name</th> 
          <th>Mobile</th> 
          <th>Email</th> 
          <th>age</th> 

                          <th>Edit</th> 
                          <th>delete</th> 
        </tr> 
      </thead> 
      <tbody> 
      <?php 
      $crud= new query();
      $result=$crud->getData('form');
      
      while($data = mysqli_fetch_array($result)) 
      { 
      ?> 
              
      <tr> 
      <td><?php echo $data['id']; ?></td> 
      <td><?php echo $data['name']; ?></td> 
      <td><?php echo $data['phone']; ?></td> 
      <td><?php echo $data['email']; ?></td>
      <td><?php echo $data['age']; ?></td> 
      <td>
                              <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Edit
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
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

    </td>


          <td><a href="display.php?delid=<?php echo $data['id'];?>">delete</td> 
        </tr> 
              <?php } ?> 
      </tbody> 
    </table> 
  </div> 
   
</body> 
 </html> 
   <script>
      $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>  
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
