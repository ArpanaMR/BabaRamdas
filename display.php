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

<script>


  function relocate()
{
     location.href = "index.php";
} 

</script> 

</head>

<body>

<div>
  <?php
  
  //Delete record from the database
  if(isset($_GET['delete']))
  {
    $email=$_GET['delete'];
    $query= "DELETE FROM userdetails WHERE Email='$email'";
    $result = mysqli_query($conn,$query);
  }
  
  
  ?>
  </div>



  <div>

  <?php
  //Displaying data in table form
  $query = "SELECT * FROM userdetails"; 
  $result = mysqli_query($conn,$query);
?>

<div class="container">
<div class="row justify-content-center">
  <table class="table">
   <thead>
    <tr>
     <th>Full Name</th>
     <th>Email Address</th>
     <th>Mobile number</th>
     <th>Date Of Birth</th>
     <th>PinCode</th>
     
     <th>Delete</th>
    </tr>
   </thead>
   <?php
    while ($row=$result->fetch_assoc()):?>
   <tr>
    <td>
     <?php echo $row['Name']?>
    </td>

    <td>
     <?php echo $row['Email']?>
    </td>

    <td>
     <?php echo $row['Mobile']?>
    </td>

    <td>
     <?php echo $row['DOB']?>
    </td>
    <td>
     <?php echo $row['PinCode']?>
    </td>
    
    
   
    <td>
     <a href="display.php?delete=<?php echo $row['Email'];?>"class="btn btn-danger">Delete</a>
    </td>

   </tr>
   <?php endwhile; ?>
  </table>
</div>
</div>

<input type="button" class="btn btn-info mx-auto d-block" value="Add Data" onclick="relocate()">

   
    
</body>

</html>