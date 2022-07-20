<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/decorate.css">
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
<h3>Thêm Dữ Liệu Cho Loại Tin</h3>

<form action="" method="post">
<table>
<tr>
   <th>Nhập Tài Khoản:</th>
   <th> <input type="text" name="userid" size="40"> </th>
</tr>
<tr>
<th>Nhập Mật Khẩu:</th>
  <th>  <input type="text" name="matkhau" size="40"> </th>

    </tr> 
    <tr>
<th>Nhập Tên Hiển Thị:</th>
  <th>  <input type="text" name="tenhienthi" size="40"> </th>

    </tr> 
 </table>
 <button type="submit" class="btn btn-success  " height="20">Thêm</button>
 <button  class="btn btn-success  " height="20"><a href="home.php"style="color: white;text-decoration: none;">Thoát</a></button>

</form>
    <?php
    $link= mysqli_connect('localhost','root','','quanlytintuc2') or die("Không thể kết nối được với database");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
     if(isset($_POST['userid'])) {$a=$_POST['userid'];}
     if(isset($_POST['matkhau'])) {$b=$_POST['matkhau'];}
     if(isset($_POST['tenhienthi'])) {$c=$_POST['tenhienthi'];}
    
    $query="INSERT INTO users VALUES('$a','$b','$c')";
    
    if ($link->query($query) == TRUE) {
        ?>
        <script>
        alert("Tạo Tài Khoản Thành Công");
        </script>
        <?php
    } else {
        ?>
        <script>
        alert("Tạo Tài Khoản Thất Bại");
        </script>
        <?php
    }
    }
    ?>
</center>
</div>


</body>
</html>