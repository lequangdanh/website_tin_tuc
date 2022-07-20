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
   <th>Nhập mã loại:</th>
   <th> <input type="text" name="maloai" size="40"> </th>
</tr>
<tr>
<th>Nhập Tên Loại:</th>
  <th>  <input type="text" name="tenloai" size="40"> </th>

    </tr> 
 </table>
 <button type="submit" class="btn btn-success  " height="20">Thêm</button>
 <button  class="btn btn-success  " height="20"><a href="home.php"style="color: white;text-decoration: none;">Thoát</a></button>
 
</form>
    <?php
    $link= mysqli_connect('localhost','root','','quanlytintuc2') or die("Không thể kết nối được với database");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
     if(isset($_POST['maloai'])) {$a=$_POST['maloai'];}
     if(isset($_POST['tenloai'])) {$b=$_POST['tenloai'];}
    
    $query="INSERT INTO loaitin VALUES('$a','$b')";
    
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
    $query2="SELECT * FROM loaitin";
    $ketqua=mysqli_query($link,$query2);
    $hang=mysqli_fetch_assoc($ketqua);

    ?>
    <table class="table1">
    <tr >
    <td >Mã Loại Tin</td>
    <td >Tên Loại Tin</td>
    </tr>
    <?php do{  ?>
    <tr >
    <td > <?php echo $hang['maloai'] ?> </td>
    <td > <?php echo $hang['tenloai'] ?> </td> 
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