<!DOCTYPE html>
<html>
<head>
<title>History</title>
</head>
<style>
    table {
  margin: 0 auto;
  font-size: large;
  border: 1px solid black;
      }
  
h1 {
  text-align: center;
  color: black;
  font-size: xx-large;
   font-family: Garamond, serif;
  }
th{
    background-color:darkgray;
    border: 0px solid black;
  }
  
th,td {
    font-weight: bold;
    color:brown;
    border:1px solid black;
    padding: 10px;
    text-align: center;
  }
td {
    font-weight: medium;
  }
.content{
    position:absolute;
    top:75%;
    left:50%;
    transform: translate(-50%,-50%);
    width: 750px;
    height:500px;
    background:#C0C0C0;
    
}
.close {
    position: absolute;
    top: 0;
    right: 50px;
    font-size: 50px;
    margin-left: 100px;
    color:brown;
  }
h{
    font-family: "Times New Roman", Times, serif;
    font-size:50px;
    color:white;
       }
p{
      font-family: 'Brush Script MT', cursive;
    font-size:25px;
     color:white;
       }


</style>
<body>
  <link href = "hompage.css" type = "text/css" rel = "stylesheet" />
<?php
    include 'connection.php';
    $sql = "SELECT * FROM transact";
    $result = mysqli_query($conn, $sql);
    ?>
<h><center>TSF BANK</center></h>
<p><marquee>NOTE:Monthly balance of Rs.1000 should be maintained to avoid penalty charges.</marquee>
</p>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="index.php">Home</a>
 <a href="customer.php" id="openbtn" onclick="openNav()">View Customers</a>
  <button class="dropdown-btn">Transaction
     </button>
  <div class="dropdown-container">
    <a href="transfer.php">Transfer Money</a>
    <a href="history.php">Transfer History</a>
  </div>
  
  
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  
</div>


<div class="content">
    <a href="index.php" class="close" onclick="closeNav()">×</a>
    <h1><center>History</center></h1>
    <center>
    <table>
        <tr>
          <th>S.No</th>
          <th>Sender</th>
          <th>Recipient</th>
          <th>Amount</th>
          <th>Date and Time</th>
          
        </tr>
<?php
     while ($rows = mysqli_fetch_assoc($result)) {
      ?>

                        <tr >
                        <td ><?php echo $rows['S_No']; ?></td>
                        <td><?php echo $rows['Sender']; ?></td>
                         <td> <?php echo $rows['Recipient']; ?></td>
                         <td> <?php echo $rows['Balance']; ?> </td>
                         <td ><?php echo $rows['Date_and_time']; ?> </td>
</tr>

                        <?php
                    }

                        ?>
      </table>
    </center>
    </section>



<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}


var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
   
       
</body>
</html>

