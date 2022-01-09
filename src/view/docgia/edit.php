<?php
require 'view/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div style="color: red">
                <?php echo $error; ?>
            </div>
            <div class="col-md-8 ms-auto me-auto">
                <h4>Sửa thuốc</h4>
                <form class="row g-3 needs-validation" method="post" action="" novalidate>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Tên độc giả</label>
                        <input type="text" class="form-control" name="id" id="validationCustom01" value="<?php echo isset($_GET['id']) ? $_GET['id'] : $BD['id']?>" readonly required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Giới tính</label>
                        <input type="text" class="form-control" name="name" id="validationCustom01" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $BD['name']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Năm sinh</label>
                        <input type="text" class="form-control" name="type" id="validationCustom02" value="<?php echo isset($_POST['type']) ? $_POST['type'] : $BD['type']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Nghề nghiệp</label>
                        <input type="text" class="form-control" name="barcode" id="validationCustom02" value="<?php echo isset($_POST['barcode']) ? $_POST['barcode'] : $BD['barcode']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Ngày cấp thẻ</label>
                        <input type="text" class="form-control" name="dose" id="validationCustom02" value="<?php echo isset($_POST['dose']) ? $_POST['dose'] : $BD['dose']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Ngày hết hạn</label>
                        <input type="text" class="form-control" name="dose" id="validationCustom02" value="<?php echo isset($_POST['dose']) ? $_POST['dose'] : $BD['dose']?>" required>
                    </div><div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Địa chỉ </label>
                        <input type="text" class="form-control" name="dose" id="validationCustom02" value="<?php echo isset($_POST['dose']) ? $_POST['dose'] : $BD['dose']?>" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>