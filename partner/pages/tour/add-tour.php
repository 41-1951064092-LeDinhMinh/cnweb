<?php
include "../../../config/constants.php";
include "../../partials/header.php";
?>

<div class="container-fluid px-0">
    <div class="row me-0">
        <?php
        if (isset($_SESSION['addTourSuccess'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Thành công!</strong> Đã tạo thành công tour. Mã tour: <strong><?php echo $_SESSION['addTourSuccess']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
        unset($_SESSION['addTourSuccess']);
        }
        ?>
        <h3 class="title px-0">Thêm tour</h3>
        <div class="col-md-12 send-ticket shadow px-0" style="background-color: white;">
            <div class="col-m-12 info-tour bg-light pt-3">
                <h5 class="ms-3 text-muted">Thông tin tour</h5>
                <hr>
            </div>
            <!--  -->
            <div class="col-md-12 input-group row">
                <!-- Form input -->
                <form class="col-md-12 mb-4 form-send-ticket" action="proccess-add-tour.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="input-group mb-3">
                        <h6 class="me-5 fw-bold mt-2 ms-4">Tiêu đề <span class="text-danger">(*)</span></h6>
                        <input type="text" id="addTourTitle" class="form-control" name="add-tour-title" style="margin-left: 32px;">
                    </div>
                    <div class="input-group mb-3">
                        <h6 class="me-4 fw-bold mt-2 ms-4">Loại hình <span class="text-danger">(*)</span></h6>
                        <input type="text" id="addTourType" class="form-control" name="add-tour-type" style="margin-left: 42px;">
                    </div>
                    <div class="row col-md-12 ms-2">
                        <div class="input-group mb-3 col-md">
                            <h6 class="me-3 fw-bold mt-2 ms-1">Mã tour</h6>
                            <input type="text" id="addTourID" name="add-tour-id" class="form-control" style="margin-left: 83px;">
                            <p id="tourIdHelp" class="form-text"></p>
                        </div>
                        <div class="input-group mb-3 col-md pe-2">
                            <h6 class="me-2 fw-bold mt-2 ms-1">Hình ảnh</h6>
                            <input type="file" name="add-tour-image" class="form-control" style="margin-left: 83px; margin-right:5px;">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <h6 class="me-3 fw-bold mt-2 ms-4">Nơi khởi hành <span class="text-danger">(*)</span></h6>
                        <input type="text" id="addTourtourPlaceDeparture" class="form-control" name="add-tour-place-departure" style="margin-left: 14px;">
                    </div>
                    <div class="input-group mb-3">
                        <h6 class="me-3 fw-bold mt-2 ms-4">Nơi đến <span class="text-danger">(*)</span></h6>
                        <input type="text" id="addTourtourPlaceDestination" class="form-control" name="add-tour-place-destination" style="margin-left: 60px;">
                    </div>
                    <div class="row col-md-12 ms-2">
                        <div class="input-group mb-3 col-md">
                            <h6 class="me-3 fw-bold mt-2 ms-1">Ngày khởi hành <span class="text-danger">(*)</span></h6>
                            <input type="date" id="addTourDepartureDay" class="form-control" name="add-tour-departure-day" style="margin-left: 0px;" name="trip-start" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>" max="2099-01-01">
                        </div>
                        <div class="input-group mb-3 col-md pe-2">
                            <h6 class="me-2 fw-bold mt-2 ms-1">Ngày kết thúc <span class="text-danger">(*)</span></h6>
                            <input type="date" id="addTourEndDate" class="form-control" name="add-tour-end-date" style="margin-left: 22px; margin-right:5px;" name="trip-start" value="<?php echo date("Y-m-d") ?>" min="<?php echo date("Y-m-d") ?>" max="2099-01-01">
                            <p id="tourEndDateHelp" class="form-text"></p>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <h6 class="me-5 fw-bold mt-2 ms-4">Mô tả</h6>
                        <textarea class="form-control ms-5" name="add-tour-description" aria-label="With textarea"></textarea>
                    </div>
                    <hr>
                    <h6 class="ms-4 text-muted">Giá tour <span class="fw-bold">(Đơn vị: VNĐ)</span></h6>
                    <!--  -->
                    <div class="row col-md-12 ms-2">
                        <div class="input-group mb-3 col-md">
                            <input id="cbPriceChildren" class="form-check-input me-2 ms-3" type="checkbox">
                            <label class="form-check-label" for="inlineCheckbox1">Trẻ em</label>
                            <input type="text" id="tourChildrenPrice" class="form-control" name="add-tour-children" style="margin-left: 40px;" placeholder="Tùy chọn" disabled="disabled">
                        </div>
                        <div class="input-group mb-3 col-md">
                            <label class="form-check-label ms-3 me-3" for="inlineCheckbox2">Người lớn</label>
                            <input type="text" id="tourAdultPrice" class="form-control ms-4" name="add-tour-adult" style="margin-left: 17px;">
                        </div>
                        <div class="input-group mb-3 col-md">
                            <input id="cbPriceOlder" class="form-check-input me-2 ms-3" type="checkbox">
                            <label class="form-check-label" for="inlineCheckbox3">Người già</label>
                            <input type="text" id="tourOlderPrice" class="form-control" name="add-tour-older" style="margin-left: 17px;" placeholder="Tùy chọn" disabled="disabled">
                        </div>
                    </div>
                    <!--  -->
                    <hr>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary me-0" type="submit" id="btn-add-tour" name="btnAddTour">Tạo tour du lịch</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>




<?php include "../../partials/footer.php"; ?>