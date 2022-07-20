<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/decorate.css">
    <script src="./plugin/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="./aset/css/themify-icons/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<div id="form_them_loaitin">
<center>
<h3>Thêm Tin Tức</h3>

<form action=""  method="POST">
<table >
<tr>
   <th>Nhập mã tin tức:</th>
   <th> <input type="text" name="matin" size="40" > </th>
</tr>
<tr>
<th>Chọn ảnh :</th>
  <th>  <input type="file" name="anh" size="40"> </th>

    </tr> 
    <tr>
<th>Nhập Mô tả tin:</th>
  <th>  <input type="text" name="mota" size="40"> </th>

    </tr> 
    <tr>
<th>Nhập Tiêu Đề:</th>
  <th>  <input type="text" name="tieude" size="40"> </th>

    </tr> 
    <tr>
<th>Nhập Nội dung:</th>
  <th>  <textarea class="ckeditor" name="noidung" rows="4" cols="50"> </textarea> </th>

    </tr> 
    <tr>
<th>Nhập tác giả:</th>
  <th>  <input type="text" name="tacgia" size="40"> </th>

    </tr> 
    <tr>
<th>Nhập Ngày viết:</th>
  <th>  <input type="text" name="ngayviet" size="40"> </th>

    </tr> 
    <tr>
<th>Nhập Mã Loại:</th>
  <th>  <input type="text" name="maloai" size="40"> </th>

    </tr> 
 </table>
 <button type="submit" class="btn btn-success  " height="20">Thêm</button>
 <button  class="btn btn-success  " height="20"><a href="home.php" style="color: white;text-decoration: none;">Thoát</a></button>
 
</form>
    <?php
    $link= mysqli_connect('localhost','root','','quanlytintuc2') or die("Không thể kết nối được với database");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
     if(isset($_POST['matin'])) {$a=$_POST['matin'];}
     if(isset($_POST['anh'])) {$b=$_POST['anh'];}
     if(isset($_POST['mota'])) {$c=$_POST['mota'];}
     if(isset($_POST['tieude'])) {$d=$_POST['tieude'];}
     if(isset($_POST['noidung'])) {$e=$_POST['noidung'];}
     if(isset($_POST['tacgia'])) {$f=$_POST['tacgia'];}
     if(isset($_POST['ngayviet'])) {$g=$_POST['ngayviet'];}
     if(isset($_POST['maloai'])) {$h=$_POST['maloai'];}
    
    $query="INSERT INTO tintuc VALUES('$a','$b','$c','$d','$e','$f','$g','$h')";
    
    if ($link->query($query) == TRUE) {
        ?>
        <script>
        alert("Thêm Dữ liệu Thành Công");
        </script>
        <?php
    } else {
        ?>
        <script>
        alert("Thêm Dữ liệu Thất Bại");
        </script>
        <?php
    }
}
    $query2="SELECT * FROM tintuc ORDER BY matin DESC";
    $ketqua=mysqli_query($link,$query2);
    $hang=mysqli_fetch_assoc($ketqua);
    
    ?>
    <table class="table1" >
    <tr >
    <td >Mã Tin Tức</td>
    <td >Anh</td>
    <td>Mô Tả</td>
    <td >Tiêu Đề</td>
    <td >Nội Dung</td>
    <td >Tác Gỉa</td>
    <td >Ngày Viết</td>
    <td >Mã loại</td>
    <td >Sửa</td>
    <td >Xóa</td>
    </tr>
    <?php do{  ?>
    <tr >
    <td > <div class="item1"> <?php echo $hang['matin'] ?> </div> </td>
    <td ><div class="item1"><?php echo $hang['anh']?> </div> </td> 
    <td ><div class="item1"> <?php echo $hang['motatin'] ?></div> </td>
    <td ><div class="item1"> <?php echo $hang['tieude'] ?></div> </td> 
    <td><div class="item1"> <?php echo $hang['noidung'] ?></div> </td>
    <td ><div class="item1"> <?php echo $hang['tacgia'] ?></div> </td> 
    <td ><div class="item1"> <?php echo $hang['ngayviet'] ?></div> </td>
    <td ><div class="item1"> <?php echo $hang['maloai'] ?> </div></td> 
    <td ><div class="item1"> <a href="sua.php?matin=<?php echo $hang['matin'] ?>">Sửa</a></div> </td> 
    <td ><div class="item1"> <a href="xoa.php?matin=<?php echo $hang['matin'] ?>">Xóa</a></div> </td> 
    </tr>
    <?php 
    } while($hang=mysqli_fetch_assoc($ketqua));

    $link->close();
    ?>
    </table>
</center>
</div>


</body>
</html>