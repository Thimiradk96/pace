<?php

$servername="localhost";
$username="root";
$password="";
$dbname="pace_web_class";

$con=new mysqli($servername,$username,$password,$dbname);

if(mysqli_connect_error())
  {
    echo "=========Failed to connect to MY SQL: " .mysqli_connect_error();
    
  } else{
    
    echo "========= connected ==========" . "<br>";
    
  }

     
    $sqlSelectStudentInfo="SELECT student_id, name, email FROM student_info";

    $result = mysqli_query($con,$sqlSelectStudentInfo);
/*    
    while($row = mysqli_fetch_assoc($result)){
        echo $row["student_id"] . "<br>";
        echo $row["name"] . "<br>";
        echo $row["email"] . "<br>";
    }
*/
?>

<?php

    $name=$_GET["Name"];
    $email=$_GET["Email"];

if(($name!="") && ($email!="")){
    
    $sqlInsertStudentInfo="INSERT INTO student_info(name, email) VALUES ('" . $name . "' , '". $email . " ')";
    
    if ($con->query($sqlInsertStudentInfo) === TRUE) {
       echo "New student information inserted successfully";
     } else {
       echo "Error: " . $sqlInsertStudentInfo . "<br>" . $conn->error;
     }
     
}

?>

<html>
    <head>
        
        <link rel="stylesheet" type="text/css" href="style1.css"/>
        
        <title>Quick Registration</title>
        
    </head>
    <body>
      <h1>Thank you!</h1>    
        
<?php
        

?>
    <p>
        Thank you for registering with us.
    </p>
        
       <table>
           
           <tr><th>Student id</th><th>Name</th><th>Email</th></tr>
           
 <?php          
         while($row = mysqli_fetch_assoc($result)){
 ?>
           <tr><td><?php echo $row["student_id"] ?></td><td><?php echo $row["name"] ?></td><td><?php echo $row["email"] ?></td></tr>
 
 <?php 
     
         }
 ?>
       
        </table>    
        
</body>
</html> 




























