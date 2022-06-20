<?php
include "../config/constants.php";
include "./partials/header.php";
?>

<div class="container-fluid px-0">
    <div class="row me-0">
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                $today = date("Y-m-d");
                //Sql Query 
                $sql_daily_bills = "SELECT * FROM phieudangkitour, tour WHERE phieudangkitour.maTour = tour.maTour and tour.maCongTy = '{$_SESSION['partnerAccount']}' and thoiGianDat BETWEEN '$today 00:00:00' and '$today 23:59:59'";
                //Execute Query
                $res_sql_daily_bills = $conn->query($sql_daily_bills);
                //Count Rows
                $count_daily_bills = $res_sql_daily_bills->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_daily_bills ?></h2>
                <i class="bi bi-receipt-cutoff icon"><sub class="fs-5">today</sub></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto mt-3">Hóa đơn mới trong ngày</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_bills = "SELECT * FROM phieudangkitour, tour WHERE phieudangkitour.maTour = tour.maTour and tour.maCongTy = '{$_SESSION['partnerAccount']}'";
                //Execute Query
                $res_bills = $conn->query($sql_bills);
                //Count Rows
                $count_bills = $res_bills->num_rows;
                ?>
                <h2 class="card-title d-inline ms-"><?php echo $count_bills ?></h2>
                <i class="bi bi-receipt-cutoff icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto mt-3">Tổng hóa đơn</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_tours = "SELECT * FROM tour WHERE maCongTy = '{$_SESSION['partnerAccount']}'";
                //Execute Query
                $res_tours = $conn->query($sql_tours);
                //Count Rows
                $count_tours = $res_tours->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_tours ?></h2>
                <i class="fas fa-plane-departure icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto mt-2">Tour</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_customers = "SELECT distinct maNguoiDung FROM phieudangkitour, tour WHERE phieudangkitour.maTour = tour.maTour and tour.maCongTy = '{$_SESSION['partnerAccount']}'";
                //Execute Query
                $res_customers = $conn->query($sql_customers);
                //Count Rows
                $count_customers = $res_customers->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_customers ?></h2>
                <i class="fas fa-users icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto mt-2">Khách hàng</h6>
        </div>
        <div class="col-lg col-md-3 my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_bills = "SELECT SUM(tongTien) as thuNhap FROM phieudangkitour, tour WHERE phieudangkitour.maTour = tour.maTour and phieudangkitour.tinhTrang = 2 and tour.maCongTy = '{$_SESSION['partnerAccount']}'";
                //Execute Query
                $res_income = $conn->query($sql_bills);
                //Count Rows
                $income = $res_income->fetch_assoc()['thuNhap'];
                ($income != NULL ? $income : "0");
                if ($income > 100000) {
                    $income = ($income / 1000000) . " <span class='fs-4'> Tr </span>";
                } else if ($income > 1000000000) {
                    $income = ($income / 1000000000) . " <span class='fs-4'> Tỷ </span>";
                }
                ?>
                <h2 class=" ms-1card-title d-inline"><?php echo ($income != "" ? $income : "0") ?></h2>
                <i class="fas icon fs-2">VND</i>
            </div>
            <h6 class="card-subtitle text-muted me-auto mt-2"> Tổng thu nhập</h6>
        </div>
    </div>

    <!--  -->
    <!--  -->
    <div class="row">
        <div class="col-md-7 recent-bills me-4 ms-2 shadow">
            <div class="d-flex justify-content-between">
                <h3 class="">Hóa đơn gần đây</h3>
                <?php
                $sql_recent_bills = "SELECT * FROM phieudangkitour, tour WHERE phieudangkitour.maTour = tour.maTour and tour.maCongTy = '{$_SESSION['partnerAccount']}' ORDER BY thoiGianDat desc LIMIT 0,10";
                $res_recent_bills = $conn->query($sql_recent_bills);
                if ($res_recent_bills->num_rows > 0) {
                ?>
                    <a type="button" href="./pages/bill/index.php" class="btn btn-primary ms-auto">Xem tất cả</a>
            </div>
            <!--  -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Tình trạng</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($rows_recent_bills = $res_recent_bills->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $rows_recent_bills['maPhieuTour'] ?></th>
                            <td><?php echo $rows_recent_bills['tongTien'] ?></td>
                            <td><?php echo $rows_recent_bills['tinhTrang'] ?></td>
                        </tr>

                    <?php
                    }
                } else {
                    ?>
        </div>
        <div class="col-md-12 h-50 d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-binoculars text-muted" style="font-size: 80px;"></i>
            <p class="text-muted fs-3">Chưa có dữ liệu</p>

        </div>
    <?php
                }

    ?>
    </tbody>
    </table>
    </div>
    <div class="col-md-4 recent-users shadow">
    <div class="col-md-12 h-50 d-flex flex-column justify-content-center align-items-center">
        <i class="bi bi-binoculars text-muted" style="font-size: 80px;"></i>
        <p class="text-muted fs-3">Chưa có dữ liệu</p>
    </div>
</tbody>
</table>
</div>
</div>


</div>










<!--  -->
<?php include "./partials/footer.php" ?>