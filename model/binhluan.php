<?php 
    function loadall_binhlua(){
        $sql = "SELECT * FROM binhluan WHERE 1";
        $sql.= " order by id desc";
        $listbl=pdo_query($sql);
        return $listbl;
    }
    function loadall_binhluan($idsp){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idsp;
        ";
        $result =  pdo_query($sql);
        return $result;
    }
    function insert_binhluan($idpro, $noidung){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung','2','$idpro','$date');
        ";
        //echo $sql;
        //die;
        pdo_execute($sql);
    }

?>