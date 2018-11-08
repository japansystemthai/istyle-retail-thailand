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
        <li class="active">New promotion</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9" style="left: 50%; transform: translate(-50%);padding-top: 20px;">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Promotion : สร้างโปรโมชั่น</h3>
            </div>
          <!-- form start -->
          <?php include('autogen.php');
          ?>
          <form role="form" action="" method="post" id="NewPromotion" name="NewPromotion">
            <div class="box-body" style="padding:10px 40px 0px 40px;"> 
              <div class="row">
              <div class="col-md-6">
                <input type="hidden" id="USER_ID" name="USER_ID" value="<?php echo $objResult["USER_ID"];?>">
              <div class="form-group">
                <label>Promotion Code: รหัสโปรโมชั่น</label>
                <input type="text" class="form-control" id="promotionCode" name="promotionCode" value="<?php echo $promotionCode ?>" readonly>
              </div>
              </div></div>

              <div class="form-group">
                <label>Promotion Name: ชื่อโปรโมชั่น</label>
                <input type="text" class="form-control" placeholder="" id="promotionName" name="promotionName" maxlength="120" required>
              </div>

            <div class="row">
              <div class="col-xs-8">
                <div class="form-group">
                  <label>Store: สาขา</label>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a Store"
                        style="width: 100%;" id="Store" name="Store[]">
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
                <select class="form-control select2" style="width: 100%;" id="Category" name="Category" onchange='hideproductcode()';>
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
                <select class="form-control select2" style="width: 100%;" id="Maker" name="Maker" onchange='hideproductcode()';>
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
                <select class="form-control" style="width: 100%;" id="promotion_type" name="promotion_type">
                  <option selected="selected" value="1">Add</option>
                  <option value="2">Multiply</option>
                </select>
              </div>
              <div class="form-group">
                <label>Point: </label>
                <input type="number" class="form-control" placeholder="" id="Point" name="Point" maxlength="10" required>
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
                    <input type="Date" class="form-control pull-right" name="start" required>
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
                    <input type="Date" class="form-control pull-right" name="finish" required>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                  <label>All Product:&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="all_product" name="all_product" value="All" onchange="hidewhenchecked()"><br>
                    สินค้าทั้งหมด
                  </label>
                </div>
                <div class="form-group">
                  <label>Priority(1-99): </label>
                  <input type="number" min="1" max="99" maxlength="2" class="form-control" placeholder="" id="Priority" name="Priority" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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
                  <td><input type="text" id="ProductID1" name="ProductID[]" class="form-control ProductID" maxlength="20" list="ProductList" required></td>
                  <td><input type="text" id="ProductName1" name="ProductName[]" class="form-control ProductName"></td>
                  <td><input type="button" class="btn btn-block btn-danger" value="Delete"></td>
                </tr>
                <tr>
                  <td><input type="text" id="ProductID2" name="ProductID[]" class="form-control ProductID" maxlength="20" list="ProductList" required></td>
                  <td><input type="text" id="ProductName2" name="ProductName[]" class="form-control ProductName"></td>
                  <td><input type="button" class="btn btn-block btn-danger" value="Delete"></td>
                </tr>
              </table>
              <p>
                <input type="button" class="btn btn-success" id="insertrow" value="Insert row">
              </p>

              <!-- textarea -->
                <div class="form-group">
                  <label>Remark: หมายเหตุ</label>
                  <textarea class="form-control" rows="3" placeholder="" id="Remark" name="Remark"></textarea>
                </div>

          </div>
          <!-- /.box -->
          <div class="box-footer">
            <button type="button" onclick="location.href='promotion.php';" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary pull-right createPromotion">Register</button>
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
<datalist id="ProductList">
   <?php 
      $sqlProduct = "SELECT PRODUCT_CODE, PRODUCT_NAME
              FROM  M_PRODUCT
              order by PRODUCT_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
      $resultProduct = mysqli_query($conn, $sqlProduct);
      while($rowProduct = mysqli_fetch_array($resultProduct))
      {
    ?>
      <option value="<?php echo $rowProduct['PRODUCT_CODE']?>"><?php echo $rowProduct['PRODUCT_NAME']?></option>
    <?php
      }
    ?>
</datalist>
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
function hideproductcode() {
  var Category = document.getElementById("Category").value;
  var Maker = document.getElementById("Maker").value;

  var ProID = document.getElementsByClassName("ProductID");
  var ProName = document.getElementsByClassName("ProductName");

  if(Category != "" || Maker != "") {
    document.getElementById('insertrow').disabled = true;
    for (var i = 0; i < ProID.length; i++) { 
      ProID[i].disabled = true;
      ProName[i].disabled = true;
    }
  } else {
    document.getElementById('insertrow').disabled = false;
    for (var i = 0; i < ProID.length; i++) { 
      ProID[i].disabled = false;
      ProName[i].disabled = false;
    }
  }
}

function hidewhenchecked() {
  var ProID = document.getElementsByClassName("ProductID");
  var ProName = document.getElementsByClassName("ProductName");
  var el = document.getElementById("all_product");

  var Category = document.getElementById("Category");
  var Maker = document.getElementById("Maker");

    if (el.checked) {
      Category.disabled = true;
      Maker.disabled = true;
      document.getElementById('insertrow').disabled = true;
      for (var i = 0; i < ProID.length; i++) {
        ProID[i].disabled = true;
        ProName[i].disabled = true;
      }
    } else {
      Category.disabled = false;
      Maker.disabled = false;
      
      if(Category.value == "" && Maker.value == "") {
        document.getElementById('insertrow').disabled = false;
        for (var i = 0; i < ProID.length; i++) { 
          ProID[i].disabled = false;
          ProName[i].disabled = false;
        }
      }//close if check value
    }//close if else checked
}

var i = 2;
$('#Product').on('click', 'input[type="button"]', function () {
    $(this).closest('tr').remove();
})
$('p input[type="button"]').click(function () {
    i++;
    $('#Product').append('<tr><td><input type="text" id="ProductID'+i+'" name="ProductID[]" class="form-control ProductID" maxlength="20" list="ProductList" required></td><td><input type="text" id="ProductName'+i+'" name="ProductName[]" class="form-control ProductName"></td><td><input type="button" class="btn btn-block btn-danger" value="Delete"></td></tr>')
});


$("#Store").on('select2:select select2:unselect', function(){

    var selected = $(this).val();
    if(selected != null || selected != "")
    {
      if(selected.indexOf('All')>=0){
        $(this).val('All').select2();
      }
    }
    setTimeout(function(){
        $("#Store").select2();
    });
});

$('#NewPromotion').on('submit', function(e) {
    e.preventDefault();
    var dataProduct = $("form").serialize(); 
    $.ajax({
      type:'POST',
      url:'insertPromotion.php',
      data: dataProduct,
      cache: false,
      error: function (xhr, status, error) {
        alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText );
        //console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
      },
      success: function(data){ 
        if (data == "Success") {
          alert(data);
          window.location.href='promotion.php';
        } else {
          alert(data);
           return false;
        }
      }
    });
});

$("#Product").on('change keydown paste input', function(){
  $("input[name='ProductID\\[\\]']").on('input', function () {
    var proval = this.value;
    var proid = this.id;
    var numb = proid.match(/\d/g);
    numb = numb.join("");
        //send ajax request
        $.ajax({
            type: "POST",
            url: 'readDataProduct.php',
            dataType: 'JSON',
            data: {val: proval},
            error: function (xhr, status, error) {
                alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
            },
            success: function(data) {
              if (data) {
                var pronamenumb = "#ProductName"+numb;
                $(pronamenumb).val(data.PRODUCT_NAME);
              }
            }
        });
  });
});

</script>
</body>
</html>
