<?php $link = site_url('home/view_list?name='); ?>
<h4 class="page-title">Thống kê theo Trường Liên Kết</h4>
<table class="zui-table">
    <thead>
        <tr>
            <th width="*">Trường liên kết</th>
            <th width="6%">C3</th>
            <th width="6%">C4</th>
            <th width="9%">L1 hỏng</th>
            <th width="11%">L1 liên hệ sau</th>
            <th width="6%">L2</th>
            <th width="6%">L3</th>
            <th width="6%">L4</th>
            <th width="6%">L5A</th>
            <th width="6%">L5B</th>
            <th width="6%">L6</th>
            <th width="6%">L7</th>
            <th width="6%">L8</th>
            <th width="6%">L9</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($data as $key => $row): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $row['C3']; ?></td>
            <td><?php echo $row['C4']; ?></td>
            <td><?php echo $row['L1']; ?></td>
            <td><?php echo $row['L1B']; ?></td>
            <td><?php echo $row['L2']; ?></td>
            <td><?php echo $row['L3']; ?></td>
            <td><?php echo $row['L4']; ?></td>
            <td><?php echo $row['L5A']; ?></td>
            <td><?php echo $row['L5B']; ?></td>
            <td><?php echo $row['L6']; ?></td>
            <td><?php echo $row['L7']; ?></td>
            <td><?php echo $row['L8']; ?></td>
            <td><?php echo $row['L9']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br/><br/>

<h4 class="page-title">Thống kê theo Kênh</h4>
<table class="zui-table">
    <thead>
        <tr>
            <th width="9%">Kênh</th>
            <th width="5.5%">C3</th>
            <th width="5.5%">C4</th>
            <th width="10%">L1 hỏng</th>
            <th width="*">L1 liên hệ sau</th>
            <th width="6%">L2</th>
            <th width="6%">L3</th>
            <th width="6%">L4</th>
            <th width="6%">L5A</th>
            <th width="6%">L5B</th>
            <th width="6%">L6</th>
            <th width="6%">L7</th>
            <th width="6%">L8</th>
            <th width="6%">L9</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($datatable2 as $key => $row): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $row['C3']; ?></td>
            <td><?php echo $row['C4']; ?></td>
            <td><?php echo $row['L1']; ?></td>
            <td><?php echo $row['L1B']; ?></td>
            <td><?php echo $row['L2']; ?></td>
            <td><?php echo $row['L3']; ?></td>
            <td><?php echo $row['L4']; ?></td>
            <td><?php echo $row['L5A']; ?></td>
            <td><?php echo $row['L5B']; ?></td>
            <td><?php echo $row['L6']; ?></td>
            <td><?php echo $row['L7']; ?></td>
            <td><?php echo $row['L8']; ?></td>
            <td><?php echo $row['L9']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br/><br/>

<?php 
$cols = $this->config->item('channel_name');
$rows = $this->config->item('school_name');
?>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <h4 class="page-title">Thống kê Tổng hợp</h4>
        <table class="zui-table">
            <thead>
                <tr>
                    <th>C3 thu thập được</th>
                    <?php foreach($cols as $item): ?>
                    <th><?php echo $item; ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $item): ?>
                <tr>
                    <td><?php echo $item; ?></td>
                    <?php foreach($cols as $col): ?>
                    <td><?php echo (isset($datatable3[$item.'.'.$col])) ? $datatable3[$item.'.'.$col] : 0; ?></td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>