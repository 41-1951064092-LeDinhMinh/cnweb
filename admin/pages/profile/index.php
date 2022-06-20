<?php
include "../../../config/constants.php";
include "../../partials/header.php";
?>


<div class="container-fluid px-0">
    <?php
    if (isset($_SESSION['editAdminSuccess'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Đã cập nhận thành công thông tin tài khoản: <strong><?php echo $_SESSION['editAdminSuccess']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['editAdminSuccess']);
    }
    ?>
    <!--  -->
    <?php
    if (isset($_SESSION['editAdminPassSuccess'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Đã cập nhận mật khẩu thành công
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['editAdminPassSuccess']);
    }
    ?>
    <!--  -->
    <?php
    if (isset($_SESSION['editAdminPassError'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['editAdminPassError'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['editAdminPassError']);
    }
    ?>
    <!--  -->
    <div class="row me-0 px-0 shadow row" style="min-height: 90vh;background-color:white;border-radius:5px">
        <div class="col-md-12 bg-light pt-3" style="border-radius:5px;height:fit-content">
            <h5 class="ms-3 text-muted">Thông tin tài khoản</h5>
            <hr class="mb-0">
        </div>
        <!--  -->
        <div class="col-4 col-md-2 avatar-container ms-3 mt-3" style="width: 250px;">
            <img src="<?php echo SITEURL . "admin/images/$adminAvatarName" ?>" alt="avatar" style="max-width: 100%;border-radius:50%;border: 1px solid">
            <h5><?php echo $infoAdmin['hoVaTen']  ?></h5>
        </div>
        <!--  -->
        <div class="col-12 col-md-12 mt-4">
            <form class="col-md-12 mb-4" action="edit-info-admin.php" method="post" autocomplete="off">
                <div class="input-group mb-3">
                    <h6 class="me-5 fw-bold mt-2 ms-4">Mã nhân viên</h6>
                    <input disabled="disable" type="text" id="editAdminId" class="form-control" name="edit-admin-id" value="<?php echo $infoAdmin['maNhanVien']  ?>" style="margin-left: 20px;">
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-4 fw-bold mt-2 ms-4">Họ và tên</h6>
                    <input required type="text" id="editAdminName" class="form-control" name="edit-admin-name" value="<?php echo $infoAdmin['hoVaTen']  ?>" style="margin-left: 73px;">
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-3 fw-bold mt-2 ms-4">Username</h6>
                    <input required type="text" id="editAdminUsername" class="form-control" name="edit-admin-username" value="<?php echo $infoAdmin['username']  ?>" style="margin-left: 78px;">
                    <p id="editAdminUsernameHelp" class="form-text"></p>
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-3 fw-bold mt-2 ms-4">Ngày sinh</h6>
                    <input required type="date" id="editAdminBirthday" class="form-control" name="edit-admin-birthday" value="<?php echo $infoAdmin['ngaySinh']  ?>" style="margin-left: 78px;" min="1800-01-01" max="<?php echo date("Y-m-d") ?>">
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-3 fw-bold mt-2 ms-4">Giới tính</h6>
                    <input required type="text" id="editAdminGender" class="form-control" name="edit-admin-gender" value="<?php echo $infoAdmin['gioiTinh']  ?>" style="margin-left: 87px;">
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-3 fw-bold mt-2 ms-4">Số điện thoại</h6>
                    <input required type="tel" id="editAdminPhone" class="form-control" name="edit-admin-phone" value="<?php echo $infoAdmin['soDienThoai']  ?>" style="margin-left: 56px;">
                    <p id="editAdminPhoneHelp" class="form-text"></p>
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-4 fw-bold mt-2 ms-4">Email</h6>
                    <input required type="email" id="editAdminEmail" class="form-control" name="edit-admin-email" value="<?php echo $infoAdmin['email']  ?>" style="margin-left: 102px;">
                    <p id="editAdminEmailHelp" class="form-text"></p>
                </div>
                <!--  -->
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary me-0" type="submit" id="btnEditAdmin" name="btn-edit-admin">Chỉnh sửa thông tin</button>
                </div>
                <hr>
            </form>
            <!-- Form change password -->
            <form class="col-md-12 mb-4" action="change-password-admin.php" method="post" autocomplete="off">
            <h5 class="ms-0 text-muted mb-3">Thay đổi mật khẩu</h5>
                <div class="input-group mb-3 col-md">
                    <h6 class="me-3 fw-bold mt-2 ms-1">Mật khẩu hiện tại</h6>
                    <input required type="password" id="editAdminPassOld" name="edit-admin-pass-old" class="form-control" style="margin-left: 60px;">
                </div>
                <div class="input-group mb-3 col-md">
                    <h6 class="me-3 fw-bold mt-2 ms-1">Mật khẩu mới</h6>
                    <input required type="password" id="editAdminPassNew" name="edit-admin-pass-new" class="form-control" style="margin-left: 87px;">
                </div>
                <div class="input-group mb-3 col-md pe-2">
                    <h6 class="me-2 fw-bold mt-2 ms-1">Nhập lại mật khẩu mới</h6>
                    <input required type="password" id="editAdminPassRepeat" class="form-control" name="edit-admin-pass-repeat" style="margin-left: 28px;">
                    <p id="editadminPassRepeatHelp" class="form-text"></p>
                </div>
                <div class="d-flex justify-content-end">
                <button disabled class="btn btn-danger me-3" type="submit" name="btn-delete-admin-account">Xóa tài khoản</button>
                    <button class="btn btn-primary me-0" type="submit" id="btnEditPassAdmin" name="btn-edit-pass-admin">Đổi mật khẩu</button>
                </div>
                <hr>
            </form>

        </div>



    </div>
</div>



<?php include "../../partials/footer.php"; ?>