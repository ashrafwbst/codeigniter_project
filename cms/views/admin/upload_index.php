<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="fa fa-server"></span></i>
				<?php echo $this->lang->line('serverstatus_header') ?>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-2">
						<h1><i class="fa fa-microchip"></i></h1>
					</div>
					<div class="col-xs-10 text-right">
						<div class="huge">
							<small style="font-size:60%">
								<?php echo $this->Cms_admin_model->memUsage() ?> /
								<?php echo $this->Cms_admin_model->getMemLimit() ?>
							</small>
						</div>
						<div>
							<?php echo $this->lang->line('serverstatus_phpmem_use') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-2">
						<h1><i class="fa fa-hdd-o"></i></h1>
					</div>
					<div class="col-xs-10 text-right">
						<div class="huge">
							<small style="font-size:60%">
								<?php echo $this->Cms_admin_model->usageSpace() ?>
							</small>
						</div>
						<div>
							<?php echo $this->lang->line('serverstatus_disk_use') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.col -->
</div>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="h2 sub-header">
					<?php echo  $this->lang->line('uploadfile_header') ?>
				</div>
				<?php /*?>
				<h4>
					<?php echo  $this->lang->line('uploadfile_uploadtools') ?>
				</h4>
				<?php */?>
				<?php echo  form_open_multipart($this->Cms_model->base_link(). '/admin/filehtml_upload') ?>
				<div class="row">
					<div class="col-lg-12 col-md-12 upload_btn_group">
						<span class="btn btn-success fileinput-button">
							<i class="fa fa-plus"></i> <span><?php echo  $this->lang->line('uploadfile_add_file') ?></span>
					
						<input type="file" name="files[]" id="files" multiple required accept=".jpg, .jpeg, .png, .gif, .pdf, .doc, .docx, .odt, .txt, .odg, .odp, .ods, .zip, .rar, .psv, .xls, .xlsx, .ppt, .pptx, .mp3, .wav, .mp4, .wma, .flv, .avi, .mov, .m4v, .wmv, .m3u, .pls">
						</span>
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-upload"></i> <span><?php echo  $this->lang->line('btn_upload') ?></span>
						</button>
					
						<button type="reset" class="btn btn-warning" id="reset">
							<i class="fa fa-ban"></i> <span><?php echo  $this->lang->line('btn_cancel') ?></span>
						</button>
					
						<pre id="filelist" style="display:none;"></pre>
					</div>
				</div>
				<?php echo form_close(); ?>

				<div class="remark">
					<em>
						<?php echo  $this->lang->line('uploadfile_fileallow') ?>
					</em>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="pull-right">
					<form action="<?php echo $this->Cms_model->base_link(). '/admin/upload_index/'; ?>" method="get">
						<div class="control-group-fluid">
							<label class="control-label" for="search">
								<?php echo $this->lang->line('search'); ?>: <input type="text" name="search" id="search" class="form-control-static" value="<?php echo $this->input->get('search');?>">
							</label>
							<input type="submit" name="submit" id="submit" class="btn btn-default" value="<?php echo $this->lang->line('search'); ?>">
						</div>
					</form>
				</div>
				<?php echo  form_open($this->Cms_model->base_link(). '/admin/upload_index_save'); ?>
				<div class="box box-body table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped contact_forms_tbl">
						<thead>
							<tr>
								<th width="8%"><label><input id="sel-chkbox-all" type="checkbox"><?php /*?> <?php echo  $this->lang->line('btn_delete') ?><?php */?></label>
								</th>
								<th width="15%">
									<?php echo  $this->lang->line('uploadfile_thumbnail') ?>
								</th>
								<th width="52%">
									<?php echo  $this->lang->line('uploadfile_filename') ?>
								</th>
								<th width="15%">
									<?php echo  $this->lang->line('uploadfile_uploadtime') ?>
								</th>
								<th width="10%">
									<?php echo  $this->lang->line('uploadfile_download') ?>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php if ($showfile === FALSE) { ?>
							<tr>
								<td colspan="5" class="text-center">
									<span class="h6 error">
										<?php echo  $this->lang->line('uploadfile_filenotfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php foreach ($showfile as $file) { ?>
							<tr>
								<td>
									<input type="checkbox" name="filedel[]" id="filedel" class="selall-chkbox" value="<?php echo $file["upload_file_id"] ?>">
								</td>
								<td>
									<?php 
											$ext = strtolower(pathinfo($file["file_upload"], PATHINFO_EXTENSION));
											if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif'){ ?>
									<img src="<?php echo base_url().'photo/upload/'.$file["file_upload"] ?>" width="100">
									<?php }else{ ?>
									<i class="glyphicon glyphicon-file"></i>
									<?php echo strtoupper($ext)?>
									<?php } ?>
								</td>
								<td>
									<span class="h5"><b><?php echo  $file["file_upload"] ?></b></span>
									<div class="form-group has-warning">
										<div class="input-group">
											<div class="input-group-addon">
												<b>Main Text 
													<?php //echo  $this->lang->line('uploadfile_urlpath') ?>
												</b>
											</div>
											<input type="text"  class="form-control"  name="maintext[<?php echo $file["upload_file_id"] ?>]" id="maintext" value="<?php  echo  $file["maintext"] ?>">
											<input type="hidden"  class="form-control"  name="mainid[<?php echo $file["upload_file_id"] ?>]" id="maintext" value="<?php  echo  $file["upload_file_id"] ?>">
										</div>
									</div>
									<div class="form-group has-feedback">
										<div class="input-group">
											<div class="input-group-addon">
												<b>Sub Text 
													<?php //echo  $this->lang->line('remark_header') ?>
												</b>
											</div>
											<input type="text" class="form-control" name="subtext[<?php echo $file["upload_file_id"] ?>]" id="subtext" value="<?php echo $file["subtext"]; ?>">
										</div>
									</div>
								
									<div class="form-group has-warning">
										<div class="input-group">
											<div class="input-group-addon">
												<b>
													<?php echo  $this->lang->line('uploadfile_urlpath') ?>
												</b>
											</div>
											<input type="text" readonly class="form-control" id="full_url" value="<?php echo  base_url() ?>photo/upload/<?php echo  $file["file_upload"] ?>" onfocus="this.select();" onmouseup="return false;">
										</div>
									</div>
									<div class="form-group has-feedback">
										<div class="input-group">
											<div class="input-group-addon">
												<b>
													<?php echo  $this->lang->line('remark_header') ?>
												</b>
											</div>
											<input type="text" class="form-control" name="remark[<?php echo $file["upload_file_id"] ?>]" id="remark" value="<?php echo $file["remark"]; ?>">
										</div>
									</div>
									<div class="form-group has-feedback">
										<div class="input-group">
											<div class="input-group-addon">
												<b>
													<?php echo  'Button Text' ?>
												</b>
											</div>
											<input type="text" class="form-control" name="btn_text[<?php echo $file["upload_file_id"] ?>]" id="btn_text" value="<?php echo $file["btn_text"]; ?>">
										</div>
									</div>
									<div class="form-group has-feedback">
										<div class="input-group">
											<div class="input-group-addon">
												<b>
													<?php echo  'Button Link' ?>
												</b>
											</div>
											<input type="text" class="form-control" name="btn_link[<?php echo $file["upload_file_id"] ?>]" id="btn_link" value="<?php echo $file["btn_link"]; ?>">
										</div>
									</div>
									<div class="form-group has-feedback">
										<div class="input-group">
											<div class="input-group-addon">
												<b>
													<?php echo  'Slider Active' ?>
												</b>
											</div>
											<input type="checkbox" class="" name="active[<?php echo $file["upload_file_id"] ?>]" id="active" <?php if ($file["active"]): ?>
												checked
											<?php endif ?> value = "1">
										</div>
									</div>
								</td>
								<td>
									<span class="h5"><b><?php echo  $file["timestamp_create"] ?></b></span>
								</td>
								<td>
									<a href="<?php echo $this->Cms_model->base_link().'/admin/upload_Download/'.$file["upload_file_id"] ?>" class="btn btn-primary" role="button" title="<?php echo  $this->lang->line('uploadfile_download') ?>" target="_blank"><i class="glyphicon glyphicon-download"></i></a>
								</td>
							</tr>
							<?php } ?>
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
							'class' => 'btn btn-primary',
							'value' => $this->lang->line( 'btn_save' ),
							'onclick' => "return confirm('" . $this->lang->line( 'delete_message' ) . "');",
						);
						echo form_submit( $data );
						?>
					</div>
				</div>
				<?php echo  form_close(); ?>
				<!-- /widget-content -->
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	document.getElementById( 'files' ).addEventListener( 'change', function ( e ) {
		var list = document.getElementById( 'filelist' );
		list.innerHTML = '';
		for ( var i = 0; i < this.files.length; i++ ) {
			list.innerHTML += ( i + 1 ) + '. ' + this.files[ i ].name + '\n';
		}
		if ( list.innerHTML == '' ) list.style.display = 'none';
		else list.style.display = 'block';
	} );
	document.getElementById( 'reset' ).addEventListener( 'click', function ( e ) {
		var list = document.getElementById( 'filelist' );
		list.innerHTML = '';
		list.style.display = 'none';
	} );
	var fl = document.getElementById( 'files' );

	fl.onchange = function ( e ) {
		var exts = this.value.substring( this.value.lastIndexOf( '.' ) + 1 ).toLowerCase();
		var ext = exts.toLowerCase();
		switch ( ext ) {
			case 'jpg':
			case 'jpeg':
			case 'png':
			case 'gif':
			case 'pdf':
			case 'doc':
			case 'docx':
			case 'odt':
			case 'txt':
			case 'odg':
			case 'odp':
			case 'ods':
			case 'zip':
			case 'rar':
			case 'psv':
			case 'xls':
			case 'xlsx':
			case 'ppt':
			case 'pptx':
			case 'mp3':
			case 'wav':
			case 'mp4':
			case 'wma':
			case 'flv':
			case 'avi':
			case 'mov':
			case 'm4v':
			case 'wmv':
			case 'm3u':
			case 'pls':
				break;
			default:
				alert( '<?php echo  $this->lang->line('
					uploadfile_fileallow ') ?>' );
				this.value = '';
				var list = document.getElementById( 'filelist' );
				list.innerHTML = '';
				list.style.display = 'none';
		}
	};
</script>