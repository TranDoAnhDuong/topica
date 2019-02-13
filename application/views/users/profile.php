<?php $this->load->view('element/breadcrumb', array('title' => 'Thông tin tài khoản')); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <form class="form">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Tài khoản:</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?php echo $data['username']?>" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Họ tên</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?php echo $data['user_fullname']?>" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-search-input" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?php echo $data['email']?>" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Nhóm Khu vực</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?php echo $data['group_name']?>" readonly />
                    </div>
                </div>
                
                <?php if($data['role_key'] == 'staff'): ?>
                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Người quản lý</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?php echo $data['parent_name']?>" readonly />
                    </div>
                </div>
                <?php endif; ?>

                <div class="form-group row">
                    <label for="example-url-input" class="col-2 col-form-label">Nhóm quyền</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="<?php echo $data['rolename']?>" readonly />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-2 col-form-label">Trạng thái</label>
                    <div class="col-10">
                    <?php if($data['user_active'] == 1){?>
                        <input class="form-control" type="text" value="<?php echo 'Kích hoạt'?>" readonly />
                    <?php }else{?>
                        <input class="form-control" type="text" value="<?php echo 'Đang khóa'?>" readonly />
                    <?php }?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>