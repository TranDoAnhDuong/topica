<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">DASHBOARD</h4> 
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
        </ol>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php
            switch($ROLE_KEY) {
                case 'staff':
                    $this->load->view('element/dashboard-staff');
                    break;
                case 'manager':
                    $this->load->view('element/dashboard-manager');
                    break;
                default:
                    $this->load->view('element/dashboard-maketer');
                    break;
            }
            ?>
        </div>
    </div>
</div>