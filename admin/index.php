<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/sanpham.php";
include "../model/thongke.php";

    include "header.php";
    if (isset($_GET['act']) && ($_GET['act'] != "")) {
        $act = $_GET['act'];
        switch ($act) {
            case "listsp":
                if (isset($_POST['clickOK']) && ($_POST['clickOK'])) {
                    $keyw = $_POST['keyw'];
                    $iddm = $_POST['iddm'];
                } else {
                    $keyw = "";
                    $iddm = 0;
                }
                $listdanhmuc = loadall_danhmuc();
                $listsanpham = loadall_sanpham($keyw, $iddm);
                include "sanpham/list.php";
                break;
            case "addsp":
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $iddm = $_POST['iddm'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    //                    echo $hinh;
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    //                    echo $target_file;
                    if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                        //                        echo "Bạn đã upload ảnh thành công";
                    } else {
                        //                        echo "Upload ảnh không thành công";
                    }
                    //                    echo $iddm;
                    insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                    $thanhcong = "Thêm thành công";
                }

                $listdanhmuc = loadall_danhmuc();
                include "sanpham/add.php";
                break;
            case "suasp":
                if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                    $sanpham = loadone_sanpham($_GET['idsp']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/update.php";
                break;
            case "updatesp":
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $iddm = $_POST['iddm'];
                    $id = $_POST['id'];
                    $tensp = $_POST['tensp'];
                    $giasp = $_POST['giasp'];
                    $mota = $_POST['mota'];
                    $hinh = $_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                    $thongbao = "cập nhật thành công!";
                }
                $listsanpham = loadall_sanpham("", 0);
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/list.php";
                break;

            case "hard_delete":
                if (isset($_GET['idsp'])) {
                    hard_delete($_GET['idsp']);
                }
                $listsanpham = loadall_sanpham("", 0);
                include "sanpham/list.php";
                break;

            case "soft_delete":
                if (isset($_GET['idsp'])) {
                    soft_delete($_GET['idsp']);
                }
                $listsanpham = loadall_sanpham("", 0);
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/list.php";
                break;
            case "adddm":
                if (isset($_POST["themmoi"])&&isset($_POST["themmoi"])) {
                    $tenloai=$_POST['tenloai'];
                    $sql="INSERT INTO danhmuc(name) value('$tenloai')";
                    pdo_execute($sql);
                    $thongbao="thêm thành công";
                }
                include "danhmuc/add.php";
                break;
            case "listdm":
                $sql="SELECT * FROM danhmuc order by name";
                $listdanhmuc=pdo_query($sql);
                include "danhmuc/list.php";
                break;
            case "xoadm":
                if(isset($_GET['id']) &&($_GET['id']>0)){ 
                $sql="DELETE  FROM danhmuc WHERE id=".$_GET['id'];
                pdo_execute($sql);
                }
                $sql="SELECT * FROM danhmuc order by name";
                $listdanhmuc=pdo_query($sql);
                include "danhmuc/list.php";
                break; 
            case "suadm":
                if(isset($_GET['id']) &&($_GET['id']>0)){
                    $sql= "SELECT * FROM danhmuc WHERE id=".$_GET['id'];
                    $dm=pdo_query_one($sql);
                }
                include "danhmuc/update.php";
                break;
            case "updatedm":
                if (isset($_POST["capnhat"])&&isset($_POST["capnhat"])) {
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    $sql="UPDATE danhmuc SET name='".$tenloai."' WHERE id=".$id;
                    pdo_execute($sql);
                    $thongbao="thêm thành công";
                }
                $sql="SELECT * FROM danhmuc order by name";
                $listdanhmuc=pdo_query($sql);
                include "danhmuc/list.php";
                break;
            case "dskh":
                $listtaikhoan=loadall_taikhoan();
                include "khachhang/list.php";
                break; 
            case "dsbl":
                $listbinhluan=loadall_binhlua();
                include "binhluan/list.php";
                break; 
            case "thongke":
                $dsthongke = load_thongke_sanpham_danhmuc();
                include "thongke/list.php";
                break;
            case "bieudo":
                $dsthongke = load_thongke_sanpham_danhmuc();
                include "thongke/bieudo.php";
                break;
        }
    } else {
        include "home.php";
    }
    include "footer.php";
?>
