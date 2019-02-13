<?php $this->load->view('element/breadcrumb', array('title' => 'Nhật ký cuộc gọi')); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <span class="title-count">Tổng số: <strong><?php echo count($data); ?></strong> (cuộc gọi)</span>
            <div class="table-responsive">
                <div class="dataTables_wrapper">
                    <table class="display nowrap dataTable" cellspacing="0" width="100%" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th width="5%">#Callog ID</th>
                                <th width="10%">Level</th>
                                <th width="15%">Trạng thái</th>
                                <th width="15%">Thời gian gọi</th>
                                <th width="15">Ngày gọi tiếp theo</th>
                                <th width="*%">Ghi chú</th>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row): ?>
                            <tr>
                                <td><?php echo $row['calllog_id']; ?></td>
                                <td><?php echo $row['level_name']; ?></td>
                                <td><?php echo $row['status_name']; ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($row['dte_datevisit'])); ?></td>
                                <td><?php echo (!empty($row['dteNextDate']) && $row['dteNextDate'] != '9999-12-31 00:00:00') ? date('d/m/Y', strtotime($row['dteNextDate'])) : ''; ?></td>
                                <td><?php echo $row['calllog']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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