
      <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo lang('edit_user_heading');?></h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>

           

            <!-- Filter dan Picker -->
            <div class="row mb-4">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-info-circle me-1"></i>
                            <?php echo lang('edit_user_subheading');?>
                        </div>
                        <div class="card-body">
                              <div id="infoMessage"><?php echo $message;?></div>
                        <?php echo form_open(uri_string());?>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('edit_user_fname_label', 'first_name');?> </label>
                                <div class="col">
                                    <?php echo form_input($first_name);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
                                <div class="col">
                                    <?php echo form_input($last_name);?>
                                </div>
                              </div>
                              
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('edit_user_company_label', 'company');?></label>
                                <div class="col">
                                    <?php echo form_input($company);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('edit_user_phone_label', 'phone');?></label>
                                <div class="col">
                                    <?php echo form_input($phone);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('edit_user_password_label', 'password');?></label>
                                <div class="col">
                                    <?php echo form_input($password);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
                                <div class="col">
                                    <?php echo form_input($password_confirm);?>
                                </div>
                              </div>

                              <?php if ($this->ion_auth->is_admin()): ?>

                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('edit_user_groups_heading');?></label>
                                <div class="col">
                                    <?php foreach ($groups as $group):?>
                                      <label class="checkbox">
                                      <input class="form-check-input" type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                                      <?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>
                                      </label>
                                    <?php endforeach?>
                                </div>
                              </div>

                              <?php endif ?>
                              <?php echo form_hidden('id', $user->id);?>
                              <?php echo form_hidden($csrf); ?>

                            <br>

                            <div class="row">
                                <div class="input-group">
                                    <?php echo form_submit('submit', lang('edit_user_submit_btn'),array('class'=>'btn btn-sm btn-primary'));?>
                                </div>
                            </div>

                        <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
      </div>

