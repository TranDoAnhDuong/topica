<?php $this->load->view('element/breadcrumb', array('title' => 'Danh sách tài khoản')); ?>
<?php $this->load->view('element/message'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                <div id="example23_wrapper" class="dataTables_wrapper">
                    <div class="dt-buttons">
                    </div>
                    <div id="example23_filter" class="dataTables_filter">
                        <label>Tìm Kiếm:<input type="search" class="" placeholder="" aria-controls="example23"></label>
                    </div>
                    <table id="example23" class="display nowrap dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info"
                        style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th width="20%">Tên tài khoản</th>
                                <th width="30%">Họ tên</th>
                                <th width="20%">Nhóm quyền</th>
                                <th width="20%">Nhóm khu vực</th>
                                <th width="15%">Trạng thái</th>
                                <th width="*">Tác Vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row){ ?>
                            <tr>
                                <td>
                                    <?php echo $row['username']; ?>
                                </td>
                                <td>
                                    <?php echo $row['user_fullname']; ?>
                                </td>
                                <td>
                                    <?php echo $row['rolename']; ?>
                                </td>
                                <td>
                                    <?php echo $row['group_name']; ?>
                                </td>
                                <td>
                                <?php if($row['user_active'] == 1) { ?>
                                    <?php echo 'Kích hoạt'; ?>
                                <?php }else{?>
                                    <?php echo 'Đang khóa'; ?>
                                <?php }?>
                                </td>
                                <td class="jsgrid">
                                    <a class="paginate_button model_img img-responsive btn-resetPass" data-id="<?php echo $row['user_id']; ?>" style="display: inline-block;color:#13dafe;">Reset Pass</a>
                                    <a class="jsgrid-button jsgrid-edit-button" style="margin-left:10px;" title="Sửa tài khoản" href="<?php echo site_url().'/users/form/'.$row['user_id']; ?>"></a>
                                    <a class="jsgrid-button jsgrid-delete-button model_img btn-delete" type="button" title="Xóa tài khoản" data-id="<?php echo $row['user_id']; ?>"></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php $pageLink = site_url("users/index?page="); $this->load->view('element/pagination', compact('page', 'maxPage', 'pageLink')); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="reset-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:150px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Thay đổi mật khẩu</h4> 
            </div>
            <form data-toggle="validator" id="resetForm" action="<?php echo base_url(); ?>index.php/users/reset_pass" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Mật khẩu mới</label>
                    <input type="hidden" name="user_id" value="" id="resetUserId" />
                    <input type="hidden" name="page" value="" id="currentPage" />
                    <input type="password" data-toggle="validator" data-minlength="6" name="newPassword" class="form-control" id="inputPassword" placeholder="Mật khẩu mới" data-required-error="Mật khẩu không trùng nhau" required>
                    <span class="help-block with-errors"></span> 
                </div>
                <div class="form-group">
                    <label for="message-text" class="control-label">Nhắc lại mật khẩu</label>
                    <input type="password" class="form-control" id="inputPasswordConfirm" name="confirmPassword" data-match="#inputPassword" data-match-error="Mật khẩu không trùng nhau" placeholder="Nhập lại mật khẩu" required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-danger btnSubmitRS waves-effect waves-light">Cập Nhật</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="delete_account" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:150px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Xóa tài khoản</h4> 
            </div>
            <form data-toggle="validator" id="deleteForm" action="<?php echo base_url(); ?>index.php/users/delete_account" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="control-label">Bạn muốn xóa tài khoản này không??</label>
                    <input type="hidden" name="user_id" value="" id="deleteUserId" />
                    <input type="hidden" name="page" value="" id="currentPage2" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Không</button>
                <button type="submit" class="btn btn-danger btnSubmitRS waves-effect waves-light">Có</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$('.btn-resetPass').click(function() {
    var user_id = $(this).data('id');
    var currentPage = $('.current').text();
    $('#resetUserId').val(user_id);
    $('#currentPage').val(currentPage);
    $("#reset-modal").modal();
});

$('.btn-delete').click(function() {
    var user_id = $(this).data('id');
    var currentPage = $('.current').text();
    $('#deleteUserId').val(user_id);
    $('#currentPage2').val(currentPage);
    $("#delete_account").modal();
});
</script>