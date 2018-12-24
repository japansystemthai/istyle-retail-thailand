<div class="modal modal-danger fade" id="modal-editpassword" >
          <div class="modal-dialog" style="width: 30%;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Password</h4>
              </div>
              <div class="modal-body">
                <form id="edit_passworduser"><fieldset>
                  <input type="hidden" id="useridpw" name="useridpw" >
                  <div class="form-group">
                    <label>Old Password: รหัสผ่านเก่า</label>
                    <input type="password" class="form-control" placeholder="" id="oldPassword" name="password" required>
                  </div>

                  <div class="form-group">
                    <label>New Password: รหัสผ่านใหม่</label>
                    <input type="password" class="form-control" placeholder="" id="newPassword" name="password" required>
                  </div>

                  <div class="form-group">
                    <label>Confirm New Password: ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" class="form-control" placeholder="" id="confirmPassword" name="confirmPassword" required>
                  </div>
                </fieldset></form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="saveeditpassword" data-userid="<?php echo $objResult["USER_ID"]?>" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->