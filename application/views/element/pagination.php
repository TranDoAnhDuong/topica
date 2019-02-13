<div class="dataTables_paginate paging_simple_numbers">
    <?php if($page > 1) { ?>
        <a class="paginate_button previous" href="<?php echo $pageLink.($page-1); ?>">Trang trước</a> 
    <?php } if($page == 1) { ?>
        <span class="paginate_button disabled">Trang trước</span> 
    <?php } ?>        
    
    <?php 
    $maxShowPage = ($page + 3 > $maxPage) ? $maxPage : $page + 3;
    for($i = ($page - 3); $i <= $maxShowPage; $i++) { ?>
        <?php if($i == $page) { ?>
            <span class="paginate_button current" name="page"><?php echo $page; ?></span>
        <?php } else if($i >= 1 && $i < $page) { ?>
            <a class="paginate_button" href="<?php echo $pageLink.$i; ?>"><?php echo $i; ?></a>
        <?php } else if($i <= $maxPage && $i > $page) { ?>
            <a class="paginate_button" href="<?php echo $pageLink.$i; ?>"><?php echo $i; ?></a>
        <?php } ?>
    <?php } ?>

    <?php if($page == $maxPage) { ?>
        <span class="paginate_button disabled">Trang sau</span> 
    <?php } else { ?>
        <a class="paginate_button next" href="<?php echo $pageLink.($page+1); ?>">Trang sau</a>
    <?php } ?>
</div>