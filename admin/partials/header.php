<?php

//Include login-check.php file in directory contain header.php file
include dirname(__FILE__) . '/login-check.php';

$cur_dir_arr = explode('\\', getcwd()); // Get path of current directory and push to array
$current_page_folder = $cur_dir_arr[count($cur_dir_arr) - 1]; // Get name of current folder in array
//echo $current_page_folder;
$currentFileName =  basename($_SERVER['REQUEST_URI']);

//Sql Query 
$sql_admin = "SELECT * FROM nhanvien Where username = '{$_SESSION['adminAccount']}'";
//Execute Query
$resultInfoAd = $conn->query($sql_admin);
//Count Rows
$infoAdmin = $resultInfoAd->fetch_assoc();

$currentFileName =  basename($_SERVER['REQUEST_URI']);

$adminAvatarName = $infoAdmin['hinhAnh'];
if ($adminAvatarName == "") {
  if ($infoAdmin['gioiTinh'] == "Nam") {
    $adminAvatarName = "default-avatar-male.png";
  } elseif ($infoAdmin['gioiTinh'] == "Nữ") {
    $adminAvatarName = "default-avatar-female.png";
  } else {
    $adminAvatarName = "default-avatar-male.png";
  }
}

?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php
          echo ($current_page_folder == "admin" ? "Quản trị hệ thống - Thống kê" : "");
          echo ($current_page_folder == "manage-user" ? "Quản trị hệ thống - Quản lý người dùng" : "");
          echo ($current_page_folder == "manage-tour" ? "Quản trị hệ thống - Quản lý Tour" : "");
          echo ($current_page_folder == "manage-partner" ? "Quản trị hệ thống - Quản lý đối tác" : "");
          echo ($current_page_folder == "manage-admin" ? "Quản trị hệ thống - Quản lý admin" : "");
          echo ($current_page_folder == "profile" ? "Quản trị hệ thống - Hồ sơ" : "");
          echo ($current_page_folder == "mail-box" ? "Quản trị hệ thống - Hộp thư" : "");
          ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?php echo SITEURL ?>admin/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="<?php echo SITEURL ?>/admin/js/script.js"></script>
</head>

<body>


  <!-- Offcanvas sidebar start -->
  <div class="container sidebar off-sidebar offcanvas offcanvas-start" id="offcanvassidebar">
    <div class="sidebar-avatar">
      <img class="avatar" src="<?php echo SITEURL . "admin/images/$adminAvatarName" ?>" alt="">
      <h3 class="mt-3"><?php echo $infoAdmin['hoVaTen']  ?></h3>
    </div>
    <!-- Offcanvas menu-->
    <div class="sidebar-menu">
      <ul class="">
        <li>
          <a href="<?php echo SITEURL . "admin/" ?>" class="nav-link link-light <?php echo ($current_page_folder == "admin" ? "active" : "") ?>">
            <i class="bi bi-speedometer2"></i>
            <span class="sidebar-item-text">Thống kê</span>
          </a>
        </li>
        <hr>
        <li>
          <a href="<?php echo SITEURL . "admin/pages/manage-tour/" ?>" class="nav-link link-light <?php echo ($current_page_folder == "manage-tour" ? "active" : "") ?>">
            <i class="fas fa-plane-departure"></i>
            <span class="sidebar-item-text">Tour</span>
          </a>
        </li>
        <hr>
        <li>
          <a href="#" class="nav-link link-light user-btn">
            <i class="bi bi-person-circle"></i>
            <span class="sidebar-item-text">Quản lý người dùng</span>
            <span class="fas fa-caret-down user-caret <?php echo ($current_page_folder == "manage-user" ? "rotate" : "") ?>"></span>
          </a>
          <ul class="user-show <?php echo ($current_page_folder == "manage-user" ? "show" : "") ?>">
            <li>
              <a href="<?php echo SITEURL . "admin/pages/manage-user/add-user.php" ?>" class=" <?php echo ($currentFileName == "add-user.php" ? "active" : "") ?>">Thêm người dùng</a>
            </li>
            <li><a href="<?php echo SITEURL . "admin/pages/manage-user/index.php" ?>" class=" <?php echo ($current_page_folder == "manage-user" && $currentFileName == "index.php" ? "active" : "") ?>">Danh sách người dùng</a></li>
          </ul>
        </li>
        <hr>
        <li>
          <a href="#" class="nav-link link-light partner-btn">
            <i class="fas fa-handshake"></i>
            <span class="sidebar-item-text">Quản lý đối tác</span>
            <span class="fas fa-caret-down partner-caret <?php echo ($current_page_folder == "manage-partner" ? "rotate" : "") ?>"></span>
          </a>
          <ul class="partner-show <?php echo ($current_page_folder == "manage-partner" ? "show" : "") ?>">
            <li>
              <a href="<?php echo SITEURL . "admin/pages/manage-partner/add-partner.php" ?>" class=" <?php echo ($currentFileName == "add-partner.php" ? "active" : "") ?>">Thêm đối tác</a>
            </li>
            <li><a href="<?php echo SITEURL . "admin/pages/manage-partner/index.php" ?>" class=" <?php echo ($current_page_folder == "manage-partner" && $currentFileName == "index.php" ? "active" : "") ?>">Danh sách đối tác</a></li>
          </ul>
        </li>
        <!-- <li>
              <a href="#" class="nav-link link-light">
                <i class="bi bi-receipt-cutoff me-3"></i>
                <span class="sidebar-item-text">Hóa đơn</span>
              </a>
            </li> -->
        <hr>
        <li>
          <a href="#" class="nav-link link-light admin-btn">
            <i class="fas fa-user-shield"></i>
            <span class="sidebar-item-text">Quản lý Admin</span>
            <span class="fas fa-caret-down admin-caret <?php echo ($current_page_folder == "manage-admin" ? "rotate" : "") ?>"></span>
          </a>
          <ul class="admin-show <?php echo ($current_page_folder == "manage-admin" ? "show" : "") ?>">
            <li>
              <a href="<?php echo SITEURL . "admin/pages/manage-admin/add-admin.php" ?>" class=" <?php echo ($currentFileName == "add-admin.php" ? "active" : "") ?>">Thêm Admin</a>
            </li>
            <li><a href="<?php echo SITEURL . "admin/pages/manage-admin/index.php" ?>" class=" <?php echo ($current_page_folder == "manage-admin" && $currentFileName == "index.php" ? "active" : "") ?>">Danh sách Admin</a></li>
          </ul>
        </li>

        <hr style="width: 100%;" ;>
        <li>
          <a href="<?php echo SITEURL . "admin/pages/profile/" ?>" class="nav-link link-light <?php echo ($current_page_folder == "profile" ? "active" : "") ?>">
            <i class="bi bi-person"></i>
            <span class="sidebar-item-text">Hồ sơ</span>
          </a>
        </li>
        <li>
          <a href="<?php echo SITEURL . "admin/pages/mail-box/" ?>" class="nav-link link-light <?php echo ($current_page_folder == "mail-box" ? "active" : "") ?>">
            <i class="bi bi-envelope"></i>
            <span class="sidebar-item-text">Hộp thư</span>
          </a>
        </li>
      </ul>
      <!-- Footer start -->
      <div class="container footer pb-0 text-light">
        <hr>
        <h6>Nhóm 2&copy;</h6>
        <p>Dương Văn Công, <span>Lê Công Minh</span></p>
        <p>Lê Đình Minh</p>
      </div>
      <!-- Footer end -->
    </div>
    <!-- Offcanvas menu-->
  </div>
  <!-- Offcanvas sidebar end -->


  <!-- Main -->
  <div class="container-fluid main" style="margin-top: 0px;">
    <div class="row">
      <!-- Main left -->
      <!-- Sidebar start -->
      <div class="col container sidebar sidebar-show">
        <div class="sidebar-avatar">
          <img class="avatar" src="<?php echo SITEURL . "admin/images/$adminAvatarName" ?>" alt="">
          <h3 class="mt-3"><?php echo $infoAdmin['hoVaTen']  ?></h3>
        </div>
        <!-- Sidebar menu -->
        <div class="sidebar-menu">
          <ul class="">
            <li>
              <a href="<?php echo SITEURL . "admin/" ?>" class="nav-link link-light <?php echo ($current_page_folder == "admin" ? "active" : "") ?>">
                <i class="bi bi-speedometer2"></i>
                <span class="sidebar-item-text">Thống kê</span>
              </a>
            </li>
            <hr>
            <li>
              <a href="<?php echo SITEURL . "admin/pages/manage-tour/" ?>" class="nav-link link-light <?php echo ($current_page_folder == "manage-tour" ? "active" : "") ?>">
                <i class="fas fa-plane-departure"></i>
                <span class="sidebar-item-text">Tour</span>
              </a>
            </li>
            <hr>
            <li>
              <a href="#" class="nav-link link-light user-btn">
                <i class="bi bi-person-circle"></i>
                <span class="sidebar-item-text">Quản lý người dùng</span>
                <span class="fas fa-caret-down user-caret <?php echo ($current_page_folder == "manage-user" ? "rotate" : "") ?>"></span>
              </a>
              <ul class="user-show <?php echo ($current_page_folder == "manage-user" ? "show" : "") ?>">
                <li>
                  <a href="<?php echo SITEURL . "admin/pages/manage-user/add-user.php" ?>" class=" <?php echo ($currentFileName == "add-user.php" ? "active" : "") ?>">Thêm người dùng</a>
                </li>
                <li><a href="<?php echo SITEURL . "admin/pages/manage-user/index.php" ?>" class=" <?php echo ($current_page_folder == "manage-user" && $currentFileName == "index.php" ? "active" : "") ?>">Danh sách người dùng</a></li>
              </ul>
            </li>
            <hr>
            <li>
              <a href="#" class="nav-link link-light partner-btn">
                <i class="fas fa-handshake"></i>
                <span class="sidebar-item-text">Quản lý đối tác</span>
                <span class="fas fa-caret-down partner-caret <?php echo ($current_page_folder == "manage-partner" ? "rotate" : "") ?>"></span>
              </a>
              <ul class="partner-show <?php echo ($current_page_folder == "manage-partner" ? "show" : "") ?>">
                <li>
                  <a href="<?php echo SITEURL . "admin/pages/manage-partner/add-partner.php" ?>" class=" <?php echo ($currentFileName == "add-partner.php" ? "active" : "") ?>">Thêm đối tác</a>
                </li>
                <li><a href="<?php echo SITEURL . "admin/pages/manage-partner/index.php" ?>" class=" <?php echo ($current_page_folder == "manage-partner" && $currentFileName == "index.php" ? "active" : "") ?>">Danh sách đối tác</a></li>
              </ul>
            </li>
            <!-- <li>
              <a href="#" class="nav-link link-light">
                <i class="bi bi-receipt-cutoff me-3"></i>
                <span class="sidebar-item-text">Hóa đơn</span>
              </a>
            </li> -->
            <hr>
            <li>
              <a href="#" class="nav-link link-light admin-btn">
                <i class="fas fa-user-shield"></i>
                <span class="sidebar-item-text">Quản lý Admin</span>
                <span class="fas fa-caret-down admin-caret <?php echo ($current_page_folder == "manage-admin" ? "rotate" : "") ?>"></span>
              </a>
              <ul class="admin-show <?php echo ($current_page_folder == "manage-admin" ? "show" : "") ?>">
                <li>
                  <a href="<?php echo SITEURL . "admin/pages/manage-admin/add-admin.php" ?>" class=" <?php echo ($currentFileName == "add-admin.php" ? "active" : "") ?>">Thêm Admin</a>
                </li>
                <li><a href="<?php echo SITEURL . "admin/pages/manage-admin/index.php" ?>" class=" <?php echo ($current_page_folder == "manage-admin" && $currentFileName == "index.php" ? "active" : "") ?>">Danh sách Admin</a></li>
              </ul>
            </li>

            <hr style="width: 100%;" ;>
            <li>
              <a href="<?php echo SITEURL . "admin/pages/profile/" ?>" class="nav-link link-light <?php echo ($current_page_folder == "profile" ? "active" : "") ?>">
                <i class="bi bi-person"></i>
                <span class="sidebar-item-text">Hồ sơ</span>
              </a>
            </li>
            <li>
              <a href="<?php echo SITEURL . "admin/pages/mail-box/" ?>" class="nav-link link-light <?php echo ($current_page_folder == "mail-box" ? "active" : "") ?>">
                <i class="bi bi-envelope"></i>
                <span class="sidebar-item-text">Hộp thư</span>
              </a>
            </li>
          </ul>

          <!-- Footer start -->
          <div class="container footer pb-0 text-light">
            <hr>
            <h6>Nhóm 2&copy;</h6>
            <p>Dương Văn Công, <span>Lê Công Minh</span></p>
            <p>Lê Đình Minh</p>
          </div>
          <!-- Footer end -->

        </div>
        <!-- Sidebar menu end-->
      </div>
      <!-- Main left end -->


      <!-- Main right -->
      <div class="col main-right container-fluid">
        <!-- Header start-->
        <header class="container-fluid px-0 sticky-top">
          <i class="fas fa-bars fixed-top hide btn-menu d-none d-md-inline" id="btn-menu" type="button"></i>
          <i class="fas fa-bars fixed-top hide btn-menu d-inline d-md-none" id="btn-menu-offcanvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvassidebar"></i>
          <div class="row">
            <div class="col-md-12 px-0">
              <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid px-2">
                  <img class="ms-0" src="<?php echo SITEURL ?>admin/images/logo-white.png" height="40px">
                  <span class="ms-2 text-light fs-3">Administration</span>
                  <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <h5 class="navbar-brand text-light my-1 me-2"><?php echo $infoAdmin['hoVaTen']  ?></h5>
                      </li>
                    </ul>
                  </div>
                  <!-- Header right -->
                  <div class="h-right">
                    <div class="dropdown">
                      <i class="bi bi-person-circle me-3 nav-user-icon" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"></i>
                      <ul class="dropdown-menu dropdown-menu-end" style="width: 200px; height: 200px; display: flexbox;" aria-labelledby="dropdownMenuLink">
                        <li class="ms-3">
                          <h5 class=" mt-5"><?php echo $infoAdmin['hoVaTen'] ?></h5>
                        </li>
                        <div style="position: absolute; bottom: 10px;width: 100%;">

                          <li><a class="dropdown-item" href="<?php echo SITEURL . "admin/pages/profile/" ?>"><i class="bi bi-person-circle me-1" style="font-size: 20px;"></i>Hồ sơ</a></li>
                          <li>
                            <hr class="my-1">
                            <a class="dropdown-item text-danger" href="<?php echo SITEURL ?>admin/logout.php">
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

        <!-- Main content start -->