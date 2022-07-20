<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/decorate.css">
    <script src="./plugin/ckeditor/ckeditor.js"></script>
    <title>Document</title>
</head>
<body>
<?php
$link= mysqli_connect('localhost','root','','quanlytintuc2')or die("Không thể kết nối được với database");
if(isset($_GET["matin"])){
  $matin=$_GET["matin"];

$query7 = "SELECT * FROM tintuc WHERE matin=$matin;";
$ketqua7=mysqli_query($link,$query7);
$hang7=mysqli_fetch_assoc($ketqua7);
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['matin'])) {$a=$_POST['matin'];}
    if(isset($_POST['anh'])) {$b=$_POST['anh'];}
    if(isset($_POST['mota'])) {$c=$_POST['mota'];}
    if(isset($_POST['tieude'])) {$d=$_POST['tieude'];}
    if(isset($_POST['noidung'])) {$e=$_POST['noidung'];}
    if(isset($_POST['tacgia'])) {$f=$_POST['tacgia'];}
    if(isset($_POST['ngayviet'])) {$g=$_POST['ngayviet'];}
    if(isset($_POST['maloai'])) {$h=$_POST['maloai'];}
   
   $query2="UPDATE tintuc SET anh='$b' ,motatin='$c',tieude='$d',noidung='$e',tacgia='$f',ngayviet='$g',maloai='$h' WHERE matin='$a'";
  
   if ($link->query($query2) == TRUE) {
       ?>
       <script>
      var r= confirm("Sửa Dữ liệu Thành Công! Bạn muốn quay trở về không");
       if(r==true)
       {
           <?php header("location: them_tintuc.php");?>
       }
       </script>
       <?php
        
   } else {
       ?>
       <script>
       var r= confirm("Sửa Dữ liệu Thất Bại! Bạn muốn quay trở về không");
       if(r==true)
       {
           <?php header("location: them_tintuc.php");?>
       }
       </script>
       <?php
       
   }
  

}
?>
<div id="form_them_loaitin">
<center>



<form action=""  method="POST">

<table>
<tr>
   <th>Nhập mã tin tức:</th>
   <th> <input type="text" name="matin" size="40" value="<?php echo $hang7['matin']?>" > </th>
</tr>
<tr>
<th>Chọn ảnh :</th>
  <th>  <input type="file" name="anh" size="40" value="<?php echo $hang7['anh']?>"> </th>

    </tr> 
    <tr>
<th>Nhập Mô tả tin:</th>
  <th>  <input type="text" name="mota" size="40" value="<?php echo $hang7['motatin']?>"> </th>

    </tr> 
    <tr>
<th>Nhập Tiêu Đề:</th>
  <th>  <input type="text" name="tieude" size="40" value="<?php echo $hang7['tieude']?>"> </th>

    </tr> 
    <tr>
<th>Nhập Nội dung:</th>
  <th>  <textarea class="ckeditor" name="noidung" rows="4" cols="50"value="<?php echo $hang7['noidung']?>" > </textarea>  </th>

    </tr> 
    <tr>
<th>Nhập tác giả:</th>
  <th>  <input type="text" name="tacgia" size="40" value="<?php echo $hang7['tacgia']?>"> </th>

    </tr> 
    <tr>
<th>Nhập Ngày viết:</th>
  <th>  <input type="text" name="ngayviet" size="40" value="<?php echo $hang7['ngayviet']?>"> </th>

    </tr> 
    <tr>
<th>Nhập Mã Loại:</th>
  <th>  <input type="text" name="maloai" size="40" value="<?php echo $hang7['maloai']?>"> </th>

    </tr> 
 </table>
    <button>Sửa</button>

</form>
    
   
</center>
</div>


</body>
</html>