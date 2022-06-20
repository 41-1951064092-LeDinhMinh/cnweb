<?php
include "../../../config/constants.php";
include "../../partials/header.php";
?>


<div class="container-fluid px-0">
    <?php
    if (isset($_SESSION['editPartnerSuccess'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Đã cập nhận thành công thông tin tài khoản.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['editPartnerSuccess']);
    }
    ?>
    <!--  -->
    <?php
    if (isset($_SESSION['editPartnerPassSuccess'])) {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Đã cập nhận mật khẩu thành công
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['editPartnerPassSuccess']);
    }
    ?>
    <!--  -->
    <?php
    if (isset($_SESSION['editPartnerPassError'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['editPartnerPassError'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['editPartnerPassError']);
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
            <img src="<?php echo SITEURL . "assets/images/partners/$partnerAvatarName" ?>" alt="avatar" style="max-width: 100%;border-radius:50%;border: 1px solid">
            <h5><?php echo $infoPartner['tenCongTy']  ?></h5>
        </div>
        <!--  -->
        <div class="col-12 col-md-12 mt-4">
            <form class="col-md-12 mb-4" action="edit-info-partner.php" method="post" autocomplete="off">
                <div class="input-group mb-3">
                    <h6 class="me-5 fw-bold mt-2 ms-4">Mã công ty</h6>
                    <input disabled="disable" type="text" class="form-control" value="<?php echo $infoPartner['maCongTy']  ?>" style="margin-left: 20px;">
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-4 fw-bold mt-2 ms-4">Tên Công Ty</h6>
                    <input required type="text" id="editPartnerName" class="form-control" name="edit-partner-name" value="<?php echo $infoPartner['tenCongTy']  ?>" style="margin-left: 36px;">
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-3 fw-bold mt-2 ms-4">Số điện thoại</h6>
                    <input required type="tel" id="editPartnerPhone" class="form-control" name="edit-partner-phone" value="<?php echo $infoPartner['soDienThoai']  ?>" style="margin-left: 36px;">
                    <p id="editPartnerPhoneHelp" class="form-text"></p>
                </div>
                <!--  -->
                <div class="input-group mb-3">
                    <h6 class="me-4 fw-bold mt-2 ms-4">Email</h6>
                    <input required type="email" id="editPartnerEmail" class="form-control" name="edit-partner-email" value="<?php echo $infoPartner['email']  ?>" style="margin-left: 87px;">
                    <p id="editPartnerEmailHelp" class="form-text"></p>
                </div>
                <div class="input-group mb-3">
                    <h6 class="me-3 fw-bold mt-2 ms-4">Địa chỉ</h6>
                    <input required type="text" id="editPartnerAddr" class="form-control" name="edit-partner-addr" value="<?php echo $infoPartner['diaChi']  ?>" style="margin-left: 84px;">
                </div>
                <!--  -->
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary me-0" type="submit" id="btnEditPartner" name="btn-edit-partner">Chỉnh sửa thông tin</button>
                </div>
                <hr>
            </form>
            <!-- Form change password -->
            <form class="col-md-12 mb-4" action="change-password-partner.php" method="post" autocomplete="off">
                <h5 class="ms-0 text-muted mb-3">Thay đổi mật khẩu</h5>
                <div class="input-group mb-3 col-md">
                    <h6 class="me-3 fw-bold mt-2 ms-1">Mật khẩu hiện tại</h6>
                    <input required type="password" id="editPartnerPassOld" name="edit-partner-pass-old" class="form-control" style="margin-left: 60px;">
                </div>
                <div class="input-group mb-3 col-md">
                    <h6 class="me-3 fw-bold mt-2 ms-1">Mật khẩu mới</h6>
                    <input required type="password" id="editPartnerPassNew" name="edit-partner-pass-new" class="form-control" style="margin-left: 87px;">
                </div>
                <div class="input-group mb-3 col-md pe-2">
                    <h6 class="me-2 fw-bold mt-2 ms-1">Nhập lại mật khẩu mới</h6>
                    <input required type="password" id="editPartnerPassRepeat" class="form-control" name="edit-partner-pass-repeat" style="margin-left: 28px;">
                    <p id="editPartnerPassRepeatHelp" class="form-text"></p>
                </div>
                <div class="d-flex justify-content-end">
                    <button disabled class="btn btn-danger me-3" type="submit">Xóa tài khoản</button>
                    <button class="btn btn-primary me-0" type="submit" id="btnEditPassPartner" name="btn-edit-pass-partner">Đổi mật khẩu</button>
                </div>
                <hr>
            </form>

        </div>



    </div>
</div>



<?php include "../../partials/footer.php"; ?>