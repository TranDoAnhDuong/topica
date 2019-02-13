<?php $this->load->view('element/breadcrumb', array('title' => 'Nhóm khu vực')); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="table-responsive">
                <div id="example23_wrapper" class="dataTables_wrapper">
                    <table id="example23" class="display nowrap dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info"
                        style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" width="20%">ID</th>
                                <th class="sorting" tabindex="0" width="30%">Nhóm</th>
                                <th class="sorting" tabindex="0" width="*">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $row){ ?>
                            <tr>
                                <td>
                                    <?php echo $row['group_id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['group_name']; ?>
                                </td>
                                <td class="jsgrid">
                                    <a class="jsgrid-button jsgrid-edit-button" style="margin-left:10px;" href="<?php echo site_url().'groups/form/'.$row['group_id']; ?>"></a>
                                </td>
                            </tr>
                            <?php } ?>
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