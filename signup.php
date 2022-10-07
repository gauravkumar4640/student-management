<?php
include('config/constant.php ');
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	
</head>
<style>
    body {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
	

    background-image: url('assets/img/1.jpg');
 
}

img {
  width: 200px;
  height: 300px;
  object-fit: cover;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	width: 450px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}

h2 {
	text-align: center;
	margin-bottom: 40px;
}

input {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 5px;
	margin:0 auto;
	border-radius: 5px;
}
label {
	color: #888;
	font-size: 15px;
	padding: 10px;
}

button {
	float: right;
	background: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
button:hover{
	opacity: .7;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
	text-align: center;
	color: #fff;
}

a {
	float: right;
	background: #555;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
	text-decoration: none;
}
a:hover{
	opacity: .7;
}

.success{
    color:rgb(51, 88, 13);
    font-weight: bold;
    text-align:center;
    
}


</style>
<body>
    

         <?php
     
if(isset($_SESSION['login']))
{
        echo $_SESSION['login'];
unset($_SESSION['login']);
}
if(isset($_SESSION['match']))
{
        echo $_SESSION['match'];
unset($_SESSION['match']);
}



if(isset($_SESSION['no-login-message']))
{
        echo $_SESSION['no-login-message'];
unset($_SESSION['no-login-message']);
}
         ?>
          <form action=""method="POST"> 
            	<h2><b>SIGN UP</b></h2>
        

                <label>Full Name</label>
     	<input type="text" name="fullname" placeholder="full Name" required>

     	<label>Email</label>
     	<input type="email" name="email" placeholder="email" required>
         <label>Contact Number</label>
     	<input type="number" name="number" required>
         <label>User Name</label>
     	<input type="text" name="username" placeholder="User Name">
         <label>User Password </label>
     	<input type="password" name="password" placeholder="password">
     	<label>Confirm User Password </label>
     	<input type="password" name="cpassword" placeholder="password"><br>
             <input type="submit" class="submit" name="submit" value="Signup" class="btn-login btn btn-sm">
 
 
         </form>
</body>
</html>

<?php 

if(isset($_POST['submit']))
{
  $fullname=$_POST['fullname'];
  $email=$_POST['email'];
  $number=$_POST['number'];
  $username=$_POST['username'];
 
 

  $raw=md5($_POST['password']);
  $password=mysqli_real_escape_string($conn,$raw);
  $raw=md5($_POST['cpassword']);
  $cpassword=mysqli_real_escape_string($conn,$raw);


  $sql="INSERT INTO signupuser SET
  fullname='$fullname',
  email='$email',
  number='$number',
  username='$username',
  password='$password',
  cpassword='$cpassword'
  ";
  $res=mysqli_query($conn,$sql);
  if($res==true){
      //echo"inserted";
      if($password==$cpassword){
        header("location:".SITEURL.'login.php');

      }
      if($password!=$cpassword){
        $_SESSION['match']="<div class='error'>Confirm Password did not match</div>";
        header("location:".SITEURL.'signup.php');

      }
     

     
      }
      else
      {
      // echo"failed ";
      $_SESSION['add']="<div class='error'>Failed to create account</div>";
      header("location:".SITEURL.'signup.php');
      }
      }
          
      ?>
  