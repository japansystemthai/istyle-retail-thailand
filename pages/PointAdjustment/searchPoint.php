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
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
</head>
<body class="hold-transition skin-green" style="">
<div class="wrapper">

   <?php include('../../header.php'); 
          if($_SESSION['ses_status'] == "Manager") {
          echo "<script type='text/javascript'> window.alert('Can not use this page!'); 
                window.location.href='javascript:history.go(-1)';
                </script>";
          }?>
  <!-- Left side column. contains the logo and sidebar -->
  
      <?php include('../../sidebar_PointAdjustment.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Point Adjustment Page
        <small>การแก้ไขคะแนน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Point Adjustment Page</a></li>
        <li class="active">Search customer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12" style="left: 50%; transform: translate(-50%);padding-top: 20px;">

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Search customer</h3>
            </div>
          <div class="box-body"> 
            <div class="row">
              <div class="col-md-5">
                <!-- search form -->
                  <form id="searchCustForm" name="searchCustForm">
                    <div class="input-group">
                      <input type="text" id="searchCust" name="searchCust" class="form-control" placeholder="ค้นจากรหัสลูกค้า/ชื่อ/เบอร์โทร" required>
                      <span class="input-group-btn">
                        <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                      </span>
                    </div>
                  </form>
            <!-- /.search form -->
              </div>
            </div>
           
          </div><!-- /.box-body -->
          <div class="overlay" style="display: none;">
              <i class="fa fa-refresh fa-spin"></i>
          </div>

          <div class="row" id="ShowCustomerPoint" style="display: none;">
              <div class="col-md-12">
                <table class="table table-bordered table-striped" id="ShowCustTable" >
                  <thead>
                    <tr>
                      <th>Customer Code : รหัสลูกค้า</th>
                      <th>Name : ชื่อภาษาไทย</th>
                      <th>Tel : โทรศัพท์</th>
                      <th>Point : คะแนน</th>
                      <th width="10%">แก้ไขคะแนน</th>     
                    </tr>
                  </thead>
                  <tbody id="CustBody"></tbody>
                </table>
              </div>
            </div>
        </div><!-- /.box box-success -->
        </div><!--/.col (left) -->

        
      </div><!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="modal-editPoint">
          <div class="modal-dialog" style="width: 43%;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adjust Point</h4>
              </div>
              
            <form role="form" id="saveEditPoint">
              <div class="modal-body">
                <input type="hidden" id="USER_ID" value="<?php echo $objResult["USER_ID"];?>">
                <div class="form-group">
                  <label for="custCode">Customer Code : รหัสลูกค้า</label>
                  <input type="text" class="form-control" id="custCode" readonly>
                </div>
                <div class="form-group">
                  <label for="name">Name : ชื่อ</label>
                  <input type="text" class="form-control" id="name" readonly>
                </div>
                <div class="form-group">
                  <label for="tel">Tel : โทรศัพท์</label>
                  <input type="text" class="form-control" id="tel" readonly>
                </div>
                <div class="form-group">
                  <label for="point">Point : คะแนน</label>
                  <input type="text" class="form-control" id="point" readonly>
                </div>
                <div class="form-group">
                  <label>Adjust Point : แก้ไขคะแนน</label>
                  <div class="input-group">
                    <div class="input-group-btn" style="width: 16%;">
                      <select class="form-control" id="AdjustSelect" name="AdjustSelect">
                        <option>Add</option>
                        <option>Minus</option>
                      </select>
                    </div>
                    <input type="number" class="form-control" id="AdjustPoint" name="AdjustPoint" min="0" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Reason : เหตุผลในการแก้ไข</label>
                  <textarea class="form-control" rows="3" placeholder="" maxlength="1000" id="reason" autocomplete="off"></textarea>
                </div>
                </div>
              <div class="box-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
              </div>
            </form>
          </div>
              </div>
            </div><!-- close row Edit Point  -->
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
</div>
<!-- ./wrapper -->

<?php include('../../jquery_customer.php'); ?>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
	</script>	


<script type="text/javascript">
 $(document).ready(function() {
  $('#searchCustForm').on('submit', function(e) {
    e.preventDefault();
    $("#CustBody").empty('');
    $.ajax({
      type:'POST',
      url:'ShowCustomerPoint.php',
      data: {CST_CODE: $.trim($("#searchCust").val())},
      cache: false,
      beforeSend: function () { 
        $(".overlay").show(); },
      complete: function () {
        $(".overlay").hide();
      },
      error: function (xhr, status, error) {
        alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText );
        console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
      },
      success: function(data){
        if ($.trim(data)){
          if ($.trim(data) == "Data not matching") {
            alert($.trim(data));
            $("#ShowCustomerPoint").hide();
          } else {
            $("#ShowCustomerPoint").show();
            $("#CustBody").append(data);
          }
        } else{
          $("#ShowCustomerPoint").hide();
        }
      }
    });//close ajax
  });
  
});

$(document).on('click', '.editPoint', function(e) {
    var $row = $(this).closest("tr");    // Find the row
    var $tds = $row.find("td");
    var i = 0;
    $.each($tds, function() {
      i++
      if (i==1) {
        $('#custCode').val($(this).text());
      } else if (i==2) {
        $('#name').val($(this).text());
      } else if (i==3) {
        $('#tel').val($(this).text());
      } else if (i==4) {
        $('#point').val($(this).text());
      } else {
        console.log($(this).text());
      }
    });
});
  
</script>
<script type="text/javascript">
   $(document).ready(function() {
    $('#saveEditPoint').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
      type:'POST',
      url:'saveAdjustPoint.php',
      data: {CST_CODE: $.trim($('#custCode').val()),
            AdjustSelect: $('#AdjustSelect').val(),
            AdjustPoint: $('#AdjustPoint').val(),
            reason: $('#reason').val(),
            userid: $('#USER_ID').val()},
      cache: false,
      beforeSend: function () { 
        $(".overlay").show(); 
      },
      complete: function () {
        $(".overlay").hide();
      },
      error: function (xhr, status, error) {
        alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText );
        console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
      },
      success: function(data){
        alert(data);
        if (data = "Success") {
          $('#modal-editPoint').modal('hide');
          $('#AdjustPoint').val('');
          $('#reason').val('');
          window.location.reload();
        }
      }
    });//close ajax
  });
});
</script>
</body>
</html>
