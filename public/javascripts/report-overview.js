var time_entry_table;

$(document).ready(function(){

  time_entry_table = $("#time-entry-table").DataTable({
    "scrollCollapse": true,
    "ScrollInfinite": true,
    "ordering": true,
    "scrollX": false,
    "scrollY": "38vh",
    "paging": true,
    "pageLength": 100,
    "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
    "processing": true,
    "serverSide": true,
    "order": [[ 1, 'asc' ]],
      
    drawCallback: function(){
      $('#custom-table-info').html($('#time-entry-table_info').html());
      
      Tipped.create('.link-btn', function(e) {
        var content_str = 
          "<a href='javascript:;' onclick='showAddModel(this);' name = '" + e.id + "' class= 'close-tooltip'>Report time</a><br><br>" +
          "<a href='javascript:;' onclick='showEditModel(this);' name = '" + e.id + "' class='close-tooltip'>Edit Reported time</a><br><br>" +
          "<a href='javascript:;' onclick='showAuditModel(this);' name= '" + e.id + "' class='close-tooltip'>Audit log for Customer</a><br><br>" +
          "<a>Kundebemærkninger</a>"
        return {
          content: content_str
        };
      },
        
      {
        showOn: 'click',
        hideOn: 'click',
        hideOnClickOutside: true,
        skin:'light',
        position: 'right',
        size: 'large'
      });
    },
    "ajax": {
      url:'/get_all_time_entry',
      type: "post",
      data: function(d){
        d.extra_search = getExtraSearch();
      },
      dataType: "json"
    },
    "columns": [
      {data:'customer_id', render: renderSelect},
      { data: 'customer_id' },      // Customer ID
      { data: 'email_address' },    // Email Address
      { data: 'company_name' },     // Company Name
      { data: 'bookkeeper_name' },  // Bookkeeper Name
      { data: 'task_type' },        // Primary Task Type
      { data: 'period' },           // Delivery Period
      { data: 'delivery_year' },    // Delivery Year
      { data: 'time_spent' },       // Time Spent
      { data: 'deleted', render: renderCheck },
      { data: 'note' },             // Note
    ],
    "columnDefs":[

      {
        "targets": [0],
        "searchable": false,
        "orderable": false
      }
    ]
  });

  selectRows();

  $('#time-entry-table_info').css('display', 'none');
  $('#custom-table-info').css('display', 'block');
  $('#custom-table-info').html($('#time-entry-table_info').html());

  $('<div class="pull-right" style="max-height: 50px; margin:5px;"><button type="button" class="btn btn-default sbm-button">Submit</button></div>').appendTo($('.dropdown-menu.open')); 
  extraShearchSubmit();

  $.ajax({
    type: "get",
    url: "/get_bookkeeper_name_list",
    data: {},
    dataType: "json",
    success: function(data) {
      for (var i = 0; i < data.data.length; i++) {
        $('#input-bookkeeper').append('<option value="' + data.data[i].bookkeeper_name + '">' + data.data[i].bookkeeper_name + '</option>');    
      }
      $("#input-bookkeeper").selectpicker("refresh");
    }
  });

  $("#input-year").on('keyup', submitsWithYear);

  getTotalTimes($('#input-year').val());

  $('.input-daterange').datepicker({
    format: "yyyy-mm-dd",
    todayBtn: true,
    todayHighlight: true
  });

  $('.sigle_selection').on('change', function(e){
    time_entry_table.ajax.reload();
  });
});

function getTotalTimes(sel_year) {
  $.ajax({
    type: "post",
    url: "/get_total_times",
    data: {
      sel_year: sel_year
    },
    dataType: "json",
    success: function(data) {
    
      var total_time = parseFloat(data.data[0].january_time) + parseFloat(data.data[0].february_time) + 
                        parseFloat(data.data[0].march_time) + parseFloat(data.data[0].april_time) + 
                        parseFloat(data.data[0].may_time) + parseFloat(data.data[0].june_time) + 
                        parseFloat(data.data[0].july_time) + parseFloat(data.data[0].august_time) + 
                        parseFloat(data.data[0].september_time) + parseFloat(data.data[0].october_time) + 
                        parseFloat(data.data[0].november_time) + parseFloat(data.data[0].december_time); 
      total_time = total_time.toFixed(2);

      var content_str = "<td>" + data.data[0].january_time +"</td>" + "<td>" + data.data[0].february_time +"</td>" +
                        "<td>" + data.data[0].march_time +"</td>" + "<td>" + data.data[0].april_time +"</td>" + 
                        "<td>" + data.data[0].may_time +"</td>" + "<td>" + data.data[0].june_time +"</td>" + 
                        "<td>" + data.data[0].july_time +"</td>" + "<td>" + data.data[0].august_time +"</td>" + 
                        "<td>" + data.data[0].september_time +"</td>" + "<td>" + data.data[0].october_time +"</td>" + 
                        "<td>" + data.data[0].november_time +"</td>" + "<td>" + data.data[0].december_time +"</td>" + 
                        "<td>" + total_time +"</td>";

      $('.total-times').html('');
      $('.total-times').html(content_str);
    }
  }); 
}

function getExtraSearch() {
  var extra_arr = {};

  $('#time-entry tr td').css("background-color", "");

  var s_bookkeeper_arr = $('#input-bookkeeper').val();
  if (s_bookkeeper_arr.length > 0) {
    $('#input-bookkeeper').selectpicker('setStyle', 'btn-info', 'add');
    extra_arr["s_bookkeeper_arr"] = s_bookkeeper_arr;
  } else $('#input-bookkeeper').selectpicker('setStyle', 'btn-info', 'remove');

  var s_deleted_val = $('#input-deleted').val();
  if (s_deleted_val != null && s_deleted_val != 'show_all') {
    $('#input-deleted').selectpicker('setStyle', 'btn-info', 'add');
    extra_arr["s_deleted_val"] = s_deleted_val;
  } else $('#input-deleted').selectpicker('setStyle', 'btn-info', 'remove');

  var s_task_arr = $('#input-task').val();
  if (s_task_arr.length > 0) {
    $('#input-task').selectpicker('setStyle', 'btn-info', 'add');
    extra_arr["s_task_arr"] = s_task_arr;
  } else $('#input-task').selectpicker('setStyle', 'btn-info', 'remove');
  
  var s_period_arr = $('#input-period').val();
  if (s_period_arr.length > 0) {
    $('#input-period').selectpicker('setStyle', 'btn-info', 'add');
    extra_arr["s_period_arr"] = s_period_arr;
  } else $('#input-period').selectpicker('setStyle', 'btn-info', 'remove');
  
  var s_note_val = $('#input-note').val();
  if (s_note_val != null && s_note_val != 'show_all') {
    $('#input-note').selectpicker('setStyle', 'btn-info', 'add');
    extra_arr["s_note_val"] = s_note_val;
  } else $('#input-note').selectpicker('setStyle', 'btn-info', 'remove');

  var start_date = $('#start-date').val();
  if (start_date != null) {
    // $('#input-note').selectpicker('setStyle', 'btn-info', 'add');
    extra_arr["s_start_date_val"] = s_note_val;
  }

  var end_date = $('#end-date').val();
  if (end_date != null) {
    // $('#input-note').selectpicker('setStyle', 'btn-info', 'add');
    extra_arr["s_end_date_val"] = s_note_val;
  }
  
  return JSON.stringify(extra_arr);
}

function isValidDate(dateString)
{
  if (!dateString) return true;

  // First check for the pattern
  if(!/^\d{1,4}\-\d{1,2}\-\d{2}$/.test(dateString)) 
    return false;

  // Parse the date parts to integers
  var parts = dateString.split("-");
  var day = parseInt(parts[2], 10);
  var month = parseInt(parts[1], 10);
  var year = parseInt(parts[0], 10);

  // Check the ranges of month and year
  if(year < 1000 || year > 3000 || month == 0 || month > 12)
    return false;

  var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

  // Adjust for leap years
  if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
    monthLength[1] = 29;

  // Check the range of the day
  return day > 0 && day <= monthLength[month - 1];
};

function extraShearchSubmit() {
  $('.sbm-button').on( 'click', function () {
    var start_date = $('#start-date').val();
    if (!isValidDate(start_date)) {
      alert("The value is not a valid date!");
      $('#start-date').focus();
      return;
    }
    var end_date = $('#end-date').val();
    if (!isValidDate(end_date)) {
      alert("The value is not a valid date!");
      $('#end-date').focus();
      return;
    }

    time_entry_table.ajax.reload();
  });
}

function showAddModel(e) {
  $('.form-control').val('');
  $(".selectpicker").selectpicker("refresh");
  $('.customer-id').html(e.name);
  var cur_row = $('#time-entry').find('#' + e.name).parents('tr');
  var cur_row_data = time_entry_table.row(cur_row).data();
  $('.bookkeeper-name').html(cur_row_data.bookkeeper_name);
  $('.company-name').html(cur_row_data.company_name);
  $('.email-addr').html(cur_row_data.primary_email);
  $('#basicModal').modal();
}

function showEditModel(e) {

  var cur_row = $('#time-entry').find('#' + e.name).parents('tr');
  var cur_row_data = time_entry_table.row(cur_row).data();
  var customer_id = e.name;
  var bookkeeper_name = cur_row_data.bookkeeper_name;
  var company_name = cur_row_data.company_name;
  var email_addr = cur_row_data.primary_email;

  $('#editModal').modal();
  $('.loader').css('display', 'block');
  $('#edit-time-frm').css('display', 'none');
  $('.etable-body').html('');

  $.ajax({
    type: "post",
    url: "/get_report_time",
    data: {
      customer_id: customer_id,
      // sel_year: $('#input-year').val() // changechange
      sel_year : $('.delivery-year').html()
    },
    dataType: "json",
    success: function(data) {
      setTimeout(function(){
        $('.loader').css('display', 'none');
        $('#edit-time-frm').css('display', 'block');
      }, 500);
      
      for (var i = 0; i < data.data.length; i++) {
        var r_data = {
          id: data.data[i].id,
          note: data.data[i].note,
          // task_type: task_list[data.data[i].task_type],
          task_type: data.data[i].task_type,
          period: data.data[i].period,
          customer_id: customer_id,
          bookkeeper_name: bookkeeper_name,
          company_name: company_name,
          email_addr: email_addr,
          delivery_year: data.data[i].delivery_year
        }

        if (data.data[i].january_spent != null) {
          r_data.time_spent = data.data[i].january_spent;
          appendTagEditContent('January', r_data);
        }
        else if (data.data[i].february_spent != null) {
          r_data.time_spent = data.data[i].february_spent;
          appendTagEditContent('February', r_data);
        }
        else if (data.data[i].march_spent != null) {
          r_data.time_spent = data.data[i].march_spent;
          appendTagEditContent('March', r_data);
        }
        else if (data.data[i].april_spent != null) {
          r_data.time_spent = data.data[i].april_spent;
          appendTagEditContent('April', r_data);
        }
        else if (data.data[i].may_spent != null) {
          r_data.time_spent = data.data[i].may_spent;
          appendTagEditContent('May', r_data);
        }
        else if (data.data[i].june_spent != null) {
          r_data.time_spent = data.data[i].june_spent;
          appendTagEditContent('June', r_data);
        }
        else if (data.data[i].july_spent != null) {
          r_data.time_spent = data.data[i].july_spent;
          appendTagEditContent('July', r_data);
        }
        else if (data.data[i].august_spent != null) {
          r_data.time_spent = data.data[i].august_spent;
          appendTagEditContent('August', r_data);
        }
        else if (data.data[i].september_spent != null) {
          r_data.time_spent = data.data[i].september_spent;
          appendTagEditContent('September', r_data);
        }
        else if (data.data[i].october_spent != null) {
          r_data.time_spent = data.data[i].october_spent;
          appendTagEditContent('October', r_data);
        }
        else if (data.data[i].november_spent != null) {
          r_data.time_spent = data.data[i].november_spent;
          appendTagEditContent('November', r_data);
        }
        else if (data.data[i].december_spent != null) {
          r_data.time_spent = data.data[i].december_spent;
          appendTagEditContent('December', r_data);
        }
      }
    }
  });
}

function showAuditModel(e) {

  var customer_id = e.name;

  $('#auditModal').modal();
  $('.loader').css('display', 'block');
  $('#audit-time-frm').css('display', 'none');
  $('.atable-body').html('');

  $.ajax({
    type: "post",
    url: "/get_audit_log",
    data: {
      customer_id: customer_id,
      // sel_year: $('#input-year').val() //
      sel_year: $('.delivery-year').html()
    },
    dataType: "json",
    success: function(data) {
      setTimeout(function(){
        $('.loader').css('display', 'none');
        $('#audit-time-frm').css('display', 'block');
      }, 500);
      
      for (var i = 0; i < data.data.length; i++) {
        if (data.data[i].old_value == null) data.data[i].old_value = '';
        var r_data = {
          id: data.data[i].id,
          customer_id: data.data[i].customer_id,
          bookkeeper_name: data.data[i].bookkeeper_name,
          company_name: data.data[i].company_name,
          email_addr: data.data[i].email_address,
          delivery_year: data.data[i].delivery_year,
          column: data.data[i].chg_column,
          old_value: data.data[i].old_value,
          new_value: data.data[i].new_value,
          change_date: data.data[i].change_date_str
        }

        appendTagAuditContent(data.data[i].sel_month, r_data);
      }
    }
  });
}

function appendTagEditContent (month_name, data) {

  var content_str = 
          '<tr id="etr_' + data.id + '">' +
            '<td>' + data.customer_id + '</td>' +
            '<td>' + data.bookkeeper_name + '</td>' +
            '<td>' + data.company_name + '</td>' +
            '<td>' + data.email_addr + '</td>' +
            '<td>' + data.delivery_year + '</td>' +
            '<td>' + 
              '<div class="show_cell_' + data.id + '" id="s_task_' + data.id +'">' + data.task_type + '</div>' +
              '<div class="edit_cell_' + data.id + '" style="display: none; width: 200px;">' +
                '<select class="selectpicker form-control" data-dropup-auto="false" data-size="5" data-live-search="true" id="e_task_' + data.id + '">' +
                  '<option value="1">Almindelig kontering</option>' + 
                  '<option value="2">Årsafslutningspakke - Selskaber 1. År</option>' +
                  '<option value="3">Årsafslutningspakke - Selskaber eksisterende kunde</option>' +
                  '<option value="4">Årsafslutningspakke - Enkeltmands 1. År</option>' +
                  '<option value="5">Årsafslutningspakke - Enkeltmands eksisterende kunde</option>' +
                  '<option value="6">VSO - beregning ny kunde</option>' +
                  '<option value="7">VSO - beregning eksisterende kunde</option>' +
                  '<option value="8">Samtale/Rådgivning af kunde</option>' +
                  '<option value="9">Intern kommunikation og møder</option>'+
                  '<option value="10">Primo ny kunde</option>' +
                  '<option value="11">Primo eksisterende</option>' +
                  '<option value="12">kundeCatchup/kontering</option>' +
                '</select>' +
              '</div>' +
            '</td>' +
            '<td>' +
              '<div class="show_cell_' + data.id + '" id="s_period_' + data.id +'">' + data.period + '</div>' +
              '<div class="edit_cell_' + data.id + '" style="display: none; width:100px;">' +
                '<select class="selectpicker form-control" data-dropup-auto="false" data-size="5" data-live-search="true" id="e_period_' + data.id +'">' +
                  '<option value="Q1">Q1</option>' + 
                  '<option value="Q2">Q2</option>' +
                  '<option value="Q3">Q3</option>' +
                  '<option value="Q4">Q4</option>' +
                  '<option value="Year-end">Year-end</option>' +
                '</select>' +
              '</div>' +
            '</td>' +
            '<td>' +
              '<div class="show_cell_' + data.id + '" id="s_time_' + data.id +'">' + data.time_spent + '</div>' +
              '<div class="edit_cell_' + data.id + '" style="display: none">' +
                '<input type="number" class="form-control" id="e_time_' + data.id + '" data-original-value="' + data.time_spent + '" value="' + data.time_spent + '">' +
              '</div>' +
            '</td>' +
            '<td>' +
              '<div class="show_cell_' + data.id + '" id="s_note_' + data.id +'">' + data.note + '</div>' +
              '<div class="edit_cell_' + data.id + '" style="display: none; width: 200px;">' +
                '<textarea type="text" style="resize: vertical;" class="form-control" id="e_note_' + data.id + '" data-original-value="' + data.note + '" value="' + data.note + '">' + data.note + '</textarea>' +
              '</div>' +
            '</td>' +
            '<td><div class="btn-group pull-right" style="width:70px">' + 
              '<button type="button" id="edit_btn_' + data.id + '" class="btn btn-sm btn-default" onclick="editRow(' + data.id + ')"><span class="fa fa-edit" ></span></button>' +
              '<button type="button" id="dele_btn_' + data.id + '" class="btn btn-sm btn-default" onclick="deleRow(' + data.id + ', \'' + month_name +'\')"><span class="fa fa fa-trash-alt" ></span></button>' +
              '<button type="button" id="acep_btn_' + data.id + '" class="btn btn-sm btn-default" onclick="acepRow(' + data.id + ', \'' + month_name +'\')" style="display: none;"><span class="fa fa-check-circle" ></span></button>' +
              '<button type="button" id="canc_btn_' + data.id + '" class="btn btn-sm btn-default" onclick="cancRow(' + data.id + ')" style="display: none;"><span class="fa fa-times-circle" > </span></button>' +  
            '</div></td>' +
          '</tr>';

  $('#e_' + month_name).append(content_str);

  var task_list = {
    "Almindelig kontering": "1",
    "Årsafslutningspakke - Selskaber 1. År": "2",
    "Årsafslutningspakke - Selskaber eksisterende kunde": "3",
    "Årsafslutningspakke - Enkeltmands 1. År": "4",
    "Årsafslutningspakke - Enkeltmands eksisterende kunde": "5",
    "VSO - beregning ny kunde": "6",
    "VSO - beregning eksisterende kunde": "7",
    "Samtale/Rådgivning af kunde": "8",
    "Intern kommunikation og møder": "9",
    "Primo ny kunde": "10",
    "Primo eksisterende": "11",
    "kundeCatchup/kontering": "12"
  }

  $('#e_task_' + data.id).selectpicker('refresh');
  $('#e_task_' + data.id).selectpicker('val', task_list[data.task_type]);
  $('#e_task_' + data.id).selectpicker('refresh');

  $('#e_period_' + data.id).selectpicker('refresh');
  $('#e_period_' + data.id).selectpicker('val', data.period);
  $('#e_period_' + data.id).selectpicker('refresh');

}

function editRow(id) {
  $('.show_cell_' + id).css('display', 'none');
  $('.edit_cell_' + id).css('display', 'block');
  $('#acep_btn_' + id).css('display', 'block');
  $('#canc_btn_' + id).css('display', 'block');
  $('#edit_btn_' + id).css('display', 'none');
  $('#dele_btn_' + id).css('display', 'none');
}

function cancRow(id) {
  $('.show_cell_' + id).css('display', 'block');
  $('.edit_cell_' + id).css('display', 'none');
  $('#acep_btn_' + id).css('display', 'none');
  $('#canc_btn_' + id).css('display', 'none');
  $('#edit_btn_' + id).css('display', 'block');
  $('#dele_btn_' + id).css('display', 'block');
}

function acepRow(id, month_name) {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + "-" + mm + "-" + dd + " " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  var change_data = {
    task_type: null,
    period: null,
    time_spent: null,
    note: null,
    id: id,
    month: month_name,
    today: today
  }
  var sel_task = $('#e_task_' + id).val();
  if (sel_task == null) {
    alert('Please fill all fields.');
    return;
  }

  var task_list = {
    "1": "Almindelig kontering",
    "2": "Årsafslutningspakke - Selskaber 1. År",
    "3": "Årsafslutningspakke - Selskaber eksisterende kunde",
    "4": "Årsafslutningspakke - Enkeltmands 1. År",
    "5": "Årsafslutningspakke - Enkeltmands eksisterende kunde",
    "6": "VSO - beregning ny kunde",
    "7": "VSO - beregning eksisterende kunde",
    "8": "Samtale/Rådgivning af kunde",
    "9": "Intern kommunikation og møder",
    "10": "Primo ny kunde",
    "11": "Primo eksisterende",
    "12": "kundeCatchup/kontering"
  }
  if (task_list[sel_task] != $('#s_task_' + id).html()) {
    change_data.task_type = sel_task;
    $('#s_task_' + id).html(task_list[sel_task]);
  }

  var sel_period = $('#e_period_' + id).val();
  if (sel_period == null) {
    alert('Please fill all fields.');
    return;
  }
  if (sel_period != $('#s_period_' + id).html()) {
    change_data.period = sel_period;
    $('#s_period_' + id).html(sel_period);
  }
  
  var sel_time = $('#e_time_' + id).val();
  if (sel_time == '') {
    alert('Please fill all fields.');
    return;
  }
  if (parseFloat(sel_time) != parseFloat($('#s_time_' + id).html())) {
    change_data.time_spent = sel_time;
    $('#s_time_' + id).html(sel_time);
  }
  
  var sel_note = $('#e_note_' + id).val().replace(/[\r\n\x0B\x0C\u0085\u2028\u2029]+/g,"\n");
  if (sel_note == '') {
    alert('Please fill all fields.');
    return;
  }
  if (sel_note != $('#s_note_' + id).html()) {
    change_data.note = sel_note;
    $('#s_note_' + id).html(sel_note);
  }
  
  if (change_data.task_type == null && change_data.period == null && change_data.time_spent == null && change_data.note == null) {
    alert("No Data to update!");
    return;
  }

  $('.show_cell_' + id).css('display', 'block');
  $('.edit_cell_' + id).css('display', 'none');
  $('#acep_btn_' + id).css('display', 'none');
  $('#canc_btn_' + id).css('display', 'none');
  $('#edit_btn_' + id).css('display', 'block');
  
  if(confirm('Are you sure you want to')){
    
    $('.btn').prop('disabled', true);
    $.ajax({
      type: "post",
      url: "/update_report_time",
      data: change_data,
      dataType: "json",
      success: function(data) {
        setTimeout(function(){
          $('.btn').prop('disabled', false);
          time_entry_table.ajax.reload();
          getTotalTimes($('#input-year').val());
        }, 500); 
      }
    });
  }
}

function deleRow(id, month_name) {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + "-" + mm + "-" + dd + " " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

  if(confirm('Are you sure you want to delete')){
    
    $('.btn').prop('disabled', true);
    $.ajax({
      type: "post",
      url: "/delete_report_time",
      data: {
        id: id,
        month: month_name,
        today: today
      },
      dataType: "json",
      success: function(data) {
        setTimeout(function(){
          $('.btn').prop('disabled', false);
          $('#etr_' + id).remove();
          time_entry_table.ajax.reload();
          getTotalTimes($('#input-year').val());
        }, 500); 
      }
    });
  }
}

function appendTagAuditContent(month_name, data) {

  var content_str = 
          '<tr id="atr_' + data.id + '">' +
            '<td>' + data.customer_id + '</td>' +
            '<td>' + data.bookkeeper_name + '</td>' +
            '<td>' + data.company_name + '</td>' +
            '<td>' + data.email_addr + '</td>' +
            '<td>' + data.delivery_year + '</td>' +
            '<td>' + data.column + '</td>' +
            '<td>' + data.old_value + '</td>' +
            '<td>' + data.new_value + '</td>' +
            '<td>' + data.change_date + '</td>' +
          '</tr>';

  $('#a_' + month_name).append(content_str);
}

function selectRows() {

  $('#time-entry-table tbody').on( 'click', 'tr', function () {
      
      if ( $(this).hasClass('selected') ) {
          // $(this).removeClass('selected');
      }
      else {
          time_entry_table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
      }
  });
}

function getSelYear() {
  return $('#input-year').val();
}

function submitsWithYear(e) {
  if (e.key === 'Enter' || e.keyCode === 13) {
    time_entry_table.ajax.reload();
    getTotalTimes($('#input-year').val());
    $('.delivery-year').html($('#input-year').val());
  }
}

function renderSelect(data, type, full, meta) {
  var select_str = "<button class='btn btn-default link-btn' id='" + data +"' style='font-size: 12px; padding: 3px 12px;'>Links</button>"
  return select_str;
}

function renderCheck(data, type, full, meta) {
  var select_str;
  if (data == true)
    select_str = '<i class="fas fa-check-square fa-lg" aria-hidden="true" style="color: #5bc0de"></i>';
  else if (data == false)
    select_str = '<i class="far fa-square fa-lg" aria-hidden="true" style="color: #5bc0de"></i>';
  return select_str;
}

function submitReportTime() {
  
  var return_task = $("#input-task").val();
  var return_period = $('#input-period').val();

  if (return_task == null) {
  alert('Please fill all fields.');
  return;
  }
  if (return_period == null) {
    alert('Please fill all fields.');
    return;
  }
  if ($('#input-time').val() == '') {
    alert('Please fill all fields.');
    return;
  }
  if ($('#input-note').val() == '') {
      alert('Please fill all fields.');
      return;
  }
  var note_str = $('#input-note').val().replace(/[\r\n\x0B\x0C\u0085\u2028\u2029]+/g,"\n");

  if(confirm('Are you sure you want to')){
    $('#basicModal').hide();
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    var today_str = yyyy + "-" + mm + "-" + dd;
    var cur_time = today_str + " " + today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    $.ajax({
      type: "post",
      url: "/set_report_time",
      data: {
        customer_id: $('.customer-id').html(),
        bookkeeper_name: $('.bookkeeper-name').html(),
        company_name: $('.company-name').html(),
        primary_email: $('.email-addr').html(),
        task_type: return_task,
        period: return_period,
        time_spent: $('#input-time').val(),
        time_note: note_str, 
        today: today_str,
        month: mm,
        cur_time: cur_time,
        year: $('.delivery-year').html()
      },
      dataType: "json",
      success: function(data) {
        setTimeout(function(){
          location.reload();
          getTotalTimes($('#input-year').val());
        }, 1000); 
      }
    });
  }
}