<?php $this->load->view('element/breadcrumb', array('title' => 'Danh sách chi tiết')); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h4 class="page-title"><?php echo (isset($head_title)) ? $head_title : ''; ?></h4>
            <div class="table-responsive">
                <div id="example23_wrapper" class="dataTables_wrapper">
                    <table id="example23" class="display nowrap dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <?php if($ROLE_KEY == 'staff'): ?>
                                <th width="*">Tác vụ</th>
                                <?php endif; ?>
                                <th width="20%">Họ tên</th>
                                <th width="10%">Điện thoại</th>
                                <th width="15%">Email</th>
                                <th width="20%">Ngành muốn học</th>
                                <th width="15%">Trường</th>
                                <th width="10%">Ngày gọi cuối</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php foreach($data as $key => $row): ?>
                            <?php foreach($row as $cell):
                                $email = explode('@', $cell['c3_email']);
                                $new_email = substr($email[0], 0, -3).'xxx@'.'xxxx.xxx'; 
                                $mobile = substr($cell['c3_tel'], 0, 3).'xxx'.substr($cell['c3_tel'], -4); 
                            ?>
                            <tr>
                                <?php if($ROLE_KEY == 'staff'): ?>
                                <td class="jsgrid">
                                    <a class="jsgrid-button jsgrid-edit-button" style="margin-left:10px;" href="<?php echo site_url().'c4/edit/'.$cell['c4_id']; ?>"></a>
                                    <a href="<?php echo site_url().'c4/call_log/'.$cell['c4_id']; ?>">Nhật ký</a>
                                </td>
                                <?php endif; ?>
                                <td><?php echo mb_convert_case($cell['c3_name'], MB_CASE_UPPER, "UTF-8"); ?></td>
                                <td><?php echo $mobile; ?></td>
                                <td><?php echo $new_email; ?></td>
                                <td><?php echo $cell['NganhMuonHoc']; ?></td>
                                <td><?php echo $cell['TruongChamSoc']; ?></td>
                                <td><?php echo !empty($cell['dte_datevisit']) ? date('d/m/Y H:i', strtotime($cell['dte_datevisit'])) : ''; ?></td>
                            </tr>
                        <?php endforeach; endforeach; ?>
                        </tbody>
                    </table>
                    <?php 
                    $pageLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $pageLink = explode('&page', $pageLink);
                    $pageLink = $pageLink[0].'&page=';
                    $this->load->view('element/pagination', compact('page', 'maxPage', 'pageLink')); ?>
                </div>
            </div>
        </div>
    </div>
</div>