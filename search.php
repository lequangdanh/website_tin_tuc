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
<body >
<?php
    $link= mysqli_connect('localhost','root','','quanlytintuc2') or die("Không thể kết nối được với database");
    
     $query2="SELECT * FROM loaitin LIMIT 3";
     $ketqua=mysqli_query($link,$query2);
     $hang=mysqli_fetch_assoc($ketqua);

     $query3="SELECT anh,tieude,motatin FROM tintuc";
    $ketqua2=mysqli_query($link,$query3);
     $hang2=mysqli_fetch_assoc($ketqua2);

     

     $query4="SELECT * FROM loaitin";
     $ketqua4=mysqli_query($link,$query4);
     $hang4=mysqli_fetch_assoc($ketqua4);
     
     $query5="SELECT anh,tieude,motatin FROM tintuc WHERE maloai=1";
    $ketqua5=mysqli_query($link,$query5);
     $hang5=mysqli_fetch_assoc($ketqua5);
     $chuoi='"';

     $query6="SELECT * FROM `loaitin` WHERE maloai not in(1,2,3)";
    $ketqua6=mysqli_query($link,$query6);
     $hang6=mysqli_fetch_assoc($ketqua6);
    
      
    ?>
    <div class="row">
    <div class="col-md-3 col-sm-6 col-12">
      <img src="./asset/css/img/logo.PNG" alt="">
    </div>
    <div class="col-md-3 col-sm-6 col-12" >
    <img src="./asset/css/img/logo3.PNG" alt="">
    </div>
    <div class="col-md-3 col-sm-6 col-12" >
    <img src="./asset/css/img/logo4.jpg" alt="anh3">
    </div>
    <div class="col-md-3 col-sm-6 col-12" >
    <img src="./asset/css/img/logo5.jpg" alt="anh4">
    </div>
    </div>

    <div class="noidung">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left:0px;padding-right:0px;">
  <div class="container-fluid"style="background-color: rgb(240, 67, 14);">
    <a class="navbar-brand" href="home.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php do{ ?>
    <li class="nav-item "><a class="nav-link" href="<?php echo "danhsachtin.php?maloai=".$hang['maloai'] ?>" ><?php echo $hang['tenloai'] ?></a></li>
      <?php } while($hang=mysqli_fetch_assoc($ketqua));?>

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           More
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php do{ ?>
            <li><a class="dropdown-item" href="<?php echo "danhsachtin.php?maloai=".$hang6['maloai'] ?>"><?php echo $hang6['tenloai']?></a></li>
            <?php }while($hang6=mysqli_fetch_assoc($ketqua6));?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           ADMIN
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="login_loaitin.php">Đăng Nhập Loại Tin</a></li>
            <li><a class="dropdown-item" href="login.php">Đăng Nhập Tin Tức</a></li>
            <li><a class="dropdown-item" href="login_admin.php">Đăng Kí Tài Khoản</a></li>
          </ul>
        </li>
        
      </ul>
      <form class="d-flex" action="search.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="tukhoa" >
        <button class="btn btn-outline-success" type="submit"name="timkiem" >Search</button>
      </form>
    </div>
  </div>
</nav>

<?php

if(isset($_POST["tukhoa"])) {
  
 $sql7="SELECT * FROM tintuc WHERE tieude like'%".$_POST['tukhoa']."%'";
}
$ketqua7=mysqli_query($link,$sql7);
$hang7=mysqli_fetch_assoc($ketqua7);
 
?>
<center><h2><?php echo "Kết Quả Tìm Kiếm Của Từ Khóa ".$chuoi.$_POST['tukhoa'].$chuoi?></h2></center>
 <div class="product-group" style="margin-left:20px;margin-top:20px ">
    
			<div class="row">
      <?php do{ ?>
				<div class="row" style="margin-left:0px;margin-right:0px" >
            
				<div class="col-md-2  col-12">

					
					  <img   class="card-img-top" src="asset/css/img/<?php echo $hang7['anh']?> " alt="Card image cap" style="height:100px; width:210px" >
					  
					
				</div>
                <div class="col-md-10  col-12" >

				
					  
					  
					    <h5 class="card-title" style="height:20px;font-size: 19px;"><a a class="ten" href="noidung.php?matin=<?php echo $hang7['matin']?>"><?php echo $hang7['tieude']?></a></h5>
					    <p class="card-text" style="height:70px"><?php echo $hang7['motatin']."...."?></p>
					   
					  
					
				</div>
				
             </div>
				<?php }while($hang7=mysqli_fetch_assoc($ketqua7)); ?>
			</div>
      
		</div>
   </div>
   </div>

   
   <div id="footer">
<hr style="width=100%">
  <div class="row" >
  <div class="col-md-3 col-sm-6 col-12" >
      <img src="./asset/css/img/logo.PNG" alt="" style="width:215px;height:200px">
    </div>
    

    <div class="col-md-5 col-sm-6 col-12" >
    <img src="./asset/css/img/logo5.PNG" alt="" >
      <h5>Công ty **************************************</h5>
      <h5>Địa chỉ: Lai Xá - Kim Chung - Hoài Đức - Hà Nội</h5>
      
      
    </div>
    <div class="col-md-4 col-sm-6 col-12" >
    <img src="./asset/css/img/logo6.jpg" alt="" >
    <h5>Chịu trách nhiệm nội dung: Lê Quang Danh</h5>
    <h5> Email: lequangdanh345@tintuc.vn</h5> 
    <h5>Hotline: 0335.045.893 </h5>
      <h5>Liên hệ quảng cáo: lequangdanh@tintuc.vn </h5>
      <h5> Điện thoại: 0964.705.888</h5>
      
    </div>

  </div>

</div>
</div> 
    </body>
</html>
