<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title><?php echo (isset($pageTitle)) ? $pageTitle : 'CRM Admin' ; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="<?php echo base_url(); ?>public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo base_url(); ?>public/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo base_url(); ?>public/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url(); ?>public/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url(); ?>public/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/custom.css" rel="stylesheet">
        <!-- Editable CSS -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/bower_components/jsgrid/js/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>public/plugins/bower_components/jsgrid/js/jsgrid-theme.min.css" />
    <link href="<?php echo base_url(); ?>public/css/dashboard.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>public/plugins/bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> 
                <a class="navbar-toggle hidden-sm hidden-md hidden-lg" href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="ti-menu"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" href="<?php echo base_url(); ?>">
                        <img src="<?php echo base_url(); ?>public/img/logo.png" alt="home" style="width: 100%;" />
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light">
                            <i class="icon-arrow-left-circle ti-menu"></i>
                        </a>
                    </li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Tìm kiếm..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
                            <img src="<?php echo base_url(); ?>public/img/hat.jpg" alt="user-img" width="36" class="img-circle">
                            <b class="hidden-xs">Xin chào, <?php echo $this->session->userdata('username'); ?></b> 
                        </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="<?php echo site_url() ?>users/profile"><i class="ti-user"></i> Thông tin tài khoản</a></li>
                            <li><a href="<?php echo site_url() ?>users/change_pwd"><i class="ti-user"></i> Đổi mật khẩu</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo site_url() ?>users/logout"><i class="fa fa-power-off"></i> Thoát</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
        </nav>

        <!-- Left navbar-header -->
        <?php $this->load->view('layouts/menu'); ?>
        <!-- Left navbar-header end -->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php echo $the_view_content; ?>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>public/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>public/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url(); ?>public/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>public/js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>public/js/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/validator.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jasny-bootstrap.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on("submit", "#selectbox_validate", function() {
            if ($("div#maindiv").hasClass("has-error")) {
                $(this).find(".bootstrap-select")
                    .after("<h6 class='has-error' style='color:red;'>please select any value from options.</h6>");
            }
        });
        $("#select").on("changed.bs.select", function(e) {
            if (!$("div#maindiv").hasClass("has-error")) {
                $("#selectbox_validate").find("h6.has-error").hide();
            }
        });
    });
    </script>
    <!--Style Switcher -->
    <script src="<?php echo base_url(); ?>public/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

    <script src="<?php echo base_url(); ?>public/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>public/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#tableList').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
</body>

</html>

<?php
  //$this->load->view('templates/_parts/master_header_view');
?>