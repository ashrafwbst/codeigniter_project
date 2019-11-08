<!-- Page Heading -->

<div class="row">

	<div class="col-lg-12">

		<ol class="breadcrumb">

			<li class="active">

				<i><span class="glyphicon glyphicon-globe"></span></i>

				<?php echo  $this->lang->line('pages_header') ?>

			</li>

		</ol>

	</div>

</div>

<!-- /.row -->

<div class="row">

	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header" style="margin-bottom: 15px;">
			<?php echo  $this->lang->line('pages_header') ?> <a role="button" href="<?php echo $this->Cms_model->base_link()?>/admin/pages/new" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> <?php echo  $this->lang->line('pages_addnew') ?></a>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="pull-right">
					<form id="lang_sel">
						<div class="control-group-fluid" style="padding-bottom: 15px;">
							<?php echo  $this->lang->line('lang_header') ?>:
							<select class="form-control-static" onchange="this.options[this.selectedIndex].value && (window.location = '<?php echo $this->Cms_model->base_link()?>/admin/pages/?lang='+this.options[this.selectedIndex].value);" onblur="this.options[this.selectedIndex].value && (window.location = '<?php echo $this->Cms_model->base_link()?>/admin/pages/?lang='+this.options[this.selectedIndex].value);">
								<option value="all">
									<?php echo  $this->lang->line('option_all') ?>
								</option>
								<?php foreach ($lang as $lg) { ?>
								<option value="<?php echo $lg->lang_iso?>" <?php echo ($this->input->get('lang') == $lg->lang_iso)?' selected="selected"':''?>>
									<?php echo $lg->lang_name?>
								</option>
								<?php } ?>
							</select>
						</div>
					</form>
				</div>

				<div class="box box-body table-responsive no-padding">

					<table class="table table-hover">

						<thead>

							<tr>

								<th width="6%">

									<?php echo $this->lang->line('id_col_table'); ?>

								</th>

								<th width="22%">

									<?php echo $this->lang->line('pages_name'); ?>

								</th>

								<th width="33%">

									<?php echo $this->lang->line('pages_title'); ?>

								</th>

								<th width="8%">

									<?php echo $this->lang->line('pages_lang'); ?>

								</th>

								<th width="30%"></th>

							</tr>

						</thead>

						<tbody>

							<?php if ($pages === FALSE) { ?>

							<tr>

								<td colspan="5" class="text-center">

									<span class="h6 error">

										<?php echo  $this->lang->line('data_notfound') ?>

									</span>

								</td>

							</tr>

							<?php } else { ?>

							<?php

							foreach ( $pages as $u ) {

								if ( !$u[ 'active' ] ) {

									$inactive = ' style="vertical-align: middle;color:red;text-decoration:line-through;"';

								} else {

									$inactive = '';

								}

								if ( $u[ 'pages_id' ] == 1 ) {

									$default_txt = ' <i class="fa fa-lock"></i>';

								} else {

									$default_txt = '';

								}

								echo '<tr>';

								echo '<td' . $inactive . '>' . $u[ 'pages_id' ] . '</td>';

								echo '<td' . $inactive . '>' . $u[ 'page_name' ] . '' . $default_txt . '</td>';

								echo '<td' . $inactive . '>' . $u[ 'page_title' ] . '</td>';

								echo '<td' . $inactive . '><i class="flag-icon flag-icon-' . $this->Cms_model->getCountryCode( $u[ 'lang_iso' ] ) . '"></i></td>';

								echo '<td><a onclick="return confirm(\'' . $this->lang->line( 'delete_message' ) . '\')"  href="' . $this->Cms_model->base_link() . '/admin/pages/asCopy/' . $u[ 'pages_id' ] . '" class="btn btn btn-primary btn-sm" role="button"><i class="fa fa-copy"></i></a> &nbsp;&nbsp; <a href="' . $this->Cms_model->base_link() . '/admin/pages/edit/' . $u[ 'pages_id' ] . '" class="btn btn-info btn-sm" role="button"><i class="fa fa-pencil"></i></a> &nbsp;&nbsp; <a role="button" class="btn btn-danger btn-sm" role="button" onclick="return confirm(\'' . $this->lang->line( 'pages_delete_message' ) . '\')" href="' . $this->Cms_model->base_link() . '/admin/pages/delete/' . $u[ 'pages_id' ] . '"><i class="fa fa-trash-o"></i></a></td>';

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

				<!-- /widget-content -->

				<br><br>

				<span class="warning"><i class="glyphicon glyphicon-lock"></i> <?php echo  $this->lang->line('default_data_remark') ?></span>
			</div>

		</div>
	</div>

</div>