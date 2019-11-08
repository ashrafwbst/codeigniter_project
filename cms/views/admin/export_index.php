<div class="h2 sub-header" style="display: inline-block;"><a role="button" href="<?php echo $this->cms_referrer->getIndex()?>" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> <?php echo  $this->lang->line('btn_back') ?></a></div>

<div class="card">
	<div class="card-body">
		<div class="h2 sub-header">CSV Export / Import</div>
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<form id="table_sel">
					<b>
						<?php echo $this->lang->line('db_table_name') ?>: </b>
					<select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = '<?php echo $this->Cms_model->base_link()?>/admin/export/'+this.options[this.selectedIndex].value);">
						<option value="">
							<?php echo $this->lang->line('option_choose') ?>
						</option>
						<?php foreach ($tablelist as $dbtl) { ?>
						<option value="<?php echo $dbtl ?>" <?php echo ($this->uri->segment(3) == $dbtl)?' selected="selected"':''?>>
							<?php echo $dbtl?>
						</option>
						<?php } ?>
					</select>
				</form>
			</div>
		</div>
	</div>
</div>

<?php if($this->uri->segment(3) && $this->db->table_exists($this->uri->segment(3))) { ?>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="h2 sub-header">
					<?php echo $this->lang->line('db_table_name') ?>:
					<?php echo $this->uri->segment(3) ?> 
				</div>
				<?php echo form_open($this->Cms_model->base_link(). '/admin/export/getcsv/'.$this->uri->segment(3), array('method="get"')) ?>
				<div class="box box-primary">
					<div class="box-header with-border">
						<h2 class="box-title"><b><?php echo $this->lang->line('export_csv_header') ?></b></h2>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-6">
								<label for="select_contact">
									<?php echo $this->lang->line('export_csv_field_sel') ?> <a title="<?php echo $this->lang->line('export_csv_field_sel_remark') ?>"><i class="fa fa-question-sign" ></i></a>
								</label>
								<?php
								$att = 'data-placeholder="' . $this->lang->line( 'export_csv_field_sel_remark' ) . '" id="fieldS" class="form-control select2" multiple="multiple" style="width:100%;"';
								$data = array();
								if ( !empty( $fields ) ) {
									foreach ( $fields as $value ) {
										$data[ $value ] = $value;
									}
								}
								echo form_dropdown( 'fieldS[]', $data, '', $att );
								?>
							</div>
							<div class="col-lg-6">
								<label for="orderby">
									<?php echo $this->lang->line('export_csv_orderby') ?>
								</label>
								<div class="input-group">
									<?php
									$att = 'id="orderby" class="form-control"';
									echo form_dropdown( 'orderby', $data, '', $att );
									?>
									<span class="input-group-addon">
											<select name="sort" id="sort" class="form-control">
												<option value="ASC">ASC</option>
												<option value="DESC">DESC</option>
											</select>
										</span>
								
								</div>
								<!-- /input-group -->
							</div>
						</div>
					</div>
					<div class="box-footer">
						<?php
						$data = array(
							'name' => 'submit',
							'id' => 'submit',
							'class' => 'btn btn-primary',
							'value' => $this->lang->line( 'export_csv_btn' ),
						);
						echo form_submit( $data );
						?>
					</div>
				</div>
				<?php echo form_close(); ?>
				<!-- /.box -->
				<?php echo form_open_multipart($this->Cms_model->base_link(). '/admin/export/importcsv/'.$this->uri->segment(3)) ?>
				<div class="box box-danger">
					<div class="box-header with-border">
						<h2 class="box-title">
							<?php echo $this->lang->line('import_csv_header') ?>
						</h2>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="control-group">
							<label for="import_csv">
								<?php echo $this->lang->line('import_csv_upload') ?> <span class="text-danger">*</span> <a title='<?php echo $this->lang->line(' import_csv_upload_remark ') ?>'><i class="fa fa-question-sign"></i></a>
							</label>
							<?php
							$data = array(
								'required' => 'required',
								'autofocus' => 'true',
								'name' => 'import_csv',
								'id' => 'import_csv',
								'class' => 'form-control',
								'accept' => '.csv'
							);
							echo form_upload( $data );
							?>
						</div>
					</div>
					<div class="box-footer">
						<?php
						$data = array(
							'name' => 'submit',
							'id' => 'submit',
							'class' => 'btn btn-primary',
							'value' => $this->lang->line( 'btn_next' ),
						);
						echo form_submit( $data );
						?>
					</div>
				</div>
				<?php echo form_close(); ?>
				<!-- /.box -->
			</div>
		</div>
	</div>
</div>
<?php } ?>