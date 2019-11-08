<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i><span class="glyphicon glyphicon-user"></span></i>
				<?php echo  $this->lang->line('user_admin_txt') ?>
			</li>
		</ol>
	</div>
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="h2 sub-header">
			<?php echo  $this->lang->line('subcategory_new') ?> <a role="button" href="<?php echo  $this->Cms_model->base_link() ?>/addproductsubcatogory" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('subcategory_new') ?></a>
		</div>
		<?php echo form_open_multipart($this->Cms_model->base_link(). '/admin/product/updatesubcategory/'.$this->uri->segment(4)); ?>

		<div class="card">
			<div class="card-body">
					<div class="control-group">
					<label class="control-label" for="categorie">
						<?php echo $this->lang->line('categorie'); ?>*</label>
					<?php
					$att = 'id="group" class="form-control"';
					$data = array();
					if ( !empty( $subcategories ) ) {
						foreach ( $subcategories as $lg ) {
							$data[ $lg[ 'id' ] ] = $lg[ 'category_name' ];
						}
					}
					echo form_dropdown( 'product_category', $data, $categories['category_id'], $att );
					?>
				</div>
				<div class="control-group">
					<?php echo form_error('name', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
					<label class="control-label" for="category_name">
						<?php echo $this->lang->line('subcategory_name'); ?>*</label>
					<?php
					$data = array(
						'name' => 'category_name',
						'id' => 'category_name',
						'required' => 'required',
						'autofocus' => 'true',
						'class' => 'form-control',
						'maxlength' => '255',
						'value' => set_value( 'category_name', $categories['category_name'] )
					);
					echo form_input( $data );
					?>
				</div>
				<div class="control-group">
					<label class="control-label" for="category_image">
						<?php echo $this->lang->line('subcategory_image'); ?>
					</label>
					<div class="controls">
						<div><img class="img-thumbnail img-responsive" src="<?php
									  if ($categories['category_image'] != " " && $categories['category_image'] != NULL) {
										  echo base_url() . 'photo/products/category/' . $categories['category_image'];
									  }
									  ?>" <?php if ($categories['category_image'] == "" || $categories['category_image'] == NULL) { echo "style='display:none;'"; } ?> width="50%"></div>
						<?php
						$data = array(
							'name' => 'category_image',
							'id' => 'category_image',
							'class' => 'span5 form-control'
						   );
						   echo form_upload( $data );
						?>
						<input type="hidden" id="category_image" name="category_image" value="<?php echo $categories['category_image']?>"/>
					</div>
					<!-- /controls -->
				</div>
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
					<a class="btn btn-lg btn-danger" href="<?php echo $this->Cms_model->base_link(). '/admin/product/subcategories'; ?>">
						<?php echo $this->lang->line('btn_cancel'); ?>
					</a>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>