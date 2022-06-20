<?php

// Set for testing
//$_SESSION['partnerAccount'] = "CT001";

include dirname(__FILE__) . '/login-check.php';

$cur_dir_arr = explode('\\', getcwd()); // Get path of current directory and push to array
$current_page_folder = $cur_dir_arr[count($cur_dir_arr) - 1]; // Get name of current folder in array
//echo $current_page_folder;
$currentFileName =  basename($_SERVER['REQUEST_URI']);

//Sql Query 
$sql_partner = "SELECT * FROM doitac Where maCongTy = '{$_SESSION['partnerAccount']}'";
//Execute Query
$resultInfoPartner = $conn->query($sql_partner);
$infoPartner = $resultInfoPartner->fetch_assoc();

$partnerAvatarName = $infoPartner['hinhAnh'];

if ($partnerAvatarName == "") {
  $partnerAvatarName = "partner.png";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đối tác</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo SITEURL ?>partner/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?php echo SITEURL ?>partner/js/script.js"></script>
</head>

<body>



  <!-- Offcanvas sidebar start -->
  <div class="container sidebar off-sidebar offcanvas offcanvas-start mt-0" id="offcanvassidebar">
    <div class="sidebar-avatar">
      <img class="avatar" src="<?php echo SITEURL . "assets/images/partners/$partnerAvatarName" ?>" alt="">
      <h3 class="mt-3"><?php echo $infoPartner['tenCongTy'] ?></h3>
    </div>
    <!-- Offcanvas menu start-->
    <div class="sidebar-menu">
      <ul class="">
        <li>
          <a href="<?php echo SITEURL . "partner/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "partner" ? "active" : "") ?>">
            <i class="bi bi-speedometer2"></i>
            <span class="sidebar-item-text">Thống kê</span>
          </a>
        </li>
        <hr>
        <!-- <li>
              <a href="#" class="nav-link link-dark">
                <i class="bi bi-person-circle"></i>
                <span class="sidebar-item-text">Khách hàng</span>
              </a>
            </li> -->
        <hr>
        <li>
          <a href="<?php echo SITEURL . "partner/pages/appointment/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "appointment" ? "active" : "") ?>">
            <i class="bi bi-calendar-check"></i>
            <span class="sidebar-item-text">Lịch hẹn</span>
          </a>
        </li>
        <hr>
        <li>
          <a class="nav-link link-dark tour-btn">
            <i class="fas fa-route"></i>
            <span class="sidebar-item-text">Quản lý tour</span>
            <span class="fas fa-caret-down tour-caret <?php echo ($current_page_folder == "tour" ? "rotate" : "") ?>"></span>
          </a>
          <ul class="tour-show <?php echo ($current_page_folder == "tour" ? "show" : "") ?>">
            <li>
              <a href="<?php echo SITEURL . "partner/pages/tour/add-tour.php" ?>" class=" <?php echo ($currentFileName == "add-tour.php" ? "active" : "") ?>">Thêm tour</a>
            </li>
            <li><a href="<?php echo SITEURL . "partner/pages/tour/index.php" ?>" class=" <?php echo ($current_page_folder == "tour" && $currentFileName == "index.php" ? "active" : "") ?>">Danh sách tour</a></li>
          </ul>
        </li>
        <hr>
        <li>
          <a href="<?php echo SITEURL . "partner/pages/bill/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "bill" ? "active" : "") ?>">
            <i class="bi bi-receipt-cutoff me-3"></i>
            <span class="sidebar-item-text">Hóa đơn</span>
          </a>
        </li>
        <hr>
        <li>
          <a href="<?php echo SITEURL . "partner/pages/reve-expe/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "" ? "active" : "") ?>">
            <i class="bi bi-cash-coin"></i>
            <span class="sidebar-item-text">Thu chi</span>
          </a>
        </li>

        <hr style="width: 100%;" ;>
        <li>
          <a href="<?php echo SITEURL . "partner/pages/profile/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "profile" ? "active" : "") ?>">
            <i class="bi bi-person"></i>
            <span class="sidebar-item-text">Hồ sơ</span>
          </a>
        </li>
        <li>
          <a href="<?php echo SITEURL . "partner/pages/support/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "support" ? "active" : "") ?>">
            <i class="bi bi-question-square"></i>
            <span class="sidebar-item-text">Hỗ trợ</span>
          </a>
        </li>
      </ul>
      <!-- Offcanvas menu end-->

      <!-- Footer start -->
      <div class="container footer pb-1">
        <hr>
        <h6>Nhóm 2&copy;</h6>
        <p>Dương Văn Công, <span>Lê Công Minh</span></p>
        <p>Lê Đình Minh</p>
      </div>
      <!-- Footer end -->

    </div>
  </div>

  <!-- Offcanvas sidebar end -->





  <!-- Header start-->
  <header class="container-fluid fixed-top">
    <div class="row">
      <div class="col-md-12 px-0">

        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid px-2">
            <i class="bi bi-list me-2 btn-menu d-none d-md-inline" id="btn-menu" type="button"></i>
            <i class="bi bi-list me-2 btn-menu d-inline d-md-none" id="btn-menu-offcanvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvassidebar"></i>
            <img class="me-auto" src="<?php echo SITEURL ?>partner/images/logo.png" height="40px">
            </button>
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <h5 class="navbar-brand my-1 me-2"><?php echo $infoPartner['tenCongTy'] ?></h5>
                </li>
              </ul>
            </div>
            <!-- Header right -->
            <div class="h-right">
              <div class="dropdown">
                <i class="bi bi-person-circle me-3 nav-user-icon" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"></i>
                <ul class="dropdown-menu dropdown-menu-end" style="width: 200px; height: 200px; display: flexbox;" aria-labelledby="dropdownMenuLink">
                  <li class="ms-3">
                    <h5 class=" mt-5"><?php echo $infoPartner['tenCongTy'] ?></h5>
                  </li>
                  <div style="position: absolute; bottom: 10px;width: 100%;">

                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-1" style="font-size: 20px;"></i>Profile</a></li>
                    <li>
                      <hr class="my-1">
                      <a class="dropdown-item text-danger" href="<?php echo SITEURL ?>partner/logout.php">
                        <i class="fas fa-sign-out-alt me-1" style="font-size: 20px;"></i></i>Đăng xuất</a>
                    </li>
                  </div>
                </ul>
              </div>

            </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- Header end -->


  <!-- Main start -->
  <div class="container-fluid main" style="margin-top: 60px;">
    <div class="row">

      <!-- Sidebar start -->
      <div class="container sidebar sidebar-show">
        <div class="sidebar-avatar">
          <img class="avatar" src="<?php echo SITEURL . "assets/images/partners/$partnerAvatarName" ?>" alt="">
          <h3 class="mt-3"><?php echo $infoPartner['tenCongTy'] ?></h3>
        </div>
        <!-- Sidebar menu start-->
        <div class="sidebar-menu">
          <ul class="">
            <li>
              <a href="<?php echo SITEURL . "partner/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "partner" ? "active" : "") ?>">
                <i class="bi bi-speedometer2"></i>
                <span class="sidebar-item-text">Thống kê</span>
              </a>
            </li>
            <hr>
            <!-- <li>
              <a href="#" class="nav-link link-dark">
                <i class="bi bi-person-circle"></i>
                <span class="sidebar-item-text">Khách hàng</span>
              </a>
            </li> -->
            <hr>
            <li>
              <a href="<?php echo SITEURL . "partner/pages/appointment/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "appointment" ? "active" : "") ?>">
                <i class="bi bi-calendar-check"></i>
                <span class="sidebar-item-text">Lịch hẹn</span>
              </a>
            </li>
            <hr>
            <li>
              <a class="nav-link link-dark tour-btn">
                <i class="fas fa-route"></i>
                <span class="sidebar-item-text">Quản lý tour</span>
                <span class="fas fa-caret-down tour-caret <?php echo ($current_page_folder == "tour" ? "rotate" : "") ?>"></span>
              </a>
              <ul class="tour-show <?php echo ($current_page_folder == "tour" ? "show" : "") ?>">
                <li>
                  <a href="<?php echo SITEURL . "partner/pages/tour/add-tour.php" ?>" class=" <?php echo ($currentFileName == "add-tour.php" ? "active" : "") ?>">Thêm tour</a>
                </li>
                <li><a href="<?php echo SITEURL . "partner/pages/tour/index.php" ?>" class=" <?php echo ($current_page_folder == "tour" && $currentFileName == "index.php" ? "active" : "") ?>">Danh sách tour</a></li>
              </ul>
            </li>
            <hr>
            <li>
              <a href="<?php echo SITEURL . "partner/pages/bill/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "bill" ? "active" : "") ?>">
                <i class="bi bi-receipt-cutoff me-3"></i>
                <span class="sidebar-item-text">Hóa đơn</span>
              </a>
            </li>
            <hr>
            <li>
              <a href="<?php echo SITEURL . "partner/pages/reve-expe/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "" ? "active" : "") ?>">
                <i class="bi bi-cash-coin"></i>
                <span class="sidebar-item-text">Thu chi</span>
              </a>
            </li>

            <hr style="width: 100%;" ;>
            <li>
              <a href="<?php echo SITEURL . "partner/pages/profile/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "profile" ? "active" : "") ?>">
                <i class="bi bi-person"></i>
                <span class="sidebar-item-text">Hồ sơ</span>
              </a>
            </li>
            <li>
              <a href="<?php echo SITEURL . "partner/pages/support/" ?>" class="nav-link link-dark <?php echo ($current_page_folder == "support" ? "active" : "") ?>">
                <i class="bi bi-question-square"></i>
                <span class="sidebar-item-text">Hỗ trợ</span>
              </a>
            </li>
          </ul>

          <!-- Footer start -->
          <div class="container footer pb-1">
            <hr>
            <h6>Nhóm 2&copy;</h6>
            <p>Dương Văn Công, <span>Lê Công Minh</span></p>
            <p>Lê Đình Minh</p>
          </div>
          <!-- Footer end -->

        </div>
      </div>
      <!-- Sidebar end -->

      <!-- Modal confirm start -->
      <div class="modal fade" id="modal-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content modal-confirm">
            <div class="modal_header w-100">
              <i class="bi bi-question-circle icon"></i>
            </div>
            <h2 class="px-4 mt-2 mb-0 modal-confirm-title mt-2 mb-4">Xác nhận</h2>
            <p id="modal-confirm-message"></p><b id="modal-confirm-taget"></b>
            <div class="btn-footer">
              <button type="button" class="btn btn-secondary p-0 mx-4" data-bs-dismiss="modal">Hủy</button>
              <button type="button" class="btn btn-success p-0 mx-4" id="btn-confirm-modal">Xác nhận</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal confirm end -->


      <!-- Content start-->
      <div class="col main-right container-fluid">