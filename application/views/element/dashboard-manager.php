<?php $link = site_url('home/view_list'); ?>
<h4 class="page-title">Thống kê 7 ngày gần nhất</h4>
<table class="zui-table">
    <thead>
    <?php $conditions = '?type=m-1'; $link_all = $conditions; ?>
        <tr>
            <th width="*">Ngày</th>
            <th width="10%"><a href="<?php echo $link.$conditions; ?>">Chưa gọi</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L1"?>">L1</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L2"?>">L2</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L3"?>">L3</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L4"?>">L4</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L5A"?>">L5A</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L5B"?>">L5B</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L6"?>">L6</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L7"?>">L7</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L8"?>">L8</a></th>
            <th width="7.5%"><a href="<?php echo $link.$conditions."&level=L9"?>">L9</a></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $key => $row): ?>
    <?php $conditions = '?type=m-1&date='.date('Y-m-d', strtotime($key)); ?>
        <tr>
            <td><?php echo date('d/m/Y', strtotime($key)); ?></td>
            <td><a href="<?php echo $link.$conditions; ?>"><?php echo $row['Unknow']; ?></a></td>
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

<h4 class="page-title">Thống kê theo từng nhân viên</h4>
<table class="zui-table">
    <thead>
        <tr>
            <th width="*">Nhân viên</th>
            <th width="10%"><a href="<?php echo $link.$link_all;?>">Chưa gọi</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L1"?>">L1</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L2"?>">L2</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L3"?>">L3</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L4"?>">L4</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L5A"?>">L5A</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L5B"?>">L5B</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L6"?>">L6</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L7"?>">L7</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L8"?>">L8</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L9"?>">L9</a></th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $reportTotal = array(
        'Unknow' => 0,
        'L1' => 0,
        'L2' => 0,
        'L3' => 0,
        'L4' => 0,
        'L5A' => 0,
        'L5B' => 0,
        'L5C' => 0,
        'L5+' => 0,
        'L6' => 0,
        'L7' => 0,
        'L8' => 0,
        'L9' => 0,
    );
    foreach($table2 as $key => $row): 
        $reportTotal['Unknow'] += $row['Unknow'];
        $reportTotal['L1'] += $row['L1'];
        $reportTotal['L2'] += $row['L2'];
        $reportTotal['L3'] += $row['L3'];
        $reportTotal['L4'] += $row['L4'];
        $reportTotal['L5A'] += $row['L5A'];
        $reportTotal['L5B'] += $row['L5B'];
        $reportTotal['L6'] += $row['L6'];
        $reportTotal['L7'] += $row['L7'];
        $reportTotal['L8'] += $row['L8'];
        $reportTotal['L9'] += $row['L9'];
    
    ?>

        <?php $conditions = '?type=m-2&user_id='.$row['user_id']; ?>
        <tr>
            <td><?php echo $row['name'] . ' (' . $row['username'] . ')'; ?></td>
            <td><a href="<?php echo $link.$conditions;?>"><?php echo $row['Unknow']; ?></a></td>
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

<h4 class="page-title">Thống kê theo tuần</h4>
<table class="zui-table">
    <thead>
        <tr>
            <th width="*">Tuần</th>
            <th width="10%"><a href="<?php echo $link.$link_all;?>">Chưa gọi</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L1"?>">L1</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L2"?>">L2</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L3"?>">L3</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L4"?>">L4</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L5A"?>">L5A</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L5B"?>">L5B</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L6"?>">L6</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L7"?>">L7</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L8"?>">L8</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L9"?>">L9</a></th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 0 ?>
    <?php foreach($table3 as $key => $row): ?>
    <?php $conditions = '?type=m-3&week='.$key.'&date='.$i; ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><a href="<?php echo $link.$conditions?>"><?php echo $row['Unknow']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L1'?>"><?php echo $row['L1']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L2'?>"><?php echo $row['L2']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L3'?>"><?php echo $row['L3']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L4'?>"><?php echo $row['L4']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L5A'?>"><?php echo $row['L5A']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L5B'?>"><?php echo $row['L5B']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L6'?>"><?php echo $row['L6']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L7'?>"><?php echo $row['L7']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L8'?>"><?php echo $row['L8']; ?></a></td>
            <td><a href="<?php echo $link.$conditions.'&level=L9'?>"><?php echo $row['L9']; ?></a></td>
        </tr>
        <?php $i += 7 ?>
        <?php endforeach; ?>
    </tbody>
</table>

<br/><br/>

<h4 class="page-title">Thống kê 4 tháng gần nhất</h4>
<table class="zui-table">
    <thead>
        <tr>
            <th width="*">Tháng</th>
            <th width="10%"><a href="<?php echo $link.$link_all;?>">Chưa gọi</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L1"?>">L1</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L2"?>">L2</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L3"?>">L3</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L4"?>">L4</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L5A"?>">L5A</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L5B"?>">L5B</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L6"?>">L6</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L7"?>">L7</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L8"?>">L8</a></th>
            <th width="7.5%"><a href="<?php echo $link.$link_all."&level=L9"?>">L9</a></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <?php $link2 = $link .'?type=m-4&time='.date('m/Y').'&month=0'; ?>
            <td>Tháng <?php echo date('m/Y');?></td>
            <td><a href="<?php echo  $link2?>"><?php echo $reportTotal['Unknow']; ?></td>
            <td><a href="<?php echo $link2.'&level=L1' ?>"><?php echo $reportTotal['L1']; ?></td>
            <td><a href="<?php echo $link2.'&level=L2' ?>"><?php echo $reportTotal['L2']; ?></td>
            <td><a href="<?php echo $link2.'&level=L3' ?>"><?php echo $reportTotal['L3']; ?></td>
            <td><a href="<?php echo $link2.'&level=L4' ?>"><?php echo $reportTotal['L4']; ?></td>
            <td><a href="<?php echo $link2.'&level=L5A' ?>"><?php echo $reportTotal['L5A']; ?></td>
            <td><a href="<?php echo $link2.'&level=L5B' ?>"><?php echo $reportTotal['L5B']; ?></td>
            <td><a href="<?php echo $link2.'&level=L6' ?>"><?php echo $reportTotal['L6']; ?></td>
            <td><a href="<?php echo $link2.'&level=L7' ?>"><?php echo $reportTotal['L7']; ?></td>
            <td><a href="<?php echo $link2.'&level=L8' ?>"><?php echo $reportTotal['L8']; ?></td>
            <td><a href="<?php echo $link2.'&level=L9' ?>"><?php echo $reportTotal['L9']; ?></td>
        </tr>
        <?php $i=1?>
        <?php foreach($table4 as $key => $row): ?>
        <?php $conditions = '?type=m-4&time='.$key.'&month='.$i; ?>
             <?php $i++?>
            <tr>
                <td>Tháng <?php echo $key; ?></td>
                <td><a href="<?php echo $link.$conditions ?>"><?php echo $row['Unknow']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L1' ?>"><?php echo $row['L1']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L2' ?>"><?php echo $row['L2']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L3' ?>"><?php echo $row['L3']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L4' ?>"><?php echo $row['L4']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L5A' ?>"><?php echo $row['L5A']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L5B' ?>"><?php echo $row['L5B']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L6' ?>"><?php echo $row['L6']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L7' ?>"><?php echo $row['L7']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L8' ?>"><?php echo $row['L8']; ?></a></td>
                <td><a href="<?php echo $link.$conditions.'&level=L9' ?>"><?php echo $row['L9']; ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>



