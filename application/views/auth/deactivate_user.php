<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">

<!-- Custom Date-Time Picker -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url();?>resources/admintheme/css/download.css">



      <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo lang('deactivate_heading');?></h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>

           

            <!-- Filter dan Picker -->
            <div class="row mb-4">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-question-circle me-1"></i>
                            <?php echo sprintf(lang('deactivate_subheading'), $user->{$identity}); ?>
                        </div>
                        <div class="card-body">
                        <?php echo form_open("auth/deactivate/".$user->id);?>
                              <div class="row">
                                  <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="confirm" id="confirm" value="yes" checked="checked" />
                                        <label class="form-check-label"><?php echo lang('deactivate_confirm_y_label', 'confirm');?></label>
                                    </div>
                                  </div>
                                  <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="confirm" id="confirm" value="no" />
                                        <label class="form-check-label"><?php echo lang('deactivate_confirm_n_label', 'confirm');?></label>
                                    </div>
                                  </div>
                              </div>
                              <?php echo form_hidden($csrf); ?>
                              <?php echo form_hidden(['id' => $user->id]); ?>
                              
                            <br>

                            <div class="row">
                                <div class="input-group">
                                    <?php echo form_submit('submit', 'Simpan',array('class'=>'btn btn-sm btn-primary'));?>
                                </div>
                            </div>

                        <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
      </div>