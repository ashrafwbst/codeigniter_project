<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<!-- Start Admin Menu -->
		<?php echo $this->Article_model->AdminMenu() ?>
		<!-- End Admin Menu -->
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="fa fa-edit"></span></i>
				<?php echo  $this->lang->line('article_header') ?>
			</li>
		</ol>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header">
			<div class="row">
				<div class="text-left col-xs-6">
					<?php echo  $this->lang->line('article_header') ?>
				</div>
				<div class="text-right col-xs-6">
					<a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/plugin/article/artadd" class="btn btn-success btn-sm" style="margin-left: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('article_new_header') ?></a><a class="btn btn-default btn-sm" href="<?php echo $this->cms_referrer->getIndex('article'); ?>"><span class="fa fa-arrow-left"></span> <?php echo $this->lang->line('btn_back'); ?></a>
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
							<label class="control-label" for="category">
								<?php echo $this->lang->line('category_header'); ?>:
								<select name="category" id="category" class="form-control-static">
									<option value="">
										<?php echo $this->lang->line('option_all'); ?>
									</option>
									<?php
									if ( !empty( $category ) ) {
										foreach ( $category as $c ) {
											$cat_arr[ $c[ 'article_db_id' ] ] = $c[ 'category_name' ];
											?>
									<option value="<?php echo $c['article_db_id'] ?>" <?php echo ($this->input->get('category') == $c['article_db_id'])?' selected="selected"':''?>>
										<?php echo $c['category_name'] ?>
									</option>
									<?php }
									}
									?>
								</select>
							</label>
							<label class="control-label" for="category">
								<?php echo  $this->lang->line('lang_header') ?>:
								<select name="lang" id="lang" class="form-control-static">
									<option value="">
										<?php echo  $this->lang->line('option_all') ?>
									</option>
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
				<div class="table-responsive no-padding">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="40%">
									<?php echo $this->lang->line('article_title'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('category_header'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('article_author'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('pages_lang'); ?>
								</th>
								<th width="10%">
									<?php echo $this->lang->line('article_datetime'); ?>
								</th>
								<th width="20%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if ($article === FALSE) { ?>
							<tr>
								<td colspan="7" class="text-center">
									<span class="h6 error">
										<?php echo  $this->lang->line('data_notfound') ?>
									</span>
								</td>
							</tr>
							<?php } else { ?>
							<?php
							foreach ( $article as $u ) {
								if ( !$u[ 'active' ] ) {
									$inactive = ' style="color:red;text-decoration:line-through;"';
								} else {
									$inactive = '';
								}
								echo '<tr>';
								echo '<td' . $inactive . '>';
								echo '<b>' . $u[ 'title' ] . '</b><br>';
								echo '<span style="color:red;"><small><em>' . $u[ 'keyword' ] . '</em></small></span><br>';
								echo $u[ 'short_desc' ];
								echo '</td>';
								echo '<td' . $inactive . '>';
								if ( $u[ 'cat_id' ] && $u[ 'cat_id' ] != NULL ) {
									echo $cat_arr[ $u[ 'cat_id' ] ];
								} else {
									echo '-';
								}
								echo '</td>';
								echo '<td' . $inactive . '>' . ucfirst( $this->Cms_admin_model->getUser( $u[ 'user_admin_id' ] )->name ) . '</td>';
								echo '<td' . $inactive . '><i class="flag-icon flag-icon-' . $this->Cms_model->getCountryCode( $u[ 'lang_iso' ] ) . '"></i></td>';
								echo '<td' . $inactive . '>' . $u[ 'timestamp_update' ] . '</td>';
								echo '<td><a onclick="return confirm(\'' . $this->lang->line( 'delete_message' ) . '\')"  href="' . $this->Cms_model->base_link() . '/admin/plugin/article/asCopy/' . $u[ 'article_db_id' ] . '" class="btn btn btn-primary btn-sm" role="button"><i class="fa fa-files-o"></i></a> &nbsp; <a href="' . $this->Cms_model->base_link() . '/admin/plugin/article/artedit/' . $u[ 'article_db_id' ] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp; <a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\'' . $this->lang->line( 'delete_message' ) . '\')" href="' . $this->Cms_model->base_link() . '/admin/plugin/article/artdel/' . $u[ 'article_db_id' ] . '"><i class="fa fa-remove"></i></a></td>';
								echo '</tr>';
							}
							}
							?>
						</tbody>
					</table>
				</div>
				<?php echo $this->pagination->create_links(); ?>
				<b>
					<?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?>
				</b>
			</div>
		</div>
	</div>
</div>