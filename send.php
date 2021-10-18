<?php
include 'connection.php';
if(isset($_POST['submit']))
{
    $from = $_GET['Id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    echo $from ;

    $sql = "SELECT * from customer where Id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns output of user from which the amount is to be transferred.

    $sql = "SELECT * from customer where Id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);//returns output of user to which the amount is to be transferred.

// constraint to check insufficient balance.
    if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
// constraint to check that balance of Rs.1000 is maintained
   else if($sql1['Balance']<=1000){

        echo '<script type="text/javascript">';
        echo ' alert("Balance of Rs.1000 should be maintained")';  // showing an alert box.
        echo '</script>';
        }
    else {
        // deducting amount from sender's account
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE customer set Balance=$newbalance where Id=$from";
                mysqli_query($conn,$sql);
             

        // adding amount to reciever's account
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE customer set Balance=$newbalance where Id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO transact(`Sender`, `Recipient`, `Balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='history.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <style type="text/css">
        body {
          background-image: url("send.jpg");
          background-repeat: no-repeat;
          background-size: cover;
       }
        button{
            border:none;
            background: #d9d9d9;
        }
        button:hover{
            background-color:#777E8B;
            transform: scale(1.1);
            color:white;
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
    table{
      font-size:30px;
      padding:10px;
      border-spacing:25px;
}
button{
 background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

}
h1{
font-size:20px;
}
h2{
font-size:40px;
}

    </style>

    <title>Transact</title>
</head>
<body>
        
<div class="body">
 <div class="user">
 <div class="container">
 <center><h2 style="color : white;">Transaction</h2></center>
<div class="homeicon">
  <a href="index.php"><i class="fa fa-home"></i></a>
  </div>
<?php
include 'connection.php';
 $sid=$_GET['Id'];
$sql = "SELECT * FROM  customer where Id=$sid";
$result=mysqli_query($conn,$sql);
if(!$result)
 {
 echo "Error : ".$sql."<br>".mysqli_error($conn);
}
$rows=mysqli_fetch_assoc($result);
 ?>
 <center>
    <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <tr style=<form method="post" name="tcredit" class="tabletext" ><br>
                        <div>
                            <table>
                                <tr style="color:white;">
                    <th class="text-center">Name</th>
                    <th class="text-center">Balance</th>
                </tr>
                
                <tr style="color : white;">
                    <td class="py-2"><?php echo $rows['Name'] ?></td>
                    <td class="py-2"><?php echo $rows['Balance'] ?></td>
                </tr>
</table>
           
        </div>

                   
        <h1 style="color:white;"><b>Transfer To:</b>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>

<?php
                include 'connection.php';
                $sid=$_GET['Id'];
                $sql = "SELECT * FROM customer where Id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['Id'];?>" >
                
                <?php echo $rows['Name'] ;?> &nbsp;
           (Balance: <?php echo $rows['Balance'] ;?> )
               
                </option>
            <?php 
                } 
            ?>
</div>
</select>

            <h1 style="color:white;"><b>Amount:</b></h1>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3 btn-success" name="submit" type="submit" id="myBtn" >Transfer</button>
            </div>
        </form>
            </center>
    </div>
    </div>
</div>
</body>
</html>
