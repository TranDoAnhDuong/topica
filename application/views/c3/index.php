<?php $this->load->view('element/breadcrumb', array('title' => 'Dữ liệu C3')); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                <table id="tableList" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Điện thoại</th>
                            <th>Email</th>
                            <th>Ngành đăng ký</th>
                            <th>Bằng cấp cao nhất</th>
                            <th>Địa chỉ nơi ở</th>
                            <th>Nguồn</th>
                            <th>Ngày đăng ký</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Họ tên</th>
                            <th>Điện thoại</th>
                            <th>Email</th>
                            <th>Ngành đăng ký</th>
                            <th>Bằng cấp cao nhất</th>
                            <th>Địa chỉ nơi ở</th>
                            <th>Nguồn</th>
                            <th>Ngày đăng ký</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($data as $row): ?>
                        <tr>
                            <td><?php echo $row['hoten']; ?></td>
                            <td><?php echo $row['dienthoai']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['nganhhoc']; ?></td>
                            <td><?php echo $row['truongtotnghiep']; ?></td>
                            <td><?php echo $row['diachi']; ?></td>
                            <td><?php echo $row['nguon']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['reg_date'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>