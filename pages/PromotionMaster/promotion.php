<!DOCTYPE html>
<html>
<head>
  <?php include('../../head.php'); ?>
    <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
</head>
<body class="hold-transition skin-green" style="min-height: 100%;">
<div class="wrapper">
  <?php include('../../header.php'); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include('../../sidebar_promotion.php'); ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Promotion master maintenance
        <small>การจัดการมาสเตอร์โปรโมชั่น</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="../../indexmainmenu.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Promotion master</a></li>
        <li class="active">Data Promotion</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="overflow-x: scroll;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="newpromotion.php" class="btn btn-block btn-primary">Create new promotion<br>สร้างโปรโมชั่น</a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <form name="form1" method="post" action="">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Promotion Code <br> รหัสโปรโมชั่น</th>
                  <th>Promotion Name <br>  ชื่อโปรโมชั่น</th>
                  <th>Start Date <br>  จากวันที่</th>
                  <th>Finish Date <br>  ถึงวันที่</th>
                  <th>Type <br> ประเภท</th>
                  <th>Point <br> คะแนน</th>
                  <th>Priority <br>  ความสำคัญ</th>
                  <th>Delete <br>  ลบ</th>
                </tr>
                </thead>
                <tbody>
                
                  <?php //connect db
                    include("../../connect.php");
                    $sql = "SELECT DISTINCT H.PROMOTION_CODE, H.PROMOTION_NAME, H.ALL_PRODUCT, H.START_YMD, H.FINISH_YMD, H.PROMOTION_TYPE, 
                        CASE WHEN H.PROMOTION_TYPE = 1 THEN 'Add' 
                            ELSE 'Multiply' 
                            END AS PROMOTION_TYPE_N, H.POINT_AMOUNT, S.PRIORITY_NO, H.REMARK
                      FROM  M_PROMOTION_HEAD H, M_PROMOTION_STORE S
                      WHERE S.PROMOTION_CODE = H.PROMOTION_CODE
                      order by H.PROMOTION_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result))
                    {
                  ?>
                  <tr>
                    <td><?php echo $row['PROMOTION_CODE']?></td>
                    <td><?php echo $row['PROMOTION_NAME']?></td>
                    <td><?php echo $row['START_YMD']?></td>
                    <td><?php echo $row['FINISH_YMD']?></td>
                    <td><?php echo $row['PROMOTION_TYPE']." : ".$row['PROMOTION_TYPE_N']?></td>
                    <td><?php echo $row['POINT_AMOUNT']?></td>
                    <td><?php echo $row['PRIORITY_NO']?></td>
                    <td><input type="checkbox" name="checkbox[]" value="<?php echo $row['PROMOTION_CODE']?>"></td>
                  </tr>
                  <?php
                    }
                    ?>
                
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Promotion Code <br> รหัสโปรโมชั่น</th>
                  <th>Promotion Name <br>  ชื่อโปรโมชั่น</th>
                  <th>Start Date <br> จากวันที่</th>
                  <th>Finish Date <br> ถึงวันที่</th>
                  <th>Type <br> ประเภท</th>
                  <th>Point <br> คะแนน</th>
                  <th>Priority <br>  ความสำคัญ</th>
                  <th>Delete <br>  ลบ</th>
                </tr>
                </tfoot>
              </table>
              <input class="btn btn-block btn-danger btn-flat" name="delete" type="submit" id="delete" value="Delete" style="width: 30%;display: block;margin-right: auto;margin-left: auto;" onclick="return confirm('Are you sure you want to delete that?');">
              <?php
                // Check if delete button active, start this 
                if(isset($_POST['delete']))
                {
                    $checkbox = $_POST['checkbox'];

                  for($i=0;$i<count($checkbox);$i++){

                    $del_id = $checkbox[$i];
                    $sqlHead = "DELETE FROM M_PROMOTION_HEAD WHERE PROMOTION_CODE = '$del_id'";
                    $sqlStore = "DELETE FROM M_PROMOTION_STORE WHERE PROMOTION_CODE = '$del_id'";
                    $sqlDetail = "DELETE FROM M_PROMOTION_DETAIL WHERE PROMOTION_CODE = '$del_id'";
                    $resultHead = mysqli_query($conn,$sqlHead);
                    $resultDetail = mysqli_query($conn,$sqlDetail);
                    $resultStore = mysqli_query($conn,$sqlStore);
                  }
                  // if successful redirect to delete_multiple.php 
                  if($resultHead && $resultDetail && $resultStore){
                    echo "<meta http-equiv=\"refresh\" content=\"0;URL=promotion.php\">";
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

</body>
</html>
