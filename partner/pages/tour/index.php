<?php
include "../../../config/constants.php";
include "../../partials/header.php";
?>

<div class="container-fluid px-0">
    <div class="row me-0">
        <!--  -->
        <h3 class="text-muted">Thống kê tour</h3>
        <div class="col-md-12 form-search-tour shadow">
            <form class="d-flex">
                <div class="col ms-3">
                    <p>Từ ngày:</p>
                    <input type="date" class="shadow" id="start-date-tour" name="trip-start" value="2020-01-01" min="2018-01-01" max="2099-01-01">
                </div>
                <div class="col">
                    <p>Đến ngày:</p>
                    <input type="date" id="end-date-tour" name="trip-start" value="2020-01-01" min="2018-01-01" max="2099-01-01">
                </div>
            </form>
            <div class="mt-4 ms-3">
                <a id="add-tour" class="btn" type="button" href="add-tour.php"><i class="bi bi-plus-circle-fill me-1"></i>Thêm tour</a>
                <button id="refresh-tour" type="button"><i class="fas fa-sync me-1"></i>Làm mới</button>
                <button id="search-tour" type="button"><i class="fas fa-search me-1"></i>Tìm kiếm</button>
                <button id="export-tour" type="button"><i class="fas fa-download me-1"></i></i>Xuất ra Excel</button>
            </div>
        </div>

        <div class="d-none alert alert-success alert-dismissible show fade pb-3 pt-2" role="alert">
            <p id="alert-success-content" class="d-inline"></p><strong id="alert-success-taget"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="col-md-12 table-show-tour shadow">
            <h3 class="text-danger"><i class="fas fa-plane-departure me-1"></i>DANH SÁCH TOUR</h3>
            <div id="table-tour">
            </div>

        </div>



        <!--  -->
    </div>
</div>






<?php include "../../partials/footer.php"; ?>