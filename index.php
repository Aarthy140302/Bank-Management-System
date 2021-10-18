<!DOCTYPE html>
<html>
<head>
<title>TSF Bank</title>
</head>
<style>
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
h2{
    font-family: "Times New Roman", Times, serif;
    font-size:40px;
    color:white;
       }
p1
{
font-family: "Times New Roman", Times, serif;
    font-size:40px;
    color:#A9A9A9;
}
</style>

<body>
<link href = "hompage.css" type = "text/css" rel = "stylesheet" />
<h><b><center>TSF BANK</center></b></h>
<p><marquee>NOTE:Balance of Rs.1000 should be maintained.</marquee></p>
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="index.php">Home</a>
 <a href="customer.php" id="openbtn" onclick="openNav()">View Customers</a>
<button class="dropdown-btn">Transaction</button>
<div class="dropdown-container">
<a href="transfer.php">Transfer Money</a>
<a href="history.php">Transfer History</a>
</div>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  
</div>


<div class="content">
  <center>
  <h2>
    Welcome to TSF Bank
  </h2>
  <h2>
  We are glad to help you.
  </h2>
 
</center>
</div2>
<br><br>
<br><br><br>
<br><br>
<br><br>
 <p1>
  Contact Us:
  <a href = "mailto: TsfBank@gmail.com"style="color:#A9A9A9">Send Email</a>
  </p1>



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

