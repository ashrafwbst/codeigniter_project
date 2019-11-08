<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="glyphicon glyphicon-edit"></span></i>
				<?php echo  $this->lang->line('gallery_header') ?>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header">
			<div class="row">
				<div class="text-left col-xs-6">
					<?php echo  $this->lang->line('gallery_header') ?> 
				</div>
				<div class="text-right col-xs-6"><a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/plugin/gallery/add" class="btn btn-success btn-sm" style="margin-left: 15px;"><span class="glyphicon glyphicon-plus"></span> <?php echo  $this->lang->line('gallery_new_header') ?></a> <a class="btn btn-default btn-sm" href="<?php echo $this->cms_referrer->getIndex(); ?>"><span class="glyphicon glyphicon-arrow-left"></span> <?php echo $this->lang->line('btn_back'); ?></a>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="pull-right">
					<form action="<?php echo current_url(); ?>" method="get">
						<div class="control-group-fluid banner_head">
							<label class="control-label" for="search">
								<?php echo $this->lang->line('search'); ?>: <input type="text" name="search" id="search" class="form-control-static" value="<?php echo $this->input->get('search');?>">
							</label>
							<label class="control-label" for="lang">
								<?php echo  $this->lang->line('lang_header') ?>:
								<select name="lang" id="lang" class="form-control-static">
									<?php foreach ($lang as $lg) { ?>
									<option value="<?php echo $lg->lang_iso?>" <?php echo ($this->input->get('lang') == $lg->lang_iso)?' selected="selected"':''?>>
										<?php echo $lg->lang_name?>
									</option>
									<?php } ?>
								</select>
							</label>
							<input type="submit" name="submit" id="submit" class="btn btn-default" value="<?php echo $this->lang->line('search'); ?>">
						</div>
					</form>
				</div>
				<?php echo form_open($this->Cms_model->base_link(). '/admin/plugin/gallery/albumIndexSave'); ?>
				<div class="table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="2%"><i class="fa fa-sort"></i>
								</th>
								<th width="8%">
									<?php echo $this->lang->line('id_col_table'); ?>
								</th>
								<th width="42%">
									<?php echo $this->lang->line('gallery_album'); ?>
								</th>
								<th width="8%">
									<?php echo $this->lang->line('pages_lang'); ?>
								</th>
								<th width="18%">
									<?php echo $this->lang->line('gallery_datetime'); ?>
								</th>
								<th width="22%"></th>
							</tr>
						</thead>
						<tbody class="ui-sortable">
							<?php if ($gallery === FALSE) { ?>
							<tr>
								<td colspan="5" class="text-center">
									<span class="h6 error">
										<?php echo  $this->lang->line('data_notfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php
							foreach ( $gallery as $u ) {
								if ( !$u[ 'active' ] ) {
									$inactive = ' style="color:red;text-decoration:line-through;"';
								} else {
									$inactive = '';
								}
								echo '<tr>';
								echo '<td>
                                    <i class="fa fa-sort"></i>
                                    <input type="hidden" name="gallery_db_id[]" value="' . $u[ 'gallery_db_id' ] . '">
                                </td>';
								echo '<td' . $inactive . '>' . $u[ 'gallery_db_id' ] . '</td>';
								echo '<td' . $inactive . ' >';
								echo '<b>' . $u[ 'album_name' ] . '</b><br>';
								echo '<span style="color:red;"><small><em>' . $u[ 'keyword' ] . '</em></small></span><br>';
								echo $u[ 'short_desc' ];
								echo '</td>';
								echo '<td' . $inactive . ' ><i class="flag-icon flag-icon-' . $this->Cms_model->getCountryCode( $u[ 'lang_iso' ] ) . '"></i></td>';
								echo '<td' . $inactive . ' >' . $u[ 'timestamp_update' ] . '</td>';
								echo '<td><a href="' . $this->Cms_model->base_link() . '/admin/plugin/gallery/edit/' . $u[ 'gallery_db_id' ] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp; <a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\'' . $this->lang->line( 'delete_message' ) . '\')" href="' . $this->Cms_model->base_link() . '/admin/plugin/gallery/delete/' . $u[ 'gallery_db_id' ] . '"><i class="fa fa-remove"></i></a></td>';
								echo '</tr>';
							}
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<?php
						$data = array(
							'name' => 'submit',
							'id' => 'submit',
							'class' => 'btn btn-success m-r-10',
							'value' => $this->lang->line( 'btn_save' ),
							'onclick' => "return confirm('" . $this->lang->line( 'delete_message' ) . "');",
						);
						echo form_submit( $data );
						?>
						<a class="btn btn-danger" href="<?php echo $this->cms_referrer->getIndex('gallery'); ?>">
							<?php echo $this->lang->line('btn_cancel'); ?>
						</a>
						<strong class="pull-right">
					<?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?>
				</strong>
					</div>
				</div>
				<?php echo  form_close(); ?>
				
			</div>
		</div>
	</div>
</div>
<!-- /.row -->