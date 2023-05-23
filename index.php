<?php
     include "config.php";
     $obj = new Model();

     //creat
     if(isset($_POST['submit'])){
          $obj->insertInfo($_POST);
     }

     //update
     if(isset($_POST['update'])){
          $obj->updateInfo($_POST);
     }

     //delete
     if(isset($_GET['deleteId'])){
          $obj->deleteInfo($_GET['deleteId']);
     }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
     <div class=" container px-5 ">
     <h2 class=" text-center text-dark">Php CRUD OPERATION WITH OOP</h2>
     <!-- create form  -->
     <?php
          if(isset($_GET['mes']) && $_GET['mes'] === 'ins'){
     ?>
          <div class="alert alert-success alert-dismissible fade show w-50 mx-auto" role="alert">
               <?php echo "Successfully inserted"; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     <?php          
          } elseif(isset($_GET['mes']) && $_GET['mes'] === 'upd'){
     ?>
          <div class="alert alert-warning alert-dismissible fade show w-50 mx-auto" role="alert">
          <?php echo "Successfully Updated"; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     <?php
          } elseif(isset($_GET['mes']) && $_GET['mes'] === 'del'){
     ?>
          <div class="alert alert-danger alert-dismissible fade show w-50 mx-auto" role="alert">
          <?php echo "Successfully delected"; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
     <?php
          }
     ?>
          <div>
          <?php
               //updateDisplay
               if(isset($_GET['editId'])){
                    $editId = $_GET['editId'];
                    $data = $obj->displayInfoById($editId);
          ?>
               <form action="index.php" method="post" class=" w-50 mx-auto">
                    <input type="hidden" name="updateId" id="" value="<?php echo $data['id']; ?>" class="form-control">
                    <div class=" mb-2">
                         <label for="" class="form-label">Name</label>
                         <input type="text" name="name" id="" value="<?php echo $data['name']; ?>" class="form-control" required>
                    </div>
                    <div class=" mb-2">
                         <label for="" class="form-label">email</label>
                         <input type="email" name="email" id="" value="<?php echo $data['email']; ?>" class="form-control" required>
                    </div>
                    <div>
                         <input type="submit" value="Update" class=" btn btn-success btn-sm" name="update">
                    </div>
               </form>
          <?php
               }else {
          ?>
                    <form action="index.php" method="post" class=" w-50 mx-auto">
               <div class=" mb-2">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" id="" class="form-control" required>
               </div>
               <div class=" mb-2">
                    <label for="" class="form-label" class="form-label">email</label>
                    <input type="email" name="email" id="" class="form-control" required>
               </div>
               <div>
                    <input type="submit" value="Save" class="btn btn-sm btn-dark" name="submit">
               </div>

          </form>
          <?php
               }
          ?>
          
          </div>
    
          <!-- display form  -->
          <div>
          <h3>Students lists</h3>
          <table class="table mt-2">
               <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
               </thead>
               <tbody>
               <?php
                    $data = $obj->displayInfo();
                    $count = 1;
                    if($data !== null){
                         foreach($data as $d){
               ?>
                    <tr>
                         <td><?php echo $count++ ?></td>
                         <td><?php echo $d['name'];?></td>
                         <td><?php echo $d['email'];?></td>
                         <td>
                              <a href="index.php?editId=<?php echo $d['id'];?>">Edit</a>
                                   <a href="index.php?deleteId=<?php echo $d['id'];?>">Delete</a>
                         </td>
                    </tr>
               <?php
                         }
                    }  
               ?> 

               </tbody>
          </table>
          </div>
     </div>
     
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>