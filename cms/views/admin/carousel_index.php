<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="glyphicon glyphicon-picture"></span></i>
				<?php echo $this->lang->line('carousel_header') ?>
			</li>
		</ol>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header">
			<?php echo  $this->lang->line('carousel_header') ?> <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/carousel/add" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-plus"></span> <?php echo  $this->lang->line('carousel_new') ?></a>
		</div>
		<?php echo  form_open($this->Cms_model->base_link(). '/admin/carousel/deleteIndex'); ?>
		<div class="card">
			<div class="card-body">
				<div class="box box-body table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="10%"><label><input id="sel-chkbox-all" type="checkbox"> <?php echo  $this->lang->line('btn_delete') ?></label>
								</th>
								<th width="15%">
									<?php echo $this->lang->line('id_col_table'); ?>
								</th>
								<th width="55%">
									<?php echo $this->lang->line('carousel_name'); ?>
								</th>
								<th width="20%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($carousel === FALSE) { ?>
							<tr>
								<td colspan="4" class="text-center">
									<span class="h6 error">
										<?php echo $this->lang->line('data_notfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php
							foreach ( $carousel as $u ) {
								if ( !$u[ 'active' ] ) {
									$inactive = ' style="vertical-align:middle;color:red;text-decoration:line-through;"';
								} else {
									$inactive = ' style="vertical-align:middle;"';
								}
								echo '<tr>';
								echo '<td>
											<input type="checkbox" name="delR[]" id="delR" class="selall-chkbox" value="' . $u[ 'carousel_widget_id' ] . '">
										</td>';
								echo '<td' . $inactive . '>' . $u[ 'carousel_widget_id' ] . '</td>';
								echo '<td' . $inactive . '>' . $u[ 'name' ] . '</td>';
								echo '<td' . $inactive . '><a href="' . $this->Cms_model->base_link() . '/admin/carousel/edit/' . $u[ 'carousel_widget_id' ] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a>';
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
					<?php echo $this->lang->line('carousel_indexremark'); ?>
				</span><br><br>
				<?php echo $this->pagination->create_links(); ?>
				<b>
					<?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?>
				</b>
			</div>
		</div>
	</div>
</div>