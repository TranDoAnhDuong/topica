<?php $this->load->view('element/breadcrumb', array('title' => ((isset($action) && $action == 'update') ? 'Sửa' : 'Thêm').' Tài khoản')); ?>
<?php $this->load->view('element/message'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <form data-toggle="validator" method="POST">
                <div class="form-group">
                    <label class="control-label">Tên tài khoản</label>
                    <input type="hidden" name="action" value="<?php echo (isset($action)) ? $action : 'insert';?>" />
                    <?php if(isset($action) && $action == 'update'): ?>
                    <input type="hidden" class="form-control" name="username" value="<?php echo (isset($user['username'])) ? $user['username'] : '';?>">
                    <?php endif ?>
                    <input type="text" class="form-control" name="username" placeholder="Tài khoản" <?php echo (isset($action) && $action == 'update') ? 'disabled="disabled"' : '';?>
                        value="<?php echo (isset($user['username'])) ? $user['username'] : '';?>">
                </div>
                <?php if(isset($action) && $action == 'insert'): ?>
                <div class="form-group" style="margin-bottom: 0px;">
                    <label for="inputPassword" class="control-label">Mật khẩu</label>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="password" data-toggle="validator" data-minlength="6" name="password" value="<?php echo (isset($user['newPassword'])) ? $user['newPassword'] : '';?>"
                                class="form-control" id="inputPassword" placeholder="Mật khẩu" data-error="Vui lòng nhập thông tin" required>
                            <span class="help-block with-errors"></span> 
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="password" class="form-control" id="inputPasswordConfirm" name="confirmPassword" value="<?php echo (isset($user['confirmPassword'])) ? $user['confirmPassword'] : '';?>"
                                data-match="#inputPassword" data-match-error="Mật khẩu không giống nhau" placeholder="Nhập lại mật khẩu" data-error="Vui lòng nhập thông tin" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <label class="control-label">Họ tên</label>
                    <input type="text" class="form-control" name="user_fullname" data-error="Vui lòng nhập thông tin" 
                    value="<?php echo (isset($user['user_fullname'])) ? $user['user_fullname'] : '';?>" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" data-error="Vui lòng nhập thông tin" 
                    value="<?php echo (isset($user['email'])) ? $user['email'] : '';?>" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group" id="role">
                    <label class="control-label">Nhóm quyền</label>
                    <select class="form-control" name="role_id">
                    <?php foreach($crm_role as $row){ ?>
                        <option class = "role" value="<?php echo $row["role_id"]; ?>" <?php echo (isset($user['role_id']) && $user['role_id'] == $row["role_id"]) ? 'selected="selected"' : '';?>><?php echo $row["rolename"]?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group" id="manager">
                    <label class="control-label">Người quản lý</label>
                    <select class="form-control" name="parent_id">
                    <?php foreach($manager as $row){ ?>
                        <option value="<?php echo $row["user_id"]; ?>" <?php echo (isset($user['parent_id']) &&  $user['parent_id'] == $row["user_id"]) ? 'selected="selected"' : '';?>><?php echo $row["user_fullname"]?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group" id="role">
                    <label class="control-label">Nhóm khu vực</label>
                    <select class="form-control" name="group_id">
                    <?php foreach($group as $row){ ?>
                        <option class="role" value="<?php echo $row["group_id"]; ?>" <?php echo (isset($user['group_id']) &&  $user['group_id'] == $row["group_id"]) ? 'selected="selected"' : '';?> ><?php echo $row["group_name"]?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Trạng thái</label>
                    <select class="form-control" name="user_active">
                        <option value="1" <?php echo (isset($user['user_active']) && $user['user_active'] == '1') ? 'selected="selected"' : '';?>>Kích hoạt</option>
                        <option value="0" <?php echo (isset($user['user_active']) && $user['user_active'] == '0') ? 'selected="selected"' : '';?>>Đang khóa</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function(){
        if($('#role select').val() === '4') {
            $('#manager').show();
        } else {
            $('#manager').hide();
        }
        
        $('#role select').change(function(){
            if ($(this).val() === "4") {
                $('#manager').show();
            } else {
                $('#manager').hide();
            }
        });
    });
</script>