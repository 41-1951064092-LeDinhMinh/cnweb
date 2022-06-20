<?php
include "../../../config/constants.php";

if (isset($_POST['tableID'])) {
    $page = $_POST['page'];
    $numRow = $_POST['numRow'];
    $sortBy = $_POST['sortBy'];

    $sqlTotalRow    = "SELECT * FROM tour WHERE maCongTy = '{$_SESSION['partnerAccount']}'";
    $totalRow       = $conn->query($sqlTotalRow)->num_rows;
    $numPage        = ceil($totalRow / $numRow);
    $start          = ($page - 1) * $numRow;
    $sql            = $sqlTotalRow . " ORDER BY $sortBy" . " LIMIT $start, $numRow";
    $result         = $conn->query($sql);


    if ($totalRow > 0) {
?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <span class="me-2 mt-2">Đang xem trang <strong><?php echo $page ?></strong> trong tổng số <strong><?php echo $numPage ?></strong> </span>
                <li class="page-item <?php echo ($page == 1 ? 'disabled' : '') ?>">
                    <a class="page-link btnPreviousTours" type="button" aria-label="Previous" data-page="<?php echo $page ?>" data-numrow="<?php echo $numRow ?>" data-sort_by="<?php echo $sortBy ?>">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item">
                    <input type="text" class="page-link px-2" autocomplete="off" value="<?php echo $page ?>" data-numrow="<?php echo $numRow ?>" data-sort_by="<?php echo $sortBy ?>" data-numpage="<?php echo $numPage ?>" id="currentPageTours" style="width: 50px;">
                </li>
                <li class="page-item <?php echo ($page == $numPage ? 'disabled' : '') ?>">
                    <a class="page-link btnNextTours" type="button" aria-label="Next" data-page="<?php echo $page ?>" data-numrow="<?php echo $numRow ?>" data-sort_by="<?php echo $sortBy ?>">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã tour</th>
                    <th scope="col">Tên tour</th>
                    <th scope="col">Ngày khởi hành</th>
                    <th scope="col" class="d-none d-md-table-cell">Loại hình</th>
                    <th scope="col">Tình trạng</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = $start;
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"><?= ++$i ?></th>
                        <td><?= $row['maTour']; ?></td>
                        <td><?= $row['tenTour']; ?></td>
                        <td><?= $row['ngayKhoiHanh']; ?></td>
                        <td class="d-none d-md-table-cell"><?= $row['loaiHinh']; ?></td>
                        <?php
                        if ($row['tinhTrang'] == 1) {
                        ?>
                            <td class="pt-2 m-0"><span class="px-1 py-2" style="background-color: rgb(52, 52, 238);color: white;border-radius: 5px;">Bình thường</span></td>
                        <?php
                        }
                        if ($row['tinhTrang'] == 2) {
                        ?>
                            <td><span class="p-1" style="background-color: orange; color: white;border-radius: 5px;">Không hoạt động</span></td>
                        <?php
                        }
                        if ($row['tinhTrang'] == 3) {
                        ?>
                            <td><span class="p-1" style="background-color: rgb(0, 180, 24);color: white;border-radius: 5px;">Đã hoàn thành</span></td>
                        <?php
                        }
                        ?>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                    if ($row['tinhTrang'] == 1) {
                                    ?>
                                        <li><a type="button" data-tour_id="<?php echo $row['maTour'] ?>" class="disableTour dropdown-item">Dừng hoạt động</a></li>
                                    <?php
                                    }
                                    if ($row['tinhTrang'] == 2) {
                                    ?>
                                        <li><a type="button" data-tour_id="<?php echo $row['maTour'] ?>" class="activateTour dropdown-item">Kích hoạt lại</a></li>
                                    <?php
                                    }
                                    ?>

                                    <li><a data-tour_id="<?php echo $row['maTour'] ?>" id="editTour" class="dropdown-item">Sửa thông tin</a></li>
                                    <li><a type="button" data-tour_id="<?php echo $row['maTour'] ?>" class="deleteTour dropdown-item text-danger" type="button">Xóa</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
    ?>
        <div class="col-md-12 h-50 d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-binoculars text-muted" style="font-size: 80px;"></i>
            <p class="text-muted fs-3">Chưa có dữ liệu</p>
        </div>


<?php
    }
    //



    //
}


?>