<?php
echo "started";
$con = mysqli_connect('localhost', 'root', '','test');
session_start();

  if($con){
	print("Connection Established Successfully");
 }else{
	print("Connection Failed ");
 } 

$username= $_POST['username'];
$Password= $_POST['Password'];

$sql = "SELECT * From Registration Where fldEmail='$username' and fldPassword='$Password'";



$rs = mysqli_query($con, $sql);
if (mysqli_num_rows($rs))
{
  printf("Select returned %d rows.\n", mysqli_num_rows($rs));
  while($rows=mysqli_fetch_assoc($rs)){
    print($rows['fldCID']);
    $_SESSION['cid'] = $rows['fldCID'];
    if ($rows['role']==1)
    {
      header("Location: http://localhost/Website/Manager");
    }
    else{
     header("Location: http://localhost/Website/Bookings");
    
    }
  }
  
}

else{
  print ("User not found!");
}



?>