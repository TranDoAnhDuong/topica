<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Thêm contact</h4> 
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php $message = $this->session->flashdata('message'); ?>
<?php if(!empty($message)): ?>
<div class="alert alert-<?php echo (!$this->session->flashdata('is_error')) ? 'success' : 'danger'; ?> alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo $message; ?>
</div>
<?php endif; ?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <form data-toggle="validator" method="POST" action="<?php echo site_url('c3/submitAddContact')?>">
                <div class="form-group">
                    <label class="control-label">Họ tên</label>
                    <input type="text" class="form-control" name="c3_name" data-error="Vui lòng nhập tên" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="c3_tel" data-error="Vui lòng nhập số điện thoại" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" name="c3_email" data-error="Email không đúng định dạng">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Ngành muốn học</label>
                    <input type="text" class="form-control" name="c3_nganhdangky">
                </div>
                <div class="form-group">
                    <label class="control-label">Trường chăm sóc</label>
                    <select class="form-control" name="c3_truongdangky">
                        <option value="">Lựa chọn</option>
                    <?php foreach($listSchools as $value) { ?>
                        <option value="<?php echo $value; ?>">
                            <?php echo $value; ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Ghi chú</label>
                    <textarea class="form-control" name="ghi_chu" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>