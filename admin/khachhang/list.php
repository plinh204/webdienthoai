<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH KHÁCH HÀNG</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ KHÁCH HÀNG</th>
                <th>TÊN KHÁCH HÀNG</th> 
                <th>MẬT KHẨU</th>
                <th>Email</th>
                <th>ĐỊA CHỈ</th>
                <th>ĐIỆN THOẠI</th>
                <th>ROLE</th>
                <th></th>
            </tr>
            <?php
                foreach($listtaikhoan as $taikhoan){
                    extract($taikhoan);
                    $suatk="index.php?act=suatk&id=".$id;
                    $xoatk="index.php?act=xoatk&id=".$id;
                    echo'<tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>'.$id.'</td>
                    <td>'.$user.'</td>
                    <td>'.$pass.'</td>
                    <td>'.$email.'</td>
                    <td>'.$address.'</td>
                    <td>'.$tel.'</td>
                    <td>'.$role.'</td>
                    <td><a href="'.$suatk.'"><input type="button" value="Sửa"></a>   <a href="'.$xoatk.'"><input type="button" value="Xóa"></a></td>
                </tr>';
                }
            ?>
           
           
            
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
            <a href="index.php?act=adddm"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>



       
    </div>