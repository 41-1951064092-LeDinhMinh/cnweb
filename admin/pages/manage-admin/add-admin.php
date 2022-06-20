<?php
include "../../../config/constants.php";
include "../../partials/header.php";
?>

<div class="container-fluid px-0">
    <div class="row me-0">
        <?php
        if (isset($_SESSION['addAdminSuccess'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Đã tạo thành công tài khoản quản trị: <strong><?php echo $_SESSION['addAdminSuccess']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            unset($_SESSION['addAdminSuccess']);
        }
        ?>
        <h3 class="title px-0">Thêm quản trị viên</h3>
        <div class="col-md-12 shadow px-0" style="background-color: white;">
            <div class="col-m-12 info-admin bg-light pt-3">
                <h5 class="ms-3 text-muted">Thông tin tài khoản</h5>
                <hr>
            </div>
            <!--  -->
            <div class="col-md-12 input-group row">
                <!-- Form input -->
                <form class="col-md-12 mb-4" action="proccess-add-admin.php" method="post" autocomplete="off">
                    <div class="input-group mb-3">
                        <h6 class="me-5 fw-bold mt-2 ms-4">Mã nhân viên <span class="text-danger">(*)</span></h6>
                        <input required type="text" id="addAdminId" class="form-control" name="add-admin-id" style="margin-left: 20px;">
                        <p id="adminIdHelp" class="form-text"></p>
                    </div>
                    <!--  -->
                    <div class="input-group mb-3">
                        <h6 class="me-4 fw-bold mt-2 ms-4">Họ và tên <span class="text-danger">(*)</span></h6>
                        <input required type="text" id="addAdminName" class="form-control" name="add-admin-name" style="margin-left: 73px;">
                    </div>
                    <!--  -->
                    <div class="input-group mb-3">
                        <h6 class="me-3 fw-bold mt-2 ms-4">Username <span class="text-danger">(*)</span></h6>
                        <input required type="text" id="addAdminUsername" class="form-control" name="add-admin-username" style="margin-left: 78px;">
                        <p id="adminUsernameHelp" class="form-text"></p>
                    </div>
                    <!--  -->
                    <div class="row col-md-12 ms-2">
                        <div class="input-group mb-3 col-md">
                            <h6 class="me-3 fw-bold mt-2 ms-1">Mật khẩu<span class="text-danger">(*)</span></h6>
                            <input required type="password" id="addAdminPass" name="add-admin-pass" class="form-control" style="margin-left: 87px;">
                        </div>
                        <div class="input-group mb-3 col-md pe-2">
                            <h6 class="me-2 fw-bold mt-2 ms-1">Nhập lại mật khẩu<span class="text-danger">(*)</span></h6>
                            <input required type="password" id="addAdminPassRepeat" class="form-control" name="add-admin-pass-repeat" style="margin-left: 28px;">
                            <p id="adminPassRepeatHelp" class="form-text"></p>
                        </div>
                    </div>
                    <!--  -->
                    <div class="input-group mb-3">
                        <h6 class="me-3 fw-bold mt-2 ms-4">Ngày sinh <span class="text-danger">(*)</span></h6>
                        <input required type="date" id="addBirthday" class="form-control" name="add-admin-birthday" style="margin-left: 78px;" value="<?php echo date("Y-m-d") ?>" min="1800-01-01" max="<?php echo date("Y-m-d") ?>">
                    </div>
                    <!--  -->
                    <div class="input-group mb-3">
                        <h6 class="me-3 fw-bold mt-2 ms-4">Giới tính <span class="text-danger">(*)</span></h6>
                        <input required type="text" id="addAdminGender" class="form-control" name="add-admin-gender" style="margin-left: 87px;">
                    </div>
                    <!--  -->
                    <div class="input-group mb-3">
                        <h6 class="me-3 fw-bold mt-2 ms-4">Số điện thoại<span class="text-danger">(*)</span></h6>
                        <input required type="text" id="addAdminPhone" class="form-control" name="add-admin-phone" style="margin-left: 56px;">
                        <p id="adminPhoneHelp" class="form-text"></p>
                    </div>
                    <!--  -->
                    <div class="input-group mb-3">
                        <h6 class="me-4 fw-bold mt-2 ms-4">Email <span class="text-danger">(*)</span></h6>
                        <input required type="text" id="addAdminEmail" class="form-control" name="add-admin-email" style="margin-left: 102px;">
                        <p id="adminEmailHelp" class="form-text"></p>
                    </div>
                    <hr>
                    <!--  -->
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary me-0" type="submit" id="btnAddAdmin" name="btn-add-admin">Tạo tài khoản quản trị</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>




<?php include "../../partials/footer.php"; ?>