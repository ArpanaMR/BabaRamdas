<?php
require_once("connect.php");

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/style1.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Baba Ramdas Memorial Senior Secondary School</title>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--Sweet alert notification-->
<script>
function success(){
    Swal.fire({
  title: 'Congrats!',
  text: 'You are successfully registered!',
  icon: 'success',
    });
}

function Mobile(){
    Swal.fire({
  title: 'Sorry!',
  text: 'The Mobile number is already registered!',
  icon: 'info',
  button:'Okay',
  timer:5000,
    });
}

function Email(){
    Swal.fire({
  title: 'Already Registerd!',
  text: 'You are already registered!',
  icon: 'info',
  button:'Okay',
  timer:7000,
    });
}

function relocate()
{
     location.href = "display.php";
} 
</script>     

<style>
  html, body { height:100%}
  body{
    background:url(image.png);
    background-repeat: no-repeat;
    background-size:300px 300px;
    background-position:50% 110%;
    
  }

  .container{
    background:#e1ad01;
    
  }

  @media (max-width:590px){
    Body{
    background:none;
    }
}
  </style>
</head>


<body>

<div>
  <?php
  
  if(isset($_POST['regbtn']))
  {
    $name=$_POST['name'];
    $DOB=$_POST['DOB'];
    $pin=$_POST['pin'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];


   $query= "SELECT * FROM userdetails WHERE Email='$email'";
   $query1="SELECT * FROM userdetails WHERE Mobile='$mobile'";
    $result = mysqli_query($conn,$query);
    $result1= mysqli_query($conn,$query1);
 $count = mysqli_num_rows($result);
$cnt = mysqli_num_rows($result1);
if ($count>0) {

 echo '<script type="text/javascript">Email();</script>';
  } 

  elseif($cnt >0)
  {
    echo '<script type="text/javascript">Mobile();</script>';
  }
  
  else{
    $sql = "INSERT INTO userdetails(Name,Email,Mobile,DOB,PinCode) VALUES ('$name','$email','$mobile','$DOB','$pin')";
    
    if ($conn->query($sql) === TRUE) {
      echo '<script type="text/javascript">success();</script>';
     
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } 
    $conn->close();
  }
  ?>

</div>

<form action="index.php" method="post">
  <div class="container" style="align:center;">
    <h2 style="text-align: center;">Register</h2>
    <hr>
    
    <div class="form-group row">              
    <label for="name" class="col-12 col-sm-3  col-form-label "><b>Fullname</b></label>
    <div class="col-12 col-sm-9">
    <input type="text" placeholder="Enter Fullname" name="name" class="form-control"  required>
</div>
    </div>
   
    <div class="form-group row">
    <label for="email" class="col-12 col-sm-3  col-form-label "><b>Email</b></label>
    <div class="col-12 col-sm-9">
    <input type="email" placeholder="Enter Email" name="email" id="email" pattern='^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$' title='please enter correct email address' class="form-control"  required>
    </div>
</div>

    <div class="form-group row">
    <label for="mobile" class="col-12 col-sm-3  col-form-label "><b>Mobile No.</b></label>
    <div class="col-12 col-sm-9">
    <input type="tel" placeholder="Enter your Mobile number" name="mobile" id="mobile" pattern="[0-9]{10}"title='please enter 10 digit mobile number' class="form-control"  required>
</div>
</div>

<div class="form-group row">
    <label for="DOB" class="col-12 col-sm-3  col-form-label"><b>Date of birth</b></label>
    <div class="col-12 col-sm-9">
    <input type="date" name="DOB" id="DOB" class="form-control"  required>
</div>
</div>

<div class="form-group row">
    <label for="pin" class="col-12 col-sm-3  col-form-label "><b>Enter Pincode</b></label>
    <div class="col-12 col-sm-9">
    <input type="int" name="pin" id="pin" pattern="[0-9]{6}"title='please enter 6 digit pincode' class="form-control"  required>
</div>
</div>

<div class="form-group row">
    <button type="submit" class="btn btn-primary mx-auto d-block" name="regbtn">Register</button>
</div>

</div>

</form>

<input type="button" class="btn btn-info mx-auto d-block" value="Show Data" onclick="relocate()">

</body>
</html>
