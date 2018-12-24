<div class="modal fade" id="modal-editcus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Customer</h4>
              </div>
              <div class="modal-body">
                <form id="edit_form">
                  <fieldset>
                    <div class="row"><div class="col-md-6">
                      <div class="form-group">
                        <label>Customer Code: รหัสลูกค้า</label>
                        <input type="number" class="form-control" id="cusCode" name="cusCode" disabled data-msg="Please enter Customer code" maxlength="20" min="0" value="<?php echo isset($_POST["cusCode"]) ? $_POST["cusCode"] : ''; ?>" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <!-- phone mask -->
                    <div class="form-group">
                    <label>Telephone Number: เบอร์โทรศัพท์</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" id="tel" name="tel" class="form-control" required value="<?php echo isset($_POST["tel"]) ? $_POST["tel"] : ''; ?>">
                    </div>
                    <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                    </div>
                    </div><!-- /.row -->
                    <div class="form-group">
                <label>Customer Name(English): ชื่อลูกค้า(ภาษาอังกฤษ)</label>
                <input type="text" class="form-control" placeholder="" maxlength="150" id="cusNameEng" name="cusNameEng" required value="<?php echo isset($_POST["cusNameEng"]) ? $_POST["cusNameEng"] : ''; ?>">
              </div>

              <div class="form-group">
                <label>Customer Name: ชื่อลูกค้า</label>
                <input type="text" class="form-control" placeholder="" maxlength="150" id="cusName" name="cusName" required value="<?php echo isset($_POST["cusName"]) ? $_POST["cusName"] : ''; ?>">
              </div>
            <div class="row">
              <div class="col-xs-4">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Birthday: วันเดือนปีเกิด</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                 <input type="text" class="form-control" id="birth" name="birth" value="<?php echo isset($_POST["birth"]) ? $_POST["birth"] : ''; ?>" style="width:85%" required >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Gender: เพศ</label>
                  <select class="form-control" id="gender" name="gender">
                   <?php
                      include("../../connect.php");
                      $sqlgender = "select CLASSIFICATION_CODE ,CLASSIFICATION_CODE_EN_NM
                            from M_CLASSIFICATION
                            where CLASSIFICATION_ID = '100'
                            order by CLASSIFICATION_CODE_EN_NM";
                      $resultgender = mysqli_query($conn, $sqlgender);
                      while($rowgender = mysqli_fetch_array($resultgender))
                      {
                    ?>
                    <option value="<?php echo $rowgender['CLASSIFICATION_CODE']?>"><?php echo $rowgender['CLASSIFICATION_CODE_EN_NM']?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Nationality: สัญชาติ</label>
                  <select class="form-control select2" style="width: 100%" id="race" name="race">
                    <?php
                      $sqlNationality = "select CLASSIFICATION_CODE ,CLASSIFICATION_CODE_EN_NM
                            from M_CLASSIFICATION
                            where CLASSIFICATION_ID = '300'
                            order by CLASSIFICATION_CODE_EN_NM";
                      $resultNationality = mysqli_query($conn, $sqlNationality);
                      while($rowNationality = mysqli_fetch_array($resultNationality))
                      {
                    ?>
                    <option value="<?php echo $rowNationality['CLASSIFICATION_CODE']?>"><?php echo $rowNationality['CLASSIFICATION_CODE_EN_NM']?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div><!-- row -->

              <!-- textarea -->
                <div class="form-group">
                  <label>Address: ที่อยู่</label>
                  <textarea class="form-control" rows="3" placeholder="" maxlength="300" id="address" name="address"><?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?></textarea>
                </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>E-mail Address: อีเมล</label>
                  <input type="email" class="form-control" placeholder="" maxlength="50" id="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                </div>
                <div class="form-group">
                <label>Setting rank: อันดับ</label>
                <select class="form-control" style="width: 100%;" id="rank" name="rank">
                   <?php
                      $sqlRank = "select RANK_CODE ,RANK_NAME
                            from M_RANK
                            where DELETE_FLG = '0'
                            order by POINT_MAGNIFICATION";
                      $resultRank = mysqli_query($conn, $sqlRank);
                      while($rowRank = mysqli_fetch_array($resultRank))
                      {
                    ?>
                  <option value="<?php echo $rowRank['RANK_CODE']?>"><?php echo $rowRank['RANK_NAME']?></option>
                  <?php
                    }
                    ?>
                </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Line ID: บัญชีไลน์</label>
                  <input type="text" class="form-control" placeholder="" maxlength="20" id="lineId" name="lineId" value="<?php echo isset($_POST["lineId"]) ? $_POST["lineId"] : ''; ?>">
                </div>
              </div>
            </div><!-- close row -->
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
                <button type="submit" id="saveeditcust" data-userid="<?php echo $objResult["USER_ID"]?>" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->