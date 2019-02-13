<?php $this->load->view('element/breadcrumb', array('title' => 'Đổi mật khẩu')); ?>
<?php $this->load->view('element/message'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <form data-toggle="validator" method="POST" action="<?php echo site_url(); ?>users/do_change_pwd">
                <div class="form-group">
                    <label for="inputName1" class="control-label" >Mật khẩu cũ</label>
                    <input type="password" class="form-control" id="inputName1" name="oldPassword" placeholder="Mật khẩu cũ" data-error="Vui lòng nhập thông tin" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="control-label">Mật khẩu mới</label>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <input type="password" data-toggle="validator" data-minlength="6" name="newPassword" class="form-control" id="inputPassword" placeholder="Mật khẩu mới" data-error="Vui lòng nhập tổi thiểu 6 ký tự" required>
                            <span class="help-block with-errors"></span> 
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="password" class="form-control" id="inputPasswordConfirm" name="confirmPassword" data-match="#inputPassword" data-error="Vui lòng nhập thông tin"
                             data-match-error="Mật khẩu không trùng nhau" placeholder="Nhập lại mật khẩu" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>