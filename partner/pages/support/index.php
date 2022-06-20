<?php
include "../../../config/constants.php";
include "../../partials/header.php";
?>

<div class="container-fluid px-0">
    <?php //$_SESSION['sendMailSPSuccess'] = "tehr" 
    ?>
    <div class="row me-0">
        <?php
        if (isset($_SESSION['sendMailSPSuccess'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show pb-0" role="alert">
                <strong>Thành công!</strong> Đã tạo thành công yêu cầu hỗ trợ. Mã vé: <strong><?php echo $_SESSION['sendMailSPSuccess']; ?></strong>
                <p class="pt-1">Chúng tôi sẽ phản hồi lại yêu cầu hỗ trợ vào hòm thư của bạn của bạn trong thời gian sớm nhất.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            unset($_SESSION['sendMailSPSuccess']);
        }
        ?>
        <!--  -->
        <div class="col-md-12 bg-light shadow px-0" style="border-radius: 5px;">
            <div class="col-m-12 bg-light pt-3">
                <h5 class="ms-3 text-muted">Tao vé hỗ trợ</h5>
                <hr>
            </div>
            <!--  -->
            <div class="col-md-12 input-group row">
                <!-- Form input mail -->
                <form class="col-md-12 mb-4" action="proccess-send-mail-support.php" method="post" autocomplete="off">
                    <div class="input-group mb-3">
                        <h6 class="me-5 fw-bold mt-2 ms-4">Tiêu đề <span class="text-danger"></span></h6>
                        <input required="required" type="text" id="mailSuppTitle" class="form-control" name="mail-supp-title" style="margin-left: 32px;">
                    </div>
                    <div class="input-group mb-4">
                        <h6 class="me-5 fw-bold mt-2 ms-4" style="min-height: 400px;">Nội dung</h6>
                        <textarea required="required" class="form-control ms-3" name="mail-supp-content" aria-label="With textarea"></textarea>
                    </div>
                    <!--  -->
                    <!--  -->
                    <hr>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary me-0" type="submit" id="btn-send-mail-supp" name="btnMailSendSupp">Tạo vé hỗ trợ</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>






<?php include "../../partials/footer.php"; ?>