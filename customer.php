<!DOCTYPE html>
<html>
<head>
<title>Customers</title>
</head>
<style>
body{
  background-image: url("customer.jpg");
    background-repeat: no-repeat;
    background-size: cover;
  }

table {
  margin: 0 auto;
  font-size: large;
  border: 1px solid black;
  background-color:#D3D3D3;
   }
  
h2 {
  text-align: center;
  color: salmon;
  font-size: 50px;
  font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
  }

  
th,td {
    font-weight: bold;
    font-size:20px;
    color:black;
    border-collapse: collapse;
    border:1px solid black;
    padding: 10px;
    text-align: center;
  }
td {
    font-weight: lighter;
    color:black;
    
    
  }

.homeicon {
  width: 90px;
  background-color: #555;
}

.homeicon a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}

.homeicon a:hover {
  background-color: #000;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}


</style>
<body>
    <section>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
    include 'connection.php';
    $sql = "SELECT * FROM customer";
    $result = mysqli_query($conn, $sql);
    ?>
<div class="homeicon">
  <a href="index.php"><i class="fa fa-home"></i></a>
</div>
<div class="container">
 <h2 style="color:black"><center>Customers</center></h2>
<table align="center">

    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Phone Number</th>
      <th>Email Id</th>
      <th>Account Number</th>
      <th>Account Balance</th>
    </tr>
<?php
     while ($rows = mysqli_fetch_assoc($result)) {
      ?>

<tr>
<td><?php echo $rows['Id'];?></td>
<td><?php echo $rows['Name'];?></td>
<td><?php echo $rows['Phone'];?></td>
<td><?php echo $rows['Email'];?></td>
<td><?php echo $rows['AcNo'];?></td>
 <td><?php echo $rows['Balance'];?></td>
 </tr>             
 <?php
   }
?>
 </table>
</div>
</section>

</body>
</html>
