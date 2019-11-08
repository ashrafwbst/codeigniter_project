<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i><span class="fa fa-user"></span></i> <?php echo  $this->lang->line('user_admin_txt') ?>
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="h2 sub-header"><?php echo  $this->lang->line('user_header') ?> <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/users/new" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('user_addnew') ?></a></div>
		<div class="card">
			<div class="card-body">
				<div class="pull-right">		
					<form action="<?php echo $this->Cms_model->base_link(). '/admin/users/'; ?>" method="get">
						<div class="control-group-fluid">
							<label class="control-label" for="search"><?php echo $this->lang->line('search'); ?>: <input type="text" name="search" id="search" class="form-control-static" value="<?php echo $this->input->get('search');?>"></label>               
							<input type="submit" name="submit" id="submit" class="btn btn-default" value="<?php echo $this->lang->line('search'); ?>">
						</div>
					</form>
				</div>
        		<div class="table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl">
						<thead>
							<tr>
								<th width="10%"><?php echo $this->lang->line('user_status'); ?></th>
								<th width="20%"><?php echo $this->lang->line('user_name'); ?></th>
								<th width="30%"><?php echo $this->lang->line('user_email'); ?></th>
								<th width="15%"><?php echo $this->lang->line('user_group_txt'); ?></th>
								<th width="25%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($users === FALSE) { ?>
								<tr>
									<td colspan="5" class="text-center"><span class="h6 error"><?php echo  $this->lang->line('data_notfound') ?></span></td>
								</tr>                           
							<?php } else { ?>
								<?php
								foreach ($users as $u) {
									if(!$u['active']){
										$inactive = ' style="color:red;text-decoration:line-through;"';
										$status = '<span style="color:red;">Deactivated</span>';
									}else{
										$inactive = '';
										$status = '<span style="color:green;">Activated</span>';
									}
									if($u['user_admin_id'] == 1){
										$default_txt = ' <i class="fa fa-lock"></i>';
									}else{
										$default_txt = '';
									}
									echo '<tr>';
									echo '<td >' . $status . '</td>';
									echo '<td'.$inactive.' >' . $u['name'] . ''.$default_txt.'</td>';
									echo '<td'.$inactive.' >' . $u['email'] . '</span></td>';
									echo '<td'.$inactive.' >';
									$user_group = $this->Cms_auth_model->get_groups_fromuser($u['user_admin_id']);
									echo ($user_group !== FALSE) ? $user_group->name : '-';
									echo '</span></td>';
									echo '<td ><a href="'.$this->Cms_model->base_link().'/admin/users/view/' . $u['user_admin_id'] . '" class="btn btn-primary btn-sm" role="button"><i class="fa fa-eye"></i></a> &nbsp;&nbsp; <a href="'.$this->Cms_model->base_link().'/admin/users/edit/' . $u['user_admin_id'] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp; <a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\''.$this->lang->line('user_delete_message').'\')" href="'.$this->Cms_model->base_link().'/admin/users/delete/'.$u['user_admin_id'].'"><i class="fa fa-trash-o"></i></a></td>';
									echo '</tr>';
								}
							}
							?>
						</tbody>
					</table>
				</div>
        		<?php echo $this->pagination->create_links(); ?> <b><?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?></b>
				<!-- /widget-content -->
				<span class="warning">
					<i class="fa fa-lock"></i> <?php echo  $this->lang->line('default_data_remark') ?>
				</span>
			</div>
		</div>
    </div>
</div>
