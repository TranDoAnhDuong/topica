
<?php $this->load->view('element/breadcrumb', array('title' => 'Thêm nhóm')); ?>
<?php $this->load->view('element/message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <form data-toggle="validator" method="POST" action="<?php echo site_url("groups/form".(!empty($id) ? '/'.$id : '')); ?>">
                <div class="form-group">
                    <label class="control-label">Nhóm</label>
                    <input type="text" class="form-control" name="group_name" value="<?php echo (isset($data['group_name'])) ? $data['group_name'] : '';?>" data-error="Vui lòng nhập thông tin" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
