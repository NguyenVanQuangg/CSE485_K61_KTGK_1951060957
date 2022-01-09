<?php
require_once 'model/db.php';


class docgiaController { // ----

    // la nhung action
    public function index() {   // ok
        echo "<h1>Hiển thị danh sách các độc giả!</h1>";
        $docgia = new DOCGIA(); // tu model
        $docgias = $docgia->index(); // truyen sang view index trang chu
        require_once 'views/docgia/index.php';
    }

    public function add() { // okokokokok
        $error = '';
        //xử lý submit form
        if (isset($_POST['submit'])) {

            $hovaten = $_POST['hovaten'];
            $gioitinh = $_POST['gioitinh'];
            $namsinh = $_POST['namsinh'];
            $nghenghiep = $_POST['nghenghiep'];
            $ngaycapthe = $_POST['ngaycapthe'];
            $ngayhethan = $_POST['ngayhethan'];
            $diachi = $_POST['diachi'];
            if(empty($hovaten) ||  empty($gioitinh) || empty($namsinh) || empty($nghenghiep || empty($ngaycapthe)|| empty($ngayhethan)|| empty($diachi))){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
            //gọi model để insert dữ liệu vào database
            $docgia = new DOCGIA();
            //gọi phương thức để insert dữ liệu
            //nên tạo 1 mảng tạm để lưu thông tin của
//                đối tượng dựa theo cấu trúc bảng
            $docgiaArr = [
                'hovaten' => $hovaten,
                'gioitinh' => $gioitinh,
                'namsinh' => $namsinh,
                'nghenghiep' => $nghenghiep,
                'ngaycapthe' => $ngaycapthe,
                'ngayhethan' => $ngayhethan,
                'diachi' => $diachi,

            ];
            $isInsert = $docgia->insert($docgiaArr);
            if ($isInsert) {
                $_SESSION = "Thêm mới thành công";
            }
            else {
                $_SESSION = "Thêm mới thất bại";
            }
            header("Location: index.php?controller=employee&action=index");
            exit();

        }
        //gọi view
        require_once 'view/docgia/add.php';
    }
    public function detail() { // ok
        $docgia = new DOCGIA(); // tu model
        $docgias = $docgia->index(); // truyen sang view index trang chu
        require_once 'view/docgia/home.php';
    }
    public function edit() {
        //lấy ra thông tin sách dựa theo id đã gắn trên url
        //xử lý validate cho trường hợp id truyền lên không hợp lệ
        if (!isset($_GET['madg'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=docgia&action=index");
            return;
        }
        if (!is_numeric($_GET['manv'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=docgia&action=index");
            return;
        }
        $madg = $_GET['madg'];
        //gọi model để lấy ra đối tượng sách theo id
        $docgia = new NHANVIEN();
        $BD = $docgia->getBDById($madg); // lay sach theo id nhan duoc tu GET

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
        $error = '';
        if (isset($_POST['submit'])) {
            $hovaten = $_POST['hovaten'];
            $gioitinh = $_POST['gioitinh'];
            $namsinh = $_POST['namsinh'];
            $nghenghiep = $_POST['nghenghiep'];
            $ngaycapthe = $_POST['ngaycapthe'];
            $ngayhethan = $_POST['ngayhethan'];
            $diachi = $_POST['diachi'];
            //xử lý update dữ liệu vào hệ thống
            if(empty($hovaten) ||  empty($gioitinh) || empty($namsinh) || empty($nghenghiep || empty($ngaycapthe)|| empty($ngayhethan)|| empty($diachi))){
                $error = 'Thông tin chưa đầy đủ!';
            }
            else {
            $docgiaArr = [
                'hovaten' => $hovaten,
                'gioitinh' => $gioitinh,
                'namsinh' => $namsinh,
                'nghenghiep' => $nghenghiep,
                'ngaycapthe' => $ngaycapthe,
                'ngayhethan' => $ngayhethan,
                'diachi' => $diachi,
            ];
            $$isInsert = $docgia->update($docgiaArr); // sai
            if ($isInsert) {
                $_SESSION = "Update bản ghi #$manv thành công";
            }
            else { // nhay vao day
                $_SESSION = "Update bản ghi #$manv thất bại";
            }
            header("Location: index.php?controller=docgia&action=index");
            exit();
        }
        //truyền ra view
        require_once 'view/docgia/edit.php';
    }

    public function delete() 
        //bắt id từ trình duyêt
        $madg = $_GET['madg'];
        if (!is_numeric($manv)) {
            header("Location: index.php?controller=docgia&action=index");
            exit();
        }

        $docgia = new DOCGIA();
        $isDelete = $docgia->delete($madg);

        if ($isDelete) {

            $_SESSION = "Xóa bản ghi thành công";
        }
        else {
            $_SESSION = "Xóa bản ghi thất bại";
        }
        header("Location: index.php?controller=docgia&action=index");
        exit();
    }
}
