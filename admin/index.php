<?php
include "../config/constants.php";
include "./partials/header.php";
?>


<div class="container-fluid px-0">
    <!-- Dashboard card start -->
    <div class="row me-0">
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_bills = "SELECT * FROM phieudangkitour";
                //Execute Query
                $res_bills = $conn->query($sql_bills);
                //Count Rows
                $count_bills = $res_bills->num_rows;
                ?>
                <h2 class="card-title d-inline"> <?php echo $count_bills ?> </h2>
                <i class="bi bi-receipt-cutoff icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Hóa đơn</h6>
        </div>
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_tours = "SELECT * FROM tour";
                //Execute Query
                $res_tours = $conn->query($sql_tours);
                //Count Rows
                $count_tours = $res_tours->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_tours ?></h2>
                <i class="fas fa-plane-departure icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Tour</h6>
        </div>
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_users = "SELECT * from nguoidung";
                //Execute Query
                $res_users = $conn->query($sql_users);
                //Count Rows
                $count_users = $res_users->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_users ?></h2>
                <i class="fas fa-users icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Người dùng</h6>
        </div>
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_partners = "SELECT * FROM doitac";
                //Execute Query
                $res_partners = $conn->query($sql_partners);
                //Count Rows
                $count_partners = $res_partners->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_partners ?></h2>
                <i class="fas fa-handshake icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Đối tác</h6>
        </div>
        <div class="col-lg my-1 mx-2 card text-center shadow dashboard-card">
            <div class="card-body">
                <?php
                //Sql Query 
                $sql_admins = "SELECT * FROM nhanvien";
                //Execute Query
                $res_admins = $conn->query($sql_admins);
                //Count Rows
                $count_admins = $res_admins->num_rows;
                ?>
                <h2 class="card-title d-inline"><?php echo $count_admins ?></h2>
                <i class="fas fa-user-shield icon"></i>
            </div>
            <h6 class="card-subtitle text-muted me-auto">Admin</h6>
        </div>
    </div>
    <!-- Dashboard card end -->
    <!--  -->
    <div class="row">
        <div class="col-md-12 recent-bills me-4 ms-2 shadow">
            <div class="d-flex justify-content-between">
                <h3 class="">Người dùng mới đăng ký</h3>
                <?php
                $sql_recent_users = "SELECT * FROM nguoidung ORDER BY thoiGianXacMinhEmail desc LIMIT 0,10";
                $res_recent_users = $conn->query($sql_recent_users);
                if ($res_recent_users->num_rows > 0) {
                ?>
                    <a type="button" href="./pages/manage-user/index.php" class="btn btn-primary ms-auto">Xem tất cả</a>
            </div>
            <!--  -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Mã người dùng</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Tình trạng</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($rows_recent_users = $res_recent_users->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $rows_recent_users['maNguoiDung'] ?></th>
                            <td><?php echo $rows_recent_users['hoVaTen'] ?></td>
                            <td><?php echo $rows_recent_users['gioiTinh'] ?></td>
                            <td><?php echo $rows_recent_users['soDienThoai'] ?></td>

                            <?php
                            if ($rows_recent_users['tinhTrang'] == 1) {
                            ?>
                                <td class="pt-2 m-0"><span class="px-1 py-2" style="color: green;border-radius: 5px; width: 100px;">Bình thường</span></td>
                            <?php
                            }
                            if ($rows_recent_users['tinhTrang'] == 2) {
                            ?>
                                <td><span class="p-1" style="color: orange;border-radius: 5px;width: 100px;">Không hoạt động</span></td>
                            <?php
                            }
                            if ($rows_recent_users['tinhTrang'] == 0) {
                            ?>
                                <td><span class="p-1" style="color: grey;border-radius: 5px;width: 100px;">Chưa xác thực</span></td>
                            <?php
                            }
                            ?>

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
</div>



<!--  -->
</div>




<!--  -->
<?php include "./partials/footer.php" ?>