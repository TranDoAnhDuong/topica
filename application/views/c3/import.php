<?php $this->load->view('element/breadcrumb', array('title' => 'Nhập dữ liệu cho C3')); ?>
<?php $this->load->view('element/message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <form class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" method="POST" action="<?php echo site_url(); ?>/c3/do_import">
                <div class="form-group">
                    <label class="col-sm-12">File upload</label>
                    <div class="col-sm-12">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                <span class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-default btn-file"> 
                            <span class="fileinput-new">Lựa chọn file</span>
                            <span class="fileinput-exists">Thay đổi</span>
                            <input type="file" name="fileUpload" data-error="Vui lòng lựa chọn file tải lên" required>
                            </span>
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Xoá</a> 
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-info">Đồng Ý</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>