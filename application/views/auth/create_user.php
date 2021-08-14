<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

<!-- Custom Date-Time Picker -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url();?>resources/admintheme/css/download.css">



      <div class="container-fluid px-4">
      <h2 class="mt-4">Akun Pengguna Admin Kab/Kota</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>

           

            <!-- Filter dan Picker -->
            <div class="row mb-4">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <h2 class="mt-4"><?php echo lang('create_user_heading');?></h2>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-info-circle me-1"></i>
                            <?php echo lang('create_user_subheading');?>
                        </div>
                        <div class="card-body">
                              <div id="infoMessage"><?php echo $message;?></div>
                        <?php echo form_open("auth/create_user");?>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('create_user_fname_label', 'first_name');?> </label>
                                <div class="col">
                                    <?php echo form_input($first_name);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('create_user_lname_label', 'last_name');?></label>
                                <div class="col">
                                    <?php echo form_input($last_name);?>
                                </div>
                              </div>
                              <?php if($identity_column!=='email') { ?>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('create_user_identity_label', 'identity');?></label>
                                <div class="col">
                                    <?php 
                                          echo form_error('identity');
                                          echo form_input($identity);
                                    ?>
                                </div>
                              </div>
                              <?php } ?>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('create_user_company_label', 'company');?></label>
                                <div class="col">
                                    <?php echo form_input($company);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('create_user_email_label', 'email');?></label>
                                <div class="col">
                                    <?php echo form_input($email);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('create_user_phone_label', 'phone');?></label>
                                <div class="col">
                                    <?php echo form_input($phone);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('create_user_password_label', 'password');?></label>
                                <div class="col">
                                    <?php echo form_input($password);?>
                                </div>
                              </div>
                              <div class="row">
                                <label for="country" class="control-label"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label>
                                <div class="col">
                                    <?php echo form_input($password_confirm);?>
                                </div>
                              </div>
                            <br>

                            <div class="row">
                                <div class="input-group">
                                    <?php echo form_submit('submit', lang('create_user_submit_btn'),array('class'=>'btn btn-sm btn-primary'));?>
                                </div>
                            </div>

                        <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <h2 class="mt-4">List of Users</h2>
                  <div class="card mb-4">
                      <div class="card-body">
                        <table id="datatablesSimple">
                              <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Full Name</th>
                                      <th>Username</th>
                                      <th>Email</th>
                                      <th>Group</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>

                              <tbody>
                                <?php $no=1; foreach ($users as $user):?>
                                  <tr>
                                    <td><?php echo $no++; ?></td>
                                          <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8').' '.htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                          <td><?php echo htmlspecialchars($user->username,ENT_QUOTES,'UTF-8');?></td>
                                          <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                                    <td>
                                      <?php foreach ($user->groups as $group):?>
                                        <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                              <?php endforeach?>
                                    </td>
                                    <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Deactivate',array('class'=>'btn btn-sm btn-danger')) : anchor("auth/activate/". $user->id, 'Activate' ,array('class'=>'btn btn-sm btn-success'));?></td>
                                    <td><?php echo anchor("auth/edit_user/".$user->id, 'Edit',array('class'=>'btn btn-sm btn-primary')) ;?></td>
                                  </tr>
                                <?php endforeach;?>
                              </tbody>
                        </table>

                        <!-- <p><?php //echo anchor('auth/create_user', 'Create User',array('class'=>'btn btn-xs btn-primary'))?> </p>
                        <a href=""> -->
                      </div>
                  </div>
                </div>
            </div>
      </div>

