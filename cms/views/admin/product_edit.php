

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
			<?php echo  $this->lang->line('product_new') ?> <a role="button" href="<?php echo  $this->Cms_model->base_link() ?>/admin/addproduct" class="btn btn-success btn-sm" style="margin-bottom: 15px;"><span class="fa fa-plus"></span> <?php echo  $this->lang->line('product_new') ?></a>
		</div>
		<?php echo form_open_multipart($this->Cms_model->base_link(). '/admin/product/update/'.$this->uri->segment(4)); ?>

		<div class="card">
			<div class="card-body">
				<div class="control-group">
					<?php echo form_error('name', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>
					<label class="control-label" for="product_new_name">
						<?php echo $this->lang->line('product_new_name'); ?>*</label>
					<?php
					$data = array(
						'name' => 'product_name',
						'id' => 'name',
						'required' => 'required',
						'autofocus' => 'true',
						'class' => 'form-control',
						'maxlength' => '255',
						'value' => set_value( 'product_name',$products['product_name'] )
					);
					echo form_input( $data );
					?>
				</div>
				<!-- /control-group -->

				<!-- /control-group -->
					<div class="control-group">
					<label class="control-label" for="product_category">
						<?php echo $this->lang->line('product_category'); ?>*</label>
						<select name="product_category" class="form-control" onchange="get_subcategory(this.value)">
							<?php 
							 if ( !empty( $categories ) ) {
					 	foreach ( $categories as $lg ) { ?>
					 		<option value="<?php echo $lg[ 'id' ]; ?>" <?php if($lg[ 'id' ]==$products['product_category']){ echo 'selected';} ?>><?php echo $lg[ 'category_name' ]; ?></option>
				
					
					 	<?php } 
					 }
							 ?>
						
					</select>
					<?php
					
					?>
				</div>

					<div class="control-group">
					<?php echo $this->lang->line('subcategorie'); ?>*</label>
					
					<select name="product_subcategory" class="form-control" id="subcategory">
						<?php 
							 if ( !empty( $subcategories ) ) {
					 	foreach ( $subcategories as $lg ) { ?>
					 		<option value="<?php echo $lg[ 'id' ]; ?>" <?php if($lg[ 'id' ]==$products['product_subcategory']){ echo 'selected';} ?>><?php echo $lg[ 'category_name' ]; ?></option>
				
					
					 	<?php } 
					 }
							 ?>
					</select>
						
				
					<?php
					
					?>
				</div>
				<!-- <div class="control-group">
					<label class="control-label" for="product_style">
						<?php echo $this->lang->line('product_style'); ?>
					</label>
					<?php
					$data = array(
						'name' => 'product_style',
						'id' => 'product_style',
						'class' => 'form-control',
						'maxlength' => '255',
						'value' => set_value( 'product_style', $products['product_style'] )
					);
					echo form_input( $data );
					?>
				</div> -->
				<!-- /control-group -->
				<!-- <div class="control-group">
					<label class="control-label" for="product_soldby">
						<?php echo $this->lang->line('product_soldby'); ?>
					</label>
					<?php
					$data = array(
						'name' => 'product_soldby',
						'id' => 'product_soldby',
						'class' => 'form-control',
						'maxlength' => '255',
						'value' => set_value( 'product_soldby', $products['product_soldby'] )
					);
					echo form_input( $data );
					?>
				</div> -->
				<div class="col-md-12"></div>
				<!-- <div class="control-group">
					<label class="control-label" for="product_price">
						<?php echo $this->lang->line('product_price'); ?>
					</label>
					<?php
					$data = array(
						'name' => 'product_price',
						'id' => 'product_price',
						'class' => 'form-control',
						'maxlength' => '255',
						'value' => set_value( 'product_price', $products['product_price'] )
					);
					echo form_input( $data );
					?>
				</div> -->
				<div class="control-group">
					<label class="control-label" for="sale_price">
						<?php echo $this->lang->line('sale_price'); ?>
					</label>
					<?php
					$data = array(
						'name' => 'sale_price',
						'id' => 'sale_price',
						'class' => 'form-control',
						'maxlength' => '255',
						'value' => set_value( 'sale_price', $products['sale_price'] )
					);
					echo form_input( $data );
					?>
				</div>
				<!-- /control-group -->
				<div class="control-group-fluid">
					<label class="control-label" for="product_description">
						<?php echo $this->lang->line('product_description'); ?>
					</label>
					<textarea name="product_description" id="product_description" class="form-control" style="height: 100px;"><?php echo $products['product_description']; ?></textarea>
				</div>
				<div class="control-group">
					<label class="control-label" for="product_featured_image">
						<?php echo $this->lang->line('product_featured_image'); ?>
					</label>
					<div class="controls">
						<div><img class="img-thumbnail img-responsive" src="<?php
									  if ($products['product_image'] != " " && $products['product_image'] != NULL) {
										  echo base_url() . 'photo/products/' . $products['product_image'];
									  }
									  ?>" <?php if ($products['product_image'] == "" || $products['product_image'] == NULL) { echo "style='display:none;'"; } ?> width="50%"></div>
						<?php
						$data = array(
							'name' => 'product_image',
							'id' => 'product_image',
							'class' => 'span5 form-control'
						   );
						   echo form_upload( $data );
						?>
						<input type="hidden" id="product_image" name="product_image" value="<?php echo $products['product_image']?>"/>
					</div>
					<!-- /controls -->
				</div>

				<!-- <div class="control-group">
					<label class="control-label" for="product_extra_images">
						<?php echo $this->lang->line('product_extra_images'); ?>
					</label>
					<div class="controls">
						<input class="span5 form-control" type="file" name="extra_images[]" multiple/>
					</div>
					<span style="color: red;"><p>* Press Ctrl to upload multiple images</p></span>
					
				</div> -->

				<!-- /control-group -->
				<div class="multiple-image">
					<?php if($extra_images) { ?>
					<?php foreach ($extra_images as $extra_image) { ?>
						
					<div class="control-group">
	                  <a href="<?php echo base_url().'admin/products/deleteimage/'.$extra_image['id']; ?>"><img class="xzoom-gallery" width="120" src="<?php echo base_url().'photo/products/'.$extra_image['images'];?>"><a onclick="return confirm('Are You Sure ?')" href="<?php echo base_url().'admin/products/deleteimage/'.$extra_image['id']; ?>"><i class="fa fa-trash-o"></i></a></a>
	                </div>

	                <?php }}?>
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
					<a class="btn btn-lg btn-danger" href="<?php echo $this->cms_referrer->getIndex(); ?>">
						<?php echo $this->lang->line('btn_cancel'); ?>
					</a>
				</div>
				<!-- /form-actions -->
				
				<?php echo form_close(); ?>
				<?php echo  form_open_multipart($this->Cms_model->base_link(). '/admin/productsubimages/'.$this->uri->segment(4)) ?>
				    <?php $prod_id=$this->uri->segment(4); ?>
						<input type="hidden" name="gallery_type" value="multiimages">
						<input type="hidden" name="product_id" value="<?php echo $prod_id;?>">
						<div class="row">
							<div class="col-lg-12 col-md-12" style="padding: 10px 25px;">
								<span class="btn btn-success fileinput-button m-r-10">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span><?php echo  $this->lang->line('uploadfile_add_file') ?></span>
								<input type="file" name="prod_sub_img" id="files"  required accept=".jpg, .jpeg, .png, .gif">
								</span>
								<button type="submit" class="btn btn-primary  m-r-10">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span><?php echo  $this->lang->line('btn_upload') ?></span>
                        </button>
								<button type="reset" class="btn btn-warning  m-r-10" id="reset">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span><?php echo  $this->lang->line('btn_cancel') ?></span>
                        </button>
								<pre id="filelist" style="display:none;"></pre>
							</div>
						</div>
						<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var url="<?php echo $this->Cms_model->base_link(). '/admin/product/getsubcategories'; ?>";
	function get_subcategory(id){
		
		 $.ajax({
            type: "POST",
            url: url,
            data: {id:id},
            success: function(response)
            {
               $('#subcategory').html(response);
           }
       });
	}
</script>