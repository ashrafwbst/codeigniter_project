<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="fa fa-gift"></span></i>
				<?php echo  $this->lang->line('user_group_txt') ?>
			</li>
		</ol>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header">
			<?php echo  $this->lang->line('user_group_txt') ?> <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/groups/add" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('user_group_new') ?></a>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl">
						<thead>
							<tr>
								<th width="8%" >
									<?php echo $this->lang->line('id_col_table'); ?>
								</th>
								<th width="30%" >
									<?php echo $this->lang->line('user_group_name'); ?>
								</th>
								<th width="42%" >
									<?php echo $this->lang->line('user_group_definition'); ?>
								</th>
								<th width="20%" ></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($groups === FALSE) { ?>
							<tr>
								<td colspan="4">
									<span class="h6 error">
										<?php echo  $this->lang->line('data_notfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php
							foreach ( $groups as $u ) {
								echo '<tr>';
								echo '<td>' . $u[ 'user_groups_id' ] . '</td>';
								echo '<td>' . $u[ 'name' ] . '</td>';
								echo '<td>' . $u[ 'definition' ] . '</td>';
								echo '<td><a href="' . $this->Cms_model->base_link() . '/admin/groups/edit/' . $u[ 'user_groups_id' ] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp; <a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\'' . $this->lang->line( 'delete_message' ) . '\')" href="' . $this->Cms_model->base_link() . '/admin/groups/delete/' . $u[ 'user_groups_id' ] . '"><i class="fa fa-trash-o"></i></a></td>';
								echo '</tr>';
							}
							}
							?>
						</tbody>
					</table>
				</div>			
				<?php echo $this->pagination->create_links(); ?>
				<b><?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?></b>
			</div>
		</div>
	</div>
</div>