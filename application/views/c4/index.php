<?php $this->load->view('element/breadcrumb', array('title' => 'Danh sách học viên')); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                <div id="example23_wrapper" class="dataTables_wrapper">
                    <div class="dt-buttons" id= "export">
                        <?php if($ROLE_KEY == 'admin') { ?>
                            <a class="dt-button buttons-excel buttons-html5" href="<?php echo site_url('c4/export');?>">
                                <span>Export to Excel</span>
                            </a><br/><br/>
                        <?php } ?>
                    </div>
                    <table id="example23" class="display nowrap dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th width="20%">Họ tên</th>
                                <th width="20%">Điện thoại</th>
                                <th width="20%">Email</th>
                                <th width="25%">Ngành đăng ký</th>
                                <th width="30%">Trường ĐK</th>
                                <th width="15%">Ngày đăng ký</th>
                                <?php if($ROLE_KEY === 'staff'): ?>
                                <th width="*">Tác vụ</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row) { 
                                $email = explode('@', $row['c3_email']);
                                $new_email = substr($email[0], 0, -3).'xxx@'.'xxxx.xxx'; 
                                $mobile = substr($row['c3_tel'], 0, 3).'xxx'.substr($row['c3_tel'], -4); 
                            ?>
                            <tr>
                                <td><?php echo $row['c3_name']; ?></td>
                                <td><?php echo $new_email; ?></td>
                                <td><?php echo $mobile; ?></td>
                                <td><?php echo $row['c3_nganhdangky']; ?></td>
                                <td><?php echo $row['truong']; ?></td>
                                <td><?php echo date('d/m/Y', strtotime($row['c3_datereg'])); ?></td>
                                <?php if($ROLE_KEY === 'staff'): ?>
                                <td class="jsgrid">
                                    <a class="jsgrid-button jsgrid-edit-button" style="margin-left:10px;" title="Sửa tài khoản" href="<?php echo site_url().'c4/edit/'.$row['c4_id']; ?>"></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php $pageLink = site_url("c4/index?page="); $this->load->view('element/pagination', compact('page', 'maxPage', 'pageLink')); ?>
                </div>
            </div>
        </div>
    </div>
</div>



