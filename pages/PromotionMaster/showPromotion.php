<!DOCTYPE html>
<html>
<head>
  <?php include('../../head.php'); ?>
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition skin-green" style="">
<div class="wrapper">

   <?php include('../../header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
      <?php include('../../sidebar_promotion.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promotion master maintenance
        <small>การจัดการมาสเตอร์โปรโมชั่น</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Promotion master</a></li>
        <li class="active">Show promotion</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9" style="left: 50%; transform: translate(-50%);padding-top: 20px;">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Promotion : โปรโมชั่น</h3>
            </div>
          <!-- form start -->
          <form role="form" action="" method="post" id="NewPromotion" name="NewPromotion">
            <div class="box-body" style="padding:10px 40px 0px 40px;"> 
              <div class="row">
              <div class="col-md-6">
                <input type="hidden" id="USER_ID" name="USER_ID" value="<?php echo $objResult["USER_ID"];?>">
              <div class="form-group">
                <label>Promotion Code: รหัสโปรโมชั่น</label>
                <input type="text" class="form-control" id="promotionCode" name="promotionCode" readonly>
              </div>
              </div></div>

              <div class="form-group">
                <label>Promotion Name: ชื่อโปรโมชั่น</label>
                <input type="text" class="form-control" placeholder="" id="promotionName" name="promotionName" maxlength="120" readonly>
              </div>

            <div class="row">
              <div class="col-xs-8">
                <div class="form-group">
                  <label>Store: สาขา</label>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a Store"
                        style="width: 100%;" id="Store" name="Store[]" disabled="disabled">
                  <option value="All">All</option>
                  <?php //connect db
                    include("../../connect.php");
                    $sqlStore = "select STORE_CODE, STORE_NAME
                      from M_STORE";  
                    $resultStore = mysqli_query($conn, $sqlStore);
                    while($rowStore = mysqli_fetch_array($resultStore))
                    {
                  ?>
                  <option value="<?php echo $rowStore['STORE_CODE']?>"><?php echo $rowStore['STORE_NAME']?></option>
                  <?php
                    }
                  ?>
                </select>
                </div>
                <div class="form-group">
                <label>Category: แคทีกอรี่</label>
                <select class="form-control select2" style="width: 100%;" id="Category" name="Category" disabled="disabled">
                  <option value="">------------------</option>
                  <?php 
                    $sqlCategory = "select  CAT_CODE, CAT_NAME
                      from M_CATEGORY";  
                    $resultCategory = mysqli_query($conn, $sqlCategory);
                    while($rowCategory = mysqli_fetch_array($resultCategory))
                    {
                  ?>
                  <option value="<?php echo $rowCategory['CAT_CODE']?>"><?php echo $rowCategory['CAT_NAME']?></option>
                  <?php
                    }
                  ?>
                </select>
                </div>
                <div class="form-group">
                <label>Maker: ผู้ผลิต</label>
                <select class="form-control select2" style="width: 100%;" id="Maker" name="Maker" disabled="disabled">
                  <option value="">------------------</option>
                  <?php 
                    $sqlMaker = "select  MAKER_CODE, MAKER_NAME
                      from M_MAKER";  
                    $resultMaker = mysqli_query($conn, $sqlMaker);
                    while($rowMaker = mysqli_fetch_array($resultMaker))
                    {
                  ?>
                  <option value="<?php echo $rowMaker['MAKER_CODE']?>"><?php echo $rowMaker['MAKER_NAME']?></option>
                  <?php
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>Promotion Type: ประเภทโปรโมชั่น</label>
                <select class="form-control" style="width: 100%;" id="promotion_type" name="promotion_type" disabled="disabled">
                  <option selected="selected" value="1">Add</option>
                  <option value="2">Multiply</option>
                </select>
              </div>
              <div class="form-group">
                <label>Point: </label>
                <input type="number" class="form-control" placeholder="" id="Point" name="Point" maxlength="10" readonly>
              </div>
              </div>
              <div class="col-xs-3">
                <!-- Date range -->
                <div class="form-group">
                  <label>Start Date:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="Date" class="form-control pull-right" id="start" name="start" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>Finish Date:</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="Date" class="form-control pull-right" id="finish" name="finish" readonly>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>All Product:&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="all_product" name="all_product" value="All" disabled="disabled"><br>
                    สินค้าทั้งหมด
                  </label>
                </div>
                <div class="form-group">
                  <label>Priority(1-99): </label>
                  <input type="number" min="1" max="99" maxlength="2" class="form-control" placeholder="" id="Priority" name="Priority" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" readonly>
              </div>
              </div>
            </div><!-- row -->
            
            <table class="table table-bordered" id="Product">
               <thead>
                  <th style="width: 30%">Product Code<br>รหัสสินค้า</th>
                  <th>Product Name<br>ชื่อสินค้า</th>
                  <th style="width: 13%;">Delete</th>
                </thead>
                <tr>
                </tr>
              </table>

              <!-- textarea -->
                <div class="form-group">
                  <label>Remark: หมายเหตุ</label>
                  <textarea class="form-control" rows="3" placeholder="" id="Remark" name="Remark" readonly></textarea>
                </div>

          </div>
          <!-- /.box -->
          <div class="box-footer">
            <button type="button" onclick="location.href='promotion.php';" class="btn btn-default">Back</button>
          </div>
        </form>
        </div><!-- /.box box-info -->
        </div><!--/.col (left) -->
        
      </div><!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">HBA</a>.</strong> All rights
    reserved.
  </footer>
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include('../../jquery_customer.php'); ?>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script type="text/javascript">
  var url = new URL(window.location.href);
  var proCode = url.searchParams.get("proCode");
  if(typeof(proCode) != "undefined" && proCode !== null) {
    $(promotionCode).val(proCode);
    $.ajax({
            type: "POST",
            url: 'showDataPromotion.php',
            data: {id: proCode},
            cache: false,
            dataType: 'JSON',
            error: function (xhr, status, error) {
                alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
                console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
            },
            success: function(data) {
              if (!$.trim(data)){   
                alert("No data Matching: " + data);
                //window.location.href='promotion.php';
              } else{  
                $("#promotionName").val(data.PROMOTION_NAME);
                $("#start").val(data.START_YMD);
                $("#finish").val(data.FINISH_YMD);
                $('#promotion_type option[value="'+data.PROMOTION_TYPE+'"]').prop('selected', true);
                $("#Point").val(data.POINT_AMOUNT);
                $("#Remark").val(data.REMARK);
              }  
            }
        });//close ajax show Head
    $.ajax({
            type: "POST",
            url: 'showDataPromotionS.php',
            data: {id: proCode},
            cache: false,
            dataType: 'JSON',
            error: function (xhr, status, error) {
                alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
                console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
            },
            success: function(data) {
              if (!$.trim(data)){   
                alert("No data Store Matching: " + data);
                //window.location.href='promotion.php';
              } else{  
                var count = data[0].count;
                $("#Priority").val(data[0].PRIORITY_NO);
                if (count == 1) {
                  $('#Store').select2().val(data[0].STORE_CODE).trigger("change");
                } else {
                  var selectedValues = new Array();
                  for (var i = 0; i < count; i++) {
                    selectedValues[i] = data[i].STORE_CODE;
                  }
                  $('#Store').select2().val(selectedValues).trigger("change");
                  //$("#Store").val(saveStore2).trigger('change');
                }
              }  
            }
        });//close ajax show Store
    $.ajax({
            type: "POST",
            url: 'showDataPromotionD.php',
            data: {id: proCode},
            cache: false,
            dataType: 'JSON',
            error: function (xhr, status, error) {
                alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
                console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
            },
            success: function(data) {
              if (!$.trim(data)){   
                alert("No data Detail Matching: " + data);
                $("#Product").hide();
                //window.location.href='promotion.php';
              } else{  
                var count = data[0].count;
                if (typeof(data[0].all_product) != "undefined" && data[0].all_product !== null) {
                  $("#all_product").prop("checked", 1);
                  $("#Product").hide();
                } else if ((typeof(data[0].CATEGORY_CODE) != "undefined" && data[0].CATEGORY_CODE !== null) || (typeof(data[0].MAKER_CODE) != "undefined" && data[0].MAKER_CODE !== null)) {
                  $('#Category option[value="'+data[0].CATEGORY_CODE+'"]').prop('selected', true);
                  $('#Maker option[value="'+data[0].MAKER_CODE+'"]').prop('selected', true);
                  $("#Product").hide();
                } else {
                  for (var i = 0; i < count; i++) {
                    $("#Product").append("<tr><td><input type='text' name='ProductID[]'' class='form-control ProductID' value='"+ data[i].PRODUCT_CODE +"' readonly></td><td><input type='text' name='ProductName[]'' class='form-control ProductID' value='"+ data[i].PRODUCT_NAME +"' readonly></td><td><input type='button' class='btn btn-block btn-danger' value='Delete' disabled></td></tr>");
                  }
                }
      
                
              }  
            }
        });//close ajax show Detail
  } else {
    alert('Don`t have promotion code');
    window.location.href='promotion';
  }
</script>
</body>
</html>
