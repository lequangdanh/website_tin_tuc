<?php
$link= mysqli_connect('localhost','root','','quanlytintuc2') or die("Không thể kết nối được với database");
if(isset($_GET["matin"])){
  $matin=$_GET["matin"];
}
$query = "DELETE FROM tintuc WHERE matin='$matin'";
$ketqua=mysqli_query($link,$query);
header("location: them_tintuc.php");
