<?php $config = $this->Cms_admin_model->load_config(); ?>
<!-- /.box -->
<div class="row">
	<div class="box-body">
		<div class="card">
		<div class="card-body">
			<div class="d-md-flex align-items-center">
				<div class="pull-left">
					<h4 class="card-title"><?php echo $this->lang->line('dashboard_sales_summary') ?></h4>
					<h5 class="card-subtitle"><?php echo $this->lang->line('dashboard_overview_of_Latest_Month') ?></h5>
				</div>
				<div class="ml-auto d-flex no-block align-items-center pull-right">
					<ul class="list-inline font-12 dl m-r-15 m-b-0">
						<li class="list-inline-item text-info"><i class="fa fa-circle"></i> <?php echo $this->lang->line('dashboard_iphone') ?></li>
						<li class="list-inline-item text-primary"><i class="fa fa-circle"></i> <?php echo $this->lang->line('dashboard_ipad') ?></li>
					</ul>
					<div class="dl">
						<select class="custom-select">
							<option value="0" selected><?php echo $this->lang->line('dashboard_monthly') ?></option>
							<option value="1"><?php echo $this->lang->line('dashboard_daily') ?></option>
							<option value="2"><?php echo $this->lang->line('dashboard_weekly') ?></option>
							<option value="3"><?php echo $this->lang->line('dashboard_yearly') ?></option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
			<div class="row">
				<!-- column -->
				<div class="col-md-4">
					<h1 class="m-b-0 m-t-30">$6,890.68</h1>
					<h6 class="font-light text-muted"><?php echo $this->lang->line('dashboard_current_month_earnings') ?></h6>
					<h3 class="m-t-30 m-b-0">1,540</h3>
					<h6 class="font-light text-muted"><?php echo $this->lang->line('dashboard_current_month_sales') ?></h6>
					<a class="btn btn-info m-t-20 p-15 p-l-25 p-r-25 m-b-20" href="javascript:void(0)"><?php echo $this->lang->line('last_month_summary') ?></a>
				</div>
				<!-- column -->
				<div class="col-md-8">
					<div class="campaign ct-charts"></div>
				</div>
				<!-- column -->
			</div>
			</div>
		</div>	
		
		<div class="card-body border-top">
			<div class="row m-b-0">
				<!-- col -->
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="d-flex align-items-center">
						<div class="m-r-10"><span class="text-warning display-5"><i class="fa fa-user-secret"></i></span></div>
						<div>
							<span><?php echo $this->lang->line('dashboard_totaluser') ?>!</span>
							<h3 class="font-medium m-b-0"><?php echo $total_user ?></h3>
							<a class="text-warning" href="<?php echo $this->Cms_model->base_link().'/admin/users' ?>">
								<?php echo $this->lang->line('dashboard_viewdetail') ?>
							</a>
						</div>
					</div>
				</div>
				<!-- col -->
				<!-- col -->
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="d-flex align-items-center">
						<div class="m-r-10"><span class="text-success display-5"><i class="fa fa-comments-o"></i></span></div>
						<div>
							<span><?php echo $this->lang->line('dashboard_totalblog') ?>!</span>
							<h3 class="font-medium m-b-0"><?php echo $total_blog; ?></h3>
							<a class="text-success" href="<?php echo $this->Cms_model->base_link().'/admin/plugin/article'; ?>">
								<?php echo $this->lang->line('dashboard_viewdetail'); ?>
							</a>
						</div>
					</div>
				</div>
				<!-- col -->
				<?php if($config->email_logs == 1){ ?>
				<!-- col -->
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="d-flex align-items-center">
						<div class="m-r-10"><span class="text-info display-5"><i class="fa fa-envelope"></i></span></div>
						<div>
							<span><?php echo $this->lang->line('dashboard_totalemail') ?>!</span>
							<h3 class="font-medium m-b-0"><?php echo $total_emaillogs ?></h3>
							<a class="text-info" href="<?php echo $this->Cms_model->base_link().'/admin/emaillogs' ?>">
								<?php echo $this->lang->line('dashboard_viewdetail') ?>
							</a>
						</div>
					</div>
				</div>
				<!-- col -->
				<?php } ?>									
				<!-- col -->
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="d-flex align-items-center">
						<div class="m-r-10"><span class="text-primary display-5"><i class="fa fa-user"></i></span></div>
						<div>
							<span><?php echo $this->lang->line('dashboard_totalmember') ?>!</span>
							<h3 class="font-medium m-b-0"><?php echo $total_member ?></h3>
							<a class="text-primary" href="<?php echo $this->Cms_model->base_link().'/admin/members' ?>">
								<?php echo $this->lang->line('dashboard_viewdetail') ?>
							</a>
						</div>
					</div>
				</div>
				<!-- col -->	
			</div>
         </div>
       </div>		
	</div>
</div>
<!-- Page Heading -->
<!-- /.row -->
<div class="row">
		<div class="box-body">
<div class="row">			
			<div class="col-sm-6">
				<div class="info-box panel-card bg-info">
					<div class="pull-left">
						<h4 class="info-box-text text-white">
							<?php echo $this->lang->line('serverstatus_phpmem_use') ?>
						</h4>
						<h3 class="info-box-number text-white">
							<?php echo $this->Cms_admin_model->memUsage() ?> / <?php echo $this->Cms_admin_model->getMemLimit() ?>
						</h3>
					</div>
					<div class="pull-right text-right text-font-large text-white">
						<i class="fa fa-microchip"></i>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="info-box panel-card bg-cyan">
						<div class="pull-left">
							<h4 class="info-box-text text-white">
								<?php echo $this->lang->line('serverstatus_disk_use') ?>
							</h4>
							<h3 class="info-box-number text-white">
								<?php echo $this->Cms_admin_model->usageSpace() ?>
							</h3>
						</div>
						<div class="pull-right text-right text-font-large text-white">
							<i class="fa fa-hdd-o"></i>
						</div>
					</div>
	</div>				
			</div>
		
	</div>

	<div class="col-md-12">
		<?php if($config->email_logs == 1){ ?>
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i><span class="fa fa-envelope"></span></i> <?php echo $this->lang->line('dashboard_emailrecent') ?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12" style="word-wrap:break-word;">
						<div class="list-group">
							<?php if ($this->Cms_auth_model->is_group_allowed('email logs', 'backend') === FALSE){ ?>
							
							<div class="list-group-item">
								<span class="badge bg-cyan"><?php echo date('Y-m-d H:i:s')?></span>
								<strong><?php echo  $this->lang->line('user_not_allow_txt') ?></strong>
							</div>
							
							<?php }else{
								if ($email_logs === FALSE) { ?>
							
							<div class="list-group-item"><span class="badge bg-warning"><?php echo date('Y-m-d H:i:s')?></span>
								<strong><?php echo  $this->lang->line('data_notfound') ?></strong>
							</div>
							
							<?php } else { ?>
							<?php foreach ($email_logs as $el) { 
										$i = 0;
										if($el['email_result'] != 'success'){
											$error_rs = '<span class="error">Error - '.strip_tags($el['email_result']).'</span>';
										}else{
											$error_rs = '<span class="success">Success</span>';
										}
										$i++;
									?>
							
							<span class="list-group-item">
							<span class="badge bg-cyan"><?php echo $el['timestamp_create'] ?></span>						
							<strong><?php echo $this->lang->line('forms_subject') ?>:</strong>
							<?php echo $el['subject'] ?><br>
								<span style="font-size:12px;"><b><?php echo $this->lang->line('dashboard_fromemail') ?>: <?php echo $el['from_email'] ?> | <?php echo $this->lang->line('dashboard_toemail') ?>: <?php echo $el['to_email'] ?></b></span><div class="clearfix"></div>
								[<span style="font-style: italic; font-size:12px;"><?php echo $el['ip_address'] ?></span>]
								[<span style="font-style: italic; font-size:12px;"><?php echo $el['user_agent'] ?></span>]
								[<strong><?php echo $error_rs?></strong>] <div class="clearfix"></div>
								
							<pre><?php echo strip_tags($el['message']) ?></pre>
							<div class="control-group text-right">
								<a class="btn btn-danger btn-sm" role="button" onclick="return confirm('<?php echo $this->lang->line('delete_message')?>')" href="<?php echo $this->Cms_model->base_link().'/admin/admin/deleteEmailLogs/'.$el['email_logs_id']?>"><i class="fa fa-times"></i></a>							
							</div>
							</span>
							
							<?php } ?>
							<?php } 
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.box -->
		<?php } ?>
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><i><span class="fa fa-link"></span></i> <?php echo $this->lang->line('dashboard_linkrecent') ?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12" style="word-wrap:break-word;">
						<div class="list-group">
							<?php if ($this->Cms_auth_model->is_group_allowed('linkstats', 'backend') === FALSE){ ?>
							<div class="list-group-item">
								<span class="badge bg-cyan">
									<?php echo date('Y-m-d H:i:s')?>
								</span>
								<b>
									<?php echo  $this->lang->line('user_not_allow_txt') ?>
								</b>
							</div>
							<?php }else{
							if ($link_stats === FALSE) { ?>
							<div class="list-group-item">
								<span class="badge bg-warning">
									<?php echo date('Y-m-d H:i:s')?>
								</span>
								<b>
									<?php echo  $this->lang->line('data_notfound') ?>
								</b>
							</div>
							<?php } else { ?>
							<?php foreach ($link_stats as $ls) { ?>
							<span class="list-group-item">
									<span class="badge"><?php echo $ls['timestamp_create'] ?></span>
						
							<b>[<?php echo $ls['ip_address'] ?>]</b> -
							<?php echo $ls['link'] ?>
							</span>
							<?php } ?>
							<?php } 
							}?>
						</div>
						<div class="text-right">
							<a href="<?php echo $this->Cms_model->base_link().'/admin/linkstats' ?>" style="text-decoration: none;">
								<?php echo $this->lang->line('dashboard_viewdetail') ?> <i><span class="glyphicon glyphicon-expand"></span></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.box -->
	</div>
	<!-- /.box -->
</div>