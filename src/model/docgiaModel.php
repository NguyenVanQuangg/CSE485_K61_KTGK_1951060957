<?php
require_once 'config/db.php';
class  docgia{
    public $madg;
    public $hovaten;
    public $gioitinh;
    public $namsinh;
    public $nghenghiep;
    public $ngaycapthe;
    public $ngayhethan;
    public $diachi;
    
    public function insert($param = []) {
        $connection = $this->connectDb();
        $queryInsert = "INSERT INTO docgia (hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi) 
        VALUES ('{$param['hovaten']}', '{$param['gioitinh']}', '{$param['namsinh']}', '{$param['nghenghiep']}', '{$param['ngaycapthe']}', '{$param['ngayhethan']}', '{$param['diachi']}')";

        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }

    public function getdocgiaById($manv = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM docgia WHERE madg={$madg};

        $results = mysqli_query($connection, $querySelect);
        $docgiaArr = [];

        if (mysqli_num_rows($results) > 0) {
            $docgias = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $docgiaArr = $docgias[0];
        }
        $this->closeDb($connection);

        return $docgiaArr;
    }

   

    public function update($docgia = []) { 
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE docgia
                    SET `hovaten` = '{$docgia['hovaten']}', `gioitinh` = '{$docgia['gioitinh']}',`namsinh` = '{$docgia['namsinh']}',`nghenghiep` = '{$docgia['nghenghiep']}',

                    `ngaycapthe` = '{$docgia['ngaycapthe'], `ngayhethan` = '{$docgia['ngayhethan']}', `diachi` = '{$docgia['diachi']}'}'
                    
                    WHERE `madg` = {$docgia['madg']}";

        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }

    public function delete($madg = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM docgia WHERE madg = $mdg";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
 
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST,
            DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Kh??ng th??? k???t n???i. L???i: " .mysqli_connect_error());
        }

        return $connection;
    }

    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
}