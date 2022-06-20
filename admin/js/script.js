$(document).ready(function () {
  // For click menu button, show/hide sidebar
  $("#btn-menu").click(function () {
    $(".sidebar").toggleClass("sidebar-show");
    $(".main-right").toggleClass("show");
    $("#btn-menu").toggleClass("hide");
  });

  // Expand subpage in sidebar menu
  $(".user-btn").click(function () {
    $(".sidebar-menu ul .user-show").toggleClass("show");
    $(".sidebar-menu ul .user-caret").toggleClass("rotate");
  });
  $(".partner-btn").click(function () {
    $(".sidebar-menu ul .partner-show").toggleClass("show");
    $(".sidebar-menu ul .partner-caret").toggleClass("rotate");
  });
  $(".admin-btn").click(function () {
    $(".sidebar-menu ul .admin-show").toggleClass("show");
    $(".sidebar-menu ul .admin-caret").toggleClass("rotate");
  });

  //

  // --------------------- Script for manage user page ------------------------------
  function showUsersData(tableID, page, numRow, sortBy) {
    $.ajax({
      url: "get-users-data.php",
      type: "POST",
      data: {
        tableID: tableID,
        page: page,
        numRow: numRow,
        sortBy: sortBy,
      },
      success: function (data) {
        $("#table-users").html(data);
      },
    });
  }
  //
  showUsersData("table-users", 1, 10, "id asc");

  var modalConfirmEl = document.querySelector("#modal-confirm");
  var modalConfirm = bootstrap.Modal.getOrCreateInstance(modalConfirmEl);

  //
  // Activate user
  $(document).on("click", ".activateUser", function () {
    var userID = $(this).data("user_id");
    $("#modal-confirm-message").text("Kích hoạt tài khoản");
    $("#modal-confirm-taget").text(userID);
    modalConfirm.show();

    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "activate-user.php",
        type: "POST",
        data: { userID: userID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showUsersData("table-users", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text(
              "Đã kích hoạt thành công tài khoản "
            );
            $("#alert-success-taget").text(userID);
          } else {
            //alert("Lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Lỗi");
        },
      });
      modalConfirm.hide();
    });
  });

  // Disable user
  $(document).on("click", ".disableUser", function () {
    var userID = $(this).data("user_id");
    $("#modal-confirm-message").text("Vô hiệu hóa tài khoản");
    $("#modal-confirm-taget").text(userID);
    modalConfirm.show();
    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "disable-user.php",
        type: "POST",
        data: { userID: userID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showUsersData("table-users", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text(
              "Đã vô hiệu hóa thành công tài khoản "
            );
            $("#alert-success-taget").text(userID);
          } else {
            //alert("Lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Lỗi");
        },
      });
      modalConfirm.hide();
    });
  });

  // Delete user
  $(document).on("click", ".deleteUser", function () {
    var userID = $(this).data("user_id");
    $("#modal-confirm-message").text("Xóa tài khoản");
    $("#modal-confirm-taget").text(userID);
    modalConfirm.show();
    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "delete-user.php",
        type: "POST",
        data: { userID: userID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showUsersData("table-users", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text("Đã xóa thành công tài khoản ");
            $("#alert-success-taget").text(userID);
          } else {
            alert("Đã xảy ra lỗi khi xóa");
          }
        },
        error: function (jqXHR, exception) {
          alert("Đã xảy ra lỗi khi xóa");
        },
      });
      modalConfirm.hide();
    });
  });

  //

  // Event click next page button
  $(document).on("click", ".btnNextUsers", function () {
    // Get values from button
    //var tableID = $(this).data("table_id");
    var page = $(this).data("page") + 1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showUsersData("table-user", page, numRow, sortBy);
    // Set url
    // var url     = "?table=" + tableID + "&page=" + page + "&numrow=" + numRow + "&sortby=" + sortBy;
    // history.pushState(null, "", url);
  });

  // Event click previous page button
  $(document).on("click", ".btnPreviousUsers", function () {
    // Get values from button
    var page = $(this).data("page") + -1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showUsersData("table-user", page, numRow, sortBy);
  });

  $(document).on("change", "#currentPageUsers", function () {
    // Get values from input
    var val = $(this).val();
    var numPage = $(this).data("numpage");
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Check value
    if (val > 0 && val <= numPage && val != "" && $.isNumeric(val)) {
      // Show data for new page
      showUsersData("table-user", val, numRow, sortBy);
    } else {
      // If input wrong
      $(this).css("border", "solid red").css("border-radius", "3px");
    }
  });

  //
  $("#refresh-user").on("click", function () {
    showUsersData("table-user", 1, 10, "id asc");
  });

  // --------------------- Script for manage tour page ---------------------------
  function showToursData(tableID, page, numRow, sortBy) {
    $.ajax({
      url: "get-tours-data.php",
      type: "POST",
      data: {
        tableID: tableID,
        page: page,
        numRow: numRow,
        sortBy: sortBy,
      },
      success: function (data) {
        $("#table-tour").html(data);
      },
    });
  }

  //
  showToursData("table-tour", 1, 10, "id asc");
  //
  // Activate tour
  $(document).on("click", ".activateTour", function () {
    var tourID = $(this).data("tour_id");
    $("#modal-confirm-message").text("Kích hoạt tour");
    $("#modal-confirm-taget").text(tourID);
    modalConfirm.show();

    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "activate-tour.php",
        type: "POST",
        data: { tourID: tourID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showToursData("table-tour", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text("Đã kích hoạt thành công tour ");
            $("#alert-success-taget").text(tourID);
          } else {
            //alert("Lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Lỗi");
        },
      });
      modalConfirm.hide();
    });
  });

  // Disable tour
  $(document).on("click", ".disableTour", function () {
    var tourID = $(this).data("tour_id");
    $("#modal-confirm-message").text("Dừng hoạt động tour");
    $("#modal-confirm-taget").text(tourID);
    modalConfirm.show();

    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "disable-tour.php",
        type: "POST",
        data: { tourID: tourID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showToursData("table-tour", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text("Đã dừng hoạt động tour ");
            $("#alert-success-taget").text(tourID);
          } else {
            //alert("Lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Lỗi");
        },
      });
      modalConfirm.hide();
    });
  });

  // Delete tour
  $(document).on("click", ".deleteTour", function () {
    var tourID = $(this).data("tour_id");
    $("#modal-confirm-message").text("Xóa tour");
    $("#modal-confirm-taget").text(tourID);
    modalConfirm.show();

    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "delete-tour.php",
        type: "POST",
        data: { tourID: tourID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showToursData("table-tour", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text("Đã xóa thành công tour ");
            $("#alert-success-taget").text(tourID);
          } else {
            //alert("Đã xảy ra lỗi khi xóa");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Đã xảy ra lỗi khi xóa");
        },
      });
      modalConfirm.hide();
    });
  });
  //
  // Event click next page button
  $(document).on("click", ".btnNextTours", function () {
    // Get values from button
    var page = $(this).data("page") + 1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showToursData("table-tour", page, numRow, sortBy);
  });

  // Event click previous page button
  $(document).on("click", ".btnPreviousTours", function () {
    // Get values from button
    var page = $(this).data("page") + -1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showToursData("table-tour", page, numRow, sortBy);
  });

  $(document).on("change", "#currentPageTours", function () {
    // Get values from input
    var val = $(this).val();
    var numPage = $(this).data("numpage");
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Check value
    if (val > 0 && val <= numPage && val != "" && $.isNumeric(val)) {
      // Show data for new page
      showToursData("table-tour", val, numRow, sortBy);
      // Set url
    } else {
      $(this).css("border", "solid red").css("border-radius", "3px");
    }
  });

  //
  $("#refresh-tour").on("click", function () {
    showToursData("table-tour", 1, 10, "id asc");
  });

  //

  // --------------------- Script for manage admin page ------------------------------
  function showAdminsData(tableID, page, numRow, sortBy) {
    $.ajax({
      url: "get-admins-data.php",
      type: "POST",
      data: {
        tableID: tableID,
        page: page,
        numRow: numRow,
        sortBy: sortBy,
      },
      success: function (data) {
        $("#table-admins").html(data);
      },
    });
  }
  //
  showAdminsData("table-admins", 1, 10, "id asc");

  var modalConfirmEl = document.querySelector("#modal-confirm");
  var modalConfirm = bootstrap.Modal.getOrCreateInstance(modalConfirmEl);

  //

  // Activate admin
  $(document).on("click", ".activateAdmin", function () {
    var adminID = $(this).data("admin_id");
    $("#modal-confirm-message").text("Kích hoạt tài khoản");
    $("#modal-confirm-taget").text(adminID);
    modalConfirm.show();

    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "activate-admin.php",
        type: "POST",
        data: { adminID: adminID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showAdminsData("table-admins", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text(
              "Đã kích hoạt thành công tài khoản "
            );
            $("#alert-success-taget").text(adminID);
          } else {
            //alert("Lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Lỗi");
        },
      });
      modalConfirm.hide();
    });
  });

  // Disable admin
  $(document).on("click", ".disableAdmin", function () {
    var adminID = $(this).data("admin_id");
    $("#modal-confirm-message").text("Vô hiệu hóa tài khoản");
    $("#modal-confirm-taget").text(adminID);
    modalConfirm.show();
    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "disable-admin.php",
        type: "POST",
        data: { adminID: adminID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showAdminsData("table-admins", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text(
              "Đã vô hiệu hóa thành công tài khoản "
            );
            $("#alert-success-taget").text(adminID);
          } else {
            //alert("Lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Lỗi");
        },
      });
      modalConfirm.hide();
    });
  });

  // Delete admin
  $(document).on("click", ".deleteAdmin", function () {
    var adminID = $(this).data("admin_id");
    $("#modal-confirm-message").text("Xóa tài khoản");
    $("#modal-confirm-taget").text(adminID);
    modalConfirm.show();
    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "delete-admin.php",
        type: "POST",
        data: { adminID: adminID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showAdminsData("table-admins", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text("Đã xóa thành công tài khoản ");
            $("#alert-success-taget").text(adminID);
          } else {
            //alert("Đã xảy ra lỗi khi xóa");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Đã xảy ra lỗi khi xóa");
        },
      });
      modalConfirm.hide();
    });
  });

  //

  // Event click next page button
  $(document).on("click", ".btnNextAdmins", function () {
    // Get values from button
    var page = $(this).data("page") + 1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showAdminsData("table-admin", page, numRow, sortBy);
  });

  // Event click previous page button
  $(document).on("click", ".btnPreviousAdmins", function () {
    // Get values from button
    var page = $(this).data("page") + -1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showAdminsData("table-admin", page, numRow, sortBy);
  });

  $(document).on("change", "#currentPageAdmins", function () {
    // Get values from input
    var val = $(this).val();
    var numPage = $(this).data("numpage");
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Check value
    if (val > 0 && val <= numPage && val != "" && $.isNumeric(val)) {
      // Show data for new page
      showAdminsData("table-admin", val, numRow, sortBy);
      // Set url
    } else {
      $(this).css("border", "solid red").css("border-radius", "3px");
    }
  });

  //
  $("#refresh-admin").on("click", function () {
    showAdminsData("table-admin", 1, 10, "id asc");
  });

  // Script for Add admin page ----------------
  // Check admin id
  $("#addAdminId").on("change", function () {
    var id = $(this).val();
    $.ajax({
      url: "check-info-admin.php",
      type: "POST",
      data: { id: id },
      success: function (data) {
        var result = $.trim(data);
        if (result == id) {
          $("#adminIdHelp").text("Mã nhân viên đã tồn tại!");
          $("#adminIdHelp").css("color", "red");
          $("#btnAddAdmin").prop("disabled", true);
        } else {
          $("#adminIdHelp").text("");
          $("#btnAddAdmin").prop("disabled", false);
        }
      },
    });
  });

  // Check admin account name
  $("#addAdminUsername").on("change", function () {
    var accName = $(this).val();
    $.ajax({
      url: "check-info-admin.php",
      type: "POST",
      data: { accName: accName },
      success: function (data) {
        var result = $.trim(data);
        if (result == accName) {
          $("#adminUsernameHelp").text("Tên tài khoản đã tồn tại!");
          $("#adminUsernameHelp").css("color", "red");
          $("#btnAddAdmin").prop("disabled", true);
        } else {
          $("#adminUsernameHelp").text("");
          $("#btnAddAdmin").prop("disabled", false);
        }
      },
    });
  });

  // Check admin phone number
  $("#addAdminPhone").on("change", function () {
    var phone = $(this).val();
    $.ajax({
      url: "check-info-admin.php",
      type: "POST",
      data: { phone: phone },
      success: function (data) {
        var result = $.trim(data);
        if (result == phone) {
          $("#adminPhoneHelp").text("Số điện thoại nhân viên đã tồn tại!");
          $("#adminPhoneHelp").css("color", "red");
          $("#btnAddAdmin").prop("disabled", true);
        } else {
          $("#adminPhoneHelp").text("");
          $("#btnAddAdmin").prop("disabled", false);
        }
      },
    });
  });

  // Check admin email
  $("#addAdminEmail").on("change", function () {
    var email = $(this).val();
    $.ajax({
      url: "check-info-admin.php",
      type: "POST",
      data: { email: email },
      success: function (data) {
        var result = $.trim(data);
        if (result == email) {
          $("#adminEmailHelp").text("Email đã tồn tại!");
          $("#adminEmailHelp").css("color", "red");
          $("#btnAddAdmin").prop("disabled", true);
        } else {
          $("#adminEmailHelp").text("");
          $("#btnAddAdmin").prop("disabled", false);
        }
      },
    });
  });

  // Check password and password repeat
  $("#addAdminPassRepeat").on("change", function () {
    if ($(this).val() != $("#addAdminPass").val()) {
      $("#adminPassRepeatHelp").text("Mật khẩu không khớp!");
      $("#adminPassRepeatHelp").css("color", "red");
      $("#btnAddAdmin").prop("disabled", true);
    } else {
      $("#adminPassRepeatHelp").text("");
      $("#btnAddAdmin").prop("disabled", false);
    }
  });

  //
  // ----------------------- Script for Admin profile page --------------
  // Check admin account name
  $("#editAdminUsername").on("change", function () {
    var accName = $(this).val();

    $.ajax({
      url: "check-info-edit-admin.php",
      type: "POST",
      data: { accName: accName },
      success: function (data) {
        var result = $.trim(data);
        if (result == accName) {
          $("#editAdminUsernameHelp").text("Tên tài khoản đã tồn tại!");
          $("#editAdminUsernameHelp").css("color", "red");
          $("#btnAddAdmin").prop("disabled", true);
        } else {
          $("#editAdminUsernameHelp").text("");
          $("#btnAddAdmin").prop("disabled", false);
        }
      },
    });
  });

  // Check admin phone number
  $("#editAdminPhone").on("change", function () {
    var phone = $(this).val();
    $.ajax({
      url: "check-info-edit-admin.php",
      type: "POST",
      data: { phone: phone },
      success: function (data) {
        var result = $.trim(data);
        if (result == phone) {
          $("#editAdminPhoneHelp").text("Số điện thoại đã tồn tại!");
          $("#editAdminPhoneHelp").css("color", "red");
          $("#btnEditAdmin").prop("disabled", true);
        } else {
          $("#editAdminPhoneHelp").text("");
          $("#btnEditAdmin").prop("disabled", false);
        }
      },
    });
  });

  // Check admin email
  $("#editAdminEmail").on("change", function () {
    var email = $(this).val();
    $.ajax({
      url: "check-info-edit-admin.php",
      type: "POST",
      data: { email: email },
      success: function (data) {
        var result = $.trim(data);
        if (result == email) {
          $("#editAdminEmailHelp").text("Email đã tồn tại!");
          $("#editAdminEmailHelp").css("color", "red");
          $("#btnEditAdmin").prop("disabled", true);
        } else {
          $("#editAdminEmailHelp").text("");
          $("#btnEditAdmin").prop("disabled", false);
        }
      },
    });
  });

  // --------- Check when change password ----
  $("#editAdminPassRepeat").on("change", function () {
    if ($(this).val() != $("#editAdminPassNew").val()) {
      $("#editadminPassRepeatHelp").text("Mật khẩu không khớp!");
      $("#editadminPassRepeatHelp").css("color", "red");
      $("#btnEditPassAdmin").prop("disabled", true);
    } else {
      $("#editadminPassRepeatHelp").text("");
      $("#btnEditPassAdmin").prop("disabled", false);
    }
  });
  //

  //
  // --------------------- Script for manage partner page ------------------------------
  function showPartnersData(tableID, page, numRow, sortBy) {
    $.ajax({
      url: "get-partners-data.php",
      type: "POST",
      data: {
        tableID: tableID,
        page: page,
        numRow: numRow,
        sortBy: sortBy,
      },
      success: function (data) {
        $("#table-partners").html(data);
      },
    });
  }
  //
  showPartnersData("table-partners", 1, 10, "id asc");

  var modalConfirmEl = document.querySelector("#modal-confirm");
  var modalConfirm = bootstrap.Modal.getOrCreateInstance(modalConfirmEl);

  //

  // Activate partner
  $(document).on("click", ".activatePartner", function () {
    var partnerID = $(this).data("partner_id");
    $("#modal-confirm-message").text("Kích hoạt tài khoản");
    $("#modal-confirm-taget").text(partnerID);
    modalConfirm.show();

    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "activate-partner.php",
        type: "POST",
        data: { partnerID: partnerID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showPartnersData("table-partners", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text(
              "Đã kích hoạt thành công tài khoản đối tác "
            );
            $("#alert-success-taget").text(partnerID);
          } else {
            //alert("Lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Lỗi");
        },
      });
      modalConfirm.hide();
    });
  });

  // Disable partner
  $(document).on("click", ".disablePartner", function () {
    var partnerID = $(this).data("partner_id");
    $("#modal-confirm-message").text("Vô hiệu hóa tài khoản");
    $("#modal-confirm-taget").text(partnerID);
    modalConfirm.show();
    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "disable-partner.php",
        type: "POST",
        data: { partnerID: partnerID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showPartnersData("table-partners", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text(
              "Đã vô hiệu hóa thành công tài khoản "
            );
            $("#alert-success-taget").text(partnerID);
          } else {
            //alert("Lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Lỗi");
        },
      });
      modalConfirm.hide();
    });
  });

  // Delete partner
  $(document).on("click", ".deletePartner", function () {
    var partnerID = $(this).data("partner_id");
    $("#modal-confirm-message").text("Xóa tài khoản");
    $("#modal-confirm-taget").text(partnerID);
    modalConfirm.show();
    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "delete-partner.php",
        type: "POST",
        data: { partnerID: partnerID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showPartnersData("table-partners", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text("Đã xóa thành công tài khoản ");
            $("#alert-success-taget").text(partnerID);
          } else {
            alert("Đã xảy ra lỗi khi xóa");
          }
        },
        error: function (jqXHR, exception) {
          alert("Đã xảy ra lỗi khi xóa");
        },
      });
      modalConfirm.hide();
    });
  });

  //

  // Event click next page button
  $(document).on("click", ".btnNextPartners", function () {
    // Get values from button
    var page = $(this).data("page") + 1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showPartnersData("table-partners", page, numRow, sortBy);
  });

  // Event click previous page button
  $(document).on("click", ".btnPreviousPartners", function () {
    // Get values from button
    var page = $(this).data("page") + -1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showPartnersData("table-partners", page, numRow, sortBy);
  });

  $(document).on("change", "#currentPagePartners", function () {
    // Get values from input
    var val = $(this).val();
    var numPage = $(this).data("numpage");
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Check value
    if (val > 0 && val <= numPage && val != "" && $.isNumeric(val)) {
      // Show data for new page
      showPartnersData("table-partner", val, numRow, sortBy);
      // Set url
    } else {
      $(this).css("border", "solid red").css("border-radius", "3px");
    }
  });

  $("#refresh-partner").on("click", function () {
    showPartnersData("table-partner", 1, 10, "id asc");
  });

  //
});
