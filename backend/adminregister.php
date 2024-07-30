<?php
  $insert = false;
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $_server="localhost";
  $_username ="root";
  $_password = "";
  
  $con = mysqli_connect($_server , $_username , $_password);
       if(!$con){
          die("database connection due to failed" . mysqli_connect_error());
       }
    
       $name = $_POST['name'];
       $email = $_POST['email'];
       $password= $_POST['password'];
       $con_passwo = $_POST['con_passwo'];

       $ExistSql = "SELECT * FROM `medical_products`.`adminregister`` WHERE name = '$name'";
       $result = mysqli_query($con,$ExistSql);
       $numExistRows = mysqli_num_rows($result);

       if( $numExistRows >0){
        echo '<script>alert("username already exist")</script>';
        
        
    }
       else{
       if($password == $con_passwo){

        $hash= password_hash($password,PASSWORD_DEFAULT);
         $sql ="INSERT INTO `medical_products`.`adminregister` ( `name`, `email`, `password`, `con_passwo`) VALUES ('$name', '$email', '$hash', '$con_passwo')";
  
         $result = mysqli_query($con,$sql);
  
         if($result){
           $insert=true;
             echo '<script>
             
            
            alert("Registration Successfully . Now you can login");
            </script>';


           header("location: /ONLINE_MEDICAL_STORE/adminlogin.html");
         }
        }
        else{
          echo '<script>alert("password do not match")</script>';
        }
    }
      }
  ?>