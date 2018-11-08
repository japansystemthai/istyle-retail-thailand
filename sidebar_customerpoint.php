 <aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
   
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="background-color:	#61b876;text-align: center;" >
         <b style="font-size:1.5em;" ><?php
          if($_SESSION['ses_status'] == "Administrator" ) {
            echo "ADMIN";
          } elseif ($_SESSION['ses_status'] == "master") {
                echo "MASTER";
          } else { echo "GENERAL"; }  
        ?>&nbsp;&nbsp;&nbsp;MAIN&nbsp;&nbsp;&nbsp;MENU</b> 
        </li>
        <li class="treeview active" style="font-color:#EEEEEE;"  >
          <a href="customerpoint.php">
              <i class="fa fa-files-o"></i>
            <span >Customer Point Inquiry<br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้อมูลคะแนนลูกค้า
            </span>
           </a>
         </li>
          <?php
          if($_SESSION['ses_status'] == "Administrator" || $_SESSION['ses_status'] == "master") {
        ?>  
        <li>
          <a href="../CustomerMaster/customer.php"><i class="fa fa-th"></i> 
              <span> Customer Master Maintenance<br>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การจัดการมาสเตอร์ลูกค้า</span>
          </a>
        </li>
          <?php
         }
if($_SESSION['ses_status'] == "Administrator") {

?>
        <li>
          <a href="../PromotionMaster/promotion.php">
            <i class="fa fa-pie-chart"></i>
            <span>Promotion Master Maintenance<br>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การจัดการมาสเตอร์โปรโมชั่น 
            </span>
          </a>
        </li>
          
        <li>
          <a href="../RankMaster/rankmaster.php">
           <i class="fa fa-table"></i>
        <span>Point Rank Master Maintenance<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การจัดการมาสเตอร์ระดับคะแนน
        </span>
        </a>
         
        </li>
        
          <li>
          <a href="../UserMaster/user.php">
            <i class="fa fa-user"></i> 
            <span>User Master Maintenance<br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;การจัดการมาสเตอร์ผู้ใช้ 
            </span>
          </a>
         </li>
          <?php
          }
          ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>