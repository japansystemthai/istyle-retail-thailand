<div class="modal fade" id="modal-editrank">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Rankmaster</h4>
              </div>
              <div class="modal-body">
                <form class="contact" id="editrank">
                  <fieldset>
                  <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-6">
                      <div class="form-group">
                        <label>RANK CODE: รหัสลำดับ</label>
                        <input type="text" class="form-control" id="RANK_CODE" name="RANK_CODE" value="<?php echo isset($_POST["RANK_CODE"]) ? $_POST["RANK_CODE"] : ''; ?>"  required readonly> 
                      </div>
                    </div>
                   
                        
                    </div>
                      
                <div class="form-group">
                <label>POINT MAGNIFICATION: อัตราคะแนนที่จะได้รับ（เท่า)</label>
                <input type="text" class="form-control" placeholder="" maxlength="10" id="POINT_MAGNIFICATION" name="POINT_MAGNIFICATION" required value="<?php echo isset($_POST["POINT_MAGNIFICATION"]) ? $_POST["POINT_MAGNIFICATION"] : ''; ?>">
              </div>
              
			  <div class="form-group">
                <label>SALES AMOUNT: มูลค่ายอดขาย</label>
                <input type="text" class="form-control" placeholder="" maxlength="10" id="SALES_AMT" name="SALES_AMT" required value="<?php echo isset($_POST["SALES_AMT"]) ? $_POST["	SALES_AMT"] : ''; ?>">
              </div>
					  
              <div class="form-group">
                <label>RANK NAME: ชื่อลำดับ</label>
                <input type="text" class="form-control" placeholder="" maxlength="10" id="RANK_NAME" name="RANK_NAME" required value="<?php echo isset($_POST["RANK_NAME"]) ? $_POST["RANK_NAME"] : ''; ?>">
              </div>
          
              <!-- textarea -->
                      
             <div class="row">
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Register ID</label>
                  <input type="text" class="form-control input-sm" id="REG_ID" name="REG_ID" value="<?php echo isset($_POST["REG_ID"]) ? $_POST["REG_ID"] : ''; ?>"" readonly >
                </div>
                <div class="form-group">
                  <label>Modified ID</label>
                  <input type="text" class="form-control input-sm" id="MOD_ID" name="MOD_ID" value="<?php echo isset($_POST["MOD_ID"]) ? $_POST["MOD_ID"] : ''; ?>"" readonly >
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Register Date</label>
                  <input type="date" class="form-control input-sm" id="REG_YMD" name="REG_YMD" value="<?php echo isset($_POST["REG_YMD"]) ? $_POST["REG_YMD"] : ''; ?>"" readonly >
                </div>
                <div class="form-group">
                  <label>Modified Date</label>
                  <input type="date" class="form-control input-sm" id="MOD_YMD" name="MOD_YMD" value="<?php echo isset($_POST["MOD_YMD"]) ? $_POST["MOD_YMD"] : ''; ?>"" readonly >
                </div>
              </div>
              <div class="col-xs-4">
                <div class="form-group">
                  <label>Register Time</label>
                  <input type="time" class="form-control input-sm" id="REG_TIME" name="REG_TIME" value="<?php echo isset($_POST["REG_TIME"]) ? $_POST["REG_TIME"] : ''; ?>"" readonly >
                </div>
                <div class="form-group">
                  <label>Modified Time</label>
                  <input type="time" class="form-control input-sm" id="MOD_TIME" name="MOD_TIME" value="<?php echo isset($_POST["MOD_TIME"]) ? $_POST["MOD_TIME"] : ''; ?>"" readonly >
                </div>
                </div>
              </div>
                      
                        </div>
                  </fieldset>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" id="saveeditrank" data-userid="<?php echo $objResult["USER_ID"]?>" class="btn btn-primary">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    
<!-- /.modal -->

