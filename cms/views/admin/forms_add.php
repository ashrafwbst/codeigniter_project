<!-- Page Heading -->

<div class="row">

    <div class="col-lg-12">

        <ol class="breadcrumb">

            <li class="active">

                <i><span class="glyphicon glyphicon-globe"></span></i> <?php echo  $this->lang->line('forms_addnew') ?>

            </li>

        </ol>

    </div>

</div>

<!-- /.row -->

<div class="row">

    <div class="col-lg-12 col-md-12">

        <div class="h2 sub-header"><?php echo  $this->lang->line('forms_addnew') ?>  <a role="button" href="<?php echo  $this->Cms_model->base_link() ?>/admin/forms/new" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('forms_addnew') ?></a></div>

		<div class="card">
			<div class="card-body">
		
        <?php echo form_open_multipart($this->Cms_model->base_link(). '/admin/forms/insert'); ?>
        <div class="control-group">

            <?php echo form_error('form_name', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>

            <label class="control-label" for="form_name"><?php echo $this->lang->line('forms_name'); ?>*</label>

            <?php

            $data = array(

                'name' => 'form_name',

                'id' => 'form_name',

                'required' => 'required',

                'autofocus' => 'true',

                'class' => 'form-control',

                'maxlength' => '255',

                'value' => set_value('form_name', '', FALSE)

            );

            echo form_input($data);

            ?>			

        </div> <!-- /control-group -->

        <div class="control-group">	
            <?php echo form_error('form_enctype', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>									

            <label class="control-label" for="form_enctype"><?php echo $this->lang->line('forms_enctype'); ?></label>

            <?php

            $data = array(

                'name' => 'form_enctype',

                'id' => 'form_enctype',

                'class' => 'form-control',

                'maxlength' => '255',

                'value' => set_value('form_enctype', 'multipart/form-data', FALSE)

            );

            echo form_input($data);

            ?>				

        </div> <!-- /control-group -->

        <div class="control-group">	

            <label class="control-label" for="form_method"><?php echo $this->lang->line('forms_method'); ?></label>

            <?php

            $att = 'id="form_method" class="form-control"';

            $data = array();

            $data['post'] = 'post';

            $data['get'] = 'get';

            echo form_dropdown('form_method', $data, '', $att);

            ?>	

        </div> <!-- /control-group -->

        <div class="control-group">	

            <?php echo form_error('success_txt', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>									

            <label class="control-label" for="success_txt"><?php echo $this->lang->line('forms_success_txt'); ?></label>

            <?php

            $data = array(

                'name' => 'success_txt',

                'id' => 'success_txt',

                'class' => 'form-control',

                'maxlength' => '255',

                'value' => set_value('success_txt', '', FALSE)

            );

            echo form_input($data);

            ?>				

        </div> <!-- /control-group -->

        <div class="control-group">	

            <?php echo form_error('captchaerror_txt', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>									

            <label class="control-label" for="captchaerror_txt"><?php echo $this->lang->line('forms_captchaerror_txt'); ?></label>

            <?php

            $data = array(

                'name' => 'captchaerror_txt',

                'id' => 'captchaerror_txt',

                'class' => 'form-control',

                'maxlength' => '255',

                'value' => set_value('captchaerror_txt', '', FALSE)

            );

            echo form_input($data);

            ?>				

        </div> <!-- /control-group -->

        <div class="control-group">	

            <?php echo form_error('error_txt', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>									

            <label class="control-label" for="error_txt"><?php echo $this->lang->line('forms_error_txt'); ?></label>

            <?php

            $data = array(

                'name' => 'error_txt',

                'id' => 'error_txt',

                'class' => 'form-control',

                'maxlength' => '255',

                'value' => set_value('error_txt', '', FALSE)

            );

            echo form_input($data);

            ?>				

        </div> <!-- /control-group -->

        
		<div class="row">
			<div class="col-lg-12 col-md-12" style="padding: 0 25px;">
        		<div class="panel panel-default">

            <div class="panel-heading">

                <label class="checkbox-inline" style="width: 100%;">

                    <?php

                    $data = array(

                        'name' => 'sendmail',

                        'id' => 'sendmail',

                        'onclick' => "ChkHideShow('chk-sendmail');",

                        'value' => '1'

                    );

                    echo form_checkbox($data);

                    ?> <b><?php echo $this->lang->line('forms_sendmail'); ?></b>

                </label>

            </div>

            <div class="panel-body" id="chk-sendmail" style="display: none;">

                <div class="control-group">	

                    <?php echo form_error('email', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>									

                    <label class="control-label" for="email"><?php echo $this->lang->line('forms_email'); ?></label>

                    <?php

                    $data = array(

                        'name' => 'email',

                        'id' => 'email',

                        'class' => 'form-control',

                        'maxlength' => '255',

                        'value' => set_value('email', '', FALSE)

                    );

                    echo form_input($data);

                    ?>				

                </div> <!-- /control-group -->



                <div class="control-group">	

                    <?php echo form_error('subject', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>									

                    <label class="control-label" for="subject"><?php echo $this->lang->line('forms_subject'); ?></label>

                    <?php

                    $data = array(

                        'name' => 'subject',

                        'id' => 'subject',

                        'class' => 'form-control',

                        'maxlength' => '255',

                        'value' => set_value('subject', '', FALSE)

                    );

                    echo form_input($data);

                    ?>				

                </div> <!-- /control-group -->

            </div>

        </div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12" style="padding: 0 25px;">
        		<div class="panel panel-default">

            <div class="panel-heading">

                <label class="checkbox-inline" style="width: 100%;">

                    <?php

                    $data = array(

                        'name' => 'send_to_visitor',

                        'id' => 'send_to_visitor',

                        'onclick' => "ChkHideShow('chk-visitor');",

                        'value' => '1'

                    );

                    echo form_checkbox($data);

                    ?> <b><?php echo $this->lang->line('forms_send_to_visitor'); ?></b>

                </label>

            </div>

            <div class="panel-body" id="chk-visitor" style="display: none;">

                <span class="remark"><?php echo $this->lang->line('forms_visitor_newtxt'); ?></span>

            </div>

        </div>
			</div>
		</div>

        <div class="control-group">										

            <label class="form-control-static" for="active">

                <?php

                $data = array(

                    'name' => 'active',

                    'id' => 'active',

                    'value' => '1'

                );

                echo form_checkbox($data);

                ?> <?php echo $this->lang->line('lang_active'); ?></label>	

        </div> <!-- /control-group -->

        <div class="control-group">										

            <label class="form-control-static" for="captcha">

                <?php

                $data = array(

                    'name' => 'captcha',

                    'id' => 'captcha',

                    'value' => '1'

                );

                echo form_checkbox($data);

                ?> <?php echo $this->lang->line('forms_captcha'); ?></label>	

        </div> <!-- /control-group -->

        <div class="control-group">										

            <label class="form-control-static" for="save_to_db">

                <?php

                $data = array(

                    'name' => 'save_to_db',

                    'id' => 'save_to_db',

                    'value' => '1'

                );

                echo form_checkbox($data);

                ?> <?php echo $this->lang->line('forms_save_to_db'); ?></label>	

        </div> <!-- /control-group -->       

        <div class="row">
			<div class="col-lg-12 col-md-12" style="padding: 0 25px;">
				 <div class="h2 sub-header"><?php echo  $this->lang->line('field_header') ?></div>

        		<div class="addfields">

            <div class="entry panel panel-default">

                <div class="panel-body row">

                    <div class="col-md-12">

                        <div class="control-group">

                            <label class="control-label" for="field_type"><?php echo $this->lang->line('field_type'); ?></label>

                            <select id="field_type" name="field_type[]" class="form-control">

                                <option value="button">button</option>

                                <option value="checkbox">checkbox</option>

                                <option value="datepicker">datepicker</option>

                                <option value="timepicker">timepicker</option>

                                <option value="email">email</option>

                                <option value="file">file</option>

                                <option value="label">label</option>

                                <option value="password">password</option>

                                <option value="radio">radio</option>

                                <option value="reset">reset</option>

                                <option value="submit">submit</option>

                                <option value="selectbox">selectbox</option>

                                <option value="text">text</option>

                                <option value="textarea">textarea</option>

                            </select>

                        </div>            

                        <div class="control-group">	

                            <label class="control-label" for="field_name"><?php echo $this->lang->line('field_name'); ?>*</label>

                            <input type="text" name="field_name[]" id="field_name" class="form-control" maxlength="255">

                        </div>

                        <div class="control-group">	

                            <label class="control-label" for="field_id"><?php echo $this->lang->line('field_id'); ?></label>

                            <input type="text" name="field_id[]" id="field_id" class="form-control" maxlength="255">

                        </div>

                        <div class="control-group">	

                            <label class="control-label" for="field_class"><?php echo $this->lang->line('field_class'); ?></label>

                            <input type="text" name="field_class[]" id="field_class" class="form-control" maxlength="255">

                        </div>

                        <div class="control-group">	

                            <label class="control-label" for="field_placeholder"><?php echo $this->lang->line('field_placeholder'); ?></label>

                            <input type="text" name="field_placeholder[]" id="field_placeholder" class="form-control" maxlength="255">

                        </div>                   

                        <div class="control-group">	

                            <label class="control-label" for="field_value"><?php echo $this->lang->line('field_value'); ?></label>

                            <input type="text" name="field_value[]" id="field_value" class="form-control" maxlength="255">

                        </div>

                        <div class="control-group">	

                            <label class="control-label" for="field_label"><?php echo $this->lang->line('field_label'); ?></label>

                            <input type="text" name="field_label[]" id="field_label" class="form-control" maxlength="255">

                        </div>

                        <div class="control-group">	

                            <label class="control-label" for="sel_option_val"><?php echo $this->lang->line('sel_option_val'); ?></label>

                            <input type="text" name="sel_option_val[]" id="sel_option_val" class="form-control">

                            <span class="remark"><em><?php echo $this->lang->line('sel_option_val_info'); ?></em></span>

                        </div>

                        <div class="control-group">

                            <label class="control-label" for="field_required"><?php echo $this->lang->line('field_require'); ?></label>

                            <select id="field_required" name="field_required[]" class="form-control">

                                <option value="0">No</option>

                                <option value="1">Yes</option>

                            </select>

                        </div>                        

                        <div class="control-group text-right">

                            <button class="btn btn-success btn-fields-add" type="button">

                                <span class="glyphicon glyphicon-plus"></span>

                            </button>

                        </div>

                    </div>                   

                </div>

            </div>

        </div>
				<div class="text-right"><?php echo $this->lang->line('field_addtxtinfo')?></div>
			</div>
		</div>        

        <div class="form-actions">

            <?php

            $data = array(

                'name' => 'submit',

                'id' => 'submit',

                'class' => 'btn btn-warning m-r-10',

                'value' => $this->lang->line('btn_save'),

            );

            echo form_submit($data);

            ?> 

            <a class="btn btn-danger m-r-10" href="<?php echo $this->cms_referrer->getIndex(); ?>"><?php echo $this->lang->line('btn_cancel'); ?></a>

        </div> <!-- /form-actions -->

        <?php echo form_close(); ?>

        <!-- /widget-content --> 
</div>
</div>
    </div>
</div>