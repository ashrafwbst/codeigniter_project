<!-- Page Heading -->

<div class="row">

	<div class="col-lg-12">

		<!-- Start Admin Menu -->

		<?php echo $this->Article_model->AdminMenu() ?>

		<!-- End Admin Menu -->

		<ol class="breadcrumb">

			<li class="active">

				<i><span class="glyphicon glyphicon-edit"></span></i>
				<?php echo $this->lang->line('category_new_header');?>

			</li>

		</ol>

	</div>

</div>

<!-- /.row -->

<div class="row">

	<div class="col-lg-12 col-md-12">

		<div class="h2 sub-header">
			<?php echo $this->lang->line('category_new_header') . ' <a class="btn btn-default btn-sm" style="margin-bottom: 15px;" href="' . $this->cms_referrer->getIndex('article_cat') . '"><span class="fa fa-arrow-left"></span> ' . $this->lang->line('btn_back') . '</a>'; ?>
		</div>
		<div class="card">
			<div class="card-body">
				<?php echo form_open_multipart($this->Cms_model->base_link(). '/admin/plugin/article/addCatSave'); ?>

				<div class="control-group">

					<label class="control-label" for="category_name">
						<?php echo $this->lang->line('category_name'); ?>*</label>

					<?php

					$data = array(

						'name' => 'category_name',

						'id' => 'category_name',

						'required' => 'required',

						'autofocus' => 'true',

						'class' => 'form-control',

						'maxlength' => '255',

						'value' => set_value( 'category_name', '', FALSE )

					);

					echo form_input( $data );

					?>

				</div>
				<!-- /control-group -->

				<div class="control-group">

					<label class="control-label" for="main_cat_id">
						<?php echo $this->lang->line('category_main'); ?>
					</label>

					<div class="controls">

						<?php

						$att = 'id="main_cat_id" class="form-control"';

						$data = array();

						$data[ '' ] = $this->lang->line( 'option_choose' );

						if ( !empty( $category ) ) {

							foreach ( $category as $c ) {

								if ( !$c[ 'main_cat_id' ] ) {

									$data[ $c[ 'article_db_id' ] ] = $c[ 'category_name' ] . ' (' . $c[ 'lang_iso' ] . ')';

								}

							}

						}

						echo form_dropdown( 'main_cat_id', $data, '', $att );

						?>

					</div>
					<!-- /controls -->

				</div>
				<!-- /control-group -->

				<div class="control-group">

					<label class="control-label" for="lang_iso">
						<?php echo $this->lang->line('pages_lang'); ?>*</label>

					<?php

					$att = 'id="lang_iso" class="form-control"';

					$data = array();

					foreach ( $lang as $lg ) {

						$data[ $lg->lang_iso ] = $lg->lang_name;

					}

					echo form_dropdown( 'lang_iso', $data, '', $att );

					?>

				</div>
				<!-- /control-group -->

				<div class="control-group">

					<label class="form-control-static" for="active">

						<?php

						$data = array(

							'name' => 'active',

							'id' => 'active',

							'value' => '1'

						);

						echo form_checkbox( $data );

						?>
						<?php echo $this->lang->line('lang_active'); ?>
					</label>

				</div>
				<!-- /control-group -->

				<div class="form-actions">

					<?php

					$data = array(

						'name' => 'submit',

						'id' => 'submit',

						'class' => 'btn btn-lg btn-success m-r-10',

						'value' => $this->lang->line( 'btn_save' ),

					);

					echo form_submit( $data );

					?>

					<a class="btn btn-lg btn-danger" href="<?php echo $this->cms_referrer->getIndex('article_cat'); ?>">
						<?php echo $this->lang->line('btn_cancel'); ?>
					</a>

				</div>
				<!-- /form-actions -->

				<?php echo form_close(); ?>

				<!-- /widget-content -->
			</div>
		</div>
	</div>
</div>