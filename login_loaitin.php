<html>
<head>
    <link rel="stylesheet" href="./asset/css/decorate.css">
    <link rel="stylesheet" href="./aset/css/themify-icons/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
    
    <div class="container-fluid bg" >
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-6 col-xs-12 row-container ">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1>ĐĂNG NHẬP Loại Tin</h1>
                <div class="form-group">
                   <label for="email">Tên Đăng Nhập</label>
                   <input type="text" name="users_id" size="40" maxlength="20" class="form-control">
                </div>
                <div class="form-group">
                   <label for="password">Mật Khẩu</label>
                   <input type="password" name="matkhau" size="40" maxlength="20" class="form-control">
                </div>
                <button type="submit" class="btn btn-success btn-block my-3" height="20">ĐĂNG NHẬP</button>
                <button  class="btn btn-success btn-block " height="20"><a href="home.php" style="color: white;text-decoration: none;">Thoát</a></button>
            </form>

        </div>

    </div>

</div>
<?php
$link= mysqli_connect('localhost','root','','quanlytintuc2') or die("Không thể kết nối được với database");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["users_id"])) {$a=$_POST['users_id'];}
if(isset($_POST['matkhau'])) {$b=$_POST['matkhau'];}

$luachon = 'SELECT * FROM users';
$ketqua = mysqli_query($link, $luachon);
$hang = mysqli_fetch_assoc($ketqua);
if($ketqua = mysqli_query($link,$luachon)){
    $e = 0;
    while($hang = mysqli_fetch_array($ketqua)){
        if($hang['uesrs_id']==$a && $hang['passwords']==$b){
            header("location: them_tin.php");
            $e++;
            exit;
          }
        }
    }
    if($e==0){
        echo("đăng nhập thất bại");
    }
}else
    echo 'ket noi that bai' . mysqli_error($link);
    mysqli_close($link);

?>


</body>
</html>