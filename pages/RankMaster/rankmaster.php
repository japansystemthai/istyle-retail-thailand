<?php include('../../connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include('../../head.php'); ?>
    <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
    
<body class="hold-transition skin-green" style="min-height: 100%">
<div class="wrapper">
  <?php include('../../header.php'); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('../../sidebar_rank.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Rank master maintenance
        <small>ข้อมูลจัดลำดับ</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rank master</a></li>
        <li class="active">Data Rank</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="overflow-x: scroll;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="newrank.php" class="btn btn-block btn-primary">Create New Rank<br>เพิ่มลำดับใหม่</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form name="form1" method="post" action="">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="list-data">
                  <th>RANK<br>รหัสลำดับ</th>
                  <th>POINT MAGNIFICATION<br>อัตราคะแนนที่จะได้รับ（เท่า)</th>
				  <th>SALES AMOUNT<br>มูลค่ายอดขาย</th>
                  <th>RANK NAME <br>ชื่อลำดับ</th>
                  <th>Delete <br>ลบ</th>
                  <th>Edit <br>แก้ไข</th>
                </tr>
                </thead>
                  <tbody class="show-list-data">
                
                  <?php //connect db
                    include("../../connect.php");
                    $sql = "select RANK_CODE,RANK_NAME,SALES_AMT,REG_ID, POINT_MAGNIFICATION,REMARK,REG_YMD,    REG_TIME, REG_ID, MOD_FLG, MOD_YMD,MOD_TIME, MOD_ID
                            from M_RANK 
							where DELETE_FLG = '0' ORDER BY POINT_MAGNIFICATION DESC";  //เรียกข้อมูลมาแสดงทั้งหมด
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                  ?>
                  <tr>
                    <td><?php echo $row['RANK_CODE']?></td>
                    <td><?php echo $row['POINT_MAGNIFICATION']?></td>
					<td><?php echo $row['SALES_AMT']?></td> 
                    <td><?php echo $row['RANK_NAME']?></td>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['RANK_CODE']?>"></td>
                    <td><?php echo "<a class='editrank btn btn-block btn-success btn-sm' data-id='".$row['RANK_CODE']."' data-userid='".$objResult["USER_ID"]."' role='button' data-toggle='modal' data-target='#modal-editrank' id='editrank' name='editrank'>Edit</a>"; ?></td>
                  </tr>
                  <?php
                    }
                    ?>
                
                
                </tbody>
                <tfoot>
                <tr>
                   <th>RANK<br>รหัสลำดับ</th>
                   <th>POINT MAGNIFICATION<br>อัตราคะแนนที่จะได้รับ（เท่า)</th>
				   <th>SALES AMOUNT<br>มูลค่ายอดขาย</th>
                   <th>RANK NAME <br>ชื่อลำดับ</th>
                   <th>Delete <br>ลบ</th>
                   <th>Edit <br>แก้ไข</th>
                </tr>
                </tfoot>
              </table>
              <input class="btn btn-block btn-danger btn-flat" name="delete" type="submit" id="delete" value="Delete" style="width: 30%;display: block;margin-right: auto;margin-left: auto;" onclick="return confirm('Are you sure you want to delete that?');">
              <?php
                // Check if delete button active, start this 
                if(isset($_POST['delete']))
                {
                    $checkbox = $_POST['checkbox'];
                      date_default_timezone_set("Asia/Bangkok");  
                  for($i=0;$i<count($checkbox);$i++){

                    $del_id = $checkbox[$i];
                    $sql = "UPDATE M_RANK SET MOD_YMD = '".date("Y-m-d")."', MOD_TIME = '".date("H:i:s")."',MOD_ID = '".$objResult["USER_ID"]."',DELETE_FLG = '1' WHERE RANK_CODE = '$del_id'";
                    $result = mysqli_query($conn,$sql);
                  }
                  // if successful redirect to delete_multiple.php 
                  if($result){
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=rankmaster.php\">";
                  }
                }
                mysqli_close($conn);
                
                ?>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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

<?php include('edit_rankmaster.php'); ?>  
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
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

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>
    
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
<script >
 $(document).ready(function() {   
$('#example1').on('click','.editrank', function (e) {
  var val = $(this).data('id');
     var userid = $(this).data('userid');
    if($('.editrank').filter(function(){
        return $(this).data('id') === val;       
    }).length) {
        //send ajax request
        $.ajax({
            type: "POST",
            url: 'ShowEditRank.php',
            dataType: 'JSON',
            data: {id: val},
            error: function (xhr, status, error) {
                alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
                $('#modal-editrank').modal('hide');
            },
            success: function(data) {
              if (!$.trim(data)){   
                alert("What follows is blank: " + data);
                $('#modal-editrank').modal('hide');
              } else{  
                    $("#RANK_CODE").val(data.RANK_CODE);
                    $("#RANK_NAME").val(data.RANK_NAME);
                    $("#SALES_AMT").val(data.SALES_AMT);
                    $("#REMARK").val(data.REMARK);
                    $("#POINT_MAGNIFICATION").val(data.POINT_MAGNIFICATION); 
                    $("#REG_YMD").val(data.REG_YMD);
                    $("#REG_TIME").val(data.REG_TIME);
                    $("#REG_ID").val(data.REG_ID);
                     if ($.trim(data.MOD_ID)) {
                      $("#MOD_ID").val(data.MOD_ID);
                      $("#MOD_YMD").val(data.MOD_YMD);
                      $("#MOD_TIME").val(data.MOD_TIME);
                    } else {
                      var now = new Date();
                      var day = ("0" + now.getDate()).slice(-2);
                      var month = ("0" + (now.getMonth() + 1)).slice(-2);
                      var today = now.getFullYear()+"-"+(month)+"-"+(day);
                      var hh = ('0' + now.getHours()).slice(-2);
                      var mm = ('0' + now.getMinutes()).slice(-2);
                      var ss = ('0' + now.getSeconds()).slice(-2);
                      $("#MOD_YMD").val();
                      $("#MOD_YMD").val(today);
                      $("#MOD_TIME").val(hh + ':' + mm + ':' + ss);
                    }
              }  
            }
        });
        
    }   
});
    
$('#saveeditrank').click(function(e) {
    e.preventDefault();
    if($('#RANK_CODE').val() == "")
    {
        alert('Please input Rank Code!');
        return; 
    }
    
    if($('#POINT_MAGNIFICATION').val() == "")
    {
        alert('Please input !');
        return;
    }
    if($('#RANK_NAME').val() == "")
    {
        alert('Please input!');
        return; 
    }
    
    var userid = $(this).data('userid');
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day);
    var hh = ('0' + now.getHours()).slice(-2);
    var mm = ('0' + now.getMinutes()).slice(-2);
    var ss = ('0' + now.getSeconds()).slice(-2);
    var time = hh + ':' + mm + ':' + ss;
   
    $.ajax({
      type:'POST',
      url:'SaveEditRank.php',
      dataType: 'text',
      data: { RANK_CODE:$('#RANK_CODE').val(),
              RANK_NAME: $('#RANK_NAME').val(),
			  POINT_MAGNIFICATION: $('#POINT_MAGNIFICATION').val(), 
              SALES_AMT: $('#SALES_AMT').val(),
              MOD_ID: userid,
              MOD_YMD: today,
              MOD_TIME: time
           },
      error: function (xhr, status, error) {
        alert("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText );
        console.log("Error: " + error + " Status: " + status + " xhr: " + xhr.responseText);
      },
      success:function(response) {
        if(response == 'success'){
          alert("Update success!");
          $('#modal-editrank').modal('hide');
          window.location.reload();
        } else {
          alert('Failed to Update');
        }
        console.log(response)
      }
    });//close ajax
  });
});

</script>
</body>
</html>
