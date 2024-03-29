<!-- Page Heading -->

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="fa fa-cog"></span></i>
				<?php echo  $this->lang->line('bf_settings') ?>
			</li>
		</ol>
	</div>
</div>

<!-- /.row -->
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="h2 sub-header">
					<?php echo $this->lang->line('bf_private_key') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<a href="<?php echo $this->Cms_model->base_link().'/admin/bfsettings/genPrivateKey' ?>" class="btn btn-success" title="<?php echo $this->lang->line('bf_gen_private_key') ?>" onclick="return confirm('<?php echo $this->lang->line('bf_gen_private_key_confirm') ?>');">
					<?php echo $this->lang->line('bf_gen_private_key') ?>
				</a>
			</div>
			<div class="col-sm-9">
				<pre><em><?php if(!empty($settings->bf_private_key) && $settings->bf_private_key != NULL) echo $settings->bf_private_key; else echo '-'; ?></em></pre>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="h2 sub-header">
					<?php echo  $this->lang->line('bf_settings') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label" for="bf_protect_period">
						<?php echo $this->lang->line('bf_period_time'); ?>
					</label>

					<div class="controls">
						<?php
						$att = 'id="bf_protect_period" class="form-control"';
						$data = array();
						$data[ '1' ] = '1 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '2' ] = '2 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '5' ] = '5 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '10' ] = '10 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '15' ] = '15 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '20' ] = '20 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '30' ] = '30 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '45' ] = '45 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '60' ] = '60 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '90' ] = '90 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '120' ] = '120 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '180' ] = '180 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '240' ] = '240 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '300' ] = '300 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '360' ] = '360 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '720' ] = '720 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '1440' ] = '1440 ' . $this->lang->line( 'settings_pagecache_time_min' );
						$data[ '14400' ] = '14400 ' . $this->lang->line( 'settings_pagecache_time_min' );
						echo form_dropdown( 'bf_protect_period', $data, $settings->bf_protect_period, $att );
						?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label class="control-label" for="max_failure">
						<?php echo $this->lang->line('bf_max_fail'); ?>
					</label>
					<div class="controls">
						<?php
						$att = 'id="max_failure" class="form-control"';
						$data = array();
						$data[ '5' ] = '5';
						$data[ '10' ] = '10';
						$data[ '15' ] = '15';
						$data[ '20' ] = '20';
						$data[ '30' ] = '30';
						$data[ '40' ] = '40';
						$data[ '50' ] = '50';
						$data[ '75' ] = '75';
						$data[ '100' ] = '100';
						$data[ '150' ] = '150';
						$data[ '200' ] = '200';
						$data[ '500' ] = '500';
						echo form_dropdown( 'max_failure', $data, $settings->max_failure, $att );
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php echo form_open($this->Cms_model->base_link(). '/admin/bfsettings/save'); ?>
				<?php
				$data = array(
					'name' => 'submit',
					'id' => 'submit',
					'class' => 'btn btn-primary',
					'value' => $this->lang->line( 'btn_save' ),
				);
				echo form_submit( $data );
				?>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="h2 sub-header">
					<?php echo $this->lang->line('bf_white_list') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php echo form_open($this->Cms_model->base_link(). '/admin/bfsettings/whiteipsave'); ?>
				<div class="form-group">
					<label>
						<?php echo $this->lang->line('ip_address') ?>
					</label>
					<input class="form-control" type="text" name="ip_address" id="ip_address" value="<?php echo $this->input->ip_address(); ?>" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label><?php echo $this->lang->line('bf_note') ?></label>
					<input class="form-control" type="text" name="note" id="note">
				</div>
			</div>			
		</div>
		<div class="row">
				<div class="col-sm-12">
					 <?php
					$data = array(
						'name' => 'submit',
						'id' => 'submit',
						'class' => 'btn btn-primary',
						'value' => $this->lang->line( 'btn_add' ),
					);
					echo form_submit( $data );
					?>

					<?php echo form_close(); ?>

					<div class="box box-body table-responsive no-padding" style="margin-top:15px;">
						<table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th width="90%" class="text-center">
										<?php echo $this->lang->line('bf_white_list'); ?>
									</th>
									<th width="10%" class="text-center"></th>
								</tr>
							</thead>
							<tbody>
								<?php if ($whitelist=== FALSE) { ?>
								<tr>
									<td colspan="2" class="text-center">
										<span class="h6 error">
											<?php echo  $this->lang->line('data_notfound') ?>
										</span>
									</td>
								</tr>
								<?php } else { ?>
								<?php
								foreach ( $whitelist as $u ) {
									echo '<tr>';
									echo '<td>' . $u[ 'ip_address' ] . '<br><span style="font-style: italic; font-size:12px;">' . $u[ 'note' ] . '</span></td>';
									echo '<td><a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\'' . $this->lang->line( 'delete_message' ) . '\')" href="' . $this->Cms_model->base_link() . '/admin/bfsettings/whiteipdel/' . $u[ 'whitelist_ip_id' ] . '"><i class="glyphicon glyphicon-remove"></i></a></td>';
									echo '</tr>';
								}
								?>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="h2 sub-header">
					<?php echo  $this->lang->line('bf_black_list') ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php echo form_open($this->Cms_model->base_link(). '/admin/bfsettings/blackipsave'); ?>
				<div class="form-group">
					<label>
						<?php echo $this->lang->line('ip_address') ?>
					</label>
					<input class="form-control" type="text" name="ip_address" id="ip_address" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>
						<?php echo $this->lang->line('bf_note') ?>
					</label>
					<input class="form-control" type="text" name="note" id="note">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<?php
				$data = array(
					'name' => 'submit',
					'id' => 'submit',
					'class' => 'btn btn-primary',
					'value' => $this->lang->line( 'btn_add' ),
				);

				echo form_submit( $data );
				?>

				<?php echo form_close(); ?>

				<div class="box box-body table-responsive no-padding" style="margin-top: 15px;">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="90%" class="text-center">
									<?php echo $this->lang->line('bf_black_list'); ?>
								</th>
								<th width="10%" class="text-center"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($blacklist=== FALSE) { ?>
							<tr>
								<td colspan="2" class="text-center">
									<span class="h6 error">
										<?php echo  $this->lang->line('data_notfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php
							foreach ( $blacklist as $u ) {
								echo '<tr>';
								echo '<td>' . $u[ 'ip_address' ] . '<br><span style="font-style: italic; font-size:12px;">' . $u[ 'note' ] . '</span></td>';
								echo '<td><a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\'' . $this->lang->line( 'delete_message' ) . '\')" href="' . $this->Cms_model->base_link() . '/admin/bfsettings/blackipdel/' . $u[ 'blacklist_ip_id' ] . '"><i class="glyphicon glyphicon-remove"></i></a></td>';
								echo '</tr>';
							}
							?>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
