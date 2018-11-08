<div class="modal fade" id="modal-edituser" name="modal-edituser" style="overflow-y:auto;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">
        <form id="edit_user"  autocomplete="off">
          <fieldset>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>User ID: รหัสผู้ใช้</label>
                  <input type="text" class="form-control" placeholder="" id="userId" name="userId" required value="<?php echo isset($_POST["userId"]) ? $_POST["userId"] : ''; ?>" disabled> 
                </div>
              </div>
              <div class="col-md-6" style="text-align: center;">
                <a class="editpw btn btn-app bg-red" id="edit_password" name="edit_password" data-toggle="modal" data-target="#modal-editpassword" >
                  <i class="fa fa-lock"></i> Edit Password
                </a>
              </div>
            </div><!-- /.row -->
            <div class="form-group">
                  <label>User Name(English): ชื่อผู้ใช้ภาษาอังกฤษ</label>
                  <input type="text" class="form-control" placeholder="" id="userNameEng" name="userNameEng" maxlength="50" required value="<?php echo isset($_POST["userNameEng"]) ? $_POST["userNameEng"] : ''; ?>">
                </div>
                <!-- /.form group -->
            <div class="form-group">
              <label>User Name: ชื่อผู้ใช้</label>
              <input type="text" class="form-control" placeholder="" id="userName" name="userName"  maxlength="50" required value="<?php echo isset($_POST["userName"]) ? $_POST["userName"] : ''; ?>">
            </div>

            <div class="form-group">
                  <label>Authority: สิทธิ์</label>
                  <select class="form-control" style="width: 100%;" id="Authority" name="Authority">
                  <?php //connect db
                    include("../../connect.php");
                    $sqlAutho = "select * from M_CLASSIFICATION WHERE CLASSIFICATION_ID = '900' order by CLASSIFICATION_CODE";  //เรียกข้อมูลมาแสดงทั้งหมด
                    $resultAutho = mysqli_query($conn, $sqlAutho);
                    while($rowAutho = mysqli_fetch_array($resultAutho))
                    {
                  ?>
                  <option value="<?php echo $rowAutho['CLASSIFICATION_CODE']?>"><?php echo $rowAutho['CLASSIFICATION_CODE_EN_NM']?></option>
                  <?php
                    }
                  ?>
                </select>
                </div>

            <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Register ID</label>
                  <input type="text" id="reg_id" name="reg_id" class="form-control input-sm" value="<?php echo isset($_POST["reg_id"]) ? $_POST["reg_id"] : ''; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Modified ID</label>
                  <input type="text" id="mod_id" name="mod_id" class="form-control input-sm" value="<?php echo isset($_POST["mod_id"]) ? $_POST["mod_id"] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Register Date</label>
                  <input type="date" class="form-control input-sm" id="reg_ymd" name="reg_ymd" value="<?php echo isset($_POST["reg_ymd"]) ? $_POST["reg_ymd"] : ''; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Modified Date</label>
                  <input type="date" class="form-control input-sm" id="mod_ymd" name="mod_ymd" value="<?php echo isset($_POST["mod_ymd"]) ? $_POST["mod_ymd"] : ''; ?>" readonly>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Register Time</label>
                  <input type="time" class="form-control input-sm" id="reg_time" name="reg_time" value="<?php echo isset($_POST["reg_time"]) ? $_POST["reg_time"] : ''; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>Modified Time</label>
                  <input type="time" class="form-control input-sm" id="mod_time" name="mod_time" value="<?php echo isset($_POST["mod_time"]) ? $_POST["mod_time"] : ''; ?>" readonly>
                </div>
              </div>
              </div>
              
                  </fieldset>
                </form>
              </div><!-- /.modal body -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="saveedituser" data-userid="<?php echo $objResult["USER_ID"]?>" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->