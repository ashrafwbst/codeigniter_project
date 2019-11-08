<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="glyphicon glyphicon-stats"></span></i>
				<?php echo $this->lang->line('banner_header') ?>
			</li>
		</ol>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header">
			<?php echo  $this->lang->line('banner_header') ?> <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/banner/new" class="btn btn-default btn-sm" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-plus"></span> <?php echo  $this->lang->line('banner_new') ?></a>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="pull-right">
					<form action="<?php echo $this->Cms_model->base_link(). '/admin/banner/'; ?>" method="get">
						<div class="control-group-fluid banner_head">
							<label class="control-label" for="search">
								<?php echo $this->lang->line('linkstats_url'); ?>: <input type="text" name="search" id="search" class="form-control-static" value="<?php echo $this->input->get('search');?>">
							</label>
							<label class="control-label" for="start_date">
								<?php echo $this->lang->line('startdate_field'); ?>: <input type="text" name="start_date" id="start_date" class="form-control-static form-datepicker" value="<?php echo $this->input->get('start_date');?>">
							</label>
							<label class="control-label" for="end_date">
								<?php echo $this->lang->line('enddate_field'); ?>: <input type="text" name="end_date" id="end_date" class="form-control-static form-datepicker" value="<?php echo $this->input->get('end_date');?>">
							</label>
							<input type="submit" name="submit" id="submit" class="btn btn-primary" value="<?php echo $this->lang->line('search'); ?>">
						</div>
					</form>
				</div>
				<?php echo form_open($this->Cms_model->base_link(). '/admin/banner/deleteindex'); ?>

				<div class="box box-body table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl">
						<thead>
							<tr>
								<th width="5%"><label><input id="sel-chkbox-all" type="checkbox"><?php /*?> <?php echo  $this->lang->line('btn_delete') ?><?php */?></label>
								</th>
								<th width="7%">
									<?php echo $this->lang->line('id_col_table'); ?>
								</th>
								<th width="20%">
									<?php echo $this->lang->line('banner_img'); ?>
								</th>
								<th width="40%">
									<?php echo $this->lang->line('banner_name'); ?>
								</th>
								<th width="13%">
									<?php echo $this->lang->line('banner_count'); ?>
								</th>
								<th width="14%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($banner === FALSE) { ?>
							<tr>
								<td colspan="6" class="text-center">
									<span class="h6 error">
										<?php echo $this->lang->line('data_notfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php
							foreach ( $banner as $u ) {
								if ( !$u[ 'active' ] ) {
									$inactive = ' style="color:red;text-decoration:line-through;"';
								} else {
									$inactive = ' ';
								}
								echo '<tr>';
								echo '<td>
                                    <input type="checkbox" name="delR[]" id="delR" class="selall-chkbox" value="' . $u[ 'banner_mgt_id' ] . '">
                                </td>';
								echo '<td' . $inactive . '>' . $u[ 'banner_mgt_id' ] . '</td>';
								echo '<td' . $inactive . '>';
								( $u[ 'img_path' ] && $u[ 'img_path' ] !== NULL ) ? $img = base_url() . 'photo/banner/' . $u[ 'img_path' ]: $img = base_url() . 'photo/no_image.png';
								echo '<img src="' . $img . '" width="100"></td>';
								?>
							<td class="word_break">
								<?php
								if ( strtotime( date( 'Y-m-d' ) ) > strtotime( $u[ 'end_date' ] ) ) {
									$expired = ' <span class="error">(' . $this->lang->line( 'banner_expired' ) . ')</span>';
								} else {
									$expired = '';
								}
								?>
								<h4>
									<?php echo $u['name'].$expired; ?>
								</h4>
								<?php echo ($u['width']) ? $this->lang->line('banner_width').': <strong>'.$u['width'].'</strong> ' :'' ?>
								<?php echo ($u['height']) ? $this->lang->line('banner_height').': <strong>'.$u['height'].'</strong>' :'' ?>
								<div class="clearfix"></div>
								<?php echo $this->lang->line('banner_date_period') ?>:
								<?php echo '<strong>' . $u['start_date'] . '</strong> '.$this->lang->line('dashboard_toemail').' <strong>' . $u['end_date'] . '</strong>'; ?>
								<div class="clearfix"></div>
								<span>
									<?php echo $this->lang->line('banner_link') ?>:
									<strong>
										<?php echo $u['link']; ?>
									</strong>
								</span>
								<div class="clearfix"></div>
								<?php echo $this->lang->line('bf_note') ?>:
								<strong>
									<?php echo ($u['note'] && $u['note'] !== NULL) ? $u['note'] : '-'; ?>
								</strong>
							</td>
							<?php $where_arr = array('banner_mgt_id' => $u['banner_mgt_id']);
                            echo '<td'.$inactive.'>' . number_format($this->Cms_model->countData('banner_statistic', $where_arr)) . '</td>';
                            echo '<td'.$inactive.'><a href="'.$this->Cms_model->base_link().'/admin/banner/edit/' . $u['banner_mgt_id'] . '" class="btn btn-default btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp; <a href="'.$this->Cms_model->base_link().'/admin/banner/view/' . $u['banner_mgt_id'] . '" class="btn btn-primary btn-sm" role="button"><i class="fa fa-trash-o"></i></a>';
                            echo '</td></tr>';
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
							'class' => 'btn btn-danger',
							'value' => $this->lang->line( 'btn_delete' ),
							'onclick' => "return confirm('" . $this->lang->line( 'delete_message' ) . "');",
						);
						echo form_submit( $data );
						?>
					</div>
				</div>
				<?php echo  form_close(); ?><br>
				<span class="remark">
					<?php echo $this->lang->line('banner_indexremark'); ?>
				</span><br><br>
				<?php echo $this->pagination->create_links(); ?>
				<strong>
					<?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?>
				</strong>
				<!-- /widget-content -->
			</div>
		</div>
	</div>
</div>