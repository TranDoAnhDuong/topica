<?php $message = $this->session->flashdata('message'); ?>
<?php if(!empty($message)): ?>
<div class="alert alert-<?php echo (!$this->session->flashdata('is_error')) ? 'success' : 'danger'; ?> alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
    <?php echo $message; ?>
</div>
<?php endif; ?>