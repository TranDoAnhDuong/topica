<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo mb_convert_case($title, MB_CASE_UPPER, "UTF-8"); ?></h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li class="active"><?php echo $title; ?></li>
        </ol>
    </div>
</div>