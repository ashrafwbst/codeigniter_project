<?php if($this->Cms_auth_model->is_group_allowed('save', 'backend') !== FALSE){ ?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i><span class="fa fa-server"></span></i> <?php echo $this->lang->line('serverstatus_header') ?>
            </li>
        </ol>
    </div>
</div>
<!-- Info boxes -->
<div class="row">    
    	<div class="col-md-12">
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
	</div>
</div>
<!-- /.row -->

<?php } ?>

<!-- Page Heading -->

<div class="row">
    <div class="col-lg-12 maintenance_system">
		<div class="card">
			<div class="card-body">
				<div class="h2 sub-header"><?php echo $this->lang->line('maintenance_header') ?></div>
				<ul>
					<li><a href="<?php echo $this->Cms_model->base_link(). '/admin/upgrade/clearAllCache' ?>" class="btn btn-danger" onclick="return confirm('<?php echo $this->lang->line('delete_message') ?>');"><?php echo $this->lang->line('btn_clearallcache') ?></a></li>
					<li><a href="<?php echo $this->Cms_model->base_link(). '/admin/upgrade/clearAllDBCache' ?>" class="btn btn-danger" onclick="return confirm('<?php echo $this->lang->line('delete_message') ?>');"><?php echo $this->lang->line('btn_clearalldbcache') ?></a></li>
					<li><?php if($this->Cms_auth_model->is_group_allowed('delete', 'backend') !== FALSE){ ?>
        <a href="<?php echo $this->Cms_model->base_link(). '/admin/upgrade/clearAllSession' ?>" class="btn btn-danger" onclick="return confirm('<?php echo $this->lang->line('clear_sess_message') ?>');"><?php echo $this->lang->line('btn_clear_sess') ?></a></li>					
				</ul>
        <?php } ?>        
       		</div>
		</div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 error_log_download">
		<div class="card">
			<div class="card-body">
				<div class="h2 sub-header"><?php echo $this->lang->line('logs_download_header') ?></div>				
					<?php if($this->Cms_auth_model->is_group_allowed('delete', 'backend') !== FALSE){ ?>
					<a href="<?php echo $this->Cms_model->base_link(). '/admin/upgrade/clearAllErrLog' ?>" class="btn btn-danger" onclick="return confirm('<?php echo $this->lang->line('delete_message') ?>');"><?php echo $this->lang->line('btn_clear_logs') ?></a>
					<br><br>
					<?php } ?>
					<?php echo form_open($this->Cms_model->base_link(). '/admin/upgrade/downloadErrLog'); ?>
					<?php
					$att = 'id="errlogfile" class="form-control-static"';
					$data = array();
					$data[''] = $this->lang->line('option_choose');
					if(!empty($logsdir)){
						$data['all'] = $this->lang->line('option_all');
						foreach ($logsdir as $t) {
							$t = str_replace("\\", "", $t);
							$t = str_replace("/", "", $t);
							if (($t[0] != ".") && ($t != "index.html") && is_file(APPPATH . '/logs/' . $t)) {
								$data[$t] = str_replace('.php', '', $t);
							}
						}
					}
					echo form_dropdown('errlogfile', $data, '', $att); ?>
					<?php
					$data = array(
						'name' => 'submit',
						'id' => 'submit',
						'class' => 'btn btn-primary',
						'value' => $this->lang->line('btn_logs_download'),
					);
					echo form_submit($data);
					?>
					<?php echo form_close(); ?>
			</div>
		</div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
		<div class="card">
			<div class="card-body maintenance_system">
				<div class="h2 sub-header"><?php echo $this->lang->line('database_maintain_header') ?></div>
				<ul>
					<li><a href="<?php echo $this->Cms_model->base_link(). '/admin/upgrade/optimize' ?>" class="btn btn-dark"><?php echo $this->lang->line('btn_optimize_db') ?></a></li>
					<li><a href="<?php echo $this->Cms_model->base_link(). '/admin/upgrade/backup' ?>" target="_blank" class="btn btn-dark"><?php echo $this->lang->line('btn_backup_db') ?></a></li>
					<li><a href="<?php echo $this->Cms_model->base_link(). '/admin/upgrade/filebackup' ?>" target="_blank" class="btn btn-dark"><?php echo $this->lang->line('btn_backup_file') ?></a></li>
					<li><a href="<?php echo $this->Cms_model->base_link(). '/admin/upgrade/photobackup' ?>" target="_blank" class="btn btn-dark"><?php echo $this->lang->line('btn_backup_photo') ?></a></li>
				</ul>
			</div>
		</div>
    </div>
</div>

