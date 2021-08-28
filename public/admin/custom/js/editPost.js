$(document).on("change","#select11",function() {
  if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select12 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value1=' + id + ']');
  $('#select12').html(' ');
  $('#select12').append('<option disabled selected value="#">أختر القسم</option>');
  $('#select12').append(options);

  if($('#select11').val() == 1) {
    $('#carDiv').show();
    $('#select13').prop('disabled', true);
    $(document).on("change","#select12",function() {
      if($('#select12').val() != '#') {
        $('#select13').prop('disabled', false);
      }
    });
  } else {
    $('#carDiv').hide();
  }
});

$(document).on("change","#select12",function() {

  if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select13 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value2=' + id + ']');
  $('#select13').html(' ');
  $('#select13').append('<option disabled selected value="#">أختر ماركة السياره</option>');
  $('#select13').append(options);

});

//============== Area ==================================
$(document).on("change","#select21",function() {

  if ($(this).data('options') == undefined) {
    /*Taking an array of all options-2 and kind of embedding it on the select1*/
    $(this).data('options', $('#select22 option').clone());
  }
  var id = $(this).val();
  var options = $(this).data('options').filter('[value1=' + id + ']');
  $('#select22').html(' ');
  $('#select22').append('<option disabled selected value="#">أختر المنطقه</option>');
  $('#select22').append(options);
});

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
  return {
      init: function () {
        if (!jQuery().dataTable) {
            return;
        }
        initTable1();
        initTable2();
      }
  }
}();
jQuery(document).ready(function () {
    TableDatatablesFixedHeader.init()
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

// Delete Image
$('.delPostImg').on('click', function (e) {
    e.preventDefault();
    var url = $(this).attr("href"),token = $(this).data('token'),a=$(this);
    $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      a.closest('div').hide();
      toastr.options.timeOut = '6000';
      toastr.options.positionClass = 'toast-bottom-left';
      Command: toastr["info"]("تم الحذف بنجاح")
    });
});

