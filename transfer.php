<!DOCTYPE html>
<html>
<head>
<title>Transfer</title>
</head>
<style>
body{
  
  background-image: url("transact.jpg");
  background-repeat: no-repeat;
  background-size: cover;
  
}
h1 {
  text-align: center;
  color: black;
  font-size: 50px;
  font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
  }
.container {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

table {
	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: rgba(255,255,255,0.2);
	color: #fff;
}

th {
	text-align: left;
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



</style>
<body>
<?php
    include 'connection.php';
    $sql = "SELECT * FROM customer";
    $result = mysqli_query($conn, $sql);
    ?>
    <section>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   <div class="homeicon">
     <a href="index.php"><i class="fa fa-home"></i></a>
     </div>
   
       <div class="container">
   <h1><center>Transfer</center></h1>
   
   <table align="center">
<thead>
       <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Account Number</th>
         <th>Account Balance</th>
         <th>Transaction</th>
       </tr>
</thead>
<tbody>

       <?php   

                  
while ($rows = mysqli_fetch_assoc($result)) 
{
?>
<tr>

<td><?php echo $rows['Id'];?></td>
<td><?php echo $rows['Name'];?></td>
<td><?php echo $rows['AcNo'];?></td>
 <td><?php echo $rows['Balance'];?></td>
<td><a href="send.php?Id=<?php echo $rows['Id']; ?>"> <button type="button" class="btn" style="background-color :green;">Transact</button></a></td

</tr>    
<?php
  }
?>
</tbody>
</table>
</div>
</section>
   
</body>
</html>
