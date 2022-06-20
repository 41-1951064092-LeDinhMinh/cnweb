$(document).ready(function () {
  // For click menu button, show/hide sidebar
  $("#btn-menu").click(function () {
    $(".sidebar").toggleClass("sidebar-show");
    $(".main-right").toggleClass("show");
  });

  // Expand subpage in sidebar menu
  $(".tour-btn").click(function () {
    $(".sidebar-menu ul .tour-show").toggleClass("show");
    $(".sidebar-menu ul .tour-caret").toggleClass("rotate");
  });

  // Create modal confirm
  var modalConfirmEl = document.querySelector("#modal-confirm");
  var modalConfirm = bootstrap.Modal.getOrCreateInstance(modalConfirmEl);

  // --------------------- Script for manage tour page ---------------------------

  // ====== Script for add tour page

  // Check tour info before insert
  $("#btn-add-tour").on("click", function () {
    // Check tour title
    if ($("#addTourTitle").val() == "") {
      $("#addTourTitle").css("border", "solid 2px red");
      window.scrollTo(0, 0);
      event.preventDefault();
    } else {
      $("#addTourTitle").css("border", "");
    }
    // Check tour type
    if ($("#addTourType").val() == "") {
      $("#addTourType").css("border", "solid 2px red");
      window.scrollTo(0, 0);
      event.preventDefault();
    } else {
      $("#addTourType").css("border", "");
    }
    // Check ...
    if ($("#addTourtourPlaceDeparture").val() == "") {
      $("#addTourtourPlaceDeparture").css("border", "solid 2px red");
      window.scrollTo(0, 0);
      event.preventDefault();
    } else {
      $("#addTourtourPlaceDeparture").css("border", "");
    }
    //
    if ($("#addTourtourPlaceDestination").val() == "") {
      $("#addTourtourPlaceDestination").css("border", "solid 2px red");
      window.scrollTo(0, 0);
      event.preventDefault();
    } else {
      $("#addTourtourPlaceDestination").css("border", "");
    }
    // Check date
    var tourDepartureDay = new Date($("#addTourDepartureDay").val());
    var tourEndDate = new Date($("#addTourEndDate").val());
    if (tourEndDate < tourDepartureDay) {
      $("#addTourEndDate").css("border", "solid 2px red");
      $("#tourEndDateHelp").text(
        "Ngày kết thúc không thể nhỏ hơn ngày khởi hành"
      );
      $("#tourEndDateHelp").css("color", "red");
      event.preventDefault();
    } else {
      $("#tourEndDateHelp").text("");
      $("#addTourEndDate").css("border", "");
    }
    //
    // Check price
    let pricePattern = /^[0-9]+$/;
    // For adult price
    var adultPrice = $("#tourAdultPrice").val();
    if (pricePattern.test(adultPrice) == false || adultPrice == "") {
      $("#tourAdultPrice").css("border", "solid 2px red");
      event.preventDefault();
    } else {
      $("#tourAdultPrice").css("border", "");
    }
    // For children price
    var childrenPrice = $("#tourChildrenPrice").val();
    if (
      (pricePattern.test(childrenPrice) == false || childrenPrice == "") &&
      !$("#tourChildrenPrice").is(":disabled")
    ) {
      $("#tourChildrenPrice").css("border", "solid 2px red");
      event.preventDefault();
    } else {
      $("#tourChildrenPrice").css("border", "");
    }
    // For older price
    var olderPrice = $("#tourOlderPrice").val();
    if (
      (pricePattern.test(olderPrice) == false || olderPrice == "") &&
      !$("#tourOlderPrice").is(":disabled")
    ) {
      $("#tourOlderPrice").css("border", "solid 2px red");
      event.preventDefault();
    } else {
      $("#tourOlderPrice").css("border", "");
    }
  });

  // Proccess when check checkbox price
  $("#cbPriceChildren").change(function () {
    if (this.checked) {
      $("#tourChildrenPrice").prop("disabled", false);
    }
    if (!this.checked) {
      $("#tourChildrenPrice").prop("disabled", true);
    }
  });
  //
  $("#cbPriceOlder").change(function () {
    if (this.checked) {
      $("#tourOlderPrice").prop("disabled", false);
    }
    if (!this.checked) {
      $("#tourOlderPrice").prop("disabled", true);
    }
  });

  // Check tour id
  $("#addTourID").on("change", function () {
    var tourID = $(this).val();
    if (tourID != "") {
      $.ajax({
        url: "check-tour-info.php",
        type: "POST",
        data: { tourID: tourID },
        success: function (data) {
          var result = $.trim(data);
          if (result == tourID) {
            $("#tourIdHelp").text("Mã tour đã tồn tại");
            $("#tourIdHelp").css("color", "red");
          } else {
            $("#tourIdHelp").text("");
          }
        },
        error: function (jqXHR, exception) {
          alert("Lỗi");
        },
      });
    } else {
      $("#tourIdHelp").text("");
    }
  });

  //
  // ====== Script for show tour page

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
  // ======------------ Script for manage bill page
  function showBillsData(tableID, page, numRow, sortBy) {
    $.ajax({
      url: "get-bills-data.php",
      type: "POST",
      data: {
        tableID: tableID,
        page: page,
        numRow: numRow,
        sortBy: sortBy,
      },
      success: function (data) {
        $("#table-bill").html(data);
      },
    });
  }

  //
  showBillsData("table-bill", 1, 10, "id asc");
  //

  // Delete bill
  $(document).on("click", ".deleteBill", function () {
    var billID = $(this).data("bill_id");
    $("#modal-confirm-message").text("Xóa hóa đơn");
    $("#modal-confirm-taget").text(billID);
    modalConfirm.show();

    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "delete-bill.php",
        type: "POST",
        data: { billID: billID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showBillsData("table-bill", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text("Đã xóa thành công hóa đơn ");
            $("#alert-success-taget").text(billID);
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

  // Confirmation bill
  $(document).on("click", ".confirmationBill", function () {
    var billID = $(this).data("bill_id");
    $("#modal-confirm-message").text("Duyệt hóa đơn");
    $("#modal-confirm-taget").text(billID);
    modalConfirm.show();

    $("#btn-confirm-modal").on("click", function () {
      $.ajax({
        url: "confirmation-bill.php",
        type: "POST",
        data: { billID: billID },
        success: function (data) {
          var result = $.trim(data);
          if (result == "success") {
            showBillsData("table-bill", 1, 10, "id asc");
            $(".alert-success").removeClass("d-none");
            $("#alert-success-content").text("Đã duyệt hóa đơn ");
            $("#alert-success-taget").text(billID);
          } else {
            //alert("Đã xảy ra lỗi");
          }
        },
        error: function (jqXHR, exception) {
          //alert("Đã xảy ra lỗi");
        },
      });
      modalConfirm.hide();
    });
  });
  
  // Event click next page button
  $(document).on("click", ".btnNextBills", function () {
    // Get values from button
    var page = $(this).data("page") + 1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showBillsData("table-bill", page, numRow, sortBy);
  });

  // Event click previous page button
  $(document).on("click", ".btnPreviousBills", function () {
    // Get values from button
    var page = $(this).data("page") + -1; // Set page index + 1
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Show data for new page
    showBillsData("table-bill", page, numRow, sortBy);
  });

  $(document).on("change", "#currentPageBills", function () {
    // Get values from input
    var val = $(this).val();
    var numPage = $(this).data("numpage");
    var numRow = $(this).data("numrow");
    var sortBy = $(this).data("sort_by");
    // Check value
    if (val > 0 && val <= numPage && val != "" && $.isNumeric(val)) {
      // Show data for new page
      showBillsData("table-bill", val, numRow, sortBy);
      // Set url
    } else {
      $(this).css("border", "solid red").css("border-radius", "3px");
    }
  });

  //
  $("#refresh-bill").on("click", function () {
    showBillsData("table-bill", 1, 10, "id asc");
  });

  //
  //
  // ----------------------- Script for Profile page --------------

  // Check admin phone number
  $("#editPartnerPhone").on("change", function () {
    var phone = $(this).val();
    $.ajax({
      url: "check-info-edit-partner.php",
      type: "POST",
      data: { phone: phone },
      success: function (data) {
        var result = $.trim(data);
        if (result == phone) {
          $("#editPartnerPhoneHelp").text("Số điện thoại đã tồn tại!");
          $("#editPartnerPhoneHelp").css("color", "red");
          $("#btnEditPartner").prop("disabled", true);
        } else {
          $("#editPartnerPhoneHelp").text("");
          $("#btnEditPartner").prop("disabled", false);
        }
      },
    });
  });

  // Check admin email
  $("#editPartnerEmail").on("change", function () {
    var email = $(this).val();
    $.ajax({
      url: "check-info-edit-partner.php",
      type: "POST",
      data: { email: email },
      success: function (data) {
        var result = $.trim(data);
        if (result == email) {
          $("#editPartnerEmailHelp").text("Email đã tồn tại!");
          $("#editPartnerEmailHelp").css("color", "red");
          $("#btnEditPartner").prop("disabled", true);
        } else {
          $("#editPartnerEmailHelp").text("");
          $("#btnEditPartner").prop("disabled", false);
        }
      },
    });
  });

  // --------- Check when change password ----
  $("#editPartnerPassRepeat").on("change", function () {
    if ($(this).val() != $("#editPartnerPassNew").val()) {
      $("#editPartnerPassRepeatHelp").text("Mật khẩu không khớp!");
      $("#editPartnerPassRepeatHelp").css("color", "red");
      $("#btnEditPassPartner").prop("disabled", true);
    } else {
      $("#editPartnerPassRepeatHelp").text("");
      $("#btnEditPassPartner").prop("disabled", false);
    }
  });
  //


  //
});
