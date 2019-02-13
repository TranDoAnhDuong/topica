<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> 
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li class="nav-small-cap m-t-10">--- MENU</li>
            <li>
                <a href="<?php echo site_url("/home") ?>" class="waves-effect">
                    <i data-icon="&#xe001;" class="linea-icon linea-basic"></i> 
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <?php if(in_array($ROLE_KEY, array('admin', 'marketer'))): ?>
            <li>
                <a href="<?php echo site_url() ?>c3/import" class="waves-effect">
                    <i data-icon="&#xe00a;" class="linea-icon linea-basic fa-fw"></i> 
                    <span class="hide-menu">Nhập dữ liệu</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(in_array($ROLE_KEY, array('admin'))): ?>
            <li>
                <a href="<?php echo site_url() ?>c4" class="waves-effect">
                    <i data-icon="0" class="linea-icon linea-software fa-fw"></i> 
                    <span class="hide-menu">Danh sách contact</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(in_array($ROLE_KEY, array('staff'))): ?>
            <li>
                <a href="<?php echo site_url() ?>c4/view_list" class="waves-effect">
                    <i data-icon="&#xe006;" class="linea-icon linea-basic fa-fw"></i>
                    <span class="hide-menu">Danh sách contact</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url() ?>c3/add" class="waves-effect">
                    <i data-icon="&#xe006;" class="linea-icon linea-basic fa-fw"></i>
                    <span class="hide-menu">Thêm contact</span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(in_array($ROLE_KEY, array('admin'))): ?>
            <li>
                <a href="javascript:void(0)" class="waves-effect">
                    <i data-icon="" class="linea-icon linea-basic fa-fw"></i> 
                    <span class="hide-menu">Nhóm khu vực<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="">
                    <li><a href="<?php echo site_url() ?>groups">Danh sách</a></li>
                    <li><a href="<?php echo site_url() ?>groups/form">Thêm Nhóm</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(in_array($ROLE_KEY, array('admin'))): ?>
            <li>
                <a href="javascript:void(0)" class="waves-effect">
                    <i data-icon="" class="linea-icon linea-basic fa-fw"></i> 
                    <span class="hide-menu">Quản trị hệ thống<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="">
                    <li><a href="<?php echo site_url() ?>users">Danh sách tàì khoản</a></li>
                    <li><a href="<?php echo site_url() ?>users/form">Thêm tài khoản</a></li>
                </ul>
            </li>
            <?php endif; ?>
            
            <li>
                <a href="<?php echo site_url() ?>users/logout" class="waves-effect">
                    <i class="icon-logout fa-fw"></i> 
                    <span class="hide-menu">Thoát</span>
                </a>
            </li>
        </ul>
    </div>
</div>