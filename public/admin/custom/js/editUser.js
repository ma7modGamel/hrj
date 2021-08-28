var TableDatatablesFixedHeader = function () {
  var initTable1 = function () {
    var e = $("#sample_1"), a = 0;
    App.getViewPort().width < App.getResponsiveBreakpoint("md") ? $(".page-header").hasClass("page-header-fixed-mobile") && (a = $(".page-header").outerHeight(!0)) : $(".page-header").hasClass("navbar-fixed-top") ? a = $(".page-header").outerHeight(!0) : $("body").hasClass("page-header-fixed") && (a = 64);
    e.dataTable({
        language: {
            aria: {
                sortAscending: ": ترتيب تصاعدى",
                sortDescending: ": ترتيب تنازلى"
            },
            emptyTable: "لا توجد اى بيانات متاحه",
            info: "إظهار _START_ إلى _END_ من _TOTAL_ حقل",
            infoEmpty: "لا توجد حقول",
            infoFiltered: "( الإجمالى _MAX_ حقل )",
            lengthMenu: "عدد الحقول : _MENU_",
            search: " بحث برقم الإعلان:",
            zeroRecords: "لا توجد نتائج "
        },
        fixedHeader: {header: !0, headerOffset: a},
        order: [[0, "تصاعدى"]],
        lengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "الكل"]],
        pageLength: 10,
        columnDefs: [{ "targets": [1,2,3,4,5], "searchable": false },{ "targets": [5], "orderable": false }]
    })
  };
  var initTable2 = function () {
    var e = $("#sample_2"), a = 0;
    App.getViewPort().width < App.getResponsiveBreakpoint("md") ? $(".page-header").hasClass("page-header-fixed-mobile") && (a = $(".page-header").outerHeight(!0)) : $(".page-header").hasClass("navbar-fixed-top") ? a = $(".page-header").outerHeight(!0) : $("body").hasClass("page-header-fixed") && (a = 64);
    e.dataTable({
        language: {
            aria: {
                sortAscending: ": ترتيب تصاعدى",
                sortDescending: ": ترتيب تنازلى"
            },
            emptyTable: "لا توجد اى بيانات متاحه",
            info: "إظهار _START_ إلى _END_ من _TOTAL_ حقل",
            infoEmpty: "لا توجد حقول",
            infoFiltered: "( الإجمالى _MAX_ حقل )",
            lengthMenu: "عدد الحقول : _MENU_",
            search: " بحث برقم الإعلان:",
            zeroRecords: "لا توجد نتائج "
        },
        fixedHeader: {header: !0, headerOffset: a},
        order: [[0, "تصاعدى"]],
        lengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "الكل"]],
        pageLength: 10,
        columnDefs: [{ "targets": [1,2,3,4], "searchable": false },{ "targets": [4], "orderable": false }]
    })
  };
  var initTable3 = function () {
    var e = $("#sample_3"), a = 0;
    App.getViewPort().width < App.getResponsiveBreakpoint("md") ? $(".page-header").hasClass("page-header-fixed-mobile") && (a = $(".page-header").outerHeight(!0)) : $(".page-header").hasClass("navbar-fixed-top") ? a = $(".page-header").outerHeight(!0) : $("body").hasClass("page-header-fixed") && (a = 64);
    e.dataTable({
        language: {
            aria: {
                sortAscending: ": ترتيب تصاعدى",
                sortDescending: ": ترتيب تنازلى"
            },
            emptyTable: "لا توجد اى بيانات متاحه",
            info: "إظهار _START_ إلى _END_ من _TOTAL_ حقل",
            infoEmpty: "لا توجد حقول",
            infoFiltered: "( الإجمالى _MAX_ حقل )",
            lengthMenu: "عدد الحقول : _MENU_",
            search: " بحث بعنوان الإعلان:",
            zeroRecords: "لا توجد نتائج "
        },
        fixedHeader: {header: !0, headerOffset: a},
        order: [[0, "تصاعدى"]],
        lengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "الكل"]],
        pageLength: 10,
        columnDefs: [{ "targets": [0,2], "searchable": false }]
    })
  };
  var initTable4 = function () {
    var e = $("#sample_4"), a = 0;
    App.getViewPort().width < App.getResponsiveBreakpoint("md") ? $(".page-header").hasClass("page-header-fixed-mobile") && (a = $(".page-header").outerHeight(!0)) : $(".page-header").hasClass("navbar-fixed-top") ? a = $(".page-header").outerHeight(!0) : $("body").hasClass("page-header-fixed") && (a = 64);
    e.dataTable({
        language: {
            aria: {
                sortAscending: ": ترتيب تصاعدى",
                sortDescending: ": ترتيب تنازلى"
            },
            emptyTable: "لا توجد اى بيانات متاحه",
            info: "إظهار _START_ إلى _END_ من _TOTAL_ حقل",
            infoEmpty: "لا توجد حقول",
            infoFiltered: "( الإجمالى _MAX_ حقل )",
            lengthMenu: "عدد الحقول : _MENU_",
            search: " بحث بإسم العضو:",
            zeroRecords: "لا توجد نتائج "
        },
        fixedHeader: {header: !0, headerOffset: a},
        order: [[0, "تصاعدى"]],
        lengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "الكل"]],
        pageLength: 10,
        columnDefs: [{ "targets": [0,2], "searchable": false }]
    })
  };
  var initTable5 = function () {
    var e = $("#sample_5"), a = 0;
    App.getViewPort().width < App.getResponsiveBreakpoint("md") ? $(".page-header").hasClass("page-header-fixed-mobile") && (a = $(".page-header").outerHeight(!0)) : $(".page-header").hasClass("navbar-fixed-top") ? a = $(".page-header").outerHeight(!0) : $("body").hasClass("page-header-fixed") && (a = 64);
    e.dataTable({
        language: {
            aria: {
                sortAscending: ": ترتيب تصاعدى",
                sortDescending: ": ترتيب تنازلى"
            },
            emptyTable: "لا توجد اى بيانات متاحه",
            info: "إظهار _START_ إلى _END_ من _TOTAL_ حقل",
            infoEmpty: "لا توجد حقول",
            infoFiltered: "( الإجمالى _MAX_ حقل )",
            lengthMenu: "عدد الحقول : _MENU_",
            search: " بحث بالرتبة : ",
            zeroRecords: "لا توجد نتائج "
        },
        fixedHeader: {header: !0, headerOffset: a},
        order: false,
        lengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "الكل"]],
        pageLength: 10,
        columnDefs: [{ "targets": [0,2], "searchable": false }]
    })
  };
  return {
      init: function () {
        if (!jQuery().dataTable) {
            return;
        }
        initTable1();
        initTable2();
        initTable3();
        initTable4();
        initTable5();
      }
  }
}();
jQuery(document).ready(function () {
    TableDatatablesFixedHeader.init()
});

$(document).on("click",".delPost",function() {
  var id = $(this).attr('userId');
  toastr.options.timeOut = '0';
  toastr.options.extendedTimeOut = '0';
  toastr.options.positionClass = 'toast-bottom-left';
  Command: toastr["error"]("سيتم حذف جميع بيانات العضو بما فيها الإعلانات والتعليقات !! .. هل تريد حذف العضو ؟<br /><br /><a href='{!! url('admincp/posts/') !!}/" +  id + "/delete' class='btn btn-danger'> نعم -- حذف !!</a>")
});

// Delete Comments
$('.delCmnt').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token'),a=$(this);
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('tr').hide();
      if(data=="empty"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف الإعلان بنجاح")
        $('#sample_1 tbody').append("<tr class='odd'><td valign='top' colspan='6' class='dataTables_empty'>لا توجد اى بيانات متاحه</td></tr>");
      } else if (data=="done"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم حذف الإعلان بنجاح")
      } else if (data=="error"){
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["error"]("لم يتم العثور على الإعلان")
      }
    });
});

// Show comments
$('.showCmnt').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href");
    $.get(url, function (data) {
        //success data
        $('#body').empty().append(data.body);
        $('#basic').modal('show');
    });
});

// Show Message
$(document).on("click",".showMsg",function(e) {
    e.preventDefault();
    var url = $(this).attr("href");

    $.get(url, function (data) {
        //success data
        $('#convBody').empty().append(data.html);
        $('#userMessage').modal('show');
    });
});
