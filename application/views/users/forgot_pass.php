<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>public/images/favicon.png">
    <title>CRM Email</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url(); ?>public/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url(); ?>public/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/custom.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

    <section id="wrapper" class="login-register">
        <div class="login-box">
        <?php $message = $this->session->flashdata('message'); ?>
        <?php if(!empty($message)): ?>
        <div class="alert alert-<?php echo (!$this->session->flashdata('is_error')) ? 'success' : 'danger'; ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
        <?php echo $message; ?>
        </div>
        <?php endif; ?>
            <div class="white-box">
                <form class="form-horizontal form-material" data-toggle="validator" method="POST" action="<?php echo site_url() ?>/auth/submit_forgotpass">
                    <h3 class="box-title m-b-20">Email</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input type="email" data-toggle="validator" data-error="Vui lòng nhập email" name="email"  class="form-control" id="inputPassword" placeholder="Email đăng kí tài khoản" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>public/plugins/bower_components/jquery/dist/jquery.min.js"></script>
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
    <!--Style Switcher -->
    <script src="<?php echo base_url(); ?>public/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>