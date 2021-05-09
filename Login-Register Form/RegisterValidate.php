

<?php 

session_start();
error_reporting(E_ERROR);
define('DB_SERVER_NAME','localhost');
define('DB_USER_NAME','root');
define('DB_PASSWORD','');

$conn = mysqli_connect("DB_SERVER_NAME","DB_USER_NAME","DB_PASSWORD");
mysqli_select_db($connection, 'loginform');

if(!$conn){
die('An error happened'.mysql_error());
}

$sql = "CREATE DATABASE loginform";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

var_dump($_POST);
echo"haiiiii";
 if (isset($_POST['submit'])){
 
 $name=$_POST['name'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $confirmPassword=$_POST['confirmpassword'];

 	if ($password==$confirmpassword){
   
   		$sql = "SELECT id FROM users WHERE email='$email' and password='$password'";
		$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){

				echo "Account Already Exists!";
			}
        	else{

               $sql="INSERT INTO users (name,email,password) Values ('$name','$email','$password')";
               $reg = mysqli_query($conn, $sql);

              	 if ($conn->query($sql) === TRUE) {
  						echo "New record created successfully";
					} else {
                         echo "Error: " . $sql . "<br>" . $conn->error;
}

        	}

 	}
 }



?>
