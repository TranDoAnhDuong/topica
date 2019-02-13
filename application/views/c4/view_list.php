<?php $this->load->view('element/breadcrumb', array('title' => 'Dữ liệu contact')); ?>
<?php $this->load->view('element/message'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                <div id="example23_wrapper" class="dataTables_wrapper">
                    <?php if($ROLE_KEY == 'admin'):?>
                         <div class="dt-buttons">
                            <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" href="<?php echo site_url() ?>/c4/createXLS">
                                <span>Export to excel</span>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div id="example23_filter" class="dataTables_filter">
                        <form>
                        <label>
                            <input style="height:37px;" type="text" name="search" value="<?php echo (isset($search)) ? $search : ''; ?>">
                        </label>
                        <button type="submit" class="btn btn-info">Tìm kiếm</button>
                        </form>
                    </div>
                    <table class="display nowrap dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info"
                        style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th width="*">Tác vụ</th>
                                <th width="20%">Họ tên</th>
                                <th width="10%">Điện thoại</th>
                                <th width="15%">Email</th>
                                <th width="10%">Level</th>
                                <th width="10%">Trạng thái</th>
                                <th width="10%">Trường</th>
                                <th width="10%">Ngày gọi cuối</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row) {
                                $email = explode('@', $row['c3_email']);
                                $new_email = substr($email[0], 0, -3).'x@'.'x.x'; 
                                $mobile = substr($row['c3_tel'], 0, 3).'xxx'.substr($row['c3_tel'], -4);
                            ?>
                            <tr>
                                <td class="jsgrid">
                                    <a class="jsgrid-button jsgrid-edit-button" style="margin-left:10px;" href="<?php echo site_url().'c4/edit/'.$row['c4_id']; ?>"></a>
                                    <a href="<?php echo site_url().'c4/call_log/'.$row['c4_id']; ?>">Nhật ký</a>
                                </td>
                                <td><?php echo mb_convert_case($row['c3_name'], MB_CASE_UPPER, "UTF-8"); ?></td>
                                <td><?php echo $mobile; ?></td>
                                <td><?php echo $new_email; ?></td>
                                <td><?php echo $row['level_name']; ?></td>
                                <td><?php echo $row['status_name']; ?></td>
                                <td><?php echo (!empty($row['TruongChamSoc'])) ? $row['TruongChamSoc'] : $row['truong']; ?></td>
                                <td><?php echo !empty($row['dte_datevisit']) ? date('d/m/Y H:i', strtotime($row['dte_datevisit'])) : ''; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php $pageLink = site_url("c4/view_list?page="); $this->load->view('element/pagination', compact('page', 'maxPage', 'pageLink')); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        //Disable cut copy paste
        $('body').bind('cut copy paste', function (e) {
            e.preventDefault();
        });

        //Disable mouse right click
        $("body").on("contextmenu", function (e) {
            return false;
        });
    });
</script>