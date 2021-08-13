<div class="container-fluid px-4">
    <h2 class="mt-4"><?php echo lang('change_password_heading');?></h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4" style="width:50%">
       
        <div class="card-body">
            <div id="infoMessage"><?php echo $message;?></div>
            <div class="row">
                  <?php echo form_open("auth/change_password");?>
                                   
                  <div class="col-md-12">
                        <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                        <?php echo form_input($old_password);?>
                  </div>

                  <div class="col-md-12">
                        <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                        <?php echo form_input($new_password);?>
                  </div>

                  <div class="col-md-12">
                        <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                        <?php echo form_input($new_password_confirm);?><br />
                  </div>

                  <div class="col-md-12">
                  <?php echo form_input($user_id);?>
                  <?php echo form_submit('submit', lang('change_password_submit_btn'),'class="btn btn-primary"');?>
                  </div>

            <?php echo form_close();?>
      </div>
        </div>
    </div>
</div>






