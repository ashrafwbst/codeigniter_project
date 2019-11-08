<!-- Page Heading -->

<div class="row">

    <div class="col-lg-12">

        <ol class="breadcrumb">

            <li class="active">

                <i><span class="glyphicon glyphicon-pencil"></span></i> <?php echo $this->lang->line('carousel_edit'); ?>

            </li>

        </ol>

    </div>

</div>

<!-- /.row -->

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="h2 sub-header"><?php echo $this->lang->line('carousel_edit'); ?> <a class="btn btn-default btn-sm" style="margin-bottom: 15px;" href="<?php echo $this->cms_referrer->getIndex(); ?>"><span class="fa fa-arrow-left"></span> <?php echo $this->lang->line('btn_back'); ?></a></div>
		<div class="card">
			<div class="card-body">
				<?php echo form_open_multipart($this->Cms_model->base_link(). '/admin/carousel/update/'.$this->uri->segment(4)); ?>
				<div class="row">
   	 			<div class="col-lg-12 col-md-12">
				<div class="control-group">	

					<?php echo form_error('name', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>'); ?>

					<label class="control-label" for="name"><?php echo $this->lang->line('carousel_name'); ?>*</label>

					<?php

					$data = array(

						'name' => 'name',

						'id' => 'name',

						'required' => 'required',

						'autofocus' => 'true',

						'class' => 'form-control',

						'maxlength' => '255',

						'value' => set_value('name', $carousel->name, FALSE)

					);

					echo form_input($data);

					?>			

				</div> <!-- /control-group -->
				</div>
			</div>
			<div class="row">
   	 			<div class="col-lg-12 col-md-12">
				<label class="form-control-static" for="active">

						<?php

						if($carousel->active){

							$checked = 'checked';

						}else{

							$checked = '';

						}

						$data = array(

							'name' => 'active',

							'id' => 'active',

							'value' => '1',

							'checked' => $checked

						);

						echo form_checkbox($data);

						?> <?php echo $this->lang->line('lang_active'); ?></label>
			</div>
			</div>
			<div class="row">
   	 			<div class="col-lg-12 col-md-12">
				<div class="form-actions">

					<?php

					$data = array(

						'name' => 'submit',

						'id' => 'submit',

						'class' => 'btn btn-lg btn-success m-r-10',

						'value' => $this->lang->line('btn_save'),

					);

					echo form_submit($data);

					?> 

					<a class="btn btn-lg btn-danger" href="<?php echo $this->cms_referrer->getIndex(); ?>"><?php echo $this->lang->line('btn_cancel'); ?></a>

				</div> <!-- /form-actions -->
				<?php echo form_close(); ?>
       		</div>
		</div>	
    </div>
		</div>
	</div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="h2 sub-header"><?php echo $this->lang->line('carousel_picture') ?></div>
    </div>
</div>
<div class="card">
			<div class="card-body">		
				<div class="row">

					<div class="col-md-6">

						<div class="h4 sub-header"><?php echo  $this->lang->line('carousel_youtube_head') ?></div>

						<?php echo form_open($this->Cms_model->base_link(). '/admin/carousel/addYoutube/'.$this->uri->segment(4)) ?>

						<input type="hidden" name="carousel_type" value="youtubevideos">

						<div class="form-group has-feedback" style="position: relative;">

							<div class="input-group">

								<label class="control-label" for="name"><?php echo  $this->lang->line('carousel_youtube_url') ?></label>

								<input style="z-index: 1;" type="text" class="form-control" id="youtube_url" name="youtube_url" maxlength="255" required>

							</div>
							<div class="carousel_add_btn">
							<?php

						$data = array(

							'name' => 'submit',

							'id' => 'submit',

							'class' => 'btn btn-primary',

							'value' => $this->lang->line('btn_add'),

						);

						echo form_submit($data);

						?> 
						</div>
						</div>
						

						<?php echo form_close(); ?>

					</div>

					<div class="col-md-6">
						<div class="h4 sub-header"><?php echo  $this->lang->line('carousel_url_head') ?></div>
						<?php echo form_open($this->Cms_model->base_link(). '/admin/carousel/addUrl/'.$this->uri->segment(4)) ?>
						<input type="hidden" name="carousel_type" value="multiimages">
						<div class="form-group has-feedback" style="position: relative;">
							<div class="input-group">
								<label class="control-label" for="name"><?php echo  $this->lang->line('carousel_photo_url') ?></label>
								<input style="z-index: 1;" type="text" class="form-control" id="photo_url" name="photo_url" maxlength="512" required>
							</div>
							<div class="carousel_add_btn">
								<?php

								$data = array(

									'name' => 'submit',

									'id' => 'submit',

									'class' => 'btn btn-primary',

									'value' => $this->lang->line('btn_add'),

								);

								echo form_submit($data);

								?> 
								</div>
						</div>
						
						<?php echo form_close(); ?>

					</div>

					<div class="col-md-12">  

						<div class="h4 sub-header"><?php echo  $this->lang->line('uploadfile_uploadtools') ?></div>

						<?php echo form_open_multipart($this->Cms_model->base_link(). '/admin/carousel/filesUpload/'.$this->uri->segment(4)) ?>

						<input type="hidden" name="carousel_type" value="multiimages">

						<div class="row">

							<div class="col-md-12">

								<span class="btn btn-success fileinput-button m-r-10">

									<i class="glyphicon glyphicon-plus"></i>

									<span><?php echo  $this->lang->line('uploadfile_add_file') ?></span>

									<input type="file" name="files[]" id="files" multiple required accept=".jpg, .jpeg, .png, .gif">

								</span>

								<button type="submit" class="btn btn-primary m-r-10">

									<i class="glyphicon glyphicon-upload"></i>

									<span><?php echo  $this->lang->line('btn_upload') ?></span>

								</button>

								<button type="reset" class="btn btn-warning" id="reset">

									<i class="glyphicon glyphicon-ban-circle"></i>

									<span><?php echo  $this->lang->line('btn_cancel') ?></span>

								</button>

								<pre id="filelist" style="display:none;"></pre>

							</div>

						</div>

						<?php echo form_close(); ?>

						<br>

						<blockquote class="remark">

							<em><?php echo  $this->lang->line('carousel_fileallow') ?></em>

						</blockquote>

					</div>

				</div>

				<?php echo  form_open($this->Cms_model->base_link(). '/admin/carousel/filesSave'); ?>

				<div class="box box-body table-responsive no-padding">

					<table class="table table-bordered table-hover table-striped contact_forms_tbl">

						<thead>

							<tr>

								<th width="2%"><i class="fa fa-sort"></i></th>

								<th width="8%"><label><input id="sel-chkbox-all" type="checkbox"> <?php /*?><?php echo  $this->lang->line('btn_delete') ?><?php */?></label></th>                           

								<th width="15%"><?php echo  $this->lang->line('uploadfile_thumbnail') ?></th>

								<th width="60%"><?php echo  $this->lang->line('uploadfile_filename') ?></th>

								<th width="15%"><?php echo  $this->lang->line('uploadfile_uploadtime') ?></th>

							</tr>

						</thead>

						<tbody class="ui-sortable">

							<?php if ($showfile === FALSE) { ?>

								<tr>

									<td colspan="5" class="text-center"><span class="h6 error"><?php echo  $this->lang->line('uploadfile_filenotfound') ?></span></td>

								</tr>                           

							<?php } else { ?>

								<?php 

								foreach ($showfile as $file) { ?>

									<tr>

										<td><i class="fa fa-sort"></i></td>

										<td>

											<input type="hidden" name="carousel_picture_id[]" value="<?php echo $file["carousel_picture_id"]?>">

											<input type="checkbox" name="filedel[]" id="filedel" class="selall-chkbox" value="<?php echo $file["carousel_picture_id"] ?>">

										</td>

										<td>

											<?php 

											$ext = strtolower(pathinfo($file["file_upload"], PATHINFO_EXTENSION));

											if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' && $file["carousel_type"] == 'multiimages' && $file["file_upload"] && $file["file_upload"] != NULL){ ?>

											<img src="<?php echo base_url() .'photo/carousel/'.$file["file_upload"]?>" width="100" class="img-responsive img-thumbnail">

											<?php }else if($file["carousel_type"] == 'multiimages' && $file["photo_url"] && $file["photo_url"] != NULL){ ?>

											<img src="<?php echo $file["photo_url"] ?>" width="100" class="img-responsive img-thumbnail">

											<?php }else{ ?>

												<i class="glyphicon glyphicon-facetime-video"></i> YOUTUBE

											<?php } ?>

										</td>

										<td>

											<span class="h5"><b>

												<?php 

												if($file["carousel_type"] == 'multiimages' && $file["file_upload"] && $file["file_upload"] != NULL){

													echo $file["file_upload"];

												}else if($file["carousel_type"] == 'multiimages' && $file["photo_url"] && $file["photo_url"] != NULL){ ?>

													<a href="<?php echo $file["photo_url"]; ?>" target="_blank"><?php echo $file["photo_url"]; ?></a>

												<?php }else if($file["carousel_type"] == 'youtubevideos'){ ?>

													<a href="<?php echo $file["youtube_url"]; ?>" target="_blank"><?php echo $file["youtube_url"]; ?></a>

												<?php } ?>

											</b></span><?php if($file['arrange'] == 1){ ?> <i class="glyphicon glyphicon-book"></i><?php } ?>

											<div class="form-group has-feedback">

												<div class="input-group">

													<div class="input-group-addon"><b><?php echo  $this->lang->line('carousel_caption') ?></b></div>

													<input style="z-index: 1;" type="text" class="form-control" id="caption" name="caption[<?php echo $file["carousel_picture_id"] ?>]" value="<?php echo $file["caption"] ?>">

												</div>

											</div>

										</td>

										<td>

											<span class="h5"><b><?php echo $file["timestamp_create"] ?></b></span>

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

							'class' => 'btn btn-lg btn-success m-r-10',

							'value' => $this->lang->line('btn_save'),

							'onclick' => "return confirm('".$this->lang->line('delete_message')."');",

						);

						echo form_submit($data);

						?>

						<a class="btn btn-lg btn-danger m-r-10" href="<?php echo $this->cms_referrer->getIndex(); ?>"><?php echo $this->lang->line('btn_cancel'); ?></a>
						<b style="padding-top: 10px;display: inline-block;"><?php echo $this->lang->line('total').' '.$total_row.' '.$this->lang->line('records');?></b>
					</div>

				</div>

				<?php echo  form_close(); ?>

				<!-- /widget-content -->

				
			</div>
		</div>

<script type="text/javascript">

document.getElementById('files').addEventListener('change', function(e) {

  var list = document.getElementById('filelist');

  list.innerHTML = '';

  for (var i = 0; i < this.files.length; i++) {

    list.innerHTML += (i + 1) + '. ' + this.files[i].name + '\n';

  }

  if (list.innerHTML == '') list.style.display = 'none';

  else list.style.display = 'block';

});

document.getElementById('reset').addEventListener('click', function(e) {

  var list = document.getElementById('filelist');

  list.innerHTML = '';

  list.style.display = 'none';

});

var fl = document.getElementById('files');



fl.onchange = function(e){ 

    var exts = this.value.substring(this.value.lastIndexOf('.') + 1).toLowerCase();

    var ext = exts.toLowerCase();

    switch(ext)

    {

        case 'jpg': 

            case 'jpeg':

            case 'png':

            case 'gif':

            break;

        default:

            alert('<?php echo  $this->lang->line('carousel_fileallow') ?>');

            this.value='';

            var list = document.getElementById('filelist');

            list.innerHTML = '';

            list.style.display = 'none';

    }

};

</script>

<script src="<?php echo base_url()?>assets/js/jquery.mobile-1.4.0-alpha.2.min.js"></script>