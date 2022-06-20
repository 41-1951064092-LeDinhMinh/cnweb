<?php
include "../../../config/constants.php";
include "../../partials/header.php";
?>

<div class="container-fluid px-0">
    <div class="row me-0">
        <!--  -->
        <h3 class="text-muted">Thống kê người dùng</h3>
        <div class="col-md-12 form-search-user shadow">
            <div class="input-group mb-3 w-75 mt-3">
                <!-- <h6 class="me-5 fw-bold mt-2 ms-4">Tiêu đề <span class="text-danger">(*)</span></h6> -->
                <input type="text" id="txtSearchUser" class="form-control ms-3" name="add-tour-title" placeholder="Nhập gì đó để tìm kiếm. vd: sdt, email, tên,...">
            </div>
            <div class="mt-4 ms-3">
                <button id="refresh-user" type="button"><i class="fas fa-sync me-1"></i>Làm mới</button>
                <button id="search-user" type="button"><i class="fas fa-search me-1"></i>Tìm kiếm</button>
                <button id="export-user" type="button"><i class="fas fa-download me-1"></i></i>Xuất ra Excel</button>
            </div>
        </div>
        <div class="d-none alert alert-success alert-dismissible show fade pb-3 pt-2" role="alert">
            <p id="alert-success-content" class="d-inline"></p><strong id="alert-success-taget"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="col-md-12 table-show-user shadow">
            <h3 class="text-danger"><i class="fas fa-users me-1"></i>DANH SÁCH NGƯỜI DÙNG</h3>
            <div id="table-users">
            </div>
        </div>

        <!--  -->
    </div>
</div>






<?php include "../../partials/footer.php"; ?>