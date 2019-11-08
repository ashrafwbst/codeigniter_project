<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="glyphicon glyphicon-stats"></span></i>
				<?php echo  $this->lang->line('loginlogs_header') ?>
			</li>
		</ol>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header">
			<?php echo $this->lang->line('loginlogs_header') ?>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="pull-right">
					<form action="<?php echo $this->Cms_model->base_link(). '/admin/loginlogs/'; ?>" method="get">
						<div class="control-group-fluid">
							<label class="control-label" for="search">
								<?php echo $this->lang->line('search'); ?>: <input type="text" name="search" id="search" class="form-control-static" value="<?php echo $this->input->get('search');?>">
							</label>
							<label class="control-label" for="start_date">
								<?php echo $this->lang->line('startdate_field'); ?>: <input type="text" name="start_date" id="start_date" class="form-datepicker form-control-static" style="width:100px;" value="<?php echo $this->input->get('start_date');?>">
							</label>
							<label class="control-label" for="end_date">
								<?php echo $this->lang->line('enddate_field'); ?>: <input type="text" name="end_date" id="end_date" class="form-datepicker form-control-static" style="width:100px;" value="<?php echo $this->input->get('end_date');?>">
							</label>
							<label class="control-label" for="result">
								<?php echo $this->lang->line('loginlogs_result'); ?>:
								<select name="result" id="result" class="form-control-static" style="width:100px;">
									<option value="">
										<?php echo $this->lang->line('option_all'); ?>
									</option>
									<option value="CAPTCHA_WRONG" <?php echo ($this->input->get('result') == 'CAPTCHA_WRONG')?' selected="selected"':''?>>CAPTCHA_WRONG</option>
									<option value="INVALID" <?php echo ($this->input->get('result') == 'INVALID')?' selected="selected"':''?>>INVALID</option>
									<option value="IP_BANNED" <?php echo ($this->input->get('result') == 'IP_BANNED')?' selected="selected"':''?>>IP_BANNED</option>
									<option value="SUCCESS" <?php echo ($this->input->get('result') == 'SUCCESS')?' selected="selected"':''?>>SUCCESS</option>
									<option value="CSRF_INVALID" <?php echo ($this->input->get('result') == 'CSRF_INVALID')?' selected="selected"':''?>>CSRF_INVALID</option>
								</select>
							</label>
							<input type="submit" name="submit" id="submit" class="btn btn-default" value="<?php echo $this->lang->line('search'); ?>">
						</div>
					</form>
				</div>

				<?php echo  form_open($this->Cms_model->base_link(). '/admin/loginlogs/deleteindexurl'); ?>
				<div class="table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl">
						<thead>
							<tr>
								<th width="8%"><label><input id="sel-chkbox-all" type="checkbox"> <?php /*?><?php echo  $this->lang->line('btn_delete') ?><?php */?></label>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('id_col_table'); ?>
								</th>
								<th width="15%">
									<?php echo $this->lang->line('user_email'); ?>
								</th>
								<th width="30%">
									<?php echo $this->lang->line('ip_address'); ?>
								</th>
								<th width="20%">
									<?php echo $this->lang->line('bf_note'); ?>
								</th>
								<th width="17%">
									<?php echo $this->lang->line('linkstats_dateime'); ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($login_logs === FALSE) { ?>
							<tr>
								<td colspan="6">
									<span class="h6 error">
										<?php echo  $this->lang->line('data_notfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php
							foreach ( $login_logs as $u ) {
								echo '<tr>';
								echo '<td>
                                    <input type="checkbox" name="delR[]" id="delR" class="selall-chkbox" value="' . $u[ 'login_logs_id' ] . '">
                                </td>';
								echo '<td>' . $u[ 'login_logs_id' ] . '</td>';
								if ( $u[ 'result' ] != 'SUCCESS' ) {
									$error_rs = '<span class="error">Error! - ' . $u[ 'result' ] . '</span>';
								} else {
									$error_rs = '<span class="success">Success!</span>';
								}
								echo '<td><b>' . $u[ 'email_login' ] . '</b>[' . $error_rs . ']</td>';
								echo '<td><b>' . $u[ 'ip_address' ] . '</b><br><span style="font-style: italic; font-size:12px;">' . $u[ 'user_agent' ] . '</span></td>';
								echo '<td>' . $u[ 'note' ] . '</td>';
								echo '<td>' . $u[ 'timestamp_create' ] . '</td>';
								echo '</tr>';
							}
							?>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<?php
						$data = array(
							'name' => 'submit',
							'id' => 'submit',
							'class' => 'btn btn-danger btn-sm tbl_data_delete',
							'value' => $this->lang->line( 'btn_delete' ),
							'onclick' => "return confirm('" . $this->lang->line( 'delete_message' ) . "');",
						);
						echo form_submit( $data );
						?>
						<?php echo  form_close(); ?> <b><?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?></b><br>
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>