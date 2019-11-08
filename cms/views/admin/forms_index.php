<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="glyphicon glyphicon-globe"></span></i>
				<?php echo  $this->lang->line('forms_header') ?>
			</li>
		</ol>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header">
			<?php echo  $this->lang->line('forms_header') ?> <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/forms/new" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-plus"></span> <?php echo  $this->lang->line('forms_addnew') ?></a>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="box box-body table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl">
						<thead>
							<tr>
								<th width="18%">
									<?php echo $this->lang->line('forms_name'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('forms_enctype'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('forms_method'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('forms_save_to_db'); ?>
								</th>
								<th width="12%">
									<?php echo $this->lang->line('forms_sendmail'); ?>
								</th>
								<th width="12%">
									<?php echo $this->lang->line('forms_send_to_visitor'); ?>
								</th>
								<th width="11%">
									<?php echo $this->lang->line('forms_captcha'); ?>
								</th>
								<th width="20%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($forms === FALSE) { ?>
							<tr>
								<td colspan="7" class="text-center">
									<span class="h6 error">
										<?php echo  $this->lang->line('forms_notfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php foreach ($forms as $u) {
                            if(!$u['active']){
                                $inactive = ' style="color:red;text-decoration:line-through;"';
                            }else{
                                $inactive = '';
                            }
                            if($u['sendmail']){
                                $sendmail = '<i class="success glyphicon glyphicon-ok"></i>';
                            }else{
                                $sendmail = '<i class="error glyphicon glyphicon-remove"></i>';
                            }
                            if($u['send_to_visitor']){
                                $send_to_visitor = '<i class="success glyphicon glyphicon-ok"></i>';
                            }else{
                                $send_to_visitor = '<i class="error glyphicon glyphicon-remove"></i>';
                            }
                            if($u['captcha']){
                                $captcha = '<i class="success glyphicon glyphicon-ok"></i>';
                            }else{
                                $captcha = '<i class="error glyphicon glyphicon-remove"></i>';
                            }
                            if($u['save_to_db']){
                                $save_to_db = '<i class="success glyphicon glyphicon-ok"></i>';
                            }else{
                                $save_to_db = '<i class="error glyphicon glyphicon-remove"></i>';
                            }
                            echo '<tr>';
                            echo '<td'.$inactive.'>' . $u['form_name'] . '</td>'; ?>
							<td <?php echo $inactive?>>
								<?php echo ($u['form_enctype'])?$u['form_enctype']:'-'?>
							</td>
							<?php echo '<td '.$inactive.' >' . $u['form_method'] . '</td>';
                            echo '<td'.$inactive.'>' . $save_to_db . '</td>';
                            echo '<td'.$inactive.'>' . $sendmail . '</td>';
                            echo '<td'.$inactive.'>' . $send_to_visitor . '</td>';
                            echo '<td'.$inactive.'>' . $captcha . '</td>';
                            echo '<td>
							<a href="'.$this->Cms_model->base_link().'/admin/forms/view/' . $u['form_main_id'] . '" class="btn btn-primary btn-sm" role="button"><i class="glyphicon glyphicon-eye-open"></i></a> &nbsp;
							<a href="'.$this->Cms_model->base_link().'/admin/forms/edit/' . $u['form_main_id'] . '" class="btn btn-default btn-sm" role="button"><i class="glyphicon glyphicon-pencil"></i></a> &nbsp;
							<a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\''.$this->lang->line('forms_delete_msg').'\')" href="'.$this->Cms_model->base_link().'/admin/forms/delete/'.$u['form_main_id'].'"><i class="glyphicon glyphicon-remove"></i></a></td>';
                            echo '</tr>';
                        } ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<span class="remark">
					<?php echo $this->lang->line('forms_indexremark'); ?>
				</span>
				<?php echo $this->pagination->create_links(); ?>
				<!-- /widget-content -->
			</div>
		</div>
	</div>
</div>