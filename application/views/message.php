
<?php if($this->session->flashdata('msg_success')){?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('msg_success')?></div>
<?php } ?>

<?php if($this->session->flashdata('msg_error')){?>
  <div class="alert alert-error"><?php echo $this->session->flashdata('msg_error')?></div>
<?php } ?>