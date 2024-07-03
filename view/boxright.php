<style>
.border{
  border: 2px solid #ccc;
  background-color: #ccc;
  height: 300px;

  
}
.user_mb20{
  padding-left: 20px;
  padding-top: 16px;
}
.user_mb20 li{
  list-style: none;
  padding-left: 20px;
  border-bottom: 1px solid #333;
  width: 285px;
}
.user_mb20 a{
  text-decoration: none;
  color: black;
  

}
.chon{
  padding-left: 20px;
  padding-top: 16px;
}
.chon li{
  list-style: none;
  padding-left: 20px;
  border-bottom: 1px solid #333;
  width: 285px;
}
.chon a{
  text-decoration: none;
  color: black;
}
.user_mb201{
  text-align: center;
  padding-bottom: 15px;
  padding-top: 10px;
  background-color: burlywood;
}

.lick{
  text-align: center;
  padding-top: 20px;
}
.lick button{
  width: 100px;
  border-radius: 4px;
  
}
.lick a{
 color: black;
}
.row_mb10{
  padding-top: 20px;
}
</style>
<div class="boxright">

    <div class="mb">
      <div class="border">
      <?php
      if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
      ?>
        <div class="user_mb201">
          <i class="fa-solid fa-user-check"></i>
          <p>xin chào <?= $user ?></p>
        </div>
        <?php if ($role == 1) { ?>
          <div class="user_mb20 ">
            <li><a href="admin/index.php">Đăng nhập trang admin</a></li>
          </div>
        <?php } ?>
        <div class="user_mb20">
          <li><a href="index.php?act=addcart">Giỏ hàng</a></li><br>
        </div>
        <div class="user_mb20">
          <li><a href="index.php?act=cntk">Chỉnh sửa thông tin</a></li><br>
        </div>
        <div class ="lick">
        <button ><a href="index.php?act=dangxuat">Đăng xuất</a></button>
        </div>
        </div>
      <?php
      
    } else { ?>
      <form class="border" action="index.php?act=dangnhap" method="post">
        <div class="row_mb10">
          Tên Đăng Nhập <br />
          <input type="text" name="user" id="" />
          <?php
          if (isset($error['user']) && ($error['user'] != ""))
            echo  '<span style="color:red;">' . $error['user'] . '</span>';
          ?>
        </div>
        <div class="row_mb10">
          Mật Khẩu <br />
          <input type="password" name="pass" id="" />
          <?php
          if (isset($error['pass']) && ($error['pass'] != ""))
            echo  '<span style="color:red;">' . $error['pass'] . '</span>';
          ?>
        </div>
        <div class="row_mb10">
          <input type="checkbox" name="" id="" />Ghi nhớ tài khoản
        </div>
        <div class="row_mb10">
          <input type="submit" value="Đăng Nhập" name="dangnhap" />
        </div>
        <div class="chon">
          <li><a href="index.php?act=quenmk">Quên Mật Khẩu</a></li>
          <li><a href="index.php?act=dangky">Đăng Ký Thành Viên</a></li>
        </div>     
      </form>

      
      <?php }

    ?>
    </div>
    <div class="mb">
        <div class="box_title">DANH MỤC</div>
        <div class="box_content2 product_portfolio">
            <ul>
                <?php
                      foreach($dsdm as $dm){
                          extract($dm);
                          $linkdm="index.php?act=sanpham&iddm=".$id;
                          echo '<li><a href="'.$linkdm.'">'.$name.' </a></li>';

                      }
                      ?>
                <!--                     <li><a href="">Đồng hồ </a></li>-->
                <!--                     <li><a href="">Laptop</a></li>-->
                <!--                     <li><a href="">Điện thoại</a></li>-->
                <!--                     <li><a href="">Ipad</a></li>-->
                <!--                     <li><a href="">Tivi</a></li>-->
            </ul>
        </div>
        <div class="box_search">
            <form action="index.php?act=sanpham" method="POST">
                <input type="text" id="" placeholder="Từ khóa tìm kiếm" name="keyword">
            </form>
        </div>
    </div>
    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
        <div class="box_content">
            <?php
                    foreach($dstop10 as $sp){
                        extract($sp);
                        $linksp="index.php?act=sanphamct&idsp=".$id;
                        $img=$img_path.$img;
                        echo'<div class="selling_products" style="width:100%;">
                  <img src="'.$img.'" alt="anh">
                  <a href="'.$linksp.'">'.$name.'</a>
                </div>';
                    }
                    ?>
        </div>
    </div>
</div>
