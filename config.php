<?php
     class Model 
     {
          private $servername = "localhost";
          private $username = "root";
          private $password = "";
          private $dbname = "php-crud2";
          private $conn;

          function __construct(){
               $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
               if($this->conn->connect_error){
                    echo "Error";
               }else {
                    return $this->conn;
               }
          }

          //creat
          public function insertInfo($post){
               $name = $post['name'];
               $email = $post["email"];
               $sql = "INSERT INTO students(name,email) VALUES('$name', '$email')";
               $result = $this->conn->query($sql);
               if($result){
                    header('location:index.php?mes=ins');
               }
          }
          //read
          public function displayInfo(){
               $sql = "SELECT * FROM `students`";
               $result = $this->conn->query($sql);
               if($result->num_rows > 0){
                    while($rows = $result->fetch_assoc()){
                         $data[] = $rows;
                    }
                    return $data;
               }
           
          }
          //show info to update
          public function displayInfoById($editId){
               $sql = "SELECT * FROM `students` WHERE id='$editId'";
               $result = $this->conn->query($sql);
               if($result->num_rows > 0){
                    $data = $result->fetch_assoc();
               }
               return $data;
          }
          //update
          public function updateInfo($request){
               $name = $request['name'];
               $email = $request['email'];
               $id = $request['updateId'];
               $sql = "UPDATE `students` SET `name`='$name',`email`='$email' WHERE id = '$id'";
               $result = $this->conn->query($sql);
               if($result){
                    header('location:index.php?mes=upd');
               }
          }

          //Delete
          public function deleteInfo($id){
               $sql = "DELETE FROM `students` WHERE id = '$id'";
               $result = $this->conn->query($sql);
               if($result){
                    header('location:index.php?mes=del');
               }
          }
     }

?>