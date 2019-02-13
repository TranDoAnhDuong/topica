<?php $link = site_url('home/view_list?'); ?>
<h4 class="page-title">Danh sách contact hiện hữu</h4>
<table class="zui-table">
    <thead>
         <?php $conditions = 'type=s-1'; ?>
        <tr>
            <th width="*">Ngày</th>
            <th width="10%"><a href="<?php echo $link.$conditions?>">Chưa gọi</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L1"?>">L1</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L2"?>">L2</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L3"?>">L3</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L4"?>">L4</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L5A"?>">L5A</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L5B"?>">L5B</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L6"?>">L6</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L7"?>">L7</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L8"?>">L8</a></th>
            <th width="8%"><a href="<?php echo $link.$conditions."&level=L9"?>">L9</a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $key => $row): ?>
        <?php $conditions = 'type=s-1&date='.date('Y-m-d', strtotime($key)); ?>
        <tr>
            <td><?php echo date('d/m/Y', strtotime($key)); ?></td>
            <td><a href="<?php echo $link.$conditions?>"><?php echo $row['Unknow']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L1"?>"><?php echo $row['L1']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L2"?>"><?php echo $row['L2']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L3"?>"><?php echo $row['L3']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L4"?>"><?php echo $row['L4']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L5A"?>"><?php echo $row['L5A']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L5B"?>"><?php echo $row['L5B']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L6"?>"><?php echo $row['L6']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L7"?>"><?php echo $row['L7']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L8"?>"><?php echo $row['L8']; ?></a></td>
            <td><a href="<?php echo $link.$conditions."&level=L9"?>"><?php echo $row['L9']; ?></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br/><br/>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <h4 class="page-title">Xem lịch hẹn</h4>
        <table class="zui-table">
            <thead>
                <tr>
                    <th width="40%">Ngày</th>
                    <th width="*"><a href="<?php echo $link.'type=s-2&date='.date('Y-m-d', time()).'&level=none'; ?>">Xem lịch hẹn các ngày</a></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($callInFuture as $key => $count): ?>
            <?php
            $class = '';
            if($count <= 20) {
                $class = 'bg-green';
            } else if($count <= 40) {
                $class = 'bg-yellow';
            } else {
                $class = 'bg-red';
            }
            ?>
                <tr>
                    <td><?php echo date('d/m/Y', strtotime($key)); ?></td>
                    <td class="<?php echo $class; ?>"><a href="<?php echo $link.'type=s-2&date='.date('Y-m-d', strtotime($key)); ?>"><?php echo $count; ?></td>
                </tr>
            <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
    <div class="col-xs-12 col-md-6">
    </div>
</div>