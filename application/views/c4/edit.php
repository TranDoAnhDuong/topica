<?php $this->load->view('element/breadcrumb', array('title' => 'Cập nhật contact')); ?>
<?php $this->load->view('element/message'); ?>
<?php $level_id = (!empty($data['level_id'])) ? $data['level_id'] : 0; ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <form data-toggle="validator" method="POST" action="<?php echo site_url("c4/update")?>">
            <div class="form-group">
                <input type="hidden" class="form-control" name="c4_id" value="<?php echo $data['c4_id'];?>" readonly>
                <input type="hidden" class="form-control" name="dte_checkin" value="<?php echo date('Y-m-d H:i:s'); ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Thời gian đăng ký </label>
                    <input type="text" class="form-control" name="c3_datereg" placeholder="Tài khoản" value="<?php echo date('d/m/Y', strtotime($data['c3_datereg'])) ?>" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label">Họ và tên</label>
                    <input type="text" class="form-control" name="c3_name" value="<?php echo (isset($data['c3_name'])) ? $data['c3_name'] : '';?>" data-error="Vui lòng nhập thông tin" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="c3_tel" value="<?php echo (isset($data['c3_tel'])) ? $data['c3_tel'] : '';?>" data-error="Vui lòng nhập thông tin" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" name="c3_email" value="<?php echo (isset($data['c3_email'])) ? $data['c3_email'] : '';?>">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Nguồn</label>
                    <input type="text" class="form-control" name="SP" value="<?php echo (isset($data['SP'])) ? $data['SP'] : '';?>" disabled="disabled">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Khu vực</label>
                    <input type="text" class="form-control" name="khuvuc" value="<?php echo (isset($data['khuvuc'])) ? $data['khuvuc'] : '';?>" disabled="disabled">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Ngành đăng ký</label>
                    <input type="text" class="form-control" name="c3_nganhdangky" value="<?php echo (isset($data['c3_nganhdangky'])) ? $data['c3_nganhdangky'] : '';?>" disabled="disabled">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Trường</label>
                    <input type="text" class="form-control" name="truong" value="<?php echo (isset($data['truong'])) ? $data['truong'] : '';?>" disabled="disabled">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Ngày sinh</label>
                    <input type="text" name="NgaySinh" id="NgaySinh" class="form-control" placeholder="dd/mm/yyyy" value="<?php echo (!empty($data['NgaySinh'])) ? date('d/m/Y', strtotime($data['NgaySinh'])) : '';?>" />
                </div>
                <div class="form-group">
                    <label class="control-label">Giới tính</label>
                    <select class="form-control" name="GioiTinh">
                        <option value="1" <?php echo (isset($data['GioiTinh']) && $data['GioiTinh'] == '1') ? 'selected="selected"' : '';?>>Nam</option>
                        <option value="0" <?php echo (isset($data['GioiTinh']) && $data['GioiTinh'] == '0') ? 'selected="selected"' : '';?>>Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">CMTND</label>
                    <input type="text" class="form-control" name="CMND_CCCD" value="<?php echo (isset($data['CMND_CCCD'])) ? $data['CMND_CCCD'] : '';?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Nơi cấp</label>
                    <input type="text" class="form-control" name="NoiCap" value="<?php echo (isset($data['NoiCap'])) ? $data['NoiCap'] : '';?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Ngày cấp</label>
                    <input type="text" name="NgayCap" id="NgayCap" class="form-control" placeholder="dd/mm/yyyy" value="<?php echo (!empty($data['NgayCap'])) ? date('d/m/Y', strtotime($data['NgayCap'])) : '';?>" />
                </div>
                <div class="form-group">
                    <label class="control-label">Nguyên quán</label>
                    <input type="text" class="form-control" name="NguyenQuan" value="<?php echo (isset($data['NguyenQuan'])) ? $data['NguyenQuan'] : '';?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Hộ khẩu thường trú</label>
                    <input type="text" class="form-control" name="HKTT" value="<?php echo (isset($data['HKTT'])) ? $data['HKTT'] : '';?>">
                </div>
                <div class="form-group">
                    <label class="control-label">Địa chỉ nơi ở</label>
                    <input type="text" class="form-control" name="Dia_Chi_Noi_O" value="<?php echo (isset($data['Dia_Chi_Noi_O'])) ? $data['Dia_Chi_Noi_O'] : '';?>" >
                </div>
                <div class="form-group">
                    <label class="control-label">Trình độ</label>
                    <select class="form-control" name="TrinhDo">
                    <?php foreach($TrinhDo as $value) { ?>
                        <option value="<?php echo $value; ?>" <?php echo (isset($data['TrinhDo']) &&  $data['TrinhDo'] == $value) ? 'selected="selected"' : '';?> ><?php echo $value; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Hệ đào tạo</label>
                    <select class="form-control" name="HeDaoTao">
                    <?php foreach($HeDaoTao as $value) { ?>
                        <option value="<?php echo $value; ?>" <?php echo (isset($data['HeDaoTao']) &&  $data['HeDaoTao'] == $value) ? 'selected="selected"' : '';?> ><?php echo $value; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Ngành tốt nghiệp</label>
                    <input type="text" class="form-control" name="NganhTotNghiep" value="<?php echo (isset($data['NganhTotNghiep'])) ? $data['NganhTotNghiep'] : '';?>" >
                </div>
                <div class="form-group">
                    <label class="control-label">Năm tốt nghiệp</label>
                    <input type="text" class="form-control" name="NamTotNghiep" value="<?php echo (isset($data['NamTotNghiep'])) ? $data['NamTotNghiep'] : '';?>" >
                </div>
                <div class="form-group">
                    <label class="control-label">Đơn vị cấp bằng</label>
                    <input type="text" class="form-control" name="DonViCapBang" value="<?php echo (isset($data['DonViCapBang'])) ? $data['DonViCapBang'] : '';?>" >
                </div>
                <div class="form-group">
                    <label class="control-label">Loại tốt nghiệp</label>
                    <input type="text" class="form-control" name="LoaiTotNghiep" value="<?php echo (isset($data['LoaiTotNghiep'])) ? $data['LoaiTotNghiep'] : '';?>" >
                </div>
                <div class="form-group">
                    <label class="control-label">Bằng cấp cao nhất</label>
                    <input type="text" class="form-control" name="c3_bangcapcaonhat" value="<?php echo (isset($data['c3_bangcapcaonhat'])) ? $data['c3_bangcapcaonhat'] : '';?>">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Ngành muốn học</label>
                    <input type="text" class="form-control" name="NganhMuonHoc" value="<?php echo (isset($data['NganhMuonHoc'])) ? $data['NganhMuonHoc'] : '';?>" >
                </div>
                <div class="form-group">
                    <label class="control-label">Trường chăm sóc</label>
                    <select class="form-control" name="TruongChamSoc">
                        <option value="">Lựa chọn</option>
                    <?php foreach($listSchools as $value) { ?>
                        <option value="<?php echo $value; ?>" <?php echo ($data['TruongChamSoc'] == $value) ? ' selected="selected"' : ''; ?>>
                            <?php echo $value; ?>
                        </option>
                    <?php } ?>
                    </select>
                </div>
                <div class="callog-box">
                    <h4>Lịch sử cuộc gọi</h4>
                    <span class="title-count">Tổng số: <strong><?php echo count($dataCallogs); ?></strong> (cuộc gọi)</span>
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
                                    <?php foreach($dataCallogs as $row): ?>
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
                <div class="form-group">
                    <label class="control-label">Ghi chú</label>
                    <textarea class="form-control" name="calllog" rows="5"></textarea>
                </div>

                <select class="form-control" id="level-box" style="display:none">
                    <?php foreach($level as $row) { ?>
                        <option 
                            value="<?php echo $row['level_id']?>" <?php echo ($data['level_id'] == $row['level_id']) ? ' selected="selected"' : ''; ?>
                            data-level="<?php echo TRIM($row['level_name']); ?>"
                            data-diengiai="<?php echo TRIM($row['level_diengiai_id']); ?>"
                        >
                            <?php echo $row['level_name'].' ('.$row['level_diengiai'].')'; ?>
                        </option>
                    <?php } ?>
                </select>

                <div class="form-group">
                    <label class="control-label">Level</label>
                    <select class="form-control" name="level_id" id="level_id">
                        <?php foreach($level as $row) { ?>
                            <option 
                                value="<?php echo $row['level_id']?>" <?php echo ($data['level_id'] == $row['level_id']) ? ' selected="selected"' : ''; ?> 
                                data-level="<?php echo TRIM($row['level_name']); ?>"
                                data-diengiai="<?php echo TRIM($row['level_diengiai_id']); ?>"
                            >
                                <?php echo $row['level_name'].' ('.$row['level_diengiai'].')'; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <select id="status-box" style="display:none">
                    <?php foreach($status as $row) {?>
                        <option value="<?php echo $row['status_id'];?>" <?php echo ($row['status_id'] == $data['status_id']) ? ' selected="selected"' : '' ?>><?php echo $row['status_name']; ?></option>
                    <?php } ?>
                </select>
                <div class="form-group">
                    <label class="control-label">Tình trạng</label>
                    <select id="status_id" class="form-control" name="status_id"></select>
                </div>
                <div class="form-group">
                    <label class="control-label">Lần gọi tiếp theo</label>
                    <input type="text" name="dteNextDate" id="dteNextDate" class="form-control" placeholder="dd/mm/yyyy" value="<?php echo (!empty($data['dteNextDate'])) ? date('d/m/Y', strtotime($data['dteNextDate'])) : '';?>" />
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
var LEVEL_NAME = '<?php echo (empty($data['level_name'])) ? '' : $data['level_name'] ;?>';
var LEVEL_ID = '<?php echo (empty($data['level_id'])) ? 0 : $data['level_id'] ;?>';
LEVEL_ID = parseInt(LEVEL_ID, 10);
function addListStatus(level_name, level_diengiai) {
    var html = '';
    if(level_name === 'L1') {
        if(level_diengiai === 7 || level_diengiai === 11) {
            $('#status-box > option').each(function(index, element) {
                if(index === 1) {
                    html += element.outerHTML;
                }
            });
        } else {
            $('#status-box > option').each(function(index, element) {
                if(index === 0) {
                    html += element.outerHTML;
                }
            });
        }
    } else {    
        $('#status-box > option').each(function(index, element) {
            if(index !== 1) {
                if(index < 4) {
                    html += element.outerHTML;
                } else if(level_name === 'L9') {
                    html += element.outerHTML;
                }
            }
        });
    }
    $('#status_id').html(html);
}

function changeLevelChoice(level_diengiai) {
    var html = '';
    var level = '';
    console.log('LEVEL_NAME', LEVEL_NAME);
    if(LEVEL_NAME === '' || LEVEL_NAME === 'L1') {
        console.log('case 1');
        $('#level-box > option').each(function(index, element) {
            level = $(element).data('level');
            html += element.outerHTML;
            if(level === 'L4') {
                console.log('case 2');
                return false;
            }
        });
    } else {
        console.log('case 3');
        $('#level-box > option').each(function(index, element) {
            level = $(element).data('level');
            level_id = parseInt($(element).val(), 10);

            if(index < 4 && $.inArray(LEVEL_NAME, ['L6', 'L7','L8', 'L9']) === -1) {// 4 Level SP trung
                console.log('case 4');
                html += element.outerHTML;
            }

            if(LEVEL_ID <= level_id) {
                console.log(LEVEL_ID);
                console.log('case 5');
                html += element.outerHTML;
            }

            if((LEVEL_NAME === 'L4' && level === 'L5A') 
            || (LEVEL_NAME === 'L5A' && level === 'L5B') 
            || (LEVEL_NAME === 'L5B' && level === 'L6')) {
                console.log('case 6');
                return false;
            }
            if($.inArray(LEVEL_NAME, ['L2', 'L3']) !== -1 && level === 'L4') {
                console.log('case 7');
                return false;
            }
        });
    }

    $('#level_id').html(html);
}


$(document).ready(function() {
    var level_name = $('#level-box option:selected').data('level');
    var level_diengiai = parseInt($('#level-box option:selected').data('diengiai'), 10);
    addListStatus(level_name, level_diengiai);
    changeLevelChoice(level_diengiai);
    $('#level_id').change(function() {
        var level_name = $('option:selected', this).data('level');
        var level_diengiai = parseInt($('option:selected', this).data('diengiai'), 10);
        addListStatus(level_name, level_diengiai);
    }); 

    $('#NgaySinh, #NgayCap').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy'
    });

    $('#dteNextDate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd/mm/yyyy',
        startDate: '<?php echo date('d/m/Y');?>'
    });
});
</script>